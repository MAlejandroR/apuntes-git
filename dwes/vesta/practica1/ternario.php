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
    <h1>Operador Ternario</h1>
    <div class="parrafo"><div class="bold">
            <?php
                $num=rand(1,1000);
                echo ($num%2==0)? "El número $num es par" : "El número $num es impar";
            ?>
        </div></div>
    <br />
    <div class="parrafo"><span class="bold"><a href="ternario.php">Probar otro número</a></span> </div>
</div>
</body>
</html>