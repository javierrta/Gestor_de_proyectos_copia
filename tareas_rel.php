<?php
require_once("controladores/controlador.php");

//session_start();

if (!isset($_SESSION['id'])) {
//$usuId = $_SESSION['id'];
    $usuId = 5;
//$accionId = $_REQUEST['accionId'];
//echo $usuId;


    if (isset($_POST['idTarea'])) {
        $idTarea = $_POST['idTarea'];
        $sql = "DELETE FROM `tareas` WHERE tar_id = $idTarea";
        $response = controlador::delete($sql);
    }

    $sql = "SELECT tar_id, tar_nombre, tar_fr_inicio, tar_fr_fin, tar_ft_inicio, tar_ft_fin, tar_usu_id, u.usu_nombre,
                    tar_duracion, s.sit_nombre as tar_sit_id, tar_acc_id, tar_obs
            FROM tareas 
            INNER JOIN situaciones s on tareas.tar_sit_id = s.sit_id 
            INNER JOIN usuarios u on tareas.tar_usu_id = u.usu_id
            WHERE tar_usu_id = 5 AND tar_acc_id = 1";
    $response = controlador::select($sql);
    $datos = json_decode($response);


}

?>

<!DOCTYPE html>
<html lang="esES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación de tareas</title>
</head>
<body>
<header>
    <h1>Relación de tareas del proyecto <?php echo 'id de acción'//$accionId ?></h1>
</header>
<main>
    <table>
        <tr>
            <th>
                id de tarea
            </th>
            <th>
                nombre de tarea
            </th>
            <th>
                F. real inicio
            </th>
            <th>
                F. real fin
            </th>
            <th>
                F. teórica inicio
            </th>
            <th>
                F. teórica fin
            </th>
            <th>
                id de usuario
            </th>
            <th>
                duración
            </th>
            <th>
                situación
            </th>
            <th>
                id de acción
            </th>
            <th>
                observaciones
            </th>
            <?php if ($usuId == $usuId) : ?>
                <th style="border: greenyellow 1px solid; ">
                    Modificar
                </th>
                <th style="border: greenyellow 1px solid; ">
                    Borrar
                </th>
            <?php endif; ?>
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
                    <?php echo($registro->tar_fr_inicio) ?>
                </td>
                <td>
                    <?php echo($registro->tar_fr_fin) ?>
                </td>
                <td>
                    <?php echo($registro->tar_ft_inicio) ?>
                </td>
                <td>
                    <?php echo($registro->tar_ft_fin) ?>
                </td>
                <td>
                    <?php echo($registro->usu_nombre) ?>
                </td>
                <td>
                    <?php echo($registro->tar_duracion) ?>
                </td>
                <td>
                    <?php echo($registro->tar_sit_id) ?>
                </td>
                <td>
                    <?php echo($registro->tar_acc_id) ?>
                </td>
                <td>
                    <?php echo($registro->tar_obs) ?>
                </td>
                <?php if ($usuId == $usuId) : ?>
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