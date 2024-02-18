<?php
session_start();
include 'db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:./index.php");
}



$conexiondb = conectardb();
$query1 = "SELECT COUNT(*) total1 FROM ciudad";
$query2 = "SELECT COUNT(*) total2 FROM servicio";
$query3 = "SELECT COUNT(*) total3 FROM medicos";
$query4 = "SELECT COUNT(*) total4 FROM paciente";


$resultado1 = mysqli_query($conexiondb, $query1);
$resultado2 = mysqli_query($conexiondb, $query2);

$resultado3 = mysqli_query($conexiondb, $query3);
$resultado4 = mysqli_query($conexiondb, $query4);



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> CONSULTORIO PSICOLOGICO</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>


    <?php
    $sql = "SELECT id_cargo FROM `usuario` WHERE usuario = '$usuario';";
    $resultado = mysqli_query($conexiondb, $sql);
    while ($usuario= mysqli_fetch_assoc($resultado)) {
        if ($usuario['id_cargo'] == 1) {
                include('menu.php');
        } else {
            include('menu_usuario.php');
        }
    }
    ?>

    <link rel="stylesheet" href="./css/index.css">

    <section class="content sau">

        <h2 class="title">SISTEMA DE REGISTRO</h2>
        <div class="box-container">

            <div class="box">
                <br>
                <i class="uil uil-head-side"></i>
                <h3>Pacientes</h3>
                <?php
                while ($paciente = mysqli_fetch_assoc($resultado4)) {
                    if ($paciente['total4'] == 1) {
                        echo "<td align= 'center'>" . $paciente['total4'] . ' paciente Registrado' . "</td>";
                    } else {
                        echo "<td align= 'center'>" . $paciente['total4'] . ' Pacientes Registrados' . "</td>";
                    }
                }
                ?>
                <br>
                <br>
                <a class="submitBoton " href="./registrar_paciente.php">Registrar</a>
                <br>
                <br>
                <a class="submitBotonEditar" href="./listado_paciente.php">Listado</a>
            </div>


            <div class="box"> 
                <br>
                <i class="uil uil-location-point"></i>
                <h3>Ciudad</h3>
                <?php
                while ($ciudades = mysqli_fetch_assoc($resultado1)) {
                    echo "<td align= 'center'>" . $ciudades['total1'] . ' Ciudades Registradas' . "</td>";
                }
                ?>
                <br>
                <br>
                <a class="submitBoton " href="registrar_ciudad.php">Registrar</a>
                <br>
                <br>
                <a class="submitBotonEditar" href="./listado_ciudad.php">Listado</a>
             </div> 

             <div class="box"> 
                <br>
                <i class="uil uil-folder-medical"></i>
                <h3>Servicio</h3>
                <?php
                while ($servicio = mysqli_fetch_assoc($resultado2)) {
                    echo "<td align= 'center'>" . $servicio['total2'] . ' Servicio Registradas' . "</td>";
                }
                ?>
                <br>
                <br>
                <a class="submitBoton " href="registrar_servicio.php">Registrar</a>
                <br>
                <br>
                <a class="submitBotonEditar" href="./listado_servicio.php">Listado</a>
             </div> 

           

             <div class="box"> 
                <br>
                <i class="uil uil-user-md"></i>
                <h3>Medico</h3>
                <?php
                while ($medicos = mysqli_fetch_assoc($resultado3)) {
                    echo "<td align= 'center'>" . $medicos['total3'] . ' Medico Registradas' . "</td>";
                }
                ?>
                <br>
                <br>
                <a class="submitBoton " href="registrar_medico.php">Registrar</a>
                <br>
                <br>
                <a class="submitBotonEditar" href="./listado_medico.php">Listado</a>
             </div> 

        </div>

    </section>
</body>

</html>