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
                            <li><a href="./php/logeout.php" style="font-family: Poppins, sans-serif">Logout</a></li>
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

    <div class="mt-6 h-screen overflow-y-scroll" style=";">
                    <h3 class="text-xl font-semibold">Upcoming Bookings</h3>
                    <div class="mt-4 space-y-4">
                        <!-- Booking Cards -->
                        <?php
                        
                        include './pdo.php';

                        // Establish database connection
                        $pdo = getDatabaseConnection();


                            if (!empty($_POST['ccl'])) {
                                $codecl = $_POST['ccl'];
                                

                                    // Prepare SQL statement with placeholder
                               
                                $stmt = $pdo->prepare("SELECT * FROM reservation WHERE codeClient = :ch");

                                // Bind the parameter
                                $stmt->bindParam(':ch', $codecl); // Assuming codeClient is an integer

                                // Execute the statement
                                $stmt->execute();

                                // Fetch all rows as an associative array
                                $chamber = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                // Close the statement
                                $stmt->closeCursor(); // Optional but recommended 
                            }
                            
                            ?>
                        <?php foreach ($chamber as $row): ?>
                            <div class="w-full sm:w-3/4 md:w-1/2 lg:w-2/5 xl:w-1/4 bg-white rounded-lg shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 mx-auto">
                                <div class="p-3">
                                    <h3 class="text-lg font-bold mb-1" style="font-family: Poppins, sans-serif">Code de chambre: <?php echo $row['codeChamber']; ?></h3>
                                    <h3 class="text-lg font-bold mb-1" style="font-family: Poppins, sans-serif">Le nom: <?php echo $row['NomComplete']; ?></h3>
                                    <p class="text-gray-700 text-sm mb-1" style="font-family: Poppins, sans-serif">Code reservation: <?php echo $row['codeDereservation']; ?></p>
                                    
                                    <div class="bg-gray-100 p-4 rounded-lg flex justify-between items-center">
                                        <div>
                                            <h4 class="text-lg font-semibold">Hotel Name</h4>
                                            <p class="text-gray-600">Check-in: <?php echo $row['Checkin']; ?></p>
                                            <p class="text-gray-600">Check-out: <?php echo $row['Checkout']; ?></p>
                                        </div >
                                        <div class="flex flex-col">
                                        <button class="bg-red-500 p-1 m-2 text-white md:px-4 md:py-2 rounded-md">Cancel</button>
                                        <button class="bg-green-400 p-1 m-2 text-white md:px-4 md:py-2 rounded-md">payment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

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
