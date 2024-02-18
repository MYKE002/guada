<?php
require('db.php');

$id_consulta = $_GET['id_consulta'];

$conexiondb = conectardb();

try{$query ="DELETE FROM consulta WHERE id_consulta=".$id_consulta;
}finally{
    echo "<script>alert('Registros Actualizados');
    window.location.href='./consulta.php'</script>";
}
$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Registro Eliminado');
    window.location.href='./consulta.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='./consulta.php'</script>";
}
?>