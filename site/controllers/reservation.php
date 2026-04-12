<?php
require_once __DIR__ . '/../models/user.php';
session_start();
require __DIR__ . '/common/db.php';

if (!isset($_SESSION['user'])) {
    header('Location: sign-in');
    exit;
}

$roomId = $_GET['room_id'] ?? $_POST['room_id'] ?? null;
if (!$roomId) {
    header('Location: rooms');
    exit;
}

$query = $db->prepare("SELECT * FROM room WHERE id = :id AND status = 'available'");
$query->execute(['id' => $roomId]);
$room = $query->fetch(PDO::FETCH_ASSOC);

if (!$room) {
    header('Location: rooms');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $heureDebut = $_POST['heure_debut'];
    $heureFin = $_POST['heure_fin'];
    $nbJoueurs = $_POST['nb_joueurs'];
    
    $dateBegin = $date . ' ' . $heureDebut . ':00';
    $dateEnd = $date . ' ' . $heureFin . ':00';
    $dateRes = date('Y-m-d H:i:s');
    
    $start = new DateTime($dateBegin);
    $end = new DateTime($dateEnd);
    $diff = $start->diff($end);
    $hours = $diff->h + ($diff->days * 24) + ($diff->i / 60);
    if ($hours <= 0) $hours = 1;
    $totalPrice = $hours * $room['hourly_rate'];
    
    $stmt = $db->prepare("INSERT INTO reservation 
        (user_id, room_id, game_id, date_reservation, date_begin, date_end, nb_player, status, total_price) 
        VALUES (:user_id, :room_id, 0, :date_reservation, :date_begin, :date_end, :nb_player, 0, :total_price)");
        
    $stmt->execute([
        'user_id' => $_SESSION['user']->id,
        'room_id' => $roomId,
        'date_reservation' => $dateRes,
        'date_begin' => $dateBegin,
        'date_end' => $dateEnd,
        'nb_player' => $nbJoueurs,
        'total_price' => $totalPrice
    ]);
    
    header('Location: my-reservations');
    exit;
}

require __DIR__ . '/../views/reservation.php';
?>
