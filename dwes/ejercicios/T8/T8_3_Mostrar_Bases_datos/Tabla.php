<?php

/**
 * Description of Tabla
 *

 *
 */
$filas;
$columnas;
$titulos;
$contenido;
$html_tabla;

class Tabla {

    //put your code here
    /**
     *
     * @param type $titulos un array con los t�tulos de cada columna
     * @param type $contenido un array donde cada elemento es una fila.
     * @param type $tipo si vale f es de filas, si vale c es de columnas
     */
    public function __construct( $titulos, $contenido, $tipo = "f" ) {
        $this->filas = count( $contenido[ 0 ] );
        $this->columnas = count( $titulos );
        $this->contenido = $contenido;
        $this->titulos = $titulos;


        if ( $tipo === "c" ) $this->transponer();
        $this->draw_table();

    }

    public function draw_table() {

        $html_tabla = $this->crea_tabla();
        return $this->html;

    }

    //Cambia filas por columnas
    private function transponer() {
        foreach ( $this->contenido as $num => $columna ) {
            $fila = 0;
            foreach ( $columna as $valor ) {
                $tabla[ $fila ][ $num ] = $valor;
                $fila++;
            }
        }
        $this->contenido = $tabla;

    }

    private function crea_tabla() {

        $this->html = "<table border=1>";
        $this->html .= $this->add_titulos();


        foreach ( $this->contenido as $fila => $columna ) {
            $this->html .= $this->add_fila( $columna );
        }


    }

    private function add_fila( $fila ) {
        $filas = "<tr>";
        foreach ( $fila as $contenido ) {
            $filas .= "<td>$contenido</td>\n";
        }
        $filas .= "</tr>\n";


        return $filas;

    }

    private function add_titulos() {
        $titulos = "<tr>";
        foreach ( $this->titulos as $titulo ) {

            $titulos .= "<th>$titulo</th>\n";
        }
        $titulos .= "</tr>\n";
        return $titulos;
    }

}
