@extends('layouts.app')

@section('nav')

<li class="nav-item">
    <a class="nav-link" href="{{ route('alumno') }}">{{ __('Registrar') }}</a>
</li>
@endsection('nav')
@section('content')
<h1>Bienvenido administrador de tipo 2</h1>
@endsection
