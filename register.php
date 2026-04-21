<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
require_once 'includes/auth.php';

// Redirect if already logged in
if (is_logged_in()) {
    redirect(is_admin() ? 'admin/index.php' : 'dashboard.php');
}

// Handle Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $whatsapp = sanitize($_POST['whatsapp_number']);
    $password = $_POST['password'];
    $password_conf = $_POST['password_confirmation'];

    if (empty($name) || empty($email) || empty($whatsapp) || empty($password) || empty($password_conf)) {
        set_flash('error', 'সবগুলো ঘর পূরণ করুন।');
    } elseif ($password !== $password_conf) {
        set_flash('error', 'পাসওয়ার্ড দুটি মিলছে না।');
    } elseif (strlen($password) < 4) {
        set_flash('error', 'পাসওয়ার্ড কমপক্ষে ৪ অক্ষরের হতে হবে।');
    } else {
        $wa_number = format_whatsapp($whatsapp);
        
        // Check if user exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR whatsapp_number = ?");
        $stmt->execute([$email, $wa_number]);
        if ($stmt->fetch()) {
            set_flash('error', 'এই ইমেইল বা হোয়াটসঅ্যাপ নম্বর দিয়ে ইতিমধ্যে একটি অ্যাকাউন্ট আছে।');
        } else {
            // Create user
            $hashed = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, whatsapp_number, password, role, created_at, updated_at) VALUES (?, ?, ?, ?, 'client', NOW(), NOW())");
            $stmt->execute([$name, $email, $wa_number, $hashed]);
            
            $_SESSION['user_id'] = $pdo->lastInsertId();
            $_SESSION['user_role'] = 'client';
            $_SESSION['user_name'] = $name;
            
            set_flash('success', 'আপনার অ্যাকাউন্ট সফলভাবে তৈরি হয়েছে।');
            redirect('dashboard.php');
        }
    }
}

require_once 'includes/header.php';
?>

<main class="min-h-screen flex items-center justify-center bg-surface-container-low py-12 px-6">
    <div class="max-w-md w-full animate-fade-in-up">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-3xl bg-primary-container text-primary mb-6 shadow-xl shadow-primary/10">
                <span class="material-symbols-outlined text-4xl" style="font-variation-settings: 'FILL' 1;">person_add</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-primary -tracking-tight">নতুন অ্যাকাউন্ট</h1>
            <p class="text-on-surface-variant mt-2 font-bold font-bengali">আপনার তথ্য দিয়ে একটি অ্যাকাউন্ট তৈরি করুন।</p>
        </div>

        <div class="bg-white rounded-[2.5rem] p-10 whisper-shadow border border-outline-variant/10 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16 blur-3xl"></div>
            
            <form action="register.php" method="POST" class="space-y-6 relative z-10">
                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-outline ml-1">পূর্ণ নাম (Full Name)</label>
                    <div class="relative group">
                        <input name="name" class="w-full bg-surface-container-high border-none rounded-2xl pl-12 pr-4 py-4 focus:ring-2 focus:ring-primary focus:bg-white transition-all" placeholder="আপনার পূর্ণ নাম লিখুন" type="text" required>
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">
                            <span class="material-symbols-outlined text-xl">badge</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-outline ml-1">ইমেইল (Email)</label>
                    <div class="relative group">
                        <input name="email" class="w-full bg-surface-container-high border-none rounded-2xl pl-12 pr-4 py-4 focus:ring-2 focus:ring-primary focus:bg-white transition-all" placeholder="yourname@email.com" type="email" required>
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">
                            <span class="material-symbols-outlined text-xl">mail</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-outline ml-1">হোয়াটসঅ্যাপ নম্বর (WhatsApp)</label>
                    <div class="relative group">
                        <input name="whatsapp_number" class="w-full bg-surface-container-high border-none rounded-2xl pl-12 pr-4 py-4 focus:ring-2 focus:ring-primary focus:bg-white transition-all" placeholder="017XXXXXXXX" type="tel" required>
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">
                            <span class="material-symbols-outlined text-xl">call</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-outline ml-1">পাসওয়ার্ড (Password)</label>
                    <div class="relative group">
                        <input name="password" class="w-full bg-surface-container-high border-none rounded-2xl pl-12 pr-4 py-4 focus:ring-2 focus:ring-primary focus:bg-white transition-all" placeholder="কমপক্ষে ৪ অক্ষর" type="password" required>
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">
                            <span class="material-symbols-outlined text-xl">lock</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-outline ml-1">পাসওয়ার্ড নিশ্চিত করুন (Confirm)</label>
                    <div class="relative group">
                        <input name="password_confirmation" class="w-full bg-surface-container-high border-none rounded-2xl pl-12 pr-4 py-4 focus:ring-2 focus:ring-primary focus:bg-white transition-all" placeholder="আবার পাসওয়ার্ড লিখুন" type="password" required>
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">
                            <span class="material-symbols-outlined text-xl">lock_reset</span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-primary text-white py-4 rounded-2xl font-black text-lg shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all duration-300">
                    অ্যাকাউন্ট তৈরি করুন (Register)
                </button>
            </form>
        </div>

        <div class="mt-8 text-center">
            <p class="text-sm text-outline font-medium">
                আগে থেকে অ্যাকাউন্ট আছে? <a href="login.php" class="text-primary font-black hover:underline">লগইন করুন</a>
            </p>
        </div>
    </div>
</main>

<?php require_once 'includes/footer.php'; ?>
