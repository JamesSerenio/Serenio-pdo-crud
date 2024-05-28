<?php
// Database configuration

$dbHost = 'localhost';
$dbName = 'serenio';
$dbUser = 'root'; 
$dbPass = '';
/*
$dbHost = 'localhost';
$dbName = 'u593341949_db_serenio';
$dbUser = 'u593341949_dev_serenio'; // Palitan ng iyong MySQL username
$dbPass = '20212014Serenio';
*/
// Set up PDO connection to the database
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
