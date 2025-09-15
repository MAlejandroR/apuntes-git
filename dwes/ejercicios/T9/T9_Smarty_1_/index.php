<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 9/04/19
 * Time: 19:08
 */



require_once "DB.php";

require_once "Smarty.class.php_";


$plantilla = new Smarty();

$plantilla->template_dir ="./vistas/template";
$plantilla->compile_dir ="./vistas/template_c";

$con = new DB();
$productos = $con->obtieneProductos();
$nombre = "Manuel";
$num = rand(1,100);



$plantilla->assign("nombre", $nombre);
$plantilla->assign("productos", $productos);
//


$plantilla->display("index.tpl");