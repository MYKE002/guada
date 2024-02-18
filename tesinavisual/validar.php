<?php
$usuario=$_POST['usuario'];
$codigo=md5($_POST['codigo']);
session_start();
$_SESSION['usuario']=$usuario;

include 'db.php';

$conexiondb = conectardb();

$consulta= "SELECT * FROM usuario where usuario ='$usuario' and codigo='$codigo'";
$resultado=mysqli_query($conexiondb,$consulta);

$filas=mysqli_fetch_array($resultado);

if($codigo == isset($filas['codigo'])){
    if(($filas['id_cargo'])==1){ //administrador
        header("location:admin.php");
    
    }else if(($filas['id_cargo'])==2){ //Recepcionista
        header("location:usuario.php");
    }else{
        echo "<script>alert('no existe cuenta');
        window.location.href='index.php'</script>";
    }
}else{
    echo "<script>alert('no existe cuenta');
    window.location.href='index.php'</script>";
}


mysqli_free_result($resultado);
?>