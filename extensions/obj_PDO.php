<?php

$host = 'localhost';
$dbName = 'gestione_libreria';
$userName = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $userName, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("The connection to DB is not working. Message: " . $e->getMessage());
}
