<?php
require_once __DIR__ . '/../models/user.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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

$gamesQuery = $db->prepare("
    SELECT g.title, g.plateform, g.nb_player_max
    FROM room_game rg
    JOIN game g ON rg.game_id = g.id
    WHERE rg.room_id = :room_id
    ORDER BY g.title ASC
");
$gamesQuery->execute(['room_id' => $room['id']]);
$games = $gamesQuery->fetchAll(PDO::FETCH_ASSOC);

$commentsQuery = $db->prepare("
    SELECT c.content, c.rate, c.date, u.name, u.last_name
    FROM comment c
    JOIN reservation r ON c.reservation_id = r.id
    JOIN user u ON c.user_id = u.id
    WHERE r.room_id = :room_id AND c.is_valid = 1
    ORDER BY c.date DESC
");
$commentsQuery->execute(['room_id' => $room['id']]);
$comments = $commentsQuery->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../views/room-detail.php';
?>

