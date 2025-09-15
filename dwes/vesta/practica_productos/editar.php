<?php

// Cargamos los fichero '.php_' que se van a utilizar...





error_reporting(E_ALL);
ini_set("display_errors", true);

$carga = fn($clase) => require("./clases/$clase.php_");


spl_autoload_register($carga);


$id = $_POST['codigo'] ; // Obtenemos el id enviado por GET al pulsar el BTN...
$familia = $_POST['familia'];

// Instanciar clase BBDD.php_ -> contendra la conexion con la BBDD...
$bd = new BBDD();

$productos = $bd->obtener_producto( $id); // Obtener los datos del producto seleccionado...
$opcion = $_POST['btn']??"";
switch ($opcion){
    case "Actualizar":
        // Obtenemos los valores...
        $producto=$_POST['producto'];
        $producto['cod']=$id;
        if (!is_numeric($producto['PVP'])) {
            $msj = "El precio ha de ser numérico";
        } else {
            $result= $bd->actualiza_producto($producto);
            header("Location: actualizar.php_?r=$result&familia=$familia");// Redirigir (enviando 1=Si modifico, 0=No)
            break;
        }
        $bd->close(); // Cerrar conexión con la BBDD...
        break;

    case "Cancelar":
        header("Location: actualizar.php_?r=0&familia=$familia");// Redirigir (enviando 1=Si modifico, 0=No)
        $bd->close(); // Cerrar conexión con la BBDD...
        exit;
    default:
//        header("location:listado.php_");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar Producto</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="content">
    <h1>Ingrese los nuevos datos para editar el producto</h1>

    <fieldset>
        <legend>Modificar Producto</legend>
        <form action="editar.php" method="POST">
            <div id="inputs">
                <div class="filds">
                    <input type="hidden" name="codigo" value="<?= $productos[0][0] ?? $producto['cod']?? null ?>">
                    <input type="hidden" name="familia" value="<?= $familia ?? null ?>">
                </div>
                <div class="filds">
                    <input type="text" placeholder="Ingresar nombre corto del producto" name="producto[nombre_corto]"
                           value="<?= $productos[0][2] ?? $producto['nombre_corto'] ??null ?>">
                    <label for="">Nombre corto del producto</label>
                </div>
                <div class="filds">
                    <input type="text" placeholder="Ingresar nombre del producto" name="producto[nombre]"
                           value="<?= $productos[0][1] ?? $producto['nombre'] ?? null ?>">
                    <label for="">Nombre del producto</label>
                </div>

                <div class="filds">
                    <textarea placeholder="Ingrese la descripción del producto..." name="producto[descripcion]" cols="30"
                              rows="7"><?= $productos[0][3] ?? $producto['descripcion'] ?? null ?></textarea>
                    <label for="">Descripción del producto</label>
                </div>

                <div class="filds">
                    <div style="color:red"><?=$msj ?? ""?>
                    <input type="text" placeholder= 'Ingresar el precio del producto'  name="producto[PVP]"
                           value="<?= $productos[0][4] ??$producto['PVP']   ?>">
                    <label for="">Precio de venta al público</label>
                </div>
            </div>

            <div id="btn">
                <input type="submit" id="success" value="Actualizar" name="btn">
                <input type="submit" id="cancel" value="Cancelar" name="btn">
            </div>
        </form>
    </fieldset>
</div>
</body>
</html>