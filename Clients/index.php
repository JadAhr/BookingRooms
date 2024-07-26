<?php
include './src/php/session_check.php';

include './src/php/conection.php';
$pdo = getDatabaseConnection();

?>

<!DOCTYPE html>
<html class="scroll-smooth" style="scroll-behavior: smooth;" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./dist/style.css">
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
    <style>
    #chatbotIframe {
        transition: transform 0.3s ease-in-out;
    }

    #chatbotIframe.hidden {
        transform: translateX(100%);
    }
    </style>
</head>

<body class="overflow-y-scroll no-scrollbar bg-slate-200">

    <!-- Navbar start -->
    <nav class="fixed w-full z-50 bg-white border-gray-200 dark:bg-gray-900 md:px-5">
        <div
            class="max-w-screen-xl sm:w-3/4 md:w-1/2 lg:w-2/5 xl:w-1/4 flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-4 rtl:space-x-reverse">
                <span class="self-center text-3xl font-semibold whitespace-nowrap"
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
                    <ul id="dropdown-menu"
                        class="absolute hidden pl-11 bg-white border rounded-sm shadow-md mt-2 py-1 w-36">
                        <form action="#">
                            <li><a href="#" style="font-family: Poppins, sans-serif"></a><input type="hidden"
                                    name="Username"><?php echo ""; ?></li>
                        </form>
                        <li><a href="./src/php/Profile.php" style="font-family: Poppins, sans-serif">Profile</a></li>
                        <li><a href="./src/php/logeout.php" style="font-family: Poppins, sans-serif">Logout</a></li>
                    </ul>
                </div>
                <?php else: ?>
                <a href="./pages/GetStarted.html" id="get-started-button">
                    <i class="fa-regular fa-user text-xl p-3" style="color: #000000;" data-aos="fade-right"
                        data-aos-delay="1000"></i>
                </a>
                <a href="./pages/Login.php" id="login-button">
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
                        <a href="#"
                            class="block py-2 px-3 text-2xl text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent"
                            aria-current="page" style="font-family: Great Vibes, cursive; font-weight: 500;"
                            data-aos="fade-right" data-aos-delay="500">Accueil</a>
                    </li>
                    <li>
                        <a href="./pages/Rooms.php"
                            class="block py-2 px-3 text-2xl text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            style="font-family: Great Vibes, cursive; font-weight: 500;" data-aos="fade-right"
                            data-aos-delay="600">Chambres</a>
                    </li>
                    <li>
                        <a href="./pages/partenrs.php"
                            class="block py-2 px-3 text-2xl text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            style="font-family: Great Vibes, cursive; font-weight: 500;" data-aos="fade-right"
                            data-aos-delay="700">Partenaire</a>
                    </li>
                    <li>
                        <a href="./pages/Bloge.php"
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

    <!-- Navbar end -->

    <div class="relative h-screen">
        <img class="absolute inset-0 w-full h-full object-cover" data-aos="fade-up" data-aos-delay="500"
            src="https://images.unsplash.com/photo-1592494804071-faea15d93a8a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
            <div class="text-center text-white max-w-md w-full">
                <h1 class=" text-4xl mb-8 md:text-3xl font-extrabold leading-none tracking-tight lg:text-6xl"
                    style=" font-family: Great Vibes, cursive; font-weight: 500;" data-aos="fade-up"
                    data-aos-delay="600">Get Your Room</h1>
                <div class="flex justify-center items-center">
                    <div style="width: 1px; height: 150px;" data-aos="fade-up" data-aos-delay="700"></div>
                </div>
                <div class="flex justify-center items-center">
                    <div style="width: 1px; height: 150px;" data-aos="fade-up" data-aos-delay="700"></div>
                </div>
                <a href="#page" class="animate-pulse rounded-full border-2 py-5 px-1">
                    <i class="text-3xl animate-bounce  fa-solid fa-angle-down mt-  "></i>
                </a>


            </div>
        </div>
    </div>
    </div>
    <div id="page" class="flex justify-center items-center">
        <div style="width: 1px; height: 150px;" data-aos="fade-up" data-aos-delay="700"></div>
    </div>
    <!-- Hero end -->



    <div class="text-center ">
        <h2 class="text-4xl m-2 text-zinc-950 font-bold" style="font-family: Poppins, sans-serif" data-aos="fade-up"
            data-aos-delay="600">MEILLEURES DESTINATIONS AU MAROC</span></h2>
    </div>

    <div class="flex justify-center items-center">
        <div class=" mb-3" style="width: 1px; height: 60px;" data-aos="fade-up" data-aos-delay="700"></div>
    </div>

    <div class="flex flex-wrap justify-center gap-4 z-40 p-6 mb-4  border-BlueDark">
        <div class="card block max-w-[18rem]   cursor-pointer  bg-transparent text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-stone-950"
            data-aos="fade-up" data-aos-delay="400">
            <div class="relative overflow-hidden bg-cover bg-no-repeat">
                <img class="rounded-lg"
                    src="https://lp-cms-production.imgix.net/2020-10/GettyRF_518120994.jpg?auto=format&q=75&w=1024"
                    alt="" />
            </div>
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-2" style="font-family: Poppins, sans-serif">Essaouira</h3>
                <p class="text-base" style="font-family: Poppins, sans-serif">
                    Si vous deviez choisir un endroit pour profiter de tout ce que le Maroc offre, Essaouira est un
                    excellent choix.
                </p>
            </div>
        </div>
        <div class="card block max-w-[18rem]  cursor-pointer   bg-transparent text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-stone-950"
            data-aos="fade-up" data-aos-delay="500">
            <div class="relative overflow-hidden bg-cover bg-no-repeat">
                <img class="rounded-lg"
                    src="https://lp-cms-production.imgix.net/2023-09/GettyImages-1470151678.jpg?auto=format&q=75&w=1024"
                    alt="" />
            </div>
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-2" style="font-family: Poppins, sans-serif">Marrakesh</h3>
                <p class="text-base" style="font-family: Poppins, sans-serif">
                    Ville du Maroc et septième plus grande ville du pays, avec une population urbaine d'environ 580 000
                    habitants (2014).
            </div>
        </div>
        <div class="card block max-w-[18rem]  cursor-pointer  bg-transparent text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-stone-950"
            data-aos="fade-up" data-aos-delay="500">
            <div class="relative overflow-hidden bg-cover bg-no-repeat">
                <img class="rounded-lg" src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Tanger_cor.jpg"
                    alt="" />
            </div>
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-2" style="font-family: Poppins, sans-serif">Tangier</h3>
                <p class="text-base" style="font-family: Poppins, sans-serif">
                    Ville du nord-ouest du Maroc, sur les côtes de la mer Méditerranée et de l'océan Atlantique.
                </p>
            </div>
        </div>
        <div class="card block max-w-[18rem]  cursor-pointer   bg-transparent text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-stone-950"
            data-aos="fade-up" data-aos-delay="600">
            <div class="relative overflow-hidden bg-cover bg-no-repeat">
                <img class="rounded-lg"
                    src="https://lp-cms-production.imgix.net/2021-10/GettyImages-503231588.jpg?auto=format&q=75&w=1024"
                    alt="" />
            </div>
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-2" style="font-family: Poppins, sans-serif">Fes</h3>
                <p class="text-base" style="font-family: Poppins, sans-serif">
                    Entre tradition et modernité, Marrakech est la promesse de sensations inégalées. Se promener sur la
                    place Jemaa El-Fna et dans les souks avec leurs couleurs chatoyantes et leur odeur orientale.
                </p>
            </div>
        </div>
    </div>

    <!-- Card end -->
    <div class="flex justify-center items-center">
        <div style="width: 1px; height: 150px;" data-aos="fade-up" data-aos-delay="700"></div>
    </div>
    <!-- OurTeam start -->



    <!-- About us -->

    <section id="Aboutus" class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <div class="text-center mb-3">
                <h2 class="text-5xl text-zinc-950 font-bold" style="font-family: Poppins, sans-serif" data-aos="fade-up"
                    data-aos-delay="900">À PROPOS DE NOUS</h2>
            </div>
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

        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 pb-10">
            <div class="flex flex-col justify-center order-2 md:order-1">
                <h3 class="text-2xl leading-6 font-medium text-gray-900" data-aos="fade-up" data-aos-delay="800"
                    style="font-family: Poppins, sans-serif">Notre mission</h3>
                <p class="mt-4 text-base text-gray-500" data-aos="fade-up" data-aos-delay="800"
                    style="font-family: Poppins, sans-serif">
                    À GetYourRoom, notre mission est de fournir aux voyageurs le moyen le plus simple et le plus
                    efficace de réserver la chambre d'hôtel parfaite. Nous nous efforçons de vous offrir une expérience
                    utilisateur exceptionnelle, une vaste sélection d'hébergements et des offres imbattables pour
                    garantir que votre séjour soit à la fois confortable et mémorable.
                </p>
            </div>
            <div class="order-1 md:order-2">
                <img src="https://images.unsplash.com/photo-1517840901100-8179e982acb7?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Our Mission" class="w-full h-80 object-cover rounded-md" data-aos="fade-up"
                    data-aos-delay="800">
            </div>
        </div>

        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 pb-10">
            <div class="flex flex-col justify-center order-2 md:order-1">
                <h3 class="text-2xl leading-6 font-medium text-gray-900" style="font-family: Poppins, sans-serif"
                    data-aos="fade-up" data-aos-delay="800">Notre équipe</h3>
                <p class="mt-4 text-base text-gray-500" style="font-family: Poppins, sans-serif" data-aos="fade-up"
                    data-aos-delay="800">
                    Notre équipe est un groupe diversifié d'enthousiastes de l'hospitalité, d'experts en technologie et
                    de professionnels du service client dédiés à rendre votre expérience de réservation fluide et
                    agréable. Nous travaillons sans relâche pour sélectionner les meilleures options et vous fournir un
                    soutien personnalisé à chaque étape du processus.
                </p>
            </div>
            <div class="order-1 md:order-last">
                <img src="https://images.unsplash.com/photo-1568992687947-868a62a9f521?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Our Team" class="w-full h-80 object-cover rounded-md" data-aos="fade-up" data-aos-delay="800">
            </div>

        </div>

        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 pb-10">
            <div class="flex flex-col justify-center order-2 md:order-1">
                <h3 class="text-2xl leading-6 font-medium text-gray-900" style="font-family: Poppins, sans-serif"
                    data-aos="fade-up" data-aos-delay="800">Pourquoi nous choisir</h3>
                <p class="mt-4 text-base text-gray-500" style="font-family: Poppins, sans-serif" data-aos="fade-up"
                    data-aos-delay="800">
                    GetYourRoom propose bien plus qu'une simple plateforme de réservation. Nous nous engageons à vous
                    aider à trouver les meilleurs hébergements aux meilleurs prix, avec des offres exclusives et des
                    récompenses de fidélité. Notre interface conviviale, nos descriptions détaillées et nos avis
                    honnêtes garantissent que vous prenez des décisions éclairées à chaque fois.
                </p>
            </div>
            <div class="order-1 md:order-2">
                <img src="https://images.unsplash.com/photo-1541971875076-8f970d573be6?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Why Choose Us" class="w-full h-80 object-cover rounded-md" data-aos="fade-up"
                    data-aos-delay="800">
            </div>
        </div>
    </section>

    <!-- About us -->



    <div class="flex justify-center items-center">
        <div style="width: 1px; height: 150px;" data-aos="fade-up" data-aos-delay="700"></div>
    </div>

    <div class="text-center mb-3">
        <h2 class="text-5xl text-zinc-950 font-bold" style="font-family: Poppins, sans-serif" data-aos="fade-up"
            data-aos-delay="600">CE QUE NOUS OFFRONS</h2>
    </div>


    <section id="features bg-transparent border-solid border-2 border-sky-500"
        class="relative block px-6 py-10 md:py-20 md:px-10  mb-8">
        <div class="relative mx-auto max-w-7xl z-10 grid grid-cols-1 gap-10 pt-14 sm:grid-cols-2 lg:grid-cols-3">
            <div class="rounded-md   p-8 text-center" data-aos="fade-up" data-aos-delay="500">
                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center">
                    <i class="fa-solid fa-credit-card text-2xl  duration-200   animate-bounce"></i>
                </div>
                <h3 class="mt-6 text-gray-400" style="font-family: Poppins, sans-serif">Traitement sécurisé des
                    paiements</h3>
                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400"
                    style="font-family: Poppins, sans-serif">
                    Nous comprenons l'importance de la sécurité lors du traitement des paiements pour votre réservation
                    de chambre.
                </p>
            </div>


            <div class="rounded-md p-8 text-center hover:" data-aos="fade-up" data-aos-delay="500">
                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center ">
                    <i class="fa-solid fa-magnifying-glass text-2xl animate-bounce "></i>
                </div>
                <h3 class="mt-6 text-gray-400" style="font-family: Poppins, sans-serif">Recherche facile</h3>
                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400"
                    style="font-family: Poppins, sans-serif">
                    Explorez notre sélection de chambres avec une recherche simple et intuitive. Trouvez facilement
                    l'hébergement parfait pour votre séjour en quelques clics seulement.
                </p>
            </div>


            <div class="rounded-md   p-8 text-center " data-aos="fade-up" data-aos-delay="500">
                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center">
                    <i class="fa-solid fa-credit-card text-2xl animate-bounce"></i>
                </div>
                <h3 class="mt-6 text-gray-400" style="font-family: Poppins, sans-serif">Réservation fluide</h3>
                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400"
                    style="font-family: Poppins, sans-serif">
                    Notre plateforme conviviale vous permet de réserver votre chambre en quelques étapes simples.
                </p>
            </div>


        </div>
        <div class="relative mx-auto max-w-7xl z-10 grid grid-cols-1 gap-10 pt-14 sm:grid-cols-2 lg:grid-cols-3">
            <div class="rounded-md   p-8 text-center" data-aos="fade-up" data-aos-delay="500">
                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center">
                    <i class="fa-solid fa-shield-halved  text-2xl  duration-200   animate-bounce"></i>
                </div>
                <h3 class="mt-6 text-gray-400" style="font-family: Poppins, sans-serif">Informations sécurisées</h3>
                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400"
                    style="font-family: Poppins, sans-serif">
                    Nous comprenons l'importance de la sécurité de vos informations lors de la réservation de votre
                    chambre
                </p>
            </div>


            <div class="rounded-md p-8 text-center hover:" data-aos="fade-up" data-aos-delay="500">
                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center ">
                    <i class="fa-solid fa-reply text-2xl animate-bounce "></i>
                </div>
                <h3 class="mt-6 text-gray-400" style="font-family: Poppins, sans-serif">Réponse rapide</h3>
                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400"
                    style="font-family: Poppins, sans-serif">
                    Nous nous engageons à fournir des réponses rapides à toutes vos demandes de réservation de chambre.
                </p>
            </div>


            <div class="rounded-md   p-8 text-center " data-aos="fade-up" data-aos-delay="500">
                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center">
                    <i class="fa-solid fa-check text-2xl animate-bounce"></i>
                </div>
                <h3 class="mt-6 text-gray-400" style="font-family: Poppins, sans-serif">Bon service client</h3>
                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400"
                    style="font-family: Poppins, sans-serif">
                    Nous nous efforçons de fournir un excellent service client pour rendre votre expérience de
                    réservation de chambre aussi agréable que possible.
                </p>
            </div>
        </div>
    </section>
    <!-- Our service end -->

    <!-- ContactUs start -->
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
                            Nous apprécions vos commentaires, questions et suggestions. N'hésitez pas à nous contacter
                            en utilisant l'un des moyens ci-dessous :
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
                                        <label for="name" class="pb-1 text-xs uppercase tracking-wider"></label><input
                                            type="text" id="name" autocomplete="given-name" placeholder="Votre nom"
                                            class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md dark:text-gray-300 sm:mb-0"
                                            name="name" style="font-family: Poppins, sans-serif">
                                    </div>
                                    <div class="mx-0 mb-1 sm:mb-4">
                                        <label for="email" class="pb-1 text-xs uppercase tracking-wider"></label><input
                                            type="email" id="email" autocomplete="email"
                                            placeholder="Votre adresse e-mail"
                                            class="mb-2 w-full rounded-md border border-gray-400 py-2 pl-2 pr-4 shadow-md dark:text-gray-300 sm:mb-0"
                                            name="email" style="font-family: Poppins, sans-serif">
                                    </div>
                                </div>
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <label for="textarea"
                                        class="pb-1 text-xs uppercase tracking-wider"></label><textarea id="textarea"
                                        name="textarea" cols="30" rows="5" placeholder="Écrivez votre message..."
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



    <!-- Foter start -->
    <footer id="foter" class="bg-white  shadow dark:bg-gray-900 ">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <span class="self-center text-3xl font-semibold whitespace-nowrap"
                        style="font-family: Great Vibes, cursive; font-weight: 500;">GetYourRoom</span>
                </a>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#Aboutus" class="hover:underline me-4 md:me-6"
                            style="font-family: Poppins, sans-serif">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6"
                            style="font-family: Poppins, sans-serif">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6"
                            style="font-family: Poppins, sans-serif">Licensing</a>
                    </li>
                    <li>
                        <a href="./Contact.html" class="hover:underline"
                            style="font-family: Poppins, sans-serif">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400"
                style="font-family: Poppins, sans-serif">© 2024 <a href="/index.html"
                    style="font-family: Great Vibes, cursive; font-weight: 500;"
                    class="hover:underline text-stone-950">GetTheRoom</a>. All Rights Reserved.</span>
        </div>
    </footer>


    <div class="">

        <i id="toggleButton" class="fas fa-comments z-50 m-4 right-0 bottom-0 fixed text-BlueDark p-5 text-2xl"></i>

        <iframe id="chatbotIframe" class="fixed bottom-5 pb-10 z-40  right-0 mr-20 w-96 h-96 hidden"
            src="//localhost:8080/" frameborder="0" scrolling="no" style="bottom: 20px;"></iframe>
    </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="./src/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
