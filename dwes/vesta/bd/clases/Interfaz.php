<?php

class Interfaz
{

    static public function html_header():string
    {
        $usuario = $_SESSION['usuario'] ?? null;
        if (is_null($usuario)) {
            header("Location:index.php_");
            exit();
        }
        $html = <<<FIN
<span class="fila_header">
                <h1>Welcome  <span style="color:green">$usuario</span> </h1>
                    <form action="sitio.php_" method="POST">
                        <input type="submit" class="logout" value="Logout" name="submit">
                    </form>
</span>
FIN;
        return $html;
    }

    static public function genera_tabla(array $datos, string $titulo): string
    {
        $tabla = "<table>";
        $tabla .= "<caption>$titulo</caption>";
        $fila = $datos[0];
        //Creo la cabecera de la tabla con los nombres de los campos
        $tabla .= "<tr>";
        foreach ($fila as $campo => $valor)
            $tabla .= "<th>$campo</th>";
        $tabla .= "</tr>";

        //Muestro cada fila los campos
        foreach ($datos as $fila => $campos) {
            $tabla .= "<tr>";//Una fila de datos
            foreach ($campos as $campo)//Los valores
                $tabla .= "<td>$campo</td>";
            $tabla .= "<td><form action = 'editar.php_' method='POST'>
                 <input type='submit' style='fonts-size:0.9em' value='Editar'>
                  <input type='submit'  style='fonts-size:0.9em' value='Borrar'>
                 <input type='hidden' name='cod'  value='{$campos['cod']}' >
                 </form>
                 </td>";
            $tabla .= "</tr>";
        }

        $tabla .= "</table>";

        return $tabla;
    }
}