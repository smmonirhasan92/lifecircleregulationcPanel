<?php
require_once __DIR__ . '/header.php';
require_admin();

if (!isset($_GET['whatsapp'])) {
    redirect('clients.php');
}

$wa_number = sanitize($_GET['whatsapp']);

// 1. Get Base Profile (from users table ideally, or from first record found)
$stmt = $pdo->prepare("SELECT * FROM users WHERE whatsapp_number = ? AND role = 'client'");
$stmt->execute([$wa_number]);
$user = $stmt->fetch();

if (!$user) {
    // Check enrollment table for name/email
    $stmt = $pdo->prepare("SELECT full_name as name, email FROM enrollments WHERE whatsapp_number = ? LIMIT 1");
    $stmt->execute([$wa_number]);
    $user = $stmt->fetch();
}

// 2. Get Enrollments
$stmt = $pdo->prepare("SELECT * FROM enrollments WHERE whatsapp_number = ? ORDER BY created_at DESC");
$stmt->execute([$wa_number]);
$enrolls = $stmt->fetchAll();

// 3. Get Appointments
$stmt = $pdo->prepare("SELECT * FROM appointments WHERE whatsapp_number = ? ORDER BY created_at DESC");
$stmt->execute([$wa_number]);
$appts = $stmt->fetchAll();
?>

<div class="space-y-12">
    <header class="flex items-center gap-6">
        <a href="clients.php" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-gray-400 hover:text-primary shadow-sm border border-gray-100 transition-all">
            <span class="material-symbols-outlined">arrow_back</span>
        </a>
        <div>
            <h2 class="text-3xl font-black text-primary"><?php echo htmlspecialchars($user->name ?? 'Unknown Client'); ?></h2>
            <p class="text-gray-500 font-bold text-sm">WhatsApp Activity History</p>
        </div>
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        <!-- Sidebar Info -->
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm space-y-6">
                <div class="space-y-4">
                    <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Contact Details</p>
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-emerald-600">call</span>
                        <span class="font-bold text-sm"><?php echo $wa_number; ?></span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-blue-600">mail</span>
                        <span class="font-bold text-sm"><?php echo htmlspecialchars($user->email ?? 'N/A'); ?></span>
                    </div>
                </div>
                <hr class="border-gray-50">
                <div class="space-y-2">
                    <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Client Status</p>
                    <span class="inline-block px-3 py-1 bg-primary text-white text-[10px] font-black uppercase rounded-full">Active Subscriber</span>
                </div>
            </div>
        </div>

        <!-- Main Timeline -->
        <div class="lg:col-span-8 space-y-10">
            <!-- Enrollments -->
            <section class="space-y-6">
                <h3 class="text-xl font-black text-gray-800 flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary">school</span>
                    Enrollment History
                </h3>
                <div class="space-y-4">
                    <?php if (empty($enrolls)): ?>
                        <p class="text-gray-400 italic text-sm">No course enrollments found.</p>
                    <?php endif; ?>
                    <?php foreach ($enrolls as $e): ?>
                        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex justify-between items-center">
                            <div>
                                <h4 class="font-black text-gray-800 text-sm"><?php echo htmlspecialchars($e->service_type); ?></h4>
                                <p class="text-[10px] font-bold text-gray-400"><?php echo date('M d, Y', strtotime($e->created_at)); ?></p>
                            </div>
                            <div class="text-right">
                                <span class="bg-gray-100 px-3 py-1 rounded-full text-[9px] font-black uppercase text-gray-500"><?php echo $e->status; ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Appointments -->
            <section class="space-y-6">
                <h3 class="text-xl font-black text-gray-800 flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary">psychology</span>
                    Session Appointments
                </h3>
                <div class="space-y-4">
                    <?php if (empty($appts)): ?>
                        <p class="text-gray-400 italic text-sm">No appointments found.</p>
                    <?php endif; ?>
                    <?php foreach ($appts as $a): ?>
                        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex justify-between items-center">
                            <div>
                                <h4 class="font-black text-gray-800 text-sm"><?php echo htmlspecialchars($a->service_type); ?></h4>
                                <p class="text-[10px] font-bold text-gray-400"><?php echo date('M d, Y', strtotime($a->appointment_date)); ?></p>
                            </div>
                            <div class="text-right">
                                <span class="bg-gray-100 px-3 py-1 rounded-full text-[9px] font-black uppercase text-gray-500"><?php echo $a->status; ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
