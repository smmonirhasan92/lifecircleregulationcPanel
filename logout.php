<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION = [];
session_destroy();

header("Location: index.php");
exit();
