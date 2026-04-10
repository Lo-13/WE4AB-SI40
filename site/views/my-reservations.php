<?php
$title = "My Reservations"; 
include 'partials/header.php'; 
?>

<body class="bg-gray-950 text-white min-h-screen">



<main class="max-w-3xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-bold mb-8">Mes réservations</h2>

    <div class="flex flex-col gap-4">

        <div class="bg-gray-900 rounded-xl p-6 border-l-4 border-purple-500 border border-gray-800">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-semibold text-lg">Salle Alpha</h3>
                    <p class="text-gray-400 text-sm mt-1">12 avril 2025 · 14h00 → 16h00</p>
                    <p class="text-gray-500 text-sm">2 joueurs</p>
                </div>
                <span class="bg-green-900 text-green-400 text-xs px-3 py-1 rounded-full">Confirmé</span>
            </div>
        </div>

        <div class="bg-gray-900 rounded-xl p-6 border-l-4 border-yellow-500 border border-gray-800">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="font-semibold text-lg">Salle Omega</h3>
                    <p class="text-gray-400 text-sm mt-1">20 avril 2025 · 18h00 → 20h00</p>
                    <p class="text-gray-500 text-sm">5 joueurs</p>
                </div>
                <span class="bg-yellow-900 text-yellow-400 text-xs px-3 py-1 rounded-full">En attente</span>
            </div>
        </div>

    </div>
</main>

<?php include 'partials/footer.php'; ?>