<?php

/**
 * Description of Tabla
 *
 *
 */
$titulos;
$contenido;
$html;

class Tabla
{

    //put your code here
    /**
     *
     * @param array $titulos un array con los t�tulos de cada columna
     * @param array $contenido un array donde cada elemento es una fila
     *                         formado por un array indexado.
     */
    public function __construct(array $titulos, array $contenido) {

        $this->contenido = $contenido;
        $this->titulos = $titulos;
        $this->html=$this->crea_tabla ();

    }





private function crea_tabla()
{

    $html="<table border=1>";
    $html.=$this->add_titulos ();
    foreach($this->contenido as $fila=>$columna){
        $html.=$this->add_fila ($columna);
    }
    return $html;



}

private function add_fila($fila)
{
    $filas="<tr>";
    foreach($fila as $contenido){
        $filas.="<td>$contenido</td>\n";
    }
    $filas.="</tr>\n";
    return $filas;

}

private function add_titulos()
{
    $cabecera="<tr>";

    foreach($this->titulos as $titulo){

        $cabecera.="<th>$titulo</th>\n";
    }
    $cabecera.="</tr>\n";
    return $cabecera;
}

public function __toString()
{
    // TODO: Implement __toString() method.
    return $this->html;
}

}
