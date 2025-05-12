<?php
include_once '../db/db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Consulta para eliminar el usuario
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Usuario eliminado correctamente.";
    } else {
        echo "Error al eliminar el usuario.";
    }

    $stmt->close();
    $conn->close();
}
?>