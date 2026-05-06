<?php
require_once __DIR__ . '/../models/user.php';
session_start();
require __DIR__ . '/common/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email =trim($_POST['email']);
    $mdp =($_POST['password']);

    $query = $db->prepare("SELECT * FROM user WHERE email = :email");
    $query->execute(['email' => $email]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($mdp, $user['password'])) {
        $userObj = new User();
        $userObj->id = $user['id'];
        $userObj->email = $user['email'];
        $userObj->name = $user['name'];
        $userObj->last_name = $user['last_name'];
        $userObj->role = $user['role'];
        $userObj->registration_date = $user['registration_date'];

        $_SESSION['user'] = $userObj;

        if ($userObj->role == 'admin') {
            header('Location: dashboard');
            exit;
        } else if ($userObj->role == 'user') {
            header('Location: home');
            exit;
        } else {
            $erreur = 'Email ou mot de passe incorrect';
        }
    }
}
?>

