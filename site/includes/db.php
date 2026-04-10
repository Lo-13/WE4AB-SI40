<?php

$host = 'localhost';
$dbname = 'we4x_si40_db';
$user = 'root';
$password = '';

try{
    $pdo= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOEXception $e) {
    die("Erreur de connexion : ".$e->getMessage());
}