<?php
include './pdo.php';


$pdo = getDatabaseConnection();



if (!empty($_POST['Role'])) {
    $role = $_POST['Role'];
    echo $role;
    $user = $_POST['username'];
    $name = $_POST['nome'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $pass = $_POST['pass'];


    $Resultat = $pdo->prepare(
        "INSERT INTO staff (username,nome, prenom, email,Pass, telephone,rolle) VALUES (:user,:nome, :prenom, :email,:ps,:telephone,:rolle )"
    );

    $Client = $Resultat->execute(array(
        'user' => $user,
        'nome' => $name,
        'prenom' => $prenom,
        'email' => $email,
        'ps' => $pass,
        'telephone' => $telephone,
        'rolle' => $role,
    ));

    header("Location: .././SuperAdmin/index.php");
    
    

   
}
 ?>