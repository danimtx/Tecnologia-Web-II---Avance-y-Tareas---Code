<?php
if (isset($_POST['nombre']))
{
    $nombre = "galleta";
    $valor = $_POST["nombre"]."|".$_POST['password'];
    // 60 minutos, 60 segundos, 24 horas
    $fecha = time()+(60*60*24);
    setcookie($nombre,$valor,$fecha);

}
else{
    $recordar = "";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica Cookies</title>
</head>
<body>
    <p>
        <?php
            if (isset($_COOKIE['galleta']))
            {
                $datos = explode('|',$_COOKIE['galleta']);
                $usuario = $datos[0];
                $contraseña = $datos[1];
                $recordar = "on";
                echo $usuario;

            }
        ?>
    </p>

    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" value="<?php echo($recordar=="on")?$contraseña:"";?>">
        <label for="recordar">Recordar</label>
        <input type="checkbox" name="recordar" checked="<?php if ($recordar=="on") echo('checked')  ?>">
        <input type="submit" value="Enviar">
    </form>

    
    
</body>
</html>