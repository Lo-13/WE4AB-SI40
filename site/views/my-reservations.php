<?php
/*
Vue des reservations du user connecte.
Elle affiche aussi les informations de paiement si elles existent.
 */
$title = "My Reservations";
$reservations = $reservations ?? [];
include 'partials/header.php';
?>
 

<main class="max-w-3xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold mb-8">Mes reservations</h2>

    <div class="flex flex-col gap-4">
        <?php if (empty($reservations)): ?>
            <p class="text-gray-500">Vous n'avez aucune reservation.</p>
        <?php else: ?>
            <?php foreach ($reservations as $r): 
                $start = new DateTime($r['date_begin']);
                $end = new DateTime($r['date_end']);
            ?>
            <?php
                $isConfirmed = (int) $r['status'] === 1;
                $isCancelled = (int) $r['status'] === 2;
                $borderClass = $isConfirmed ? 'border-green-500' : ($isCancelled ? 'border-red-500' : 'border-yellow-500');
            ?>
            <div class="bg-gray-900 rounded-xl p-6 border-l-4 <?php echo $borderClass; ?> border-gray-800">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-semibold text-lg"><?php echo htmlspecialchars($r['room_name']); ?></h3>
                        <p class="text-gray-400 text-sm mt-1"><?php echo $start->format('d/m/Y'); ?> - <?php echo $start->format('H\hi'); ?> a <?php echo $end->format('H\hi'); ?></p>
                        <p class="text-gray-500 text-sm"><?php echo htmlspecialchars($r['nb_player']); ?> joueurs</p>
                        <?php if (!empty($r['payment_amount'])): ?>
                            <p class="text-gray-500 text-sm">
                                Paiement: <?php echo htmlspecialchars(number_format($r['payment_amount'], 2)); ?> EUR
                                - <?php echo htmlspecialchars($r['payment_status'] === 'completed' ? 'paye' : 'en attente'); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php if ($isConfirmed): ?>
                        <span class="bg-green-900 text-green-400 text-xs px-3 py-1 rounded-full">Confirme</span>
                    <?php elseif ($isCancelled): ?>
                        <span class="bg-red-900 text-red-400 text-xs px-3 py-1 rounded-full">Refuse</span>
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

