@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row mb-2">
        <div class="col-lg-12 d-flex justify-content-end align-items-center">
        <label class=" mr-2">Nueva universidad </label>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevaUniversidadModal"><i class="fas fa-plus"></i>{{ __(' Agregar') }}</button>
        </div>
    </div>
    <div class="row ">
        <div class="table-responsive">
            <table id="universidad-table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th data-orderable="false">Acción</th>
                </tr>
            </thead>
            <tbody>
            
            </tbody>
            <tfoot>
                
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
            { data: null,render: function(data,type,row){
                return "<div class='d-flex justify-content-around'><a href='#'class='btn btn-sm btn-primary editarbtn' id='"+data.id+"'><i class='fas fa-pen'></i> Editar</a><a href='#'class='btn btn-sm btn-danger borrarbtn' id='"+data.id+"'><i class='fas fa-trash-alt'></i> Borrar</a></div>"
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
                },
    });
    
    } );
    </script> 
    <script type="text/javascript">
	/*$(document).on('click','.editarbtn',  function(){
        $('#editarUniversidadModal').modal('show');
        $tr = $(this).closest('tr');
        var data= $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        $('#id').val(data[0]);
        $('#nombre').val(data[1]);
    } );*/
    $(document).on('click','.editarbtn',  function(){
        
        var id = $(this).attr("id");
        $.ajax({
            url:"{{route('editarUni')}}",
            method:'GET',
            data:{id:id},
            dataType:'json',
            success: function(data){
                $('#universidad').val(data.nombre);
                $('#uni_id').val(id);
                $('#editarUniversidadModal').modal('show');
            }
        })
    } ); 
    $(document).on('click','.borrarbtn',  function(){
        var id = $(this).attr("id");
        if(confirm("¿Estás seguro que quieres eliminar esta universidad")){
            $.ajax({
            url:"{{route('borrarUni')}}",
            method:'GET',
            data:{id:id},
            success: function(data){
                alert(data);
                $('#universidad-table').DataTable().ajax.reload();
            }
            })
        }else{
            return false;
        }
        
    } );
    $(document).on("click",'.btnCerrar',function(){ 
        $('#nuevaUniverdidad').trigger("reset");
   });
	</script>
@endsection