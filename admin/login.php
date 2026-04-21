<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/auth.php';

if (is_admin()) {
    redirect('index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND role = 'admin'");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_role'] = 'admin';
            $_SESSION['user_name'] = $user->name;
            
            set_flash('success', 'Admin login successful.');
            redirect('index.php');
        } else {
            $error = 'Invalid admin credentials.';
        }
    } catch (PDOException $e) {
        $error = 'Database error: ' . $e->getMessage();
        if (strpos($e->getMessage(), "Unknown column 'role'") !== false) {
            $error = 'Database missing "role" column. Please run the migration SQL provided.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Life Circle</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fdfaf5] min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-black text-[#1b4332] tracking-tighter uppercase">Admin Portal</h1>
            <p class="text-gray-500 font-bold text-sm mt-2">Login with your administrator credentials</p>
        </div>

        <div class="bg-white p-10 rounded-[2.5rem] shadow-2xl shadow-green-900/5 border border-gray-100">
            <?php if(isset($error)): ?>
                <div class="mb-6 bg-red-50 text-red-600 p-4 rounded-xl text-xs font-bold text-center">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST" class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest ml-1">Email Address</label>
                    <input name="email" type="email" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-[#1b4332] transition-all" placeholder="admin@lifecircle.com" required>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest ml-1">Password</label>
                    <input name="password" type="password" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-[#1b4332] transition-all" placeholder="••••••••" required>
                </div>
                <button type="submit" class="w-full bg-[#1b4332] text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-lg shadow-green-900/20 hover:-translate-y-0.5 transition-all">
                    Enter Dashboard
                </button>
            </form>
        </div>
    </div>
</body>
</html>
