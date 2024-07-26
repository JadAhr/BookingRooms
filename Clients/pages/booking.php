<?php
// Check if the user is logged in
include '../src/php/conection.php';
include '../src/php/session_check.php';

$pdo = getDatabaseConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $nom = htmlspecialchars($_POST['NomComplete']);
    echo $nom;
    $in = htmlspecialchars($_POST['datein']);
    $out = htmlspecialchars($_POST['dateout']);
    

    // Generate a random alphanumeric reservation code
    $reservation_code = 'RES-' . substr(md5(uniqid(rand(), true)), 0, 6); // Example: RES-abcd123

    // Insert into the database (assuming MySQL and using MySQLi)
    $id = $_SESSION['id']; // Assuming 'id' is stored in session after login
    $room_id = htmlspecialchars($_POST['room_id']); // Assuming you pass room_id from JavaScript
    echo ($room_id);

    $query = $pdo->prepare("INSERT INTO reservation (codeChamber, codeClient, codeDereservation, Checkin, Checkout,NomComplete)
            VALUES (:room_id, :id, :reservation_code, :checkin, :checkout ,:nom)");

    $query->bindParam(':room_id', $room_id);
    $query->bindParam(':id', $id);
    $query->bindParam(':reservation_code', $reservation_code);
    $query->bindParam(':checkin', $in);
    $query->bindParam(':nom', $nom);
    $query->bindParam(':checkout', $out);
    
    
    $query->execute();
    
    
    header("Location: ../src/php/Profile.php");
}


?>
