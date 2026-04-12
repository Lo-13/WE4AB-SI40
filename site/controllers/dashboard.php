<?php
require_once __DIR__ . '/../models/user.php';
session_start();
require __DIR__ . '/common/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']->role !== 'admin') {
    header('Location: sign-in');
    exit;
}

$nbRes = $db->query("SELECT COUNT(*) FROM reservation")->fetchColumn();
$nbRooms = $db->query("SELECT COUNT(*) FROM room")->fetchColumn();
$nbUsers = $db->query("SELECT COUNT(*) FROM user")->fetchColumn();

$recentResQuery = $db->query("
    SELECT r.*, rm.name as room_name, u.name as user_name, u.last_name as user_last_name
    FROM reservation r 
    JOIN room rm ON r.room_id = rm.id
    JOIN user u ON r.user_id = u.id
    ORDER BY r.id DESC LIMIT 5
");
$recentRes = $recentResQuery->fetchAll(PDO::FETCH_ASSOC);

$recentUsersQuery = $db->query("SELECT * FROM user ORDER BY id DESC LIMIT 5");
$recentUsers = $recentUsersQuery->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../views/dashboard.php';
?>
