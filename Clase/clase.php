<?php
if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $foto = $_FILES['foto'];
    $expediente = $_FILES['expediente'];

    // Validación de la foto
    $fotoNombre = $foto['name'];
    $fotoTipo = $foto['type'];
    $fotoTamano = $foto['size'];
    $fotoTmpName = $foto['tmp_name'];
    $fotoError = $foto['error'];

    // Validación del expediente
    $expedienteNombre = $expediente['name'];
    $expedienteTipo = $expediente['type'];
    $expedienteTamano = $expediente['size'];
    $expedienteTmpName = $expediente['tmp_name'];
    $expedienteError = $expediente['error'];

    // Validaciones
    $fotoFormatoValido = $fotoTipo === 'image/png';
    $fotoTamanoValido = $fotoTamano <= 2 * 1024 * 1024; // 2MB
    $expedienteFormatoValido = $expedienteTipo === 'application/pdf';
    $expedienteTamanoValido = $expedienteTamano <= 10 * 1024 * 1024; // 10MB

    $errores = [];

    if ($fotoError !== 0 || !$fotoFormatoValido || !$fotoTamanoValido) {
        if ($fotoError !== 0) {
            $errores[] = "Hubo un error al subir la foto.";
        }
        if (!$fotoFormatoValido) {
            $errores[] = "La foto debe ser en formato PNG.";
        }
        if (!$fotoTamanoValido) {
            $errores[] = "La foto no debe exceder los 2MB.";
        }
    }

    if ($expedienteError !== 0 || !$expedienteFormatoValido || !$expedienteTamanoValido) {
        if ($expedienteError !== 0) {
            $errores[] = "Hubo un error al subir el expediente.";
        }
        if (!$expedienteFormatoValido) {
            $errores[] = "El expediente debe ser en formato PDF.";
        }
        if (!$expedienteTamanoValido) {
            $errores[] = "El expediente no debe exceder los 10MB.";
        }
    }

    if (empty($errores)) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $fotoDestino = $uploadDir . basename($fotoNombre);

        if (move_uploaded_file($fotoTmpName, $fotoDestino) ) {
            // Procesar los archivos y mostrar detalles
            echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
            echo "Foto:<br>";
            echo " - Nombre: " . $fotoNombre . "<br>";
            echo " - Tipo: " . $fotoTipo . "<br>";
            echo " - Tamaño: " . ($fotoTamano / 1024) . " KB<br>";
            echo "<img src='$fotoDestino' alt='Imagen subida' style='max-width: 200px;'><br>";
            echo "Expediente:<br>";
            echo " - Nombre: " . $expedienteNombre . "<br>";
            echo " - Tipo: " . $expedienteTipo . "<br>";
            echo " - Tamaño: " . ($expedienteTamano / 1024) . " KB<br>";
        } else {
            echo "Hubo un error al mover los archivos.";
        }
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imagen y Archivo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="foto">Seleccione una imagen (PNG, max 2MB):</label>
        <input type="file" name="foto" id="foto" accept="image/png" required><br><br>

        <label for="expediente">Seleccione un expediente (PDF, max 10MB):</label>
        <input type="file" name="expediente" id="expediente" accept="application/pdf" required><br><br>

        <input type="submit" value="Subir Archivos" name="submit">
    </form>
</body>
</html>