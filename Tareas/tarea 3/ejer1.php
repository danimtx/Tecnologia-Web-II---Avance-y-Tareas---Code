<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #2c2c2c;
            color: #f1f1f1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: #3a3a3a;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-width: 500px;
            width: 100%;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #f1f1f1;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
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
        input[type="file"]:focus {
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
        .result {
            background-color: #3a3a3a;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-width: 500px;
            width: 100%;
            color: #f1f1f1;
        }
        .result p {
            margin: 0 0 10px;
        }
    </style>
</head>
<body>
<?php
    $errors = [
        'nombre_proyecto' => '',
        'descripcion_proyecto' => '',
        'documento_proyecto' => '',
    ];

    $formularioEnviado = false;
    $nombre_proyecto = '';
    $descripcion_proyecto = '';
    $nombre_documento = '';
    $tamaño_documento = '';
    $tipo_documento = '';

    if (isset($_POST['submit'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre_proyecto = $_POST["nombre_proyecto"] ?? '';
            $descripcion_proyecto = $_POST["descripcion_proyecto"] ?? '';
            $documento_proyecto = $_FILES["documento_proyecto"] ?? [];

            if (empty($nombre_proyecto)) {
                $errors['nombre_proyecto'] = "El campo 'Nombre del Proyecto' es obligatorio.";
            } elseif (!preg_match('/^[a-zA-Z0-9 ]+$/', $nombre_proyecto)) {
                $errors['nombre_proyecto'] = "El campo 'Nombre del Proyecto' solo debe contener letras, números y espacios.";
            } elseif (strlen($nombre_proyecto) <= 3 || strlen($nombre_proyecto) >= 50) {
                $errors['nombre_proyecto'] = "El campo 'Nombre del Proyecto' debe tener más de 3 y menos de 50 caracteres.";
            }

            if (empty($descripcion_proyecto)) {
                $errors['descripcion_proyecto'] = "El campo 'Descripción del Proyecto' es obligatorio.";
            } elseif (strlen($descripcion_proyecto) < 50) {
                $errors['descripcion_proyecto'] = "El campo 'Descripción del Proyecto' debe tener al menos 50 caracteres.";
            } elseif (strlen($descripcion_proyecto) >= 200) {
                $errors['descripcion_proyecto'] = "El campo 'Descripción del Proyecto' debe tener menos de 200 caracteres.";
            }

            if (empty($documento_proyecto['name'])) {
                $errors['documento_proyecto'] = "El campo 'Documento del Proyecto' es obligatorio.";
            } elseif (!in_array($documento_proyecto['type'], ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])) {
                $errors['documento_proyecto'] = "El documento debe ser un archivo PDF o DOCX.";
            } elseif ($documento_proyecto['size'] > 5 * 1024 * 1024) {
                $errors['documento_proyecto'] = "El documento no debe exceder los 5 MB.";
            }

            if (!array_filter($errors)) {
                $uploadDir = 'practica_3/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $fileExtension = pathinfo($documento_proyecto['name'], PATHINFO_EXTENSION);
                $uniqueFileName = $nombre_proyecto . '_' . date('YmdHis') . '.' . $fileExtension;
                $uploadFile = $uploadDir . $uniqueFileName;
                
                $nameProject = $nombre_proyecto;
                $descripcionProject = $descripcion_proyecto;

                if (move_uploaded_file($documento_proyecto['tmp_name'], $uploadFile)) {
                    $nombre_documento = $uniqueFileName;
                    $tamaño_documento = $documento_proyecto['size'];
                    $tipo_documento = $documento_proyecto['type'];
                    $formularioEnviado = true;
                    $nombre_proyecto = '';
                    $descripcion_proyecto = '';
                } else {
                    $errors['documento_proyecto'] = "Hubo un error al subir el archivo.";
                }
            }
        }
    }
?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre_proyecto">Nombre del Proyecto:</label>
            <input type="text" name="nombre_proyecto" id="nombre_proyecto" value="<?php echo htmlspecialchars($nombre_proyecto); ?>">
            <div class="error-message"><?php echo htmlspecialchars($errors['nombre_proyecto']); ?></div>
        </div>
        <div class="form-group">
            <label for="descripcion_proyecto">Descripción del Proyecto:</label>
            <textarea name="descripcion_proyecto" id="descripcion_proyecto"><?php echo htmlspecialchars($descripcion_proyecto); ?></textarea>
            <div class="error-message"><?php echo htmlspecialchars($errors['descripcion_proyecto']); ?></div>
        </div>
        <div class="form-group">
            <label for="documento_proyecto">Documento del Proyecto (PDF o DOCX):</label>
            <input type="file" name="documento_proyecto" id="documento_proyecto">
            <div class="error-message"><?php echo htmlspecialchars($errors['documento_proyecto']); ?></div>
        </div>
        <button type="submit" name="submit">Enviar</button>
    </form>

<?php if ($formularioEnviado): ?>
    <div class="result">
        <h3>Datos Enviados</h3>
        <p><strong>Nombre del Proyecto:</strong> <?php echo htmlspecialchars($nameProject); ?></p>
        <p><strong>Descripción del Proyecto:</strong> <?php echo htmlspecialchars($descripcionProject); ?> (Longitud: <?php echo strlen($descripcionProject); ?> caracteres)</p>
        <p><strong>Nombre del Documento:</strong> <?php echo htmlspecialchars($nombre_documento); ?></p>
        <p><strong>Tamaño del Documento:</strong> <?php echo round($tamaño_documento / 1024, 2); ?> KB</p>
        <p><strong>Tipo de Documento:</strong> <?php echo ((htmlspecialchars($tipo_documento)) == 'application/pdf'? 'PDF' : 'DOCX'); ?></p>
    </div>
<?php endif; ?>
</body>
</html>
