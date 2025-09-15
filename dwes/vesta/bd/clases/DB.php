<?php
//todos los métodos relacionados con el acceso de la base de datos

class DB
{

    private mysqli $conexion;

    public function __construct()
    {

        try {
            $this->conexion = new mysqli(HOST, USER, PASS, NAME_DB);
            echo "<h1>Conexión ok!!</h1>";
        } catch (Exception $error) {
            die("Error conectando a la base de datos " . $error->getMessage());
        }
    }

    public function valida_usuario(string $nombre, string $password): bool
    {
        $consulta = "select * from usuarios 
                    where nombre =?
                        and password =?
                    ";

        $stmt = $this->conexion->stmt_init();
        $stmt->prepare($consulta);
        $stmt->bind_param("ss", $nombre, $password);
        var_dump($consulta);
        var_dump($nombre);
        var_dump($password);
        $stmt->execute();
        $stmt->store_result();


        if ($stmt->num_rows > 0)
            return true;
        else
            return false;
    }

    public function executa_consulta($consulta, $parametros)
    {
        $stmt = $this->conexion->stmt_init();
        $stmt->prepare($consulta);
        $stmt->bind_param("ss", $nombre, $password);
        $stmt->execute();
        $campos = $stmt->field_count;
        $datos = array_fill(0, $campos, 0);

        $stmt->store_result($datos);
        $stmt->fetch();
        var_dump($datos);
        var_dump($stmt);
        exit();
    }


    public function obtener_familias(): array
    {
        $familias = [];
        $consulta = "select * from familia";
        $resultado = $this->conexion->query($consulta);
        $fila = $resultado->fetch_assoc();
        while ($fila) {
            $familias[] = $fila;
            $fila = $resultado->fetch_assoc();
        }
        return $familias;
    }

    public function obtener_fila(string $cod, string $tabla): array
    {
//        $consulta = "select * from $tabla where cod = '$cod'";
//        $resultado = $this->conexion->query($consulta);
//        return $resultado->fetch_assoc();

        $sentencia = "select * from $tabla
                     where cod = ?";
        $resultado = $this->ejecuta_consulta($sentencia, [$cod]);
        return $resultado;
    }

    public function ejecuta_consulta(string $sentencia, array $parametros): array
    {
        $stmt = $this->conexion->stmt_init();

        $stmt->prepare($sentencia);
        $tipo = "";
        foreach ($parametros as $parametro) {
            $tipo .= "s";

        }
        $stmt->bind_param($tipo, ...$parametros);
        $stmt->execute();
        $campos = $stmt->field_count;
        for ($n = 0; $n < $campos; $n++)
            $datos[] = "\$var$n";


        var_dump($datos);
        $stmt->bind_result(...$datos);
        $stmt->fetch();
        var_dump($datos);
        var_dump($stmt);
        exit();


    }

    public function update(string $cod, string $tabla, array $fila_nueva)
    {
        $consulta = "update $tabla set ";
        foreach ($fila_nueva as $campo => $valor) {
            $consulta .= " $campo ='$valor' ,";
        }
        //quito la coma
        $consulta = substr($consulta, 0, strlen($consulta) - 1);
        $consulta .= "Where cod = '$cod'";
        var_dump($consulta);


    }


}


?>
