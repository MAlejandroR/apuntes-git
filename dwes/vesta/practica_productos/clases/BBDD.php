<?php

class BBDD
{

    // <editor-fold defaultstate="collapsed" desc="Atributos">
    private $conexion;
    private $error;

    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc="Constructor">

    public function actualiza_producto($producto)
    {
        $sentencia = "UPDATE producto SET nombre=?, nombre_corto=?, descripcion=?, PVP=? WHERE cod=?";
        $parametros = [$producto['nombre'], $producto['nombre_corto'], $producto['descripcion'], $producto['PVP'], $producto['cod']];
        $filas = $this->ejecuta_sentencia($sentencia, "producto", $parametros);
        return $filas;

    }

    /**
     * @param $consulta sentencia a ejecutyar
     * @param $parametros valores para cada sentencia
     * @return array un array indexado con las filas de una sentencia
     */
    public function ejecuta_sentencia($consulta, $tabla, $parametros = null): array|int
    {
        if (!($this->conexion))
            $this->__construct();
        $stmt = $this->conexion->stmt_init();
        $stmt->prepare($consulta);
        $tipos = "";
        if ($parametros) {
            foreach ($parametros as $parametro) {
                $tipos .= "s";
            }
            $stmt->bind_param($tipos, ...$parametros);
        }

        $stmt->execute();
        $stmt->store_result();
        if (str_contains(strtoupper($consulta), "SELECT"))
            $resultado = $this->obtener_filas($stmt, $tabla);
        else
            $resultado = $stmt->affected_rows;
        return $resultado;
    }

    /**
     * Constructor de la clase, instancia los atributos...
     */
    public function __construct()
    {
        $datos = parse_ini_file("conexion.ini");
        $user = $datos['user'];
        $pass = $datos['pass'];
        $host = $datos['host'];
        $port = $datos['port'];
        $bd = $datos['bd'];

        try {
            $this->conexion = new mysqli($host, $user, $pass, $bd, $port);
        } catch (mysqli_sql_exception $ex) {
            die ("Error contectando " . $ex->getMessage());
        }
        $this->conexion->set_charset("utf8"); //Establecer el conjunto de caracteres del cliente... UTF-8

    }

    private function obtener_filas($stmt, $tabla)
    {
        //Obtener resultados
        $campos = $this->obtener_campos($tabla);
        try {
            $stmt->bind_result(...$campos);
            $filas = [];
//        call_user_func_array(array($stmt, 'bind_result'), $variables);
            $i = 0;
            while ($stmt->fetch()) {
                $filas[$i] = array();
                foreach ($campos as $k => $v)
                    $filas[$i][$k] = $v;
                $i++;
            }
        } catch (mysqli_sql_exception $ex) {
            die ("Error obteniendo filas " . $ex->getMessage());
        }

        return $filas;

    }

    /**
     * @param mysqli_stmt $stmt
     * @return array
     * Obtiene un array con los nombres de los campos a partir del objet mysqli_result
     */
    private function obtener_campos($tabla)
    {
        $rtdo = $this->conexion->query("select * from $tabla");

        $lista_campos = $rtdo->fetch_fields(); // Array de objetos de cada columna

        foreach ($lista_campos as $campo) {
            $campos[] = $campo->name; // Obtenemos el nombre de las columnas BD...
        }
        return $campos;
    }

    public function obtener_producto($id)
    {
        $sentencia = "Select * from producto where cod=?";
        $parametros = [$id];
        $filas = $this->ejecuta_sentencia($sentencia, "producto", $parametros);
        return $filas;


    }

    public function obtener_productos_familia(string $familia)
    {
        $sentencia = "select * from producto where familia = ?";
        $parametros = [$familia];
        $filas = $this->ejecuta_sentencia($sentencia, "producto", $parametros);
        return $filas;


    }

    public function obtener_familias()
    {
        $sentencia = "select * from familia";
        $filas = $this->ejecuta_sentencia($sentencia, "familia", null,);
        return $filas;
    }



    public function close()
    {
        $this->conexion->close();
    }


    /**
     * Función obtiene los nombres de las columnas de la BBDD...
     * @param string $tabla , tabla de la BBDD a consultar...
     * @return array, Retorna en un vector los nombres de las columnas BBDD...
     */
    public function nombres_campos(string $tabla): array
    {
        $campos = [];
        // Preparar la consulta SQL...
        $consulta = "SELECT * FROM $tabla";
        $r = $this->conexion->query($consulta);
        $obj = $r->fetch_fields(); // Array de objetos de cada columna

        foreach ($obj as $value) {
            $campos[] = $value->name; // Obtenemos el nombre de las columnas BD...
        }
        return $campos;
    }
    // </editor-fold>


}
