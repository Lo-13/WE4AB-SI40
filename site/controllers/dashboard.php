<?php
/*
Controleur de l'espace admin.
Il centralise l'affichage du tableau de bord, les listes utiles
et la gestion des demandes de reservation ainsi qu'un affichage avec un calendrier
Petite précision sur l'erreur $db affichée sur PhpStorm, phpstormanalyse le code
statiquement de ce que j'ai compris, entre autreil lit les fichiers sans les
exécuter. Quand il voit ça require __DIR__ . '/common/db.php', il ne suit
pas ce fichier pour savoir que $db y est défini.
 Donc pour lui $db n'existe pas et donc il le met en rouge.
Mais quand PHP exécute le code, il fait bien le require.
 */
require_once __DIR__ . '/../models/user.php';

// Ici précision sécurité car démarre la session si pas déjà connecté
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/common/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']->role !== 'admin') {
    // Si l'appel vient de l'AJAX du calendrier, on renvoie du JS plutot qu'une page HTML.
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

function fetchCalendarReservations(PDO $db, string $date): array {
    // Cette requete alimente le calendrier en listant les reservations d'une date precise.
    $query = $db->prepare("
        SELECT r.id, r.date_begin, r.date_end, r.nb_player, r.status, r.total_price,
               rm.name AS room_name, u.name AS user_name, u.last_name AS user_last_name
        FROM reservation r
        JOIN room rm ON r.room_id = rm.id
        JOIN user u ON r.user_id = u.id
        WHERE DATE(r.date_begin) = :selected_date
        ORDER BY r.date_begin ASC
    ");
    $query->execute(['selected_date' => $date]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_GET['ajax']) && $_GET['ajax'] === 'calendar') {
    $selectedDate = $_GET['date'] ?? date('Y-m-d');
    if (ob_get_length()) {
        ob_clean();
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(fetchCalendarReservations($db, $selectedDate));
    exit;
}

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
        // On verifie qu'une reservation deja confirmee n'occupe pas le meme creneau.
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

$pendingReservationsQuery = $db->query("
    SELECT r.*, rm.name AS room_name, rm.capacity AS room_capacity,
           u.name AS user_name, u.last_name AS user_last_name, u.email AS user_email
    FROM reservation r
    JOIN room rm ON r.room_id = rm.id
    JOIN user u ON r.user_id = u.id
    WHERE r.status = 0
    ORDER BY r.date_begin ASC
");
$pendingReservations = $pendingReservationsQuery->fetchAll(PDO::FETCH_ASSOC);

$calendarDate = $_GET['date'] ?? date('Y-m-d');
$calendarReservations = fetchCalendarReservations($db, $calendarDate);

require __DIR__ . '/../views/dashboard.php';
?>

