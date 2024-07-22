<?php
/*
$nombre = $_GET['nombre'];
$monto = $_GET['cantidad'];
$edad = $_GET['edad'];
$iva = $_GET['iva'];

function ConIva(int $monto):float{
    $monto_iva = $monto + ($monto * 0.13);
    return $monto_iva;   
}

function SinIva(int $monto):float{
    $monto_iva = $monto - ($monto * 0.13);
    return $monto_iva;
}

try {
    echo "Resultado : " . ($iva == 'true')? (ConIva($monto)) : (SinIva($monto));
} catch (TypeError $e ) {
    echo "Error " . $e -> getMessage();
}
*/

//segundo ejercicio
//array de notas y calcular el promedio de 10 estudiantes
function promedio(int | float ...$notas):int|float{
    $suma = 0;
    foreach ($notas as $nota) {
        $suma += $nota;
    }
    return $suma / count($notas);
    //yield $suma;
    //yield $nota;
}

echo promedio(45,56.5,34,22.8,69);