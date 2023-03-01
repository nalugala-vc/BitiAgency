@extends('navigation.admin')

@section('head')
<h1>{{$form->form->name}}</h1>
<p>{{$form->user->name}}</p>
@endsection

@section('content')
<embed
	src="/assets/{{$form->form_file}}"
	type="application/pdf"
	width="100%"
	height="100%"
/>
@endsection