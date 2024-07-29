<?php
require('includes/conexion.php');
$archivo = fopen("datos.csv", "r");
$i = 0;
$bandera = true;
$conn=conectar();
while (!feof($archivo)) {
    $data = fgetcsv($archivo);
    if ($bandera) {
        $bandera= false;
        continue;
    }
    $sql = "insert into preguntas (descripcion, nombre, pais, acierto, estado) values ('".$data[1]."',
    '".$data[2]."','".$data[3]."',".$data[4].", '".$data[5]."')";
    $r = mysqli_query($conn, $sql);
    echo ($r)?"Insertado correctamente ":"error al insertar ";
    $i++;
}
fclose($archivo);
?>