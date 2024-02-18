<?php
session_start();
include './db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:./index.php");
}
$conexiondb = conectardb();
    $sql = "SELECT id_cargo FROM `usuario` WHERE usuario = '$usuario';";
    $resultado = mysqli_query($conexiondb, $sql);
    while ($usuario= mysqli_fetch_assoc($resultado)) {
        if ($usuario['id_cargo'] != 1) {
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
     include('menu.php')
    ?>
    <link rel="stylesheet" href="./css/index.css">

    <header class="content2 header">
        <h2 class="title">DESCRIPCION</h2>
        <p>
        La importancia de la Psicología como servicio de salud presenta hoy día un elemento influyente en los quehaceres institucionales, a partir de esta realidad las instituciones han incorporado en sus planteles servicios asistenciales en el área de la psicología a través de sesiones terapéuticas individuales y grupales, ya que este tipo de tratamientos pueden ayudar a mejorar la calidad de vida de muchos trabajadores. 
        
        </p>
        <p>
        Acompañamos al paciente en todo lo que sea necesario para lograr un cambio de aquello que está perturbando y produciendo un estado de desequilibrio o enfermedad
        </p>
        

        <div class="">
            <a href="#" class="btn-home">Saber mas</a>
        </div>
    </header>
</body>
</html>