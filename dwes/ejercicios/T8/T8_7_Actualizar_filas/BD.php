<?php

class BD
{
    private $con;
    private $estado="";
    private $error=null;
    private $info="";


    public function __construct($datos)
    {
        $this->con=$this->conectar ($datos);
    }

    /**
     * @param array $datos con los datos de conexión
     * @return mysqli
     */
    public function conectar($datos): mysqli
    {
        $h=$datos['host'];
        $u=$datos['user'];
        $p=$datos['password'];
        $bd=$datos['bd'] ?? null;

        $con=new mysqli($h, $u, $p, $bd);
        if ($con->connect_errno !== 0) {
            $this->estado.="No se ha podido conectar a la base de datos<br />";
            $this->estado.="Número de error $con->connect_errno<br />";
            $this->estado.="Descripción del error $con->connect_error<br />";
            $this->error=$this->estado;
        } else
            $this->estado="Conectado correctamente";

        return $con;

    }

    /**
     * @param $bd string con la base de datos a la que se quiere conectar
     */
    public function seleccionar_bd($bd)
    {
        $this->con->select_db ($bd);
    }

    /*
     * Muestra información sobre la conexión (requisito del ejercicio 1)
     */
    public function estado_conexion()
    {
        $info="Version usada en cliente <strong>{$this->con->client_version}</strong><br />";
        $info.="Información del host  <strong>{$this->con->host_info}</strong><br />";
        $info.="Versión del protocolo  <strong>{$this->con->protocol_version}</strong><br />";
        $info.="Información del servidor  de BD<strong>{$this->con->server_info}</strong><br />";
        $info.="Versión del servidor  BD <strong>{$this->con->server_version}</strong><br />";
        if (!$this->con->connect_errno)
            return $info;
        else
            return "No se ha podido concectar a la BD, revise parámetros de conexión";
    }

    /**
     * @return string
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->estado;
    }

    /**
     * @return bool libera el recurso de la conexión
     */
    public function cerrar()
    {
        // TODO: Implement __toString() method.
        return $this->con->close ();
    }

    /**
     * @param $sentencia una consulta sql de tipo select
     * @return array indexado con cada fila de la sentencia
     */
    public function consultar($sentencia): array
    {

        $rtdo=$this->con->query ($sentencia);
        //Si hay error genero la información de error y termino
        if ($rtdo == false)
            $this->set_error ("Error consultado $sentencia. Descripción " . $this->con->error);
        $filas=[];
        while ($fila=$rtdo->fetch_row ()) {
            $filas[]=$fila[0]; //Ojo está solo para este caso que sé que me devuleve solo un campo
        }
        return $filas;
    }

    /**
     * @param $tabla nombre de la tabla
     * @return array indexado donde cada fila es un
     * array indexado con el contenido de una fila
     * ej.:
     * array (size=1)
     * 0 =>
     * array (size=3)
     * 0 => string '1' (length=1)
     * 1 => string 'manuel' (length=4)
     * 2 => string 'pass de manuel' (length=16)
     */
    public function consultar_tabla($tabla): array
    {
        $sentencia="select * from $tabla";
        $rtdo=$this->con->query ($sentencia);
        if ($rtdo == false)
            $this->set_error ("Error consultado $sentencia. Descripción " . $this->con->error);

        $filas=$rtdo->fetch_all ();
        return $filas;
    }

    public function obtener_campos($tabla)
    {
        $sentencia="select * from $tabla";
        $rtdo=$this->con->query ($sentencia);
        $campos=$rtdo->fetch_fields ();
        foreach($campos as $campo){
            $nombres[]=$campo->name;
        }
        return $nombres;

    }

    public function get_error()
    {
        return $this->error;
    }

    public function set_error($msj)
    {
        header ("Location:index.php_?error=$msj");
        exit();
    }

    public function get_info(){
        return $this->info;
    }

