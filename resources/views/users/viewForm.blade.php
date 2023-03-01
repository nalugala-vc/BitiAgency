@extends('navigation.users')

@section('head')
<h2>{{$form->name}}</h2>
<p>{{$date}}</p>
@endsection

@section('content')
<div class="viewUsersTable">
<embed
	src="/assets/{{$form->form_file}}"
	type="application/pdf"
	width="100%"
	height="100%"
/>
</div>
@endsection