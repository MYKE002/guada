<?php
        include('db.php');
        $id_paciente=$_POST['id_paciente'];
        $id_medico=$_POST['id_medico'];
        $id_servicio=$_POST['id_servicio'];
        $diagnostico=$_POST['diagnostico'];
        $fecha=$_POST['fecha'];
        $editar= $_POST['editar'];

        $conexiondb = conectardb();

        if ($editar == "si") {
            $id_consulta = $_POST['id_consulta'];
            $query = "UPDATE consulta SET id_paciente='" . $id_paciente . "',id_medico='" . $id_medico . "',id_servicio='" . $id_servicio . "',diagnostico='" . $diagnostico . "',fecha='" . $fecha . "' WHERE id_consulta=" . $id_consulta;
        } else {
            $query = "INSERT INTO consulta (id_paciente, id_medico, id_servicio, diagnostico, fecha) VALUES 
            ('$id_paciente', '$id_medico', '$id_servicio', '$diagnostico','$fecha')";
        }
        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Registro Exitoso');
                                       window.location.href='consulta.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                                        window.location.href='consulta.php'</script>";
            }
         if ($editar == "si") {
                    echo "<script>alert('Registro Exitoso');
            window.location.href='consulta.php'</script>";            
        } else {
            echo "<script>alert('Registro Exitoso');
            window.location.href='consulta.php'</script>";            
        }
          mysqli_close($conexiondb);
?>