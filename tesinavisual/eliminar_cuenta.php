<?php
require('db.php');

$id_usuario = $_GET['id_usuario'];

$conexiondb = conectardb();

try{$query ="DELETE FROM usuarios WHERE id_usuario=".$id_usuario;
}finally{
    echo "<script>alert('Registro Eliminado');
    window.location.href='./listado_cuenta.php'</script>";
}
$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Registro Eliminado');
    window.location.href='./listado_cuenta.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='./listado_cuenta.php'</script>";
}
?>