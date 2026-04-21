<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
require_once 'includes/auth.php';

// Require login
require_login();

$user_id = $_SESSION['user_id'];

// Handle Password Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_pass = $_POST['current_password'];
    $new_pass = $_POST['password'];
    $new_pass_conf = $_POST['password_confirmation'];

    if (empty($current_pass) || empty($new_pass) || empty($new_pass_conf)) {
        set_flash('error', 'সবগুলো ঘর পূরণ করুন।');
    } elseif ($new_pass !== $new_pass_conf) {
        set_flash('error', 'নতুন পাসওয়ার্ড দুটি মিলছে না।');
    } elseif (strlen($new_pass) < 4) {
        set_flash('error', 'নতুন পাসওয়ার্ড কমপক্ষে ৪ অক্ষরের হতে হবে।');
    } else {
        // Verify current password
        $stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();

        if ($user && password_verify($current_pass, $user->password)) {
            // Update password
            $hashed = password_hash($new_pass, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("UPDATE users SET password = ?, updated_at = NOW() WHERE id = ?");
            $stmt->execute([$hashed, $user_id]);
            set_flash('success', 'পাসওয়ার্ড সফলভাবে পরিবর্তন করা হয়েছে।');
            redirect('dashboard.php');
        } else {
            set_flash('error', 'বর্তমান পাসওয়ার্ডটি সঠিক নয়।');
        }
    }
}

require_once 'includes/header.php';
?>

<main class="min-h-screen pt-24 pb-20 px-6">
    <div class="max-w-md mx-auto">
        <header class="mb-10 text-center">
            <h1 class="text-3xl font-black text-primary">প্রোফাইল সিকিউরিটি</h1>
            <p class="text-on-surface-variant font-bold font-bengali">আপনার অ্যাকাউন্টের পাসওয়ার্ড পরিবর্তন করুন।</p>
        </header>

        <div class="bg-white rounded-[2.5rem] p-10 whisper-shadow border border-outline-variant/10">
            <form action="settings.php" method="POST" class="space-y-6">
                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-outline ml-1">বর্তমান পাসওয়ার্ড (Current Password)</label>
                    <input name="current_password" class="w-full bg-surface-container-high border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary" type="password" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-outline ml-1">নতুন পাসওয়ার্ড (New Password)</label>
                    <input name="password" class="w-full bg-surface-container-high border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary" type="password" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-outline ml-1">নিশ্চিত করুন (Confirm New Password)</label>
                    <input name="password_confirmation" class="w-full bg-surface-container-high border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary" type="password" required>
                </div>

                <button type="submit" class="w-full bg-primary text-white py-4 rounded-2xl font-black text-lg shadow-xl shadow-primary/20 hover:shadow-primary/40 transition-all">
                    পাসওয়ার্ড আপডেট করুন
                </button>
                
                <a href="dashboard.php" class="block text-center text-sm font-bold text-outline hover:text-primary transition-colors mt-4">
                    ফিরে যান
                </a>
            </form>
        </div>
    </div>
</main>

<?php require_once 'includes/footer.php'; ?>
