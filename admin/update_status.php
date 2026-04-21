<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/auth.php';

require_admin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? '';
    $id = (int)($_POST['id'] ?? 0);
    $status = $_POST['status'] ?? '';

    if (!$id || !$status) {
        set_flash('error', 'Invalid request.');
        redirect('index.php');
    }

    $table = ($type === 'appointment') ? 'appointments' : 'enrollments';
    $redirect = ($type === 'appointment') ? 'appointments.php' : 'index.php';

    if ($status === 'canceled') {
        // Option 1: Hard delete like original Laravel logic (for canceled)
        $stmt = $pdo->prepare("DELETE FROM $table WHERE id = ?");
        $stmt->execute([$id]);
        set_flash('success', 'Record deleted successfully.');
    } else {
        $stmt = $pdo->prepare("UPDATE $table SET status = ?, updated_at = NOW() WHERE id = ?");
        $stmt->execute([$status, $id]);
        set_flash('success', 'Status updated successfully.');
    }

    redirect($redirect);
}
?>
