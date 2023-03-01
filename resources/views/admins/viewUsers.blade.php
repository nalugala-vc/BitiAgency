@extends('navigation.admin')

@section('head')
<h1>View Users</h1>
<p>{{$date}}</p>
@endsection

@section('linkwords')
<a href="/registerUser">
    register user
</a>
@endsection

@section('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<div class="viewUsersTable">
    @if($users->count() > 0)
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Picture</th>
                <th>Email</th>
                <th>Age</th>
                <th>Location</th>
                <th>Cover</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td><img src="/assets/{{$user->picture}}" alt=""></td>
                <td>{{$user->email}}</td>
                <td>{{$user->age}} years</td>
                <td>{{$user->location}}</td>
                <td>{{$user->covers_id}}</td>
                <td>{{$user->phone_no}}</td>
                <td>{{$user->gender}}</td>
                <td><a href="/editUser/{{$user->id}}"><button id="gr">Edit</button></a></td>
                <td><form action="/deleteUser/{{$user->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="rd">Delete</button>
                </form></td>
            </tr>
            @endforeach
        </table>
    </div>
    @else
    <div class="noItemsDiv">
        <img src="/assets/searching.png" alt="">
        <h2 class="red">No registered users at the moment!</h2>
    </div>
    @endif
</div>
@endsection