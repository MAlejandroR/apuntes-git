<?php


error_reporting(E_ALL);
ini_set("display_errors", true);

$carga = fn($clase) => require("./clases/$clase.php_");


spl_autoload_register($carga);


//Evitamos warning....
$productos = [];
$selected = false;

// Instanciar clase BBDD.php_ -> contendra la conexion con la BBDD...
$bd = new BBDD();

$familias = $bd->obtener_familias(); // Obtener los datos de la TABLA familia BBDD...
$titulo = "Selecionar una familia para listar los productos";


// Instanciar clase View.php_ -> Presentación de datos del modelo (resultado en select, tabla...)
$view = new View();
// Obtenemos las Familia (para el elemento - select->option)...
$familia = $_POST['familia'] ?? $_GET['familia'] ?? "";
$html_option = $view->listado_option_familia($familias, $familia);
if ($familia != "") {
    // Sentencia para obtener los productos de la familia seleccionada...
    $titulo = "Listado de productos de la familia $familia";

    $productos = $bd->obtener_productos_familia($familia);
    $campos = $bd->nombres_campos("producto");
    $selected = true;
    $html_thead = $view->tableHead($campos);
    $html_tbody = $view->tableBody($productos, $familia);

}
if (isset($_POST["submit"])&&($_POST['submit']=="Modificar")) {
    $cod = $_POST['codigo']; // Familia seleccionada.
    $familia = $_POST['familia'];
    header("location:editar.php_?cod=$cod&familia=$familia");
    exit;
}
$bd->close(); // Cerrar conexión con la BBDD...
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listar Productos</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="content">
    <h1><?= "$titulo" ?></h1>

    <form action="listado.php" method="POST">
        <select name="familia">
            <?= $html_option ?>
        </select>
        <input type="submit" value="Mostrar Productos" name="submit">

        <br/>
    </form>
        <?php
        if ($selected):?>
            <table>
                <?php
                echo $html_thead;
                echo $html_tbody;
                ?>
            </table>
        <?php endif; ?>

</div>
</body>
</html>