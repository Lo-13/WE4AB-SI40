<?php
$title = "Room Detail"; 
include 'partials/header.php'; 
?>

<body class="bg-gray-950 text-white min-h-screen">



<main class="max-w-3xl mx-auto px-4 py-12">
    <a href="rooms" class="text-gray-500 hover:text-white text-sm mb-6 inline-block">← Retour aux salles</a>

    <div class="bg-gray-900 rounded-2xl p-8 border border-gray-800">
        <h2 class="text-3xl font-bold mb-2">Salle Alpha</h2>
        <p class="text-gray-400 mb-6">Salle cosy avec 2 TV 4K, canapés et PS5 dernière génération.</p>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-gray-800 rounded-xl p-4">
                <p class="text-gray-500 text-sm">Capacité</p>
                <p class="text-white font-semibold">6 joueurs max</p>
            </div>
            <div class="bg-gray-800 rounded-xl p-4">
                <p class="text-gray-500 text-sm">Tarif</p>
                <p class="text-purple-400 font-semibold">15€ / heure</p>
            </div>
            <div class="bg-gray-800 rounded-xl p-4">
                <p class="text-gray-500 text-sm">Plateforme</p>
                <p class="text-white font-semibold">PS5</p>
            </div>
            <div class="bg-gray-800 rounded-xl p-4">
                <p class="text-gray-500 text-sm">Jeux disponibles</p>
                <p class="text-white font-semibold">FIFA 25, COD, GTA V...</p>
            </div>
        </div>

        <a href="reservation" class="block text-center bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-xl transition font-semibold">
            Réserver cette salle
        </a>
    </div>
</main>

<?php include 'partials/footer.php'; ?>