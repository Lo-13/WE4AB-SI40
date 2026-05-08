<?php
/*
Vue du compte utilisateur.
Elle affiche les informations du membre actuellement connecte.
 */
$title = "Account";
$user = $user ?? (object) [
    'name' => '',
    'last_name' => '',
    'email' => '',
    'registration_date' => date('Y-m-d H:i:s'),
    'role' => 'user',
];
include 'partials/header.php';
?>

    <main class="max-w-xl mx-auto px-4 py-12">
        <div class="bg-gray-900 rounded-2xl p-8 border border-gray-800">
            <h2 class="text-2xl font-bold mb-6">Mon compte</h2>
            <div class="flex flex-col gap-4 text-sm">
                <div class="flex justify-between border-b border-gray-800 pb-3 gap-4">
                    <span class="text-gray-500">Prenom</span>
                    <span><?= htmlspecialchars($user->name) ?></span>
                </div>
                <div class="flex justify-between border-b border-gray-800 pb-3 gap-4">
                    <span class="text-gray-500">Nom</span>
                    <span><?= htmlspecialchars($user->last_name) ?></span>
                </div>
                <div class="flex justify-between border-b border-gray-800 pb-3 gap-4">
                    <span class="text-gray-500">Email</span>
                    <span class="text-right break-all"><?= htmlspecialchars($user->email) ?></span>
                </div>
                <div class="flex justify-between border-b border-gray-800 pb-3 gap-4">
                    <span class="text-gray-500">Membre depuis</span>
                    <span><?= date('d/m/Y', strtotime($user->registration_date)) ?></span>
                </div>
                <div class="flex justify-between border-b border-gray-800 pb-3 gap-4">
                    <span class="text-gray-500">Role</span>
                    <span class="bg-purple-900 text-purple-400 text-xs px-3 py-1 rounded-full">
                    <?= $user->role === 'admin' ? 'Admin' : 'Utilisateur' ?>
                </span>
                </div  class="flex justify-between border-b border-gray-800 pb-3 gap-4">
                <?php if ($user->role !== 'admin'): ?>
                        <h3 class="text-lg font-semibold text-white mb-2">Demander à être administrateur</h3>
                        <p class="text-gray-400 text-sm mb-4">
                            Vous pouvez envoyer une demande pour obtenir le rôle administrateur. 
                        <form method="POST" action="/account" class="flex flex-col gap-3">
                            <input type="hidden" name="request_admin" value="1">
                            <select
                                    name="admin_room"
                                    required
                                    class="w-full sm:w-auto bg-gray-800 border border-gray-700 text-gray-200 text-sm rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-purple-600"
                                >
                                <?php foreach ($rooms as $room): ?>
                                    <option value="<?= $room->id ?>"><?= htmlspecialchars($room->name) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button
                                type="submit"
                                class="inline-block bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm transition"
                            >
                                Demander à être administrateur d'une salle
                            </button>

                        </form>
                </div>
                <?php else: ?>
                    <div class="mt-8 pt-6 border-t border-gray-800">
                        <h3 class="text-lg font-semibold text-white mb-2">Statut administrateur</h3>
                        <p class="text-green-400 text-sm">Vous êtes déjà administrateur.</p>
                    </div>
                <?php endif; ?>
            <a href="/sign-out" class="mt-8 block text-center bg-red-700 hover:bg-red-800 text-white py-2 rounded-lg transition">
                Se déconnecter
            </a>
            </div>
        </div>
    </main>

<?php include 'partials/footer.php'; ?>

