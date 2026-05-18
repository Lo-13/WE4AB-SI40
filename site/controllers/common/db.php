<?php
/*
Fichier de connexion a la base de donnees.
Il est inclus dans les controleurs qui ont eux besoin d'acceder a MySQL.
La variable $db obtenue ici est ensuite reutilisee pour les requetes PDO.
 */
$dbname = 'we4x_si40_db';

function getDbHost() {
    $osFamily = PHP_OS_FAMILY;
    
    if ($osFamily === 'Darwin') {
        return "host=127.0.0.1";
    } else if ($osFamily === 'Windows') {
        return "host=localhost";
    } else {
        return "host=localhost";
    }
}

$dbHost = getDbHost();

try{
    $db = new PDO("mysql:$dbHost;dbname=$dbname", 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
}
?>
