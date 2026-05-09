<?php
/*
En-tete commun du site.
Il contient la navigation et adapte les liens selon le role de l'utilisateur.
 */
require_once __DIR__ . '/../../models/user.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user = $_SESSION['user'] ?? null;
?>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? "GamingRooms" ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-white min-h-screen flex flex-col">
    <header class="bg-gray-900 border-b border-purple-900 px-8 py-4 flex justify-between items-center">
        <a href="home" class="text-purple-400 text-xl font-semibold">GamingRooms</a>
        <nav class="flex gap-4 items-center">
            <a href="rooms" class="text-gray-400 hover:text-white transition">Salles</a>
            <?php if ($user): ?>
                <?php if ($user->role === 'admin'): ?>
                    <a href="dashboard" class="text-purple-400 hover:text-purple-300 transition">Admin</a>
                <?php endif; ?>
                <?php if ($user->role === 'super_admin'): ?>
                      <a href="dashboard_superadmin" class="text-purple-400 hover:text-purple-300 transition">Super Admin</a>
                <?php endif; ?>
                <a href="my-reservations" class="text-gray-400 hover:text-white transition">Mes Réservations</a>
                <a href="account" class="text-gray-400 hover:text-white transition">Mon compte</a>
                <span class="text-purple-400 text-sm font-medium border-l border-gray-700 pl-4"><?= htmlspecialchars($user->email) ?></span>
                <a href="sign-out" class="text-red-400 hover:text-red-300 transition text-sm">Déconnexion</a>
            <?php else: ?>
                <a href="sign-in" class="border border-purple-600 text-purple-400 px-4 py-2 rounded-lg hover:bg-purple-600 hover:text-white transition text-sm">Se connecter</a>
                <a href="sign-up" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition text-sm">S'inscrire</a>
            <?php endif; ?>
        </nav>
    </header>

