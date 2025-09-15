<?php

require_once ('Producto.php');

class DB
{

    //atributo privado de conexión
    private static $conexion;

    /* ======================conectar()======================================
      conecta con la base de datos, usando PDO
      da valor al atributo privado y estático $conexion de la clase
      En caso de no conectarse aborta la app y muestra un mensaje
     * ***************************************************************************************** */

    private static function conectar()
    {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=172.17.0.2;dbname=dwes";
        $usuario = 'root';
        $pass = 'root';
        try {
            $conexion = new PDO($dsn, $usuario, $pass, $opc);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Abortamos la aplicación por fallo conectando con la BD' . $e->getMessage());
        }
        self::$conexion = $conexion;
    }

    /* ======================ejecutaConsulta ($sql,$valores)======================================
      Accion: Ejecuta una consulta preparada con los valores de los parámetros de la consulta preparada
      Parámetros: $sql es la consulta preparada y parametrizada
      $valores es un array asociativo con los valores de los distintos
      parámetros de la consulta anterior
      Retorna =La consulta despues de ejecutarla, o null si no la ha podido ejecutaqr
      en caso de no ejecutarla da un mensaje
     * ********************************************************************************************** */

    protected static function ejecutaConsulta($sql, $valores = null)
    {
        if (self::$conexion == null)
            self::conectar();
        $conexion = self::$conexion;
        try {
            $consulta = $conexion->prepare($sql);
            $consulta->execute($valores);
        } catch (PDOException $e) {
            echo 'No se ha podido ejecutar la consulta' . $e->getMessage();
            return null;
        }
        return $consulta;
    }


    /* ======================obtieneProductos ()======================================
      Accion: obtiene un array con todos los productos de la bd.
      Parámetros:
      Retorna  un array de objetos de productos con todos los productos
     * ********************************************************************************************** */
    public static function obtieneProductos()
    {


        $sql = "SELECT cod, nombre_corto, nombre, PVP FROM producto;";
        $resultado = self::ejecutaConsulta($sql);
        $productos = array();

        if ($resultado) {
            // Añadimos un elemento por cada producto obtenido
            while ($row = $resultado->fetch()) {
                $productos[] = new Producto($row);
            }
        }
        return $productos;
    }
}


//End de la clase DB.php_
?>
