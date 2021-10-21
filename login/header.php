<?php require_once 'sessions.php' ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identificarse</title>
    <script defer src="js/login.js"></script>
    <link rel="stylesheet" href="estilos/login.css">
</head>

<body>
    <main>
        <div class="bg"></div>
        <div class="form">
            <h1>Gestión de proyectos</h1>
            <div class="links">
                <a href="./?action=acceso">Iniciar sesión</a>
                <a href="./?action=registro">Registrarse</a>
            </div>

            <?php include '_form.php' ?>
