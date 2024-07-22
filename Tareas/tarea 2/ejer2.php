<?php
$fecha_actual = new DateTime();
$fecha_actual_str = $fecha_actual->format("Y-m-d");
$fecha_hoy = strtotime($fecha_actual_str);
$fecha_maxima = strtotime("+2 months", $fecha_hoy);

$fechas_aleatorias = [];
for ($i = 0; $i < 20; $i++) {
    $fecha_aleatoria_timestamp = mt_rand($fecha_hoy, $fecha_maxima);
    $fecha_aleatoria = date("Y-m-d", $fecha_aleatoria_timestamp);
    $fechas_aleatorias[$i] = $fecha_aleatoria;
}
echo "Se considera que no se van a vender los productos que están a 2 semanas de vencer, osea, 14 días<br>";
echo "Las fechas son aleatorias y van desde la fecha actual hasta dos meses adelante<br>";
echo "El array solo tiene fechas, porque no dice nada de agregarle nombre a los productos<br>";
echo "<pre>";
print_r($fechas_aleatorias);
echo "</pre>";

$c = 0;
foreach ($fechas_aleatorias as $value) {
    $fecha_aleatoria_obj = new DateTime($value);
    $diferencia = date_diff($fecha_actual, $fecha_aleatoria_obj);

    if ($diferencia->days <= 14) {
        $c++;
        echo $value . "<br>";
        echo "Vencera en " . $diferencia->days . " dias.<br>";
    }
}

echo "Están a punto de vencer " . $c . " productos en total<br>";
