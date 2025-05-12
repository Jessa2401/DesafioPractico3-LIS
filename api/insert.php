<?php
include_once '../db/db.php';

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$password = isset($_POST['password']) ? $_POST['password'] :'';
$fecha_nacimiento = isset($_POST['fecha_nacimiento'] )?$_POST['fecha_nacimiento']:'';

// Evitar inserción si hay campos vacíos
if (empty($nombre) || empty($correo) || empty($password) || empty($fecha_nacimiento)) {
    http_response_code(400);
    echo "Todos los campos son obligatorios.";
    exit;
}

// Validar si ya existe ese correo o nombre
$check = $conn->prepare("SELECT id FROM usuarios WHERE correo = ? OR nombre = ?");
$check->bind_param("ss", $correo, $nombre);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    http_response_code(409); // 409 Conflict
    echo "Usuario no registrado porque correo o nombre ya existe";
    exit;
}

// Insertar nuevo usuario
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, password, fecha_nacimiento) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $correo, $password, $fecha_nacimiento);

if ($stmt->execute()) {
    echo "Usuario registrado correctamente";
} else {
    http_response_code(500);
    echo "Error interno al registrar el usuario";
}

$conn->close();