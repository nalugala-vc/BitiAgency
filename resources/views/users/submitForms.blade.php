@extends('navigation.users')

@section('head')
<h2>Submit Form</h2>
<p>{{$date}}</p>
@endsection

@section('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<div class="registrationForm">
    <form action="/submitFormUser" method="POST" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="form_id"p value="{{$form->id}}">
        <div class="row">
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