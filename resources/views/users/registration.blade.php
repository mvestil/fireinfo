@extends('layouts.master')

@section('title', 'Registration')

@section('sidebar')
	@parent
@endsection

@section('content')
	
	@include('common.errors')

	@if (Session::get('success'))
		<p class="alert alert-success">{{ Session::get('success') }}</p>
	@endif
	
	<div class="row">
	    <div class="col-sm-8 col-sm-offset-2">
	        
	        <div class="page-header">
	            <h1><span class="glyphicon glyphicon-flash"></span> Ducks Fly!</h1>
	        </div>    

	        <!-- FORM STARTS HERE -->
	        <form method="POST" action="/users" novalidate>
				{{ csrf_field() }}
	            <div class="form-group">
	                <label for="name">Name</label>
	                <input type="text" id="name" class="form-control" name="name" placeholder="Somebody Important" value="{{ old('name') }}">
	            </div>

	            <div class="form-group">
	                <label for="email">Email</label>
	                <input type="email" id="email" class="form-control" name="email" placeholder="super@cool.com">
	            </div>

	            <div class="form-group">
	                <label for="password">Password</label>
	                <input type="password" id="password" class="form-control" name="password">
	            </div>

	            <div class="form-group">
	                <label for="password_confirm">Confirm Password</label>
	                <input type="password" id="password_confirm" class="form-control" name="password_confirm">
	            </div>

	            <button type="submit" class="btn btn-success">Go Ducks Go!</button>

	        </form>

	    </div>
	</div>
@endsection



