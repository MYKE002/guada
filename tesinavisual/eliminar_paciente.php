<?php
session_start(); // Iniciar sesión si no se ha iniciado todavía
require('db.php');

$conexiondb = conectardb();

$id_paciente = $_GET['id_paciente'];


try {
    // Obtener el nombre y la cédula del paciente antes de eliminarlo
    $query_info_paciente = "SELECT cedula, nombre_paciente FROM paciente WHERE id_paciente=" . $id_paciente;
    $resultado_info_paciente = mysqli_query($conexiondb, $query_info_paciente);
    $fila_info_paciente = mysqli_fetch_assoc($resultado_info_paciente);
    $nombre_paciente = $fila_info_paciente['nombre_paciente'];
    $cedula_paciente = $fila_info_paciente['cedula'];

    // Eliminar el paciente
    $query = "DELETE FROM paciente WHERE id_paciente=" . $id_paciente;
    $respuesta = mysqli_query($conexiondb, $query);

    if ($respuesta) {
        // Registro exitoso, guardamos en la tabla de auditoría
        $evento = "Eliminación de paciente: Nombre: " . $nombre_paciente . ", Cédula: " . $cedula_paciente;
        guardarAuditoria($conexiondb, $usuario, $evento);
        echo "<script>alert('Registro Eliminado'); window.location.href='./listado_paciente.php'</script>";
    } else {
        echo "<script>alert('No se pudo Eliminar'); window.location.href='./listado_paciente.php'</script>";
    }
} catch (Exception $e) {
    // Manejo de excepciones si ocurre algún error en la ejecución de la consulta
    echo "<script>alert('Error al eliminar el registro: " . $e->getMessage() . "'); window.location.href='./listado_paciente.php'</script>";
}

mysqli_close($conexiondb);

function guardarAuditoria($conexion, $usuario, $evento) {
    $usuario = "Admin"; 
    $query = "INSERT INTO auditoria (usuario, evento) VALUES ('$usuario', '$evento')";
    mysqli_query($conexion, $query);
}
?>
