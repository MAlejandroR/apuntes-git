<?php

/**
 * Description of Tabla
 *Esta tabla no es genérica, si  no que está presonalizada para esta aplicación
 * Agregará al final dos botones (Borrar y Editar) en cada fila
 * Esto es lo que hace que no sea genérica
 *
 */

class Tabla
{

    private $titulos;
    private $tabla;
    private $contenido;
    private $html;

    //put your code here

    /**
     *
     * @param array $titulos un array con los t�tulos de cada columna
     * @param array $contenido un array donde cada elemento es una fila
     *                         formado por un array indexado.
     */
    public function __construct(array $titulos, array $contenido, string $tabla)
    {

        $this->contenido=$contenido;
        $this->titulos=$titulos;
        $this->tabla=$tabla;
        $this->html=$this->crea_tabla ();

    }


    private function crea_tabla()
    {

        $html="<table border=1>";
        $html.=$this->add_titulos ();
        foreach($this->contenido as $fila=>$columna){
            $html.=$this->add_fila ($columna);
        }
        $html.="</table>";
        return $html;


    }

    private function add_titulos()
    {
        $cabecera="<tr>";

        foreach($this->titulos as $titulo){

            $cabecera.="<th>$titulo</th>\n";
        }
        $cabecera.="<th>Acción</th>\n"; //Para el submit borrar
        $cabecera.="</tr>\n";
        return $cabecera;
    }

    private function add_fila($fila)
    {
        $filas="<tr>";

        $html="<form action='listado.php_' method=post>";
        foreach($fila as $pos=>$contenido){
            $filas.="<td>$contenido</td>\n";
            $html.="<input type=hidden name=campos[{$this->titulos[$pos]}] value='$contenido' />\n";
        }
        $html.="<input type=submit name='submit' value='Borrar' />\n";
        $html.="<input type=hidden name=tabla value='$this->tabla' />\n";
        $html.="</form>\n";
        $filas.="<td>$html</td>";
        $filas.="</tr>\n";
        return $filas;

    }

    public
    function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->html;
    }

    public
    function add_column($title, $value)
    {
        $this->titulos[]=$title;
        foreach($this->contenido as &$fila)
            $fila[]=$value;

        $this->html=$this->crea_tabla ();

    }


}
