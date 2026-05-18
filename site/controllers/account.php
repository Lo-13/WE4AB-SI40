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

$roomsQuery = $db->prepare("SELECT * FROM room");
$roomsQuery->execute();
$rooms = $roomsQuery->fetchAll(PDO::FETCH_OBJ);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomId = $_POST['room_id'] ?? null;
    $userId = $_SESSION['user']->id;

    $adminrequestQuery = $db->prepare("INSERT INTO admin_role_request (user_id, room_id, request_status) VALUES (:user_id, :room_id, :status)");
    $adminrequestQuery->execute([
        ':user_id' => $userId,
        ':room_id' => $roomId,
        ':status' => 'pending'
    ]);

    header('Location: /account');
    exit;
}

require __DIR__ . '/../views/account.php';
?>
