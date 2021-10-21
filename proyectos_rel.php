<?php
require_once("controladores/controlador.php");

if (!isset($_SESSION['usu_id'])) {
    //$usu_id = $_SESSION['usu_id'];
    $usu_id = "1";
    //$usu_nombre = $_SESSION['usu_nombre'];
    $usu_nombre = "Jefe de proyecto 1";
    $sql = "SELECT * FROM proyectos, usuarios, situaciones
                        WHERE usu_id = proy_usu_id AND sit_id = proy_sit_id
                        ORDER BY proy_id";
    $datos_recibidos = controlador::select($sql);
    $datos = json_decode($datos_recibidos);
/*
    $sql = "SELECT * FROM proyectos
                    WHERE proy_usu_id != $usu_id
                    ORDER BY proy_id";
    $datos_recibidos1 = controlador::select($sql);
    $datos1 = json_decode($datos_recibidos1);
    */
}

echo "<pre>";
var_export($datos);
echo "</pre>";
echo "<br>";
/*
echo "<pre>";
var_export($datos1);
echo "</pre>";
*/

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación de Proyectos</title>

    <style>
        th {
            padding: 10px 1px;
        }
        td {
            padding: 10px 1px;
        }
    </style>
</head>

<body>
    <header>
        
        <h1 style="color:IndianRed;text-align:center;">
            GESTOR DE PROYECTOS
        </h1>
        <h2 style="color:IndianRed;text-align:center;">            
            <?=$usu_nombre?>
        </h2>
    </header>

    <main>
        <div>
            <table border=1 style="margin:0 auto;">
                    <tr style="background-color:#FFC5BE;">
                        <!-- <th>Id del proyecto</th> -->
                        <th>Proyecto</th>
                        <th>Propietario</th>
                        <th>Fecha prevista inicio</th>
                        <th>Fecha prevista fin</th>
                        <th>Fecha real inicio</th>
                        <th>Fecha real fin</th>
                        <th>Duración</th>
                        <th>Situación</th>
                        <!-- <th>Observaciones</th> -->
                        <th colspan="3">Acciones</th>
                    </tr>
                <?php foreach ($datos as $registro) : ?>   
                    <tr class="fila_tabla">
                            <!-- <td style="width:30px;text-align:center;">
                                <?php echo($registro->proy_id) ?>
                            </td> -->
                            <td style="width:150px;text-align:center;">
                                <?php echo($registro->proy_nombre) ?>
                            </td>
                            <td style="width:150px;text-align:center;">
                                <?php echo($registro->usu_nombre) ?>
                                <td style="width:150px;text-align:center;">
                                <?php 
                                    if (($registro->proy_ft_inicio) != "0000-00-00"){
                                        echo($registro->proy_ft_inicio);
                                    } else {
                                        echo "hola";
                                    }
                                ?>                                
                            </td>
                            <td style="width:150px;text-align:center;">
                                <?php 
                                    if (($registro->proy_ft_fin) != "0000-00-00"){
                                        echo($registro->proy_ft_fin);
                                    } else {
                                        echo "";
                                    }
                                ?>
                            </td>
                            <td style="width:150px;text-align:center;">
                                <?php 
                                    if (($registro->proy_fr_inicio) != "0000-00-00"){
                                        echo($registro->proy_fr_inicio);
                                    } else {
                                        echo "";
                                    }
                                ?>
                            </td>
                            <td style="width:150px;text-align:center;">
                                <?php 
                                    if (($registro->proy_fr_fin) != "0000-00-00"){
                                        echo($registro->proy_fr_fin);
                                    } else {
                                        echo "";
                                    }
                                ?>
                            </td>
                            <td style="width:90px;text-align:center;">
                                <?php echo($registro->proy_duracion) ?>
                            </td>
                            <td style="width:90px;text-align:center;">
                                <?php echo($registro->sit_nombre) ?>
                            </td>
                            <!-- <td style="width:400px;padding-left:5px;text-align:left;">
                                <?php echo($registro->proy_obs) ?>
                            </td> -->
                        <?php if (($registro->proy_usu_id) == $usu_id) : ?>
                            <td style="width:90px;text-align:center;border:1px IndianRed solid;cursor:pointer;background-color:#FDEBD0;">
                                <button style="width:90px;background-color:#FDEBD0;">Modificar</button>
                            </td>
                            <td style="width:90px;text-align:center;border:1px IndianRed solid;cursor:pointer;background-color:#FDEBD0;">
                            <button style="width:90px;background-color:#FDEBD0;">Borrar</button>
                            </td>
                            <td style="width:90px;text-align:center;border:1px IndianRed solid;cursor:pointer;background-color:#FDEBD0;">
                            <button style="width:90px;background-color:#FDEBD0;">Consultar</button>
                            </td>
                        <?php endif; ?>
                        <?php if (($registro->proy_usu_id) != $usu_id) : ?>
                            <td colspan="3" style="width:90px;text-align:center;border:1px IndianRed solid;cursor:pointer;background-color:#FDEBD0;">
                            <button style="width:100%;background-color:#FDEBD0;">Consultar</button>
                            </td>                
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="13" style="text-align:center;font-size:20px;font-weight:800;background-color:IndianRed;color:white;cursor:pointer;height:50px;">
                        <button style="width:100%;font-size:20px;background-color:IndianRed;border:none;cursor:pointer;height:50px;">Añadir un nuevo proyecto</button>
                        </td>
                    </tr>

            </table>
        </div>
        <br><br><br>

        <!-- <div class="div_consulta">
            <table border=1 style="margin:0 auto;">
                <tr>
                    <th>Id del proyecto</th>
                    <th>Proyecto</th>
                    <th>Propietario</th>
                    <th>Fecha prevista inicio</th>
                    <th>Fecha prevista fin</th>
                    <th>Fecha real inicio</th>
                    <th>Fecha real fin</th>
                    <th>Duración</th>
                    <th>Situación</th>
                    <th>Observaciones</th>
                </tr>
                <?php foreach ($datos1 as $registro) : ?>
            <tr>
            <td style="width:30px;text-align:center;">
                    <?php echo($registro->proy_id) ?>
                </td>
                <td style="width:150px;text-align:center;">
                    <?php echo($registro->proy_nombre) ?>
                </td>
                <td style="width:150px;text-align:center;">
                    <?php echo($registro->usu_nombre) ?>
                </td>
                <td style="width:150px;text-align:center;">
                    <?php echo($registro->proy_ft_inicio) ?>
                </td>
                <td style="width:150px;text-align:center;">
                    <?php echo($registro->proy_ft_fin) ?>
                </td>
                <td style="width:150px;text-align:center;">
                    <?php echo($registro->proy_fr_inicio) ?>
                </td>
                <td style="width:150px;text-align:center;">
                    <?php echo($registro->proy_fr_fin) ?>
                </td>
                <td style="width:90px;text-align:center;">
                    <?php echo($registro->proy_duracion) ?>
                </td>
                <td style="width:90px;text-align:center;">
                    <?php echo($registro->sit_nombre) ?>
                </td>
                <td style="width:400px;padding-left:5px;text-align:right;">
                    <?php echo($registro->proy_obs) ?>
                </td>
                <?php endforeach; ?> -->
    </main>


</body>

</html>