    /**
     * @param $campos array asociativo con los nombres de los campos y sus valores
     * ['id'=>5, 'nombre'=>'Pedro', 'pass'=>'pass de pedro']
     * @param $tabla nombre de la tabla a insertar
     * @param $modo stringo que especifica el tipo de sentencia (insert, delete, update)
     */
    public function sentencia($tabla,$campos, $modo)
    {
     
        $sentencia=$this->crea_sentencia_parametrizada ($campos, $tabla, $modo);
//        var_dump ($sentencia);

        $stmt=$this->con->stmt_init ();

        $stmt->prepare ($sentencia);

        $tipos=$this->get_types ($campos);

        //Necesito las referencias de los valores
        $parametros[]=&$tipos;

        foreach($campos as $campo=>&$valor){
            $parametros[]=&$valor;
        }
//        var_dump ($parametros);


//        var_dump ($stmt);
//        var_dump ($parametros);
//        var_dump ($sentencia);
       if (call_user_func_array ([$stmt, 'bind_param'],$parametros)===false) {
           $this->error = "Error intentando asignar valores a la sentencia " . $stmt->error;
           $this->info = "Error insertando " . $stmt->error;
       }

        if (!$stmt->execute ())
            $this->info="Error insertando ". $stmt->error;
//        var_dump ($this);
//        var_dump ($stmt);
        $stmt->close ();

    }

    /**
     * @param $campos lista de campos (los nombres
     * @param $tabla
     * @return string la sentencia parametrizada (insert into $tabla (campo1, ..) values (?,...)
     */
    private function crea_sentencia_parametrizada($campos, $tabla, $tipo)
    {
        $valores="";
        switch ($tipo) {
            case 'insert':
                $nombre_campos=implode (',', array_keys ($campos));
                $parametros=array_fill (0, count ($campos), '?');//Genero un array con tantos ? como campos
                $lista_parametros=implode (',', array_values ($parametros));
                $sentencia="insert into $tabla ($nombre_campos) values ($lista_parametros)";
                break;
            case 'delete':
                foreach($campos as $campo=>$value)
                    $valores.="$campo=? and ";
                $valores=substr($valores,0, strlen($valores)-4);
                $sentencia="delete from $tabla  where  ($valores)";
                }
                return $sentencia;
        }


    /**
     * @param $campos array con los campos
     * @return string cadena de 's' tantos como campos haya
     * @podría mirar el atributo types y generarlo de forma exacta
     */
    private function get_types($campos)
    {
        $cadena="";
        foreach($campos as $campos)
            $cadena.="s";
        return $cadena;
    }


    /**
     * @param $tabla nombre de la tabla
     * @return mixed array indexado con los nombres de los campos y un entero
     *el valor indica si es enabled (0) o no (1), en este caso es disable
     */
    public function obtener_campos_disable_autoincrement($tabla)
    {
        $campos =[];
        $fields_dictionary=$this->con->query ("select * from $tabla")->fetch_fields ();
        foreach($fields_dictionary as $fields){
            if ((($fields->flags) & 512) == MYSQLI_AUTO_INCREMENT_FLAG)
                $campos[$fields->name]=0;//disabled (campos autoincrement)
            else
                $campos[$fields->name]=1;//para enabled (campos NO autoincrement
        }

        return $campos;
    }


    /**
     * @param $id clave
     * @param $tabla nombre tabla
     * @return int el próximo valor a asiganr (ojo, si no he borrado antes)
     */
    public function selec_max($id, $tabla)
    {

        $num=$this->con->query ("select max($id) from $tabla")->fetch_array ()[0];
        return $num + 1;
    }

    /** Método a usar si no hacemos la inserción parametrizada
     * @param $campos
     * @param $tabla
     * @return string
     */
    private function crea_sentencia($campos, $tabla)
    {
        $nombre_campos=implode (',', array_keys ($campos));
        $contenido_campos=implode (',', array_values ($campos));

        //Encerramos los contendios entre comillas simples
        //ojo el primer valor y el último no tendrán comilla de inicio y de fin
        // a,b,c, => a','b','c
        $contenido_campos=str_replace (",", "','", $contenido_campos);

        //Creamos la sentencia  teniendo en cuenta add la comilla inicial y final en $contendio_campos
        $sentencia="insert into $tabla ($nombre_campos) values ('$contenido_campos')";
        return $sentencia;
    }
    public function borrar($tabla, $campos){
        var_dump($campos);
        var_dump($tabla);

        exit();
        
    }

}

?>
