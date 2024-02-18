<?php
require('db.php');

$id_medico = $_GET['id_medico'];

$conexiondb = conectardb();

try{$query ="DELETE FROM medicos WHERE id_medico=".$id_medico;
}finally{
    echo "<script>alert('Registros Actualizados');
    window.location.href='./listado_medico.php'</script>";
}
$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    $evento = "Eliminación de Medico: Nombre: " . $nombre_medico . ", Cédula: " . $cedula;
        guardarAuditoria($conexiondb, $usuario, $evento);
    echo "<script>alert('Registro Eliminado');
    window.location.href='./listado_medico.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='./listado_medico.php'</script>";
}
function guardarAuditoria($conexion, $usuario, $evento) {
    $usuario = "Admin"; 
    $query = "INSERT INTO auditoria (usuario, evento) VALUES ('$usuario', '$evento')";
    mysqli_query($conexion, $query);
}
?>