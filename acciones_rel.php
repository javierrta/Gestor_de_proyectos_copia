<?php
    require_once("controladores/controlador.php");
    require_once("funciones_auxiliares/funciones_auxiliares.php");

    if (!isset($_SESSION['usuario'])){
        header("Location:index.php"); 
        exit();       
    }
    $proyectoId=$_GET['proyecto'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acciones</title>
    <style>
        table{
            width: 100%;
        }
        th{
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Relación de tareas del proyecto <?=$proyectoId?></h1>
    <div id="datos">
        <?php
        $id_proyecto = $_GET['proyecto'];
        $sql = "SELECT a.*, s.sit_nombre, u.usu_nombre 
                FROM acciones as a, usuarios as u, situaciones as s
                WHERE
                        a.acc_sit_id = s.sit_id AND
                        a.acc_usu_id = u.usu_id AND
                        a.acc_proy_id = $id_proyecto 
                ORDER BY acc_nombre";
        $lista = json_decode(controlador::select($sql), true);
        /*echo '<pre>';
        var_export($lista);
        echo '</pre>';*/
        $t = "<table>
                <tr>
                    <th>ID</th>
                    <th>ACCIÓN</th>
                    <th>FECHA REAL INICIO</th>
                    <th>FECHA REAL FIN</th>
                    <th>FECHA TEÓRICA INICIO</th>
                    <th>FECHA TEÓRICA FIN</th>
                    <th>USUARIO</th>
                    <th>DURACIÓN</th>
                    <th>SITUACIÓN</th>
                    <th colspan='3'>ACCIONES</th>
                </tr>";
        for ($i = 0; $i<count($lista); $i++) {
            $t .= "<tr>";
            $t .= "     <td>" . $lista[$i]["acc_id"] . "</td>";
            $t .= "     <td>" . $lista[$i]["acc_nombre"] . "</td>";
            $t .= "     <td>" . fLimpiar_Fecha( $lista[$i]["acc_fr_inicio"] ) . "</td>";
            $t .= "     <td>" . fLimpiar_Fecha( $lista[$i]["acc_fr_fin"] ) . "</td>";
            $t .= "     <td>" . fLimpiar_Fecha( $lista[$i]["acc_ft_inicio"] ) . "</td>";
            $t .= "     <td>" . fLimpiar_Fecha( $lista[$i]["acc_ft_fin"] ) . "</td>";
            $t .= "     <td>" . $lista[$i]["usu_nombre"] . "</td>";
            $t .= "     <td>" . $lista[$i]["acc_duracion"] . "</td>";
            $t .= "     <td>" . $lista[$i]["sit_nombre"] . "</td>";

            $id_accion = $lista[$i]["acc_id"];

            if ($lista[$i]["acc_usu_id"] == $_SESSION['usuario']->usu_id) {
                $t .= "<td>" . 
                                "<input type='button' value='Modificar'>" . 
                                "<input type='button' value='Borrar'>" . 
                                "<a href='tareas_rel.php?proyecto=$id_proyecto&accion=$id_accion'>Consultar</a>" . 
                      "</td>";
            }else {
                $t .= "<td colspan='3'>
                            <a href='tareas_rel.php?proyecto=$id_proyecto&accion=$id_accion'>Consultar</a>
                       </td>";
            }            
            $t .= "</tr>";
        }
        $t .= "</table>";
        echo $t;
        ?>
    </div>
</body>
</html>