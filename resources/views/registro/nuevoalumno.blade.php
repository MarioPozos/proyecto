@extends('layouts.app')
@section('nav')
<li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">{{ __('Ayudita') }}</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('alumno') }}">{{ __('Registrar') }}</a>
</li>
@endsection('nav')
@section('content')
<h1>Formulario</h1>
@endsection