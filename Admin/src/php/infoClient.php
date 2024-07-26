<?php
    if(!empty($_GET['CodeClient'])){
        $id=$_GET['CodeClient'];
        include './pdo.php';
            $pdo = getDatabaseConnection();
        $reponse = $pdo->query('SELECT * FROM CLIENTS WHERE CodeClient = '.$id);
        while ($donnees = $reponse->fetch())
        {
            //$id=$donnees[0];
            $nom=$donnees[1];
            $prenom=$donnees[2];
            $email=$donnees[3];
            $ville=$donnees[4];
            $ville=$donnees[5];
        }
    }
?>    	
	
    
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>infos Client</title>
</head>
<body>
    <h1 align="center"><u>Information du Client</u></h1>

	<table width="400"  align="center" >
		<tr><td>id : </td><td><?php echo "<font color='blue' size='6px'>$id</font>"; ?>  </td>	</tr>
        <tr><td>Nom :</td><td><?php echo "<font color='blue' size='6px'>$nom</font>"; ?>  </td>	</tr>
		<tr><td>Prénom :</td><td><?php echo "<font color='blue' size='6px'>$prenom</font>"; ?></td>	</tr>		
		<tr><td>Ville :</td>	<td><?php echo "<font color='blue' size='6px'>$ville</font>"; ?> </td></tr>		
		<tr><td colspan="2" align="center"> <hr  color="blue">
				<a  href="listeClient.php" >
                    <button style="background-color:#55AA22;width:300px" >
                        <h3>Retour à la liste des clients</h3>
                    </button>
                </a>                
			</td>
		</tr>
	</table>
</body>
</html>

