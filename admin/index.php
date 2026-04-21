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

$stmt = $pdo->prepare("SELECT * FROM enrollments $where ORDER BY created_at DESC");
$stmt->execute($params);
$enrollments = $stmt->fetchAll();

// Stats
$stats = (object)[
    'total' => $pdo->query("SELECT COUNT(*) FROM enrollments")->fetchColumn(),
    'pending' => $pdo->query("SELECT COUNT(*) FROM enrollments WHERE status = 'pending'")->fetchColumn(),
    'active' => $pdo->query("SELECT COUNT(*) FROM enrollments WHERE status = 'active'")->fetchColumn(),
    'completed' => $pdo->query("SELECT COUNT(*) FROM enrollments WHERE status = 'completed'")->fetchColumn(),
];
?>

<div class="space-y-10">
    <header class="flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-black tracking-tight">Active Enrollments</h2>
            <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mt-1">Monitoring pending leads and active students.</p>
        </div>
        <!-- Search Bar -->
        <form action="index.php" method="GET" class="relative group">
            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search identity or TX..." class="bg-white border border-gray-100 rounded-2xl px-6 py-3 text-sm font-bold focus:ring-2 focus:ring-primary focus:border-transparent transition-all w-72 shadow-sm">
            <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 group-hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-lg">search</span>
            </button>
        </form>
    </header>

    <!-- Metrics Sidebar -->
    <section class="grid grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm transition-all hover:shadow-md">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Total Leads</p>
            <h3 class="text-3xl font-black text-primary"><?php echo $stats->total; ?></h3>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm transition-all hover:shadow-md">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Pending</p>
            <h3 class="text-3xl font-black text-orange-500"><?php echo $stats->pending; ?></h3>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm transition-all hover:shadow-md">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Active</p>
            <h3 class="text-3xl font-black text-blue-500"><?php echo $stats->active; ?></h3>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm transition-all hover:shadow-md">
            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Completed</p>
            <h3 class="text-3xl font-black text-emerald-500"><?php echo $stats->completed; ?></h3>
        </div>
    </section>

    <!-- Ledger Table -->
    <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-gray-100">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Client Identity</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Service Group</th>
                    <th class="px-6 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Payment TX</th>
                    <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Management</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <?php foreach ($enrollments as $e): ?>
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 font-black text-xs uppercase group-hover:bg-primary group-hover:text-white transition-all">
                                    <?php echo substr($e->full_name, 0, 1); ?>
                                </div>
                                <div>
                                    <h4 class="text-sm font-black text-gray-800 leading-none mb-1"><?php echo htmlspecialchars($e->full_name); ?></h4>
                                    <p class="text-[10px] font-bold text-gray-400"><?php echo htmlspecialchars($e->email); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-6 font-bold text-xs text-gray-500">
                            <?php echo htmlspecialchars($e->service_type); ?>
                        </td>
                        <td class="px-6 py-6">
                            <span class="bg-primary/5 text-primary text-[10px] font-black px-3 py-1 rounded-lg border border-primary/10"><?php echo $e->transaction_id; ?></span>
                        </td>
                        <td class="px-8 py-6">
                            <form action="update_status.php" method="POST" class="flex gap-2">
                                <input type="hidden" name="type" value="enrollment">
                                <input type="hidden" name="id" value="<?php echo $e->id; ?>">
                                <select name="status" class="bg-gray-50 border-none rounded-xl px-3 py-2 text-[10px] font-black uppercase focus:ring-2 focus:ring-primary">
                                    <option value="pending" <?php echo $e->status == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="active" <?php echo $e->status == 'active' ? 'selected' : ''; ?>>Active</option>
                                    <option value="completed" <?php echo $e->status == 'completed' ? 'selected' : ''; ?>>Complete</option>
                                    <option value="canceled" <?php echo $e->status == 'canceled' ? 'selected' : ''; ?>>Cancel</option>
                                </select>
                                <button type="submit" class="p-2 text-primary hover:bg-primary hover:text-white rounded-lg transition-all">
                                    <span class="material-symbols-outlined text-sm">save</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($enrollments)): ?>
                    <tr><td colspan="4" class="px-8 py-20 text-center text-gray-400 italic">No enrollments found matching "<?php echo htmlspecialchars($search); ?>"</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
