<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        
        <title>@yield('title')</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ elixir('css/styles.css') }}">
        @section('pagecss')
            <!-- Custom page css here -->
        @show
    </head>
    <body>

        <header>
            @section('header')
                <div class="navbar navbar-default">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::check())
                                <li><a href="#">Hello {{ Auth::user()->name }}</a></li>
                            @endif
                            
                            <li><a href="{{ url('auth/logout') }}">Logout</a></li>
                        </ul>
                    </div>
                    
                </div>
            @show
        </header>

        <div class="container">
            @yield('content')
        </div>

        
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="{{ elixir('js/scripts.js') }}"></script>
    </body>
</html>