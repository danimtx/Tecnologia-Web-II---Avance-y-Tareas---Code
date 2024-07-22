<?php
// Arrays de opciones
$tipoViviendaOpciones = [
    "Casa", "Choza, pahuichi", "Cuarto(s) o habitación(es) suelta(s)", 
    "Vivienda improvisada o vivienda móvil", "Establecimiento no destinado para vivienda",
    "Hotel, hostal, residencial o alojamiento", "Hospital o clínica con internación", 
    "Cuartel o establecimiento militar o policial", "Residencia u otro de adultos mayores",
    "Albergue de niñas(os) y adolescentes", "Recinto penitenciario o de reintegración", 
    "Campamento de trabajo", "Otra (instituto de rehabilitación, convento)", 
    "Persona que vive en la calle", "Entrancito: terminal, aeropuerto, puerto u otro"
];

$estadoViviendaOpciones = [
    "Con personas presentes", "Con personas temporalmente ausentes", 
    "Para alquilar y/o vender", "Terminándose de construir o reparar", "Abandonada"
];

if (isset($_POST['submit'])) {
    // Recoger datos del formulario
    $segmento = $_POST['segmento'] ?? '';
    $manzana = $_POST['manzana'] ?? '';
    $num_predio = $_POST['num_predio'] ?? '';
    $total_viviendas = $_POST['total_viviendas'] ?? '';
    $num_vivienda = $_POST['num_vivienda'] ?? '';
    $ciudad_comunidad = $_POST['ciudad_comunidad'] ?? '';
    $calle = $_POST['calle'] ?? '';
    $num_puerta = $_POST['num_puerta'] ?? '';
    $planta_piso = $_POST['planta_piso'] ?? '';
    $nombre_edificio = $_POST['nombre_edificio'] ?? '';
    $bloque = $_POST['bloque'] ?? '';
    $foto_vivienda = $_FILES['foto_vivienda'] ?? null;
    $tipo_vivienda = $_POST['tipo_vivienda'] ?? '';
    $estado_vivienda = $_POST['estado_vivienda'] ?? '';
    $material_paredes = $_POST['material_paredes'] ?? '';
    $revoque = $_POST['revoque'] ?? '';
    $material_techo = $_POST['material_techo'] ?? '';
    $material_pisos = $_POST['material_pisos'] ?? '';
    $agua_proviene = $_POST['agua_proviene'] ?? '';
    $agua_distribuye = $_POST['agua_distribuye'] ?? '';
    $energia = $_POST['energia'] ?? '';
    $combustible_cocina = $_POST['combustible_cocina'] ?? '';
    $basura = $_POST['basura'] ?? '';
    $cuarto_cocina = $_POST['cuarto_cocina'] ?? '';
    $cuartos_ocupan = $_POST['cuartos_ocupan'] ?? '';
    $cuartos_dormir = $_POST['cuartos_dormir'] ?? '';
    $bano = $_POST['bano'] ?? '';
    $desague = $_POST['desague'] ?? '';
    $vivienda_ocupan = $_POST['vivienda_ocupan'] ?? '';
    $bicicleta = $_POST['bicicleta'] ?? '';
    $motocicleta = $_POST['motocicleta'] ?? '';
    $vehiculo = $_POST['vehiculo'] ?? '';
    $carreta = $_POST['carreta'] ?? '';
    $deslizador = $_POST['deslizador'] ?? '';
    $refrigerador = $_POST['refrigerador'] ?? '';
    $microondas = $_POST['microondas'] ?? '';
    $calefon = $_POST['calefon'] ?? '';
    $aire_acondicionado = $_POST['aire_acondicionado'] ?? '';
    $lavadora = $_POST['lavadora'] ?? '';
    $radio = $_POST['radio'] ?? '';
    $televisor = $_POST['televisor'] ?? '';
    $computadora = $_POST['computadora'] ?? '';
    $celular = $_POST['celular'] ?? '';
    $telefono_fijo = $_POST['telefono_fijo'] ?? '';
    $internet_movil = $_POST['internet_movil'] ?? '';
    $internet_fijo = $_POST['internet_fijo'] ?? '';
    $tv_cable = $_POST['tv_cable'] ?? '';
    $telefonia_fija = $_POST['telefonia_fija'] ?? '';
    $comentarios_adicionales = $_POST['comentarios_adicionales'] ?? '';

    // Validaciones
    $errores = [];

    // Validar campos de texto solo letras y espacios
    $campos_texto = [
        'segmento', 'manzana', 'num_predio', 'total_viviendas', 'num_vivienda',
        'ciudad_comunidad', 'calle', 'num_puerta', 'planta_piso', 'nombre_edificio', 'bloque'
    ];

    foreach ($campos_texto as $campo) {
        if (!preg_match('/^[a-zA-Z\s]+$/', ${$campo})) {
            $errores[$campo] = "El campo '$campo' solo debe contener letras y espacios.";
        }
        if (strlen(${$campo}) > 50) {
            $errores[$campo] = "El campo '$campo' no debe exceder los 50 caracteres.";
        }
    }

    // Validar la foto de la vivienda
    if ($foto_vivienda['error'] !== 0 || !in_array($foto_vivienda['type'], ['image/jpeg', 'image/png']) || $foto_vivienda['size'] > 2 * 1024 * 1024) {
        if ($foto_vivienda['error'] !== 0) {
            $errores['foto_vivienda'] = "Hubo un error al subir la foto.";
        }
        if (!in_array($foto_vivienda['type'], ['image/jpeg', 'image/png'])) {
            $errores['foto_vivienda'] = "La foto debe ser en formato JPG o PNG.";
        }
        if ($foto_vivienda['size'] > 2 * 1024 * 1024) {
            $errores['foto_vivienda'] = "La foto no debe exceder los 2MB.";
        }
    }

    // Validar los radio buttons
    $radio_buttons = ['tipo_vivienda', 'estado_vivienda'];
    foreach ($radio_buttons as $radio) {
        if (empty(${$radio})) {
            $errores[$radio] = "El campo '$radio' es obligatorio.";
        }
    }

    // Validar comentarios adicionales
    if (strlen($comentarios_adicionales) > 500) {
        $errores['comentarios_adicionales'] = "Los comentarios adicionales no deben exceder los 500 caracteres.";
    }

    // Si no hay errores, procesar el formulario
    if (empty($errores)) {
        $uploadDir = 'practica_3/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fotoDestino = $uploadDir . basename($foto_vivienda['name']);
        move_uploaded_file($foto_vivienda['tmp_name'], $fotoDestino);

        // Guardar datos en un archivo txt único
        $timestamp = date('YmdHis');
        $fileName = $uploadDir . 'datos_' . $timestamp . '.txt';

        $datos = [
            'segmento' => $segmento,
            'manzana' => $manzana,
            'num_predio' => $num_predio,
            'total_viviendas' => $total_viviendas,
            'num_vivienda' => $num_vivienda,
            'ciudad_comunidad' => $ciudad_comunidad,
            'calle' => $calle,
            'num_puerta' => $num_puerta,
            'planta_piso' => $planta_piso,
            'nombre_edificio' => $nombre_edificio,
            'bloque' => $bloque,
            'tipo_vivienda' => $tipo_vivienda,
            'estado_vivienda' => $estado_vivienda,
            'material_paredes' => $material_paredes,
            'revoque' => $revoque,
            'material_techo' => $material_techo,
            'material_pisos' => $material_pisos,
            'agua_proviene' => $agua_proviene,
            'agua_distribuye' => $agua_distribuye,
            'energia' => $energia,
            'combustible_cocina' => $combustible_cocina,
            'basura' => $basura,
            'cuarto_cocina' => $cuarto_cocina,
            'cuartos_ocupan' => $cuartos_ocupan,
            'cuartos_dormir' => $cuartos_dormir,
            'bano' => $bano,
            'desague' => $desague,
            'vivienda_ocupan' => $vivienda_ocupan,
            'bicicleta' => $bicicleta,
            'motocicleta' => $motocicleta,
            'vehiculo' => $vehiculo,
            'carreta' => $carreta,
            'deslizador' => $deslizador,
            'refrigerador' => $refrigerador,
            'microondas' => $microondas,
            'calefon' => $calefon,
            'aire_acondicionado' => $aire_acondicionado,
            'lavadora' => $lavadora,
            'radio' => $radio,
            'televisor' => $televisor,
            'computadora' => $computadora,
            'celular' => $celular,
            'telefono_fijo' => $telefono_fijo,
            'internet_movil' => $internet_movil,
            'internet_fijo' => $internet_fijo,
            'tv_cable' => $tv_cable,
            'telefonia_fija' => $telefonia_fija,
            'comentarios_adicionales' => $comentarios_adicionales
        ];

        $file = fopen($fileName, 'a');
        foreach ($datos as $key => $value) {
            fwrite($file, ucfirst(str_replace('_', ' ', $key)) . ": " . htmlspecialchars($value) . PHP_EOL);
        }
        fclose($file);

        echo "Formulario enviado correctamente. Datos guardados en $fileName";
    } else {
        foreach ($errores as $error) {
            echo $error . "<br>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Censo de Población y Vivienda 2024</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #2c2c2c;
            color: #f1f1f1;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
        }
        form {
            background-color: #3a3a3a;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            width: 100%;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #f1f1f1;
        }
        input[type="text"],
        textarea,
        select {
            width: calc(100% - 20px);
            padding: 8px 10px;
            margin-bottom: 16px;
            border: 1px solid #555;
            border-radius: 4px;
            font-size: 14px;
            outline: none;
            background-color: #444;
            color: #f1f1f1;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        textarea:focus,
        select:focus {
            border-color: #1e90ff;
        }
        textarea {
            resize: vertical;
        }
        .error-message {
            color: #ff6b6b;
            font-size: 12px;
            margin-top: -12px;
            margin-bottom: 12px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #1e90ff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0b6bff;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>CAPÍTULO A. UBICACIÓN DE LA VIVIENDA (OCUPADA Y DESOCUPADA)</h2>
        <label for="segmento">1. Segmento:</label>
        <input type="text" id="segmento" name="segmento" maxlength="50"  pattern="[a-zA-Z\s]+">
        <div class="error-message"><?php echo htmlspecialchars($errores['segmento'] ?? ''); ?></div>

        <label for="manzana">2. Manzana:</label>
        <input type="text" id="manzana" name="manzana" maxlength="50"  pattern="[a-zA-Z\s]+">
        <div class="error-message"><?php echo htmlspecialchars($errores['manzana'] ?? ''); ?></div>

        <label for="num_predio">3. Nro. de predio:</label>
        <input type="text" id="num_predio" name="num_predio" maxlength="50"  pattern="[a-zA-Z\s]+">
        <div class="error-message"><?php echo htmlspecialchars($errores['num_predio'] ?? ''); ?></div>

        <label for="total_viviendas">4. Total de viviendas en el predio:</label>
        <input type="text" id="total_viviendas" name="total_viviendas" maxlength="50"  pattern="[a-zA-Z\s]+">
        <div class="error-message"><?php echo htmlspecialchars($errores['total_viviendas'] ?? ''); ?></div>

        <label for="num_vivienda">5. Nro. de vivienda:</label>
        <input type="text" id="num_vivienda" name="num_vivienda" maxlength="50"  pattern="[a-zA-Z\s]+">
        <div class="error-message"><?php echo htmlspecialchars($errores['num_vivienda'] ?? ''); ?></div>

        <label for="ciudad_comunidad">6. Ciudad o comunidad:</label>
        <input type="text" id="ciudad_comunidad" name="ciudad_comunidad" maxlength="50"  pattern="[a-zA-Z\s]+">
        <div class="error-message"><?php echo htmlspecialchars($errores['ciudad_comunidad'] ?? ''); ?></div>

        <label for="calle">7. Calle, avenida, camino o carretera:</label>
        <input type="text" id="calle" name="calle" maxlength="50"  pattern="[a-zA-Z\s]+">
        <div class="error-message"><?php echo htmlspecialchars($errores['calle'] ?? ''); ?></div>

        <label for="num_puerta">8. Nro. de puerta:</label>
        <input type="text" id="num_puerta" name="num_puerta" maxlength="50"  pattern="[a-zA-Z\s]+">
        <div class="error-message"><?php echo htmlspecialchars($errores['num_puerta'] ?? ''); ?></div>

        <label for="planta_piso">9. Planta, piso y/o depto:</label>
        <input type="text" id="planta_piso" name="planta_piso" maxlength="50"  pattern="[a-zA-Z\s]+">
        <div class="error-message"><?php echo htmlspecialchars($errores['planta_piso'] ?? ''); ?></div>

        <label for="nombre_edificio">11. Nombre del edificio, condominio, torre o conventillo:</label>
        <input type="text" id="nombre_edificio" name="nombre_edificio" maxlength="50"  pattern="[a-zA-Z\s]+">
        <div class="error-message"><?php echo htmlspecialchars($errores['nombre_edificio'] ?? ''); ?></div>

        <label for="bloque">12. Bloque:</label>
        <input type="text" id="bloque" name="bloque" maxlength="50"  pattern="[a-zA-Z\s]+">
        <div class="error-message"><?php echo htmlspecialchars($errores['bloque'] ?? ''); ?></div>

        <label for="foto_vivienda">Foto de la vivienda (JPG, PNG, max 2MB):</label>
        <input type="file" id="foto_vivienda" name="foto_vivienda" accept="image/jpeg, image/png" >
        <div class="error-message"><?php echo htmlspecialchars($errores['foto_vivienda'] ?? ''); ?></div>

        <h2>CAPÍTULO B. TIPO DE VIVIENDA</h2>
        <label for="tipo_vivienda">1. La vivienda es:</label>
        <select id="tipo_vivienda" name="tipo_vivienda" >
            <?php foreach ($tipoViviendaOpciones as $opcion): ?>
                <option value="<?php echo htmlspecialchars($opcion); ?>"><?php echo htmlspecialchars($opcion); ?></option>
            <?php endforeach; ?>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['tipo_vivienda'] ?? ''); ?></div>

        <label for="estado_vivienda">2. La vivienda está:</label>
        <select id="estado_vivienda" name="estado_vivienda" >
            <?php foreach ($estadoViviendaOpciones as $opcion): ?>
                <option value="<?php echo htmlspecialchars($opcion); ?>"><?php echo htmlspecialchars($opcion); ?></option>
            <?php endforeach; ?>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['estado_vivienda'] ?? ''); ?></div>

        <h2>CAPÍTULO C. CARACTERÍSTICAS DE LA VIVIENDA CON PERSONAS PRESENTES</h2>
        <label for="material_paredes">3. ¿Cuál es el material de construcción más utilizado en las paredes de esta vivienda?</label><br>
        <select id="material_paredes" name="material_paredes" >
            <option value="ladrillo">Ladrillo, bloque de cemento, hormigón</option>
            <option value="adobe">Adobe, tapial</option>
            <option value="tabique">Tabique, quinche</option>
            <option value="piedra">Piedra</option>
            <option value="madera">Madera</option>
            <option value="caña">Caña, palma, tronco</option>
            <option value="otro">Otro</option>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['material_paredes'] ?? ''); ?></div>

        <label>4. Las paredes interiores de esta vivienda, ¿tienen revoque?</label><br>
        <input type="radio" id="revoque_si" name="revoque" value="si" >
        <label for="revoque_si">Sí</label><br>
        <input type="radio" id="revoque_no" name="revoque" value="no" >
        <label for="revoque_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['revoque'] ?? ''); ?></div>

        <label for="material_techo">5. ¿Cuál es el material de construcción más utilizado en los techos de esta vivienda?</label><br>
        <select id="material_techo" name="material_techo" >
            <option value="calamina">Calamina o plancha</option>
            <option value="teja">Teja (de cemento, arcilla o fibrocemento)</option>
            <option value="losa">Losa de hormigón armado</option>
            <option value="palma">Palma, palma, paja, jatata, motacú, chuchio</option>
            <option value="otro">Otro</option>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['material_techo'] ?? ''); ?></div>

        <label for="material_pisos">6. ¿Cuál es el material más utilizado en los pisos de esta vivienda?</label><br>
        <select id="material_pisos" name="material_pisos" >
            <option value="tierra">Tierra</option>
            <option value="tablon">Tablón de madera</option>
            <option value="machimbre">Machimbre, parquét</option>
            <option value="ceramica">Cerámica, porcellanato</option>
            <option value="baldosa">Baldosa, mosaico</option>
            <option value="cemento">Cemento</option>
            <option value="otro">Otro</option>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['material_pisos'] ?? ''); ?></div>

        <label for="agua_proviene">7. Principalmente, el agua que usan en la vivienda proviene de:</label><br>
        <select id="agua_proviene" name="agua_proviene" >
            <option value="red">Cañería de red</option>
            <option value="pilet">Pilet pública</option>
            <option value="lluvia">Cosecha de agua de lluvia</option>
            <option value="pozo_bomba">Pozo excavado o perforado con bomba</option>
            <option value="pozo_no_bomba">Pozo no protegido o sin bomba</option>
            <option value="manantial">Manantial o vertiente protegida</option>
            <option value="rio">Río, acequia o vertiente no protegida</option>
            <option value="carro">Carro repartidor (aguatero)</option>
            <option value="otro">Otro</option>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['agua_proviene'] ?? ''); ?></div>

        <label for="agua_distribuye">8. El agua que tienen en la vivienda se distribuye:</label><br>
        <select id="agua_distribuye" name="agua_distribuye" >
            <option value="dentro_vivienda">Por cañería dentro de la vivienda</option>
            <option value="fuera_vivienda">Por cañería fuera de la vivienda, pero dentro del lote o terreno</option>
            <option value="no_distribuye">No se distribuye por cañería</option>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['agua_distribuye'] ?? ''); ?></div>

        <label for="energia">9. ¿De dónde proviene la energía eléctrica que usan en la vivienda?</label><br>
        <select id="energia" name="energia" >
            <option value="publico">Servicio público de energía eléctrica</option>
            <option value="generador">Motor propio (generador)</option>
            <option value="panel_solar">Panel solar</option>
            <option value="otro">Otro</option>
            <option value="ninguna">Ninguna</option>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['energia'] ?? ''); ?></div>

        <label for="combustible_cocina">10. ¿Cuál es el principal combustible o energía que utilizan para cocinar?</label><br>
        <select id="combustible_cocina" name="combustible_cocina" >
            <option value="gas_garrafa">Gas en garrafa</option>
            <option value="gas_red">Gas por cañería (a domicilio)</option>
            <option value="leña">Leña</option>
            <option value="guano">Guano, bosta o taque</option>
            <option value="electricidad">Electricidad</option>
            <option value="energia_solar">Energía solar (cocina solar)</option>
            <option value="otro">Otro</option>
            <option value="no_cocina">No cocina</option>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['combustible_cocina'] ?? ''); ?></div>

        <label for="basura">11. Habitualmente, ¿qué hacen con la basura que generan?</label><br>
        <select id="basura" name="basura" >
            <option value="contenedor_publico">La depositan en el contenedor o basurero público</option>
            <option value="entrega_carro">La entregan al carro basurero (servicio público)</option>
            <option value="terreno_baldio">La botan en un terreno baldío o la calle</option>
            <option value="rio">La botan al río</option>
            <option value="queman">La queman</option>
            <option value="entierran">La entierran</option>
            <option value="otra">Otra forma</option>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['basura'] ?? ''); ?></div>

        <label>12. ¿Tienen un cuarto solo para cocinar?</label><br>
        <input type="radio" id="cuarto_cocina_si" name="cuarto_cocina" value="si" >
        <label for="cuarto_cocina_si">Sí</label><br>
        <input type="radio" id="cuarto_cocina_no" name="cuarto_cocina" value="no" >
        <label for="cuarto_cocina_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['cuarto_cocina'] ?? ''); ?></div>

        <label for="cuartos_ocupan">13. ¿Cuántos cuartos o habitaciones ocupan, sin contar baño y cocina?</label><br>
        <select id="cuartos_ocupan" name="cuartos_ocupan" >
            <option value="1">Uno</option>
            <option value="2">Dos</option>
            <option value="3">Tres</option>
            <option value="4">Cuatro</option>
            <option value="5">Cinco</option>
            <option value="6">Seis</option>
            <option value="7">Siete</option>
            <option value="8">Ocho o más</option>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['cuartos_ocupan'] ?? ''); ?></div>

        <label for="cuartos_dormir">14. De estos cuartos o habitaciones, ¿cuántos se utilizan solo para dormir?</label><br>
        <select id="cuartos_dormir" name="cuartos_dormir" >
            <option value="0">Cero</option>
            <option value="1">Uno</option>
            <option value="2">Dos</option>
            <option value="3">Tres</option>
            <option value="4">Cuatro</option>
            <option value="5">Cinco</option>
            <option value="6">Seis</option>
            <option value="7">Siete</option>
            <option value="8">Ocho o más</option>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['cuartos_dormir'] ?? ''); ?></div>

        <label>15. ¿Tienen baño o letrina?</label><br>
        <input type="radio" id="bano_si" name="bano" value="si" >
        <label for="bano_si">Sí, usado solo por su hogar</label><br>
        <input type="radio" id="bano_compartido" name="bano" value="compartido" >
        <label for="bano_compartido">Sí, compartido con otros hogares</label><br>
        <input type="radio" id="bano_no" name="bano" value="no" >
        <label for="bano_no">No tiene</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['bano'] ?? ''); ?></div>

        <label for="desague">16. El baño o letrina tiene desagüe:</label><br>
        <select id="desague" name="desague" >
            <option value="red_alcantarillado">A la red de alcantarillado</option>
            <option value="camara_septica">A una cámara séptica</option>
            <option value="pozo_ciego">A un pozo ciego</option>
            <option value="pozo_absorcion">A un pozo de absorción</option>
            <option value="superficie">A la superficie (calle, quebrada o río)</option>
            <option value="ecologico">Es baño ecológico</option>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['desague'] ?? ''); ?></div>

        <label for="vivienda_ocupan">17. La vivienda que ocupan es:</label><br>
        <select id="vivienda_ocupan" name="vivienda_ocupan" >
            <option value="propia_pagada">Propia y totalmente pagada</option>
            <option value="propia_pagando">Propia y la están pagando</option>
            <option value="prestada">Prestada por parientes o amigos</option>
            <option value="alquilada">Alquilada</option>
            <option value="anticretico">En contrato anticrético</option>
            <option value="mixto">En contrato mixto (anticrético y alquiler)</option>
            <option value="cedida">Cedida por servicios</option>
            <option value="otra">Otra</option>
        </select>
        <div class="error-message"><?php echo htmlspecialchars($errores['vivienda_ocupan'] ?? ''); ?></div>

        <label>18. Su hogar tiene:</label><br>
        <label for="bicicleta">Bicicleta?</label>
        <input type="radio" id="bicicleta_si" name="bicicleta" value="si" >
        <label for="bicicleta_si">Sí</label>
        <input type="radio" id="bicicleta_no" name="bicicleta" value="no" >
        <label for="bicicleta_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['bicicleta'] ?? ''); ?></div>

        <label for="motocicleta">Motocicleta o cuadratrack?</label>
        <input type="radio" id="motocicleta_si" name="motocicleta" value="si" >
        <label for="motocicleta_si">Sí</label>
        <input type="radio" id="motocicleta_no" name="motocicleta" value="no" >
        <label for="motocicleta_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['motocicleta'] ?? ''); ?></div>

        <label for="vehiculo">Vehículo automotor?</label>
        <input type="radio" id="vehiculo_si" name="vehiculo" value="si" >
        <label for="vehiculo_si">Sí</label>
        <input type="radio" id="vehiculo_no" name="vehiculo" value="no" >
        <label for="vehiculo_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['vehiculo'] ?? ''); ?></div>

        <label for="carreta">Carreta o carretón?</label>
        <input type="radio" id="carreta_si" name="carreta" value="si" >
        <label for="carreta_si">Sí</label>
        <input type="radio" id="carreta_no" name="carreta" value="no" >
        <label for="carreta_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['carreta'] ?? ''); ?></div>

        <label for="deslizador">Deslizador, balsa, canoa o bote?</label>
        <input type="radio" id="deslizador_si" name="deslizador" value="si" >
        <label for="deslizador_si">Sí</label>
        <input type="radio" id="deslizador_no" name="deslizador" value="no" >
        <label for="deslizador_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['deslizador'] ?? ''); ?></div>

        <label for="refrigerador">Refrigerador o congeladora?</label>
        <input type="radio" id="refrigerador_si" name="refrigerador" value="si" >
        <label for="refrigerador_si">Sí</label>
        <input type="radio" id="refrigerador_no" name="refrigerador" value="no" >
        <label for="refrigerador_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['refrigerador'] ?? ''); ?></div>

        <label for="microondas">Microondas?</label>
        <input type="radio" id="microondas_si" name="microondas" value="si" >
        <label for="microondas_si">Sí</label>
        <input type="radio" id="microondas_no" name="microondas" value="no" >
        <label for="microondas_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['microondas'] ?? ''); ?></div>

        <label for="calefon">Calefón o termotanque?</label>
        <input type="radio" id="calefon_si" name="calefon" value="si" >
        <label for="calefon_si">Sí</label>
        <input type="radio" id="calefon_no" name="calefon" value="no" >
        <label for="calefon_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['calefon'] ?? ''); ?></div>

        <label for="aire_acondicionado">Aire acondicionado?</label>
        <input type="radio" id="aire_acondicionado_si" name="aire_acondicionado" value="si" >
        <label for="aire_acondicionado_si">Sí</label>
        <input type="radio" id="aire_acondicionado_no" name="aire_acondicionado" value="no" >
        <label for="aire_acondicionado_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['aire_acondicionado'] ?? ''); ?></div>

        <label for="lavadora">Lavadora de ropa?</label>
        <input type="radio" id="lavadora_si" name="lavadora" value="si" >
        <label for="lavadora_si">Sí</label>
        <input type="radio" id="lavadora_no" name="lavadora" value="no" >
        <label for="lavadora_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['lavadora'] ?? ''); ?></div>

        <label>19. Su hogar tiene:</label><br>
        <label for="radio">Radio o equipo de sonido?</label>
        <input type="radio" id="radio_si" name="radio" value="si" >
        <label for="radio_si">Sí</label>
        <input type="radio" id="radio_no" name="radio" value="no" >
        <label for="radio_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['radio'] ?? ''); ?></div>

        <label for="televisor">Televisor?</label>
        <input type="radio" id="televisor_si" name="televisor" value="si" >
        <label for="televisor_si">Sí</label>
        <input type="radio" id="televisor_no" name="televisor" value="no" >
        <label for="televisor_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['televisor'] ?? ''); ?></div>

        <label for="computadora">Computadora, laptop o tablet?</label>
        <input type="radio" id="computadora_si" name="computadora" value="si" >
        <label for="computadora_si">Sí</label>
        <input type="radio" id="computadora_no" name="computadora" value="no" >
        <label for="computadora_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['computadora'] ?? ''); ?></div>

        <label for="celular">Teléfono celular?</label>
        <input type="radio" id="celular_si" name="celular" value="si" >
        <label for="celular_si">Sí</label>
        <input type="radio" id="celular_no" name="celular" value="no" >
        <label for="celular_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['celular'] ?? ''); ?></div>

        <label for="telefono_fijo">Teléfono fijo en la vivienda?</label>
        <input type="radio" id="telefono_fijo_si" name="telefono_fijo" value="si" >
        <label for="telefono_fijo_si">Sí</label>
        <input type="radio" id="telefono_fijo_no" name="telefono_fijo" value="no" >
        <label for="telefono_fijo_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['telefono_fijo'] ?? ''); ?></div>

        <label for="internet_movil">Internet móvil (megas o datos)?</label>
        <input type="radio" id="internet_movil_si" name="internet_movil" value="si" >
        <label for="internet_movil_si">Sí</label>
        <input type="radio" id="internet_movil_no" name="internet_movil" value="no" >
        <label for="internet_movil_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['internet_movil'] ?? ''); ?></div>

        <label for="internet_fijo">Internet fijo?</label>
        <input type="radio" id="internet_fijo_si" name="internet_fijo" value="si" >
        <label for="internet_fijo_si">Sí</label>
        <input type="radio" id="internet_fijo_no" name="internet_fijo" value="no" >
        <label for="internet_fijo_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['internet_fijo'] ?? ''); ?></div>

        <label for="tv_cable">Servicio de TV cable o satelital?</label>
        <input type="radio" id="tv_cable_si" name="tv_cable" value="si" >
        <label for="tv_cable_si">Sí</label>
        <input type="radio" id="tv_cable_no" name="tv_cable" value="no" >
        <label for="tv_cable_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['tv_cable'] ?? ''); ?></div>

        <label for="telefonia_fija">Servicio de telefonía fija?</label>
        <input type="radio" id="telefonia_fija_si" name="telefonia_fija" value="si" >
        <label for="telefonia_fija_si">Sí</label>
        <input type="radio" id="telefonia_fija_no" name="telefonia_fija" value="no" >
        <label for="telefonia_fija_no">No</label><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['telefonia_fija'] ?? ''); ?></div>

        <label for="comentarios_adicionales">Comentarios adicionales (opcional, max 500 caracteres):</label><br>
        <textarea id="comentarios_adicionales" name="comentarios_adicionales" maxlength="500"></textarea><br>
        <div class="error-message"><?php echo htmlspecialchars($errores['comentarios_adicionales'] ?? ''); ?></div>

        <button type="submit" name="submit">Enviar</button>
    </form>
</body>
</html>
