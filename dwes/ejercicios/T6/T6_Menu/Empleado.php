<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empleado
 *
 * @author manuel
 */
class Empleado {

    //Atributos todos privados (encapsulación)

    private $nombre;
    private $apellido;
    private $horas;
    private $precio_hora;




    /**
     * Empleado constructor.
     * @param $n nombre
     * @param $a apellido
     * @param $h horas trabajadas
     * @param $p_h precio hora
     * //Función constructor que se invoca cuando se crea el objeto
     */
    public function __construct($n, $a, $h, $p_h) {
        $this->nombre = $n;
        $this->apellido = $a;
        $this->horas = $h;
        $this->precio_hora = $p_h;
    }

    /**
     * @return la nómina de este emepleado
     * Los impuestos se calculan según enunciado
     */
    public function genera_nomina() {
        $nomina = "<h2> Nómina de $this->apellido, $this->nombre</h2> ";

        $impuestos = $this->calcula_impuestos();
        $bruto = $this->precio_hora * $this->horas;
        $neto = $bruto - $impuestos;

        $nomina .= "<h3>Sueldo bruto : $bruto</h3>\n";
        $nomina .= "<h3>Impuestos : $impuestos</h3>\n";
        $nomina .= "<h3>Sueldo neto : $neto</h3>\n\n";
        return $nomina;
    }

    /**
     * @return float|horas|int|precio
     * Calcula los impuestos en función del sueldo bruto según especificaciones
     *
     */
    private function calcula_impuestos() {
        $bruto = $this->horas * $this->precio_hora;
        $impuestos=0;
        switch (true) {
            case $bruto < 500:
                $impuestos = 0;
                break;
            case $bruto < 1000:
                $impuestos = $bruto * 0.05;
                break;
            case $bruto < 1500:
                $impuestos = $bruto * 0.14;
                break;
            case $bruto < 2000:
                $impuestos = $bruto * 0.2;
                break;
            default:
                $impuestos = $bruto * 0.27;
                break;
        }
        return $impuestos;
    }

    /**
     * @return string a mostrar cuando quiero visualizar el objeto como un string
     */
    public function __toString() {
        $txt = "<h1> Datos de $this->nombre $this->apellido</h1>\n";
        $txt .="<h3>Horas trabajadas: $this->horas</h3>\n";
        $txt .="<h3>precio: $this->precio_hora</h3>\n\n";

        return $txt;
    }

}
