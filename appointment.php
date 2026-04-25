<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
require_once 'includes/auth.php';

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = sanitize($_POST['full_name']);
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];
    $whatsapp = sanitize($_POST['whatsapp']);
    $service_type = sanitize($_POST['service_type']);
    $appointment_date = sanitize($_POST['appointment_date']);
    $appointment_time = sanitize($_POST['appointment_time'] ?? '');
    $transaction_id = sanitize($_POST['transaction_id']);
    $message = sanitize($_POST['message'] ?? '');

    // Validation
    if (empty($full_name) || empty($email) || empty($password) || empty($whatsapp) || empty($service_type) || empty($appointment_date) || empty($transaction_id)) {
        set_flash('error', 'সবগুলো ঘর সঠিকভাবে পূরণ করুন। (Please fill all fields)');
        redirect('appointment.php');
    }

    $wa_number = format_whatsapp($whatsapp);

    // 1. User Management
    $stmt = $pdo->prepare("SELECT id FROM users WHERE whatsapp_number = ? OR email = ?");
    $stmt->execute([$wa_number, $email]);
    $user = $stmt->fetch();

    if (!$user) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, whatsapp_number, password, role, created_at, updated_at) VALUES (?, ?, ?, ?, 'client', NOW(), NOW())");
        $stmt->execute([$full_name, $email, $wa_number, $hashed_password]);
        $user_id = $pdo->lastInsertId();
    } else {
        $user_id = $user->id;
    }

    // 2. Save Appointment
    try {
        $stmt = $pdo->prepare("INSERT INTO appointments (user_id, full_name, email, whatsapp_number, service_type, appointment_date, appointment_time, transaction_id, message, status, is_paid, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending', 0, NOW(), NOW())");
        $stmt->execute([$user_id, $full_name, $email, $wa_number, $service_type, $appointment_date, $appointment_time, $transaction_id, $message]);
        
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_role'] = 'client';

        // 3. WhatsApp Redirect
        $wa_message = "আসসালামু আলাইকুম শারমিন মুজাহিদ ম্যাম,\n\n" .
                      "আমি একটি নতুন সেশনের অ্যাপয়েন্টমেন্ট বুক করেছি।\n\n" .
                      "• নাম: $full_name\n" .
                      "• তারিখ: $appointment_date\n" .
                      "• সময়: " . ($appointment_time ?: 'আলোচনা সাপেক্ষে') . "\n" .
                      "• সার্ভিস: $service_type\n" .
                      "• ট্রানজেকশন আইডি: $transaction_id\n" .
                      "• ফোন: $wa_number\n";
        
        if (!empty($message)) {
            $wa_message .= "• বার্তা: $message\n";
        }

        $wa_message .= "\nদয়া করে আমার অ্যাপয়েন্টমেন্টটি নিশ্চিত করুন। ধন্যবাদ।";
        $wa_url = "https://wa.me/" . MAM_WHATSAPP . "?text=" . urlencode($wa_message);

        redirect($wa_url);

    } catch (PDOException $e) {
        set_flash('error', 'তথ্য সংরক্ষণে সমস্যা হয়েছে: ' . $e->getMessage());
        redirect('appointment.php');
    }
}

