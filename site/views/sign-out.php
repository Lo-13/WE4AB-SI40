<?php
$title = "Sign Out"; 
include 'partials/header.php'; 
?>

<body class="bg-gray-950 text-white min-h-screen">



<main class="flex items-center justify-center mt-32 px-4">
    <div class="bg-gray-900 rounded-2xl p-8 border border-gray-800 text-center max-w-sm w-full">
        <h2 class="text-2xl font-bold mb-2">Se deconnecter ?</h2>
        <p class="text-gray-400 text-sm mb-8">Vous allez etre redirige vers l'accueil.</p>
        <div class="flex gap-4">
            <a href="home"
               class="flex-1 text-center border border-gray-700 text-gray-400 py-2 rounded-lg hover:bg-gray-800 transition text-sm">
                Annuler
            </a>
            <a href="disconnect"
               class="flex-1 text-center bg-red-700 hover:bg-red-800 text-white py-2 rounded-lg transition text-sm">
                Se deconnecter
            </a>
        </div>
    </div>
</main>

<?php include 'partials/footer.php'; ?>
