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
<h2>Fecha actual <strong style="color:coral">{date("d-m-y H:i:s")}</strong></h2>
<hr>

<h3>Primer ejemplo de smarty. Valor de usuareio pasado por controlador <span style="color:red">{$nombre}</span></h3>
    <table>
        <caption>Listado de productos</caption>
        <th>Código</th>        <th>Nombre</th>        <th>Precio</th>
    {foreach $productos as $producto}
        <tr>
        <td>{$producto->get_codigo()}</td>
        <td>{$producto->get_nombre_corto()}</td>
        <td>precio {$producto->get_PVP()}</td>
        </tr>
    {/foreach}
    </table>

</body>
</html>