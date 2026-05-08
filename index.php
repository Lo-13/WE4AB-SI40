<?php
/*
C'est le Routeur principal du projet.
Ce fichier analyse l'URL demandee et charge soit une vue simple,
soit un controleur chargé de recuperer les donnees avant affichage.
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

$request = $_SERVER['REQUEST_URI'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$contextUrl = ''; 

$viewDir = 'site/views';
$controllerDir = 'site/controllers';

function normalize_path($path) {
    return '/' . trim(parse_url($path, PHP_URL_PATH), '/');
}

$request = normalize_path($request);

if ($method == 'GET') {
    // Les pages en GET affichent le contenu du site sans modifier la base.
    switch ($request) {
        case "$contextUrl/":
        case "$contextUrl/home":
        case "/index.php":
            require __DIR__ . '/' . $viewDir . '/home.php';
            break;
        case "$contextUrl/rooms":
            require __DIR__ . '/' . $controllerDir . '/rooms.php';
            break;
        case "$contextUrl/room-detail":
            require __DIR__ . '/' . $controllerDir . '/room-detail.php';
            break;
        case "$contextUrl/my-reservations":
            require __DIR__ . '/' . $controllerDir . '/my-reservations.php';
            break;
        case "$contextUrl/reservation":
            require __DIR__ . '/' . $controllerDir . '/reservation.php';
            break;
        case "$contextUrl/dashboard":
            require __DIR__ . '/' . $controllerDir . '/dashboard.php';
            break;
        case "$contextUrl/dashboard_superadmin":
            require __DIR__ . '/' . $controllerDir . '/dashboard_superadmin.php';
            break; 
        case "$contextUrl/account":
            require __DIR__ . '/' . $controllerDir . '/account.php';
            break;
        case "$contextUrl/sign-in":
            require __DIR__ . '/' . $viewDir . '/sign-in.php';
            break;
        case "$contextUrl/sign-up":
            require __DIR__ . '/' . $viewDir . '/sign-up.php';
            break;
        case "$contextUrl/sign-out":
            require __DIR__ . '/' . $viewDir . '/sign-out.php';
            break;
        case "$contextUrl/disconnect":
            require __DIR__ . '/' . $controllerDir . '/sign-out.php';
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/' . $viewDir . '/404.php';
    }
} else if ($method == 'POST') {
    // Les pages en POST servent surtout a traiter les formulaires.
    switch ($request) {
        case "$contextUrl/sign-in":
            require __DIR__ . '/' . $controllerDir . '/sign-in.php';
            break;
        case "$contextUrl/sign-up":
            require __DIR__ . '/' . $controllerDir . '/sign-up.php';
            break;
        case "$contextUrl/rooms":
            require __DIR__ . '/' . $controllerDir . '/rooms.php';
            break;
        case "$contextUrl/room-detail":
            require __DIR__ . '/' . $controllerDir . '/room-detail.php';
            break;
        case "$contextUrl/reservation":
            require __DIR__ . '/' . $controllerDir . '/reservation.php';
            break;
        case "$contextUrl/dashboard":
            require __DIR__ . '/' . $controllerDir . '/dashboard.php';
            break;
        case "$contextUrl/dashboard_superadmin":
            require __DIR__ . '/' . $controllerDir . '/dashboard_superadmin.php';
            break;  
        default:
            http_response_code(404);
            require __DIR__ . '/' . $viewDir . '/404.php';
    }
}

?>
