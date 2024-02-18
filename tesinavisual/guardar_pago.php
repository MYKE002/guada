<?php
        include('db.php');
        $id_paciente=$_POST['id_paciente'];
        $cedula=$_POST['cedula'];
        $id_medico=$_POST['id_medico'];
        $id_servicio=$_POST['id_servicio'];
        $precio=$_POST['precio'];
        $observacion=$_POST['observacion'];
        $fecha=$_POST['fecha'];
        $editar= $_POST['editar'];

        $conexiondb = conectardb();

        if ($editar == "si") {
            $id_pago = $_POST['id_pago'];
            $query = "UPDATE pago SET id_paciente='" . $id_paciente . "',cedula='" . $cedula ."',id_medico='" . $id_medico . "',id_servicio='" . $id_servicio . "',precio='" . $precio . "',observacion='" . $observacion . "',fecha='" . $fecha . "' WHERE id_pago=" . $id_pago;
        } else {
            $query = "INSERT INTO consulta (id_paciente, cedula, id_medico, id_servicio, precio, observacion, fecha) VALUES 
            ('$id_paciente','$cedula', '$id_medico', '$id_servicio','$precio', '$observacion','$fecha')";
        }
        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Registro Exitoso');
                                       window.location.href='pago.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                                        window.location.href='pago.php'</script>";
            }
         if ($editar == "si") {
                    echo "<script>alert('Registro Exitoso');
            window.location.href='pago.php'</script>";            
        } else {
            echo "<script>alert('Registro Exitoso');
            window.location.href='pago.php'</script>";            
        }
          mysqli_close($conexiondb);
?>