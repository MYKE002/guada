<?php
    function conectardb() {
        $servidor = 'localhost';
        $usuario = 'root';
        $contraseña = '';
        $sistemadb = 'psicosalud';

        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $sistemadb);

        return $conexion;
    }
?>