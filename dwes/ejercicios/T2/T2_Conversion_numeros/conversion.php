<?php
//AQUÏ EL CONTROLADOR

/**
 * @param $num el número a convertir
 * @return string html con una tabla y los valores convertidos
 */
function tabla($num)
{
    //Obtenemos los valores en otros sistmeas
    $hex=dechex($num);
    $oct=decoct($num);
    $bin=decbin($num);

    //Generamos la tabla, primero los títutlos
    $html = "<table border =1px solid>";
    $html .= "<tr><td> Decimal</td>";
    $html .= "<td> Hexadecimal</td>";
    $html .= "<td>Octal</td>";
    $html .= "<td> Binario</td>";
    $html .= "</tr>";
    //Ahora otra fila con los valores
    $html .= "<tr><td> $num</td>";
    $html .= "<td> $hex</td>";
    $html .= "<td> $oct</td>";
    $html .= "<td> $bin</td>";
    $html .= "</tr>";

    $thml .= "</table>";

    return $html;

}


//Leo en valor del campo de texto del formulario
//cuyo name es num
$num = $_POST['num'];

//Verifico si es o no numérico
if (is_numeric($num))
    //Si lo es guardo en una variable el html de la tabla
    $msj = tabla($num);
else
    //Si no genero un mensaje de error
    $msj = "<h1>El valor <span style=color:red>$num </span>no es numérico y debe serlo</h1>";
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Document</title>
</head>
<body>
<h1>Conversión de números en sistemas numéricos</h1>
<?php
//Visualizo la variable generado en el controlador
//será o la tabla o un mensaje de error
echo "$msj"
?>

</body>
</html>
