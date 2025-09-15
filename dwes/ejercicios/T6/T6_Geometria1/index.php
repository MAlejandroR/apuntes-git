<?php

//Para trabajar con sesiones
spl_autoload_register(function ($class) {
    require_once "$class.php";
});
$x1= $_POST['x1']??150;
$y1= $_POST['y1']??150;
$x2= $_POST['x2']??200;
$y2= $_POST['y2']??200;
$lienzo = new Lienzo(300,300,100,50);
$punto1 = new Punto($x1, $y1, $lienzo);
$punto2 = new Punto($x2, $y2, $lienzo);
$punto1 = $punto1->dibujar(8);
$punto1 = $punto2->dibujar(8);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>
<form action="index.php" method="post">
<fieldset>
    <legend>Coordenadas de los puntos</legend>
    <h3>Punto origen</h3>
    <label for="X">X</label> <input type="text" name="x1" value="<?=$x1?>" id=""><br />
    <label for="Y">Y</label> <input type="text" name="y1" value="<?=$y1?>" id=""><br />
    <h3>Punto final</h3>
    <label for="X">X</label> <input type="text" name="x2" value="<?=$x2?>" id=""><br />
    <label for="Y">Y</label> <input type="text" name="y2" value="<?=$y2?>" id=""><br />
    <h3>Acciones</h3>
    <input type="submit" value="Dibujar Puntos" name="submit">
    <input type="submit" value="Dibujar Línea" name="submit">
    <input type="submit" value="Dibujar Líneas" name="submit">
    <input type="submit" value="Dibjuar Puntos" name="submit">
</fieldset>
</form>

<?=$lienzo?>
</body>
</html>
