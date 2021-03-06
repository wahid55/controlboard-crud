<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">{{ __('Dashboard') }}</a></li>
                    <li class="nav-item"><a href="{{ route('roles.index') }}" class="nav-link">{{ __('Roles') }}</a></li>
                    <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">{{ __('Users') }}</a></li>
                    <li class="nav-item"><a href="{{ route('departments.index') }}" class="nav-link">{{ __('Departments') }}</a></li>
                    <li class="nav-item"><a href="{{ route('programs.index') }}" class="nav-link">{{ __('Programs') }}</a></li>
                    <li class="nav-item"><a href="{{ route('courses.index') }}" class="nav-link">{{ __('Courses') }}</a></li>
                    <li class="nav-item"><a href="{{ route('students.index') }}" class="nav-link">{{ __('Students') }}</a></li>
                    <li class="nav-item"><a href="{{ route('faculties.index') }}" class="nav-link">{{ __('Faculties') }}</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('status'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</div>


<form id="deleteForm" action="/" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>


<script>
    window.addEventListener('load', function() {
        $('.delete').click(function (e) {
            e.preventDefault();
            $('#deleteForm').attr('action', $(this).attr('href')).submit();
        });
    });
</script>
</body>
</html>
