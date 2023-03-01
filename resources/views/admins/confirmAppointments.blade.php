@extends('navigation.admin')

@section('head')
<h1>Confirm Appointments</h1>
<p>{{$date}}</p>
@endsection

@section('linkwords')
<a href="/viewAcceptedAppointments">
    view confirmed appointments
</a>
@endsection

@section('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<div class="viewUsersTable">
    @if($appointments->count() > 0)
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Time</th>
                <th>Attendance</th>
                <th>Status</th>
                <th>Accept</th>
                <th>Decline</th>
            </tr>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{$appointment->id}}</td>
                <td>{{$appointment->name}}</td>
                <td>{{$appointment->email}}</td>
                <td>{{$appointment->date}}</td>
                <td>{{$appointment->time}}</td>
                <td>{{$appointment->attendance}}</td>
                <td id="{{$appointment->status}}">
                    @if($appointment->status == 'accept')
                    <p>accepted</p>
                    @elseif($appointment->status =='decline')
                    <p>declined</p>
                    @else
                    <p>{{$appointment->status}}</p>
                    @endif
                </td>
                <td><form action="/acceptAppointment/{{$appointment->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button id="gr">Accept</button>
                </form></td>
                <td><form action="/declineAppointment/{{$appointment->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button id="rd">Decline</button>
                </form></td>
            </tr>
            @endforeach
        </table>
    </div>
    @else
    <div class="noItemsDiv">
        <img src="/assets/searching.png" alt="">
        <h2 class="red">No booked appointments for you!</h2>
    </div>
    @endif
</div>
@endsection