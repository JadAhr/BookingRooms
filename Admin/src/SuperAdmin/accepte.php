<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../dist/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
include '../php/pdo.php';


$pdo = getDatabaseConnection();

// Check if the client's name is provided via POST request
if (!empty($_GET['nome']) && !empty($_GET['codeinscrir'])) {
    $clientName = $_GET['nome'];
    $codeinscrir = $_GET['codeinscrir'];
    

    try {
        // Prepare the SELECT query to get client information by name
        $inpute = $pdo->prepare('SELECT nome, prenom, email, telephone, Pass FROM inscrir WHERE nome = :nome');
        $inpute->execute(array('nome' => $clientName));
        

        // Fetch the data
        $donnees = $inpute->fetch(PDO::FETCH_ASSOC);

        if ($donnees) {
            $nome = $donnees['nome'];
            $prenom = $donnees['prenom'];
            $email = $donnees['email'];
            $telephone = $donnees['telephone'];
            $ps = $donnees['Pass'];

            // Begin transaction
            $pdo->beginTransaction();

            // Insert data into clients table
            $Resultat = $pdo->prepare(
                "INSERT INTO clients (nome, prenom, email, telephone, Pass) VALUES (:nome, :prenom, :email, :telephone, :ps)"
            );

            $Client = $Resultat->execute(array(
                'nome' => $nome,
                'prenom' => $prenom,
                'email' => $email,
                'telephone' => $telephone,
                'ps' => $ps
            ));

            if ($Client) {
                // Delete data from inscrir table
                $sup = $pdo->prepare('DELETE FROM inscrir WHERE codeDeinscrir = :codeDeinscrir AND nome = :nome');
                $sup->execute(array('codeDeinscrir' => $codeinscrir, 'nome' => $clientName));

                // Commit transaction
                $pdo->commit();

                ?>
                <div class="flex flex-col w-full h-screen items-center justify-center space-y-5">  
                    <span class="my-7 self-center h-5 w-auto text-3xl font-semibold whitespace-nowrap animate-bounce" style="font-family: Poppins, sans-serif">Client information successfully inserted into the clients table and removed from inscrir table.</span>
                    <button><a href="./addClientList" class="py-3 px-3 bg-blue-500 text-3xl rounded-sm text-white hover:bg-blue-700" style="font-family: Poppins, sans-serif">Go back</a></button>
                </div>
                <?php
            } else {
                $pdo->rollBack();
                echo "Failed to insert client information into the clients table.";
            }
        } else {
            echo "No client found with the name: $clientName";
        }
    } catch (Exception $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        die('Erreur : ' . $e->getMessage());
    }
} else {
    echo "No client name or inscription code provided.";
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="../../src/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
