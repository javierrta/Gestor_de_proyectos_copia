<?php
require_once("controladores/controlador.php")
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acciones</title>
</head>
<body>
    <div id="datos">
        <?php
        $id_proyecto = $_POST['proyecto'];
        $sql = "SELECT * FROM acciones WHERE acc_proy_id = $id_proyecto ORDER BY acc_nombre";
        $lista = json_decode(controlador::select($sql), true);
        $t = "<table><tr><th>ID</th><th>ACCIÓN</th><th>FECHA REAL INICIO</th><th>FECHA REAL FIN</th><th>FECHA TEÓRICA INICIO</th><th>FECHA TEÓRICA FIN</th><th>ID USUARIO</th><th>DURACIÓN</th><th>ID SITUACIÓN</th><th>ID PROYECTO</th><th>OBSERVACIONES</th><th>ACCIONES</th></tr>";
        for ($i = 0; $i<count($lista); $i++) {
            $t .= "<tr>";
            $t .= "<td>" . $lista[$i]["acc_id"] . "</td>";
            $t .= "<td>" . $lista[$i]["acc_nombre"] . "</td>";
            $t .= "<td>" . $lista[$i]["acc_fr_inicio"] . "</td>";
            $t .= "<td>" . $lista[$i]["acc_fr_fin"] . "</td>";
            $t .= "<td>" . $lista[$i]["acc_ft_inicio"] . "</td>";
            $t .= "<td>" . $lista[$i]["acc_ft_fin"] . "</td>";
            $t .= "<td>" . $lista[$i]["acc_usu_id"] . "</td>";
            $t .= "<td>" . $lista[$i]["acc_duracion"] . "</td>";
            $t .= "<td>" . $lista[$i]["acc_sit_id"] . "</td>";
            $t .= "<td>" . $lista[$i]["acc_proy_id"] . "</td>";
            $t .= "<td>" . $lista[$i]["acc_obs"] . "</td>";
            if ($lista[$i]["acc_usu_id"] == $_SESSION['usuario']['usu_id']) {
                $t .= "<td>" . "<input type='button' value='Modificar'>" . "<input type='button' value='Borrar'>" . "</td>";
            }else {
                $t .= "<td></td>";
            }
            
            $t .= "</tr>";
        }
        $t .= "</table>";
        echo $t;
        ?>
    </div>
</body>
</html>