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
    $transaction_id = sanitize($_POST['transaction_id']);
    $message = sanitize($_POST['message'] ?? '');

    // Validation
    if (empty($full_name) || empty($email) || empty($password) || empty($whatsapp) || empty($service_type) || empty($transaction_id)) {
        set_flash('error', 'সবগুলো ঘর সঠিকভাবে পূরণ করুন। (Please fill all fields)');
        redirect('enroll.php');
    }

    $wa_number = format_whatsapp($whatsapp);

    // 1. User Management (Sync with DB)
    $stmt = $pdo->prepare("SELECT id FROM users WHERE whatsapp_number = ? OR email = ?");
    $stmt->execute([$wa_number, $email]);
    $user = $stmt->fetch();

    if (!$user) {
        // Create new user
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, whatsapp_number, password, role, created_at, updated_at) VALUES (?, ?, ?, ?, 'client', NOW(), NOW())");
        $stmt->execute([$full_name, $email, $wa_number, $hashed_password]);
        $user_id = $pdo->lastInsertId();
    } else {
        $user_id = $user->id;
    }

    // 2. Save Enrollment
    try {
        $stmt = $pdo->prepare("INSERT INTO enrollments (user_id, full_name, email, whatsapp_number, service_type, transaction_id, message, status, is_paid, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', 0, NOW(), NOW())");
        $stmt->execute([$user_id, $full_name, $email, $wa_number, $service_type, $transaction_id, $message]);
        
        // Auto-login
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_role'] = 'client';

        // 3. WhatsApp Redirect
        $wa_message = "আসসালামু আলাইকুম শারমিন মুজাহিদ ম্যাম,\n\n" .
                      "আমি নতুন রিলেশনাল ওয়েলনেস সেশনের জন্য আবেদন করেছি। আমার তথ্যাবলি নিচে দেয়া হলো:\n\n" .
                      "• নাম: $full_name\n" .
                      "• সার্ভিস: $service_type\n" .
                      "• ট্রানজেকশন আইডি: $transaction_id\n" .
                      "• ফোন: $wa_number\n";
        
        if (!empty($message)) {
            $wa_message .= "• বার্তা: $message\n";
        }

        $wa_message .= "\nদয়া করে আমার সেশনটি নিশ্চিত করুন। ধন্যবাদ।";
        $wa_url = "https://wa.me/" . MAM_WHATSAPP . "?text=" . urlencode($wa_message);

        redirect($wa_url);

    } catch (PDOException $e) {
        set_flash('error', 'তথ্য সংরক্ষণে সমস্যা হয়েছে: ' . $e->getMessage());
        redirect('enroll.php');
    }
}

$early_bird_deadline = get_setting('early_bird_deadline');

require_once 'includes/header.php';
?>

