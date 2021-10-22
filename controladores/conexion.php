<?php

require_once("configuracion.php");

class conexion
{

    public static function conectar()
    {

        try {
            // Crear una conexión instanciando un objeto PDO y seteándolo
            $PDO = new PDO('mysql:host='.SERVERBD.'; dbname='. BBDD .', '. USERBD . ',' . PASSBD);
            //$PDO = new PDO('mysql:host=localhost; dbname=bd_proyectos', 'root', "");
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $PDO->exec("SET CHARACTER SET utf8");

            return $PDO;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        } finally {
            $PDO = null;
        }
    }
}
