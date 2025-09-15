<?php
class BD{
 private $con;
 private $estado="";
 private $error=null;


 public function __construct( $datos){
     $this->con = $this->conectar($datos);
 }
 public function conectar( $datos):mysqli{
     $h = $datos['host'];
     $u = $datos['user'];
     $p = $datos['password'];
     $bd = $datos['bd'];

     $con = new mysqli($h, $u, $p, $bd);
     if ($con->connect_errno!==0) {
         $this->estado .= "No se ha podido conectar a la base de datos<br />";
         $this->estado .= "Número de error $con->connect_errno<br />";
         $this->estado .= "Descripción del error $con->connect_error<br />";
         $this->error = $this->estado;
     }

     else
         $this->estado = "Conectado correctamente";

     return  $con;

 }

 public function seleccionar_bd($bd){
     $this->con->select_db($bd);
 }

 public function  estado_conexion(){
     $info = "Version usada en cliente <strong>{$this->con->client_version}</strong><br />";
     $info .= "Información del host  <strong>{$this->con->host_info}</strong><br />";
     $info .= "Versión del protocolo  <strong>{$this->con->protocol_version}</strong><br />";
     $info .= "Información del servidor  de BD<strong>{$this->con->server_info}</strong><br />";
     $info .= "Versión del servidor  BD <strong>{$this->con->server_version}</strong><br />";
     if (!$this->con->connect_errno)
        return $info;
     else
         return "No se ha podido concectar a la BD, revise parámetros de conexión";
 }
 public function __toString()
 {
     // TODO: Implement __toString() method.
     return $this->estado;
 }
 public function cerrar()
 {
     // TODO: Implement __toString() method.
     return $this->con->close();
 }

    /**
     * @param $sentencia una consulta sql de tipo select
     * @return array indexado con cada fila de la sentencia
     */
 public function consultar($sentencia):array{

     $rtdo = $this->con->query($sentencia);
     $filas = [];
     while ($fila=$rtdo->fetch_row()){
         $filas[]=$fila[0]; //Ojo está solo para este caso que sé que me devuleve solo un campo
     }
     return $filas;
 }

 public function get_error(){
     return $this->error;
 }


}

?>
