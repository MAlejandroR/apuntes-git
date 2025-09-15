<?php
$e_reg = filter_input(INPUT_POST, 'expresion')?? null;
$texto = filter_input(INPUT_POST, 'cadena') ?? null;
/*
$num_ent = "[0-9]+";
$num_real = "$num_ent(\.$num_ent)?";
$op_real = "[\\+|\\-|\*|\\/]";
echo "Valor de opreal $op_real";
$op_racional = "[\+|\-|*|\:]";
$num_racional = "$num_ent [/]$num_entr";
*/


$rtdo = preg_match("/$e_reg/", $texto);
if ($rtdo)
    $msg = "La cadena $texto cumple la expresión regular ";
else
    $msg = "La cadena $texto NOOOOO cumple la expresión regular ";
?>



<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="estilo.css" media="screen" />
    </head>
    <body>
        <fieldset>
            <legend>Validar expresiones regulares</legend>
            <form action="." method="POST">

                <label for="expresion">Expresión</label>
                <input type="text" name="expresion" value= "<?= $e_reg; ?>"  ><br>
                <label for="cadena">Cadena</label>
                <input type="text" name="cadena" value=""<?= $texto; ?>""><br>
                <input type="submit" name="enviar" value="Enviar">
                <?php echo $msg; ?>
            </form>
        </fieldset>
    </body>
</html>
