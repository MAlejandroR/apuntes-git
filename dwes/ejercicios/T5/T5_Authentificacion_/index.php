<?php
$productos = ['lechuga' => ['unidades' => 200,
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
if (isset($_POST['comprar'])) {
    //Preparar la factura de la comprar
    //Actualizar el array mira que paso el contenido por referencia
    //Gracias a esto al modificar la variable $des, se modifica el contenido
    //original del array, y no solo la copia del valo que tengo en la variable $des
    //Prueba a quitar el & y observa que no se modifica


    foreach ($productos as $producto => &$des) {
        //Guardamos los datos de la tienda en estado inicial
        $tienda_inicial .= "Producto: <strong>$producto</strong>
                          precio: <strong>{$des['precio']}</strong>
                          unidades: <strong>{$des['unidades']}</strong><br />";
        if (isset($_POST[$producto])) {
            $cantidad = $_POST[$producto];
            if ($cantidad >= $des['unidades'])
                $cantidad = $des['unidades'];
            $imp_parcial = $cantidad * $des['precio'];
            $factura .= " $cantidad $producto a " . $des['precio'] . " = $imp_parcial euros<br />";
            $total += $imp_parcial;
            $des[unidades] -= $cantidad;
            //Guardamos la tienda actualizada con los cambios
            //(Descontando lo vendido e incrementado los precios
            $tienda_actualizada .= "Producto: <strong>$producto</strong>
                          precio: <strong>{$des['precio']}</strong>
                          unidades: <strong>{$des['unidades']}</strong><br />";

        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF - 8">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>
<fieldset style="width: 30 %;margin:40px;background:bisque; font - size:2em">
    <legend>Productos a comprar</legend>
    <form action="index.php" method="POST">
        Lechugas
        <input type="text" name="lechuga" value="10" id="">
        <br/>
        Tomates
        <input type="text" name="tomates" value="10" id="">
        <br/>
        Cebollas
        <input type="text" name="cebollas" value="10" id="">
        <br/>
        Fresas
        <input type="text" name="fresas" value="10" id="">
        <br/>
        Manzanas
        <input type="text" name="manzanas" value="10" id="">
        <br/>
        <input type="submit" value="Comprar" value="10" name="comprar">
    </form>
</fieldset>
<?php
if ($_POST['comprar']) {
    echo "<fieldset><legend>Factura</legend>";
    echo "  $factura  ";
    echo "<h2> total $total </h2> ";
    echo "</fieldset>";
    echo "<fieldset>
    <legend>Estado de la tienda antes de modificaciones</legend>";
        echo "$tienda_inicial ";
    echo "</fieldset>";
    echo "<fieldset>
    <legend>Estado de la tienda actualizada (descontando ventas)</legend>";

    echo "$tienda_actualizada";
}

?>

</body>
</html>

