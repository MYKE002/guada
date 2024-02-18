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
     include('menu.php')
    ?>
    <?php
    $conexiondb = conectardb();
    $query = "SELECT * FROM cargo";
    $resultado = mysqli_query($conexiondb, $query);

    $id_cuenta = $_GET['id_usuario'];
    $sql = "SELECT * FROM usuario WHERE id_usuario=" . $id_cuenta;
    $resultado2 = mysqli_query($conexiondb, $sql);
    $cuenta = mysqli_fetch_row($resultado2);

    mysqli_close($conexiondb);
    ?>
    <link rel="stylesheet" href="./css/index.css">

    <div class="col-sm-4 offset-sm-4">
        <br>
        <form action="update_cuenta.php" method="post">

            <!--<input type="hidden" name="">-->

            <H3>
                <th><b><label class="title" for="">REGISTRAR NUEVA CUENTA:</label></b></th>
            </H3>

            <div class="mb-3">
                <th><b><label for="">Nombre Completo:</label></b></th>
                <th><input class="form-control" type="text" name="nombre" id="" value='<?php echo $cuenta[1] ?>'></th>
            </div>
            <div class="mb-3">
                <th><b><label for="">Nombre de Usuario:</label></b></th>
                <th><input class="form-control" type="text" name="usuario" id="" value='<?php echo $cuenta[2] ?>'></th>
            </div>
            <div class="mb-3">
            <th><b><label for="">Seleccione un Cargo</label></b></th>
            <select name="id_cargo" class="form-control">
                <?php
                echo "<option></option>";
                while ($cargo = mysqli_fetch_assoc($resultado)) {
                    echo "<option value=" . $cargo['id'] . "> " . $cargo['descripcion'] . "</option>";
                }
                ?>
            </select>
            </div>
            <input type="hidden" name="id_usuario" id="" value='<?php echo $cuenta[0] ?>' readonly>
            <input type="hidden" name="editar" id="" value='si' readonly>
            <input class="btn btn-outline-primary" type="submit" value="GUARDAR">
        </form>
    </div>

    <link rel="stylesheet" href="./css/index.css">
</body>

</body>

</html>