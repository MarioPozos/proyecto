    $(document).ready(function(){
        $('#nuevaUniverdidad').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:"nuevaUni",
                data: $('#nuevaUniverdidad').serialize(),
                success:function(response){
                    console.log(response)
                    $('#nuevaUniversidadModal').modal('hide')
                    alert("Se agrego una nueva universidad ");
                    $('#universidad-table').DataTable().ajax.reload();
                },
                error:function(error){
                    console.log(error)
                    alert("No se agrego una nueva universidad ");
                }
            });
        });  
     });