AOS.init();

// Dropdown toggle
function toggleDropdown() {
    const dropdown = document.getElementById('guest-dropdown');
    dropdown.classList.toggle('hidden');
}

// Increment and decrement functions
function increment(type) {
    const countElement = document.getElementById(`${type}-count`);
    let count = parseInt(countElement.textContent);
    count++;
    countElement.textContent = count;
    document.getElementById(`${type}-input`).value = count;
    updateGuestSummary();
}

function decrement(type) {
    const countElement = document.getElementById(`${type}-count`);
    let count = parseInt(countElement.textContent);
    if (count > 0) {
        count--;
        countElement.textContent = count;
        document.getElementById(`${type}-input`).value = count;
        updateGuestSummary();
    }
}

// Update guest summary
function updateGuestSummary() {
    const adults = document.getElementById('adults-count').textContent;
    const children = document.getElementById('children-count').textContent;
    const rooms = document.getElementById('rooms-count').textContent;
    const summary = `${adults} adults · ${children} children · ${rooms} room${rooms > 1 ? 's' : ''}`;
    document.getElementById('guest-summary').textContent = summary;
}

// Tab functionality
document.addEventListener("DOMContentLoaded", function() {
    const tabs = document.querySelectorAll('.tab-button');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('bg-gray-200'));
            tab.classList.add('bg-gray-200');
            contents.forEach(content => content.classList.remove('active'));
            contents[index].classList.add('active');
        });
    });
});
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

</html>