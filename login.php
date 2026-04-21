<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
require_once 'includes/auth.php';

// Redirect if already logged in
if (is_logged_in()) {
    redirect(is_admin() ? 'admin/index.php' : 'dashboard.php');
}

// Handle Login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $whatsapp = sanitize($_POST['whatsapp_number']);
    $password = $_POST['password'];

    if (empty($whatsapp) || empty($password)) {
        set_flash('error', 'সবগুলো ঘর পূরণ করুন।');
    } else {
        $wa_number = format_whatsapp($whatsapp);
        
        $stmt = $pdo->prepare("SELECT * FROM users WHERE whatsapp_number = ?");
        $stmt->execute([$wa_number]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user->password)) {
            // Success
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_role'] = $user->role;
            $_SESSION['user_name'] = $user->name;

            set_flash('success', 'স্বাগতম, ' . $user->name);
            redirect($user->role === 'admin' ? 'admin/index.php' : 'dashboard.php');
        } else {
            set_flash('error', 'ভুল হোয়াটসঅ্যাপ নম্বর বা পাসওয়ার্ড।');
        }
    }
}

require_once 'includes/header.php';
?>

<main class="min-h-screen flex items-center justify-center bg-surface-container-low py-12 px-6">
    <div class="max-w-md w-full animate-fade-in-up">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-3xl bg-primary-container text-primary mb-6 shadow-xl shadow-primary/10">
                <span class="material-symbols-outlined text-4xl" style="font-variation-settings: 'FILL' 1;">face_6</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-primary -tracking-tight">সদস্য লগইন</h1>
            <p class="text-on-surface-variant mt-2 font-bold font-bengali">আপনার ড্যাশবোর্ড অ্যাক্সেস করতে লগইন করুন।</p>
        </div>

        <div class="bg-white rounded-[2.5rem] p-10 whisper-shadow border border-outline-variant/10 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full -mr-16 -mt-16 blur-3xl"></div>
            
            <form action="login.php" method="POST" class="space-y-8 relative z-10">
                <div class="space-y-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-outline ml-1">হোয়াটসঅ্যাপ নম্বর (WhatsApp Number)</label>
                        <div class="relative group">
                            <input name="whatsapp_number" class="w-full bg-surface-container-high border-none rounded-2xl pl-12 pr-4 py-4 focus:ring-2 focus:ring-primary focus:bg-white transition-all" placeholder="017XXXXXXXX" type="tel" required>
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">call</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-[10px] font-black uppercase tracking-widest text-outline ml-1">পাসওয়ার্ড (Password)</label>
                        <div class="relative group">
                            <input name="password" class="w-full bg-surface-container-high border-none rounded-2xl pl-12 pr-4 py-4 focus:ring-2 focus:ring-primary focus:bg-white transition-all" placeholder="••••••••" type="password" required>
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-outline group-focus-within:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">lock</span>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-primary text-white py-4 rounded-2xl font-black text-lg shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all duration-300">
                    লগইন করুন (Sign In)
                </button>
            </form>
        </div>

        <div class="mt-8 text-center">
            <p class="text-sm text-outline font-medium">
                নতুন সদস্য? <a href="enroll.php" class="text-primary font-black hover:underline">আজই ভর্তি হোন</a>
            </p>
        </div>
    </div>
</main>

<?php require_once 'includes/footer.php'; ?>
