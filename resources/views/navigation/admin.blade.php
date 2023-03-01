<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Inter+Tight:ital,wght@0,400;0,600;0,700;1,400&family=Just+Another+Hand&family=Pacifico&family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <section class="adminPage">
        <div class="navDiv">
            <nav>
                <span id="logo">Biti<b>Agency</b></span>
                <ul>
                    <li id="{{ request()->is('adminHome') ? 'active' : '' }}"><a href="/adminHome"><i class="fa-solid fa-table-cells-large"></i>dashboard</a></li>
                    <li id="{{ request()->is('registerUser') ? 'active' : '' }}"> <a href="/registerUser"><i class="fa-solid fa-users"></i>users</a></li>
                    <li id="{{ request()->is('viewInsuranceCovers') ? 'active' : '' }}"> <a href="/viewInsuranceCovers"><i class="fa-solid fa-umbrella"></i>insurance covers</a></li>
                    <li id="{{ request()->is('viewReachOuts') ? 'active' : '' }}"><a href="/viewReachOuts"><i class="fa-solid fa-envelope"></i>reach outs</a></li>
                    <li id="{{ request()->is('forms') ? 'active' : '' }}"><a href="/forms"><i class="fa-solid fa-align-right"></i>forms</a></li>
                    <li id="{{ request()->is('payments') ? 'active' : '' }}"> <a href="/payments"><i class="fa-solid fa-money-bill"></i>monthly payments</a></li>
                    <li id="{{ request()->is('yearlyPayments') ? 'active' : '' }}"> <a href="/yearlyPayments"><i class="fa-solid fa-coins"></i>yearly payments</a></li>
                    <li id="{{ request()->is('appointments') ? 'active' : '' }}"><a href="/appointments"><i class="fa-solid fa-calendar-check"></i>appointments</a></li>
                    <li><a href=""><i class="fa-solid fa-right-from-bracket"></i>logout</a></li>
                </ul>
                <div class="profile">
                    <span>{{Auth::guard('admins')->user()->email}}</span>
                </div>
            </nav>
        </div>
        <div class="mainContent">
            <div class="headStrip">
                <div class="head">
                    @yield('head')
                    <div class="link">
                        @yield('linkwords')
                    </div>
                </div>
                <div class="iconsDiv">
                    <div class="icons">
                        <div><i class="fa-solid fa-bell"></i></div>
                        <div><i class="fa-solid fa-gear"></i></div>
                    </div>
                    <div class="profile">
                        <img src="/assets/{{Auth::guard('admins')->user()->profile_pic}}" alt="">
                    </div>
                </div>
            </div>
            <div id="mainContent">
                @yield('content')
            </div>
        </div>
    </section>
</body>
</html>