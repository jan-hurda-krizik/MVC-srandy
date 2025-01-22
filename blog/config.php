<?php
$host = 'localhost';     // XAMPP obvykle localhost
$port = 3306;            // Výchozí port MySQL ve XAMPP
$dbname = 'blog';
$username = 'root';      // Ve výchozím nastavení XAMPP často root
$password = '';          // A bez hesla

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
