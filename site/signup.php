<?php
session_start();
require_once 'includes/db.php';

$erreur = '';
$succes = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name']);
    $lastname = trim($_POST['lastname']);
    $email    = trim($_POST['email']);
    $mdp      = $_POST['mdp'];
    $mdp_conf = $_POST['mdp_conf'];

    // Vérification que les mots de passe correspondent
    if ($mdp !== $mdp_conf) {
        $erreur = 'Les mots de passe ne correspondent pas.';
    } else {
        // Vérifier si l'email existe déjà
        $stmt = $pdo->prepare("SELECT id FROM user WHERE email = :email");
        $stmt->execute([':email' => $email]);

        if ($stmt->fetch()) {
            $erreur = 'Cet email est déjà utilisé.';
        } else {
            // Hasher le mot de passe
            $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

            // Insérer l'utilisateur en DB
            $stmt = $pdo->prepare("
                INSERT INTO user (email, name, lastname, mdp, role, date_inscription)
                VALUES (:email, :name, :lastname, :mdp, 'user', NOW())
            ");
            $stmt->execute([
                    ':email'    => $email,
                    ':name'     => $name,
                    ':lastname' => $lastname,
                    ':mdp'      => $mdp_hash
            ]);

            // Redirection vers signin avec message succès
            header('Location: signin.php?inscription=ok');
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - GamingRooms</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 text-white min-h-screen">

<header class="bg-gray-900 border-b border-purple-900 px-8 py-4 flex justify-between items-center">
    <a href="main.php" class="text-purple-400 text-xl font-semibold">🎮 GamingRooms</a>
    <nav class="flex gap-4">
        <a href="rooms.php" class="text-gray-400 hover:text-white transition">Salles</a>
        <a href="signin.php" class="border border-purple-600 text-purple-400 px-4 py-2 rounded-lg hover:bg-purple-600 hover:text-white transition text-sm">Se connecter</a>
        <a href="signup.php" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition text-sm">S'inscrire</a>
    </nav>
</header>

<main class="flex items-center justify-center mt-12 mb-12 px-4">
    <div class="bg-gray-900 rounded-2xl p-8 shadow-lg w-full max-w-md border border-gray-800">
        <h2 class="text-2xl font-bold mb-6 text-center">Créer un compte</h2>

        <?php if ($erreur): ?>
            <div class="bg-red-900 border border-red-700 text-red-300 px-4 py-3 rounded-lg mb-4 text-sm">
                <?= htmlspecialchars($erreur) ?>
            </div>
        <?php endif; ?>

        <form action="signup.php" method="post" class="flex flex-col gap-4">

            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="text-gray-400 text-sm mb-1 block">Prénom</label>
                    <input type="text" name="name" required
                           pattern="[A-Za-zÀ-ÖØ-öø-ÿ\-]+"
                           title="Lettres et tirets uniquement"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
                </div>
                <div class="flex-1">
                    <label class="text-gray-400 text-sm mb-1 block">Nom</label>
                    <!-- name="lastname" correspond à la colonne lastname dans la table user -->
                    <input type="text" name="lastname" required
                           pattern="[A-Za-zÀ-ÖØ-öø-ÿ\-]+"
                           title="Lettres et tirets uniquement"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
                </div>
            </div>

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Email</label>
                <input type="email" name="email" placeholder="email@domain.com" required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Mot de passe</label>
                <!-- name="mdp" correspond à la colonne mdp dans la table user -->
                <input type="password" name="mdp" required
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,128}"
                       title="8 caractères min, 1 majuscule, 1 chiffre"
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Confirmer le mot de passe</label>
                <input type="password" name="mdp_conf" required
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,128}"
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>

            <button type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg transition font-semibold mt-2">
                Créer mon compte
            </button>
        </form>

        <p class="text-center text-gray-500 mt-4 text-sm">
            Déjà un compte ?
            <a href="signin.php" class="text-purple-400 hover:underline">Se connecter</a>
        </p>
    </div>
</main>

</body>
</html>