@extends('navigation.users')

@section('head')
<h2>Homepage</h2>
<p>{{$date}}</p>
@endsection

@section('content')
<div class="formDivs">
    <div class="fillInfo">
        <h3>Edit Your Profile!</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta cumque iste tempora ut! Temporibus, perferendis ut accusantium autem distinctio sit velit dolorum cupiditate aliquam vitae?</p>
        <div class="bottom">
            <div class="flex">
                <a href="/editProfile">
                    <button>Edit Profile</button>
                </a>
            </div>
        </div>
    </div>
    <img src="/assets/Clients-requests-V1.png" alt="">
</div>
<div class="progress">
    <h3>This year's Payment Progress</h3>
    <div id="progress">
        <div class="yearProgress">
            <p>Jan</p>
            <div class="color"></div>
        </div>
        <div class="yearProgress">
            <p>Feb</p>
            <div class="color"></div>
        </div>
        <div class="yearProgress">
            <p>Mar</p>
            <div class="color"></div>
        </div>
        <div class="yearProgress">
            <p>Apr</p>
            <div class="color"></div>
        </div>
        <div class="yearProgress">
            <p>May</p>
            <div class="color"></div>
        </div>
        <div class="yearProgress">
            <p>Jun</p>
            <div class="noColor"></div>
        </div>
        <div class="yearProgress">
            <p>Jul</p>
            <div class="noColor"></div>
        </div>
        <div class="yearProgress">
            <p>Aug</p>
            <div class="noColor"></div>
        </div>
        <div class="yearProgress">
            <p>Sep</p>
            <div class="noColor"></div>
        </div>
        <div class="yearProgress">
            <p>Oct</p>
            <div class="noColor"></div>
        </div>
        <div class="yearProgress">
            <p>Nov</p>
            <div class="noColor"></div>
        </div>
        <div class="yearProgress">
            <p>Dec</p>
            <div class="noColor"></div>
        </div>
    </div>
    <div class="seeAll">
        <a href="/viewPaymentProgress">
            <button>See Progress report</button>
        </a>
    </div>
</div>
@endsection
