<?php
/*
Controleur de la page des rooms.
Il recupere les parametres de TRI et de FILTRE,
construit la requete SQL et charge la vue associée.
 */
require_once __DIR__ . '/../models/user.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/common/db.php';

$sort = $_GET['sort'] ?? 'default';
$minPrice = $_GET['min_price'] ?? '';
$maxPrice = $_GET['max_price'] ?? '';
$minCapacity = $_GET['min_capacity'] ?? '';
$search = trim($_GET['search'] ?? '');

$whereClauses = ["room.status = :status"];
$params = ['status' => 'available'];

if ($minPrice !== '' && is_numeric($minPrice)) {
    $whereClauses[] = "hourly_rate >= :min_price";
    $params['min_price'] = (float) $minPrice;
}

if ($maxPrice !== '' && is_numeric($maxPrice)) {
    $whereClauses[] = "hourly_rate <= :max_price";
    $params['max_price'] = (float) $maxPrice;
}

if ($minCapacity !== '' && is_numeric($minCapacity)) {
    $whereClauses[] = "capacity >= :min_capacity";
    $params['min_capacity'] = (int) $minCapacity;
}

if ($search !== '') {
    $whereClauses[] = "(name LIKE :search OR address LIKE :search OR description LIKE :search)";
    $params['search'] = '%' . $search . '%';
}

$orderBy = "ORDER BY id ASC";
switch ($sort) {
    case 'price_asc':
        $orderBy = "ORDER BY hourly_rate ASC";
        break;
    case 'price_desc':
        $orderBy = "ORDER BY hourly_rate DESC";
        break;
    case 'capacity_desc':
        $orderBy = "ORDER BY capacity DESC";
        break;
}

$sql = "
    SELECT room.*, GROUP_CONCAT(DISTINCT game.title ORDER BY game.title SEPARATOR ', ') AS games
    FROM room
    LEFT JOIN room_game ON room.id = room_game.room_id
    LEFT JOIN game ON room_game.game_id = game.id
    WHERE " . implode(' AND ', $whereClauses) . "
    GROUP BY room.id
    $orderBy
";
// GROUP_CONCAT permet d'afficher sur une meme ligne les jeux relies a une salle.
$query = $db->prepare($sql);
$query->execute($params);
$rooms = $query->fetchAll(PDO::FETCH_ASSOC);

$activeFilters = array_filter([$minPrice, $maxPrice, $minCapacity, $search], fn($value) => $value !== '');
require __DIR__ . '/../views/rooms.php';
?>

