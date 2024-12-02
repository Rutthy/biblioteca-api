<?php
require_once('../conexion.php');
require_once('../libro.php');

$resultado = Libro::obtenerTodos($conexion);

if (mysqli_num_rows($resultado) > 0) {
    $libros = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $libros[] = $fila;
    }
    echo json_encode($libros);
} else {
    echo json_encode(["message" => "No se encontraron libros."]);
}
?>