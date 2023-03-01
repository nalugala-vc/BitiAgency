@extends('navigation.users')

@section('head')
<h2>My appointments</h2>
<p>{{$date}}</p>
@endsection

@section('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<div class="viewUsersTable">
    @if($user->appointments->count() > 0)
    <div>
        <table>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Attendance</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
            @foreach($user->appointments as $appointments)
            <tr>
                <td>{{$appointments->date}}</td>
                <td>{{$appointments->time}}</td>
                <td>{{$appointments->attendance}}</td>
                <td id="{{$appointments->status}}">
                    @if($appointments->status == 'accept')
                    <p>accepted</p>
                    @elseif($appointments->status =='decline')
                    <p>declined</p>
                    @else
                    <p>{{$appointments->status}}</p>
                    @endif
                </td>
                <td>
                    <form action="/deleteUserAppointment/{{$appointments->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button id="rd">Delete</button>
                    </form>
                </td>
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