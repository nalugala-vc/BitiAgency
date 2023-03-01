@extends('navigation.users')

@section('head')
<h2>Submit Yearly Payment</h2>
<p>{{$date}}</p>
@endsection

@section('linkwords')
<a href="/viewPaymentForm" >
    go to monthly payment
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
    <form action="/submitYearlyPayment" method="POST">
        @csrf
        <div class="row">
            <div class="input">
                <span><i class="fa-solid fa-envelope"></i>Year</span>
                <input type="number" name="year" id="" placeholder="enter year">
            </div>
            <div class="input">
                <span><i class="fa-solid fa-location-dot"></i>Mpesa Message</span>
                <input type="text" name="mpesa_code" id="" placeholder="enter mpesa message">
            </div>
        </div>
        <div class="row">
            <div class="input">
                <span><i class="fa-solid fa-umbrella"></i>Insuarance Cover</span>
                <select name="yearly_plan_id" id="">
                    <option value="">select cover</option>
                    @foreach($insuarance as $insuarance)
                    <option value="{{$insuarance->id}}">{{$insuarance->name}}</option>
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