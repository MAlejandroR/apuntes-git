<?php
$opcion=$_POST['submit'];
switch ($_POST['submit']) {
 case "Guardar" :
  $msj = "Has presionad guardar";
  break;
 case "Editar" :
  $msj = "Has presionad editar";
  break;
 case "Borrar" :
  $msj = "Has presionad borrar";
  break;
 case "Cancelar" :
  $msj = "Has presionad cancelar";
  break;
 default:
  $msj = "No has seleccionado ninguna opción";
  break;
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h2><?php echo $msj ?></h2>
        <fieldset style="width:30%">
            <legend>Opciones</legend>
            <h2>Selecciona una acción a realizar</h2>
            <form action="index.php" method="POST">
                <input type="submit" value="Guardar" name="submit">
                <input type="submit" value="Cancelar" name="submit">
                <input type="submit" value="Editar" name="submit">
                <input type="submit" value="Borrar" name="submit">
            </form>
        </fieldset>
    </body>
</html>