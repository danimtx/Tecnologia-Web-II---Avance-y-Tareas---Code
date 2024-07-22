<?php 
$cliente = "Juan Perez";
//saber el tamaño de la cadena
print(strlen($cliente));
echo "<br>";
var_dump($cliente);
echo "<br>";
//limpiar Espacios en blanco
//echo (trim($cliente));
$texto = " Jose Lopez ";
var_dump($texto);
$texto2 = strlen(trim($texto));
echo $texto2 . "<br>";

//convertir mayusculas en minusculas
echo (strtolower($cliente));
echo "<br>";
echo(strtoupper($texto));

var_dump(strtolower($cliente) === strtolower($texto));
echo "<br>";
//reemplazar
echo str_replace("Juan", "Jose", $cliente);
echo "<br>";
//buscar poscicion
echo strpos($cliente, "Pedro");
//buscar
echo substr_count($cliente, "e");

//dividir cadena
$cadena = explode("e", $texto);
var_dump($cadena);
//unir cadena
echo "<br>";
$cadena = implode("e", $cadena);
var_dump($cadena);

?>