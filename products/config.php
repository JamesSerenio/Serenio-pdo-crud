<?php

$host = 'localhost';
$dbname = 'serenio';
$username = 'root';
$password = '';
/*
define('DB_SERVER', 'localhost');
define('DB_NAME', 'u593341949_db_serenio');
define('DB_USERNAME', 'u593341949_dev_serenio');
define('DB_PASSWORD', '20212014Serenio');
*/
try {   
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 die("Database connection failed: " . $e->getMessage());
}

