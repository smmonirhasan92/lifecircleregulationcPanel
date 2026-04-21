<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/auth.php';

// Ensure user is admin
require_admin();

$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal | Life Circle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0F3D3E',
                        secondary: '#E2D5B5',
                        surface: '#F8F9FA',
                    },
                    fontFamily: {
                        manrope: ['Manrope', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    </style>
</head>
<body class="bg-surface font-outfit min-h-screen">

<div class="flex">
    <!-- Persistent Sidebar -->
    <nav class="w-64 bg-white border-r border-gray-100 flex flex-col py-10 fixed h-full shadow-sm">
        <div class="px-8 mb-12">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-primary flex items-center justify-center text-white shadow-lg">
                    <span class="material-symbols-outlined">shield_person</span>
                </div>
                <div>
                    <h1 class="text-sm font-black text-primary uppercase tracking-tighter leading-none">Admin Portal</h1>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Management v2.0</p>
                </div>
            </div>
        </div>

        <div class="flex-1 space-y-1 px-4 overflow-y-auto custom-scrollbar">
            <div class="px-4 py-2 text-[10px] font-black text-gray-300 uppercase tracking-widest">Operations</div>
            
            <a href="index.php" class="flex items-center gap-3 px-5 py-4 rounded-2xl transition-all font-bold <?php echo $current_page == 'index.php' ? 'bg-primary/5 text-primary border-l-4 border-primary shadow-sm' : 'text-gray-400 hover:bg-gray-50'; ?>">
                <span class="material-symbols-outlined text-xl">group</span>
                <span>Enrollments</span>
            </a>
            
            <a href="appointments.php" class="flex items-center gap-3 px-5 py-4 rounded-2xl transition-all font-bold <?php echo $current_page == 'appointments.php' ? 'bg-primary/5 text-primary border-l-4 border-primary shadow-sm' : 'text-gray-400 hover:bg-gray-50'; ?>">
                <span class="material-symbols-outlined text-xl">calendar_month</span>
                <span>Appointments</span>
            </a>

            <div class="pt-8 px-4 py-2 text-[10px] font-black text-gray-300 uppercase tracking-widest">Master Data</div>
            
            <a href="clients.php" class="flex items-center gap-3 px-5 py-4 rounded-2xl transition-all font-bold <?php echo $current_page == 'clients.php' || $current_page == 'client-profile.php' ? 'bg-primary/5 text-primary border-l-4 border-primary shadow-sm' : 'text-gray-400 hover:bg-gray-50'; ?>">
                <span class="material-symbols-outlined text-xl">contacts</span>
                <span>Clients</span>
            </a>
            
            <a href="reports.php" class="flex items-center gap-3 px-5 py-4 rounded-2xl transition-all font-bold <?php echo $current_page == 'reports.php' ? 'bg-primary/5 text-primary border-l-4 border-primary shadow-sm' : 'text-gray-400 hover:bg-gray-50'; ?>">
                <span class="material-symbols-outlined text-xl">analytics</span>
                <span>Analysis</span>
            </a>

            <div class="pt-8 px-4 py-2 text-[10px] font-black text-gray-300 uppercase tracking-widest">System</div>
            
            <a href="settings.php" class="flex items-center gap-3 px-5 py-4 rounded-2xl transition-all font-bold <?php echo $current_page == 'settings.php' ? 'bg-primary/5 text-primary border-l-4 border-primary shadow-sm' : 'text-gray-400 hover:bg-gray-50'; ?>">
                <span class="material-symbols-outlined text-xl">settings</span>
                <span>Course Management</span>
            </a>

            <a href="archive.php" class="flex items-center gap-3 px-5 py-4 rounded-2xl transition-all font-bold <?php echo $current_page == 'archive.php' ? 'bg-primary/5 text-primary border-l-4 border-primary shadow-sm' : 'text-gray-400 hover:bg-gray-50'; ?>">
                <span class="material-symbols-outlined text-xl">history_edu</span>
                <span>Archive</span>
            </a>

            <a href="security.php" class="flex items-center gap-3 px-5 py-4 rounded-2xl transition-all font-bold <?php echo $current_page == 'security.php' ? 'bg-primary/5 text-primary border-l-4 border-primary shadow-sm' : 'text-gray-400 hover:bg-gray-50'; ?>">
                <span class="material-symbols-outlined text-xl">security</span>
                <span>Security</span>
            </a>
        </div>

        <div class="px-4 mt-auto pt-8 border-t border-gray-50">
            <a href="../logout.php" class="flex items-center gap-3 text-red-500 hover:bg-red-50 px-5 py-4 rounded-2xl transition-all font-black">
                <span class="material-symbols-outlined text-xl">logout</span>
                <span>Sign Out</span>
            </a>
        </div>
    </nav>

    <!-- Main Content wrapper -->
    <main class="ml-64 flex-1 p-12">
        <!-- Flash Messages -->
        <?php if ($success = get_flash('success')): ?>
            <div class="mb-10 p-5 rounded-3xl flex items-center gap-4 animate-bounce bg-emerald-50 text-emerald-800 border border-emerald-100">
                <span class="material-symbols-outlined">check_circle</span>
                <p class="font-bold text-sm"><?php echo $success; ?></p>
            </div>
        <?php endif; ?>

        <?php if ($error = get_flash('error')): ?>
            <div class="mb-10 p-5 rounded-3xl flex items-center gap-4 animate-bounce bg-red-50 text-red-800 border border-red-100">
                <span class="material-symbols-outlined">error</span>
                <p class="font-bold text-sm"><?php echo $error; ?></p>
            </div>
        <?php endif; ?>
