<?php
$dbname = 'we4x_si40_db';

try{
    $db = new PDO("mysql:host=localhost;dbname=$dbname", 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
}
?>