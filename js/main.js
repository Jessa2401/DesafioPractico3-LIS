$(document).ready(function () {
    function cargarUsuarios() {
        $.ajax({
            url: 'api/get.php',  
            type: 'GET',
            success: function (data) {
                $('#usuariosContainer').html(data); 
            },
            error: function () {
                alert('Error al cargar los usuarios.');
            }
        });
    }


    $('#registroForm').submit(function (e) {
        e.preventDefault();  

        var formData = $(this).serialize();  

        $.ajax({
            url: 'api/insert.php',  
            type: 'POST',
            data: formData, 
            success: function (response) {
                alert('Usuario agregado exitosamente');  
                cargarUsuarios();  
                $('#registroForm')[0].reset();
            },
            error: function (xhr) {
               alert(xhr.responseText); 
            }
        });
    });


    $('#usuariosContainer').on('click', '.btnEditar', function () {
        var id = $(this).data('id');  
        
        // Aquí cargamos los datos del usuario para editarlos
        $.ajax({
            url: 'api/get_user.php',  // Debes crear este archivo para obtener los datos de un usuario específico
            type: 'GET',
            data: { id: id },
            success: function (data) {
                var user = JSON.parse(data);
                // Cargar los datos del usuario en el formulario de edición
                $('#editId').val(user.id);
                $('#editNombre').val(user.nombre);
                $('#editCorreo').val(user.correo);
                $('#editFecha').val(user.fecha_nacimiento);

                // Mostrar el modal de edición
                $('#modalEditar').modal('show');
            },
            error: function () {
                alert('Error al cargar los datos del usuario.');
            }
        });
    });

    $('#editarForm').submit(function (e) {
    e.preventDefault(); // Evita que recargue la página

    const formData = $(this).serialize();

    $.ajax({
        url: 'api/update.php',
        type: 'POST',
        data: formData,
        success: function (response) {
            $('#modalEditar').modal('hide');
            alert('Usuario actualizado correctamente');
            cargarUsuarios(); // vuelve a cargar la tabla
        },
        error: function () {
            alert('Error al actualizar el usuario');
        }
    });
});

    $('#usuariosContainer').on('click', '.btnEliminar', function () {
        var id = $(this).data('id');  
        
        if (confirm('¿Estás seguro de que quieres eliminar este usuario?')) {
            $.ajax({
                url: 'api/delete.php', 
                type: 'POST',
                data: { id: id },
                success: function (response) {
                    alert('Usuario eliminado con éxito');  
                    cargarUsuarios();  
                },
                error: function () {
                    alert('Error al eliminar el usuario.');
                }
            });
        }
    });

    cargarUsuarios();
});
