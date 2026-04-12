<?php
require_once __DIR__ . '/../models/user.php';
session_start();
require __DIR__ . '/common/db.php';

if (!isset($_SESSION['user'])) {
    header('Location: sign-in');
    exit;
}

$userId = $_SESSION['user']->id;

$query = $db->prepare("
    SELECT r.*, rm.name as room_name 
    FROM reservation r
    JOIN room rm ON r.room_id = rm.id
    WHERE r.user_id = :user_id
    ORDER BY r.date_begin ASC
");
$query->execute(['user_id' => $userId]);
$reservations = $query->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../views/my-reservations.php';
?>
