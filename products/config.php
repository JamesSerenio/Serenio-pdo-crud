<?php

$host = 'localhost';
$dbname = 'serenio';
$username = 'root';
$password = '';
/*
$host = 'localhost';
$dbname = 'u593341949_db_serenio';
$username = 'u593341949_dev_serenio';
$password = '20212014Serenio';
*/
try {   
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 die("Database connection failed: " . $e->getMessage());
}

