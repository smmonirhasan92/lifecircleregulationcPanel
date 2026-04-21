<?php
require_once 'includes/header.php';
require_login();

$user_id = $_SESSION['user_id'];

// Get user profile info
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$profile = $stmt->fetch();

// Fetch activity
$stmt = $pdo->prepare("SELECT * FROM enrollments WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$user_id]);
$enrolls = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT * FROM appointments WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$user_id]);
$appts = $stmt->fetchAll();
?>

<main class="pt-32 pb-20 px-6 min-h-screen bg-surface">
    <div class="max-w-6xl mx-auto space-y-12">
        <header class="flex justify-between items-end">
            <div>
                <h1 class="text-4xl font-black text-primary tracking-tight">Welcome, <?php echo htmlspecialchars($profile->name); ?></h1>
                <p class="text-gray-400 font-bold text-sm uppercase tracking-widest mt-2">Your Personal Development Dashboard</p>
            </div>
            <div class="hidden lg:block">
                <a href="settings.php" class="bg-white px-6 py-3 rounded-2xl border border-gray-100 shadow-sm font-black text-xs text-primary hover:bg-primary hover:text-white transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">settings</span>
                    Account Settings
                </a>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <!-- Profile Card -->
            <div class="lg:col-span-4 space-y-8">
                <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm space-y-6">
                    <div class="w-20 h-20 rounded-3xl bg-primary/5 flex items-center justify-center text-primary mb-6">
                        <span class="material-symbols-outlined text-4xl">person_pin</span>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <p class="text-[10px] font-black uppercase text-gray-300 tracking-widest mb-1">Full Name</p>
                            <h3 class="font-black text-gray-800 tracking-tight"><?php echo htmlspecialchars($profile->name); ?></h3>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase text-gray-300 tracking-widest mb-1">WhatsApp Number</p>
                            <h3 class="font-black text-emerald-600 tracking-tight"><?php echo $profile->whatsapp_number; ?></h3>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase text-gray-300 tracking-widest mb-1">Email Identity</p>
                            <h3 class="font-black text-gray-500 tracking-tight text-sm"><?php echo htmlspecialchars($profile->email); ?></h3>
                        </div>
                    </div>
                    <hr class="border-gray-50">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                        <p class="text-xs font-bold text-gray-400">Account Status: Verified</p>
                    </div>
                </div>
            </div>

            <!-- Main Activity -->
            <div class="lg:col-span-8 space-y-12">
                <!-- Course Enrollments -->
                <section class="space-y-6">
                    <h3 class="text-xl font-black text-primary flex items-center gap-3">
                        <span class="material-symbols-outlined">school</span>
                        Ongoing Enrollments
                    </h3>
                    <div class="grid grid-cols-1 gap-4">
                        <?php if (empty($enrolls)): ?>
                            <div class="bg-gray-50 p-10 rounded-[2rem] border-2 border-dashed border-gray-100 text-center text-gray-400 italic">
                                No active enrollments found.
                            </div>
                        <?php endif; ?>
                        <?php foreach ($enrolls as $e): ?>
                            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex justify-between items-center group hover:-translate-x-1 transition-all">
                                <div>
                                    <h4 class="font-black text-gray-800 text-sm mb-1"><?php echo htmlspecialchars($e->service_type); ?></h4>
                                    <p class="text-[10px] font-bold text-gray-400">Enrolled: <?php echo date('M d, Y', strtotime($e->created_at)); ?></p>
                                </div>
                                <div class="text-right">
                                    <span class="bg-gray-50 px-4 py-2 rounded-full text-[10px] font-black uppercase text-gray-400 group-hover:bg-primary group-hover:text-white transition-all"><?php echo $e->status; ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <!-- Session Appointments -->
                <section class="space-y-6">
                    <h3 class="text-xl font-black text-primary flex items-center gap-3">
                        <span class="material-symbols-outlined">calendar_today</span>
                        Scheduled Sessions
                    </h3>
                    <div class="grid grid-cols-1 gap-4">
                        <?php if (empty($appts)): ?>
                            <div class="bg-gray-50 p-10 rounded-[2rem] border-2 border-dashed border-gray-100 text-center text-gray-400 italic">
                                No appointments booked yet.
                            </div>
                        <?php endif; ?>
                        <?php foreach ($appts as $a): ?>
                            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex justify-between items-center group hover:-translate-x-1 transition-all border-l-4 border-emerald-500">
                                <div>
                                    <h4 class="font-black text-gray-800 text-sm mb-1"><?php echo date('l, M d', strtotime($a->appointment_date)); ?></h4>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter"><?php echo htmlspecialchars($a->service_type); ?></p>
                                </div>
                                <div class="text-right">
                                    <span class="bg-emerald-50 px-4 py-2 rounded-full text-[10px] font-black uppercase text-emerald-600"><?php echo $a->status; ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<?php require_once 'includes/footer.php'; ?>
