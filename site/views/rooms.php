<?php
/*
Vue de la liste des rooms.
Elle affiche les filtres/tri et les salles recuperees par le controleur rooms.php.
 */
$title = "Rooms";
$rooms = $rooms ?? [];
$sort = $sort ?? 'default';
$minPrice = $minPrice ?? '';
$maxPrice = $maxPrice ?? '';
$minCapacity = $minCapacity ?? '';
$search = $search ?? '';
$activeFilters = $activeFilters ?? [];

include 'partials/header.php';

?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="/site/js/map.js" defer></script>

<main class="max-w-5xl mx-auto px-4 py-12">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <h2 class="text-3xl font-bold">Nos salles disponibles</h2>
    </div>

    <form action="rooms" method="GET" class="bg-gray-900 border border-gray-800 rounded-xl p-4 mb-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            <div>
                <label for="min_price" class="text-gray-400 text-sm mb-1 block">Prix min.</label>
                <input type="number" step="1" min="0" name="min_price" id="min_price" value="<?= htmlspecialchars($minPrice) ?>" placeholder="12"
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label for="max_price" class="text-gray-400 text-sm mb-1 block">Prix max.</label>
                <input type="number" step="1" min="0" name="max_price" id="max_price" value="<?= htmlspecialchars($maxPrice) ?>" placeholder="15"
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label for="min_capacity" class="text-gray-400 text-sm mb-1 block">Joueurs min.</label>
                <input type="number" min="1" name="min_capacity" id="min_capacity" value="<?= htmlspecialchars($minCapacity) ?>" placeholder="6"
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label for="search" class="text-gray-400 text-sm mb-1 block">Recherche</label>
                <input type="text" name="search" id="search" value="<?= htmlspecialchars($search) ?>" placeholder="Paris, VR, arcade..."
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label for="sort" class="text-gray-400 text-sm mb-1 block">Trier par</label>
                <select name="sort" id="sort" onchange="this.form.submit()" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-purple-500 cursor-pointer">
                    <option value="default" <?= ($sort === 'default') ? 'selected' : '' ?> class="bg-gray-900 text-white">Defaut</option>
                    <option value="price_asc" <?= ($sort === 'price_asc') ? 'selected' : '' ?> class="bg-gray-900 text-white">Prix: Moins cher</option>
                    <option value="price_desc" <?= ($sort === 'price_desc') ? 'selected' : '' ?> class="bg-gray-900 text-white">Prix: Plus cher</option>
                    <option value="capacity_desc" <?= ($sort === 'capacity_desc') ? 'selected' : '' ?> class="bg-gray-900 text-white">Capacite: Plus grande</option>
                </select>
            </div>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 mt-4">
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-lg transition text-sm font-semibold">Filtrer</button>
            <?php if (!empty($activeFilters)): ?>
                <a href="rooms" class="text-center border border-gray-700 hover:border-gray-500 text-gray-300 px-5 py-2 rounded-lg transition text-sm">Reinitialiser</a>
            <?php endif; ?>
        </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      

        <?php if (!empty($rooms)): ?>
            <?php foreach ($rooms as $room): ?>
            <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-purple-700 transition scroll-reveal tilt-card cursor-pointer">
                <h3 class="text-xl font-semibold mb-2"><?php echo htmlspecialchars($room['name']); ?></h3>
                <p class="text-gray-500 text-sm mb-2"><?php echo htmlspecialchars($room['address']); ?></p>
                <p class="text-gray-400 text-sm mb-1">Capacité: jusqu'à <?php echo htmlspecialchars($room['capacity']); ?> joueurs</p>
                <?php if (!empty($room['games'])): ?>
                    <p class="text-gray-400 text-sm mb-3">Jeux: <?php echo htmlspecialchars($room['games']); ?></p>
                <?php endif; ?>
                <p class="text-gray-500 text-sm mb-4"><?php echo htmlspecialchars($room['description']); ?></p>
                <span class="text-purple-400 font-semibold text-lg block mb-4"><?php echo htmlspecialchars(number_format($room['hourly_rate'], 2)); ?> EUR / heure</span>
                <a href="room-detail?id=<?php echo htmlspecialchars($room['id']); ?>" class="block text-center bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg transition text-s">Voir le détail</a>
            </div>
            <?php
    endforeach; ?>
        <?php
else: ?>
            <p class="text-gray-500">Aucune salle ne correspond à ces filtres.</p>
        <?php
endif; ?>
        

    </div>

    <script>
        const rooms = <?= json_encode($rooms) ?>;
    </script>
    <div id = "map" class="h-screen w-full rounded-lg"></div>
    <p class="text-xs text-gray-500 mt-2">Powered by Leaflet</p>

</main>

<?php include 'partials/footer.php'; ?>

