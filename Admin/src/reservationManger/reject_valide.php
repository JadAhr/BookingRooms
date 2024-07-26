<?php

include '../php/session_check.php';
include '../php/pdo.php';

$pdo = getDatabaseConnection();

if(isset($_POST['valid']) && isset($_POST['bookingnumber']) ) { 
    
     $paye = 1;
    
   
} 
if(isset($_POST['rejecte']) && isset($_POST['bookingnumber'])) { 
    $paye = 0;
    
} 

$codebooking = $_POST['bookingnumber'];

$stmt = $pdo->prepare("UPDATE payment SET paye = :payer WHERE booking_number = :bookingnumber");
$stmt->bindParam(':bookingnumber', $codebooking, PDO::PARAM_STR);
$stmt->bindParam(':payer', $paye, PDO::PARAM_INT);

$stmt->execute();

header("Location: ./payemntlist.php");
?>