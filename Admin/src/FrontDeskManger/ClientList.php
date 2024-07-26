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

<body class="bg-gray-100">
    <nav class="bg-white border-gray-200 dark:bg-gray-900 md:px-5">
        <div class="max-w-screen-xl sm:w-3/4 md:w-1/2 lg:w-2/5 xl:w-1/4 flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-4 rtl:space-x-reverse">
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
                            <form action="#">
                                <li><a href="#" style="font-family: Poppins, sans-serif"></a><input type="hidden" name="Username"><?php echo ""; ?></li>
                            </form>
                            <li><a href="../php/logeout.php" style="font-family: Poppins, sans-serif">Logout</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="#" id="login-button">
                        <i class="fa-solid fa-user text-2xl" alt="Profile Picture" style="color: #000000;"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- PHP block to fetch and display client data -->
    <div class="flex">
        <div class="text-center w-full p-8">
            <h2 class="text-4xl m-2 text-gray-700 font-bold" style="font-family: Poppins, sans-serif" data-aos="fade-up" data-aos-delay="600"></h2>
            <form action="#" method="get">
                <input name="namecl" type="search" class="w-96 p-2 border border-gray-300 rounded" placeholder="Search By Name of the ...">
                <button type="submit" class="bg-green-500 p-2 ml-6 rounded-sm text-white" style="font-family: Poppins, sans-serif">reserche</button>
                <button type="submit" class="bg-green-500 p-2 ml-6 rounded-sm text-white" style="font-family: Poppins, sans-serif">Clear</button>
            </form>
        </div>
    </div>

    <!-- PHP block to fetch and display client data -->
    <?php
    include '../php/pdo.php';

    // Establish database connection
    $pdo = getDatabaseConnection();

    if (!empty($_GET['namecl'])) {
        // Prepare the SQL query using a prepared statement
        $stmt = $pdo->prepare('SELECT codeClient, nome, prenom, email, telephone, Pass FROM clients WHERE nome = :namecl');

        // Bind the parameter to the actual value from the GET request
        $nameClient = $_GET['namecl'];
        $stmt->bindParam(':namecl', $nameClient);

        // Execute the query
        $stmt->execute();

        // Fetch the results
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $stmt = $pdo->query('SELECT codeClient, nome, prenom, email, telephone, Pass FROM clients');
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <div class="text-center my-8">
        <h1 class="text-3xl font-bold" style="font-family: Poppins, sans-serif">LA LISTE DE CLIENTS</h1>
    </div>
    <table class="mx-auto w-full border-collapse bg-white border border-gray-400">
        <thead>
            <tr class="bg-gray-300 text-gray-700 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Code De Client</th>
                <th class="py-3 px-6 text-left">Nom</th>
                <th class="py-3 px-6 text-left">Prénom</th>
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3 px-6 text-left">Booking</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <?php foreach ($response as $donnees) : ?>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <form action="../php/bookings.php" method="POST">
                    <input hidden  type="text" name="ccl" value = '<?php echo htmlspecialchars($donnees['codeClient']); ?>'>
                    <td class="py-3 px-6 text-left whitespace-nowrap" name style="font-family: Poppins, sans-serif"><?php echo htmlspecialchars($donnees['codeClient']); ?></td>
                    <td class="py-3 px-6 text-left" style="font-family: Poppins, sans-serif"><?php echo htmlspecialchars($donnees['nome']); ?></td>
                    <td class="py-3 px-6 text-left" style="font-family: Poppins, sans-serif"><?php echo htmlspecialchars($donnees['prenom']); ?></td>
                    <td class="py-3 px-6 text-left" style="font-family: Poppins, sans-serif"><?php echo htmlspecialchars($donnees['email']); ?></td>
                    <?php
                      $codecli = $donnees['codeClient'];
                        $stmt2 = $pdo->prepare('SELECT COUNT(*) as total FROM reservation WHERE codeClient = :ccl');
                         // Bind the parameter to the actual value from the GET request

                          $stmt2->bindParam(':ccl', $codecli);

                          // Execute the query
                          $stmt2->execute();

                          // Fetch the results
                          $count = $stmt2->fetch(PDO::FETCH_ASSOC);
                     ?>
                    <td class="py-3 px-6 text-left" style="font-family: Poppins, sans-serif"><?php echo ($count['total']); ?>
                        <button class="text-blue-500 underline" type="submit">View</button>
                    </td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="../js/main.js"></script>
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
