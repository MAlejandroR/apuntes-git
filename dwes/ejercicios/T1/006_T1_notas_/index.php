<?php
//Generamos el valor aleatorio
$nota = rand(0,10);


//Evaluamos y mostramos mensajes
//Observa las comparaciones
//Comprende el último else
//....
if ($nota <=3){
    $msj = "Necesitas estudiar algo";
}
elseif ($nota==4){
    $msj = "Necesitas mejorar";
}
elseif ($nota==5){
    $msj =  "Tienes conocimientos suficientes";
}
elseif ($nota>=8){
    $msj = "Tienes conocimientos buenos";
}
else{
    $msj = "Conocimientos excelentes";
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
<h1>Con F5 podrás recargar la página voviendo a ejecutarla </h1>
<hr />
<?php  echo "<h2>Con la nota <span style='color:crimson'>$nota</span> <br />$msj" ?>

</body>
</html>

