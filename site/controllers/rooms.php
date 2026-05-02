<?php
require_once __DIR__ . '/../models/user.php';
session_start();
require __DIR__ . '/common/db.php';

// Check for sorting parameter
$orderClause = ""; // Default order
if (isset($_GET['sort'])) {
    switch ($_GET['sort']) {
        case 'price_asc':
            $orderClause = "ORDER BY hourly_rate ASC";
            break;
        case 'price_desc':
            $orderClause = "ORDER BY hourly_rate DESC";
            break;
        case 'capacity_desc':
            $orderClause = "ORDER BY capacity DESC";
            break;
    }
}

// Fetch all available rooms from the database
$query = $db->query("SELECT * FROM room WHERE status = 'available' $orderClause");
$rooms = $query->fetchAll(PDO::FETCH_ASSOC);

// Pass variables and load the view
require __DIR__ . '/../views/rooms.php';
?>