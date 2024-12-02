<?php
require_once('../conexion.php');
require_once('../libro.php');

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    if (Libro::eliminar($conexion, $data->id)) {
        echo json_encode(["message" => "Libro eliminado correctamente."]);
    } else {
        echo json_encode(["message" => "Error al eliminar el libro."]);
    }
} else {
    echo json_encode(["message" => "Datos incompletos."]);
}
?>