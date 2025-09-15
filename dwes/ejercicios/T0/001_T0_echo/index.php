<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Probando echo</title>
</head>
<body>
    <?php
    echo "Esto es un mensaje con echo <br />";
    echo "<hr />";
    echo "Ahora inserto el carácter \\n -\n- y ahora el la etiquega -<br />- y fin de la frase<br />";

    echo "<hr />";
    echo "Ahora inserto el carácter \\t -\t\t-. Obsero que no aparece nada pero si veo el código fuente si hay diferencia <br />";
    $nombre = "María";
    echo "Qué fácil es visualizar el valor de la variable \$nombre  <strong>$nombre</strong><br />";
    echo "<hr />";
    ?>

</body>
</html>