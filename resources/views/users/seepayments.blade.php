@extends('navigation.users')

@section('head')
<h2>Payment Progress</h2>
<p>{{$date}}</p>
@endsection

@section('content')
<div class="viewUsersTable">
    @if($user->payment !=null && $user->payment->count() > 0)
    <div>
        <table>
            <tr>
                <th>Year</th>
                <th>Month</th>
                <th>Cover</th>
                <th>Mpesa Code</th>
                <th>Status</th>
            </tr>
            @foreach($user->payment as $payments)
            <tr>
                <td>{{$payments->year}}</td>
                <td>{{$payments->month}}</td>
                <td>{{$user->insuaranceCover->name}}</td>
                <td>{{$payments->mpesa_code}}</td>
                <td id="{{$payments->status}}">
                    @if($payments->status == 'accept')
                    <p>accepted</p>
                    @elseif($payments->status =='decline')
                    <p>declined</p>
                    @else
                    <p>{{$payments->status}}</p>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @else
    <div class="noItemsDiv">
        <img src="/assets/searching.png" alt="">
        <h2 class="red">No payment made by you!</h2>
    </div>
    @endif
</div>
@endsection