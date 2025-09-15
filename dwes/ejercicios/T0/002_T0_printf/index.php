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
    $numero = 125.25412; //Asignamos un valor aleatoria a la variable
    echo "<h2>Visualizaremos la variable <span style='color: darkred'>$numero</span> con diferentes formatos </h2>";

    //Usando printf realizamos lo que pide el enunciado
    printf("<h4>Visualizando como entero -%d-</h4>",$numero);
    printf("<h4>Visualizando como octal -%o-</h4>",$numero);
    printf("<h4>Visualizando como binario -%b-</h4>",$numero);
    printf("<h4>Visualizando como float (f minúscula) -%f-</h4>",$numero);
    printf("<h4>Visualizando como float (F mayúscula) -%F-</h4>",$numero);
    printf("<h4>Visualizando como carácter -%c-</h4>",$numero);
    printf("<h4>Visualizando como string  -%s-</h4>",$numero);
    printf("<h4>Visualizando como notación científica (la e minúscula) -%e-</h4>",$numero);
    printf("<h4>Visualizando como notación científica (la e mayúscula) -%E-</h4>",$numero);
    printf("<h4>Visualizando como float con dos decimales -%.2f-</h4>",$numero);

    ?>

</body>
</html>