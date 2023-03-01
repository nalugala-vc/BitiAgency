@extends('navigation.homepage')

@section('belowNav')
<script>
    console.log(window.innerHeight)
</script>
<div class="mainInfoDiv">
    <div class="imgContainer">
        <img src="/assets/merged.png" alt="" id="largerImg">
    </div>
    <div class="info">
        <h1>A New Kind Of Life Insurance</h1>
        <h5>Secure your family's financial future in as little as ten minutes with Biti Agency in patnership with ICEALION</h5>
        <button>Get Started!</button>
    </div>
</div>
@endsection
@section('afterNav')
<section class="about">
        <div class="cardContainer">
            <div class="card">
                <div>
                    <i class="fa-solid fa-brain"></i>
                    <h3>Peace of Mind</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, temporibus!</p>
                    <a href="">learn more <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="card m1">
                <div>
                    <i class="fa-solid fa-sack-dollar"></i>
                    <h3>Set for Life</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, temporibus!</p>
                    <a href="">learn more <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="card">
                <div>
                    <i class="fa-solid fa-check"></i>
                    <h3>100% Satisfaction</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, temporibus!</p>
                    <a href="">learn more <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="statisticsDiv">
            <div class="clientsDiv">
                <h1>120 k</h1>
                <h3>Worldwide Benefitiaries</h3>
            </div>
            <div class="otherStats">
                <div class="row">
                    <div class="column">
                        <h2>600+</h2>
                        <p>Branches</p>
                    </div>
                    <div class="column">
                        <h2>150</h2>
                        <p>Countries</p>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <h2>20+</h2>
                        <p>Benefits</p>
                    </div>
                    <div class="column">
                        <h2>5</h2>
                        <p>Covers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="benefits">
        <div class="otherInsurance">
            <div class="head">
                <h1>Featured Benefits</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo minus!</p>
            </div>
            <div class="button">
                <button>Get Started</button>
            </div>
        </div>
        <div class="perks">
            <div class="features">
                <div class="featur">
                    <div class="imgDiv">
                        <img src="/assets/feature (1).jpg" alt="">
                    </div>
                </div>
                <div class="infoDiv">
                    <h3>Funeral</h3>
                    <h5>Know More &rarr;</h5>
                </div>
            </div>
            <div class="features">
                <div class="featur">
                    <div class="imgDiv">
                        <img src="/assets/feature (2).jpg" alt="">
                    </div>
                </div>
                <div class="infoDiv">
                    <h3>Mortgage</h3>
                    <h5>Know More &rarr;</h5>
                </div>
            </div>
            <div class="features">
                <div class="featur">
                    <div class="imgDiv">
                        <img src="/assets/feature (3).jpg" alt="">
                    </div>
                </div>
                <div class="infoDiv">
                    <h3>Debt</h3>
                    <h5>Know More &rarr;</h5>
                </div>
            </div>
            <div class="features">
                <div class="featur">
                    <div class="imgDiv">
                        <img src="/assets/feature (4).jpg" alt="">
                    </div>
                </div>
                <div class="infoDiv">
                    <h3>Education</h3>
                    <h5>Know More &rarr;</h5>
                </div>
            </div>
            <div class="features">
                <div class="featur">
                    <div class="imgDiv">
                        <img src="/assets/feature (7).jpg" alt="">
                    </div>
                </div>
                <div class="infoDiv">
                    <h3>Medical Expenses</h3>
                    <h5>Know More &rarr;</h5>
                </div>
            </div>
            <div class="features">
                <div class="featur">
                    <div class="imgDiv">
                        <img src="/assets/feature (6).jpg" alt="">
                    </div>
                </div>
                <div class="infoDiv">
                    <h3>Replace Income</h3>
                    <h5>Know More &rarr;</h5>
                </div>
            </div>
        </div>
    </section>
    <section class="bookAppointment">
        <div class="flexBook">
            <div class="booking">
                <div class="infoWords">
                    <h1>Living in Nairobi? Book an Appointment Today!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga delectus quam excepturi atque accusantium quia ratione laudantium eum libero sapiente!</p>
                </div>
                <div class="bookButton">
                    <a href="/contactUs">
                        <button>Book Appointment</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="navLinks">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Why Trust<b>Insure</b>?</a></li>
                <li><a href="">Insurance cover</a></li>
                <li><a href="">Contact us</a></li>
            </ul>
        </div>
    </section>
@endsection