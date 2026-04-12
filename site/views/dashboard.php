<?php
$title = "Dashboard"; 
include 'partials/header.php'; 
?>

<body class="bg-gray-950 text-white min-h-screen">

<main class="max-w-6xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold mb-8">Dashboard Admin</h2>

    <div class="grid grid-cols-3 gap-6 mb-10">
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 text-center">
            <p class="text-4xl font-bold text-purple-400"><?php echo $nbRes; ?></p>
            <p class="text-gray-500 mt-1 text-sm">Réservations</p>
        </div>
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 text-center">
            <p class="text-4xl font-bold text-purple-400"><?php echo $nbRooms; ?></p>
            <p class="text-gray-500 mt-1 text-sm">Salles</p>
        </div>
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 text-center">
            <p class="text-4xl font-bold text-purple-400"><?php echo $nbUsers; ?></p>
            <p class="text-gray-500 mt-1 text-sm">Utilisateurs</p>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-6">
        <div class="bg-gray-900 rounded-xl p-6 border border-gray-800">
            <h3 class="font-semibold mb-4">Réservations récentes</h3>
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
                        <?php if ($r['status'] == 1): ?>
                            <span class="bg-green-900 text-green-400 text-xs px-2 py-0.5 rounded-full">Confirmé</span>
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
            <h3 class="font-semibold mb-4">Utilisateurs récents</h3>
            <table class="w-full text-sm">
                <thead><tr class="text-gray-500 border-b border-gray-800">
                    <th class="text-left pb-2">Email</th>
                    <th class="text-left pb-2">Rôle</th>
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
</main>

<?php include 'partials/footer.php'; ?>