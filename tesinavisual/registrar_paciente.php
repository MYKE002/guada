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
    <title>Atencion Primaria de Salud</title>
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
    <link rel="stylesheet" href="./css/index.css">

    <?php
    $conexiondb = conectardb();
    $query2 = "SELECT * FROM ciudad";
    $resultado2 = mysqli_query($conexiondb, $query2);

    mysqli_close($conexiondb);
    ?>

    <div class="col-sm-4 offset-sm-4">
        <br>
        <form action="guardar_paciente.php" method="post">

            <!--<input type="hidden" name="">-->

            <H4>
                <th><b><label class="title" for="">REGISTRO DE PACIENTE:</label></b></th>
            </H4>

            <div class="mb-3">
                <th><b><label for="">Cedula:</label></b></th>
                <th><input class="form-control" type="text" name="cedula" id=""></th>
            </div>
            <div class="mb-3">
                <th><b><label for="">Nombre:</label></b></th>
                <th><input class="form-control" type="text" name="nombre_paciente" id=""></th>
            </div>
            <div class="mb-3">
                <th><b><label for="">Edad:</label></b></th>
                <th><input class="form-control" type="number" name="edad" id=""></th>
            </div>

            <div class="mb-3">
            <th><b><label for="">Ciudad:</label></b></th>
            <select name="id_ciudad" class="form-control">
                <?php
                while ($ciudades = mysqli_fetch_assoc($resultado2)) {
                    echo "<option value=" . $ciudades['id_ciudad'] . "> " . $ciudades['nombre_ciudad'] . "</option>";
                }
                ?>
            </select>
            </div>
            <input type="hidden" name="editar" id="" value='no' readonly>
            <input class="btn btn-outline-primary" type="submit" value="GUARDAR">
        </form>
    </div>

    <link rel="stylesheet" href="./css/index.css">

</body>

</html>