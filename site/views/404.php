<?php
$title = "404 - Page not found"; 
include 'partials/header.php'; 
?>

<body class="bg-gray-950 text-white min-h-screen">

<main class="flex flex-col items-center justify-center text-center mt-28 px-4">
    <h1 class="text-5xl font-bold mb-4">404</h1>
    <p class="text-gray-400 text-lg max-w-xl mb-10">La page que vous cherchez n'existe pas.</p>
    <a href="/" class="bg-purple-600 hover:bg-purple-700 text-white text-lg px-8 py-3 rounded-xl transition">Retour à l'accueil →</a>
</main>

<?php include 'partials/footer.php'; ?>
