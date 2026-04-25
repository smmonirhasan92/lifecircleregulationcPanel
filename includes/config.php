<?php
/**
 * Life Circle Core Configuration
 * Raw PHP Migration
 */

// Environment Detection
$is_local = ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_ADDR'] === '127.0.0.1');

if ($is_local) {
    define('DB_HOST', '127.0.0.1'); 
    define('DB_NAME', 'lifecirc_database-01');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('SITE_URL', 'http://localhost:8000');
} else {
    // Production Settings (cPanel)
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'smmonirh_lifecircleregulation'); 
    define('DB_USER', 'smmonirh_lifecircleregulation');
    define('DB_PASS', 'Sir@@@@123@@'); // Restored from previous configuration
    define('SITE_URL', 'https://lifecircleregulation.com');
}

// Site Information
define('BASE_PATH', dirname(__DIR__));

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
    // If production fails, don't die immediately to avoid exposing info, but log it
    if ($is_local) {
        die("Database connection failed: " . $e->getMessage());
    } else {
        error_log("DB Connection Error: " . $e->getMessage());
        die("Site is currently undergoing maintenance. Please try again later.");
    }
}

// Start Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
