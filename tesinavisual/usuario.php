<?php
session_start();
include 'db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:./index.php");
}
$conexiondb = conectardb();
    $sql = "SELECT id_cargo FROM `usuario` WHERE usuario = '$usuario';";
    $resultado = mysqli_query($conexiondb, $sql);
    while ($usuario= mysqli_fetch_assoc($resultado)) {
        if ($usuario['id_cargo'] != 2) {
            header("location:./index.php");
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTORIO PSICOLOGICO</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>

<?php
     include('menu_usuario.php')
    ?>
    <link rel="stylesheet" href="./css/index.css">

    <header class="content2 header">
        <h2 class="title">ATENCION PRIMARIA DE SALUD</h2>
        <p>
        La atención primaria de salud (APS) es la asistencia sanitaria esencial accesible a todos los individuos
        y familias de la comunidad a través de medios aceptables para ellos, con su plena participación y a un costo asequible para la comunidad y el país.
        </p>

        <div class="">
            <a href="#" class="btn-home">Saber mas</a>
        </div>
    </header>

    <link rel="stylesheet" href="./css/index.css">
</body>
</html>