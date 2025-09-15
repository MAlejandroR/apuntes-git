<?php

use clases\DB;

require "incializa.php";
var_dump($_POST);
$opcion = $_POST['opcion'] ?? null;
$cod = $_POST['cod']; //Recogemos la clave de la fila que queremos editar
$tabla = $_SESSION['tabla'];
$db = new DB();
$msj="";
switch ($opcion) {
    case "Guardar":
        foreach ($_POST as $campo => $valor) {
            if ($campo == "submit" )
                continue;
            $fila_nueva[$campo] = $valor;
        }
        if ($db->update($cod, $tabla,$fila_nueva))
            $msj = "Se ha actulizado la fila en la $tabla con código $cod";
        else
            $msj = "No se ha actulizado la fila en la $tabla con código $cod";
    case "Cancelar":
        $msj = $msj==""? "Se cancela la acción de actualizar" : $msj;
//        header("location:sitio.php_?msj=$msj");
        exit();

}


//$fila es un mysqli_stmt
$fila = $db->obtener_fila($cod, $tabla);


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
<form action="editar.php" method="post">
    <?php foreach ($fila as $campo => $valor): ?>
        <label for="<?= $campo ?>"><?= $campo ?></label>
        <input type="text" name="<?= $campo ?>" value=" <?= $valor ?> "><br/>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Guardar">
    <input type="submit" name="submit" value="Cancelar">
</form>

</body>
</html>
