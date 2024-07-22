<?php
$competidores = [
    "corredor1" => [
        "nombre" => "Santiago Tapia",
        "tiempo" => 11.98,
    ],
    "corredor2" => [
        "nombre" => "Victor Taja",
        "tiempo" => 12.00,
    ],
    "corredor3" => [
        "nombre" => "Sebastian Zambrana",
        "tiempo" => 11.55,
    ],
    "corredor4" => [
        "nombre" => "Hugo Acosta",
        "tiempo" => 11.30,
    ],
    "corredor5" => [
        "nombre" => "Victor Hugo Saldaña",
        "tiempo" => 10.80,
    ],
    "corredor6" => [
        "nombre" => "Daniel Mancilla",
        "tiempo" => 12.35,
    ],
    "corredor7" => [
        "nombre" => "Jhon Serrano",
        "tiempo" => 11.90,
    ],
    "corredor8" => [
        "nombre" => "Juan Ovando",
        "tiempo" => 11.40,
    ],
    "corredor9" => [
        "nombre" => "Fernando Guzman",
        "tiempo" => 12.40,
    ],
    "corredor10" => [
        "nombre" => "Gabriel Quiroga",
        "tiempo" => 12.50,
    ]
];

echo "Competencia de 100 mts planos Universidad Privada Domingo Savio"."<br>"."<br>";
usort($competidores, function ($a, $b) {
    return $a['tiempo'] <=> $b['tiempo'];
});

echo "El ganador es: " . $competidores[0]['nombre'] . " con un tiempo de: " . $competidores[0]['tiempo'] . " segundos.<br>";

echo "La diferencia del segundo con respecto al primero es: " . ($competidores[1]['tiempo'] - $competidores[0]['tiempo']) . " segundos.<br>";

echo "El último en llegar es: " . $competidores[count($competidores) - 1]['nombre'] . " con un tiempo de: " . $competidores[count($competidores) - 1]['tiempo'] . " segundos.<br>";

echo "Los tres primeros lugares son:<br>";
echo "1. " . $competidores[0]['nombre'] . " con un tiempo de: " . $competidores[0]['tiempo'] . " segundos.<br>";
echo "2. " . $competidores[1]['nombre'] . " con un tiempo de: " . $competidores[1]['tiempo'] . " segundos.<br>";
echo "3. " . $competidores[2]['nombre'] . " con un tiempo de: " . $competidores[2]['tiempo'] . " segundos.<br>";
?>