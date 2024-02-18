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

    <link rel="stylesheet" href="./style.css">
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
    $query = "SELECT consulta.id_consulta, consulta.id_paciente, consulta.id_medico, consulta.id_servicio, consulta.diagnostico, consulta.fecha,
    medicos.nombre_medico, paciente.nombre_paciente, servicio.nombre_servicio
    FROM consulta JOIN paciente ON paciente.id_paciente = consulta.id_paciente 
    JOIN medicos ON medicos.id = consulta.id_medico
    JOIN servicio ON servicio.id = consulta.id_servicio";
    $resultado = mysqli_query($conexiondb, $query);
    mysqli_close($conexiondb);
    ?>

    <div class="container">
        <div class="title" align="center">
            
        <h1 style="color: orange;">
            Consultas Medicas
        </h1>
        </div>
        <div class="btnAdd">
        <a href="./registrar_consulta.php" data-id="" data-bs-toggle="" data-bs-target="" class="btn btn-success btn-sm">Registrar Consulta</a>
        </div>
        <table class="table table-light table-hover">
            <tr>
                <th scope="col">Nro</th>
                <th scope="col">Nombre Paciente</th>
                <th scope="col">Nombre Medico</th>
                <th scope="col">Motivo de Consulta</th>
                <th scope="col">Diagnostico</th>
                <th scope="col">Fecha Consulta</th>
                <th scope="col">Opciones</th>
            </tr>


            <tbody>
                <?php
                $i = 1;
                while ($consulta = mysqli_fetch_assoc($resultado)) {
                    echo ("<tr>");
                    echo "<th scope='row'>" . $i++ . "</th>";
                    echo "<td>" . $consulta['nombre_paciente'] . "</td>";
                    echo "<td>" . $consulta['nombre_medico'] . "</td>";
                    echo "<td>" . $consulta['nombre_servicio'] . "</td>";
                    echo "<td>" . $consulta['diagnostico'] . "</td>";
                    echo "<td>" . $consulta['fecha'] . "</td>";
                    echo "<td>
                            <a href='editar_consulta.php?id_consulta=" . $consulta['id_consulta'] . "' class='btn btn-success mx-1 my-1'>Editar</a> 
                            <a href='eliminar_consulta.php?id_consulta=" . $consulta['id_consulta'] . "' class='btn btn-danger mx-1 my-1'>Eliminar</a>
                            <a href='generar_ticket.php?id_consulta=" . $consulta['id_consulta'] . "' class='btn btn-success mx-1 my-1'>Generar Ticket</a> 
                         </td>";
                    echo ("</tr>");
                }
                ?>
            </tbody>
        </table>
    </div>


</body>

</html>