<?php
$title = "My Reservations"; 
include 'partials/header.php'; 
?>

<body class="bg-gray-950 text-white min-h-screen">



<main class="max-w-3xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold mb-8">Mes réservations</h2>

    <div class="flex flex-col gap-4">
        <?php if (empty($reservations)): ?>
            <p class="text-gray-500">Vous n'avez aucune réservation.</p>
        <?php else: ?>
            <?php foreach ($reservations as $r): 
                $start = new DateTime($r['date_begin']);
                $end = new DateTime($r['date_end']);
            ?>
            <div class="bg-gray-900 rounded-xl p-6 border-l-4 <?php echo $r['status'] == 1 ? 'border-green-500' : 'border-yellow-500'; ?> border-gray-800">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-semibold text-lg"><?php echo htmlspecialchars($r['room_name']); ?></h3>
                        <p class="text-gray-400 text-sm mt-1"><?php echo $start->format('d/m/Y'); ?> · <?php echo $start->format('H\hi'); ?> → <?php echo $end->format('H\hi'); ?></p>
                        <p class="text-gray-500 text-sm"><?php echo htmlspecialchars($r['nb_player']); ?> joueurs</p>
                    </div>
                    <?php if ($r['status'] == 1): ?>
                        <span class="bg-green-900 text-green-400 text-xs px-3 py-1 rounded-full">Confirmé</span>
                    <?php else: ?>
                        <span class="bg-yellow-900 text-yellow-400 text-xs px-3 py-1 rounded-full">En attente</span>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php include 'partials/footer.php'; ?>