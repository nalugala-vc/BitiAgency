@extends('navigation.admin')

@section('head')
<h1>Add Forms</h1>
<p>{{$date}}</p>
@endsection

@section('linkwords')
<a href="/submittedForms">
    view submitted forms
</a>
@endsection

@section('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<div class="registrationForm">
    <form action="/submitForm" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="input">
                <span><i class="fa-solid fa-user"></i>Name</span>
                <input type="text" name="name" id="" placeholder="enter form name">
            </div>
            <div class="input">
                <span><i class="fa-solid fa-image"></i>Form</span>
                <input type="file" name="form_file" id="">
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