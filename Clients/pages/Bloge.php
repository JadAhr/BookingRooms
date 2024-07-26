<?php
include '../src/php/session_check.php';


// Rest of your code...
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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Great+Vibes&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="overflow-y-scroll no-scrollbar bg-white">

    <!-- Navbar start -->
    <nav class="fixed w-full z-40 bg-white border-gray-200 dark:bg-gray-900 md:px-5">
        <div class="max-w-screen-xl  flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class=" self-center text-3xl font-semibold whitespace-nowrap  "
                    style="font-family: Great Vibes, cursive; font-weight: 500;" data-aos="fade-right"
                    data-aos-delay="400">GetYourRoom</span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <span></span>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                <div class="relative">
                    <div id="profile-dropdown" class="cursor-pointer">
                        <i class="fa-solid fa-user text-2xl" alt="Profile Picture" style="color: #000000;"
                            data-aos="fade-right" data-aos-delay="1100"></i>
                    </div>
                    <ul id="dropdown-menu" class="absolute hidden bg-white border rounded-sm shadow-md mt-2 py-1 w-36">
                        <li><a href="../src/php/Profile.php" style="font-family: Poppins, sans-serif">Profile</a></li>
                        <li><a href="../src/php/logeout.php" style="font-family: Poppins, sans-serif">Logout</a></li>
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
                        <a href="../index.php"
                            class="block py-2 px-3 text-2xl text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            style="font-family: 'Great Vibes', cursive; font-weight: 500;" data-aos="fade-right"
                            data-aos-delay="500">Accueil</a>
                    </li>
                    <li>
                        <a href="./Rooms.php"
                            class="block py-2 px-3 text-2xl text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            style="font-family: 'Great Vibes', cursive; font-weight: 500;" data-aos="fade-right"
                            data-aos-delay="600">Chambres</a>
                    </li>
                    <li>
                        <a href="./partenrs.php"
                            class="block py-2 px-3 text-2xl text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            style="font-family: 'Great Vibes', cursive; font-weight: 500;" data-aos="fade-right"
                            data-aos-delay="700">Partenaire</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-2xl text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent"
                            aria-current="page" style="font-family: 'Great Vibes', cursive; font-weight: 500;"
                            data-aos="fade-right" data-aos-delay="800">Blog</a>
                    </li>
                    <li>
                        <a href="#contact"
                            class="block py-2 px-3 text-2xl text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            style="font-family: 'Great Vibes', cursive; font-weight: 500;" data-aos="fade-right"
                            data-aos-delay="900">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <div class="relative h-screen mb-12">
        <img class="absolute inset-0 w-full h-full object-cover" style="height: 600px;"
            src="https://images.unsplash.com/photo-1600786288760-416eabaf9795?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
            <div class="text-center text-white max-w-md w-full">
                <h1 class="mb-8 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl"
                    style="font-family: 'Great Vibes', cursive; font-weight: 500;" data-aos="fade-up"
                    data-aos-delay="600">Notre Blog</h1>
            </div>
        </div>
    </div>

    <!-- Blog start -->
    <section id="Aboutus" class="max-w-7xl mx-auto   sm:px-6 lg:px-8">
        <div class="text-center">
            <div class="flex justify-center items-center">
                <div style="width: 1px; height: 50px;"></div>
            </div>
            <span class="self-center text-4xl font-semibold whitespace-nowrap"
                style="font-family: 'Great Vibes', cursive; font-weight: 500;" data-aos="fade-up"
                data-aos-delay="900">GetYourRoom</span>
        </div>
        <div class="flex justify-center items-center">
            <div style="width: 1px; height: 150px;"></div>
        </div>

        <section id="Aboutus" class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center items-center">
                <div style="width: 1px; height: 150px;"></div>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 pb-10">
                <div class="flex flex-col justify-center order-2 md:order-1">
                    <h3 class="text-2xl leading-6 font-medium text-gray-900" data-aos="fade-up" data-aos-delay="800"
                        style="font-family: Poppins, sans-serif">Guides de Destination</h3>
                    <p class="mt-4 text-base text-gray-500" data-aos="fade-up" data-aos-delay="800"
                        style="font-family: Poppins, sans-serif">
                        Découvrez le charme de [Destination] à travers nos guides complets. Des sites emblématiques aux
                        trésors cachés, nos hôtels vous offrent une porte d'entrée vers le cœur de cette ville vibrante.
                    </p>
                </div>
                <div class="order-1 md:order-2">
                    <img src="https://images.pexels.com/photos/3769118/pexels-photo-3769118.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="Our Mission" class="w-full h-80 object-cover rounded-md" data-aos="fade-up"
                        data-aos-delay="800">
                </div>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 pb-10">
                <div class="flex flex-col justify-center order-2 md:order-1">
                    <h3 class="text-2xl leading-6 font-medium text-gray-900" style="font-family: Poppins, sans-serif"
                        data-aos="fade-up" data-aos-delay="800">Caractéristiques des Chambres d'Hôtel</h3>
                    <p class="mt-4 text-base text-gray-500" style="font-family: Poppins, sans-serif" data-aos="fade-up"
                        data-aos-delay="800">
                        Découvrez le luxe et le confort dans chaque chambre de nos hôtels. Que vous préfériez des vues
                        panoramiques ou des retraites cosy, nos hébergements répondent à tous vos besoins avec des
                        équipements modernes et un service personnalisé.
                    </p>
                </div>
                <div class="order-1 md:order-last">
                    <img src="https://images.unsplash.com/photo-1495365200479-c4ed1d35e1aa?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Our Team" class="w-full h-80 object-cover rounded-md" data-aos="fade-up"
                        data-aos-delay="800">
                </div>

            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 pb-10">
                <div class="flex flex-col justify-center order-2 md:order-1">
                    <h3 class="text-2xl leading-6 font-medium text-gray-900" style="font-family: Poppins, sans-serif"
                        data-aos="fade-up" data-aos-delay="800">Conseils et Astuces de Voyage</h3>
                    <p class="mt-4 text-base text-gray-500" style="font-family: Poppins, sans-serif" data-aos="fade-up"
                        data-aos-delay="800">
                        Préparez votre voyage avec des conseils d'initiés et des conseils locaux de nos experts en
                        voyage. Informez-vous sur les options de transport, l'étiquette culturelle et les attractions
                        incontournables à Voter Destination
                    </p>
                </div>
                <div class="order-1 md:order-2">
                    <img src="https://images.pexels.com/photos/4246101/pexels-photo-4246101.jpeg?auto=compress&cs=tinysrgb&w=600"
                        alt="Why Choose Us" class="w-full h-80 object-cover rounded-md" data-aos="fade-up"
                        data-aos-delay="800">
                </div>
            </div>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 pb-10">
                <div class="flex flex-col justify-center order-2 md:order-1">
                    <h3 class="text-2xl leading-6 font-medium text-gray-900" style="font-family: Poppins, sans-serif"
                        data-aos="fade-up" data-aos-delay="800">Événements et Offres Spéciales de l'Hôtel</h3>
                    <p class="mt-4 text-base text-gray-500" style="font-family: Poppins, sans-serif" data-aos="fade-up"
                        data-aos-delay="800">
                        Restez informé des derniers événements et offres spéciales dans nos hôtels. Des promotions
                        saisonnières aux forfaits exclusifs, enrichissez votre séjour avec des expériences uniques
                        conçues spécialement pour vous.
                    </p>
                </div>
                <div class="order-1 md:order-2">
                    <img src="https://images.pexels.com/photos/15964946/pexels-photo-15964946/free-photo-of-a-wedding-venue-with-guests-inside-photographed-from-the-outside.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="Why Choose Us" class="w-full h-80 object-cover rounded-md" data-aos="fade-up"
                        data-aos-delay="800">
                </div>
            </div>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 pb-10">
                <div class="flex flex-col justify-center order-2 md:order-1">
                    <h3 class="text-2xl leading-6 font-medium text-gray-900" style="font-family: Poppins, sans-serif"
                        data-aos="fade-up" data-aos-delay="800">Témoignages des Clients</h3>
                    <p class="mt-4 text-base text-gray-500" style="font-family: Poppins, sans-serif" data-aos="fade-up"
                        data-aos-delay="800">
                        Lisez les témoignages élogieux de nos clients sur leurs expériences inoubliables avec nous.
                        Découvrez pourquoi les voyageurs choisissent nos hôtels pour leur confort, leur commodité et
                        leur service exceptionnel.
                    </p>
                </div>
                <div class="order-1 md:order-last">
                    <img src="https://images.pexels.com/photos/7937690/pexels-photo-7937690.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="Our Team" class="w-full h-80 object-cover rounded-md" data-aos="fade-up"
                        data-aos-delay="800">
                </div>
            </div>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 pb-10">
                <div class="flex flex-col justify-center order-2 md:order-1">
                    <h3 class="text-2xl leading-6 font-medium text-gray-900" style="font-family: Poppins, sans-serif"
                        data-aos="fade-up" data-aos-delay="800">Activités et Expériences Locales</h3>
                    <p class="mt-4 text-base text-gray-500" style="font-family: Poppins, sans-serif" data-aos="fade-up"
                        data-aos-delay="800">
                        Découvrez le luxe et le confort dans chaque chambre de nos hôtels. Que vous préfériez des vues
                        panoramiques ou des retraites cosy, nos hébergements répondent à tous vos besoins avec des
                        équipements modernes et un service personnalisé.
                    </p>
                </div>
                <div class="order-1 md:order-last">
                    <img src="https://images.pexels.com/photos/22027045/pexels-photo-22027045/free-photo-of-natural-arch-in-bryce-canyon-in-utah.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="Our Team" class="w-full h-80 object-cover rounded-md" data-aos="fade-up"
                        data-aos-delay="800">
                </div>
            </div>
        </section>

        <!-- Blog end -->
        <!-- ContactUs start -->
        <section class="bg-transparent dark:bg-slate-800" id="contact">
            <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-20">
                <div class="" data-aos="fade-up" data-aos-delay="600">
                    <div class=" max-w-3xl text-center sm:text-center md:mx-auto ">

                        <div class="flex justify-center items-center">
                            <div style="width: 1px; height: 150px;" data-aos="fade-up" data-aos-delay="700"></div>
                        </div>

                        <div class="text-center mb-3">
                            <h2 class="text-5xl text-zinc-950 font-bold" style="font-family: Poppins, sans-serif"
                                data-aos="fade-up" data-aos-delay="600">Entrer en contact</h2>
                        </div>

                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <div class="mb-3" style="width: 1px; height: 60px;" data-aos="fade-up" data-aos-delay="700"></div>
                </div>
                <div class="flex items-stretch justify-center" data-aos="fade-up" data-aos-delay="600">
                    <div class="grid md:grid-cols-2">
                        <div class="h-full pr-6">

                            <p class="mt-3 mb-12 text-lg text-gray-600 dark:text-slate-400"
                                style="font-family: Poppins, sans-serif">
                                Nous apprécions vos commentaires, questions et suggestions. N'hésitez pas à nous
                                contacter en utilisant l'un des moyens ci-dessous :
                            </p>

                            <ul class="mb-6 md:mb-0">
                                <li class="flex">

                                    <div class="ml-4 mb-4">
                                        <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 dark:text-white"
                                            style="font-family: Poppins, sans-serif">Notre Adresse
                                        </h3>
                                        <p class="text-gray-600 dark:text-slate-400"
                                            style="font-family: Poppins, sans-serif">232 Tabriquet</p>
                                        <p class="text-gray-600 dark:text-slate-400"
                                            style="font-family: Poppins, sans-serif">Morocco-Sale</p>
                                    </div>
                                </li>
                                <li class="flex">

                                    <div class="ml-4 mb-4">
                                        <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 dark:text-white"
                                            style="font-family: Poppins, sans-serif">Contact
                                        </h3>
                                        <p class="text-gray-600 dark:text-slate-400"
                                            style="font-family: Poppins, sans-serif">Mobile: +212 65160-98419</p>
                                        <p class="text-gray-600 dark:text-slate-400"
                                            style="font-family: Poppins, sans-serif">Mail: roomgetyour@gmail.com</p>
                                    </div>
                                </li>
                                <li class="flex">

                                    <div class="ml-4 mb-4">
                                        <h3 class="mb-2 text-lg font-medium leading-6 text-gray-900 dark:text-white"
                                            style="font-family: Poppins, sans-serif">Heures de travail
                                        </h3>
                                        <p class="text-gray-600 dark:text-slate-400"
                                            style="font-family: Poppins, sans-serif">24/24</p>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card h-fit max-w-6xl p-5 md:p-12" id="form">
                            <h2 class="mb-4 text-2xl font-bold dark:text-white">Prêt à commencer ?</h2>
                            <form id="contactForm">
                                <div class="mb-6">
                                    <div class="mx-0 mb-1 sm:mb-4">
                                        <div class="mx-0 mb-1 sm:mb-4">
                                            <label for="name"
                                                class="pb-1 text-xs uppercase tracking-wider"></label><input type="text"
                                                id="name" autocomplete="given-name" placeholder="Votre nom"
                                                class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md dark:text-gray-300 sm:mb-0"
                                                name="name" style="font-family: Poppins, sans-serif">
                                        </div>
                                        <div class="mx-0 mb-1 sm:mb-4">
                                            <label for="email"
                                                class="pb-1 text-xs uppercase tracking-wider"></label><input
                                                type="email" id="email" autocomplete="email"
                                                placeholder="Votre adresse e-mail"
                                                class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md dark:text-gray-300 sm:mb-0"
                                                name="email" style="font-family: Poppins, sans-serif">
                                        </div>
                                    </div>
                                    <div class="mx-0 mb-1 sm:mb-4">
                                        <label for="textarea"
                                            class="pb-1 text-xs uppercase tracking-wider"></label><textarea
                                            id="textarea" name="textarea" cols="30" rows="5"
                                            placeholder="Écrivez votre message..."
                                            class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md dark:text-gray-300 sm:mb-0"
                                            style="font-family: Poppins, sans-serif"></textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="w-full bg-blue-800 text-white px-6 py-3 font-xl rounded-md sm:mb-0"
                                        style="font-family: Poppins, sans-serif">Envoyer le message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ContactUs start -->
        <!-- Footer start -->
        <footer id="footer" class="bg-white shadow dark:bg-gray-900">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <span class="self-center text-3xl font-semibold whitespace-nowrap"
                            style="font-family: 'Great Vibes', cursive; font-weight: 500;">GetTheRoom</span>
                    </a>
                    <ul
                        class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">About</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                        </li>
                        <li>
                            <a href="./Contact.html" class="hover:underline">Contact</a>
                        </li>
                        <div class="flex font-medium">
                            <a href="#"><i
                                    class="fa-solid fa-user mx-4 text-1xl text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"></i></a>
                            <a href="#"><i
                                    class="fa-solid fa-right-to-bracket mx-4 text-1xl text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"></i></a>
                        </div>
                    </ul>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a
                        href="https://flowbite.com/" class="hover:underline">GetTheRoom</a>. All Rights Reserved.</span>
            </div>
        </footer>
        <!-- Footer end -->
        <div class="">

            <i id="toggleButton" class="fas fa-comments z-50 m-4 right-0 bottom-0 fixed text-BlueDark p-5 text-2xl"></i>

            <iframe id="chatbotIframe" class="fixed bottom-5 pb-10 z-40  right-0 mr-20 w-96 h-96 hidden"
                src="//localhost:8080/" frameborder="0" scrolling="no" style="bottom: 20px;"></iframe>
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
        const toggleButton = document.getElementById('toggleButton');
        const chatbotIframe = document.getElementById('chatbotIframe');

        toggleButton.addEventListener('click', () => {
            chatbotIframe.classList.toggle('hidden');
        });
        </script>
</body>

</html>