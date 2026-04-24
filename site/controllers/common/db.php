<?php
$dbname = 'we4x_si40_db';

// Function to get the appropriate database host based on the operating system
function getDbHost() {
    $osFamily = PHP_OS_FAMILY;
    
    if ($osFamily === 'Darwin') {
        // macOS - Use Unix socket
        return "host=127.0.0.1";
    } else if ($osFamily === 'Windows') {
        // Windows - Use localhost
        return "host=localhost";
    } else {
        // Linux and others - Use localhost
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