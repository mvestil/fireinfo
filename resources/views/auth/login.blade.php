@extends('layouts.master')

@section('header')
@stop

@section('content')

    @include('common.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Login Form
        </div>
        <div class="panel-body">
            <form method="POST" action="/auth/login">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>

                <div class="checkbox">
                    <label>
                        <input class="" type="checkbox" name="remember"> Remember Me
                    </label>
                </div>

                <button class="btn btn-primary btn-lg" type="submit">Login</button>

            </form>
        </div>
    </div>
    

@endsection