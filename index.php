<?php
    require_once ("controladores/controlador.php");

    echo '<pre>';
    var_export($_POST);
    echo '</pre>';
    $mensaje_error = "";

    if ( isset($_POST['login']) ){
        $sql = "SELECT * FROM usuarios WHERE
                    usu_nombre = '" . $_POST['username'] ."' AND
                    usu_password = md5('" . $_POST['password'] ."')";
        echo $sql;
        $datos = json_decode( controlador::select($sql) );
        echo '<pre>';
        var_export($datos);
        echo '</pre>';
        if (count($datos) == 0){
            $mensaje_error = "Login incorrecto";
        } else {
            session_start();
            $_SESSION['usuario'] = $datos[0];
            header("Location:proyectos_rel.php");
            exit();            
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos</title>
</head>
<body>
<form method="post" action="" name="login-form">       

        <div class="form-group">
            <div class="form-field">
                <label>Usuario</label>
                <input type="text" name="username" pattern="[a-zA-Z0-9]+" placeholder="Usuario" required />
            </div>

            <div class="form-field">
                <label>Contraseña</label>
                <input type="password" name="password" placeholder="Contraseña" required />
            </div>
        </div>

        <button name="login" id="login" value="login">Iniciar sesión</button>
    </form>
    <?=$mensaje_error?>

    <script>
        document.getElementById("login").addEventListener("click", ()=>{

        })
    </script>
</body>
</html>
