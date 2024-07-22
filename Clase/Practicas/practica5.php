<?php
$carrito = [];

function agregarProducto($producto, $precio, &$carrito) {
    $carrito[$producto] = $precio;
    return $carrito;
}

function eliminarProducto($producto, &$carrito) {
    if (isset($carrito[$producto])) {
        unset($carrito[$producto]);
    }
    return $carrito;
}

function calcularTotal($carrito) {
    $total = 0;
    foreach ($carrito as $key => $value) {
        $total += $value;
    }
    return $total;
}

$carrito = agregarProducto("camisa", 25, $carrito);
$carrito = agregarProducto("zapatos", 59, $carrito);
$carrito = agregarProducto("hugo", 1.5, $carrito);

echo "<pre>";
var_dump($carrito);
echo "</pre>";

$carrito = eliminarProducto("camisa", $carrito);

echo "<pre>";
var_dump($carrito);
echo "</pre>";

echo "Total : " . calcularTotal($carrito);
