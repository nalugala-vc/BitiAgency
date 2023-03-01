@extends('navigation.users')

@section('head')
<h2>Forms</h2>
<p>{{$date}}</p>
@endsection

@section('content')
<div class="viewUsersTable att submitted">
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Form Name</th>
                <th>Form</th>
                <th>View Form</th>
                <th>Download Form</th>
                <th>Submit Form</th>
            </tr>
            @foreach($forms as $form)
            <tr>
                <td>{{$form->id}}</td>
                <td>{{$form->name}}</td>
                <td>{{$form->form_file}}</td>
                <td><a href="/viewSpecifiedForm/{{$form->id}}">view form</a></td>
                <td><a href="/viewSubmitForm/{{$form->id}}">submit form</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection