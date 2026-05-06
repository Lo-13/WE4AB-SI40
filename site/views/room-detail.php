<?php
$title = "Room Detail";
$room = $room ?? [
    'id' => 0,
    'name' => '',
    'address' => '',
    'description' => '',
    'capacity' => 0,
    'hourly_rate' => 0,
];
$games = $games ?? [];
$comments = $comments ?? [];
include 'partials/header.php';
?>

<body class="bg-gray-950 text-white min-h-screen">



<main class="max-w-3xl mx-auto px-4 py-12">
    <a href="rooms" class="text-gray-500 hover:text-white text-sm mb-6 inline-block">Retour aux salles</a>

    <div class="bg-gray-900 rounded-2xl p-8 border border-gray-800">
        <h2 class="text-3xl font-bold mb-2"><?php echo htmlspecialchars($room['name']); ?></h2>
        <p class="text-gray-500 mb-2"><?php echo htmlspecialchars($room['address']); ?></p>
        <p class="text-gray-400 mb-6"><?php echo htmlspecialchars($room['description']); ?></p>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="bg-gray-800 rounded-xl p-4">
                <p class="text-gray-500 text-sm">Capacite</p>
                <p class="text-white font-semibold"><?php echo htmlspecialchars($room['capacity']); ?> joueurs max</p>
            </div>
            <div class="bg-gray-800 rounded-xl p-4">
                <p class="text-gray-500 text-sm">Tarif</p>
                <p class="text-purple-400 font-semibold"><?php echo htmlspecialchars(number_format($room['hourly_rate'], 2)); ?> EUR / heure</p>
            </div>
            <div class="bg-gray-800 rounded-xl p-4">
                <p class="text-gray-500 text-sm">Disponibilite</p>
                <p class="text-green-400 font-semibold">Disponible</p>
            </div>
            <div class="bg-gray-800 rounded-xl p-4">
                <p class="text-gray-500 text-sm">Ideal pour</p>
                <p class="text-white font-semibold">Groupes et sessions privees</p>
            </div>
        </div>

        <?php if (!empty($games)): ?>
            <div class="mb-6">
                <h3 class="font-semibold mb-3">Jeux disponibles</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <?php foreach ($games as $game): ?>
                        <div class="bg-gray-800 rounded-lg p-3 border border-gray-700">
                            <p class="font-medium"><?php echo htmlspecialchars($game['title']); ?></p>
                            <p class="text-gray-500 text-sm"><?php echo htmlspecialchars($game['plateform']); ?> - <?php echo htmlspecialchars($game['nb_player_max']); ?> joueurs max</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($comments)): ?>
            <div class="mb-6">
                <h3 class="font-semibold mb-3">Avis clients</h3>
                <div class="flex flex-col gap-3">
                    <?php foreach ($comments as $comment): ?>
                        <article class="bg-gray-800 rounded-lg p-4 border border-gray-700">
                            <div class="flex justify-between gap-4 mb-2">
                                <p class="font-medium"><?php echo htmlspecialchars($comment['name'] . ' ' . substr($comment['last_name'], 0, 1) . '.'); ?></p>
                                <p class="text-yellow-400 text-sm"><?php echo htmlspecialchars($comment['rate']); ?>/5</p>
                            </div>
                            <p class="text-gray-400 text-sm"><?php echo htmlspecialchars($comment['content']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <a href="reservation?room_id=<?php echo htmlspecialchars($room['id']); ?>" class="block text-center bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-xl transition font-semibold">
            Reserver cette salle
        </a>
    </div>
</main>

<?php include 'partials/footer.php'; ?>

