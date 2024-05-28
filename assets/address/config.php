<?php
// Database configuration
$dbHost = 'localhost';
$dbName = 'serenio';
$dbUser = 'root'; // Palitan ng iyong MySQL username
$dbPass = ''; // Palitan ng iyong MySQL password

// Set up PDO connection to the database
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
