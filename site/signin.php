<?php
session_start();
require_once 'includes/db.php';

$erreur ='';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email =trim($_POST['email']);
    $mdp =($_POST['mdp']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($mdp, $user['mdp'])) {
        $_SESSION['user'] =[
                'email' => $user['email'],
            'name' => $user['name'],
            'role' => $user['role'],
            'id' => $user['id'],
        ];

        if ($user['role'] == 'admin') {
            header('Location: admin/dashboard.php');
        } else {
            $erreur = 'Email ou mot de passe incorrect';
        }
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - GamingRooms</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-white min-h-screen">

<header class="bg-gray-900 border-b border-purple-900 px-8 py-4 flex justify-between items-center">
    <a href="main.html" class="text-purple-400 text-xl font-semibold">🎮 GamingRooms</a>
    <nav class="flex gap-4">
        <a href="rooms.html" class="text-gray-400 hover:text-white transition">Salles</a>
        <a href="signin.php" class="border border-purple-600 text-purple-400 px-4 py-2 rounded-lg hover:bg-purple-600 hover:text-white transition text-sm">Se connecter</a>
        <a href="signup.php" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition text-sm">S'inscrire</a>
    </nav>
</header>

<main class="flex items-center justify-center mt-20 px-4">
    <div class="bg-gray-900 rounded-2xl p-8 shadow-lg w-full max-w-md border border-gray-800">
        <h2 class="text-2xl font-bold mb-6 text-center">Se connecter</h2>


        <?php if ($erreur): ?>
            <div class="bg-red-900 border border-red-700 text-red-300 px-4 py-3 rounded-lg mb-4 text-sm">
                <?= htmlspecialchars($erreur) ?>
            </div>
        <?php endif; ?>

        <form action="signin.php" method="post" class="flex flex-col gap-4">

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Email</label>
                <input type="email" name="email" placeholder="email@domain.com" required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••" required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>

            <button type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg transition font-semibold mt-2">
                Se connecter
            </button>
        </form>

        <p class="text-center text-gray-500 mt-4 text-sm">
            Pas encore de compte ?
            <a href="signup.php" class="text-purple-400 hover:underline">S'inscrire</a>
        </p>
    </div>
</main>

</body>
</html>