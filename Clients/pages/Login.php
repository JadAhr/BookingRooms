<?php
include '../src/php/conection.php';
session_start();


$pdo = getDatabaseConnection();

$errorMessage = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['email']) && !empty($_POST['pass'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $stmt = $pdo->prepare("SELECT * FROM clients WHERE email = :email AND Pass = :pass");
        $stmt->execute(['email' => $email, 'pass' => $pass]);
        $Client = $stmt->fetch();

         if ($Client) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email; // Store the username or any other info you need
            $_SESSION['id'] = $Client['codeClient'];
            header("Location: ../index.php");
            exit();
        } else {
            $errorMessage = 'Check your email or password and try again.';
        }
    } else {
        $errorMessage = 'Both fields are required.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetTheRoom</title>
    <link rel="stylesheet" href="../dist/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="">

<!-- Navbar start -->
<nav class="bg-white fixed w-full z-50 border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="../index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
      <span class="self-center text-3xl font-semibold whitespace-nowrap" style="font-family: Great Vibes, cursive; font-weight: 500;">GetYourRoom</span>
    </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <a href="./GetStarted.html" id="login-button">
          <i class="fa-regular fa-user text-2xl" style="color: #000000;"></i>
        </a>  
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <span></span>
    </div>
  </div>
</nav>
<!-- Navbar end -->

<div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
  <div class="bg-white shadow-md rounded-md p-6">
    <div class="flex items-center space-x-3 rtl:space-x-reverse">  
      <span class="self-center mx-auto h-12 w-auto text-3xl font-semibold whitespace-nowrap animate-bounce" style="font-family: Great Vibes, cursive; font-weight: 500;">GetTheRoom</span>
    </div>

    <h2 class="my-3 text-center text-3xl font-bold tracking-tight text-gray-900">Sign up for an account</h2>
    
    

    <form class="max-w-sm mx-auto flex flex-col" method="post" action="#">
      <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Poppins, sans-serif">Votre email</label>
        <input style="font-family: Poppins, sans-serif" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email" required />
      </div>
      <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Poppins, sans-serif">Votre Password</label>
        <input style="font-family: Poppins, sans-serif" name="pass" placeholder="Password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        <span class="password-toggle" onclick="togglePasswordVisibility()">
          <i id="toggleIcon" class="fas fa-eye text-1xl mt-5" style="cursor: pointer;"></i>
        </span>
      </div>
      <?php if ($errorMessage): ?>
    <p class="text-red-500 text-center mb-4"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
      <div class="flex items-start mb-5">
        <div class="flex items-center h-5">
          <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
        </div>
        <label style="font-family: Poppins, sans-serif" for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
      </div>
      <button style="font-family: Poppins, sans-serif" type="submit" class="text-white duration-700 bg-blue-500 hover:text-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="./src/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
  AOS.init();

  function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var toggleIcon = document.getElementById("toggleIcon");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleIcon.classList.remove("fa-eye");
      toggleIcon.classList.add("fa-eye-slash");
    } else {
      passwordInput.type = "password";
      toggleIcon.classList.remove("fa-eye-slash");
      toggleIcon.classList.add("fa-eye");
    }
  }
</script>

</body>
</html
