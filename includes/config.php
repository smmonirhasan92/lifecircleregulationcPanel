<?php
/**
 * Life Circle Core Configuration
 * Raw PHP Migration
 */

// Database Configuration
define('DB_HOST', '127.0.0.1'); // Better compatibility for some cPanel hosts
define('DB_NAME', 'lifecircleregula_PHP');
define('DB_USER', 'lifecircleregula_adminlcr');
define('DB_PASS', 'Sir@@@@123@@');

// Site Information
define('BASE_PATH', dirname(__DIR__));
define('SITE_URL', 'http://localhost:8000'); // Set to your live domain when deploying

// WhatsApp Contact (Sharmin Mujahid Mam)
define('MAM_WHATSAPP', '8801716437859');

// Initialization
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Start Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
