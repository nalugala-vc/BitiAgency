<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/e54abc54b9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fasthand&family=Inter+Tight:ital,wght@0,400;0,600;0,700;1,400&family=Just+Another+Hand&family=Pacifico&family=Poppins:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="blackBg">
            <div class="box signin">
                <h2>Want to book an Appointment</h2>
                <button class="signinBtn">Book now</button>
            </div>
            <div class="box signup">
                <h2>Want to talk to a professional?</h2>
                
                <button class="signupBtn">submit query</button>
            </div>
        </div>
        <div class="formBx">
            <div class="form signinForm inactive">
            <form action="/submitConcern" method="POST">
                @csrf
                    <h3>Talk to a professional</h3>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                    <div class="input">
                        <span>Full name</span>
                        <input type="text" name="name" id="" placeholder="Full name">
                    </div>
                    <div class="input">
                        <span>Email</span>
                        <input type="text" name="email" id="" placeholder="Email">
                    </div>
                    <input type="hidden" name="user_id" value="{{$loggedIn}}">
                    <div class="input">
                        <span>Your Concern</span>
                        <input type="text" name="concern" id="" placeholder="Concern">
                    </div>
                    <div class="input">
                        <span>Explain</span>
                        <textarea name="explanation" id="" cols="35" rows="6"></textarea>
                    </div>
                    <div class="input">
                        @if($errors->any())
                            <h4 class="red"
                                style="font-family: 'Outfit',sans-serif">{{$errors->first()}}</h4>
                        @endif
                    </div>
                    <div class="input">
                        <button type="submit">Contact us</button>
                    </div>
                </form>
            </div>
            <div class="form signupForm active">
                <form action="/bookAppointment" method="POST">
                    @csrf
                    @if (session('application'))
                        <div class="alert alert-success">
                            {{ session('application') }}
                        </div>
                    @endif
                    <h3>Book an Appointment</h3>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                    <div class="input">
                        <span>Full name</span>
                        <input type="text" name="name" id="" placeholder="Full name">
                    </div>
                    <div class="input">
                        <span>Email</span>
                        <input type="email" name="email" id="" placeholder="Email">
                    </div>
                    <div class="input">
                        <span>Date</span>
                        <input type="date" name="date" id="" placeholder="Date and Time">
                    </div>
                    <input type="hidden" name="user_id" value="{{$loggedIn}}">
                    <div class="input">
                        <span>Time</span>
                        <input type="time" name="time" id="" placeholder="Date and Time">
                    </div>
                    <div class="input">
                        <span>Attendance</span>
                        <select name="attendance" id="">
                            <option value="virtual">virtual meeting</option>
                            <option value="physical">physical meeting</option>

                        </select>
                    </div>
                    <div class="input">
                    @if($errors->any())
                        <h4 class="red"
                            style="font-family: 'Outfit',sans-serif">{{$errors->first()}}</h4>
                    @endif
                    </div>
                    <div class="input">
                        <button type="submit">Book now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/login.js"></script>
</body>
</html>