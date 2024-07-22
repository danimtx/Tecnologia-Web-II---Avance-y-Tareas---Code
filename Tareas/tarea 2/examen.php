<?php
$pizzas = ['jamonYqueso', 'hawaiana', 'napolitana'];

$precio  = [$pizzas[0] => 45,
            $pizzas[1] => 65,
            $pizzas[2] => 55];

//gastos
$merienda_emple = 10 *5;
$alquiler = 1500;
$gastos = $merienda_emple + $alquiler;

//pra las ventas diarias del 1 al 100}
$v_diarias = rand(1, 100);

//clientes, existen 200 clientes
$clientes = [];
for ($i=0; $i < 200; $i++) { 
    $clientes[$i] = 'cliente'.$i;
}
//ventas ran a clientes ran
//ventas
$ventas = [];

for ($i=0; $i < $v_diarias; $i++) { 
    $venta = [$clientes[rand(0, 199)], $pizzas[rand(0, 2)]];
    $ventas[$i] = $venta;
}

//(1) ventas diarias
echo "Las ventas diarias fueron : ".$v_diarias ."<br>";
$ganancia = 0;

$conteo_ventas = [
    $pizzas[0] => 0,
    $pizzas[1] => 0,
    $pizzas[2] => 0
];

foreach ($ventas as $value) {
    $conteo_ventas[$value[1]]++;
    $ganancia += $precio[$value[1]];
}

//ganacia del dueño
echo "Gano : " . $ganancia - $gastos . "<br>";
echo "Pizza : ". $pizzas[0] . " se vendio " . $conteo_ventas[$pizzas[0]] . " veces<br>";
echo "Pizza : ". $pizzas[1] . " se vendio " . $conteo_ventas[$pizzas[1]] . " veces<br>";
echo "Pizza : ". $pizzas[2] . " se vendio " . $conteo_ventas[$pizzas[2]] . " veces<br>";

//clientes que repitieron

for ($i=0; $i < 200; $i++) { 
    $cnt = [$pizzas[0] => 0,
            $pizzas[1] => 0,
            $pizzas[2] => 0];
    foreach ($ventas as $value) {
        if($value[0] == $clientes[$i]){
            $cnt[$value[1]]++;
        }
    }
    if($cnt[$pizzas[0]] > 1){
        echo $clientes[$i] . " Repitio ". $cnt[$pizzas[0]]. " ".$pizzas[0]. "<br>";
    }
    if($cnt[$pizzas[1]] > 1){
        echo $clientes[$i] . " Repitio ". $cnt[$pizzas[1]]." ".$pizzas[1]. "<br>";
    }
    if($cnt[$pizzas[2]] > 1){
        echo $clientes[$i] . " Repitio ". $cnt[$pizzas[2]]. " ".$pizzas[2]."<br>";
    }
}

echo "<pre>";
var_dump($ventas);
echo "</pre>";
