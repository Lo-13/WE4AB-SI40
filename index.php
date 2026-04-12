<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$request = $_SERVER['REQUEST_URI'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$contextUrl = ''; 

// 2. Pointer vers le bon dossier
$viewDir = 'site/views';
$controllerDir = 'site/controllers';

function normalize_path($path) {
    return '/' . trim(parse_url($path, PHP_URL_PATH), '/');
}

$request = normalize_path($request);

if ($method == 'GET') {
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
        default:
            http_response_code(404);
            require __DIR__ . '/' . $viewDir . '/404.php';
    }
}

?>