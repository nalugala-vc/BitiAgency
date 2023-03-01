<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Inter+Tight:ital,wght@0,400;0,600;0,700;1,400&family=Just+Another+Hand&family=Pacifico&family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="smallScreenNavs">
        <nav>
            <span id="logo">Biti<b>Agency</b></span>
            <div id="iconClick">
                <i class="fa-solid fa-bars"></i>
            </div>
            <ul id="iconClickClose" style="display:none">
                <div id="iconClicked">
                    <i class="fa-solid fa-x"></i>
                </div>
                <li id="{{ request()->is('home') ? 'active' : '' }}"><a href="/home">Home</a></li>
                <li><a href="/contactUs">Contact Us</a></li>
                <li id="{{ request()->is('viewFeedback') ? 'active' : '' }}"><a href="/viewFeedback">Feedback</a></li>
                <li id="{{ request()->is('viewAppointments') ? 'active' : '' }}"><a href="/viewAppointments">appointments</a></li>
                <li id="{{ request()->is('viewForms') ? 'active' : '' }}"><a href="/viewForms">Forms</a></li>
                <li id="{{ request()->is('viewPaymentForm') ? 'active' : '' }}"> <a href="/viewPaymentForm">Submit payment</a></li>
                <li id="{{ request()->is('viewNotifications') ? 'active' : '' }}"> <a href="/viewNotifications">Notifications</a></li>
                <li><a href="">logout</a></li>
            </ul>
        </nav>
    </div>
    <section class="mainSection">
        <div class="mainNav">
            <nav>
                <span id="logo">Biti<b>Agency</b></span>
                <ul>
                    <li id="{{ request()->is('home') ? 'active' : '' }}"><a href="/home"><i class="fa-solid fa-table-cells-large"></i>Home</a></li>
                    <li id="{{ request()->is('contactUs') ? 'active' : '' }}"><a href="/contactUs"><i class="fa-solid fa-envelope"></i>Contact Us</a></li>
                    <li id="{{ request()->is('viewFeedback') ? 'active' : '' }}"><a href="/viewFeedback"><i class="fa-solid fa-align-right"></i>Feedback</a></li>
                    <li id="{{ request()->is('viewAppointments') ? 'active' : '' }}"><a href="/viewAppointments"><i class="fa-solid fa-calendar-check"></i>appointments</a></li>
                    <li id="{{ request()->is('viewForms') ? 'active' : '' }}"><a href="/viewForms"><i class="fa-solid fa-align-center"></i>Forms</a></li>
                    <li id="{{ request()->is('viewPaymentForm') ? 'active' : '' }}"> <a href="/viewPaymentForm"><i class="fa-solid fa-money-bill"></i>Submit payment</a></li>
                    <li id="{{ request()->is('viewNotifications') ? 'active' : '' }}"> <a href="/viewNotifications"><i class="fa-solid fa-bell"></i>Notifications</a></li>
                    <li><a href=""><i class="fa-solid fa-right-from-bracket"></i>logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="mainContent">
            <div class="heading">
                @yield('head')
                <div class="link">
                    @yield('linkwords')
                </div>
            </div>
            <div id="mainContent">
                @yield('content')
                
            </div>
        </div>
        <div class="profileNav">
            <div class="profile">
                <img src="/assets/{{Auth::user()->picture}}" alt="">
                <p>{{ Auth::user()->name }}</p>
                <p>0878747429</p>
                
            </div>
            <div class="bottom">
                <div class="flex">
                    <a href="/editProfile">
                        <button>Edit Profile</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <script src="/js/landing.js"></script>
</body>
</html>