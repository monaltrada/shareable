<!DOCTYPE html>
<html lang="en">

<head>
    <!--required meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="We at TECHNICA ENTERPRISE nurtured this philosophy since our humble beginning a two & half decade ago, and now our products has become a synonym for innovativeness, quality and perfection." />
    <meta name="keywords"
        content="Technica Enterprise Rajkot, Technica, Technica Enterprise, Technica Rajkot, Split Clamp, Pipe Support, Machinery Spares, Pipe Support Split Clamp, Rack Bolt S Type, Sprinkler Hanger, Pipe Supporting System, Anchor Fasteners, Sink Bolt, U. Bolt, C.Channel, Coupling Nuts" />
    <meta name="Author" content="https://altiusinfoway.com/ " />
    <!--favicon icon-->

    <link rel="icon" href="assets/img/favicon.png" type="image/png" sizes="16x16" />

    <!--title-->
    <title>Technica Enterprises</title>

    <!--build:css-->
    <link rel="stylesheet" href="{{ url('frantend/assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ url('frantend/assets/css/custom.css') }}" />
    <!-- endbuild -->

    <!--custom css-->

</head>

<body>

    <div class="ring-preloader w-100 h-100 position-fixed start-0 top-0">
        <div class="lds-dual-ring"></div>
    </div>

    <!--main content wrapper start-->
    <div class="main-wrapper">

        <!--header area start-->
        <header class="header-style-one header-sticky">
            <div class="at_header_nav">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6 col-lg-3">
                            <div class="logo-wrapper">
                                <a href="index.php"><img src="{{ 'frantend/img/wlogo.png' }}" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-9">
                            <div class="at_header_right d-flex align-items-center justify-content-end">
                                <nav class="at_nav_menu d-none d-lg-block">
                                    <ul>
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="{{ route('about') }}">Compony</a></li>
                                        <li class="has-submenu"><a href="javascript:void(0);">Product</a>
                                            <ul class="submenu-wrapper">
                                                <li><a href="{{ route('product') }}">Product 1</a></li>
                                                <li><a href="{{ route('product') }}">Product 2</a></li>
                                                <li><a href="{{ route('product') }}">Product 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('quality') }}">Quality</a></li>
                                        <li><a href="{{ route('catalouge') }}">E-Catalouge</a></li>
                                        <li><a href="{{ route('presence') }}">Our Presence</a></li>
                                        <li><a href="{{ route('why') }}">why Us?</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </nav>
                                <button class="mobile-menu-toggle header-toggle-btn ms-4 d-lg-none">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--header area end-->

        <!--mobile menu start-->
        <div class="mobile-menu position-fixed bg-white deep-shadow">
            <button class="close-menu position-absolute"><i class="fa-solid fa-xmark"></i></button>
            <a href="index.php" class="logo-wrapper bg-secondary d-block mt-4 p-3 rounded-1 text-center"><img
                    src="{{ 'frantend/img/wlogo.png' }}" alt="logo" class="img-fluid"></a>
            <nav class="mobile-menu-wrapper mt-40">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">Compony</a></li>
                    <li class="has-submenu"><a href="javascript:void(0);">Product</a>
                        <ul class="submenu-wrapper">
                            <li><a href="product.php">Product 1</a></li>
                            <li><a href="product.php">Product 2</a></li>
                            <li><a href="product.php">Product 3</a></li>
                        </ul>
                    </li>
                    <li><a href="quality.php">Quality</a></li>
                    <li><a href="cat.php">E-Catalouge</a></li>
                    <li><a href="presence.php">Our Presence</a></li>
                    <li><a href="why_Us.php">why Us?</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>

        </div>
        <!--mobile menu end-->
