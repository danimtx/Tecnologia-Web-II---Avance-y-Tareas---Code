<?php
$cadenas = isset($_GET['cadenas']) ? explode(',', $_GET['cadenas']) : [];
$numeros = isset($_GET['numeros']) ? explode(',', $_GET['numeros']) : [];
$numeros = array_map('intval', $numeros);
echo "Array de cadenas:<br>";
var_dump($cadenas);
echo "<br>";
echo "Array de números:<br>";
var_dump($numeros);
echo "<br>";
if (count($numeros) >= 3) {
    $num1 = $numeros[0];
    $num2 = $numeros[1];
    $num3 = $numeros[2];
    echo "Comparaciones entre números:<br>";
    echo "Comparaciones entre num1 y num2:<br>";
    if ($num1 > $num2) {
        echo "El número $num1 es mayor que $num2<br>";
    } elseif ($num1 < $num2) {
        echo "El número $num1 es menor que $num2<br>";
    } else {
        echo "El número $num1 es igual a $num2<br>";
    }
    if ($num2 > $num1) {
        echo "El número $num2 es mayor que $num1<br>";
    } elseif ($num2 < $num1) {
        echo "El número $num2 es menor que $num1<br>";
    } else {
        echo "El número $num2 es igual a $num1<br>";
    }
    echo "Comparaciones entre num2 y num3:<br>";
    if ($num2 > $num3) {
        echo "El número $num2 es mayor que $num3<br>";
    } elseif ($num2 < $num3) {
        echo "El número $num2 es menor que $num3<br>";
    } else {
        echo "El número $num2 es igual a $num3<br>";
    }
    if ($num3 > $num2) {
        echo "El número $num3 es mayor que $num2<br>";
    } elseif ($num3 < $num2) {
        echo "El número $num3 es menor que $num2<br>";
    } else {
        echo "El número $num3 es igual a $num2<br>";
    }
    echo "Comparaciones entre num1 y num3:<br>";
    if ($num1 > $num3) {
        echo "El número $num1 es mayor que $num3<br>";
    } elseif ($num1 < $num3) {
        echo "El número $num1 es menor que $num3<br>";
    } else {
        echo "El número $num1 es igual a $num3<br>";
    }
    if ($num3 > $num1) {
        echo "El número $num3 es mayor que $num1<br>";
    } elseif ($num3 < $num1) {
        echo "El número $num3 es menor que $num1<br>";
    } else {
        echo "El número $num3 es igual a $num1<br>";
    }
} else {
    echo "Se requieren al menos 3 números para las comparaciones.<br>";
}
?>