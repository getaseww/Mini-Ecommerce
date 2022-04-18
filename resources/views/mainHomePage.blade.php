<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    YourStore
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li>
                            <a class="nav-link" href="/register">Create Store</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/stores">Stores</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        <li class="nav-item">
                            <a href="{{ route('cart.list') }}" class="btn btn-info" data-toggle="dropdown">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i><span
                                    class="badge badge-pill">{{ count((array) session('cart')) }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="belowNav">
            <div class="row">
                <div class="belowNavContent col-lg-6 col-sm-12">
                    <h2 class="belowNavTitle">Set up an online store today
                    </h2>
                    <h4 class="belowNavTitle2">Sell more and grow the business, with the best online store in Ethiopia.
                    </h4>
                    <p class="belowNavDesc">Everything you need to sell online, with an interface and 24/7 support.
                        Discover the system that
                        will grow your business.
                    </p>
                    <a href="/register" class="btn btn-primary">Register Now</a>
                </div>
                <div class="imageWrapper col-lg-6 col-sm-12">
                    <img class="belowNavImg"
                        src="https://static.doofinder.com/main-files/uploads/2020/05/crear-tienda-online-wordpress-woocommerce.jpg"
                        alt="">
                </div>
            </div>
        </div>
        <div class="systemDesc">
            <div class="Wrapper">
                <h2 class="systemDescTitle">With you wherever you're going</h2>
                <div class="systemDesRow row">
                    <div class="col-lg-6 col-sm-12">
                        <img src="https://clockwise.software/img/blog/how-to-build-an-online-marketplace/header-background.png"
                            alt="" class="systemDescImg">
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <h3 class="systemDescTitle2">Sell everywhere</h3>
                        <p class="description">Use one platform to sell products to anyone, anywhere—in person with
                            Point of Sale and online through your store.</p>
                    </div>
                </div>
                <div class="systemDesRow row">
                    <div class="col-lg-6 col-sm-12">
                        <h3 class="systemDescTitle2">Manage everything</h3>
                        <p class="description">Gain the insights you need to grow—use a single dashboard to manage
                            products,categories and orders anywhere you go.</p>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <img src="https://cdn.dribbble.com/users/2046398/screenshots/9989190/nimbl_4x.png" alt=""
                            class="systemDescImg">
                    </div>
                </div>
                <div class="systemDesRow row">
                    <div class="col-lg-6 col-sm-12"></div>
                    <div class="col-lg-6 col-sm-12"></div>
                </div>
            </div>
        </div>

    </div>
    <footer class="footer">
        <div class="customePad row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h2 class="whiteColor">YOURSTORE.COM</h2>
                <p class="par whiteColor">
                    YourStore.com is an online platfrom for merchantes to store their products and sell to teir
                    customers.
                </p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h2 class="whiteColor">USEFULL LINKS</h2>
                <ul class="uList">
                    <li class="list whiteColor"><a class="footerLink" href="">Register</a></li>
                    <li class="list whiteColor"><a class="footerLink" href="">Login</a></li>
                    <li class="list whiteColor"><a class="footerLink" href="">Privacy Policy</a></li>
                    <li class="list whiteColor"><a class="footerLink" href="">Terms & Condotions</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h2 class="whiteColor">CONTACT US</h2>
                <ul class="uList">
                    <li class="list whiteColor">Addis Ababa,Ethiopia</li>
                    <li class="list whiteColor"> info@yourstore.com </li>
                    <li class="list whiteColor">+251 934 348 888</li>
                    <li class="list whiteColor">+251 934 349 999</li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h2 class="whiteColor">SOCIAL LINKS</h2>
                <ul class="uList">
                    <li class="list whiteColor"><a class="footerLink" href="https://facebook.com">Facebook</a></li>
                    <li class="list whiteColor"><a class="footerLink" href="https://linkedin.com">LinkedIn</a></li>
                    <li class="list whiteColor"><a class="footerLink" href="https://twitter.com">Twitter</a></li>
                    <li class="list whiteColor"><a class="footerLink" href="https://www.whatsapp.com">WhatsApp</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p class="whiteColor copyrightText">© 2022 Copyright: YourStore.com</p>
        </div>
    </footer>
</body>

</html>
