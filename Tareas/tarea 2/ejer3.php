<?php
$estados = ['estrategico', 'autonomo', 'resolutivo', 'receptivo', 'pre formal'];
$estudiantes = [];
//a)
for ($i=0; $i < 20; $i++) { 
    $estudiante = ['nombre' => 'estudiante ' . $i+1,
                    'nota' => rand(1, 100),
                    'estado' => $estados[rand(0, 4)]];
    $estudiantes[$i] = $estudiante;
}
$suma_estrategico = 0;
$notas_estrategico = 0;
$cnt_preFormal = 0;
foreach ($estudiantes as $value) {
    echo ("Nombre : " . $value['nombre']."<br>");
    echo "nota : " . $value['nota'] . "<br>";
    echo "Estado : ". $value['estado'] . "<br>";
    if($value['estado'] == 'pre formal'){
        echo "Mensaje : necesita retroalimentación <br>";
        $cnt_preFormal++;
    }
    if($value['estado'] == 'estrategico'){
        $suma_estrategico++;
        $notas_estrategico += $value['nota'];
    }
    echo "<br>";
}

echo "En estado Pre formal se encuentran " . $cnt_preFormal." estudiantes<br>";
if($cnt_preFormal > 0) echo "necesita retroalimentación <br>";
echo 'Promedio estudiantes con estado “estratégico” : ' . $notas_estrategico / $suma_estrategico . "<br>";
