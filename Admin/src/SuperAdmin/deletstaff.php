<?php
// Include your PDO connection script
include '../php/pdo.php';

// Get PDO database connection
$pdo = getDatabaseConnection();

// Check if nome and codeinscrir parameters are provided in the GET request
if (!empty($_GET['codestaff'])) {
    echo $_GET['codestaff'];
    // Sanitize and store parameters
    $codestaff = $_GET['codestaff'];
    echo $codestaff;
   

    // Prepare the DELETE statement
    $stmt = $pdo->prepare('DELETE FROM staff WHERE codeStaff = :codestaf ');

    // Bind parameters
    $stmt->bindParam(':codestaf', $codestaff);
    

    // Execute the statement
    $stmt->execute();

    // Optionally, check if the deletion was successful
    if ($stmt->rowCount() > 0) {
        echo 'Deletion successful.';
    } else {
        echo 'No records deleted. Check parameters.';
    }
} else {
    echo 'Missing parameters (codeinstaff).';
}
header("Location: ./ListStaffAd.php");
?>