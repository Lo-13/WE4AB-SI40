<?php
$title = "Sign Up"; 
include 'partials/header.php'; 
?>

<body class="bg-gray-950 text-white min-h-screen">



<main class="flex items-center justify-center mt-12 mb-12 px-4">
    <div class="bg-gray-900 rounded-2xl p-8 shadow-lg w-full max-w-md border border-gray-800">
        <h2 class="text-2xl font-bold mb-6 text-center">Créer un compte</h2>

        <form action="sign-up" method="post" class="flex flex-col gap-4">

            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="text-gray-400 text-sm mb-1 block">Prénom</label>
                    <input type="text" name="name" required
                           pattern="[A-Za-zÀ-ÖØ-öø-ÿ\-]+"
                           title="Lettres et tirets uniquement"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
                </div>
                <div class="flex-1">
                    <label class="text-gray-400 text-sm mb-1 block">Nom</label>
                    <input type="text" name="last_name" required
                           pattern="[A-Za-zÀ-ÖØ-öø-ÿ\-]+"
                           title="Lettres et tirets uniquement"
                           class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
                </div>
            </div>

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Email</label>
                <input type="email" name="email" placeholder="email@domain.com" required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>

            <!-- age correspond au champ 'age' tinyint(4) de la DB -->
            <div>
                <label class="text-gray-400 text-sm mb-1 block">Âge</label>
                <input type="number" name="age" min="13" max="99" required
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Mot de passe</label>
                <input type="password" name="password" required
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,128}"
                       title="8 caractères min, 1 majuscule, 1 chiffre"
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>

            <div>
                <label class="text-gray-400 text-sm mb-1 block">Confirmer le mot de passe</label>
                <input type="password" name="password_conf" required
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,128}"
                       class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-purple-500"/>
            </div>

            <button type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white py-2 rounded-lg transition font-semibold mt-2">
                Créer mon compte
            </button>
        </form>

        <p class="text-center text-gray-500 mt-4 text-sm">
            Déjà un compte ?
            <a href="sign-in" class="text-purple-400 hover:underline">Se connecter</a>
        </p>
    </div>
</main>

<?php include 'partials/footer.php'; ?>
