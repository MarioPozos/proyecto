<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Extensionismo' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@extends('ayuda')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
            @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ 'Extensionismo'}}
                </a>
            @else
                <a class="navbar-brand" href="{{ url('vista') }}">
                    {{ 'Extensionismo'}}
                </a>
            @endguest
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
                        <!--guest te ayuda a saber si estas autenticado -->
                        @guest
                            <!--<li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>--> <!--
                            @if (Route::has('register'))
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif-->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">{{ __('Ayuda') }}</a>
                            </li>
                        @else
                            @yield('nav')
                            @switch(Auth::user()->tipo)
                                @case(1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('registro') }}">{{ __('Registrar') }}</a>
                                </li>
                                    @break
                                @case(2)
                                    <!--<li class="nav-item">
                                    <a class="nav-link" href="{{ route('alumno.index') }}">{{ __('Registrar Alumno') }}</a>-->
                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Alumno
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('alumno.index') }}">{{ __('Lista de Alumnos') }}</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('alumno.create') }}">{{__('Registro de Alumnos')}}</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                    </li>
                                    @break
                                @case(3)
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('alumno.create') }}">{{ __('Registrar Alumno') }}</a>
                                    </li>
                                    @break
                                @default
                                    @break
                            @endswitch
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">{{ __('Ayuda') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>
</body>
</html>
