<?php
require_once("controladores/controlador.php");

$sql = "SELECT * FROM situaciones";
echo $sql."<br>";

$x="CAMBIO";

$x="";

$datos = controlador::select($sql);
echo '<pre>';
var_export(json_decode($datos));
echo '</pre>';

echo "algo";

echo "cambiado en rama otra";

