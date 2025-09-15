<?php
//Registro el evento
require_once "./../DB.php_";
DB::registra_accion();
header("Location:index.php_");
