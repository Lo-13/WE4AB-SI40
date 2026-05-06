<?php
$title = "Admin";
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

<body class="bg-gray-950 text-white min-h-screen">

<main class="max-w-6xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold mb-8">Espace admin</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 text-center">
            <p class="text-4xl font-bold text-purple-400"><?php echo $nbRes; ?></p>
            <p class="text-gray-500 mt-1 text-sm">Reservations</p>
        </div>
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

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-6">
        <section class="bg-gray-900 rounded-xl p-6 border border-gray-800">
            <div class="flex justify-between items-center gap-4 mb-4">
                <h3 class="font-semibold">Demandes de reservation</h3>
                <span class="bg-yellow-900 text-yellow-300 text-xs px-3 py-1 rounded-full"><?php echo count($pendingReservations); ?> en attente</span>
            </div>

            <div class="flex flex-col gap-4">
                <?php if (empty($pendingReservations)): ?>
                    <p class="text-gray-500 text-sm">Aucune demande en attente.</p>
                <?php else: ?>
                    <?php foreach ($pendingReservations as $reservation):
                        $start = new DateTime($reservation['date_begin']);
                        $end = new DateTime($reservation['date_end']);
                    ?>
                        <article class="bg-gray-800 rounded-lg p-4 border border-gray-700">
                            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4">
                                <div>
                                    <h4 class="font-semibold"><?php echo htmlspecialchars($reservation['room_name']); ?></h4>
                                    <p class="text-gray-400 text-sm">
                                        <?php echo htmlspecialchars($reservation['user_name'] . ' ' . $reservation['user_last_name']); ?> -
                                        <?php echo $start->format('d/m/Y H\hi'); ?> a <?php echo $end->format('H\hi'); ?>
                                    </p>
                                    <p class="text-gray-500 text-sm">
                                        <?php echo htmlspecialchars($reservation['nb_player']); ?> joueurs sur <?php echo htmlspecialchars($reservation['room_capacity']); ?> places -
                                        <?php echo htmlspecialchars(number_format($reservation['total_price'], 2)); ?> EUR
                                    </p>
                                </div>
                                <div class="flex gap-2 shrink-0">
                                    <form action="dashboard" method="post">
                                        <input type="hidden" name="reservation_id" value="<?php echo htmlspecialchars($reservation['id']); ?>">
                                        <input type="hidden" name="reservation_action" value="accept">
                                        <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-3 py-2 rounded-lg text-sm transition">Accepter</button>
                                    </form>
                                    <form action="dashboard" method="post">
                                        <input type="hidden" name="reservation_id" value="<?php echo htmlspecialchars($reservation['id']); ?>">
                                        <input type="hidden" name="reservation_action" value="reject">
                                        <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-3 py-2 rounded-lg text-sm transition">Refuser</button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <section class="bg-gray-900 rounded-xl p-6 border border-gray-800">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
                <h3 class="font-semibold">Calendrier des reservations</h3>
                <input type="date" id="admin-calendar-date" value="<?php echo htmlspecialchars($calendarDate); ?>"
                       class="bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-purple-500">
            </div>

            <div id="admin-calendar-list" class="flex flex-col gap-3" data-initial-reservations='<?php echo htmlspecialchars(json_encode($calendarReservations), ENT_QUOTES); ?>'>
                <p class="text-gray-500 text-sm">Chargement du calendrier...</p>
            </div>
        </section>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800">
            <h3 class="font-semibold mb-4">Reservations recentes</h3>
            <table class="w-full text-sm">
                <thead><tr class="text-gray-500 border-b border-gray-800">
                    <th class="text-left pb-2">Utilisateur</th>
                    <th class="text-left pb-2">Salle</th>
                    <th class="text-left pb-2">Statut</th>
                </tr></thead>
                <tbody>
                <?php foreach($recentRes as $r): ?>
                <tr class="border-b border-gray-800">
                    <td class="py-2"><?php echo htmlspecialchars($r['user_name'] . ' ' . substr($r['user_last_name'],0,1) . '.'); ?></td>
                    <td><?php echo htmlspecialchars($r['room_name']); ?></td>
                    <td>
                        <?php if ((int) $r['status'] === 1): ?>
                            <span class="bg-green-900 text-green-400 text-xs px-2 py-0.5 rounded-full">Confirme</span>
                        <?php elseif ((int) $r['status'] === 2): ?>
                            <span class="bg-red-900 text-red-400 text-xs px-2 py-0.5 rounded-full">Annule</span>
                        <?php else: ?>
                            <span class="bg-yellow-900 text-yellow-400 text-xs px-2 py-0.5 rounded-full">En attente</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800">
            <h3 class="font-semibold mb-4">Utilisateurs recents</h3>
            <table class="w-full text-sm">
                <thead><tr class="text-gray-500 border-b border-gray-800">
                    <th class="text-left pb-2">Email</th>
                    <th class="text-left pb-2">Role</th>
                </tr></thead>
                <tbody>
                <?php foreach($recentUsers as $u): ?>
                <tr class="border-b border-gray-800">
                    <td class="py-2"><?php echo htmlspecialchars($u['email']); ?></td>
                    <td>
                        <?php if ($u['role'] === 'admin'): ?>
                            <span class="bg-purple-900 text-purple-400 text-xs px-2 py-0.5 rounded-full">admin</span>
                        <?php else: ?>
                            <span class="bg-gray-800 text-gray-400 text-xs px-2 py-0.5 rounded-full">user</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

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

