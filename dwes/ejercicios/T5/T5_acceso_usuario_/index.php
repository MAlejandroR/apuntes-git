<?php

//Lo primero activamos las sesiones
session_start();

/**
 * incrementa accesos y los accesos del nombre identificado
 * Si nombre es vacío no incrementa nada
 */
function actualizar_accesos()
{
    $nombre = $_POST['nombre'];

    if ($nombre == "")
        $msj = "<h3>El nombre ha de tener un valor</h3>";
    else {
        //Iniciamos o incrementamos los accesos
        $accesos = $_SESSION['accesos']++;

        //Incementamos loa accesos para un  nombre concreto
        $_SESSION['nombres'][$nombre]++;
    }

    //Leemos el array de nombres guardados en la sesión
    $nombres = $_SESSION['nombres'];

    //Leemos el valor de accesos guardado en la sesión
    $accesos = $_SESSION['accesos'];

    //Creamos el texto a mostrar
    $msj .= "<h2 > Ha habido en total $accesos accesos </h2>";
    foreach ($nombres as $nom => $acceso) {
        $msj .= "<h3 >$nom : $acceso </h3>";
    }
    return $msj;
}


//Evaluamos qué submit nos ha traído aquí
//default => no ha sido ninguno
switch ($_POST['enviar']) {
    case 'borrar_sesion':
        session_destroy();
        $msj = "<h2>Sesión eliminada </h2>";
        break;
    case 'acceder':
        $msj = actualizar_accesos();
        break;
    default:
        $msj = "<h2>Acceda identificándose</h2>";
}


?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>
<!-- ahora con php visualizamos el valor de la variable-->
<div id="msj"><?php echo $msj ?> </div>
<div id="login">
    <fieldset>
        <legend>
            Acceso a la página
        </legend>
        <form action="index.php" method="post">
            <input type="text" name="nombre">
            <input type="submit" value="acceder" name="enviar">
            <input type="submit" value="borrar_sesion" name="enviar">

        </form>
    </fieldset>
</div>

</body>
</html>
