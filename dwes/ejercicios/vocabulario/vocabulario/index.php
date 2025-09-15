<?php
//RF1 Seleccionamos un idioma aleatoriamente
//RF2 mostramos botón de Empezar y volver a visualizar otro idioma



spl_autoload_register(function ($clase){

});



require "class/Directorio.php";
$idiomas = new Directorio();

if ($idiomas->vacio())
    $select = "<span class='titulo'>Actualmente no hay idiomas</span>";
 else {
    $select = "<label id='idioma'>Idiomas</label> <select name='idioma' id='idioma'/>\n";
    foreach ($idiomas->get_contenido_dir() as $idioma)
        $select .= "<option value='$idioma'>$idioma</option> \n";
    $select .= "</select>";
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vocabulario RF1</title>
    <link rel="stylesheet" href="estilo/estilo.css">
</head>
<body>
<fieldset>
    <form action="index.php" method="PO">
    <legend>Idiomas</legend>
        <?= $select ?>
    </form>

</fieldset>


</body>
</html>
