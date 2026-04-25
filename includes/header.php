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
    <!-- Core Libraries -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <!-- Swiper.js for Carousels -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- AOS for Scroll Animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1b4332',
                        secondary: '#527853',
                        blush: '#ffb5a7',
                        'primary-container': '#d8f3dc',
                        'secondary-container': '#b7e4c7',
                        'surface': '#fdfcf0',
                        'surface-container': '#f5f3e7',
                        'on-surface-variant': '#404944',
                        'outline': '#707973',
                    },
                    fontFamily: {
                        manrope: ['Manrope', 'sans-serif'],
                        sans: ['Work Sans', 'sans-serif'],
                        bengali: ['Hind Siliguri', 'sans-serif'],
                    },
                    boxShadow: {
                        'premium': '0 20px 50px rgba(27, 67, 50, 0.12)',
                        'whisper': '0 10px 30px rgba(0, 0, 0, 0.04)',
                    }
                }
            }
        }
    </script>

    <style>
        :root { scroll-behavior: smooth; }
        body { background-color: #fdfcf0; font-family: 'Work Sans', sans-serif; color: #1b4332; overflow-x: hidden; }
        
        h1, h2, h3 { font-family: 'Manrope', sans-serif; letter-spacing: -0.02em; }

        /* Glassmorphism Navigation */
        nav { transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
        nav.scrolled { 
            height: 4.5rem; 
            background: rgba(253, 252, 240, 0.85); 
            backdrop-filter: blur(20px); 
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05); 
        }

        /* Interactive Elements */
        .btn-interact { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden; }
        .btn-interact:hover { transform: translateY(-3px); box-shadow: 0 15px 30px rgba(27, 67, 50, 0.2); }
        .btn-interact:active { transform: scale(0.95); }

        /* Modal Styles */
        .modal-enter { opacity: 0; transform: scale(0.95); transition: all 0.3s ease-out; }
        .modal-visible { opacity: 1; transform: scale(1); }

        /* Robust Entrance Animations (No Scroll Required) */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 1s cubic-bezier(0.4, 0, 0.2, 1) forwards; }
        .animate-fade-in-right { animation: fadeInRight 1s cubic-bezier(0.4, 0, 0.2, 1) forwards; }
        
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        .animate-bounce-slow { animation: bounce-slow 4s ease-in-out infinite; }

        /* Custom Swiper Styles */
        .swiper-pagination-bullet-active { background: #1b4332 !important; }
    </style>
</head>
<body class="bg-surface text-on-surface selection:bg-secondary-container/30">

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
            <a href="index.php" class="flex items-center gap-2 md:gap-3">
                <img alt="Life Circle Logo" class="h-8 w-8 md:h-12 md:w-12 object-contain" src="assets/logo.png">
                <div class="flex flex-col">
                    <span class="text-base md:text-xl font-extrabold text-primary font-manrope leading-tight uppercase tracking-tight">Life Circle</span>
                    <span class="text-[7px] md:text-[10px] text-secondary font-bold tracking-tighter uppercase">Counseling Services</span>
                </div>
            </a>
        </div>
        <div class="hidden md:flex items-center gap-8 font-manrope font-bold tracking-tight">
            <a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="about.php">About Us</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="services.php">Services</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="gallery.php">Gallery</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="contact.php">Contact</a>
            
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
        <a href="enroll.php" class="btn-interact bg-primary text-on-primary px-3 md:px-6 py-1.5 md:py-2.5 rounded-full font-manrope font-bold hover:brightness-110 shadow-premium text-[9px] md:text-base whitespace-nowrap font-bengali">
            DMC কোর্সে ভর্তি হোন
        </a>
    </nav>

    <main class="pt-16 md:pt-24">
