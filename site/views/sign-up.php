<?php
$title = "Sign Up"; 
include 'partials/header.php'; 
?>
 

<main class="flex items-center justify-center mt-12 mb-12 px-4">
    <div class="bg-gray-900 rounded-2xl p-8 shadow-lg w-full max-w-md border border-gray-800">
        <h2 class="text-2xl font-bold mb-6 text-center">Creer un compte</h2>

        <form action="sign-up" method="post" class="flex flex-col gap-4">

            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="text-gray-400 text-sm mb-1 block">Prenom</label>
                    <input type="text" name="name" required
                           pattern="[A-Za-z -]+"
                           title="Lettres et tirets uniquement"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
                </div>
                <div class="flex-1">
                    <label class="text-gray-400 text-sm mb-1 block">Nom</label>
                    <input type="text" name="last_name" required
                           pattern="[A-Za-z -]+"
                           title="Lettres et tirets uniquement"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
                </div>
            </div>

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Email</label>
                <input type="email" name="email" placeholder="email@domain.com" required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Age</label>
                <input type="number" name="age" min="13" max="99" required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Mot de passe</label>
                <div class="relative">
                    <input type="password" id="password-input" name="password" required
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,128}"
                           title="8 caracteres min, 1 majuscule, 1 chiffre"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500 pr-10"/>
                    <button type="button" class="toggle-password absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-white" data-target="password-input">
                        voir
                    </button>
                </div>
                <div class="mt-2 h-1 w-full bg-gray-700 rounded-full overflow-hidden">
                    <div id="password-strength-bar" class="h-full w-0 transition-all duration-300"></div>
                </div>
                <p id="password-strength-text" class="text-xs mt-1 empty:hidden"></p>
            </div>

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Confirmer le mot de passe</label>
                <div class="relative">
                    <input type="password" id="password-confirm" name="password_conf" required
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,128}"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500 pr-10"/>
                    <button type="button" class="toggle-password absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-white" data-target="password-confirm">
                        voir
                    </button>
                </div>
                <p id="password-match-error" class="text-red-500 text-xs mt-1 hidden">Les mots de passe ne correspondent pas</p>
            </div>

            <button type="submit" id="signup-submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg transition font-semibold mt-2">
                Creer mon compte
            </button>
        </form>

        <p class="text-center text-gray-500 mt-4 text-sm">
            Deja un compte ?
            <a href="sign-in" class="text-purple-400 hover:underline">Se connecter</a>
        </p>
    </div>
</main>

<?php include 'partials/footer.php'; ?>

