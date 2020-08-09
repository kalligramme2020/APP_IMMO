<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'rental') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/event.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/local.css') }}" rel="stylesheet">
</head>
<body>


<div id="app">
    <nav class="navbar navbar-expand-md shadow-sm " style="background-color: #336699">

        <div class="logo">
            <h4>Logo</h4>
        </div>
        <div class="container col-md-11">

            <button type="button" id="sidebarCollapse" class="navbar-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-link text-white"> <i class="fas fa-bell fa-lg"></i> </li>
                        <li class="nav-item dropdown text-white">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <i class="fa fa-caret-down" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('user.index')}}"> <i class="fas fa-id-card fa-sm"></i> Mon profil</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item bg-danger text-white" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt fa-sm"></i>
                                    Deconexion
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


        <div class="wrapper ">
            <!-- Sidebar Holder -->
            @if(\Illuminate\Support\Facades\Auth::check())
            <nav id="sidebar">
                <div class="sidebar-header">
                </div>
                <ul class="list-unstyled components">
                    <li><a href="{{route('home')}}"> <i class="fas fa-desktop fa-lg"></i>   Dashbord</a></li>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-home fa-lg"></i> Bien</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="{{route('house.index')}}"> bien</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{route('rental.index')}}"><i class="fas fa-key fa-lg"></i> location</a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-user-plus fa-lg"></i> locataire</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="{{route('tenant.index')}}">lacataire</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{route('payment.index')}}"> <i class="fa fa-eur fa-lg" aria-hidden="true"></i> finances</a>
                    </li>

                    <li>
                        <a href="{{route('state.index')}}"> <i class="fa fa-file-image-o" aria-hidden="true"></i> Etat des lieux</a>
                    </li>

                </ul>

            </nav>
            @endif
            @yield('content')
        </div>
</div>

<script src="//code.jquery.com/jquery.js"></script>
@include('flashy::message')
</body>
</html>
