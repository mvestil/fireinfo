@extends('layouts.master')

@section('title', 'Registration')

@section('header')
@stop

@section('content')
    @include('common.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Registration
        </div>

        <div class="panel-body">

            <form method="POST" action="/auth/register">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                </div>

                 <div class="form-group">
                    <label for="password">Pasword</label>
                    <input class="form-control" type="password" name="password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input class="form-control" type="password" name="password_confirmation">
                </div>

                <div>
                    <button class="btn btn-primary btn-lg" type="submit">Register</button>
                </div>
            </form>

        </div>
    </div>
@endsection