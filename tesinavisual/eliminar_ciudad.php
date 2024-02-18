<?php
session_start(); // Iniciar sesión si no se ha iniciado todavía
require('db.php');

$conexiondb = conectardb();

$id_ciudad = $_GET['id_ciudad'];


try {
    // Obtener el nombre de la ciudad antes de eliminarla
    $query_nombre_ciudad = "SELECT nombre_ciudad FROM ciudad WHERE id_ciudad=" . $id_ciudad;
    $resultado_nombre_ciudad = mysqli_query($conexiondb, $query_nombre_ciudad);
    $fila_nombre_ciudad = mysqli_fetch_assoc($resultado_nombre_ciudad);
    $nombre_ciudad = $fila_nombre_ciudad['nombre_ciudad'];

    // Eliminar la ciudad
    $query = "DELETE FROM ciudad WHERE id_ciudad=" . $id_ciudad;
    $respuesta = mysqli_query($conexiondb, $query);

    if ($respuesta) {
        // Registro exitoso, guardamos en la tabla de auditoría
        $evento = "Eliminación de ciudad: " . $nombre_ciudad;
        guardarAuditoria($conexiondb, $usuario, $evento);
        echo "<script>alert('Registro Eliminado'); window.location.href='./listado_ciudad.php'</script>";
    } else {
        echo "<script>alert('No se pudo Eliminar'); window.location.href='./listado_ciudad.php'</script>";
    }
} catch (Exception $e) {
    // Manejo de excepciones si ocurre algún error en la ejecución de la consulta
    echo "<script>alert('Error al eliminar el registro: " . $e->getMessage() . "'); window.location.href='./listado_ciudad.php'</script>";
}

mysqli_close($conexiondb);

function guardarAuditoria($conexion, $usuario, $evento) {
    $usuario = "Admin"; 
    $query = "INSERT INTO auditoria (usuario, evento) VALUES ('$usuario', '$evento')";
    mysqli_query($conexion, $query);
}
?>
