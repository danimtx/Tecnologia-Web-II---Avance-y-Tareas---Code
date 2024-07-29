<?php
try {
    function conectar(){
        $conn = mysqli_connect("localhost","danimtx","0000","tw2");
        if(!$conn){
            echo "Error en la copnexion " . mysqli_connect_error();
        }
        else{
            echo "conexion exitosa";
        }
        return $conn;
    }
} catch (e) {
    
}