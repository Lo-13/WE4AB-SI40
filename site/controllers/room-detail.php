<?php
require_once __DIR__ . '/../models/user.php';
session_start();
require __DIR__ . '/common/db.php';

if (!isset($_GET['id'])) {
    header('Location: rooms');
    exit;
}

$query = $db->prepare("SELECT * FROM room WHERE id = :id AND status = 'available'");
$query->execute(['id' => $_GET['id']]);
$room = $query->fetch(PDO::FETCH_ASSOC);

if (!$room) {
    header('Location: rooms');
    exit;
}

require __DIR__ . '/../views/room-detail.php';
?>
