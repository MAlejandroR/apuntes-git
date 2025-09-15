
<?php
$segundos_transcurridos_desde_1_enero_1970 = time();
$fecha_actual =date("d-m-Y H:i:s");
$fecha_25_horas_despues_actual=date("d-m-Y H:i:s", time()+(25*60*60));


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="5">
    <title>Document</title>
</head>
<body>
<h1>Ejercicio básico de fechas</h1>
<h2>Segundos transcurridos desde el 1 de enero de 1970 00:00:00
    <span style="color:green">
        <?=$segundos_transcurridos_desde_1_enero_1970?></span></h2>

<h2>Fecha actual  <span style="color:green">
        <?=$fecha_actual?></span></h2>
<h2>25 horas después de la fecha actual
    <span style="color:green">
        <?=$fecha_25_horas_despues_actual?></span></h2>


</body>
</html>