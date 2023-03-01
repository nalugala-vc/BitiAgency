@extends('navigation.admin')

@section('head')
<h1>Pending User Reachouts</h1>
<p>{{$date}}</p>
@endsection

@section('linkwords')
<a href="/viewRepliedFeedback">
    view replied feedback
</a>
@endsection

@section('content')
<div class="viewUsersTable">
    @if($feedback->count()> 0)
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Concern</th>
            <th>Explanation</th>
            <th>Reply</th>
            <th>Action</th>
        </tr>
        @foreach($feedback as $feedback)
        <tr>
            <td>{{$feedback->id}}</td>
            <td>{{$feedback->name}}</td>
            <td>{{$feedback->concern}}</td>
            <td id="ex">{{$feedback->explanation}}</td>
            <td>{{$feedback->reply}}</td>
            <td><a href="/replyFeedback/{{$feedback->id}}"><button id="gr">Reply</button></a></td>
        </tr>
        @endforeach
    </table>
    @else
    <div class="noItemsDiv">
        <img src="/assets/searching.png" alt="">
        <h2 class="red">No user reachouts at the moment!</h2>
    </div>
    @endif
</div>
@endsection