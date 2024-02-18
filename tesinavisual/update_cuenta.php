<?php
include ('db.php');
if (empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['id_cargo'])) {
    echo "<script>alert('Todos los campos son obligatorios');
    window.location.href='update_cuenta.php'</script>";
    }else{
        $nombre=$_POST['nombre'];
        $usuario=$_POST['usuario'];
        $cargo=$_POST['id_cargo'];
        $editar = $_POST['editar'];

        $conexiondb = conectardb();

            $sql="SELECT * FROM usuario WHERE
            nombre='$nombre'";
            $result= mysqli_query($conexiondb, $sql);
            $editar = $_POST['editar'];
            if($editar  = "si"){
                    $id_usuario = $_POST['id_usuario'];
                    $sql="UPDATE usuario SET nombre='" . $nombre . "', usuario='" . $usuario . "', id_cargo='" . $cargo ."' WHERE id_usuario=" . $id_usuario;
                    $result=mysqli_query($conexiondb ,$sql);
                    if($result){
                    echo "<script>alert('Se edito correctamente');
                    window.location.href='./listado_cuenta.php'</script>";
                }else{
                    echo "<script>alert('No se edito correctamente');
                    window.location.href='./listado_cuenta.php'</script>";
                }
            }else{
                echo "<script>alert('El correo ya existe');
                window.location.href='./listado_cuenta.php'</script>";
            } 
    }
?>