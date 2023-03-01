@extends('navigation.users')

@section('head')
<h2>Feedback</h2>
<p>{{$date}}</p>
@endsection

@section('content')
@if($user->feedback->count() > 0)
<div class="feedbackDivs">
    @foreach($user->feedback as $feedback)
    <div class="feed">
        <span><b>Concern</b> <p>{{$feedback->concern}}</p></span>
        <span><b>Explaination</b><p>{{$feedback->explanation}}</p></span>
        <span><b>Feedback</b> <p>{{$feedback->reply}}</p></span>
    </div>
    @endforeach
</div>
@else
<div class="noItemsDiv">
    <img src="/assets/searching.png" alt="">
    <h2 class="red">No feedback from for you!</h2>
</div>
@endif
@endsection