<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP: Decxxx()</title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>

<!-- Creamos la tabla fuera del php_, ya que no depende del código -->
<table>
    <caption>Tabla de conversión</caption>
    <tr>
        <th>Entero</th>
        <th>Binario</th>
        <th>Octal</th>
        <th>Hexadecimal</th>
    </tr>

    <?php
    //El contenido de la tabla, cada fila, la generamos con php_

    //Itero 100 veces para obtener una tabla de 100 valore
    for ($n=0;$n<100;$n++){
        //Convierto el número actual en diferentes sistemas de codificación
        $b = decbin($n);
        $o = decoct($n);
        $h = dechex($n);
        echo "<tr>
            <td>$n</td>
            <td>$b</td>
            <td>$o</td>
            <td>$h</td>
         </tr>\n";

    }
    ?>
<!-- No olvidamos cerrar la tabla -->
</table>

</body>
</html>