<?php

class Libro {
    public $conexion;
    public $titulo, $autor, $anioPublicacion;

    public function __construct($conexion, $titulo = null, $autor = null, $anioPublicacion = null) {
        $this->conexion = $conexion;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anioPublicacion = $anioPublicacion;
    }

    // Registrar un libro
    public function registrar() {
        $sql = "INSERT INTO libros (titulo, autor, anio_publicacion) VALUES ('$this->titulo', '$this->autor', $this->anioPublicacion)";
        return mysqli_query($this->conexion, $sql);
    }

    // Obtener todos los libros
    public static function obtenerTodos($conexion) {
        $sql = "SELECT * FROM libros";
        return mysqli_query($conexion, $sql);
    }

    // Actualizar un libro
    public function actualizar($id) {
        $sql = "UPDATE libros SET titulo='$this->titulo', autor='$this->autor', anio_publicacion=$this->anioPublicacion WHERE id=$id";
        return mysqli_query($this->conexion, $sql);
    }

    // Eliminar un libro
    public static function eliminar($conexion, $id) {
        $sql = "DELETE FROM libros WHERE id=$id";
        return mysqli_query($conexion, $sql);
    }
}
?>