<main class="min-h-screen pt-12 pb-24 px-6 bg-surface-container-low/30 relative overflow-hidden">
    <!-- Abstract Background Elements -->
    <div class="absolute top-0 right-0 -mr-32 -mt-32 w-[600px] h-[600px] bg-primary/5 rounded-full blur-3xl -z-10"></div>
    <div class="absolute bottom-0 left-0 -ml-32 -mb-32 w-[600px] h-[600px] bg-secondary/5 rounded-full blur-3xl -z-10"></div>

    <div class="max-w-7xl mx-auto">
        <header class="max-w-3xl mb-16 reveal">
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-primary/10 text-primary rounded-full text-[10px] font-black uppercase tracking-widest mb-6">
                Registration Phase: Active
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-primary leading-[1.1] md:-tracking-[0.03em] mb-6 font-bengali">
                নতুন সম্ভাবনার পথে <span class="text-on-surface">প্রথম পদক্ষেপ</span> নিন।
            </h1>
            <p class="text-lg text-outline font-bengali">
                শারমিন মুজাহিদ ম্যামের বিশেষজ্ঞ গাইডেন্সে আপনার বা আপনার সন্তানের উজ্জ্বল ভবিষ্যৎ বিনির্মাণে আমরা প্রতিশ্রুতিবদ্ধ। সহজ ৪টি ধাপে রেজিষ্ট্রেশন সম্পন্ন করুন।
            </p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Left Side: Trust & Value -->
            <div class="lg:col-span-5 space-y-8">
                <div class="bg-white rounded-[2.5rem] p-8 md:p-10 whisper-shadow border border-outline-variant/10 relative overflow-hidden group">
                    <div class="relative z-10">
                        <div class="flex justify-between items-start mb-10">
                            <div>
                                <h3 class="text-xl font-black text-primary mb-1">কোর্স ফি ও অফার</h3>
                                <p class="text-xs text-outline font-bold uppercase tracking-widest">Pricing & Validity</p>
                            </div>
                            <div class="w-12 h-12 rounded-2xl bg-secondary/10 text-secondary flex items-center justify-center">
                                <span class="material-symbols-outlined">verified</span>
                            </div>
                        </div>
                        <div class="space-y-6">
                            <div class="p-6 rounded-3xl bg-surface-container-low border border-outline-variant/5">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-xs font-bold text-outline uppercase tracking-wider">Regular Admission</span>
                                    <span class="text-lg font-bold text-outline line-through opacity-50 font-manrope">৳৯,৯৯৯</span>
                                </div>
                                <div class="flex justify-between items-end">
                                    <div>
                                        <span class="bg-amber-100 text-amber-700 text-[9px] font-black px-2 py-0.5 rounded-full uppercase mb-1 inline-block">Special Early Bird</span>
                                        <h4 class="text-4xl font-black text-primary font-manrope tracking-tighter">৳৭,৯৯৯</h4>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-[10px] text-outline font-bold uppercase">Valid Until</p>
                                        <p class="text-xs font-black text-secondary">Deadline Ending</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step Visual -->
                <div class="bg-surface-container p-8 rounded-[2.5rem] space-y-6">
                    <h3 class="text-sm font-black text-primary uppercase tracking-widest mb-4">ভর্তির প্রক্রিয়া (Registration Steps)</h3>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-primary whisper-shadow"><span class="material-symbols-outlined text-lg">edit_note</span></div>
                            <div><h4 class="font-bold text-sm text-on-surface">তথ্য প্রদান</h4><p class="text-xs text-outline">নিচের ফর্মে সঠিক তথ্য দিয়ে পূরণ করুন।</p></div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-primary whisper-shadow"><span class="material-symbols-outlined text-lg">payments</span></div>
                            <div><h4 class="font-bold text-sm text-on-surface">ফি প্রদান</h4><p class="text-xs text-outline">বিকাশে পেমেন্ট করে ট্রানজেকশন আইডি দিন।</p></div>
                        </div>
                    </div>
                </div>

                <div class="bg-primary text-white p-8 rounded-[2.5rem] shadow-xl shadow-primary/20 relative overflow-hidden">
                    <div class="relative z-10 flex items-center justify-between">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-widest text-primary-container/60 mb-1">bKash Payment</p>
                            <h4 class="text-2xl font-black font-manrope">01716437859</h4>
                            <p class="text-[10px] font-bold mt-1 text-primary-container/80 font-bengali">পার্সোনাল নম্বর - সেন্ড মানি করুন</p>
                        </div>
                        <span class="material-symbols-outlined text-4xl opacity-20">wallet</span>
                    </div>
                </div>
            </div>

            <!-- Right Side: The Form -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-[2.5rem] p-8 md:p-14 whisper-shadow border border-outline-variant/10 relative">
                    <form action="enroll.php" method="POST" id="enrollmentForm" class="space-y-10">
                        <section class="space-y-6">
                            <h3 class="text-lg font-black text-primary border-l-4 border-secondary pl-4 font-bengali">ব্যক্তিগত তথ্য (Personal Data)</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">Full Name</label>
                                    <input name="full_name" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-primary transition-all font-bold" placeholder="যেমন: আব্দুল্লাহ আল মামুন" type="text" required>
                                </div>
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">Email Address</label>
                                    <input name="email" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-primary transition-all font-bold" placeholder="example@mail.com" type="email" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">WhatsApp Number</label>
                                    <input name="whatsapp" class="w-full bg-white border-2 border-surface-container-high rounded-2xl pl-14 pr-6 py-4 focus:ring-0 focus:border-primary transition-all font-bold" placeholder="017XXXXXXXX" type="tel" required>
                                    <div class="absolute left-6 top-1/2 -translate-y-1/2 text-outline-variant transition-all"><span class="material-symbols-outlined text-lg">call</span></div>
                                </div>
                                <div class="relative group">
                                    <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">Account Password</label>
                                    <input name="password" class="w-full bg-white border-2 border-surface-container-high rounded-2xl pl-14 pr-6 py-4 focus:ring-0 focus:border-primary transition-all font-bold" placeholder="••••••••" type="password" required>
                                    <div class="absolute left-6 top-1/2 -translate-y-1/2 text-outline-variant transition-all"><span class="material-symbols-outlined text-lg">lock</span></div>
                                </div>
                            </div>
                        </section>

                        <section class="space-y-6">
                            <div class="flex justify-between items-center border-l-4 border-secondary pl-4 mb-4">
                                <h3 class="text-lg font-black text-primary font-bengali">প্রোগ্রাম এবং পেমেন্ট (Details)</h3>
                                <button type="button" onclick="openSyllabusModal()" class="text-[11px] font-black text-secondary uppercase tracking-widest bg-secondary/10 px-4 py-2 rounded-full hover:bg-secondary/20 transition-all flex items-center gap-2 group border border-secondary/20">
                                    <span>See More</span>
                                    <span class="material-symbols-outlined text-[16px] group-hover:rotate-12 transition-transform">info</span>
                                </button>
                            </div>
                            <div class="relative group">
                                <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">Service Type</label>
                                <select name="service_type" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-primary transition-all font-bold font-bengali appearance-none" required>
                                    <option value="">নির্বাচন করুন</option>
                                    <option value="DMC Certificate Course">Developmental Disorder Management Certificate (DMC)</option>
                                    <option value="Developmental Screening & Basic Assessment">Developmental Screening & Basic Assessment</option>
                                    <option value="Parent Counseling & Guidance">Parent Counseling & Guidance</option>
                                    <option value="Behavior Management Support">Behavior Management Support</option>
                                    <option value="Home-based Training Plans">Home-based Training Plans</option>
                                    <option value="Early Intervention Support">Early Intervention Support</option>
                                    <option value="Individualized Support Plan (ISP)">Individualized Support Plan (ISP)</option>
                                </select>
                            </div>

                            <div class="relative group mt-8">
                                <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">bKash Transaction ID</label>
                                <input name="transaction_id" class="w-full bg-surface-container-high rounded-2xl px-6 py-5 border-2 border-dashed border-primary/20 focus:border-solid focus:border-primary transition-all font-manrope font-bold text-lg text-primary" placeholder="যেমন: TRN918237" type="text" required>
                            </div>

                            <div class="relative group mt-8">
                                <label class="text-[10px] font-bold text-outline-variant uppercase tracking-widest absolute -top-2.5 left-4 bg-white px-2 z-10">Additional Message (Optional)</label>
                                <textarea name="message" class="w-full bg-white border-2 border-surface-container-high rounded-2xl px-6 py-4 focus:ring-0 focus:border-primary transition-all font-bold" placeholder="আপনার সমস্যা বা লক্ষ্য সম্পর্কে কিছু বলুন..." rows="3"></textarea>
                            </div>
                        </section>

                        <button type="submit" class="w-full bg-primary text-white py-5 rounded-3xl font-black text-xl shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-4 group">
                            <span class="font-bengali">রেজিষ্ট্রেশন সম্পন্ন করুন</span>
                            <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Attractive Syllabus Modal -->
