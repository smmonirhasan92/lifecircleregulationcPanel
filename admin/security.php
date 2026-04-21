<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/auth.php';

require_admin();

$admin_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_pass = $_POST['current_password'];
    $new_pass = $_POST['password'];
    $new_pass_conf = $_POST['password_confirmation'];

    if (empty($current_pass) || empty($new_pass) || empty($new_pass_conf)) {
        set_flash('error', 'Please fill all fields.');
    } elseif ($new_pass !== $new_pass_conf) {
        set_flash('error', 'New passwords do not match.');
    } elseif (strlen($new_pass) < 4) {
        set_flash('error', 'Password must be at least 4 characters.');
    } else {
        $stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->execute([$admin_id]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($current_pass, $admin->password)) {
            $hashed = password_hash($new_pass, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("UPDATE users SET password = ?, updated_at = NOW() WHERE id = ?");
            $stmt->execute([$hashed, $admin_id]);
            set_flash('success', 'Admin password updated successfully.');
        } else {
            set_flash('error', 'Current password is incorrect.');
        }
    }
    redirect('security.php');
}

require_once __DIR__ . '/header.php';
?>

<div class="max-w-md mx-auto space-y-10">
    <header class="text-center">
        <h2 class="text-3xl font-black text-primary">Admin Security</h2>
        <p class="text-gray-500 font-bold text-sm">Update your administrative credentials.</p>
    </header>

    <div class="bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm">
        <form action="security.php" method="POST" class="space-y-6">
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest ml-1">Current Password</label>
                <input name="current_password" type="password" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary" required>
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest ml-1">New Password</label>
                <input name="password" type="password" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary" required>
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest ml-1">Confirm New Password</label>
                <input name="password_confirmation" type="password" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary" required>
            </div>
            <button type="submit" class="w-full bg-primary text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-lg shadow-green-900/20 hover:-translate-y-0.5 transition-all">
                Update Admin Password
            </button>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
