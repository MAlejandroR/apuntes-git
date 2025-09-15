<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 1/12/17
 * Time: 10:45
 */


class Usuario
{

    //atributo privado de conexión
     private $datos=[] ;//usuario y password


    public  function __construct()
    {
       // $datos = self::autentificar();

    }


    /**
     * Elimina user de variable de sesion
     * Elimina PHP_AUTH_USER de $_SERVER
     *
     */
    public static function limpia_sesion(){
        session_start();
        unset ($_SESSION['user']);
        session_destroy();
        $_SERVER['PHP_AUTH_USER']=null;
    }
    /**
     * Verifica si el usuario se identificado, si no muestra el formulario
     */
    public static   function autentificar()
    {
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            header('WWW-Authenticate: Basic Realm="Contenido restringido"');
            header('HTTP/1.0 401 Unauthorized');
            echo "Usuario no reconocido!";
            exit;
        } else {
            $user = $_SERVER['PHP_AUTH_USER'];
            $pass = $_SERVER['PHP_AUTH_PW'];
            echo "<h1>RETORNANDO -$user- y -$pass-";

            return ["user" => $user, "pass"=>$pass];
        }
    }
}


//End de la clase Usuario.php_
?>