<?php

$menu = <<<END

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid"> <a class="navbar-brand" href="#e3f2fd;">


                <a class="navbar-brand" href="admin.php">
                    <h1>PsicoSalud</H1>                
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" href="admin.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="registrar.php">Registrar
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="consulta.php">Consulta Médica
                        </a>
                        </li>


                        <li class="nav-item">
                        <a class="nav-link active" href="pago.php">Pagos
                        </a>
                        
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="configuracion.php">Configuracion
                        </a>

                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="auditoria.php">Auditoria
                        </a>
                </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


</header>
END;

echo ($menu);