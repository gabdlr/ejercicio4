//Crear o modificar un registro
$(document).ready(function() {
$('#guardar-registro').on('submit', function(e) {
        e.preventDefault();

        var datos = $(this).serializeArray();
        console.log(datos);
        
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                var resultado = (data);
                if (resultado.respuesta == 'exito') {
                    Swal({
                        title: 'Exito',
                        text: 'Los datos se han guardado correctamente!',
                        type: 'success'
                    });                
                } else {
                    swal({
                        type: 'error',
                        title: 'Error!',
                        text: 'Hubo un error!'
                    })
                }
            }
        });       
    })

//Eliminar un registro    
$('.borrar-registro').on('click', function(e) {
    e.preventDefault();

    var id = $(this).attr('data-id');

    swal({
        title: 'Estas seguro?',
        text: "Este cambio no se puede revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar'
        }).then((result) =>   {                     
            if (result.value) {$.ajax({
                    type: 'post',
                    data: {
                        id : id,
                        registro : 'eliminar'
                    },
                    url: 'model.php',
                    success: function(data) {
                        let resultado = JSON.parse(data);
                        jQuery('[data-id="'+ resultado.id +'"]').parents('tr').remove();
                        swal({
                            title: 'Eliminado!',
                            text:'El registro ha sido eliminado.',
                            type: 'success'
                        });
                    }
                
                })//Ajax 
            };
        });//.then sweet alert                       
    });//Borrar registro  
})//Document Ready

