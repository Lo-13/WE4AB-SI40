<?php
/*
Pied de page commun.
Il charge les scripts JavaScript utilises par les pages du projet.
JULIE FOOTER
 */
?>
    <script src="/site/js/validation.js"></script>
    <script src="/site/js/animations.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<footer class="bg-gray-900 border-t border-gray-800 mt-auto">
    <div class="max-w-7xl mx-auto px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Brand Section -->
            <div class="col-span-1 md:col-span-1">
                <h3 class="text-purple-400 text-xl font-bold mb-4">GamingRooms</h3>
                <p class="text-gray-400 text-sm mb-4">Découvrez les meilleurs espaces gaming pour vos événements et compétitions.</p>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-400 hover:text-purple-400 transition">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                </div>
            </div>

            <!-- Navigation Section -->
            <div>
                <h4 class="text-white font-semibold mb-4">Navigation</h4>
                <ul class="space-y-2">
                     <li><a href="sign-in" class="text-gray-400 hover:text-purple-400 transition text-sm">Se Connecter</a></li>
                    <li><a href="sign-up" class="text-gray-400 hover:text-purple-400 transition text-sm">S'Inscrire</a></li>
                    <li><a href="home" class="text-gray-400 hover:text-purple-400 transition text-sm">Accueil</a></li>
                    <li><a href="rooms" class="text-gray-400 hover:text-purple-400 transition text-sm">Nos Salles</a></li>
                    <li><a href="my-reservations" class="text-gray-400 hover:text-purple-400 transition text-sm">Mes Réservations</a></li>
                    <li><a href="account" class="text-gray-400 hover:text-purple-400 transition text-sm">Mon Compte</a></li>
                </ul>
            </div>

            <!-- Informations Section -->
            <div>
                <h4 class="text-white font-semibold mb-4">Informations</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-purple-400 transition text-sm">Conditions d'Utilisation</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-purple-400 transition text-sm">Politique de Confidentialité</a></li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div>
                <h4 class="text-white font-semibold mb-4">Contact</h4>
                <p class="text-gray-400 text-sm mb-2">
                    <i class="fas fa-map-marker-alt text-purple-400 mr-2"></i> 4 Rue Edouard Branly, 90000 Belfort, France
                </p>
                <p class="text-gray-400 text-sm mb-2">
                    <i class="fas fa-phone text-purple-400 mr-2"></i>+33 07 06 05 04 03
                </p>
                <p class="text-gray-400 text-sm">
                    <i class="fas fa-envelope text-purple-400 mr-2"></i>contact@gamingrooms.fr
                </p>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-800 mt-8 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-sm">
                    &copy; 2026 GamingRooms. Tous droits réservés.
                </p>
                <div class="flex gap-6">
                    <a href="#" class="text-gray-500 hover:text-purple-400 text-sm transition">À Propos</a>
                    <a href="#" class="text-gray-500 hover:text-purple-400 text-sm transition">Support</a>
                    <a href="#" class="text-gray-500 hover:text-purple-400 text-sm transition">FAQ</a>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
