<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/auth.php';

require_admin();

// Fetch current settings
$stmt = $pdo->query("SELECT * FROM settings");
$settings_raw = $stmt->fetchAll();
$settings = [];
foreach ($settings_raw as $s) {
    $settings[$s->key] = $s->value;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_settings'])) {
    foreach ($_POST['settings'] as $key => $value) {
        $stmt = $pdo->prepare("INSERT INTO settings (`key`, `value`, updated_at) VALUES (?, ?, NOW()) ON DUPLICATE KEY UPDATE `value` = ?, updated_at = NOW()");
        $stmt->execute([$key, $value, $value]);
    }
    set_flash('success', 'Course settings updated successfully.');
    redirect('settings.php');
}

require_once __DIR__ . '/header.php';
?>

<div class="max-w-4xl space-y-12">
    <header>
        <h2 class="text-3xl font-black tracking-tight">Course Management</h2>
        <p class="text-gray-400 font-bold text-xs uppercase tracking-widest mt-1">Configure global course parameters and display settings.</p>
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
        <!-- Settings Form -->
        <div class="bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm">
            <h3 class="text-lg font-black mb-8 flex items-center gap-2 text-primary">
                <span class="material-symbols-outlined">tune</span>
                Global Parameters
            </h3>
            
            <form action="settings.php" method="POST" class="space-y-8">
                <input type="hidden" name="update_settings" value="1">
                
                <!-- Early Bird Deadline -->
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase text-gray-400 tracking-widest ml-1">DMC Early Bird Deadline</label>
                    <div class="relative">
                        <input name="settings[early_bird_deadline]" type="datetime-local" value="<?php echo htmlspecialchars($settings['early_bird_deadline'] ?? ''); ?>" class="w-full bg-gray-50 border-none rounded-2xl px-6 py-4 focus:ring-2 focus:ring-primary transition-all font-bold text-sm">
                        <span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-gray-300">event</span>
                    </div>
                    <p class="text-[10px] text-gray-300 italic px-1">This date controls the "Special Offer" countdown on the home page.</p>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-primary text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-lg shadow-green-900/10 hover:-translate-y-0.5 transition-all">
                        Commit Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Help / Context -->
        <div class="space-y-6">
            <div class="bg-secondary/10 p-8 rounded-[2.5rem] border border-secondary/20">
                <h4 class="font-black text-primary mb-3 flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">lightbulb</span>
                    Quick Tip
                </h4>
                <p class="text-xs text-gray-600 leading-relaxed font-medium">
                    The <strong>Early Bird Deadline</strong> is a critical setting. When this date passes, the pricing banners on the home page will automatically update to show regular pricing if implemented in the logic.
                </p>
            </div>
            
            <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
                 <h4 class="font-black text-gray-400 text-[10px] uppercase tracking-widest mb-6">Recent System Activity</h4>
                 <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                        <p class="text-xs font-bold text-gray-500">Database connection stable</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                        <p class="text-xs font-bold text-gray-500">WhatsApp API tunnel active</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-gray-200"></div>
                        <p class="text-xs font-bold text-gray-400">Regular backup scheduled</p>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
