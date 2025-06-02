<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <!--Custom Stylesheet-->
    <link rel="stylesheet" href="{{(asset('css/app.css'))}}">
    <!--Iconscout-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/solid.css">
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!--Flaticon-->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-chubby/css/uicons-regular-chubby.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-brands/css/uicons-brands.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<body>
    <!-- START OF NAV-->
    <nav>
        <div class="container nav__container">
            <a href="/" class="nav__logo">JG</a>
            <ul class="nav__items">
                <li><a href="/blog">Blog</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/contact">Contact</a></li>
                <!-- só tem acesso aqui se estiver logado -->
                @auth
                    <li class="nav__profile">
                    <div class="avatar">
                        @foreach ($users as $user)
                        <img src="{{asset('images/avatars/' . $user->avatar)}}">
                        @endforeach
                    </div>
                    <ul>
                        <li><a href="/profile">Profile</a></li>
                        <li><a href="/admin">Dashboard</a></li>
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </li>
                @else
                <li><a href="/signin">Sign In</a></li>
                @endauth
            </ul>
            <button id="open__nav-btn"><i class="uis uis-bars"></i></button>
            <button id="close__nav-btn"><i class="uis uis-multiply"></i></button>
        </div>
        
    </nav>
    <!-- END OF NAV -->