require_once 'includes/header.php';
?>

    <div class="max-w-7xl mx-auto py-12 md:py-20">
        <header class="max-w-3xl mb-16 animate-fade-in-up">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-secondary/5 text-secondary rounded-full text-xs font-bold uppercase tracking-widest mb-8 border border-secondary/10">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-secondary"></span>
                </span>
                Session Booking: Priority Access
            </div>
            <h1 class="text-4xl md:text-7xl font-extrabold text-secondary leading-[1.1] mb-8 font-manrope">
                Secure Your <span class="text-on-surface">Consultation</span>
            </h1>
            <p class="text-xl text-on-surface-variant/80 font-medium leading-relaxed">
                Take the next step in your child's development. Book a specialized session with Sharmin Mujahid at your convenient time.
            </p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <div class="lg:col-span-5 space-y-8">
                <div class="bg-white rounded-[2.5rem] p-8 md:p-10 whisper-shadow border border-outline-variant/10">
                    <h3 class="text-xl font-black text-secondary mb-6 font-bengali">অ্যাপয়েন্টমেন্ট গাইড</h3>
                    <div class="space-y-6">
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 rounded-xl bg-secondary/5 text-secondary flex items-center justify-center"><span class="material-symbols-outlined">schedule</span></div>
                            <div><h4 class="font-bold text-sm text-on-surface">সময় নির্বাচন</h4><p class="text-xs text-outline">আপনার সুবিধাজনক তারিখ ও সময় বেছে নিন।</p></div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div class="w-10 h-10 rounded-xl bg-secondary/5 text-secondary flex items-center justify-center"><span class="material-symbols-outlined">account_balance_wallet</span></div>
                            <div><h4 class="font-bold text-sm text-on-surface">বুকিং ফি</h4><p class="text-xs text-outline">ম্যামের সাথে নির্ধারিত ফি বিকাশে প্রদান করুন।</p></div>
                        </div>
                    </div>
                </div>

                <div class="bg-secondary text-white p-8 rounded-[2.5rem] shadow-xl shadow-secondary/20 relative overflow-hidden">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-white/60 mb-2">Payment Details</p>
                        <h4 class="text-3xl font-black font-manrope">01716437859</h4>
                        <p class="text-xs text-white/80 font-bengali mt-1">পার্সোনাল বিকাশ নম্বর (সেন্ড মানি)</p>
                    </div>
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                </div>
            </div>

            <div class="lg:col-span-7">
                <div class="bg-white rounded-[2.5rem] p-8 md:p-14 whisper-shadow border border-outline-variant/10">
                    <form action="appointment.php" method="POST" id="appointmentForm" class="space-y-10">
                        <section class="space-y-6">
                            <h3 class="text-lg font-black text-secondary border-l-4 border-primary pl-4 font-bengali">আপনার পরিচয় (Identification)</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">Full Name</label>
                                    <input name="full_name" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold" placeholder="আব্দুল্লাহ আল মামুন" type="text" required>
                                </div>
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">Email Address</label>
                                    <input name="email" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold" placeholder="example@mail.com" type="email" required>
                                </div>
                            </div>
                            <div class="relative group">
                                <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">Dashboard Password</label>
                                <input name="password" class="w-full bg-white border-2 border-surface-container-high rounded-2xl pl-14 pr-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold" placeholder="••••••••" type="password" required>
                                <div class="absolute left-6 top-1/2 -translate-y-1/2 text-outline-variant transition-all"><span class="material-symbols-outlined text-lg">lock_open</span></div>
                            </div>
                        </section>

                        <section class="space-y-6">
                            <h3 class="text-lg font-black text-secondary border-l-4 border-primary pl-4 font-bengali">সেশন ডিটেইলস (Session Matrix)</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">WhatsApp Number</label>
                                    <input name="whatsapp" class="w-full bg-white border-2 border-surface-container-high rounded-2xl pl-14 pr-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold" placeholder="017XXXXXXXX" type="tel" required>
                                </div>
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">Service Provider</label>
                                    <div class="w-full bg-surface-container-low rounded-2xl px-6 py-4 flex items-center gap-3 border border-outline-variant/10"><span class="font-bold text-sm text-secondary">Sharmin Mujahid (Mam)</span></div>
                                </div>
                            </div>

                            <div class="relative group">
                                <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">Select Service</label>
                                <select name="service_type" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold font-bengali appearance-none" required>
                                    <option value="">নির্বাচন করুন</option>
                                    <option value="Developmental Screening & Basic Assessment">Developmental Screening & Basic Assessment</option>
                                    <option value="Parent Counseling & Guidance">Parent Counseling & Guidance</option>
                                    <option value="Behavior Management Support">Behavior Management Support</option>
                                    <option value="Home-based Training Plans">Home-based Training Plans</option>
                                    <option value="Early Intervention Support">Early Intervention Support</option>
                                    <option value="Individualized Support Plan (ISP)">Individualized Support Plan (ISP)</option>
                                </select>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">Appointment Date</label>
                                    <input name="appointment_date" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold" type="date" required min="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">Preferred Time</label>
                                    <input name="appointment_time" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-secondary transition-all font-bold" placeholder="যেমন: বিকেল ৪টা" type="text">
                                </div>
                            </div>

                            <div class="relative group mt-8">
                                <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">Payment Transaction ID</label>
                                <input name="transaction_id" class="w-full bg-surface-container-low rounded-2xl px-6 py-5 border-2 border-dashed border-secondary/20 focus:border-solid focus:border-secondary transition-all font-manrope font-bold text-lg text-secondary" placeholder="TRN123456" type="text" required>
                            </div>
                        </section>

                        <button type="submit" class="w-full bg-secondary text-white py-5 rounded-3xl font-black text-xl shadow-xl shadow-secondary/20 hover:shadow-secondary/40 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-4 group">
                            <span class="font-bengali">বুকিং সম্পন্ন করুন</span>
                            <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">calendar_add_on</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php require_once 'includes/footer.php'; ?>
