<?php


/**
 * Clase 'View.php_' -> Presentación de datos del modelo (Tablas...)
 */
class View
{


    function __construct(){    }
    /**
     * Función muestra las familias en el elemento <option> de los datos de la BD.
     * @param array $datos , Vector de datos de cada tupla de la BBDD...
     * @param string $familia , Familia selecionada mantener selección...
     * @return string, Resultado en el elemento <option> el nombre de la familia BD.
     */
    public function listado_option_familia(array $datos, string $familia): string
    {
        $option = "";
        foreach ($datos as $value) {
            // Check - Mantener la familia seleccionada...
            $check = ($familia == $value[0]) ? "selected" : null;
            $option .= "<option $check value='$value[0]'>" . $value[1] . "</option>\n";
        }
        return $option;
    }

    /**
     * Funcion para mostrar el titulo 'nombre de las columnas BD' en la tabla <thead>...
     * @param type $datos (array) Vector con los datos de la tabla BD 'nombre de las columnas'
     * @return string, retorna th de la tabla (Titulo de la tabla)
     */
    public function tableHead($datos): string
    {
        $info = "";
        // Obtener solo nombre_corto y PVP...
        foreach ($datos as $key => $value) {
            if ($key == 2 || $key == 5) {
                $info .= "<th>$value</th>";
            }
        }
        return "<thead><tr>$info<th>Editar</th></tr></thead>\n";
    }

    /**
     * Funcion que retorna el <tbody> de la tabla 'Datos de cada tupla de la BD'...
     * @param type $datos (array), vector que contiene info de cada tupla de la BBDD...
     * @return string, retorna td 'fila' de la tabla (info de cada tupla BD)
     */
    public function tableBody($datos, $familia): string
    {
        $info = "";
        foreach ($datos as $value) {
            $info .= "<tr><td>$value[2]</td>"
                . "<td>$value[4]</td>"
                . "<td>\n\n<form action='editar.php_' method='post'>\n
                       <input type='submit' value='Modificar' name='submit'>\n
                       <input type='hidden' value='$value[0]' name='codigo'>\n
                       <input type='hidden' value='$familia' name='familia'>\n
                       </form>\n
                       </td></tr>";
        }
        return "<tbody>$info</tbody>";
    }
    // </editor-fold>
}
