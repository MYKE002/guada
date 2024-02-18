<?php
include('db.php');

$nombre = $_POST['nombre_ciudad'];
$editar = $_POST['editar'];

$conexiondb = conectardb();
 

if ($editar == "si") {
    $id_ciudad = $_POST['id_ciudad'];
    $query = "UPDATE ciudad SET nombre_ciudad='" . $nombre . "' WHERE id_ciudad=" . $id_ciudad;
    $evento = "Actualización de ciudad: " . $nombre;
} else {
    $query = "INSERT INTO ciudad (nombre_ciudad) VALUES ('$nombre')";
    $evento = "Creación de ciudad: " . $nombre;
}

$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    // Registro exitoso, guardamos en la tabla de auditoría
    $usuario = "Admin"; 
    guardarAuditoria($conexiondb, $usuario, $evento);
    echo "<script>alert('Registro Exitoso'); window.location.href='listado_ciudad.php'</script>";
} else {
    echo "<script>alert('Registro Fallido'); window.location.href='listado_ciudad.php'</script>";
}

mysqli_close($conexiondb);

function guardarAuditoria($conexion, $usuario, $evento) {
    $query = "INSERT INTO auditoria (usuario, evento) VALUES ('$usuario', '$evento')";
    mysqli_query($conexion, $query);
}
?>
