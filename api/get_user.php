<?php

include_once '../db/db.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(['error' => 'Usuario no encontrado.']);
    }
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'ID no proporcionado.']);
}
?>
