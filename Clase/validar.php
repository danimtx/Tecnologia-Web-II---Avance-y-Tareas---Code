<?php
$nombre = isset($_POST['nombre'])? $_POST['nombre'] : "";
$apellido = isset($_POST['apellido'])? $_POST['apellido'] : "";
$email = isset($_POST['email'])? $_POST['email'] : "";
$comentario = isset($_POST['comentario'])? $_POST['comentario'] : "";
$idioma = isset($_POST['idioma'])? $_POST['idioma']: "";
$musica = isset($_POST['musica'])? $_POST['musica'] : "";
$pasatiempo = isset($_POST['pasatiempo'])? $_POST['pasatiempo'] : [];

function comparar($com){
    $x = ['*','.','/', '@'];
    for ($i=0; $i < strlen($com); $i++) { 
        if($com[$i] == x[0]) return true;
        if($com[$i] == x[1]) return true;
        if($com[$i] == x[2]) return true;
        if($com[$i] == x[3]) return true;
    }
    return false;
}

$errores = ['<label style ="color:red">Error el nombre esta vacio </label><br>',
            '<label style ="color:red">Error el apellido esta vacio</label><br>',
            '<label style ="color:red">Error el email esta vacio</label><br>',
            '<label style ="color:red">Error el comentario esta vacio</label><br>',
            '<label style ="color:red">Error el idioma esta vacio</label><br>',
            '<label style ="color:red">Error el musica esta vacio</label><br>',
            '<label style ="color:red">Error el pasatiempo esta vacio</label><br>',
            '<label style ="color:red">Error el comentario debe estar en este rango 5 < comentario < 50</label> <br>',
            '<label style ="color:red">Error el nombre debe estar en este rango 3 < nombre < 20</label> <br>',
            '<label style ="color:red">Error el apellido debe estar en este rango 3 < apellido < 20</label> <br>',
            '<label style ="color:red">Error el comentario no debe contener "*" - "." - "/" - "@" </label> <br>',];

if(empty($nombre)){
    echo $errores[0] . "<br>";
}
if(empty($apellido)){
    echo $errores[1] . "<br>";
}
if(empty($email)){
    echo $errores[2] . "<br>";
}
if(empty($comentario)){
    echo $errores[3] . "<br>";
}
if(empty($idioma)){
    echo $errores[4] . "<br>";
}
if(empty($musica)){
    echo $errores[5] . "<br>";
}
if(empty($pasatiempo)){
    echo $errores[6] . "<br>";
}
///else{
    echo (strlen($nombre) > 3 && strlen($nombre) < 20)? $nombre : $errores[8];
    echo (strlen($apellido) > 3 && strlen($apellido) < 20)? $apellido : $errores[9];
    echo "email : ". $email . "<br>";
    echo ((strlen($comentario) > 5 && strlen($comentario) < 50)? (preg_match('/[\*\.\@\/]/', $comentario))? $errores[10]: "comentario : ". $comentario . "<br>": $errores[7]);
    echo "idioma : ". $idioma . "<br>";
    echo "musica : ". $musica . "<br>";
    echo "pasatiempos  <br> <pre>";
    var_dump($pasatiempo);
    echo "</pre>";
//}

