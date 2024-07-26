<?php
session_start(); // Ensure this is at the very top

include './pdo.php';

// Establish database connection
$pdo = getDatabaseConnection();

if (!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['Role'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $role = $_POST['Role'];

    // Prepare the SQL statement
    $stmt = $pdo->prepare("SELECT * FROM staff WHERE Username = :user AND Pass = :pass AND rolle = :role");
    $stmt->execute(['user' => $user, 'pass' => $pass, 'role' => $role]);
    $user = $stmt->fetch();

    if ($user) {
        $stafid = $user['codeStaff'];
        $_SESSION['loggedin'] = true;
        $_SESSION['codeStaff'] = $stafid;

        switch ($role) {
            case 'Front Desk Manager':
                header("Location: ../FrontDeskManger/ClientList.php");
                break;
            case 'Reservations Manager':
                header("Location: ../reservationManger/payemntlist.php");
                break;
            case 'Les chambre Manager':
                header("Location: rooms.php");
                break;
            case 'Cliente Manager':
                header("Location: clients.php");
                break;
            case 'Superior Admin':
                header("Location: ../SuperAdmin/index.php");
                break;
            case 'Superio Edituer':
                header("Location: editor.php");
                break;
            default:
                // Handle unknown role if necessary
                echo "Rôle inconnu. Veuillez vérifier vos informations et réessayer.";
                exit();
        }
        exit(); // Ensure no further code is executed after the redirect
    } else {
        // User does not exist, display an error message
        ?>
        <div class="flex flex-col w-full h-screen items-center justify-center space-y-5">  
            <span class="my-7 self-center h-5 w-auto text-3xl font-semibold whitespace-nowrap animate-bounce" style="font-family: Poppins, sans-serif"><?php echo "Il y a un problème dans vos informations."; ?></span>
            <button><a href="../../index.html" class="py-3 px-3 bg-blue-500 text-3xl rounded-sm text-white hover:bg-blue-700" style="font-family: Poppins, sans-serif">Go back</a></button>
        </div>
        <?php
    }
} else {
    // Handle case where POST data is not set
    echo "Veuillez remplir tous les champs.";
}
?>
