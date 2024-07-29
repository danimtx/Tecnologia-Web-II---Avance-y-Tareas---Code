<?php
require("includes/conexion.php");
function insertar($nombre, $apellido, $telefono) {
    $conn = conectar();
    $sql = "insert into usuario (nombre, apellido, telefono) values ( '" . $nombre . "', '" . $apellido . "', ". $telefono . ");";
    mysqli_query($conn, $sql);
}

function listar() {
    $conn = conectar();
    $sql = "SELECT * FROM usuario";
    $result = $conn->query($sql);
    $datos = [];
    
    while ($row = $result->fetch_assoc()) {
        $datos[] = $row;
    }

    $conn->close();
    return $datos;
}