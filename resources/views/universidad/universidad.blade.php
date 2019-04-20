@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12">
    <a href="" class="btn btn-sm btn-succes pull-right">Nueva universidad</a>
    
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevaUniversidadModal">{{ __('Agregar') }}</button>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="table-responsive">
            <table id="universidad-table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">accion</th>
                </tr>
            </thead>
            <tbody>
            
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    
                </tr>
            </tfoot>
        </table>
    
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
    $('#universidad-table').DataTable( {
        
        
        processing: true,
        serverSide: true,
        ajax:"{{route('datosUni')}}",
        columns: [
            { data: "id", name:"id" },
            { data: "nombre", name:"nombre"},
            { data: null, render: function(data, type,row){
                return "<a href='{{route('datosUni')}}/" + data.id +"'class='btn btn-sm btn-primary'> Editar</a> "   
                }
            }
        ],
        "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast":"Último",
                        "sNext":"Siguiente",
                        "sPrevious": "Anterior"
                     },
                     "sProcessing":"Procesando...",
                }
    } );
    
    } );
	</script>
@endsection