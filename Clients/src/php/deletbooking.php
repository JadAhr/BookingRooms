<?php 

include './conection.php';
include './session_check.php';

// Establish database connection
$pdo = getDatabaseConnection();

// Check if 'coderes' is set and not empty
if (!empty($_POST['coderes'])) {
    $codedechamber = $_POST['coderes'];
    echo $codedechamber;

    // Prepare SQL statement
    $stmt = $pdo->prepare("DELETE FROM reservation WHERE codeDereservation = :codebooking");

    // Bind the parameter
    $stmt->bindParam(':codebooking', $codedechamber, PDO::PARAM_STR); // Assuming codeDereservation is a string

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        // Redirect after successful deletion
        header("Location: ./Profile.php");
        exit();
    } else {
        // Handle error if the execution failed
        echo "Error: Could not execute the delete statement.";
    }
} else {
    // Handle the case where 'coderes' is not set or is empty
    echo "Error: No reservation code provided.";
}

header("Location: ./Profile.php");
?>

