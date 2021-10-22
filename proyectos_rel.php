<?php
    require_once("controladores/controlador.php");
    require_once("funciones_auxiliares/funciones_auxiliares.php");

    if (isset($_SESSION['usuario'])) {
        $usu_id = $_SESSION['usuario']->usu_id;
        $usu_nombre = $_SESSION['usuario']->usu_nombre;
        $sql = "SELECT * FROM proyectos, usuarios, situaciones
                         WHERE usu_id = proy_usu_id AND sit_id = proy_sit_id
                         ORDER BY proy_id";
        $datos_recibidos = controlador::select($sql);
        $datos = json_decode($datos_recibidos);
        //var_dump($datos);
    } else {
        header("Location:index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación de Proyectos</title>

    <style>
        *{
            box-sizing: border-box;
        }
        table{
            width: 100%;
        }
        th {
            padding: 10px 1px;
            background-color:#FFC5BE;
            text-align: left;
        }
        td {
            padding: 10px 1px;
        }
        .anadir {
            text-align:center;
            font-size:20px;
            font-weight:800;
            letter-spacing: 2px;
            word-spacing: 7px;
            background-color:IndianRed;
            color:white;
            cursor:pointer;
            height:30px;
        }
        .anadir:hover{
            background-color:#FFC5BE;
            color: black;
        }
        .accion {
            width:90px;
            text-align:center;
            border:1px IndianRed solid;
            cursor:pointer;
            background-color:#FDEBD0;
        }
        .accion:hover{
            background-color: IndianRed;
        }
        .accion_otros{
            width: 270px;
            text-align:center;
            border:1px IndianRed solid;
            cursor:pointer;
            background-color:#FDEBD0;
        }
        .accion_otros:hover{
            background-color: IndianRed;
        }
        .accion_otros_titulo{
            width: 270px;
            text-align:center;
            border:1px IndianRed solid;
            background-color:#FFC5BE;
        }
    </style>
</head>

<body>
    <main>
        <div>        
            <h1 style="color:IndianRed;text-align:center;">GESTOR DE PROYECTOS</h1>
            <h2 style="color:IndianRed;text-align:center;"><?=$usu_nombre?></h2>
        </div>
    
        <div>
            <table border=1 style="margin:0 auto;">
                <tr>
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
                        <td style="width:150px;text-align:center;">
                            <?php echo($registro->proy_nombre) ?>
                        </td>

                        <td style="width:150px;text-align:center;">
                            <?php echo($registro->usu_nombre) ?>
                        </td>

                        <td style="width:150px;text-align:center;">
                            <?=fLimpiar_Fecha( $registro->proy_ft_inicio )?>
                        </td>

                        <td style="width:150px;text-align:center;">
                            <?=fLimpiar_Fecha( $registro->proy_ft_fin )?>
                        </td>

                        <td style="width:150px;text-align:center;">
                            <?=fLimpiar_Fecha( $registro->proy_fr_inicio )?>
                        </td>

                        <td style="width:150px;text-align:center;">
                            <?=fLimpiar_Fecha( $registro->proy_fr_fin )?>
                        </td>

                        <td style="width:90px;text-align:center;">
                            <?php echo($registro->proy_duracion) ?>
                        </td>

                        <td style="width:90px;text-align:center;">
                            <?php echo($registro->sit_nombre) ?>
                        </td>

                    <?php if (($registro->proy_usu_id) == $usu_id) : ?>
                        <td class="accion">Modificar</td>
                        <td class="accion">Borrar</td>
                        <td class="accion">
                            <a href= "acciones_rel.php?proyecto=<?=$registro->proy_id?>">Consultar</a>
                        </td>
                    <?php endif; ?>

                    <?php if (($registro->proy_usu_id) != $usu_id) : ?>                        
                        <td class="accion" colspan="3">
                            <a href= "acciones_rel.php?proyecto=<?=$registro->proy_id?>">Consultar</a>
                        </td>               
                    <?php endif; ?>
                </tr>        
                <?php endforeach; ?>

                <tr>
                    <td colspan="13" class="anadir">Añadir un nuevo proyecto</td>
                </tr>
            </table>
        </div>

    </main>

</body>

</html>