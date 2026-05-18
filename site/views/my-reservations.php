<?php
/*
Vue des reservations du user connecte.
Elle affiche aussi les informations de paiement si elles existent.
 */
$title = "My Réservations";
$reservations = $reservations ?? [];
include 'partials/header.php';
?>

<main class="max-w-4xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold mb-8">Mes réservations</h2>

    <!-- SECTION À VENIR -->
    <section class="mb-16">
        <h3 class="text-xl font-semibold mb-6">À venir</h3>

        <div class="flex flex-col gap-5">
            <?php if (empty($upcomingReservations)): ?>
                <p class="text-gray-500">Aucune réservation à venir.</p>
            <?php else: ?>
                <?php foreach ($upcomingReservations as $r):
                    $isConfirmed = $r['is_confirmed'];
                    $isCancelled = $r['is_cancelled'];
                    $borderClass = $isConfirmed ? 'border-green-500' : ($isCancelled ? 'border-red-500' : 'border-yellow-500');
                    $badgeClass = $isConfirmed ? 'bg-green-900 text-green-400' : ($isCancelled ? 'bg-red-900 text-red-400' : 'bg-yellow-900 text-yellow-400');
                ?>
                    <div class="bg-gray-900 rounded-xl p-6 border-l-4 <?php echo $borderClass; ?> border-gray-800">
                        <div class="flex justify-between items-start gap-4">
                            <div>
                                <h4 class="font-semibold text-lg"><?php echo htmlspecialchars($r['room_name']); ?></h4>
                                <p class="text-gray-400 text-sm mt-1">
                                    <?php echo $r['start_obj']->format('d/m/Y'); ?> - <?php echo $r['start_obj']->format('H\hi'); ?> à <?php echo $r['end_obj']->format('H\hi'); ?>
                                </p>
                                <p class="text-gray-500 text-sm"><?php echo htmlspecialchars($r['nb_player']); ?> joueurs</p>
                                <?php if (!empty($r['payment_amount'])): ?>
                                    <p class="text-gray-500 text-sm">
                                        Paiement: <?php echo htmlspecialchars(number_format($r['payment_amount'], 2)); ?> EUR
                                        - <?php echo htmlspecialchars($r['payment_status'] === 'completed' ? 'payé' : 'en attente'); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <span class="<?php echo $badgeClass; ?> text-xs px-3 py-1 rounded-full whitespace-nowrap">
                                <?php 
                                    echo $isConfirmed ? 'Confirmée' : ($isCancelled ? 'Refusée' : 'En attente');
                                ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- DIVIDER -->
    <div class="h-px bg-gray-700 my-16"></div>

    <!-- SECTION HISTORIQUE -->
    <section>
        <h3 class="text-xl font-semibold mb-6">Historique</h3>

        <div class="flex flex-col gap-5">
            <?php if (empty($historicReservations)): ?>
                <p class="text-gray-500">Aucune réservation passée.</p>
            <?php else: ?>
                <?php foreach ($historicReservations as $r):
                    $isConfirmed = $r['is_confirmed'];
                    $isCancelled = $r['is_cancelled'];
                    $canComment = $r['can_comment'];
                    $borderClass = $isConfirmed ? 'border-green-500' : ($isCancelled ? 'border-red-500' : 'border-yellow-500');
                    $badgeClass = $isConfirmed ? 'bg-green-900 text-green-400' : ($isCancelled ? 'bg-red-900 text-red-400' : 'bg-yellow-900 text-yellow-400');
                ?>
                    <div class="bg-gray-900 rounded-xl p-6 border-l-4 <?php echo $borderClass; ?> border-gray-800">
                        <div class="flex justify-between items-start gap-4 mb-4">
                            <div>
                                <h4 class="font-semibold text-lg"><?php echo htmlspecialchars($r['room_name']); ?></h4>
                                <p class="text-gray-400 text-sm mt-1">
                                    <?php echo $r['start_obj']->format('d/m/Y'); ?> - <?php echo $r['start_obj']->format('H\hi'); ?> à <?php echo $r['end_obj']->format('H\hi'); ?>
                                </p>
                                <p class="text-gray-500 text-sm"><?php echo htmlspecialchars($r['nb_player']); ?> joueurs</p>
                            </div>

                            <span class="<?php echo $badgeClass; ?> text-xs px-3 py-1 rounded-full whitespace-nowrap">
                                <?php 
                                    echo $isConfirmed ? 'Confirmée' : ($isCancelled ? 'Refusée' : 'En attente');
                                ?>
                            </span>
                        </div>

                        <?php if ($canComment): ?>
                            <div class="mt-4 border-t border-gray-800 pt-4">
                                <h5 class="text-sm font-semibold text-white mb-2">Ajouter un commentaire</h5>
                                <form action="my-reservations" method="POST" class="flex flex-col gap-3">
                                    <div class="flex flex-col gap-2">
                                    <label class="text-gray-400 text-sm">Note (1–10)</label>
                                    <select name="comment_rating" class="w-28 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2 text-sm">
                                        <?php for ($i = 1; $i <= 10; $i++): ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    </div>
                                    <textarea
                                        name="comment_text"
                                        rows="3"
                                        placeholder="Partage ton experience..."
                                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-purple-500"
                                    ></textarea>
                                    <input type="hidden" name="reservation_id" value="<?php echo $r['id']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $r['user_id']; ?>">
                                    <div class="flex items-center gap-3">
                                        <button
                                            type="submit"
                                            class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm transition"
                                        >
                                            Publier
                                        </button>
                                    </div>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php include 'partials/footer.php'; ?>
