@extends('layouts.master')

@section('header')

@section('content')

	@if (Session::get('success'))
		<p class="alert alert-success">{{ Session::get('success') }}</p>
	@endif

	<a href="/users/create" class="btn btn-default btn-success">Add New User</a>
	@if (count($users))
		<div class="panel panel-default">
			<div class="panel-heading">
				User List
			</div>

			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</thead>
				
					<tbody>
						@foreach($users as $user)
							<tr>
								<td>
									<div class="table-text">{{{ $user->id }}}</div>
								</td>
								<td>
									<div>{{{ $user->name }}}</div>
								</td>
								<td>
									<div> {{{ $user->email }}}</div>
								</td>
								<td>
									<a href="/users/{{ $user->id }}/edit"><span><i class="glyphicon glyphicon-pencil"></i></span></a>
									<a class="delete-user" href="/users/{{ $user->id }}" data-token="{{ csrf_token() }}"><span><i class="glyphicon glyphicon-remove"></i></span></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@endif
@endsection