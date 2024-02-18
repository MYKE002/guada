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
    <title>CONSULTORIO PSICOLOGICO</title>

    <link rel="stylesheet" href="./stayle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
<?php
    include('menu.php');
    ?>

    <?php
    $conexiondb = conectardb();
    $query = "SELECT usuario.id_usuario, usuario.nombre, usuario.usuario, usuario.codigo, cargo.descripcion FROM usuario JOIN cargo ON cargo.id = usuario.id_cargo";
    $resultado = mysqli_query($conexiondb, $query);
    mysqli_close($conexiondb);
    ?>

    <div class="container">
        <div align="center">
        <h1 style="color: orange;">
            Lista de Cuentas
        </h1>
        </div>
        <table class="table table-light table-hover">
            <tr>
                <th scope="col">Nro</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nombre de Usuario</th>
                <th scope="col">Cargo</th>
                <th scope="col">Opciones</th>
                <th scope="col">Contraseña</th>
            </tr>


            <tbody>
                <?php
                $i = 1;
                while ($usuario = mysqli_fetch_assoc($resultado)) {
                    echo ("<tr>");
                    echo "<th scope='row'>" . $i++ . "</th>";
                    echo "<td>" . $usuario['nombre'] . "</td>";
                    echo "<td>" . $usuario['usuario'] . "</td>";
                    echo "<td>" . $usuario['descripcion'] . "</td>";
                    echo "<td>
                            <a href='editar_cuenta.php?id_usuario=" . $usuario['id_usuario'] . "' class='btn btn-success mx-1 my-1'>Editar</a> 
                            <a href='eliminar_cuenta.php?id_usuario=" . $usuario['id_usuario'] . "' class='btn btn-danger mx-1 my-1'>Eliminar</a>
                         </td>";
                    echo 
                        "<td>
                            <a href='cambiar_contraseña.php?id_usuario=" . $usuario['id_usuario'] . "' class='btn btn-primary'>Cambiar Contraseña</a>
                        </td>";
                    echo ("</tr>");
                }
                ?>
            </tbody>
        </table>
    </div>


</body>

</html>