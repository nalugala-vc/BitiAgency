@extends('navigation.admin')

@section('head')
<h1>Reply to User Reachouts</h1>
<p>{{$date}}</p>
@endsection

@section('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<div class="registrationForm">
    <form action="/submitReply/{{$feedback->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="input">
                <span><i class="fa-solid fa-user"></i>Name</span>
                <input type="text" name="name" id="" placeholder="enter name" value="{{$feedback->name}}">
            </div>
            <div class="input">
                <span><i class="fa-solid fa-envelope"></i>Concern</span>
                <input type="text" name="concern" id="" placeholder="enter email" value="{{$feedback->concern}}">
            </div>
        </div>
        <div class="row">
            <div class="input">
                <span><i class="fa-solid fa-align-right"></i>Explaination</span>
                <textarea name="explanation" id="" cols="96" rows="5">{{$feedback->explanation}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="input">
                <span><i class="fa-solid fa-check"></i>Reply</span>
                <textarea name="reply" id="" cols="96" rows="5">{{$feedback->reply}}</textarea>
            </div>
        </div>
        <div class="row">
            @if($errors->any())
                <h4 class="red"
                    style="font-family: 'Outfit',sans-serif">{{$errors->first()}}</h4>
            @endif
        </div>
        <div class="inputBtn">
            <button>Reply</button>
        </div>
    </form>
</div>
@endsection