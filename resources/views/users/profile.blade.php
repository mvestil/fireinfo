@extends('layouts.master')

@section('title', 'User Profile')

@section('content')
	<h1>{{{ $user->name }}}</h1>
	<h4>Email : {{{ $user->email }}}</h4>
@endsection

