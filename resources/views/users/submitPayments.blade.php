@extends('navigation.users')

@section('head')
<h2>Submit Monthly Payment</h2>
<p>{{$date}}</p>
@endsection

@section('linkwords')
<a href="/viewYearlyPaymentForm" >
    go to yearly payment
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
    <form action="/submitPayment" method="POST">
        @csrf
        <div class="row">
            <div class="input">
                <span><i class="fa-solid fa-user"></i>Month</span>
                <select name="month" id="">
                    <option value="">select month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            </div>
            <div class="input">
                <span><i class="fa-solid fa-envelope"></i>Year</span>
                <input type="number" name="year" id="" placeholder="enter year">
            </div>
        </div>
        <div class="row">
            <div class="input">
                <span><i class="fa-solid fa-location-dot"></i>Mpesa Code</span>
                <input type="text" name="mpesa_code" id="" placeholder="enter mpesa message">
            </div>
            <div class="input">
                <span><i class="fa-solid fa-umbrella"></i>Insuarance Cover</span>
                <select name="covers_id" id="">
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