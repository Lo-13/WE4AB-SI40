<?php
$title = "Reservation";

include 'partials/header.php';

?>

<main class="max-w-lg mx-auto px-4 py-12">
    <a href="room-detail" class="text-gray-500 hover:text-white text-sm mb-6 inline-block">← Retour au détail</a>
    <div class="bg-gray-900 rounded-2xl p-8 border border-gray-800">
        <h2 class="text-2xl font-bold mb-6">Réserver — <?php echo htmlspecialchars($room['name']); ?></h2>

        <form action="reservation?room_id=<?php echo htmlspecialchars($room['id']); ?>" method="post" class="flex flex-col gap-4">
            <input type="hidden" name="room_id" value="<?php echo htmlspecialchars($room['id']); ?>">
            <div>
                <label class="text-gray-400 text-sm mb-1 block">Date</label>
                <input type="date" name="date" required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>
            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="text-gray-400 text-sm mb-1 block">Heure début</label>
                    <input type="time" name="heure_debut" required
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
                </div>
                <div class="flex-1">
                    <label class="text-gray-400 text-sm mb-1 block">Heure fin</label>
                    <input type="time" name="heure_fin" required
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
                </div>
            </div>
            <div>
                <label class="text-gray-400 text-sm mb-1 block">Nombre de joueurs</label>
                <input type="number" name="nb_joueurs" min="1" max="<?php echo htmlspecialchars($room['capacity']); ?>" required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>

            <div class="bg-gray-800 rounded-xl p-4 text-sm text-gray-400">
                <p>Salle : <span class="text-white"><?php echo htmlspecialchars($room['name']); ?></span></p>
                <p>Tarif : <span class="text-purple-400"><?php echo htmlspecialchars(number_format($room['hourly_rate'], 2)); ?>€ / heure</span></p>
            </div>

            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-xl transition font-semibold">
                Confirmer la réservation
            </button>
        </form>
    </div>
</main>

<?php include 'partials/footer.php'; ?>
