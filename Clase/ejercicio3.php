<?php
//ARRAY DE UNA DIMENSION
$platos=array("saice", "sopa", "pescado");
$platos=["saice", "sopa", "chancho"];

echo "<pre>";
var_dump($platos);
echo "</pre>";
//INSERTAR DATOS
$platos[2]="Nuevo plato";
$platos[3]="chancho";
echo "<pre>";
var_dump($platos);
echo "</pre>";
//INSERTAR AL INICIO
array_unshift($platos, "jugos");
echo "<pre>";
var_dump($platos);
echo "</pre>";
//INSERTAR AL FINAL
array_push($platos, "ensaladas");
echo "<pre>";
var_dump($platos);
echo "</pre>";

//ARRAY DE DOS DIMENSIONES
$electrodomesticos=[
    "nombre"=>"televisor",
    "modelo"=>"LG",
    "precio"=>450,
    "pulgadas"=>16,
    "procedencia"=>"china",
    "accesorios"=>[
        "gamer"=>"si",
        "smart"=>"no",
        "control"=>"si",
    ]
];
echo "<pre>";
var_dump($electrodomesticos);
echo "</pre>";
echo $electrodomesticos["nombre"]."<br>".
$electrodomesticos["precio"]."<br>".$electrodomesticos
["accesorios"]["smart"];
//OTRA FORMA DE ARRAY
$electrodomesticos2= array(
    "nombre"=>"parlante",
    "modelo"=>"JBL",
);
echo "<pre>";
var_dump($electrodomesticos2);
echo "</pre>";

//AÑADIR UN ACCESORIO EN ELECTRODOMESTICOS
// array_push($electrodomesticos["accesorios"],"USB","si");
$electrodomesticos["accesorios"]["USB"]="si";
echo "<pre>";
var_dump($electrodomesticos);
echo "</pre>";
//MANEJAR LOS INDICES
//ISSET: LO QUE HACE ES QUE LO QUE ANALIZA ES QUE SI LA VARIABLE ESTA DECLARADA O NO.
$clientes = [];
var_dump(empty($platos));
var_dump(empty($electrodomesticos));
var_dump(empty($clientes));
var_dump(isset($clientes));
var_dump(isset($electrodomesticos["procedencia"]));
//ORDENAR MENOR A MAYOR PARA ARRAYS DE UNA SOLA DIMENSION
sort($platos);
echo "<pre>";
var_dump($platos);
echo "</pre>";
//ORDENAR MAYOR A MENOR PARA ARRAYS DE UNA SOLA DIMENSION
rsort($platos);
echo "<pre>";
var_dump($platos);
echo "</pre>";
//ARRAYS DE DOS DIMENSIONES
//ORDENAR ARRAY DE DOS DIMENSIONES A LOS VALORES DE ACUERDO AL ORDEN ALFABETICO ASCENDENTE
asort($electrodomesticos);
echo "<pre>";
var_dump($electrodomesticos);
echo "</pre>";
//ORDENAR ARRAY DE DOS DIMENSIONES A LOS VALORES DE ACUERDO AL ORDEN ALFABETICO DE MANERA DECENDENTE
arsort($electrodomesticos);
echo "<pre>";
var_dump($electrodomesticos);
echo "</pre>";
//ORDENAR ARRAY DE DOS DIMENSIONES A LOS VALORES DE ACUERDO AL ORDEN ALFABETICO DE MANERA ASCENDENTE (K ES PARA ORDENAR LOS INDICES)
ksort($electrodomesticos);
echo "<pre>";
var_dump($electrodomesticos);
echo "</pre>";
//ORDENAR ARRAY DE DOS DIMENSIONES A LOS VALORES DE ACUERDO AL ORDEN ALFABETICO DE MANERA DESCENDENTE (K ES PARA ORDENAR LOS INDICES)
krsort($electrodomesticos);
echo "<pre>";
var_dump($electrodomesticos);
echo "</pre>";
?>