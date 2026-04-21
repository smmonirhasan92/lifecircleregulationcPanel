<?php
/**
 * Global Helper Functions
 */

/**
 * Get a setting value from the 'settings' table
 */
function get_setting($key, $default = null) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT value FROM settings WHERE `key` = ?");
    $stmt->execute([$key]);
    $result = $stmt->fetch();
    return $result ? $result->value : $default;
}

/**
 * Sanitize input
 */
function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

/**
 * Redirect helper
 */
function redirect($path) {
    header("Location: $path");
    exit();
}

/**
 * Set a flash message in session
 */
function set_flash($type, $message) {
    $_SESSION['flash'][$type] = $message;
}

/**
 * Get and clear flash message
 */
function get_flash($type) {
    if (isset($_SESSION['flash'][$type])) {
        $msg = $_SESSION['flash'][$type];
        unset($_SESSION['flash'][$type]);
        return $msg;
    }
    return null;
}

/**
 * Standardize WhatsApp number
 */
function format_whatsapp($number) {
    $wa_number = preg_replace('/[^0-9]/', '', $number);
    if (strlen($wa_number) == 11 && strpos($wa_number, '01') === 0) {
        $wa_number = '88' . $wa_number;
    }
    return $wa_number;
}
