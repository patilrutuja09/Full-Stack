<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Coffee Shop</title>
    <link rel="stylesheet" href="css/style.css">
     <!-- Bootstrap CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
        crossorigin="anonymous"
    >

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"
    ></script>

</head>
<body class="navbar-gradient">

<!-- ================= HEADER ================= -->
<header>
<nav class="navbar navbar-expand-lg fixed-top coffee-navbar">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="img/logo.jpg" alt="Logo" class="logo-img">
            <span class="ml-2">Coffee Shop</span>
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#popular-coffee">Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="#about-us">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact-us">Contact</a></li>
               <li class="nav-item position-relative ml-3">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#cartModal">
        🛒
        <span id="cart-count" class="cart-badge">0</span>
    </a>
</li>

            </ul>
        </div>

    </div>
</nav>
</header>
