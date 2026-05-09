<?php
/*
Vue de la page d'accueil.
Elle sert d'entree simple vers la page des salles etc ....
 */
$title = "Home"; 
include 'partials/header.php'; 
?>

<main class="flex flex-col items-center justify-center text-center mt-28 px-4">
    <h1 class="text-5xl font-bold mb-4 scroll-reveal">Réservez votre <span class="text-purple-400">salle gaming</span></h1>
    <p class="text-gray-400 text-lg max-w-xl mb-10 scroll-reveal" style="transition-delay: 100ms">Salles equipees PS5, Xbox, PC pour jouer entre amis. Reservation simple et rapide.</p>
    <a href="rooms" class="bg-purple-600 hover:bg-purple-700 text-white text-lg px-8 py-3 rounded-xl transition scroll-reveal" style="transition-delay: 200ms">Voir les salles</a>
</main>

<?php include 'partials/footer.php'; ?>

