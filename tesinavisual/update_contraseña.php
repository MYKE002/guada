<?php
include ('db.php');
if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['usuario']) || empty($_POST['codigo'])) {
            echo "<script>alert('Todos los campos son obligatorios');
            window.location.href='listado_cuenta.php'</script>";
    } else {
        $usuario= $_POST['usuario'];
        $password=md5($_POST['codigo']);
        $editar = $_POST['editar'];

        $conexiondb = conectardb();

            $sql="SELECT * FROM usuario WHERE
            usuario='$usuario'";
            $result= mysqli_query($conexiondb, $sql);
            $editar = $_POST['editar'];
            if($editar  = "si"){
                    $id_usuario = $_POST['id_usuario'];
                    $sql="UPDATE usuario SET codigo='" . $password . "' WHERE id_usuario=" . $id_usuario;
                    $result=mysqli_query($conexiondb ,$sql);
                    if($result){
                        echo "<script>alert('se edito correctamente');
                        window.location.href='listado_cuenta.php'</script>";
                }else{
                    echo "<script>alert('No se edito correctamente');
                    window.location.href='listado_cuenta.php'</script>";
                }
            }else{
                echo "<script>alert('El correo ya existe');
                window.location.href='listado_cuenta.php'</script>";
            } 
    }
}  
?>