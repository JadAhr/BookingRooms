<?php

function getDatabaseConnection() {
    try {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=hotelbooking;charset=utf8',
            'jad',
            'jad99'
        );
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

?>
