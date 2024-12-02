<?php
require_once('../conexion.php');
require_once('../libro.php');

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id) && !empty($data->titulo) && !empty($data->autor) && !empty($data->anioPublicacion)) {
    $libro = new Libro($conexion, $data->titulo, $data->autor, $data->anioPublicacion);

    if ($libro->actualizar($data->id)) {
        echo json_encode(["message" => "Libro actualizado correctamente."]);
    } else {
        echo json_encode(["message" => "Error al actualizar el libro."]);
    }
} else {
    echo json_encode(["message" => "Datos incompletos."]);
}
?>