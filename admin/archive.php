<?php
require_once __DIR__ . '/header.php';
require_admin();

// Fetch Completed Enrollments
$enrolls = $pdo->query("SELECT * FROM enrollments WHERE status = 'completed' ORDER BY updated_at DESC LIMIT 100")->fetchAll();

// Fetch Completed Appointments
$appts = $pdo->query("SELECT * FROM appointments WHERE status = 'completed' ORDER BY updated_at DESC LIMIT 100")->fetchAll();
?>

<div class="space-y-12">
    <header>
        <h2 class="text-3xl font-black">Record Archive</h2>
        <p class="text-gray-500 font-bold text-sm">Viewing all completed enrollments and sessions.</p>
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <!-- Completed Enrollments -->
        <section class="space-y-6">
            <h3 class="text-xl font-black text-gray-800 flex items-center gap-2">
                <span class="material-symbols-outlined text-emerald-600">verified</span>
                Completed Enrollments
            </h3>
            <div class="space-y-4">
                <?php foreach ($enrolls as $e): ?>
                    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="font-black text-primary text-sm"><?php echo htmlspecialchars($e->full_name); ?></h4>
                            <span class="text-[9px] font-black text-gray-400"><?php echo date('M d, Y', strtotime($e->updated_at)); ?></span>
                        </div>
                        <p class="text-[10px] font-bold text-gray-500"><?php echo htmlspecialchars($e->service_type); ?></p>
                        <div class="mt-4 flex justify-between items-center bg-gray-50 p-2 rounded-lg">
                            <span class="text-[9px] font-black text-emerald-700 uppercase">Paid: ৳<?php echo number_format($e->payment_amount, 0); ?></span>
                            <span class="text-[9px] font-bold text-gray-400">ID: #<?php echo $e->id; ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if(empty($enrolls)): ?>
                    <p class="text-gray-400 italic text-sm">No archived enrollments.</p>
                <?php endif; ?>
            </div>
        </section>

        <!-- Completed Appointments -->
        <section class="space-y-6">
            <h3 class="text-xl font-black text-gray-800 flex items-center gap-2">
                <span class="material-symbols-outlined text-emerald-600">check_circle</span>
                Completed Sessions
            </h3>
            <div class="space-y-4">
                <?php foreach ($appts as $a): ?>
                    <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="font-black text-primary text-sm"><?php echo htmlspecialchars($a->full_name); ?></h4>
                            <span class="text-[9px] font-black text-gray-400"><?php echo date('M d, Y', strtotime($a->updated_at)); ?></span>
                        </div>
                        <p class="text-[10px] font-bold text-gray-500"><?php echo htmlspecialchars($a->service_type); ?></p>
                        <div class="mt-4 flex justify-between items-center bg-gray-50 p-2 rounded-lg">
                            <span class="text-[9px] font-black text-emerald-700 uppercase">Fee: ৳<?php echo number_format($a->payment_amount, 0); ?></span>
                            <span class="text-[9px] font-bold text-gray-400">ID: #<?php echo $a->id; ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if(empty($appts)): ?>
                    <p class="text-gray-400 italic text-sm">No archived sessions.</p>
                <?php endif; ?>
            </div>
        </section>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
