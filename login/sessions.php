<?php

/**
 * Valores de opciones select del campo "categoría":
 * proyect (Jefe de proyecto)
 * action (Responsable de acción)
 * task (Responsable de tarea)
 * user (Usuario sin privilegios)
 */

session_start();

// Obtener la acción a realizar (acceder o registrarse) según la url
$action = $_GET['action'] ?? $_POST['action'] ?? '404';

// No establecer las variables hasta enviar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Variables de sesión comunes en formulario de acceso/registro
    $_SESSION['username'] = trim($_POST['username']) ?? null;
    $_SESSION['password'] = trim($_POST['password']) ?? null;

    // Variables de sesión solo en formulario de registro
    if ($action === 'registro') {
        $_SESSION['name'] = trim($_POST['name']) ?? null;
        $_SESSION['surname'] = trim($_POST['surname']) ?? null;
        $_SESSION['id'] = trim($_POST['id']) ?? null;
        $_SESSION['category'] = trim($_POST['category']) ?? null;
    }
}

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
