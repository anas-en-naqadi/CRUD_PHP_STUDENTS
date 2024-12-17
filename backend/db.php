<?php
$host = 'localhost';
$dbname = 'php_form';
$username = 'root';
$password = '';

try {
    $dsn = "mysql:host=$host;dbname=$dbname;";
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
