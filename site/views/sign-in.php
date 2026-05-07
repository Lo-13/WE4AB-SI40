<?php
$title = "Sign In"; 
include 'partials/header.php'; 
?>
<main class="flex items-center justify-center mt-20 px-4">
    <div class="bg-gray-900 rounded-2xl p-8 shadow-lg w-full max-w-md border border-gray-800">
        <h2 class="text-2xl font-bold mb-6 text-center">Se connecter</h2>

        <form action="sign-in" method="post" class="flex flex-col gap-4">

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Email</label>
                <input type="email" name="email" placeholder="email@domain.com" required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Mot de passe</label>
                <div class="relative">
                    <input type="password" id="signin-password" name="password" placeholder="mot de passe" required
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500 pr-10"/>
                    <button type="button" class="toggle-password absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-white" data-target="signin-password">
                        voir
                    </button>
                </div>
            </div>

            <button type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg transition font-semibold mt-2">
                Se connecter
            </button>
        </form>

        <p class="text-center text-gray-500 mt-4 text-sm">
            Pas encore de compte ?
            <a href="sign-up" class="text-purple-400 hover:underline">S'inscrire</a>
        </p>
    </div>
</main>

<?php include 'partials/footer.php'; ?>
