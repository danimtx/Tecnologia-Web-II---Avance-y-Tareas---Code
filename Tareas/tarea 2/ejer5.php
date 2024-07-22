<?php
$vehiculos = [];
echo "El tiempo a usar seran SEGUNDOS, hasta un maximo de 50 segundos <br><br>";
for ($i=1; $i <= 15; $i++) { 
    $coche = ['vechiculo ' . $i => rand(1, 50)];
    $vehiculos[$i] = $coche;
}

$max_tiempo = -1;
$suma_tiempos = 0;
$auto;

foreach ($vehiculos as $coche) {
    $tiempo = current($coche);
    if($tiempo > $max_tiempo){
        $max_tiempo = $tiempo;
        $auto = $coche;
    }
    $suma_tiempos += $tiempo;
}

echo "El vehiculo que espero mas tiempo es : " . key($auto) . " con un tiempo de : " . $max_tiempo ." Segundos";
echo "<br>El promedio de los tiempos es : " . $suma_tiempos / count($vehiculos) . " Segundos";

echo "<pre>";
print_r($vehiculos);
echo "</pre>";
