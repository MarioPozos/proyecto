<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Extensionismo' }}</title>        
    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('extras/font/css/open-iconic-bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link href="{{ asset('extras/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <!-- DataTables css  --> 
    <link href="{{ asset('extras/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>
<body>
@extends('ayuda')
@extends('universidad.nuevaUniversidad')
@extends('universidad.editarUniversidad')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
            @guest
                <img src="{{ asset('extras/img/BUAP.png') }}" alt="BUAP" class="mr-1" >
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ ' Extensionismo'}}
                </a>
            @else
            <img src="{{ asset('extras/img/BUAP.png') }}" alt="BUAP" class="mr-1" >
                <a class="navbar-brand" href="{{ url('vista') }}">
                    {{ ' Extensionismo'}}
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
                                <a data-toggle="modal" data-target="#exampleModal"><i class="fas fa-info-circle"></i>{{ __(' Ayuda') }}</a>
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
                                    Convenio
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('universidad') }}">{{ __('Lista de Universidades') }}</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('universidad') }}">{{__('Lista de Facultades')}}</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                    </li>
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
                                <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-info-circle"></i>{{ __(' Ayuda') }}</a>
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
    <!-- Scripts Jquery-->
    <script src="{{ asset('extras/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- Scripts Datatables-->
    <script src="{{ asset('extras/datatables/dataTables.js') }}"></script>
    <script src="{{ asset('extras/datatables/DataTables-1.10.18/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('extras/datatables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('extras/jquery/mijs.js') }}"></script>
    <!-- Scripts Bootstrap-->    
    <script src="{{ asset('extras/popper/popper.min.js') }}"></script>
    <script src="{{ asset('extras/bootstrap/js/bootstrap.js') }}"></script>
    @yield('scripts')
    
</body>
</html>
