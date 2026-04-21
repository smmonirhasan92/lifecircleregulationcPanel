<?php
require_once __DIR__ . '/header.php';
require_admin();

// Unified query to get all unique whatsapp numbers from users, enrollments, and appointments
$query = "
    SELECT whatsapp_number, name, email, 'Client' as source, created_at FROM users WHERE role = 'client'
    UNION
    SELECT whatsapp_number, full_name as name, email, 'Enrollment' as source, created_at FROM enrollments
    UNION
    SELECT whatsapp_number, full_name as name, email, 'Appointment' as source, created_at FROM appointments
    ORDER BY created_at DESC
";

$stmt = $pdo->query("
    SELECT whatsapp_number, name, email, source, MAX(created_at) as last_activity
    FROM ($query) as combined
    WHERE whatsapp_number IS NOT NULL AND whatsapp_number != ''
    GROUP BY whatsapp_number, name, email
    ORDER BY last_activity DESC
");
$clients = $stmt->fetchAll();
?>

<div class="space-y-10">
    <header class="flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-black">Client Management</h2>
            <p class="text-gray-500 font-bold text-sm">Unified list of all users and leads.</p>
        </div>
        <div class="bg-primary text-white px-6 py-2 rounded-full font-bold text-xs">
            Total Contacts: <?php echo count($clients); ?>
        </div>
    </header>

    <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm border border-gray-100">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Name & Activity</th>
                    <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">WhatsApp</th>
                    <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Email</th>
                    <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Source</th>
                    <th class="px-8 py-4 text-[10px] font-black uppercase text-gray-400 tracking-widest">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <?php foreach ($clients as $client): ?>
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-8 py-6">
                            <h4 class="text-sm font-black text-gray-800"><?php echo htmlspecialchars($client->name); ?></h4>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-tight">Last Activity: <?php echo date('M d, Y', strtotime($client->last_activity)); ?></p>
                        </td>
                        <td class="px-8 py-6">
                            <a href="https://wa.me/<?php echo $client->whatsapp_number; ?>" target="_blank" class="text-emerald-600 font-bold text-xs flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">call</span> <?php echo $client->whatsapp_number; ?>
                            </a>
                        </td>
                        <td class="px-8 py-6 text-xs font-bold text-gray-500">
                            <?php echo htmlspecialchars($client->email); ?>
                        </td>
                        <td class="px-8 py-6">
                             <span class="text-[9px] font-black uppercase px-2 py-1 rounded bg-gray-100 text-gray-400"><?php echo $client->source; ?></span>
                        </td>
                        <td class="px-8 py-6">
                            <a href="client-profile.php?whatsapp=<?php echo urlencode($client->whatsapp_number); ?>" class="bg-gray-50 text-gray-400 p-2 rounded-lg hover:bg-primary hover:text-white transition-all inline-flex items-center">
                                <span class="material-symbols-outlined text-sm">person</span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
