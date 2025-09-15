<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
    <title>Document</title>
</head>
<body>
<?php
header("refresh:2;url=http://localhost/practica1/index.php_");
?>
<div class="solucion">
    <h1>Selecciones en php</h1>
    <div class="parrafo"><div class="bold">
            <?php
                $edad=rand(1,150);

                switch ($edad){
                    case $edad > 0 and $edad <=11:
                        echo "Con $edad años eres un/a niño/a";
                        break;
                    case $edad >= 12 and $edad <=17:
                        echo "Con $edad años eres un adolescente";
                        break;
                    case $edad >= 18 and $edad <= 35:
                        echo "Con $edad eres un jóven";
                        break;
                    case $edad >= 36 and $edad <= 65:
                        echo "Con $edad años eres un/a adulto/a";
                        break;
                    case $edad >= 66 and $edad <= 110:
                        echo "Con $edad años eres un/a jubilado/a";
                        break;
                    default:
                        echo "$edad años, es una edad no contemplada en nuestra encuesta";
                }
            ?>
        </div></div>
    <br />
    <div class="parrafo"><span class="bold"><a href="seleccion.php">Probar otra edad</a></span></div>
</div>
</body>
</html>