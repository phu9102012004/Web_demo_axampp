<?php
require_once __DIR__ . '/config.php';
try {
    $pdo = new PDO('mysql:host=localhost;dbname=dqshop;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
    die('DB Connection failed: '.$e->getMessage());
}
?>