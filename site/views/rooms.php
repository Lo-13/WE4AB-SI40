<?php
$title = "Rooms";

include 'partials/header.php';

?>

<body class="bg-gray-950 text-white min-h-screen">



<main class="max-w-5xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold mb-8">Nos salles disponibles</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <?php if (!empty($rooms)): ?>
            <?php foreach ($rooms as $room): ?>
            <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-purple-700 transition">
                <h3 class="text-xl font-semibold mb-2"><?php echo htmlspecialchars($room['name']); ?></h3>
                <p class="text-gray-400 text-sm mb-1">Capacité: jusqu'à <?php echo htmlspecialchars($room['capacity']); ?> joueurs</p>
                <p class="text-gray-500 text-sm mb-4"><?php echo htmlspecialchars($room['description']); ?></p>
                <span class="text-purple-400 font-semibold text-lg block mb-4"><?php echo htmlspecialchars(number_format($room['hourly_rate'], 2)); ?>€ / heure</span>
                <a href="room-detail?id=<?php echo htmlspecialchars($room['id']); ?>" class="block text-center bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg transition text-sm">Voir le détail</a>
            </div>
            <?php
    endforeach; ?>
        <?php
else: ?>
            <p class="text-gray-500">Aucune salle disponible pour le moment.</p>
        <?php
endif; ?>

    </div>
</main>

<?php include 'partials/footer.php'; ?>