<?php
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
