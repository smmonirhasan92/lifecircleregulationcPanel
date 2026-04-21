<?php
require_once __DIR__ . '/header.php';
require_admin();

// 1. Financial Stats
$enrollmentRev = $pdo->query("SELECT SUM(payment_amount) FROM enrollments WHERE is_paid = 1")->fetchColumn() ?: 0;
$appointmentRev = $pdo->query("SELECT SUM(payment_amount) FROM appointments WHERE is_paid = 1")->fetchColumn() ?: 0;
$totalRev = $enrollmentRev + $appointmentRev;

$pendingDuesCount = $pdo->query("SELECT COUNT(*) FROM enrollments WHERE is_paid = 0")->fetchColumn() + 
                   $pdo->query("SELECT COUNT(*) FROM appointments WHERE is_paid = 0")->fetchColumn();

// 2. Revenue by Service
$revByService = [];
$stmt = $pdo->query("SELECT service_type, SUM(payment_amount) as total FROM appointments WHERE is_paid = 1 GROUP BY service_type");
while ($row = $stmt->fetch()) {
    $revByService[$row->service_type] = $row->total;
}
if ($enrollmentRev > 0) {
    $revByService['DMC Certificate Course'] = ($revByService['DMC Certificate Course'] ?? 0) + $enrollmentRev;
}

// 3. Client Aggregation (Unique by WhatsApp)
$query = "
    SELECT whatsapp_number, name, email, 'client' as role, created_at FROM users WHERE role = 'client'
    UNION
    SELECT whatsapp_number, full_name as name, email, 'guest' as role, created_at FROM enrollments
    UNION
    SELECT whatsapp_number, full_name as name, email, 'guest' as role, created_at FROM appointments
";
$clientsQuery = "
    SELECT whatsapp_number, name, email, MAX(created_at) as last_seen 
    FROM ($query) as combined 
    WHERE whatsapp_number IS NOT NULL AND whatsapp_number != ''
    GROUP BY whatsapp_number, name, email 
    ORDER BY last_seen DESC 
    LIMIT 20
";
$recentClients = $pdo->query($clientsQuery)->fetchAll();
?>

<div class="space-y-12">
    <header>
        <h2 class="text-3xl font-black">Performance Analytics</h2>
        <p class="text-gray-500 font-bold text-sm">Real-time revenue and engagement tracking.</p>
    </header>

    <!-- Top Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
            <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest mb-1">Total Revenue</p>
            <h3 class="text-3xl font-black text-primary">৳<?php echo number_format($totalRev, 0); ?></h3>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
            <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest mb-1">Pending Invoices</p>
            <h3 class="text-3xl font-black text-orange-500"><?php echo $pendingDuesCount; ?></h3>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
            <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest mb-1">Total Enrollments</p>
            <h3 class="text-3xl font-black text-secondary"><?php echo $pdo->query("SELECT COUNT(*) FROM enrollments")->fetchColumn(); ?></h3>
        </div>
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
            <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest mb-1">Total Sessions</p>
            <h3 class="text-3xl font-black text-secondary"><?php echo $pdo->query("SELECT COUNT(*) FROM appointments")->fetchColumn(); ?></h3>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <!-- Revenue Distribution -->
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm space-y-6">
            <h3 class="text-lg font-black flex items-center gap-2">
                <span class="material-symbols-outlined text-secondary">pie_chart</span>
                Revenue by Service
            </h3>
            <div class="space-y-4">
                <?php foreach ($revByService as $service => $amount): ?>
                    <div class="flex justify-between items-center py-3 border-b border-gray-50">
                        <span class="text-xs font-bold text-gray-600"><?php echo htmlspecialchars($service); ?></span>
                        <span class="text-sm font-black text-primary">৳<?php echo number_format($amount, 0); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Recent Clients -->
        <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm space-y-6">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-black flex items-center gap-2">
                    <span class="material-symbols-outlined text-secondary">person_search</span>
                    Recent Interactions
                </h3>
                <a href="clients.php" class="text-[10px] font-black uppercase text-gray-400 hover:text-primary transition-colors">View All</a>
            </div>
            <div class="space-y-4">
                <?php foreach ($recentClients as $client): ?>
                    <div class="flex items-center justify-between group">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-primary group-hover:text-white transition-all">
                                <span class="material-symbols-outlined text-lg">person</span>
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-gray-800"><?php echo htmlspecialchars($client->name); ?></h4>
                                <p class="text-[10px] font-bold text-gray-400"><?php echo $client->whatsapp_number; ?></p>
                            </div>
                        </div>
                        <span class="text-[10px] font-bold text-gray-300"><?php echo date('M d', strtotime($client->last_seen)); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
