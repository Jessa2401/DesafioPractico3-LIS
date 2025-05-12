<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>UDB</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="text-center mb-4">Registrando Usuarios de la UDB</h2>

    <div class="card shadow">
        <div class="card-body">
            <form id="registroForm" method="POST"> 
                <div class="row g-3">
                    <div class="col-md-6">
                        <label>Nombre completo</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="col-md-6">
                        <label>Correo electrónico</label>
                        <input type="email" class="form-control" name="correo" required>
                    </div>
                    <div class="col-md-6">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="password" required minlength="6">
                    </div>
                    <div class="col-md-6">
                        <label>Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" required>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>
            </form>
        </div>
    </div>

    <h4 id="tituloUsuarios" class="mt-5 mb-3">Usuarios Registrados</h4>
    <div id="usuariosContainer"></div>





    <!-- Modal para editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editarForm">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="id" id="editId">
                <div class="mb-3">
                    <label for="editNombre" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" name="nombre" id="editNombre" required>
                </div>
                <div class="mb-3">
                    <label for="editCorreo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" name="correo" id="editCorreo" required>
                </div>
                <div class="mb-3">
                    <label for="editFecha" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" id="editFecha" required>
                </div>
                </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Guardar cambios</button>
                        </div>
            </div>
            </form>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="js/main.js"></script>


</body>
</html>