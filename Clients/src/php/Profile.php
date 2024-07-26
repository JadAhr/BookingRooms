<?php
include './conection.php';
include './session_check.php';

// Establish database connection
$pdo = getDatabaseConnection();

// Initialize $Client array to store bookings
$Client = [];

if (!empty($_SESSION['id'])) {
    $Codecli = $_SESSION['id'];

    // Prepare SQL statement with placeholder
    $stmt = $pdo->prepare("SELECT * FROM reservation WHERE codeClient = :codeClient");

    // Bind the parameter
    $stmt->bindParam(':codeClient', $Codecli, PDO::PARAM_INT); // Assuming codeClient is an integer

    // Execute the statement
    $stmt->execute();

    // Fetch all rows as an associative array
    $Client = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Close the statement
    $stmt->closeCursor(); // Optional but recommended
}
?>

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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Great+Vibes&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-500">
    <nav class="fixed w-full top-0 z-50 bg-white border-gray-200 dark:bg-gray-900 md:px-5">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-3xl font-semibold whitespace-nowrap"
                    style="font-family: Great Vibes, cursive; font-weight: 500;" data-aos="fade-right"
                    data-aos-delay="400">GetYourRoom</span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                <div class="relative">
                    <div id="profile-dropdown" class="cursor-pointer">
                        <i class="fa-solid fa-user text-2xl" style="color: #000000;" data-aos="fade-right"
                            data-aos-delay="1100"></i>
                    </div>
                    <ul id="dropdown-menu" class="absolute hidden bg-white border rounded-sm shadow-md mt-2 py-1 w-36">
                        <li><a href="#" style="font-family: Poppins, sans-serif">Profile</a></li>
                        <li><a href="./logeout.php" style="font-family: Poppins, sans-serif">Logout</a></li>
                    </ul>
                </div>
                <?php else: ?>
                <a href="./GetStarted.html" id="get-started-button">
                    <i class="fa-regular fa-user text-xl p-3" style="color: #000000;" data-aos="fade-right"
                        data-aos-delay="1000"></i>
                </a>
                <a href="./Login.php" id="login-button">
                    <i class="fa-solid fa-right-to-bracket text-xl p-3" style="color: #000000;" data-aos="fade-right"
                        data-aos-delay="1100"></i>
                </a>
                <?php endif; ?>
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="../../index.php"
                            class="block py-2 px-3 text-2xl text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            style="font-family: Great Vibes, cursive; font-weight: 500;" data-aos="fade-right"
                            data-aos-delay="500">Accueil</a>
                    </li>
                    <li>
                        <a href="../.././pages/Rooms.php"
                            class="block py-2 px-3 text-2xl text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            style="font-family: Great Vibes, cursive; font-weight: 500;" data-aos="fade-right"
                            data-aos-delay="500">Chambres</a>
                    </li>
                    <li>
                        <a href="../.././pages/partenrs.php"
                            class="block py-2 px-3 text-2xl text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            style="font-family: Great Vibes, cursive; font-weight: 500;" data-aos="fade-right"
                            data-aos-delay="700">Partenaire</a>
                    </li>
                    <li>
                        <a href="../.././pages/Bloge.php"
                            class="block py-2 px-3 text-2xl text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            style="font-family: Great Vibes, cursive; font-weight: 500;" data-aos="fade-right"
                            data-aos-delay="800">Blog</a>
                    </li>
                    <li>
                        <a href="#contact"
                            class="block py-2 px-3 text-2xl text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            style="font-family: Great Vibes, cursive; font-weight: 500;" data-aos="fade-right"
                            data-aos-delay="900">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="flex justify-center items-center w-screen h-screen m-4">
        <div class="container mx-auto p-4">
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden w-full">
                <div class="p-4">
                    <div class="flex items-center">
                        <img class="h-16 w-16 rounded-full object-cover"
                            src="https://source.unsplash.com/random/100x100" alt="User avatar">
                        <div class="ml-4">
                            <p class="text-gray-600"><?php echo $_SESSION['email'] ?></p>
                        </div>
                    </div>
                    <div class="mt-6 overflow-y-scroll" style="height: 50vh;">
                        <h3 class="text-xl font-semibold">Upcoming Bookings</h3>
                        <div class="mt-4 space-y-4">
                            <!-- Booking Cards -->
                            <?php foreach ($Client as $row): ?>
                            <?php 
                                    // Prepare SQL statement with placeholder
                                    $ch =  $row['codeChamber'];
                                    $stmt = $pdo->prepare("SELECT place, Infosdechamber FROM daitlesdechambers WHERE codeChamber = :ch");

                                    // Bind the parameter
                                    $stmt->bindParam(':ch', $ch, PDO::PARAM_INT); // Assuming codeClient is an integer

                                    // Execute the statement
                                    $stmt->execute();

                                    // Fetch all rows as an associative array
                                    $chamber = $stmt->fetch(PDO::FETCH_ASSOC);

                                    // Close the statement
                                    $stmt->closeCursor(); // Optional but recommended 
                                ?>
                            <div
                                class="w-full sm:w-3/4 md:w-1/2 lg:w-2/5 xl:w-1/4 bg-white rounded-lg shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 mx-auto">
                                <div class="p-3">
                                    <h3 class="text-lg font-bold mb-1" style="font-family: Poppins, sans-serif">Code de
                                        chambre: <?php echo $row['codeChamber']; ?></h3>
                                    <h3 class="text-lg font-bold mb-1" style="font-family: Poppins, sans-serif">Le nom:
                                        <?php echo $row['NomComplete']; ?></h3>
                                    <p class="text-gray-700 text-sm mb-1" style="font-family: Poppins, sans-serif">Code
                                        reservation: <?php echo $row['codeDereservation']; ?></p>
                                    <p class="text-gray-700 text-sm mb-1" style="font-family: Poppins, sans-serif">
                                        Description: <?php echo $chamber['Infosdechamber']; ?></p>
                                    <p class="text-gray-700 text-sm mb-1" style="font-family: Poppins, sans-serif">
                                        Location: <?php echo $chamber['place']; ?></p>
                                    <div class="bg-gray-100 p-4 rounded-lg flex justify-between items-center">
                                        <div>
                                            <h4 class="text-lg font-semibold">Hotel Name</h4>
                                            <p class="text-gray-600">Check-in: <?php echo $row['Checkin']; ?></p>
                                            <p class="text-gray-600">Check-out: <?php echo $row['Checkout']; ?></p>
                                        </div>
                                        <div class="flex flex-col">
                                            <!-- Cancel Button -->
                                            <button class="bg-red-500 p-1 m-2 text-white md:px-4 md:py-2 rounded-md"
                                                onclick="openModal('cancel-modal<?php echo $row['codeDereservation']; ?>')">Cancel</button>
                                            <?php $coderes= $row['codeDereservation'];?>
                                            <!-- Payment Button -->
                                            <button class="bg-green-400 p-1 m-2 text-white md:px-4 md:py-2 rounded-md"
                                                onclick="openModal('payment-modal')">Payment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Cancel Modal -->
                            <div id="cancel-modal<?php echo $row['codeDereservation']; ?>"
                                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                <div class="bg-white rounded-lg shadow-lg p-6">
                                    <h3 class="text-xl font-semibold mb-4">Cancel Booking</h3>
                                    <p class="mb-4">Are you sure you want to cancel your booking?</p>
                                    <div class="flex justify-end">
                                        <button class="bg-gray-200 text-gray-800 py-2 px-4 rounded mr-2"
                                            onclick="closeModal('cancel-modal<?php echo$row['codeDereservation'];  ?>')">No</button>
                                        <form action="./deletbooking.php" method="post">
                                            <input hidden name="coderes" type="text"
                                                value="<?php echo $row['codeDereservation']; ?>"><?php  ?>
                                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded">Yes,
                                                Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Payment Modal -->
                            <div id="payment-modal"
                                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                <div class="bg-white rounded-lg shadow-lg p-6">
                                    <h3 class="text-xl font-semibold mb-4">Payment Information</h3>
                                    <form id="payment-form" action="./paythebooking.php" method="post">
                                        <input hidden type="text" name="coderes"
                                            value="<?php echo $row['codeDereservation']; ?>">
                                        <div class="mb-4">
                                            <label for="namet" class="block text-gray-700"
                                                style="font-family: Poppins, sans-serif">Titulaire de la carte</label>
                                            <input type="text" name="namet" id="namet"
                                                class="w-full p-2 border border-gray-300 rounded mt-2">
                                        </div>
                                        <div class="mb-4">
                                            <label for="card-number" class="block text-gray-700"
                                                style="font-family: Poppins, sans-serif">Card Number</label>
                                            <input type="text" name="cardnumb" id="card-number"
                                                class="w-full p-2 border border-gray-300 rounded mt-2">
                                        </div>
                                        <div class="flex flex-row space-x-2">
                                            <div class="mb-4">
                                                <label for="dateex" class="block text-gray-700"
                                                    style="font-family: Poppins, sans-serif">Date d'expiration</label>
                                                <input type="text" name="dateexi" id="dateex"
                                                    class="w-full p-2 border border-gray-300 rounded mt-2">
                                            </div>
                                            <div class="mb-4">
                                                <label for="cvv" class="block text-gray-700"
                                                    style="font-family: Poppins, sans-serif">CVV</label>
                                                <input type="text" name="cvv" id="cvv"
                                                    class="w-full p-2 border border-gray-300 rounded mt-2">
                                            </div>
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="button"
                                                class="bg-gray-200 text-gray-800 py-2 px-4 rounded mr-2"
                                                onclick="closeModal('payment-modal')">Cancel</button>
                                            <button type="submit"
                                                class="bg-green-500 text-white py-2 px-4 rounded">Pay</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
    AOS.init();

    function openModal(modalId) {
        console.log("Opening modal with ID:", modalId); // Debugging line
        const modalElement = document.getElementById(modalId);
        if (modalElement) {
            modalElement.classList.remove('hidden');
        } else {
            console.log("No element found with ID:", modalId); // Debugging line
        }
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
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



    document.getElementById('payment-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting

        // Get form input values
        const namet = document.getElementById('namet').value;
        const cardNumber = document.getElementById('card-number').value;
        const dateex = document.getElementById('dateex').value;
        const cvv = document.getElementById('cvv').value;

        // Validate inputs
        if (!namet) {
            alert('Please enter the card holder\'s name.');
            return;
        }

        if (!cardNumber || !isValidCardNumber(cardNumber)) {
            alert('Please enter a valid card number.');
            return;
        }

        if (!dateex || !/^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/.test(dateex)) {
            alert('Please enter a valid expiration date (MM/YY).');
            return;
        }

        if (!cvv || !/^\d{3,4}$/.test(cvv)) {
            alert('Please enter a valid CVV.');
            return;
        }

        // If all inputs are valid, submit the form
        this.submit();
    });

    function isValidCardNumber(cardNumber) {
        const regex = /^\d{16}$/;
        if (!regex.test(cardNumber)) return false;

        return luhnCheck(cardNumber);
    }

    function luhnCheck(cardNumber) {
        let sum = 0;
        let shouldDouble = false;

        for (let i = cardNumber.length - 1; i >= 0; i--) {
            let digit = parseInt(cardNumber[i]);

            if (shouldDouble) {
                digit *= 2;
                if (digit > 9) digit -= 9;
            }

            sum += digit;
            shouldDouble = !shouldDouble;
        }

        return sum % 10 === 0;
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
    </script>
</body>

</html>