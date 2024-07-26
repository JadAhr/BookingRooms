<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../dist/style.css">
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
    <!-- Hero end -->

    <!-- Rooms section start -->
    <?php

  // Check if the user is logged in
  
include '../src/php/conection.php';



$pdo = getDatabaseConnection();

if (!empty($_GET['place'])) {
  // Prepare the SQL query using a prepared statement
  $stmt = $pdo->prepare('SELECT codeChamber,img, classDechamber, memberDechambre, Infosdechamber, Place, price FROM daitlesdechambers WHERE Place = :place');

  // Bind the parameter to the actual value from the GET request

  $placeroom = $_GET['place']; 
  $stmt->bindParam(':place', $placeroom);

  // Execute the query
  $stmt->execute();

  // Fetch the results
  $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
  

} else {
  $stmt = $pdo->prepare("SELECT codeChamber,img, classDechamber, memberDechambre, Infosdechamber, Place, price FROM daitlesdechambers");
  $idchamber = 
  $stmt->execute();
  $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
}
?>
    <div data-aos="fade-up" data-aos-delay="700">
        <div class="container mx-auto px-8 md py-8 ">
            <h2 class="text-4xl font-bold text-center mb-8" style="font-family: Poppins, sans-serif" data-aos="fade-up"
                data-aos-delay="700">Nos Chambres</h2>
            <div
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-6 justify-center">
                <?php foreach ($response as $row) { ?>
                <div
                    class="w-full bg-white rounded-lg shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 mx-auto">
                    <?php echo '<img class="w-full h-56 object-cover" src="data:image/jpg;base64,'.base64_encode($row['img']).'" alt="Room Image">'; ?>
                    <div class="p-3">
                        <h3 class="text-lg font-bold mb-1" style="font-family: Poppins, sans-serif">Class:
                            <?php echo $row['classDechamber']; ?></h3>
                        <p class="text-gray-700 text-sm mb-1" style="font-family: Poppins, sans-serif">Capacity:
                            <?php echo $row['memberDechambre']; ?></p>
                        <p class="text-gray-700 text-sm mb-1" style="font-family: Poppins, sans-serif">Description:
                            <?php echo $row['Infosdechamber']; ?></p>
                        <p class="text-gray-700 text-sm mb-1" style="font-family: Poppins, sans-serif">Location:
                            <?php echo $row['Place']; ?></p>
                        <p class="text-gray-700 text-sm mb-3" style="font-family: Poppins, sans-serif">Price:
                            <?php echo $row['price']; ?></p>
                        <button
                            class="mt-3 w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-700 transition-colors duration-300 text-sm book-now"
                            data-id="<?php echo $row['codeChamber']; ?>" style="font-family: Poppins, sans-serif">Book
                            Now</button>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </div>
    <!-- Hidden Form Popup -->
    <?php

    


 ?>
    <div id="bookingFormPopup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-8 rounded-none shadow-lg">
            <form id="bookingForm" action="./booking.php" method="post">
                <h3 class="text-lg font-bold mb-4" style="font-family: Poppins, sans-serif">Book Your Room</h3>
                <input type="hidden" id="roomId" name="room_id">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700"
                        style="font-family: Poppins, sans-serif"><?php  ?></label>
                    <input type="hidden" name="idClient" placeholder="<?php echo $_SESSION['id'] ?>"
                        value="<?php echo $_SESSION['id'] ?>">
                </div>
                <div class="mb-4 flex flex-row space-x-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700"
                            style="font-family: Poppins, sans-serif">Check In</label>
                        <input style="font-family: Poppins, sans-serif" type="date" id="date" name="datein"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700"
                            style="font-family: Poppins, sans-serif">Check Out</label>
                        <input style="font-family: Poppins, sans-serif" type="date" id="date" name="dateout"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                            required>
                    </div>
                </div>
                <div class="pb-3">
                    <label class="block text-sm font-medium text-gray-700" style="font-family: Poppins, sans-serif">Nom
                        Complet</label>
                    <input style="font-family: Poppins, sans-serif" type="text" id="date" name="NomComplete"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm"
                        required>
                </div>
                <div hidden class="pb-3">
                    <label hidden class="block text-sm font-medium text-gray-700"
                        style="font-family: Poppins, sans-serif">Chamber Id</label>
                    <input hidden style="font-family: Poppins, sans-serif" type="text" id="date" name="Chid"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                </div>
                <a href="../src/php/Profile.php"></a><button type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-700 transition-colors duration-300 text-sm"
                    style="font-family: Poppins, sans-serif">Book Now</button></a>
            </form>
            <button id="closeFormPopup"
                class="mt-4 w-full bg-red-500 text-white py-2 rounded hover:bg-red-700 transition-colors duration-300 text-sm"
                style="font-family: Poppins, sans-serif">Close</button>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const bookingFormPopup = document.getElementById('bookingFormPopup');
        const closeFormPopup = document.getElementById('closeFormPopup');
        const bookNowButtons = document.querySelectorAll('.book-now');

        bookNowButtons.forEach(button => {
            button.addEventListener('click', function() {
                <?php if (!$loggedIn) { ?>
                window.location.href = 'login.php'; // Redirect to login page
                <?php } else { ?>

                const roomId = this.getAttribute('data-id');
                document.cookie = "codechamber = " + roomId;
                console.log(document.cookie);

                document.getElementById('roomId').value = roomId;
                bookingFormPopup.classList.remove('hidden');
                <?php } ?>
            });
        });

        closeFormPopup.addEventListener('click', function() {
            bookingFormPopup.classList.add('hidden');
        });
    });
    </script>

    <!-- Rooms section end -->