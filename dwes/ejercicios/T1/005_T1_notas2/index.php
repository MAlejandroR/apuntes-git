<?php
//Generamos el valor aleatorio
$nota = rand(0, 10);

/*
//Evaluamos y mostramos mensajes
//Observa las comparaciones
//fíjate en la estructura
comparamos el true con cada expresión
cada expresión de los case darán true o false
si es true coincidirá con el valor que quiero comparar -switch (true)-
//....
*/

switch (true) {
    case $nota <= 3:
        $msj = "Necesitas estudiar algo";
        break;
    case $nota == 4:
        $msj = "Necesitas mejorar";
        break;
    case  $nota == 5:
        $msj = "Tienes conocimientos suficientes";
        break;
    case $nota < 9:
        $msj = "Tienes conocimientos buenos";
        break;
    default:
        $msj = "Conocimientos excelentes";
        break;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php echo "<h2>Con la nota <span style='color:crimson'>$nota</span> <br />$msj" ?>

</body>
</html>

