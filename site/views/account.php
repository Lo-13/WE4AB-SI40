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
                </div>
            </div>
            <a href="/sign-out" class="mt-8 block text-center bg-red-700 hover:bg-red-800 text-white py-2 rounded-lg transition">
                Se deconnecter
            </a>
        </div>
    </main>

<?php include 'partials/footer.php'; ?>

