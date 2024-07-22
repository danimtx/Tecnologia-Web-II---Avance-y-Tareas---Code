<?php

$usuario = $_POST['usuario'];
$password = $_POST['password'];

echo (strlen($usuario) >= 10)? "Bienvenido " . $usuario : "El usuario debe contener 10 digitos";
echo "<br>";
$num = [0,1,2,3,4,5,6,7,8,9];
$c = 0;
foreach($num as $valor) {
    if(strpos($password, $valor) != false){
        echo "------>" . strpos($password, $valor) . "<br>";
        $c++;
    }
}
echo $c ."<br>";
echo ($c > 0)? "Contraseña correcta" : "Error en la contraseña";

