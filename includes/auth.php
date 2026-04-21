<?php
/**
 * Authentication Helpers
 */

/**
 * Check if a user is logged in
 */
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

/**
 * Check if logged in user is admin
 */
function is_admin() {
    return isset($_SESSION['user_id']) && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

/**
 * Require login (for clients)
 */
function require_login() {
    if (!is_logged_in()) {
        set_flash('error', 'Please login to continue.');
        redirect('login.php');
    }
}

/**
 * Require admin access
 */
function require_admin() {
    if (!is_admin()) {
        set_flash('error', 'Unauthorized access.');
        redirect('../index.php'); // From admin/ subfolder
    }
}

/**
 * Get current user data
 */
function get_current_user_data() {
    global $pdo;
    if (!is_logged_in()) return null;
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch();
}
