<?php
$title = "Room Detail"; 
include 'partials/header.php'; 
?>

<body class="bg-gray-950 text-white min-h-screen">



<main class="max-w-3xl mx-auto px-4 py-12">
    <a href="rooms" class="text-gray-500 hover:text-white text-sm mb-6 inline-block">← Retour aux salles</a>

    <div class="bg-gray-900 rounded-2xl p-8 border border-gray-800">
        <h2 class="text-3xl font-bold mb-2"><?php echo htmlspecialchars($room['name']); ?></h2>
        <p class="text-gray-400 mb-6"><?php echo htmlspecialchars($room['description']); ?></p>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-gray-800 rounded-xl p-4">
                <p class="text-gray-500 text-sm">Capacité</p>
                <p class="text-white font-semibold"><?php echo htmlspecialchars($room['capacity']); ?> joueurs max</p>
            </div>
            <div class="bg-gray-800 rounded-xl p-4">
                <p class="text-gray-500 text-sm">Tarif</p>
                <p class="text-purple-400 font-semibold"><?php echo htmlspecialchars(number_format($room['hourly_rate'], 2)); ?>€ / heure</p>
            </div>
        </div>

        <a href="reservation?room_id=<?php echo htmlspecialchars($room['id']); ?>" class="block text-center bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-xl transition font-semibold">
            Réserver cette salle
        </a>
    </div>
</main>

<?php include 'partials/footer.php'; ?>