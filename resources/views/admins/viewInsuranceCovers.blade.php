@extends('navigation.admin')

@section('head')
<h1>View Insurance Covers</h1>
<p>{{$date}}</p>
@endsection

@section('linkwords')
<a href="/addInsuranceCover">
    add insurance cover
</a>
@endsection

@section('content')
@if (session('application'))
    <div class="alert alert-success">
        {{ session('application') }}
    </div>
@endif
<div class="viewUsersTable">
    @if($covers->count() > 0)
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($covers as $cover)
            <tr>
                <td>{{$cover->id}}</td>
                <td>{{$cover->name}}</td>
                <td>{{$cover->price}}</td>
                <td><a href="/editInsuranceCover/{{$cover->id}}"><button id="gr">Edit</button></a></td>
            </tr>
            @endforeach
        </table>
    </div>
    @else
    <div class="noItemsDiv">
        <img src="/assets/searching.png" alt="">
        <h2 class="red">No insurance covers added at the moment!</h2>
    </div>
    @endif
</div>
@endsection