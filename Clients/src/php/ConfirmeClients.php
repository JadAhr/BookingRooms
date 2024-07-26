<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetTheRoom</title>
    <link rel="stylesheet" href="../../dist/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="">


<?php

include './conection.php';

$pdo = getDatabaseConnection();

if (!empty($_POST['nome'])) {
    $nom = $_POST['nome']; // Assuming 'nome' is the correct field name in your form
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $number = $_POST['telephone'];
    $pass = $_POST['pass'];

    // Hash the password before storing it
    

    $stmt = $pdo->prepare(
        "INSERT INTO inscrir (nome, prenom, email, telephone, pass) VALUES (:nome, :prenom, :email, :telephone, :pass)"
    );
    $stmt->execute([
        ':nome' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':telephone' => $number,
        ':pass' => $pass  ,
    ]);
}
?>


<div id="popup-modal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75">
  <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
    <h3 class="text-xl font-medium text-gray-900">Registration Successful</h3>
    <p class="mt-4 text-sm text-gray-500">Please wait for an email confirmation to your provided email address.</p>
    <a href="../../index.php"><button onclick="hideModal()" class="mt-6 w-full inline-flex justify-center rounded-md border border-transparent bg-blue-500 py-2 px-4 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">ok</button></a>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
  AOS.init();
  function showModal(event) {
    event.preventDefault();
    document.getElementById('popup-modal').classList.remove('');
  }

  function hideModal() {
    document.getElementById('popup-modal').classList.add('hidden');
  }

</script>
</body>
</html>
