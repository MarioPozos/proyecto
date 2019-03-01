@extends('layouts.app')
@section('nav')
<li class="nav-item">
    <a class="nav-link" href="{{ route('registro') }}">{{ __('Registrar') }}</a>
</li>
@endsection
@section('content')
<h1>Bienvenido administrador de tipo 1</h1>
@endsection
