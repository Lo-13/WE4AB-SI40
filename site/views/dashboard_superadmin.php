<?php
$title = "Super-admin";
$nbRes = $nbRes ?? 0;
$nbRooms = $nbRooms ?? 0;
$nbAvailableRooms = $nbAvailableRooms ?? 0;
$nbUsers = $nbUsers ?? 0;
$adminMessage = $adminMessage ?? null;
$adminError = $adminError ?? null;
$pendingReservations = $pendingReservations ?? [];
$calendarDate = $calendarDate ?? date('Y-m-d');
$calendarReservations = $calendarReservations ?? [];
$recentRes = $recentRes ?? [];
$recentUsers = $recentUsers ?? [];
$availableRooms = $availableRooms ?? [];
$clients = $clients ?? [];

include 'partials/header.php';
?>
 
<main class="max-w-6xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold mb-8">Espace Super-admin</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 text-center">
            <p class="text-4xl font-bold text-purple-400"><?php echo $nbRooms; ?></p>
            <p class="text-gray-500 mt-1 text-sm">Salles</p>
        </div>
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 text-center">
            <p class="text-4xl font-bold text-purple-400"><?php echo $nbAvailableRooms; ?></p>
            <p class="text-gray-500 mt-1 text-sm">Salles disponibles</p>
        </div>
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 text-center">
            <p class="text-4xl font-bold text-purple-400"><?php echo $nbUsers; ?></p>
            <p class="text-gray-500 mt-1 text-sm">Admins</p>
        </div>
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 text-center">
            <p class="text-4xl font-bold text-purple-400"><?php echo $nbUsers; ?></p>
            <p class="text-gray-500 mt-1 text-sm">Utilisateurs</p>
        </div>
    </div>

    <?php if ($adminMessage): ?>
        <div class="bg-green-900 text-green-300 border border-green-700 rounded-xl px-4 py-3 mb-6">
            <?php echo htmlspecialchars($adminMessage); ?>
        </div>
    <?php endif; ?>

    <?php if ($adminError): ?>
        <div class="bg-red-900 text-red-300 border border-red-700 rounded-xl px-4 py-3 mb-6">
            <?php echo htmlspecialchars($adminError); ?>
        </div>
    <?php endif; ?>


    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mt-6">
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 overflow-x-auto">
            <h3 class="font-semibold mb-4">Salles disponibles</h3>
            <table class="w-full text-sm">
                <thead><tr class="text-gray-500 border-b border-gray-800">
                    <th class="text-left pb-2">Salle</th>
                    <th class="text-left pb-2">Adresse</th>
                    <th class="text-left pb-2">Places</th>
                    <th class="text-left pb-2">Prix</th>
                </tr></thead>
                <tbody>
                <?php foreach($availableRooms as $room): ?>
                <tr class="border-b border-gray-800">
                    <td class="py-3 font-medium"><?php echo htmlspecialchars($room['name']); ?></td>
                    <td class="text-gray-400 pr-4"><?php echo htmlspecialchars($room['address']); ?></td>
                    <td><?php echo htmlspecialchars($room['capacity']); ?></td>
                    <td class="text-purple-400 whitespace-nowrap"><?php echo htmlspecialchars(number_format($room['hourly_rate'], 2)); ?> EUR</td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 overflow-x-auto">
            <h3 class="font-semibold mb-4">Clients</h3>
            <table class="w-full text-sm">
                <thead><tr class="text-gray-500 border-b border-gray-800">
                    <th class="text-left pb-2">Nom</th>
                    <th class="text-left pb-2">Email</th>
                    <th class="text-left pb-2">Age</th>
                    <th class="text-left pb-2">Inscription</th>
                </tr></thead>
                <tbody>
                <?php foreach($clients as $client): ?>
                <tr class="border-b border-gray-800">
                    <td class="py-3"><?php echo htmlspecialchars($client['name'] . ' ' . $client['last_name']); ?></td>
                    <td class="text-gray-400 pr-4"><?php echo htmlspecialchars($client['email']); ?></td>
                    <td><?php echo htmlspecialchars($client['age']); ?></td>
                    <td class="text-gray-400 whitespace-nowrap"><?php echo date('d/m/Y', strtotime($client['registration_date'])); ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'partials/footer.php'; ?>

