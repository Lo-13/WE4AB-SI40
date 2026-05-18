<?php
require_once __DIR__ . '/../models/user.php';
session_start();

$_SESSION = array();

session_destroy();

header("Location: /home");
exit;
?>
