<?php
include_once '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id = isset($_POST['id']) ? $_POST['id'] : null;
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$fecha = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : '';


    if ($id && $nombre && $correo && $fecha) {
        $sql = "UPDATE usuarios SET nombre=?, correo=?, fecha_nacimiento=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $nombre, $correo, $fecha, $id);
        if ($stmt->execute()) {
            echo 'ok';
        } else {
            http_response_code(500);
            echo 'Error al actualizar';
        }
        $stmt->close();
    } else {
        http_response_code(400);
        echo 'Datos incompletos';
    }

    $conn->close();
}
