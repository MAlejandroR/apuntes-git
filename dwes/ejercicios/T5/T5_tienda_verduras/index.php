<?php
$productos = [

    'lechuga' => ['unidades' => 200,
        'precio' => 0.90],
    'tomates' => ['unidades' => 2000,
        'precio' => 2.15],
    'cebollas' => ['unidades' => 3200,
        'precio' => 0.49],
    'fresas' => ['unidades' => 4800,
        'precio' => 4.50],
    'manzanas' => ['unidades' => 2500,
        'precio' => 2.10],
];


if (isset($_POST['submit'])) { //He presionado comprar comprar
    $total = 0;
    $factura = "<fieldset><legend>Factura de cliente</legend>";
    $inventario = "<fieldset><legend>Nuevo inventario de la tienda</legend>";
    foreach ($productos as $producto => $contenido) {
        $precio = $contenido['precio'];
        $disponible = $contenido['unidades'];
        $pedido = $_POST[$producto];
        $pedido = $pedido > $disponible ? $disponible : $pedido;//Nunca pido más del disponible
        $linea = $pedido * $precio; //Subtotal de la factura
        if ($pedido > 0)//Solo añado la línea si he pedido algo
            $factura .= "<h2>$pedido $producto a $precio €= $linea</h2>";
        $total += $linea;//Voy acumulando el total
        $disponible -= $pedido;//Actualizo el disponible
        $inventario .= "<h2> $producto nuevo disponible $disponible </h2>"; //Voy anotanto el disponible
    }
    //Añadiomos el total a la factura
    $factura .= "<h1 >Total de la factura <span style='color:red'>$total</span></h1>";
    $factura .= "</fieldset>";
    $inventario .= "</fieldset>";

} else {//Si es la primera vez que entro, preparo un formulario
    $form = "<fieldset><legend>Lista de productos</legend>";
    foreach ($productos as $producto => $contenido) {
        $unidades = $contenido['unidades'];
        $precio = $contenido['precio'];

        $form .= "<label id='$producto'>" . ucfirst($producto) . " a $precio € ($unidades disponibles) </label>\n";
        $form .= "<input type='text' name='$producto' /><br />\n";
    }
    $form .= "</fiedset>";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
<?php if (!isset($_POST['submit'])): ?><!--No es la mejor forma, pero es una de ellas
Para ver que quiero mostrar el formulario-->
<form action="index.php" method="post">
    <?= "$form" ?>
    <input type="submit" value="Comprar" name="submit">
</form>
<?php else://En este caso, en lugar del formulario, quiero mostrar la factura y el inventario
    echo $factura;

    echo "<hr />";
    echo $inventario;
    ?>
    <form action="index.php"><!--Añado un botón para volver a comprar-->
        <input type="submit" value="Volver a comprar">
    </form>
<?php endif ?>
</body>
</html>