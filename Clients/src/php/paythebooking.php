<?php
include './conection.php';
include './session_check.php';

// Establish database connection
$pdo = getDatabaseConnection();

if (!empty($_POST['coderes'])) {
    $codereservation = $_POST['coderes'];
    $nameT = $_POST['namet'];
    $cardNumb = $_POST['cardnumb'];
    $exidate = $_POST['dateexi'];
    $cvv = $_POST['cvv'];
    $paye = 0;

    try {
        // Prepare the SQL query using a prepared statement
        $stmt = $pdo->prepare('INSERT INTO payment (Booking_number, Nomet, Card_number, Date_expiration, cvv, Paye) VALUES (:codereservation, :nameT, :cardNumb, :exidate, :cvv, :paye)');
      
        // Bind the parameter to the actual value from the POST request
        $stmt->bindParam(':codereservation', $codereservation, PDO::PARAM_STR);
        $stmt->bindParam(':nameT', $nameT, PDO::PARAM_STR);
        $stmt->bindParam(':cardNumb', $cardNumb, PDO::PARAM_STR);
        $stmt->bindParam(':exidate', $exidate, PDO::PARAM_STR);
        $stmt->bindParam(':cvv', $cvv, PDO::PARAM_INT);
        $stmt->bindParam(':paye', $paye, PDO::PARAM_INT);
      
        // Execute the query
        $stmt->execute();
      
        echo "Payment information successfully saved.";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo "Codereservation is empty.";
}
?>
