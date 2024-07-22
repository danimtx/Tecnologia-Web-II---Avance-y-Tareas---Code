<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <!--style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: calc(100% - 20px);
            padding: 8px 10px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus,
        select:focus {
            border-color: #007BFF;
        }

        textarea {
            resize: vertical;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 8px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group.radio-group {
            display: flex;
            flex-wrap: wrap;
        }

        .form-group.radio-group label {
            margin-right: 16px;

        }

        .form-group.checkbox-group {
            display: flex;
            align-items: center;
        }

        .form-group.checkbox-group input {
            margin-right: 10px;
            margin-left: 10px;
        }

        .form-group.checkbox-group label {
            margin-right: 10px;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: -12px;
            margin-bottom: 12px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style-->
    <style> 
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 15px;
            margin-bottom: 12px;
        }
        
    </style>
</head>
<body>
<?php
    $errors = [
        'nombre' => '',
        'apellido' => '',
        'correo' => '',
        'comentarios' => '',
        'idioma' => '',
        'musica' => '',
        'pasatiempo' => '',
    ];

    if (isset($_POST['submit'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"] ?? '';
            $apellido = $_POST["apellido"] ?? '';
            $correo = $_POST["correo"] ?? '';
            $comentarios = $_POST["comentarios"] ?? '';
            $idioma = $_POST["idioma"] ?? '';
            $musica = $_POST["musica"] ?? '';
            $pasatiempos = $_POST["pasatiempo"] ?? [];
    
            if (empty($nombre)) {
                $errors['nombre'] = "El campo 'Nombre' es obligatorio.";
                echo "<style> .test{
            background-color : red;
            }
            .text-red{
                color : red;
            }</style>";
            } elseif (strlen($nombre) <= 3 || strlen($nombre) >= 20) {
                $errors['nombre'] = "El campo 'Nombre' debe tener más de 3 y menos de 20 caracteres.";
                echo "<style> .test{
                    background-color : red;
                    }
                    .text-red{
                        color : red;
                    }</style>";
            }
    
            if (empty($apellido)) {
                $errors['apellido'] = "El campo 'Apellido' es obligatorio.";
                echo "<style> .test{
                    background-color : red;
                    }
                    .text-red{
                        color : red;
                    }</style>";
            } elseif (strlen($apellido) <= 3 || strlen($apellido) >= 20) {
                $errors['apellido'] = "El campo 'Apellido' debe tener más de 3 y menos de 20 caracteres.";
                echo "<style> .test{
                    background-color : red;
                    }
                    .text-red{
                        color : red;
                    }</style>";
            }
    
            if (empty($correo)) {
                $errors['correo'] = "El campo 'Correo' es obligatorio.";
                echo "<style> .test{
                    background-color : red;
                    }
                    .text-red{
                        color : red;
                    }</style>";
            } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $errors['correo'] = "El formato del 'Correo' no es válido.";
                echo "<style> .test{
                    background-color : red;
                    }
                    .text-red{
                        color : red;
                    }</style>";
            }
    
            if (empty($comentarios)) {
                $errors['comentarios'] = "El campo 'Comentarios' es obligatorio.";
                echo "<style> .test{
                    background-color : red;
                    }
                    .text-red{
                        color : red;
                    }</style>";
            } elseif (strlen($comentarios) <= 5 || strlen($comentarios) >= 50) {
                $errors['comentarios'] = "El campo 'Comentarios' debe tener más de 5 y menos de 50 caracteres.";
                echo "<style> .test{
                    background-color : red;
                    }
                    .text-red{
                        color : red;
                    }</style>";
            } elseif (preg_match('/[\*.,\/@]/', $comentarios)) {
                $errors['comentarios'] = "El campo 'Comentarios' no debe contener los caracteres *, ., /, @.";
                echo "<style> .test{
                    background-color : red;
                    }
                    .text-red{
                        color : red;
                    }</style>";
            }
            
            if (empty($idioma)) {
                $errors['idioma'] = "El campo 'Idioma' es obligatorio.";
                echo "<style> .test{
                    background-color : red;
                    }
                    .text-red{
                        color : red;
                    }</style>";
            }
    
            if (empty($musica)) {
                $errors['musica'] = "El campo 'Musica' es obligatorio.";
                echo "<style> .test{
                    background-color : red;
                    }
                    .text-red{
                        color : red;
                    }</style>";
            }
    
            if (empty($pasatiempos)) {
                $errors['pasatiempo'] = "El campo 'Pasatiempo' es obligatorio.";
                echo "<style> .test{
                    background-color : red;
                    }
                    .text-red{
                        color : red;
                    }</style>";
            }
    
            if (array_filter($errors)) {
                // Do nothing
            } else {
                echo "Formulario enviado correctamente.<br>";
    
                $saludo = "Hola " . htmlspecialchars($nombre) . " " . htmlspecialchars($apellido) . ",<br>";
                $saludo .= "Tu correo es " . htmlspecialchars($correo) . ".<br>";
                $saludo .= "Tus comentarios son: " . htmlspecialchars($comentarios) . ".<br>";
                $saludo .= "Tu idioma es " . htmlspecialchars($idioma) . ".<br>";
                $saludo .= "Tu tipo de música es " . htmlspecialchars($musica) . ".<br>";
    
                if (!is_array($pasatiempos)) {
                    $pasatiempos = [$pasatiempos];
                }
    
                $pasatiempos_list = implode(', ', array_map('htmlspecialchars', $pasatiempos));
                $saludo .= "Tus pasatiempos son: " . $pasatiempos_list . ".<br>";
    
                echo $saludo;
            }
        }
    }

    $select = ['Español', 'ingles', 'aymara', 'portugues', 'otro idioma', 'uno mas', 'y otro', 'a','b','c'];
    $radioButton = ['rock', 'clasico', 'folklore', 'otros', 'esos no', 'o este', 'no se'];
?>

    <form action="" method="post">
        <div class="form-group">
            <label class="text-red" for="nombre">Nombre:</label>
            <input class="test" type="text" name="nombre" id="nombre">
            <div class="error-message"><?php echo htmlspecialchars($errors['nombre']); ?></div>
        </div>
        <div class="form-group">
            <label class="text-red" for="apellido">Apellido:</label>
            <input class="test" type="text" name="apellido" id="apellido">
            <div class="error-message"><?php echo htmlspecialchars($errors['apellido']); ?></div>
        </div>
        <div class="form-group">
            <label class="text-red" for="correo">Correo:</label>
            <input class="test" type="email" name="correo" id="correo">
            <div class="error-message"><?php echo htmlspecialchars($errors['correo']); ?></div>
        </div>
        <div class="form-group">
            <label class="text-red" for="comentarios">Comentarios:</label>
            <textarea class="test" name="comentarios" id="comentarios"></textarea>
            <div class="error-message"><?php echo htmlspecialchars($errors['comentarios']); ?></div>
        </div>
        <div class="form-group">
            <label class="text-red" for="idioma">Idioma:</label>
            <select class="text-red" name="idioma" id="idioma">
            <option value="">Seleccione el idioma</option>
                <?php
                    foreach ($select as $value) {
                        echo '<option value="'.$value.'">'.$value.'</option>';
                    }
                ?>
                
                <!--option value="es">Español</option>
                <option value="in">Inglés</option>
                <option value="fr">Francés</option>
                <option value="ay">Aymara</option>
                <option value="port">Portugués</option-->
            </select>
            <div class="error-message"><?php echo htmlspecialchars($errors['idioma']); ?></div>
        </div>
        <div class="form-group radio-group text-red" >
            <label>Musica:</label>
            <?php
            foreach ($radioButton as $value) {
                echo '<label for="musica-'.$value.'">'.$value.'</label>';
                echo '<input type="radio" name="musica" id="musica-'.$value.'" value="'.$value.'">';
            }

            ?>
            <!--label for="musica-rock">Rock</label>
            <input type="radio" name="musica" id="musica-rock" value="rock">
            <label for="musica-classico">Clásico</label>
            <input type="radio" name="musica" id="musica-classico" value="classico">
            <label for="musica-folklore">Folklore</label>
            <input type="radio" name="musica" id="musica-folklore" value="folklore">
            <label for="musica-otros">Otros</label>
            <input type="radio" name="musica" id="musica-otros" value="otros"-->
            <div class="error-message"><?php echo htmlspecialchars($errors['musica']); ?></div>
        </div>
        <div class="form-group checkbox-group text-red">
            <label for="pasatiempo">Pasatiempo:</label>
            <label for="pasatiempo-jugar">Jugar</label>
            <input type="checkbox" name="pasatiempo[]" id="pasatiempo-jugar" value="jugar">
            <label for="pasatiempo-cantar">Cantar</label>
            <input type="checkbox" name="pasatiempo[]" id="pasatiempo-cantar" value="cantar">
            <label for="pasatiempo-programar">Programar</label>
            <input type="checkbox" name="pasatiempo[]" id="pasatiempo-programar" value="programar"-->
            <div class="error-message"><?php echo htmlspecialchars($errors['pasatiempo']); ?></div>
        </div>

        <button type="submit" name="submit">Enviar</button>
    </form>
</body>
</html>