<?php
/*
Controleur de la sign up
Donc là user s'enregistre envoie les données et vérifie avant que les
mdp soit les mêmes, email différent etc ...
 */
require_once __DIR__ . '/../models/user.php';
session_start();
require __DIR__ . '/common/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name']);
    $lastname = trim($_POST['last_name']);
    $age     = (int)$_POST['age'];
    $email    = trim($_POST['email']);
    $mdp      = $_POST['password'];
    $mdp_conf = $_POST['password_conf'];
    $role     = "user";

    if ($mdp !== $mdp_conf) {
        $error = 'Les mots de passe ne correspondent pas.';
    } else {
        $query = $db->prepare("SELECT id FROM user WHERE email = :email");
        $query->execute([':email' => $email]);

        if ($query->fetch()) {
            $error = 'Cet email est deja utilise.';
        } else {
            $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

            $query = $db->prepare('INSERT INTO user (email, name, last_name, age, password, role, registration_date)
                VALUES (:email, :name, :lastname, :age, :mdp, :role, NOW())'); 

            $query->execute([
                    ':email'    => $email,
                    ':name'     => $name,
                    ':lastname' => $lastname,
                    ':age'      => $age,
                    ':mdp'      => $mdp_hash,
                    ':role'     => $role,
            ]);
            header('Location: /sign-in');
        }
    }
}
?>
