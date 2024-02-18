

<?php
// Incluir el archivo de conexión a la base de datos
include('db.php');
include('menu.php');

// Establecer la conexión a la base de datos
$conexiondb = conectardb();

// Consulta SQL para seleccionar todos los registros de la tabla auditoria
$query = "SELECT * FROM auditoria";

// Ejecutar la consulta SQL
$resultado = mysqli_query($conexiondb, $query);

// Verificar si hay registros
if (mysqli_num_rows($resultado) > 0) {
    // Mostrar una tabla para los resultados
    echo "<h2>Registros de Auditoría</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Usuario</th><th>Evento</th><th>Fecha</th></tr>";

    // Iterar sobre los resultados y mostrar cada registro en una fila de la tabla
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>".$fila['id']."</td>";
        echo "<td>".$fila['usuario']."</td>";
        echo "<td>".$fila['evento']."</td>";
        echo "<td>".$fila['fecha']."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    // Mostrar un mensaje si no hay registros
    echo "No se encontraron registros de auditoría.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexiondb);
?>
<style>
    table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}

</style>