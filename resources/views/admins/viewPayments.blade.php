@extends('navigation.admin')

@section('head')
<h1>Confirmed Payments</h1>
<p>{{$date}}</p>
@endsection

@section('linkwords')
<a href="/receivedPayment">
    view received monthly payment
</a>
@endsection


@section('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<div class="viewUsersTable">
    @if($payments->count()> 0)
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Month</th>
                <th>Mpesa Code</th>
                <th>Status</th>
            </tr>
            @foreach($payments as $payment)
            <tr>
                <td>{{$payment->id}}</td>
                <td>{{$payment->user->name}}</td>
                <td>{{$payment->insuaranceCover->name}}</td>
                <td>{{$payment->month}}</td>
                <td>{{$payment->mpesa_code}}</td>
                <td id="{{$payment->status}}">
                    @if($payment->status == 'accept')
                    <p>accepted</p>
                    @elseif($payment->status =='decline')
                    <p>declined</p>
                    @else
                    <p>{{$payment->status}}</p>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @else
    <div class="noItemsDiv">
        <img src="/assets/searching.png" alt="">
        <h2 class="red">No confirmed payments at the moment!</h2>
    </div>
    @endif
</div>
@endsection