<?php
require_once("controladores/controlador.php");
if (!isset($_SESSION['usu_id'])) {
    //$usu_id = $_SESSION['usu_id'];
    $usu_id = "1";
    $sql = "SELECT * FROM proyectos 
                        WHERE proy_usu_id = $usu_id 
                        ORDER BY proy_id";
    $datos_recibidos = controlador::select($sql);
    $datos = json_decode($datos_recibidos);

    $sql = "SELECT * FROM proyectos 
                    WHERE proy_usu_id != $usu_id 
                    ORDER BY proy_id";
    $datos_recibidos1 = controlador::select($sql);
    $datos1 = json_decode($datos_recibidos1);
}

echo "<pre>";
var_export($datos);
echo "</pre>";
echo "<br>";
echo "<pre>";
var_export($datos1);
echo "</pre>";


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación de Proyectos</title>

    <style>
        #h1_proy_rel {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h1 id="h1_proy_rel">GESTOR DE PROYECTOS</h1>
    </header>

    <main>
        <div class="div_propietario">
            <table border=1>
                <th>
                    <td>Id del proyecto</td>
                    <td>Proyecto</td>
                    <td>Fecha prevista inicio</td>
                    <td>Fecha prevista fin</td>
                    <td>Fecha real inicio</td>
                    <td>Fecha real fin</td>
                    <td>Duración</td>
                    <td>Situación</td>
                    <td>Observaciones</td>
                </th>
                <?php 
                    echo "<tr>";
                    foreach ($datos as $key => $valor) {
                        echo "<td>" . $valor . "</td>";
                    }
                    echo "</tr>";
                ?>
                <tr>

                </tr>
               
            </table>
        </div>
    </main>


</body>

</html>