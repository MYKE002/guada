<?php
session_start();
include 'db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:./index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTORIO PSICOLOGICO</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php
    $conexiondb = conectardb();
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
    <?php
    $conexiondb = conectardb();
    $query = "SELECT * FROM paciente";
    $query2 = "SELECT * FROM medicos";
    
    $query3 = "SELECT * FROM servicio";
    $resultado = mysqli_query($conexiondb, $query);
    $resultado2 = mysqli_query($conexiondb, $query2);
    
    $resultado3 = mysqli_query($conexiondb, $query3);
    mysqli_close($conexiondb);
    ?>
    <link rel="stylesheet" href="./css/index.css">

    <div class="col-sm-4 offset-sm-4">
        <br>
        <form action="guardar_consulta.php" method="post">

            <!--<input type="hidden" name="">-->

            <H3>
                <th><b><label class="title" for="">REGISTRO DE CONSULTAS:</label></b></th>
            </H3>

            <div class="mb-3">
                <th><b><label for="">Paciente:</label></b></th>
                <select name="id_paciente" class="form-control">
                <?php
                while ($consulta = mysqli_fetch_assoc($resultado)) {
                    echo "<option value=" . $consulta['id_paciente'] . "> " . $consulta['nombre_paciente'] . "</option>";
                }
                ?>
                </select>           
            </div>

            <div class="mb-3">
                <th><b><label for="">Medico:</label></b></th>
                <select name="id_medico" class="form-control">
                <?php
                while ($consulta = mysqli_fetch_assoc($resultado2)) {
                    echo "<option value=" . $consulta['id_medico'] . "> " . $consulta['nombre_medico'] . "</option>";
                }
                ?>
                </select>               
            </div>

            <div class="mb-3">
                <th><b><label for="">Consulta:</label></b></th>
                <select name="id_servicio" class="form-control">
                <?php
                while ($consulta = mysqli_fetch_assoc($resultado3)) {
                    echo "<option value=" . $consulta['id_servicio'] . "> " . $consulta['nombre_servicio'] . "</option>";
                }
                ?>
                </select>               
            </div>

            <div class="mb-3">
                <th><b><label for="">Diagnostico:</label></b></th>
                <th><input class="form-control" type="text" name="diagnostico" id=""></th>
            </div> 

            <div class="mb-3">
                <th><b><label for="">Fecha:</label></b></th>
                <th><input class="form-control" type="date" name="fecha" id=""></th>
            </div> 

            <input type="hidden" name="editar" id="" value='no' readonly>
            <input class="btn btn-outline-primary" type="submit" value="GUARDAR">
        </form>
    </div>

    <link rel="stylesheet" href="./css/index.css">
</body>

</body>

</html>