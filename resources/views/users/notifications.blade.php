@extends('navigation.users')

@section('head')
<h2>Notifications</h2>
<p>{{$date}}</p>
@endsection

@section('content')
<div class="feedbackDivs">
    <div class="feed">
        <span><p><b>Dear {{Auth::user()->name}}</b></p></span>
        <span><p>{{$userNotification}}</p></span>
        <span><a href="/viewPaymentProgress">view you payment progress</a></span>
    </div>
</div>
@endsection