<div id="syllabusModal" class="fixed inset-0 z-[100] hidden overflow-y-auto bg-black/40 backdrop-blur-sm transition-opacity duration-300">
    <div class="min-h-screen px-4 py-12 flex items-center justify-center">
        <div class="bg-white max-w-2xl w-full rounded-[3rem] shadow-2xl whisper-shadow border border-outline-variant/10 overflow-hidden relative transform transition-all scale-95 opacity-0 duration-300" id="modalContainer">
            <!-- Modal Header -->
            <div class="bg-primary p-10 text-white relative">
                <button onclick="closeSyllabusModal()" class="absolute top-6 right-6 w-10 h-10 rounded-full bg-white/20 text-white flex items-center justify-center hover:bg-white/30 transition-all">
                    <span class="material-symbols-outlined">close</span>
                </button>
                <div class="flex items-center gap-4 mb-4">
                    <span class="material-symbols-outlined text-4xl">school</span>
                    <h2 class="text-2xl font-black font-bengali">কোর্স সিলেবাস ও বিস্তারিত</h2>
                </div>
                <p class="text-sm font-bold opacity-80 uppercase tracking-widest">🎓 Developmental Disorder Management Certificate (DMC)</p>
            </div>

            <!-- Modal Content -->
            <div class="p-10 space-y-10 max-h-[60vh] overflow-y-auto custom-scrollbar">
                <!-- Syllabus Section -->
                <section>
                    <h3 class="text-sm font-black text-primary uppercase tracking-widest mb-6 flex items-center gap-2">
                        <span class="w-2 h-4 bg-secondary rounded-full"></span>
                        📚 Course Syllabus (Module Overview)
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php 
                        $modules = [
                            "Foundations of Education & Learning",
                            "Child Growth & Development",
                            "Developmental Disorders – Overview",
                            "Autism Spectrum Disorder (ASD)",
                            "Attention Deficit Hyperactivity Disorder (ADHD)",
                            "Intellectual Disability (ID) (Mild, Moderate, Severe, Profound)",
                            "Specific Learning Disorders (SLD) (Dyslexia, Dysgraphia, Dyscalculia)",
                            "Communication Disorders",
                            "Motor & Neurodevelopmental Conditions (Cerebral Palsy & Down Syndrome)",
                            "Child Mental Health & Behavior",
                            "Inclusive Education & Teaching Strategies",
                            "Disability Rights, Ethics & Basic Assessment"
                        ];
                        foreach($modules as $i => $module): ?>
                            <div class="flex gap-4 p-4 rounded-2xl bg-surface-container-low border border-outline-variant/10 group/item hover:border-primary/20 transition-all">
                                <span class="text-xs font-black text-secondary/40 font-manrope"><?php echo sprintf('%02d', $i+1); ?></span>
                                <p class="text-xs font-bold text-on-surface"><?php echo $module; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-t border-outline-variant/10 pt-10">
                    <!-- Marks -->
                    <section class="bg-surface-container-high/50 p-8 rounded-[2rem] border border-primary/5">
                        <h3 class="text-xs font-black text-primary uppercase tracking-widest mb-6 px-1">📊 Evaluation System</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between border-b border-outline-variant/10 pb-2"><span class="text-[11px] font-bold">Subject Assessment</span><span class="text-[11px] font-black text-secondary">50 Marks</span></div>
                            <div class="flex justify-between border-b border-outline-variant/10 pb-2"><span class="text-[11px] font-bold">Assignment</span><span class="text-[11px] font-black text-secondary">20 Marks</span></div>
                            <div class="flex justify-between border-b border-outline-variant/10 pb-2"><span class="text-[11px] font-bold">Presentation</span><span class="text-[11px] font-black text-secondary">20 Marks</span></div>
                            <div class="flex justify-between"><span class="text-[11px] font-bold">Attendance</span><span class="text-[11px] font-black text-secondary">10 Marks</span></div>
                            <div class="mt-4 pt-4 border-t-2 border-primary/10 flex justify-between"><span class="text-sm font-black text-primary">Total</span><span class="text-sm font-black text-primary">100 Marks</span></div>
                        </div>
                    </section>

                    <!-- Focus -->
                    <section class="bg-emerald-50/50 p-8 rounded-[2rem] border border-emerald-100">
                        <h3 class="text-xs font-black text-emerald-800 uppercase tracking-widest mb-6 px-1">🌟 Program Focus</h3>
                        <ul class="space-y-4">
                            <li class="flex gap-3 text-xs font-bold text-emerald-900 items-start"><span class="material-symbols-outlined text-emerald-500 text-sm mt-0.5">check_circle</span> <span>Practical & skill-based learning</span></li>
                            <li class="flex gap-3 text-xs font-bold text-emerald-900 items-start"><span class="material-symbols-outlined text-emerald-500 text-sm mt-0.5">check_circle</span> <span>Home & classroom application</span></li>
                            <li class="flex gap-3 text-xs font-bold text-emerald-900 items-start"><span class="material-symbols-outlined text-emerald-500 text-sm mt-0.5">check_circle</span> <span>Easy & understandable approach</span></li>
                            <li class="flex gap-3 text-xs font-bold text-emerald-900 items-start"><span class="material-symbols-outlined text-emerald-500 text-sm mt-0.5">check_circle</span> <span>Non-clinical training program</span></li>
                        </ul>
                    </section>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="p-8 bg-surface-container-high border-t border-outline-variant/10 text-center">
                <button onclick="closeSyllabusModal()" class="px-16 py-4 bg-primary text-white rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl shadow-primary/20 hover:-translate-y-1 transition-all">
                    Understood
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function openSyllabusModal() {
    const modal = document.getElementById('syllabusModal');
    const container = document.getElementById('modalContainer');
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.classList.add('opacity-100');
        container.classList.remove('scale-95', 'opacity-0');
        container.classList.add('scale-100', 'opacity-100');
    }, 10);
    document.body.style.overflow = 'hidden';
}

function closeSyllabusModal() {
    const modal = document.getElementById('syllabusModal');
    const container = document.getElementById('modalContainer');
    modal.classList.remove('opacity-100');
    container.classList.remove('scale-100', 'opacity-100');
    container.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }, 300);
}

// Close on backdrop click
document.getElementById('syllabusModal').addEventListener('click', function(e) {
    if (e.target === this) closeSyllabusModal();
});
</script>

<?php require_once 'includes/footer.php'; ?>
