<?php
$servername = "localhost";
$username = "root"; 
$password = "";  
$dbname = "registro_usuarios"; 

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
