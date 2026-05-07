<?php
require_once __DIR__ . '/../models/user.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/common/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']->role !== 'super_admin') {
    if (isset($_GET['ajax'])) {
        http_response_code(401);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['error' => 'Non autorise']);
        exit;
    }

    header('Location: sign-in');
    exit;
}

$adminMessage = $_GET['message'] ?? null;
$adminError = $_GET['error'] ?? null;


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reservation_id'], $_POST['reservation_action'])) {
    $reservationId = (int) $_POST['reservation_id'];
    $reservationAction = $_POST['reservation_action'];

    $reservationQuery = $db->prepare("SELECT * FROM reservation WHERE id = :id");
    $reservationQuery->execute(['id' => $reservationId]);
    $reservation = $reservationQuery->fetch(PDO::FETCH_ASSOC);

    if (!$reservation) {
        header('Location: dashboard?error=' . urlencode("Reservation introuvable."));
        exit;
    } elseif ($reservationAction === 'reject') {
        $update = $db->prepare("UPDATE reservation SET status = 2 WHERE id = :id");
        $update->execute(['id' => $reservationId]);
        header('Location: dashboard?message=' . urlencode("La demande a ete refusee.") . '&date=' . urlencode(substr($reservation['date_begin'], 0, 10)));
        exit;
    } elseif ($reservationAction === 'accept') {
        $conflictQuery = $db->prepare("
            SELECT COUNT(*)
            FROM reservation
            WHERE room_id = :room_id
              AND id <> :id
              AND status = 1
              AND date_begin < :date_end
              AND date_end > :date_begin
        ");
        $conflictQuery->execute([
            'room_id' => $reservation['room_id'],
            'id' => $reservationId,
            'date_begin' => $reservation['date_begin'],
            'date_end' => $reservation['date_end'],
        ]);

        if ((int) $conflictQuery->fetchColumn() > 0) {
            header('Location: dashboard?error=' . urlencode("Impossible d'accepter : une reservation confirmee existe deja sur ce creneau.") . '&date=' . urlencode(substr($reservation['date_begin'], 0, 10)));
            exit;
        } else {
            $update = $db->prepare("UPDATE reservation SET status = 1 WHERE id = :id");
            $update->execute(['id' => $reservationId]);
            header('Location: dashboard?message=' . urlencode("La demande a ete acceptee.") . '&date=' . urlencode(substr($reservation['date_begin'], 0, 10)));
            exit;
        }
    }
}

$nbRes = $db->query("SELECT COUNT(*) FROM reservation")->fetchColumn();
$nbRooms = $db->query("SELECT COUNT(*) FROM room")->fetchColumn();
$nbAvailableRooms = $db->query("SELECT COUNT(*) FROM room WHERE status = 'available'")->fetchColumn();
$nbUsers = $db->query("SELECT COUNT(*) FROM user")->fetchColumn();


$recentUsersQuery = $db->query("SELECT * FROM user ORDER BY id DESC LIMIT 5");
$recentUsers = $recentUsersQuery->fetchAll(PDO::FETCH_ASSOC);

$availableRoomsQuery = $db->query("
    SELECT id, name, address, capacity, hourly_rate, description
    FROM room
    WHERE status = 'available'
    ORDER BY hourly_rate ASC, capacity DESC
");
$availableRooms = $availableRoomsQuery->fetchAll(PDO::FETCH_ASSOC);

$clientsQuery = $db->query("
    SELECT id, name, last_name, email, age, registration_date
    FROM user
    WHERE role = 'user'
    ORDER BY registration_date DESC
");
$clients = $clientsQuery->fetchAll(PDO::FETCH_ASSOC);


require __DIR__ . '/../views/dashboard_superadmin.php';
?>

