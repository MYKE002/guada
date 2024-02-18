<?php
session_start(); // Iniciar sesión si no se ha iniciado todavía
include('db.php');

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre_paciente'];
$edad = $_POST['edad'];
$ciudad = $_POST['id_ciudad'];

$editar = $_POST['editar'];

$conexiondb = conectardb();

if ($editar == "si") {
    $id_paciente = $_POST['id_paciente'];
    $query = "UPDATE paciente SET cedula='" . $cedula . "', nombre_paciente='" . $nombre . "', edad='" . $edad . "', id_ciudad='" . $ciudad ."' WHERE id_paciente=" . $id_paciente;
    $evento = "Actualización de paciente: Nombre: " . $nombre . ", Cédula: " . $cedula;
} else {
    $query = "INSERT INTO paciente (cedula, nombre_paciente, edad, id_ciudad) VALUES ('$cedula', '$nombre', '$edad', '$ciudad')";
    $evento = "Creación de paciente: Nombre: " . $nombre . ", Cédula: " . $cedula;
}

$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    // Registro exitoso, guardamos en la tabla de auditoría
    guardarAuditoria($conexiondb, $usuario, $evento);
    echo "<script>alert('Registro Exitoso'); window.location.href='listado_paciente.php'</script>";
} else {
    echo "<script>alert('Registro Fallido'); window.location.href='listado_paciente.php'</script>";
}

mysqli_close($conexiondb);

function guardarAuditoria($conexion, $usuario, $evento) {
    $usuario = "Admin";
    $query = "INSERT INTO auditoria (usuario, evento) VALUES ('$usuario', '$evento')";
    mysqli_query($conexion, $query);
}
?>
