@extends('navigation.admin')

@section('head')
<h1>Payment Confirmation</h1>
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
    @if($payments->count()>0)
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Cover</th>
                <th>Year</th>
                <th>Month</th>
                <th>Mpesa Code</th>
                <th>Status</th>
                <th>Confirm</th>
                <th>Decline</th>
            </tr>
            @foreach($payments as $payment)
            <tr>
                <td>{{$payment->id}}</td>
                <td>{{$payment->user->name}}</td>
                <td>{{$payment->insuaranceCover->name}}</td>
                <td>{{$payment->year}}</td>
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
                <td><form action="/confirmPayment/{{$payment->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button id="gr" type="submit">Received</button>
                </form></td>
                <td><form action="/declinePayment/{{$payment->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button id="rd" type="submit">Decline</button>
                </form></td>
            </tr>
            @endforeach
        </table>
    </div>
    @else
    <div class="noItemsDiv">
        <img src="/assets/searching.png" alt="">
        <h2 class="red">No payment received</h2>
    </div>
    @endif
</div>
@endsection