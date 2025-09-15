<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 1/12/17
 * Time: 10:45
 */


class DB {

    //atributo privado de conexión
    private static $conexion;
    private static $host;
    private static $usuario;
    private static $pass;
    private static $bd;
    private static $tipo_bd;

    /* ======================conectar()======================================
      conecta con la base de datos, usando PDO
      da valor al atributo privado y estático $conexion de la clase
      En caso de no conectarse aborta la app y muestra un mensaje
     * ***************************************************************************************** */
    private static function conectar($h="localhost",$u="manuel_manuel",$p="manuel_mapjsa99",$bd="manuel_alumnos",$tipo_bd="mysql") {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "$tipo_bd:host=$h;dbname=$bd";
        $usuario = $u;
        $pass = $p;
        try {
            $conexion = new PDO($dsn, $usuario, $pass, $opc);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Problema con la conexión' . $e->getMessage());
        }
        self::$conexion = $conexion;
    }



    public static function inserta_acceso_user($user,$pagina, $f=null){
        //$contexion = DB::contectar();

        $insert = "insert into acceso_alumno (user, ip, hora, host, pagina) values(?,?,?,?,?)";
        //$stmt=$conexion->prepare($insert);
        $ip=$_SERVER['REMOTE_ADDR'];
        $host=$_SERVER['REMOTE_HOST'];
        $hora=date("d-m-Y H:i:s", time());
        $datos=[$user, $ip,$hora,$host, $pagina];
        fwrite ($f, date("H:i:s")."- "." insert $user, $ip, $hora, $host, $pagina".PHP_EOL);
        self::ejecutaConsulta($insert,$datos);

}



    /* ======================ejecutaConsulta ($sql,$valores)======================================
      Accion: Ejecuta una consulta preparada con los valores de los parámetros de la consulta preparada
      Parámetros: $sql es la consulta preparada y parametrizada
      $valores es un array asociativo con los valores de los distintos
      parámetros de la consulta anterior
      Retorna =La consulta despues de ejecutarla, o null si no la ha podido ejecutaqr
      en caso de no ejecutarla da un mensaje
     * ********************************************************************************************** */

    protected static function ejecutaConsulta($sql, $valores) {

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

    /* ======================verificaCliente ($nombre,$pass)======================================
      Accion: verifica si un nombre y pass son contenidos en la base de datos
      Parámetros: $nombre es el nombre de usuario
      $pass es la password para ese nombre
      Retorna  true o false según se haya podido o no validar
     * Recordar que la pass está cifrada con md5 en la base de datos
     * ********************************************************************************************** */

    public static function verificaCliente($nombre, $pass) {
        $valores = array('usuario' => $nombre, 'password' => $pass);
        $sql = <<<FIN
        SELECT nombre FROM usuarios 
        WHERE nombre=:usuario
        AND pass=md5(:password)
FIN;
        $resultado = self::ejecutaConsulta($sql, $valores);
        $verificado = false;
        if ($resultado->fetch()) {
            echo "Encontrado";
            $verificado = true;
        } else
            echo "NOOOO ENcontrado";
        return $verificado;
    }

    /* ======================obtieneProducto ()======================================
      Accion: obtiene un array con todos los productos de la bd.
      Parámetros:
      Retorna  un array de objetos de productos con todos los productos
     * ********************************************************************************************** */

    public static function obtieneProductos() {


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

    /* ======================obtieneProducto ($codigo)======================================
      Accion: obtiene los datos de un determinado producto cuyo codigo pasamos como argumento
      Parámetros: $codigo es el codigo del producto cuyos datos queremos
      Retorna  un objeto de la clase producto con sus datos(cod, nombre_corto y PVP
     * ********************************************************************************************** */

    public static function obtieneProducto($codigo) {

        $valores = array('cod' => $codigo);
        $sql = <<<FIN
        SELECT cod, nombre_corto, nombre, PVP
        FROM producto 
        WHERE cod = :cod
FIN;
        $resultado = self::ejecutaConsulta($sql, $valores);
        $producto = null;
        if (isset($resultado)) {
            $row = $resultado->fetch();
            $producto = new Producto($row);
        }
        return $producto;
    }
    public function registra_accion(){
        session_start();
        $pagina = $_SERVER['PHP_SELF'];
        var_dump($pagina);
        $user = $_SERVER['user'];
        self::inserta_acceso_user($user, $pagina);
    }

}

//End de la clase DB.php_
?>