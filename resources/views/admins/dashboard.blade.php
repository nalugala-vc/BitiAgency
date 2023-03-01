@extends('navigation.admin')
@section('head')
<h1>DashBoard</h1>
<p>{{$date}}</p>
@endsection
@section('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<div class="divTiles">
    <a href="/registerUser">
        <div class="tile">
            <img src="/assets/people.png" alt="">
            <h2>{{$users}} {{$userGrammer}}
            </h2>
        </div>
    </a>
    <a href="viewInsuranceCovers">
        <div class="tile">
            <img src="/assets/New-Entries.png" alt="">
            <h2>{{$covers}} {{$coverGrammer}}</h2>
        </div>
    </a>
    <a href="/appointments">
        <div class="tile">
            <img src="/assets/Woman-booking-appointment.png" alt="">
            <h4>{{$appointments}} {{$appointmentGrammer}}</h4>
        </div>
    </a>
    <a href="/viewReachOuts">
        <div class="tile">
            <img src="/assets/New-message.png" alt="">
            <h2>{{$feedbacks}} {{$feedbackGrammer}}</h2>
        </div>
    </a>
</div>
<div class="otherContent">
    <div class="users">
        <h2>Recently Registered</h2>
        <div class="usersTable">
            @if($recentlyJoinedUsers->count()>0)
            <table>
                <tr>
                    <th>ID</th>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                @foreach($recentlyJoinedUsers as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img src="/assets/{{$user->picture}}" alt=""></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
                @endforeach
            </table>
            @else
            <div class="noItemsDiv">
                <img src="/assets/searching.png" alt="">
                <h2 class="red">No registered users at the moment!</h2>
            </div>
            @endif
        </div>
    </div>
    <div class="appointmentsTable">
        <h2>Appointments</h2>
        <div class="appointmentDivs">
            @if($recentlyBookedApp->count()>0)
            @foreach($recentlyBookedApp as $appointments)
            <div class="diva">
                <div class="row1">
                    <span><b>Name:</b> {{$appointments->name}}</span>
                    <span><b>Date:</b> {{$appointments->date}}</span>
                    <span><b>Attendance:</b> {{$appointments->attendance}}</span>
                </div>
                <div class="row2">
                    <form action="/acceptAppointment/{{$appointments->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <button id="accept">Accept</button>
                    </form>
                    <form action="/declineAppointment/{{$appointments->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <button id="decline">Decline</button>
                    </form>
                </div>
            </div>
            @endforeach
            @else
            <div class="noItemsDiv">
                <img src="/assets/searching.png" alt="">
                <h4 class="red">No booked appointments for you!</h4>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection