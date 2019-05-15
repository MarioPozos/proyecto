    $(document).ready(function(){
        $('#nuevaUniverdidad').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"nuevaUni",
                data: $('#nuevaUniverdidad').serialize(),
                success:function(response){
                    var titulo = "<div class='alert alert-success'><i class='fas fa-check-circle mr-1'></i> ";
                    var msj = titulo+ response +"</div>";
                    $('#avisos').html(msj);
                    $(document).on("click",'.btnCerrar',function(){ 
                        $('#nuevaUniverdidad').trigger("reset");
                        var msj = "";
                        $('#avisos').html(msj);
                    });
                    /*console.log(response)
                    $('#nuevaUniversidadModal').modal('hide')
                    alert("Se agrego una nueva universidad ");*/
                    $('#universidad-table').DataTable().ajax.reload();
                    $('#nuevaUniverdidad').trigger("reset");
                },
                error:function(error){
                    var list="";
                    var errors=$.parseJSON(error. responseText);
                    var titulo = "<div class='alert alert-danger'><i class='fas fa-times-circle' mr-1></i> Revisa los siguiente errores:";
                    $.each(errors, function(index, value){
                        list += '<ul><li>' + value+'</li></ul>';
                    })
                    var msj = titulo+ list+"</div>";
                    $('#avisos').html(msj);
                    $(document).on("click",'.btnCerrar',function(){ 
                        $('#nuevaUniverdidad').trigger("reset");
                        var msj = "";
                        $('#avisos').html(msj);
                    });
                     
                    //console.log(error)
                    //alert("No se agrego una nueva universidad ");
                }
            });
        });  
        $('#editarUniverdidadId').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"editar",
                data: $('#editarUniverdidadId').serialize(),
                success:function(response){
                    /*console.log(response)
                    $('#editarUniversidadModal').modal('hide')
                    alert("Se modifico una universidad ");*/
                    var titulo = "<div class='alert alert-success'><i class='fas fa-check-circle mr-1'></i> ";
                    var msj = titulo+ response +"</div>";
                    $('#avisosEditar').html(msj);
                    $(document).on("click",'.btnCerrar',function(){ 
                                               var msj = "";
                        $('#avisosEditar').html(msj);
                    });
                    $('#universidad-table').DataTable().ajax.reload();
                },
                error:function(error){
                    var list="";
                    var errors=$.parseJSON(error. responseText);
                    var titulo = "<div class='alert alert-danger'><i class='fas fa-times-circle' mr-1></i> Revisa los siguiente errores:";
                    $.each(errors, function(index, value){
                        list += '<ul><li>' + value+'</li></ul>';
                    })
                    var msj = titulo+ list+"</div>";
                    $('#avisosEditar').html(msj);
                    $(document).on("click",'.btnCerrar',function(){ 
                        var msj = "";
                        $('#avisosEditar').html(msj);
                                               
                    });
                   /*  
                    console.log(error)
                    alert("No se modifico una universidad ");*/
                }
            });
        });  
     });
     
