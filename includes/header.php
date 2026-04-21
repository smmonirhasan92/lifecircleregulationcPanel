<?php require_once __DIR__ . '/config.php'; ?>
<?php require_once __DIR__ . '/functions.php'; ?>
<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Life Circle | Developmental Support Counselor'; ?></title>
    <meta name="description" content="Life Circle — Developmental Support Counselor with 15+ years experience. Services include developmental screening, parent counseling, behavior management, and the DMC Certificate Course.">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/logo.png">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Work+Sans:wght@300;400;500;600&family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&display=block" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary": "#1b4332", 
                        "on-primary": "#ffffff",
                        "primary-container": "#d8e2dc",
                        "secondary": "#2d6a4f",
                        "secondary-container": "#95d5b2",
                        "background": "#fdfaf5", 
                        "surface": "#fdfaf5",
                        "surface-container-low": "#f7f2ea",
                        "surface-container": "#f0ede5",
                        "on-surface": "#1b4332",
                        "on-surface-variant": "#405d4b",
                        "outline": "#787c75"
                    },
                    "fontFamily": {
                        "headline": ["Manrope"],
                        "body": ["Work Sans"],
                        "label": ["Work Sans"],
                        "bengali": ["Hind Siliguri", "sans-serif"]
                    }
                },
            },
        }
    </script>

    <style>
        /* Modern Transitions */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .reveal {
            opacity: 0;
            transform: translatey(40px);
            transition: all 1.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .reveal.active {
            opacity: 1;
            transform: translatey(0);
        }

        .whisper-shadow {
            box-shadow: 0 20px 40px rgba(27, 67, 50, 0.04);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Work Sans', sans-serif;
            background-color: #fdfaf5;
            color: #1b4332;
        }

        h1, h2, h3 {
            font-family: 'Manrope', sans-serif;
        }

        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined' !important;
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            font-feature-settings: 'liga';
        }

        nav.scrolled {
            height: 4.5rem;
            background-color: rgba(253, 250, 245, 0.9);
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }
        .btn-interact {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .btn-interact:active {
            transform: scale(0.95);
        }
    </style>
</head>
<body class="bg-surface text-on-surface selection:bg-secondary-container">

    <!-- Flash Messages -->
    <?php if ($error = get_flash('error')): ?>
    <div class="fixed top-24 left-1/2 -translate-x-1/2 z-[60] bg-red-50 text-red-600 px-6 py-3 rounded-2xl shadow-xl border border-red-100 font-bold animate-bounce">
        <?php echo $error; ?>
    </div>
    <?php endif; ?>
    
    <?php if ($success = get_flash('success')): ?>
    <div class="fixed top-24 left-1/2 -translate-x-1/2 z-[60] bg-green-50 text-green-600 px-6 py-3 rounded-2xl shadow-xl border border-green-100 font-bold animate-bounce">
        <?php echo $success; ?>
    </div>
    <?php endif; ?>

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 transition-all duration-500 organic-easing h-16 md:h-24 flex justify-between items-center px-4 md:px-8 lg:px-16 max-w-full" id="topNav">
        <div class="flex items-center gap-2 md:gap-3">
            <img alt="Life Circle Logo" class="h-8 w-8 md:h-12 md:w-12 object-contain" src="assets/logo.png">
            <div class="flex flex-col">
                <span class="text-base md:text-xl font-extrabold text-primary font-manrope leading-tight uppercase tracking-tight">Life Circle</span>
                <span class="text-[7px] md:text-[10px] text-secondary font-bold tracking-tighter uppercase">Counseling Services</span>
            </div>
        </div>
        <div class="hidden md:flex items-center gap-8 font-manrope font-bold tracking-tight">
            <a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="index.php#about">About</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="index.php#services">Services</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="index.php#contact">Contact</a>
            
            <?php if (is_logged_in()): ?>
                <?php if (is_admin()): ?>
                    <a class="text-secondary bg-secondary/5 px-4 py-2 rounded-full hover:bg-secondary/10 transition-all text-sm" href="admin/index.php">Admin Portal</a>
                <?php else: ?>
                    <a class="text-secondary bg-secondary/5 px-4 py-2 rounded-full hover:bg-secondary/10 transition-all text-sm" href="dashboard.php">My Dashboard</a>
                <?php endif; ?>
                <form action="logout.php" method="POST" class="inline">
                    <button type="submit" class="text-red-400 hover:text-red-600 transition-colors text-xs uppercase tracking-widest">Logout</button>
                </form>
            <?php else: ?>
                <a class="text-on-surface-variant hover:text-primary transition-colors text-sm font-bold" href="login.php">Login</a>
                <a class="text-secondary bg-secondary/5 px-4 py-2 rounded-full hover:bg-secondary/10 transition-all text-sm font-bold" href="register.php">Register</a>
            <?php endif; ?>
        </div>
        <a href="enroll.php" class="btn-interact bg-primary text-on-primary px-3 md:px-6 py-1.5 md:py-2.5 rounded-full font-manrope font-bold hover:brightness-110 shadow-lg text-[9px] md:text-base whitespace-nowrap font-bengali">
            DMC কোর্সে ভর্তি হোন
        </a>
    </nav>

    <main class="pt-16 md:pt-24">
