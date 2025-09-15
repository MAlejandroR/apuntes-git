<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Probando echo</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<table>
    <caption>Tabla ASCII</caption>
    <tr>
        <th>Valor entero</th>
        <th>Carácter ascii</th>
    </tr>
    <?php
    for ($n=32; $n<128; $n++){
        printf("<tr>
                   <td>%d</td>
                   <td>%c</td>
                 </tr>",$n,$n);
    };
    ?>
</table>


</body>
</html>