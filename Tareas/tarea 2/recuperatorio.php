<?php

$n = 20;
$costoHora = 15;
$trabajadores = [];

for ($i=0; $i < $n; $i++) {
    $h_trabajo = [];
    for ($j=0; $j < 6; $j++) { 
        $h_trabajo[$j] = rand(0, 8);
    }
    $trabajadores[$i] = $h_trabajo;
}

$total = 0;

$i = 1;
foreach ($trabajadores as $value) {
    $horas = 0;
    foreach ($value as $val) {
        $horas += $val;
    }
    $total += $horas;
    echo "El trabajador " . $i . " : trabajo -> ". $horas . " horas y gano ". $horas * $costoHora . "<br>";
    $i++;
}

echo "Total : " . $total * $costoHora;
//var_dump($trabajadores);

