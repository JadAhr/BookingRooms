<!DOCTYPE html>
<html   lang="en">
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


<nav class="bg-white w-full z-50 border-gray-200  dark:bg-gray-900">
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
                    <a href="./ListStaffAd" class="text-gray-900 dark:text-white hover:underline">Staff Liste</a>
                </li>
                <li>
                    <a href="#" class="text-gray-900 dark:text-white hover:underline">New User</a>
                </li>
                <li>
                    <a href="./rools.php" class="text-gray-900 dark:text-white hover:underline">Liste de les role</a>
                </li>
                <li>
                    <a href="./addClientList.php" class="text-gray-900 dark:text-white hover:underline">Confirme Les Clients</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Navbar end -->

<div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
  <div class="bg-white shadow-md rounded-md p-6">
    <a href="../index.html" class="flex items-center space-x-3 rtl:space-x-reverse">
      <span class="self-center mx-auto h-12 w-auto text-3xl font-semibold whitespace-nowrap animate-bounce" style="font-family: Great Vibes, cursive; font-weight: 500;">GetTheRoom</span>
    </a>

    <h2 class="my-3 text-center text-3xl font-bold tracking-tight text-gray-900">Add new User</h2>

    <form class="space-y-6" action="../php/addstaff.php" method="post">
      <div class="mb-5 flex flex-col justify-center items-center w-full">
        <label for="Role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" style="font-family: Poppins, sans-serif">Votre Role</label>
        <select name="Role"   style="font-family: Poppins, sans-serif" required>Role
          <option value="" style="font-family: Poppins, sans-serif">Role</option>
          <option value="Front Desk Manager" style="font-family: Poppins, sans-serif">Front Desk Manager</option>
          <option value="Reservations Manager" style="font-family: Poppins, sans-serif">Reservations Manager</option>
          <option value="Les chambre Manger" style="font-family: Poppins, sans-serif">Les chambre Manger</option>
          <option value="Cliente Manger" style="font-family: Poppins, sans-serif">Cliente Manger</option> 
          
          <option value="Superio Edituer" style="font-family: Poppins, sans-serif">Superio Edituer</option>
        </select>
      </div>
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">UserName</label>
        <div class="mt-1">
          <input name="username" type="text" autocomplete="email" required class="px-2 py-3 mt-1 block w-full  border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
        </div>
      </div>
      <div class="flex space-x-4">
        <div class="w-1/2">
          
          <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
          <div class="mt-1">
            <input name="nome" type="text" required class="px-2 py-3 mt-1 block w-full  border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
          </div>
        </div>
        <div class="w-1/2">
          <label for="prenom" class="block text-sm font-medium text-gray-700">Prenom</label>
          <div class="mt-1">
            <input name="prenom" type="text" required class="px-2 py-3 mt-1 block w-full  border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
          </div>
        </div>
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <div class="mt-1">
          <input name="email" type="email" autocomplete="email" required class="px-2 py-3 mt-1 block w-full  border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
        </div>
      </div>

      <div>
        <label for="number" class="block text-sm font-medium text-gray-700">Phone Number</label>
        <div class="mt-1">
          <input name="telephone" type="tel" autocomplete="tel" required class="px-2 py-3 mt-1 block w-full  border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
        </div>
      </div>

      <div class="flex space-x-4">
        <div class="w-1/2">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <div class="mt-1">
            <input name="pass" type="password" autocomplete="new-password" required class="px-2 py-3 mt-1 block w-full  border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
          </div>
        </div>
        <div class="w-1/2">
          <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <div class="mt-1">
            <input name="confirm_password" type="password" autocomplete="new-password" required class="px-2 py-3 mt-1 block w-full  border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
          </div>
        </div>
      </div>

      <div>
         <a href=""><button type="submit" class="flex w-full justify-center  border border-transparent bg-blue-800 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">
          Add User
        </button></a>
      </div>
    </form>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="./src/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
  AOS.init();
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
