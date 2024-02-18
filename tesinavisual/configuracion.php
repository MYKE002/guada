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
        if ($usuario['id_cargo'] != 1) {
            header("location:./index.php");
        }
}
$conexiondb = conectardb();
$query = "SELECT COUNT(*) total1 FROM usuario";
$resultado = mysqli_query($conexiondb, $query);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atencion Primaria de Salud</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>

    <?php
     include('menu.php')
    ?>
    <link rel="stylesheet" href="./css/index.css">

<section class="content sau2">

<h2 class="title">Configuracion</h2>
<div class="box-container">
    <div class="box">
        <br>
        <i class="uil uil-users-alt"></i>                
        <h3>Cuentas</h3>
        <?php           
                        while ($usuarios = mysqli_fetch_assoc($resultado)) {
                            if ($usuarios['total1']==1){
                            echo "<td align= 'center'>" . $usuarios['total1'] . ' Cuenta Registrada' . "</td>";
                            }else{
                                echo "<td align= 'center'>" . $usuarios['total1'] . ' Cuentas Registradas' . "</td>";
                            }
                    }
        ?>
        <br>
        <br>
        <a class="submitBoton " href="./registrar_cuenta.php">Registrar</a>
        <br>
        <br>
        <a class="submitBotonEditar" href="./listado_cuenta.php">Listado</a>
    </div>
    <div class="box">
    <br>
    <br>        
    <i class="uil uil-signout"></i>
            <h3>Cerrar Sesión</h3>
        <a class="submitBoton " href="./cerrar_sesion.php">Cerrar Sesión</a>
    </div>


</div>

</section>
</body>

</html>