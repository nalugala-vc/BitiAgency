@extends('navigation.admin')

@section('head')
<h1>Edit Insurance Covers</h1>
<p>{{$date}}</p>
@endsection

@section('linkwords')
<a href="/viewInsuranceCovers">
    view insurance covers
</a>
@endsection

@section('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<div class="registrationForm">
    <form action="/updateInsuranceCover/{{$cover->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="input">
                <span><i class="fa-solid fa-user"></i>Name</span>
                <input type="text" name="name" id="" placeholder="enter cover name" value="{{$cover->name}}">
            </div>
            <div class="input">
                <span><i class="fa-solid fa-envelope"></i>Price</span>
                <input type="number" name="price" id="" placeholder="enter insurance price" value="{{$cover->price}}" step=".01">
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