<?php
require __DIR__ . '/common/db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/*$messages = [];

if (isset($_SESSION['user'])) {
    $query = $db->prepare("SELECT title, description, season, episode, user_id FROM message");
    $query->execute();
    $allMessages = $query->fetchAll(PDO::FETCH_ASSOC);

    
    
    $messages = $allMessages;
}
*/?>