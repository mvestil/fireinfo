@extends('layouts.master')

@section('content')

	@include('common.errors')

	@if (Session::get('success'))
		<p class="alert alert-success">{{ Session::get('success') }}</p>
	@endif

	<div class="panel panel-default">
		<div class="panel-heading">
			Update User
		</div>

		<div class="panel-body">
			<form action="/users/{{ $user->id }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label for="name">Name</label>
					<input class="form-control" type="text" name="name" value="{{{ $user->name }}}">
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input class="form-control" type="text" name="email" value="{{{ $user->email }}}" readonly="readonly">
				</div>

				<div class="form-group">
					<label for="password">Current Password</label>
					<input class="form-control" type="password" name="current_password">
				</div>

				<div class="form-group">
					<label for="new_password">New Password</label>
					<input class="form-control" type="password" name="new_password">
				</div>

				<div class="form-group">
					<label for="confirm_password">Confirm New Password</label>
					<input class="form-control" type="password" name="confirm_password">
				</div>

				<button type="submit" class="btn btn-success">Update User</button>

			</form>
		</div>
	</div>
@endsection