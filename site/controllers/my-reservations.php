<?php
/*
Controleur des reservations d'un user.
Il affiche les reservations de l'utilisateur connecte
et aussi les informations de paiement si elles existent.
Ici même problème avec DB, voir controller/dashboard.php
 */
require_once __DIR__ . '/../models/user.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/common/db.php';

if (!isset($_SESSION['user'])) {
    header('Location: sign-in');
    exit;
}

$userId = $_SESSION['user']->id;

$query = $db->prepare("
    SELECT r.*, rm.name as room_name, p.amount as payment_amount, p.status as payment_status
    FROM reservation r
    JOIN room rm ON r.room_id = rm.id
    LEFT JOIN payment p ON p.reservation_id = r.id
    WHERE r.user_id = :user_id
    ORDER BY r.date_begin ASC
");
$query->execute(['user_id' => $userId]);
$reservations = $query->fetchAll(PDO::FETCH_ASSOC);


$now = new DateTime();
$upcomingReservations = [];
$historicReservations = [];

foreach ($reservations as $r) {
    $start = new DateTime($r['date_begin']);
    $end = new DateTime($r['date_end']);

    $isConfirmed = (int)$r['status'] === 1;
    $isCancelled = (int)$r['status'] === 2;

    $r['start_obj'] = $start;
    $r['end_obj'] = $end;
    $r['is_confirmed'] = $isConfirmed;
    $r['is_cancelled'] = $isCancelled;
    $r['can_comment'] = $isConfirmed && $end < $now;

    if ($end < $now) {
        $historicReservations[] = $r;
    } else {
        $upcomingReservations[] = $r;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'] ?? null;
    $reservationId = $_POST['reservation_id'] ?? null;
    $rate = $_POST['comment_rating'] ?? null;
    $commentText = $_POST['comment_text'] ?? '';
    $date = $_POST['date'] ?? null;
    $isValid = $_POST['is_valid'] ?? null;
    

    if ($reservationId && $userId && $commentText && $rate) {
        $commentQuery = $db->prepare("INSERT INTO comment (user_id, reservation_id, content, rate, date, is_valid) VALUES (:user_id, :reservation_id, :content, :rate, :date, :is_valid)");
        $commentQuery->execute([
            ':user_id' => $userId,
            ':reservation_id' => $reservationId,
            ':content' => $commentText,
            ':rate' => $rate,
            ':date' => date('Y-m-d H:i:s'),
            ':is_valid' => 0
        ]);
    }
        header('Location: my-reservations');
        exit;
}


require __DIR__ . '/../views/my-reservations.php';
?>

