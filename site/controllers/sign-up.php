<?php
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

    // Vérification que les mots de passe correspondent
    if ($mdp !== $mdp_conf) {
        $error = 'Les mots de passe ne correspondent pas.';
    } else {
        // Vérifier si l'email existe déjà
        $query = $db->prepare("SELECT id FROM user WHERE email = :email");
        $query->execute([':email' => $email]);

        if ($query->fetch()) {
            $error = 'Cet email est déjà utilisé.';
        } else {
            // Hasher le mot de passe
            $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

            // Insérer l'utilisateur en DB
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