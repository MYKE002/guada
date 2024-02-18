<?php
include('db.php');

// Verificar si se está editando o agregando un médico
$editar = $_POST['editar'];

// Obtener los datos del formulario
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre_medico'];
$especialidad = $_POST['especialidad'];
$registro = $_POST['registro'];
$entrada = $_POST['horario_entrada']; // Nombre corregido
$salida = $_POST['horario_salida']; // Nombre corregido
$dias = $_POST['dias_laborales'];

// Establecer la conexión a la base de datos
$conexiondb = conectardb();

// Preparar la consulta SQL para agregar o editar un médico
if ($editar == "si") {
    $medico = $_POST['id_medico'];
    $query = "UPDATE medicos SET cedula='$cedula', nombre_medico='$nombre', especialidad='$especialidad', registro='$registro', hora_entrada='$entrada', hora_salida='$salida', dias_laborales='$dias' WHERE id_medico=$medico";
    $evento = "Actualización de Medico: Nombre: " . $nombre . ", Cédula: " . $cedula;

} else {
    $query = "INSERT INTO medicos (cedula, nombre_medico, especialidad, registro, hora_entrada, hora_salida, dias_laborales) VALUES ('$cedula', '$nombre', '$especialidad', '$registro', '$entrada', '$salida', '$dias')";
    $evento = "Creación de Medico: Nombre: " . $nombre . ", Cédula: " . $cedula . ", ESpecialidad: " . $especialidad;
}

// Ejecutar la consulta SQL
$respuesta = mysqli_query($conexiondb, $query);

// Verificar si la consulta se ejecutó con éxito
if ($respuesta) {
    guardarAuditoria($conexiondb, $usuario, $evento);
    echo "<script>alert('Registro Exitoso');
          window.location.href='listado_medico.php'</script>";
} else {
    echo "<script>alert('Registro Fallido');
          window.location.href='listado_medico.php'</script>";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexiondb);
?>
