<?php
include('db.php');

// Obtener los datos del formulario
$nombre = $_POST['nombre_servicio'];
$precio = $_POST['precio'];

// Verificar si se está editando o agregando un servicio
$editar = $_POST['editar'];

// Establecer la conexión a la base de datos
$conexiondb = conectardb();

// Preparar la consulta SQL para agregar o editar un servicio
if ($editar == "si") {
    $servicio = $_POST['id_servicio'];
    $query = "UPDATE servicio SET nombre_servicio='$nombre', precio='$precio' WHERE id_servicio=$servicio";
    $evento = "Actualización de Servicio: Nombre: $nombre, Precio: $precio";
} else {
    $query = "INSERT INTO servicio (nombre_servicio, precio) VALUES ('$nombre', '$precio')";
    $evento = "Creación de Servicio: Nombre: $nombre, Precio: $precio";
}

// Ejecutar la consulta SQL
$respuesta = mysqli_query($conexiondb, $query);

// Verificar si la consulta se ejecutó con éxito
if ($respuesta) {
    // Guardar la auditoría
    guardarAuditoria($conexiondb, $usuario, $evento);
    echo "<script>alert('Registro Exitoso');
          window.location.href='listado_servicio.php'</script>";
} else {
    echo "<script>alert('Registro Fallido');
          window.location.href='listado_servicio.php'</script>";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexiondb);

// Función para guardar la auditoría
function guardarAuditoria($conexion, $usuario, $evento) {
    $usuario = "Admin";
    $query = "INSERT INTO auditoria (usuario, evento) VALUES ('$usuario', '$evento')";
    mysqli_query($conexion, $query);
}
?>
