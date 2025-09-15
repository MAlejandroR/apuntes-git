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
    <h1>Iteraciones en php</h1>
    <div class="parrafo"><div class="bold">La suma de los 100 primeros números pares es
            <?php
            $contador=0;
            $suma=0;
            $numero=0;
            while ($contador<100)
                if ($numero % 2 == 0) {//es un número par
                    $contador++;
                    $suma += $numero;
                }
            

            echo "<span class = 'variable bold'>$suma</span></div></div>";
            ?>
    <br />
</div>
</body>
</html>