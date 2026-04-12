<?php
require_once __DIR__ . '/../models/user.php';
session_start();
require __DIR__ . '/common/db.php';

// Fetch all available rooms from the database
$query = $db->query("SELECT * FROM room WHERE status = 'available'");
$rooms = $query->fetchAll(PDO::FETCH_ASSOC);

// Pass variables and load the view
require __DIR__ . '/../views/rooms.php';
?>