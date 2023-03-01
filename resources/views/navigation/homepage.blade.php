<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Inter+Tight:ital,wght@0,400;0,600;0,700;1,400&family=Just+Another+Hand&family=Pacifico&family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <section class="home">
        <div class="myNav">
            <nav id="smallScreen">
                <span id="logo">Biti<b>Agency</b></span>
                <div id="iconClick">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <ul id="iconClickClose" style="display:none">
                    <div>
                        <i class="fa-solid fa-x"></i>
                    </div>
                    <div class="ul">
                        <li><a href="/">Home</a></li>
                        <li><a href="/whyUs">Why Biti<b>Agency</b>?</a></li>
                        <li><a href="/bitiAgencyCovers">Insurance cover</a></li>
                        <li><a href="/contactUs">Contact us</a></li>
                        <li><a href="/custLog">login</a></li>
                        <li><a href="/custLog">signup</a></li>
                    </div>
                </ul>
            </nav>
        </div>
        <nav id="mainNav">
            <span id="logo">Biti<b>Agency</b></span>
            <ul>
                <li  id="{{ request()->is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                <li  id="{{ request()->is('whyUs') ? 'active' : '' }}"><a href="/whyUs">Why Biti<b>Agency</b>?</a></li>
                <li  id="{{ request()->is('bitiAgencyCovers') ? 'active' : '' }}"><a href="/bitiAgencyCovers">Insurance cover</a></li>
                <li  id="{{ request()->is('contactUs') ? 'active' : '' }}"><a href="/contactUs">Contact us</a></li>
            </ul>
            <div class="buttons">
                <a href="/custLog"><button id="login">Login</button></a>
                <a href="/custLog"><button id="signup">Sign up</button></a>
            </div>
        </nav>
        @yield("belowNav")
        
    </section>
    @yield("afterNav")
    <footer>
        <span id="logoF">Biti<b>Agency</b></span>
        <div id="brands">
            <i class="fa-brands fa-youtube"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-twitter"></i>
        </div>
        <div id="credits">
            <i class="fa-brands fa-github"></i>
            &nbsp;
            <p>nalugala-vc</p>
        </div>
    </footer>
    <script src="/js/landing.js"></script>
</body>
</html>