
<?php 
$user = "da|ni|mtx";
$password = "0000";
$password_v = "0000";

echo ("La contraseña es la misma: ");
var_dump($password == $password_v);

echo "<br>";

$cadena = explode("|", $user);
var_dump($cadena);
echo "<br>";

echo $cadena[0];
echo " -> existe m : ";
echo substr_count($cadena[0], "m");
echo "<br>";

echo $cadena[1];
echo " -> existe m : ";
echo substr_count($cadena[1], "m");
echo "<br>";

echo $cadena[2];
echo " -> existe m : ";
echo substr_count($cadena[2], "m");
echo "<br>";
?>