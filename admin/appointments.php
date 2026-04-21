<?php
require_once __DIR__ . '/header.php';

// Prepare search query
$search = sanitize($_GET['search'] ?? '');
$where = "WHERE status NOT IN ('completed', 'canceled')";
$params = [];

if ($search) {
    $where .= " AND (full_name LIKE ? OR email LIKE ? OR whatsapp_number LIKE ? OR transaction_id LIKE ?)";
    $term = "%$search%";
    $params = [$term, $term, $term, $term];
}

$stmt = $pdo->prepare("SELECT * FROM appointments $where ORDER BY appointment_date DESC");
$stmt->execute($params);
$appointments = $stmt->fetchAll();

// Stats
$stats = (object)[
    'total' => $pdo->query("SELECT COUNT(*) FROM appointments")->fetchColumn(),
    'pending' => $pdo->query("SELECT COUNT(*) FROM appointments WHERE status = 'pending'")->fetchColumn(),
    'completed' => $pdo->query("SELECT COUNT(*) FROM appointments WHERE status = 'completed'")->fetchColumn(),
];
?>

<div class="space-y-10">
    <header class="flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-black tracking-tight">Active Appointments</h2>
            <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mt-1">Sessions management and scheduling.</p>
        </div>
        <!-- Search Bar -->
        <form action="appointments.php" method="GET" class="relative group">
            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search client or TX..." class="bg-white border border-gray-100 rounded-2xl px-6 py-3 text-sm font-bold focus:ring-2 focus:ring-primary focus:border-transparent transition-all w-72 shadow-sm">
            <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 group-hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-lg">search</span>
            </button>
        </form>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Total Bookings</p>
            <h3 class="text-3xl font-black text-primary"><?php echo $stats->total; ?></h3>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Pending Confirmation</p>
            <h3 class="text-3xl font-black text-orange-500"><?php echo $stats->pending; ?></h3>
        </div>
         <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Archived Sessions</p>
            <h3 class="text-3xl font-black text-emerald-500"><?php echo $stats->completed; ?></h3>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-gray-100">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Client</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Date & Service</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Payment</th>
                    <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Management</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <?php foreach ($appointments as $a): ?>
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-8 py-6">
                            <h4 class="text-sm font-black text-gray-800 leading-none mb-1"><?php echo htmlspecialchars($a->full_name); ?></h4>
                            <p class="text-[10px] font-bold text-gray-400 uppercase"><?php echo $a->whatsapp_number; ?></p>
                        </td>
                        <td class="px-6 py-6">
                            <p class="text-xs font-black text-primary mb-1"><?php echo date('M d, Y', strtotime($a->appointment_date)); ?></p>
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-tight"><?php echo htmlspecialchars($a->service_type); ?></span>
                        </td>
                        <td class="px-6 py-6">
                            <span class="bg-blue-50 text-blue-600 text-[10px] font-black px-3 py-1 rounded-lg border border-blue-100"><?php echo $a->transaction_id; ?></span>
                        </td>
                        <td class="px-8 py-6">
                            <form action="update_status.php" method="POST" class="flex gap-2">
                                <input type="hidden" name="type" value="appointment">
                                <input type="hidden" name="id" value="<?php echo $a->id; ?>">
                                <select name="status" class="bg-gray-50 border-none rounded-xl px-3 py-2 text-[10px] font-black uppercase focus:ring-2 focus:ring-primary">
                                    <option value="pending" <?php echo $a->status == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="active" <?php echo $a->status == 'active' ? 'selected' : ''; ?>>Confirmed</option>
                                    <option value="completed" <?php echo $a->status == 'completed' ? 'selected' : ''; ?>>Complete</option>
                                    <option value="canceled" <?php echo $a->status == 'canceled' ? 'selected' : ''; ?>>Cancel</option>
                                </select>
                                <button type="submit" class="p-2 text-primary hover:bg-primary hover:text-white rounded-lg transition-all">
                                    <span class="material-symbols-outlined text-sm">save</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($appointments)): ?>
                    <tr><td colspan="4" class="px-8 py-20 text-center text-gray-400 italic">No appointments found matching "<?php echo htmlspecialchars($search); ?>"</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
