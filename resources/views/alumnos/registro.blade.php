@extends('layouts.app')

@section('content')

<h3>Formulario para registrar un nuevo alumno </h3>

@if(!is_null($lista))
    @foreach($lista as $alumno)
    {{$alumno->nombre}} - {{$alumno->app}} - {{$alumno->apm}}  <br>
    {{$alumno->tel}} - {{$alumno->correo}} - {{$alumno->curp}}  <br>
    {{$alumno->inicio}} - {{$alumno->termino}} - {{$alumno->codigo}}<br>
    {{$alumno->uni}} - {{$alumno->facu}} - {{$alumno->carrera}} - {{$alumno->matri}}  <br>
    {{$alumno->periodo}} - {{$alumno->genera}} - {{$alumno->folio}}<br>
    {{$alumno->documen}} - {{$alumno->activida}} - {{$alumno->comuni}}<br>
    @endforeach
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">        
            <div class="card">
                <div class="card-header">{{ __('Registro de nuevo alumno') }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>  
                    @endif
                    <form method="POST" action="{{ route('alumnoDatos') }}">
                    @csrf
                    <h4>Datos personales</h4>
                        <hr>
                        <div class="form-group row">
                            <div class="col-md-4">
                            <label for="nombre" class=" col-form-label text-md-right">{{ __('Nombre(s)') }}</label>
                            <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : ''}}" name="nombre" value="{{ old('nombre') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                            <div class="col-md-4">
                            <label for="app" class=" col-form-label text-md-right">{{ __('Apellido Patermo') }}</label>
                            <input id="app" type="text" class="form-control{{ $errors->has('app') ? ' is-invalid' : ''}}" name="app" value="{{ old('app') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                            <div class="col-md-4">
                            <label for="apm" class=" col-form-label text-md-right">{{ __('Apellido Materno') }}</label>
                            <input id="apm" type="text" class="form-control{{ $errors->has('apm') ? ' is-invalid' : ''}}" name="apm" value="{{ old('apm') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                            <label for="tel" class=" col-form-label text-md-right">{{ __('Teléfono') }}</label>
                            <input id="tel" type="text" class="form-control{{ $errors->has('tel') ? ' is-invalid' : ''}}" name="tel" value="{{ old('tel') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                            <div class="col-md-4">
                            <label for="correo" class=" col-form-label text-md-right">{{ __('Correo') }}</label>
                            <input id="correo" type="text" class="form-control{{ $errors->has('correo') ? ' is-invalid' : ''}}" name="correo" value="{{ old('correo') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                            <div class="col-md-4">
                            <label for="curp" class=" col-form-label text-md-right">{{ __('Curp') }}</label>
                            <input id="curp" type="text" class="form-control{{ $errors->has('curp') ? ' is-invalid' : ''}}" name="curp" value="{{ old('curp') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                            <label for="inicio" class=" col-form-label text-md-right">{{ __('Fecha de Inicio') }}</label>
                            <input id="inicio" type="text" class="form-control{{ $errors->has('inicio') ? ' is-invalid' : ''}}" name="inicio" value="{{ old('inicio') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                            <div class="col-md-4">
                            <label for="termino" class=" col-form-label text-md-right">{{ __('Fecha de Termino') }}</label>
                            <input id="termino" type="text" class="form-control{{ $errors->has('termino') ? ' is-invalid' : ''}}" name="termino" value="{{ old('termino') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                            <div class="col-md-4">
                            <label for="codigo" class=" col-form-label text-md-right">{{ __('Código Joven') }}</label>
                            <input id="codigo" type="text" class="form-control{{ $errors->has('codigo') ? ' is-invalid' : ''}}" name="codigo" value="{{ old('codigo') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                        </div>
                        <hr>
                        <h4>Datos Escolares </h4>
                        <div class="form-group row">
                            <div class="col-md-3">
                            <label for="uni" class=" col-form-label text-md-right">{{ __('Universidad') }}</label>
                            <input id="uni" type="text" class="form-control{{ $errors->has('uni') ? ' is-invalid' : ''}}" name="uni" value="{{ old('uni') }}" required autofocus>
                            <a class="float-right mt-1" data-toggle="modal" data-target="#exampleModal2"><button type="button" class="btn btn-primary">{{ __('Agregar') }}</button></a>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                            <div class="col-md-3">
                            <label for="facu" class=" col-form-label text-md-right">{{ __('Facultad') }}</label>
                            <input id="facu" type="text" class="form-control{{ $errors->has('facu') ? ' is-invalid' : ''}}" name="facu" value="{{ old('facu') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                            <div class="col-md-3">
                            <label for="carrera" class=" col-form-label text-md-right">{{ __('Carrera') }}</label>
                            <input id="carrera" type="text" class="form-control{{ $errors->has('carrera') ? ' is-invalid' : ''}}" name="carrera" value="{{ old('carrera') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                            <div class="col-md-3">
                            <label for="matri" class=" col-form-label text-md-right">{{ __('Matricula') }}</label>
                            <input id="matri" type="text" class="form-control{{ $errors->has('matri') ? ' is-invalid' : ''}}" name="matri" value="{{ old('matri') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                        </div>
                        <hr>
                        <h4>Datos adicionales </h4>
                        <div class="form-group row">
                            <div class="col-md-4">
                            <label for="periodo" class=" col-form-label text-md-right">{{ __('Periodo') }}</label>
                            <input id="periodo" type="text" class="form-control{{ $errors->has('periodo') ? ' is-invalid' : ''}}" name="periodo" value="{{ old('periodo') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                            <div class="col-md-4">
                            <label for="genera" class=" col-form-label text-md-right">{{ __('Generación') }}</label>
                            <input id="genera" type="text" class="form-control{{ $errors->has('genera') ? ' is-invalid' : ''}}" name="genera" value="{{ old('genera') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                            <div class="col-md-4">
                            <label for="folio" class=" col-form-label text-md-right">{{ __('Numero de folio') }}</label>
                            <input id="folio" type="text" class="form-control{{ $errors->has('folio') ? ' is-invalid' : ''}}" name="folio" value="{{ old('folio') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                            <label for="documen" class=" col-form-label text-md-right">{{ __('Documentos') }}</label>
                            <input id="documen" type="text" class="form-control{{ $errors->has('documen') ? ' is-invalid' : ''}}" name="documen" value="{{ old('documen') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                            <div class="col-md-4">
                            <label for="activida" class=" col-form-label text-md-right">{{ __('Actividad') }}</label>
                            <input id="activida" type="text" class="form-control{{ $errors->has('activida') ? ' is-invalid' : ''}}" name="activida" value="{{ old('activida') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                            <div class="col-md-4">
                            <label for="comuni" class=" col-form-label text-md-right">{{ __('Comunidad') }}</label>
                            <input id="comuni" type="text" class="form-control{{ $errors->has('comuni') ? ' is-invalid' : ''}}" name="comuni" value="{{ old('comuni') }}" required autofocus>
                            <!--
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif-->
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Siguiente') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection