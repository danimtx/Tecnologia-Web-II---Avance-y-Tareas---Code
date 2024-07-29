<?php
require("includes/funciones.php");
$nombreErr = $apellidoErr = $telefonoErr = "";
$flag = true;
        $nombre = $apellido = $telefono = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nombre"])) {
            $nombreErr = "El nombre es obligatorio";
            $flag = false;
        } elseif (strlen($_POST["nombre"]) > 20) {
            $nombreErr = "El nombre no debe tener más de 20 caracteres";
            $flag = false;
        } else {
            $nombre = $_POST["nombre"];
        }
        if (empty($_POST["apellido"])) {
            $apellidoErr = "El apellido es obligatorio";
            $flag = false;
        }
        elseif(strlen($_POST["apellido"]) > 20) {
            $apellidoErr = "El apellido debe ser menor a 20 caracteres";
            $flag = false;
        }
        else {
            $apellido = $_POST["apellido"];
        }

        if (empty($_POST["telefono"])) {
            $telefonoErr = "El teléfono es obligatorio";
            $flag = false;
        }
        elseif (!ctype_digit($_POST["telefono"])) {
            $telefonoErr = "El teléfono debe contener solo números";
            $flag = false;
        }
        elseif(log10((int)$telefono)+1 > 6){
            $telefonoErr = "El teléfono debe ser menor a 6 dijitos";
            $flag = false;
        }
        else {
            $telefono = $_POST["telefono"];
        }
        if($flag){
            insertar($nombre, $apellido, $telefono);
            echo "<br>INSERTADO CORRECTAMENTE ...";
        }

    }
?>

<form class="contact-form" action="" method="post">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
       <span class="error"><?php echo $nombreErr; ?></span>
    </div>
    <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($apellido); ?>">
        <span class="error"><?php echo $apellidoErr; ?></span>
    </div>
    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" value="<?php echo htmlspecialchars($telefono); ?>">
        <span class="error"><?php echo $telefonoErr; ?></span>
    </div>
    <button type="submit">Enviar</button>
</form>