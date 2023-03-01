@extends('navigation.admin')

@section('head')
<h1>View Booked Appointments</h1>
<p>{{$date}}</p>
@endsection

@section('linkwords')
<a href="/appointments">
    confirm appointments
</a>
@endsection

@section('content')
<div class="viewUsersTable att">
    @if($appointments->count()>0)
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
        </tr>
        @endforeach
    </table>
    </div>
    @else
    <div class="noItemsDiv">
        <img src="/assets/searching.png" alt="">
        <h2 class="red">No booked appointments at the moment!</h2>
    </div>
    @endif
</div>
@endsection