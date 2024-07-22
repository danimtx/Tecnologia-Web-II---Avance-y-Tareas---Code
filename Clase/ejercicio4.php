<?php

//sentencia if

// $compra = $_GET['c'];
// $puntos = 0;
// if($compra > 50 & $compra <= 100){
//     $puntos = $puntos+5;
// }
// elseif($compra > 100 && $compra <= 200){
//     $puntos = $puntos + 15;
// }
// elseif($compra > 200 && $compra <= 500){
//     $puntos = $puntos + 30;
// }
// elseif($compra > 500){
//     $puntos = $puntos + 60;
// }

// echo "Con if" . $puntos;

// $puntos = 0;
// $puntos = ($compra > 500? 60 : ($compra > 200? 30 : ($compra > 100? 15 : ($compra > 50? 5 : 0))));

// echo $puntos;

//while

// while ($inferior <= $superior) {
//     echo "Iteracion ----> ".$inferior; 
//     if($inferior % 7 == 0){
//         $cnt++;
//         echo "multiplo ->  " . $inferior . "<br>";
//         $inferior = $inferior + 7;
//     }
//     else{
//         $inferior++;
//     }  
// }
// echo "Contador : " . $cnt;


//for

// $inferior = $_GET['i'];
// $superior = $_GET['s'];
// $cnt = 0;

// for ($i=$inferior; $i <= $superior; $i++) { 
//     if($i % 7 == 0){
//         $cnt++;
//         //echo "multiplo ->  " . $i . "<br>";
//     }
//     echo "----> ". $i ."<br>";
// }
// echo "Contador : " . $cnt;


//foreach
$electrodomesticos = [
    ['nombre' => 'Televisor',
     'precio' => 400,
     'estado' => true],
     ['nombre' => 'heladera',
     'precio' => 300,
     'estado' => false],
     ['nombre' => 'Televisor',
     'precio' => 400,
     'estado' => true],
     ['nombre' => 'bicicleta',
     'precio' => 100,
     'estado' => true],
];

foreach ($electrodomesticos as $productos) {
    echo $productos['nombre'] . "<br>";
    echo $productos['precio'] . "<br>";
    echo ($productos['estado']? 'Disponible' : 'No disponible') . "<br>";
    echo "<br>";
}

echo "<pre>";
var_dump($electrodomesticos);
echo "</pre>";