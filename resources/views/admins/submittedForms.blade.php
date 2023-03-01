@extends('navigation.admin')

@section('head')
<h1>Submitted Forms</h1>
<p>{{$date}}</p>
@endsection

@section('content')
<div class="viewUsersTable att submitted">
    @if($submitted_forms->count()> 0)
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Form Name</th>
                <th>Form</th>
                <th>View Form</th>
            </tr>
            @foreach($submitted_forms as $form)
            <tr>
                <td>{{$form->id}}</td>
                <td>{{$form->user->name}}</td>
                <td>{{$form->form->name}}</td>
                <td>{{$form->form_file}}</td>
                <td><a href="/viewSubmittedForm/{{$form->id}}">view form</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    @else
    <div class="noItemsDiv">
        <img src="/assets/searching.png" alt="">
        <h2 class="red">No submitted forms at the moment!</h2>
    </div>
    @endif
</div>
@endsection