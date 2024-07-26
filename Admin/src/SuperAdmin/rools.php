<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Client List</title>
  <link rel="stylesheet" href="../../dist/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      .password-cell {
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
      .password {
        font-family: 'Poppins', sans-serif;
        letter-spacing: 0.15em;
      }
    </style>
</head>
<body class="relative">
<div class="fixed w-full">
<nav class="bg-white w-full z-50 border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="../index.html" class="flex items-center space-x-3 rtl:space-x-reverse">
      <span class="self-center text-3xl font-semibold whitespace-nowrap" style="font-family: Great Vibes, cursive; font-weight: 500;">GetYourRoom</span>
    </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <span></span>
                <?php
                session_start(); // Ensure this is at the very top
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                    <div class="relative">
                        <div id="profile-dropdown" class="cursor-pointer">
                            <i class="fa-solid fa-user text-2xl" alt="Profile Picture" style="color: #000000;"></i>
                        </div>
                        <ul id="dropdown-menu" class="absolute hidden pl-11 bg-white border rounded-sm shadow-md mt-2 py-1 w-36">
                            <li><a href="../php/logeout.php" style="font-family: Poppins, sans-serif">Logout</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="#" id="login-button">
                        <i class="fa-solid fa-user text-2xl" alt="Profile Picture" style="color: #000000;"></i>
                    </a>
                <?php endif; ?>
            </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <span></span>
    </div>
  </div>
</nav>
<nav class="bg-gray-50 dark:bg-gray-700">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                <li>
                    <a href="./index.php" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Clients Liste</a>
                </li>
                <li>
                    <a href="./ListStaffAd.php" class="text-gray-900 dark:text-white hover:underline">Staff Liste</a>
                </li>
                <li>
                    <a href="./adduser.php" class="text-gray-900 dark:text-white hover:underline">New User</a>
                </li>
                <li>
                    <a href="#" class="text-gray-900 dark:text-white hover:underline">Liste de les role</a>
                </li>
                <li>
                    <a href="./addClientList.php" class="text-gray-900 dark:text-white hover:underline">Confirme Les Clients</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</div>

<div class="flex">
        <div class="text-center w-full p-8">
            <h2 class="text-4xl m-2 text-gray-700 font-bold" style="font-family: Poppins, sans-serif" data-aos="fade-up" data-aos-delay="600"></h2>
            <form action="#" method="get">
                <input name="namecl" type="hidden" class="w-96 p-2 border border-gray-300 rounded" placeholder="Search By Name of the ...">
            </form>
        </div>
    </div>

<!-- PHP block to fetch and display client data -->
 <?php


include '../php/pdo.php';


$pdo = getDatabaseConnection();


  // Prepare the SQL query using a prepared statement
  $stmt = $pdo->prepare('SELECT *  FROM rolle');

  // Bind the parameter to the actual value from the GET request
 

  // Execute the query
  $stmt->execute();

  // Fetch the results
  $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
?>

<div class="text-center my-8">
<div class="flex">
    </div>
<h1 class="text-3xl font-bold" style="font-family: Poppins, sans-serif">La Liste De Staff</h1>
</div>
<table class="mx-auto w-3/4 border-collapse bg-white border border-gray-400">
  <thead>
      <tr class="bg-gray-300 text-gray-700 uppercase text-sm leading-normal">
          <th class="py-3 px-6 text-left">id de role</th>
          <th class="py-3 px-6 text-left">NomeDerolle</th>
          
      </tr>
  </thead>
  <tbody class="text-gray-600 text-sm font-light">
      <?php foreach ($response as $donnees):?>
      <tr class="border-b border-gray-200 hover:bg-gray-100">
          <td class="py-3 px-6 text-left" style="font-family: Poppins, sans-serif"><?php echo htmlspecialchars($donnees['idRole']); ?></td>
          <td class="py-3 px-6 text-left" style="font-family: Poppins, sans-serif"><?php echo htmlspecialchars($donnees['nomeDerolle']); ?></td>
          
      <?php endforeach; ?>
  </tbody>

</table>
</table>

<!-- Sidebar with vertical buttons on the left -->




<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="../js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
  AOS.init();
  
  function togglePassword(button) {
    const passwordCell = button.closest('.password-cell');
    const passwordPlain = passwordCell.querySelector('.password-plain');
    const password = passwordCell.querySelector('.password');

    if (password.classList.contains('hidden')) {
      password.classList.remove('hidden');
      passwordPlain.classList.add('hidden');
      button.innerHTML = '<i class="fa fa-eye"></i>';
    } else {
      password.classList.add('hidden');
      passwordPlain.classList.remove('hidden');
      button.innerHTML = '<i class="fa fa-eye-slash"></i>';
    }
  }
  // JavaScript to toggle dropdown menu visibility
  document.addEventListener("DOMContentLoaded", function() {
            const profileDropdown = document.getElementById('profile-dropdown');
            const dropdownMenu = document.getElementById('dropdown-menu');

            profileDropdown.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });

            // Close dropdown menu if user clicks outside of it
            document.addEventListener('click', function(event) {
                if (!profileDropdown.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });

</script>
</body>
</html>
