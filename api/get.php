<?php
include_once '../db/db.php';

$sql = "SELECT * FROM usuarios ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table table-bordered table-striped">';
    echo '<thead><tr><th>Nombre</th><th>Correo</th><th>Fecha Nac.</th><th>Acciones</th></tr></thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['nombre']) . '</td>';
        echo '<td>' . htmlspecialchars($row['correo']) . '</td>';
        echo '<td>' . htmlspecialchars($row['fecha_nacimiento']) . '</td>';
        echo '<td>
                <button class="btn btn-sm btn-warning btnEditar" data-id="'.$row['id'].'">Editar</button>
                <button class="btn btn-sm btn-danger btnEliminar" data-id="'.$row['id'].'">Eliminar</button>
              </td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
} else {
    echo '<div class="alert alert-info text-center">Aún no hay usuarios registrados.</div>';
}

$conn->close();