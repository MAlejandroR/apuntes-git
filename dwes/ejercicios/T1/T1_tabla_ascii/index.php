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
<table border="1">
    <tr>
        <th>Valor numérico</th>
        <th>Código ascii</th>
        <th>Valor numérico</th>
        <th>Código ascii</th>
        <th>Valor numérico</th>
        <th>Código ascii</th>
        <th>Valor numérico</th>
        <th>Código ascii</th>
    </tr>
    <?php
    /**
     * Created by PhpStorm.
     * User: manuel
     * Date: 17/10/18
     * Time: 18:23
     */

    $n=32;
    while ($n<(127)){
        echo "<tr>";
        for ($a=0; $a<4;$a++){
            printf("<td>%d</td><td>%c</td>",($n+$a),($n+$a));
        }
        echo "</tr>";
        $n+=$a;

    }

    ?>
</body>
</html>


