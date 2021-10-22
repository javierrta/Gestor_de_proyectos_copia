<?php
    require_once("controladores/controlador.php");
    require_once("funciones_auxiliares/funciones_auxiliares.php");

    if (!isset($_SESSION['usuario'])) {
        header("Location:index.php");
        exit();
    }
    $usuId = $_SESSION['usuario']->usu_id;
    $proyectoId = $_REQUEST['proyecto'];
    $accionId = $_REQUEST['accion'];

    if (isset($_POST['idTarea'])) {
        $idTarea = $_POST['idTarea'];
        $sql = "DELETE FROM `tareas` WHERE tar_id = $idTarea";
        $response = controlador::delete($sql);
    }

    $sql = "SELECT t.*, u.usu_nombre, s.sit_nombre
            FROM tareas as t, situaciones as s, usuarios as u
            WHERE 
                t.tar_sit_id = s.sit_id AND
                t.tar_usu_id = u.usu_id AND
                tar_acc_id = $accionId";
            echo $sql;
    $response = controlador::select($sql);
    $datos = json_decode($response);

?>

<!DOCTYPE html>
<html lang="esES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación de tareas</title>
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
<header>
    <h1>Relación de tareas del proyecto <?=$proyectoId?> y Acción <?=$accionId?></h1>
</header>
<main>
    <table>
        <tr>
            <th>id de tarea</th>
            <th>nombre de tarea</th>
            <th>F.REAL Inicio</th>
            <th>F.REAL fin</th>
            <th>F.TEOR Inicio</th>
            <th>F.TEOR Fin</th>
            <th>id de usuario</th>
            <th>duración</th>
            <th>situación</th>
        </tr>
        <?php foreach ($datos as $registro) : ?>
            <tr>
                <td>
                    <?php echo($registro->tar_id) ?>
                </td>
                <td>
                    <?php echo($registro->tar_nombre) ?>
                </td>
                <td>
                    <?php echo(fLimpiar_Fecha($registro->tar_fr_inicio) ) ?>
                </td>
                <td>
                    <?php echo(fLimpiar_Fecha($registro->tar_fr_fin)) ?>
                </td>
                <td>
                    <?php echo(fLimpiar_Fecha($registro->tar_ft_inicio)) ?>
                </td>
                <td>
                    <?php echo(fLimpiar_Fecha($registro->tar_ft_fin)) ?>
                </td>
                <td>
                    <?php echo($registro->usu_nombre) ?>
                </td>
                <td>
                    <?php echo($registro->tar_duracion) ?>
                </td>
                <td>
                    <?php echo($registro->sit_nombre) ?>
                </td>
                <?php if ($usuId == $registro->tar_usu_id) : ?>
                    <td>
                        <form action="tareas_frm.php" method="POST">
                            <input type="hidden" name="idTarea" value="<?php echo($registro->tar_id) ?>">
                            <button name="modificar" value="<?php echo($registro->tar_id) ?>">Modificar
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="idTarea" value="<?php echo($registro->tar_id) ?>">
                            <button name="borrar">Borrar
                            </button>
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

</body>
</html>