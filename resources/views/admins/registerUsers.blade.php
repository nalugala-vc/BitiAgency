@extends('navigation.admin')

@section('head')
<h1>Users Registration</h1>
<p>{{$date}}</p>
@endsection

@section('linkwords')
<a href="/viewUsers">
    view users
</a>
@endsection

@section('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
@if (session('error'))
    <div class="red">
        {{ session('error') }}
    </div>
@endif
<div class="registrationForm">
    <form action="/submitUser" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="input">
                <span><i class="fa-solid fa-user"></i>Name</span>
                <input type="text" name="name" id="" placeholder="enter name">
            </div>
            <div class="input">
                <span><i class="fa-solid fa-envelope"></i>Email</span>
                <input type="text" name="email" id="" placeholder="enter email">
            </div>
        </div>
        <div class="row">
            <div class="input">
                <span><i class="fa-solid fa-hashtag"></i>Age</span>
                <input type="text" name="age" id="" placeholder="enter age">
            </div>
            <div class="input">
                <span><i class="fa-solid fa-phone"></i>Phone number</span>
                <input type="text" name="phone_no" id="" placeholder="enter phone number">
            </div>
        </div>
        <div class="row">
            <div class="input">
                <span><i class="fa-solid fa-image"></i>Picture</span>
                <input type="file" name="picture" id="">
            </div>
            <div class="input">
                <span><i class="fa-solid fa-venus-mars"></i>Gender</span>
                <select name="gender" id="">
                    <option value="">select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="prefer not to say">Prefer not to say</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="input">
                <span><i class="fa-solid fa-location-dot"></i>Location</span>
                <input type="text" name="location" id="" placeholder="enter location">
            </div>
            <div class="input">
                <span><i class="fa-solid fa-umbrella"></i>Insuarance Cover</span>
                <select name="covers_id" id="">
                    <option value="">select cover</option>
                    @foreach($insurance_cover as $cover)
                    <option value="{{$cover->id}}">{{$cover->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            @if($errors->any())
                <h4 class="red"
                    style="font-family: 'Outfit',sans-serif">{{$errors->first()}}</h4>
            @endif
        </div>
        <div class="inputBtn">
            <button>Submit</button>
        </div>
    </form>
</div>
@endsection