<?php

require_once('conexion.php');

//Controlador que recibe los sql y devuelve Json.

session_start();

/*
if(!isset($_SESSION['categoria'])){
    header("Location: index.php");
    die();
}
*/

class controlador
{

    /**
     *
     * @param $sql
     * @return false|String Json con los datos de la sentencia Select enviada.
     *
     *
     */
    public static function select($sql)
    {

        $dbh = conexion::conectar();

        $stmnt = $dbh->prepare($sql);
        $stmnt->execute();

        $dataShow = $stmnt->fetchAll(PDO::FETCH_CLASS);

        $stmnt = null;
        $dbh = null;

        return json_encode($dataShow);
    }

    /**
     * @param $sql
     * @return int De las filas afectadas.
     */

    public static function update($sql)
    {

        $dbh = conexion::conectar();
        $stmnt = $dbh->prepare($sql);

        $stmnt->execute();
        $affectedRows = $stmnt->rowCount();

        return $affectedRows;

    }

    /**
     * @param $sql
     * @return string con el id generado en la inserción
     */

    public static function insert($sql)
    {
        $dbh = conexion::conectar();
        $stmnt = $dbh->prepare($sql);

        $stmnt->execute();

        if ($stmnt->rowCount() > 0) {
            $idInsertado = $dbh->lastInsertId();
        }
        return $idInsertado;
    }

    /**
     * @param $sql
     * @return int número de filas eliminadas.
     */

    public static function delete($sql)
    {
        $dbh = conexion::conectar();
        $stmnt = $dbh->prepare($sql);

        $stmnt->execute();

        $affectedRows = $stmnt->rowCount();

        return $affectedRows;
    }

}


