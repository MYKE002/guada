<?php
require('db.php');

$id_servicio = $_GET['id_servicio'];

$conexiondb = conectardb();

try{$query ="DELETE FROM servicio WHERE id_servicio=".$id_servicio;
}finally{
    echo "<script>alert('Registros Actualizados');
    window.location.href='./listado_servicio.php'</script>";
}
$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    $evento = "Eliminación de Servicio: Nombre: " . $nombre;
        guardarAuditoria($conexiondb, $usuario, $evento);
    echo "<script>alert('Registro Eliminado');
    window.location.href='./listado_servicio.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='./listado_servicio.php'</script>";
}
function guardarAuditoria($conexion, $usuario, $evento) {
    $usuario = "Admin"; 
    $query = "INSERT INTO auditoria (usuario, evento) VALUES ('$usuario', '$evento')";
    mysqli_query($conexion, $query);
}
?>