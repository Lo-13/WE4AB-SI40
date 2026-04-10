<?php
$title = "Account"; 
include 'partials/header.php'; 
?>

<body class="bg-gray-950 text-white min-h-screen">


<main class="max-w-xl mx-auto px-4 py-12">
    <div class="bg-gray-900 rounded-2xl p-8 border border-gray-800">
        <h2 class="text-2xl font-bold mb-6">Mon compte</h2>
        <div class="flex flex-col gap-4 text-sm">
            <div class="flex justify-between border-b border-gray-800 pb-3">
                <span class="text-gray-500">Prénom</span><span>Jean</span>
            </div>
            <div class="flex justify-between border-b border-gray-800 pb-3">
                <span class="text-gray-500">Nom</span><span>Dupont</span>
            </div>
            <div class="flex justify-between border-b border-gray-800 pb-3">
                <span class="text-gray-500">Email</span><span>jean@mail.com</span>
            </div>
            <div class="flex justify-between border-b border-gray-800 pb-3">
                <span class="text-gray-500">Rôle</span>
                <span class="bg-purple-900 text-purple-400 text-xs px-3 py-1 rounded-full">Utilisateur</span>
            </div>
        </div>
        <a href="sign-out" class="mt-8 block text-center bg-red-700 hover:bg-red-800 text-white py-2 rounded-lg transition">
            Se déconnecter
        </a>
    </div>
</main>

<?php include 'partials/footer.php'; ?>