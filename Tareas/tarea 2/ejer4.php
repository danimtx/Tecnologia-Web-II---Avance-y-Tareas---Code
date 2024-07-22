<?php
$pronostico = [];
$fecha_actual = new DateTime();
$fecha_actual_str = $fecha_actual->format("Y-m-d");
$fecha_hoy = strtotime($fecha_actual_str);
$fecha_maxima = strtotime("+2 months", $fecha_hoy);
for ($i = 0; $i < 15; $i++) {
    $fecha_aleatoria_timestamp = mt_rand($fecha_hoy, $fecha_maxima);
    $fecha_aleatoria = date("Y-m-d", $fecha_aleatoria_timestamp);
    $dia = [$fecha_aleatoria => rand(-10, 30)];
    $pronostico[$i] = $dia;
}
$temperatura_maxima = -100;
$temperatura_minima = 100;
$temperaturas_suma = 0;
$dia_max_calor;
$dia_max_frio;
foreach ($pronostico as $dia) {
    $temperatura = current($dia);
    if ($temperatura > $temperatura_maxima) {
        $temperatura_maxima = $temperatura;
        $dia_max_calor = $dia;
    }
    if ($temperatura < $temperatura_minima) {
        $temperatura_minima = $temperatura;
        $dia_max_frio = $dia;
    }
    $temperaturas_suma += $temperatura;
}
$promedio = $temperaturas_suma / count($pronostico);
echo "El día más caluroso es " . key($dia_max_calor) . " con una temperatura de ".$temperatura_maxima ." grados. <br>";
echo "El día más frío es " . key($dia_max_frio) . " con una temperatura de ".$temperatura_minima ." grados. <br>";
echo "El promedio de temperatura es : " . $promedio . " grados. <br>";
echo "<pre>";
print_r($pronostico);
echo "</pre>";
