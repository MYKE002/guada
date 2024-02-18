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

    <link rel="stylesheet" href="./stayle.css">
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
    $query = "SELECT * FROM medicos";
    $resultado = mysqli_query($conexiondb, $query);
    mysqli_close($conexiondb);
    ?>

    <div class="container">
        <h1 style="color: black;">
            Lista de Medicos
        </h1>
        <table class="table table-light table-hover">
            <tr>
                <th scope="col">Nro</th>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Nro Registro</th>
                <th scope="col">Horario Entrada</th>
                <th scope="col">Horario Salida</th>
                <th scope="col">Dias de Trabajo</th>
                <th scope="col">Opciones</th>
            </tr>


            <tbody>
                <?php
                $i = 1;
                while ($medicos = mysqli_fetch_assoc($resultado)) {
                    echo ("<tr>");
                    echo "<th scope='row'>" . $i++ . "</th>";
                    echo "<td>" . $medicos['cedula'] . "</td>";
                    echo "<td>" . $medicos['nombre_medico'] . "</td>";
                    echo "<td>" . $medicos['especialidad'] . "</td>";
                    echo "<td>" . $medicos['registro'] . "</td>";
                    echo "<td>" . $medicos['hora_entrada'] . "</td>";
                    echo "<td>" . $medicos['hora_salida'] . "</td>";
                    echo "<td>" . $medicos['dias_laborales'] . "</td>";

                    echo "<td>
                            <a href='editar_medico.php?id_medico=" . $medicos['id_medico'] . "' class='btn btn-success mx-1 my-1'>Editar</a> 
                            <a href='eliminar_medico.php?id_medico=" . $medicos['id_medico'] . "' class='btn btn-danger mx-1 my-1'>Eliminar</a>
                         </td>";
                    echo ("</tr>");
                }
                ?>
            </tbody>
        </table>
    </div>


</body>

</html>