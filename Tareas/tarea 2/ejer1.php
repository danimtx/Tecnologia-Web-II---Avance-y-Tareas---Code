<?php
$estados = ['ME GUSTA', 'COMENTARIOS', 'COMPARTIR'];
$seguidores = [];
for ($i=0; $i < 50; $i++) { 
    $seguidores[$i] = $estados[rand(0,2)];
    //array_push($seguidores, $estados[rand(0, 2)]);
}

$conteo = array_count_values($seguidores);
//asort($conteo);
//conteo['me gusta'] = 45;


$max = $estados[0];
$min = $estados[0];
for ($i=0; $i < 3; $i++) { 
    if($conteo[$estados[$i]] > $conteo[$max]){
        $max = $estados[$i];
    }
    if($conteo[$estados[$i]] < $conteo[$min]){
        $min = $estados[$i];
    }
}
echo "a) El estado MÁS utilizado es: ". $max . " con " . $conteo[$max];

echo "<br> b) Promedio de cada uno de los estados <br>";
echo $estados[0] . " : " . ($conteo[$estados[0]] / 50)*100 . "%<br>";
echo $estados[1] . " : " . ($conteo[$estados[1]] / 50)*100 . "%<br>";
echo $estados[2] . " : " . ($conteo[$estados[2]] / 50)*100 . "%<br>";

echo "c) El estado MENOS utilizado es: ". $min . " con " . $conteo[$min];

echo "<br><br>Conteo <pre>";
var_dump($conteo);
echo "</pre>";
echo "Seguidores <pre>";
var_dump($seguidores);
echo "</pre>";