<?php
//Generamos el valor aleatorio
$num = rand(1,5000);


//Evaluamos y mostramos mensajes
//Observa las comparaciones
if ($num %2 ===0)
    $msj= "El número <span style='color:darkblue'> $num</span> es par";
else
    $msj= "El número <span style='color:darkblue'>$num</span> no es par";
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
<?php  echo "<h2>$msj</h2>" ?>

</body>
</html>

