<?php
error_reporting(E_ALL);
ini_set("display_errors", true);

session_start();

require "credenciales.php";
function carga($clase)
{
    require "clases/$clase.php_";
}

spl_autoload_register("carga");
?>