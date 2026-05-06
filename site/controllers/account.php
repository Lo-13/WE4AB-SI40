<?php
require_once __DIR__ . '/../models/user.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/common/db.php';

if (!isset($_SESSION['user'])) {
    header('Location: /sign-in');
    exit;
}

$query = $db->prepare("SELECT * FROM user WHERE id = :id");
$query->execute([':id' => $_SESSION['user']->id]);
$user = $query->fetch(PDO::FETCH_OBJ);

require __DIR__ . '/../views/account.php';
?>
