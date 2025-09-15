<?php

/**
 * Description of personalAmbulatorio
 * @author manuel
 */
class PersonalAmbulatorio {

    //put your code here
    protected $nombre;
    protected $apellido;
    protected $direccion;
    protected $edad;

    public function __construct($n, $a, $d, $e) {
        $this->nombre = $n;
        $this->apellido = $a;
        $this->direccion = $d;
        $this->edad = $e;
    }

    public function hacerTurno($turno) {
        return "turno de esta semana es $turno<br />";
    }

    public function hacerIncidencia($msg) {
        $incidencia = "Persona que crea incidencia $this->apellido, $this->nombre  <br />";
        $incidencia .= "incidencia creada con fecha " . date("d-m-y", time()) . "<hr />";
        $incidencia .= "<strong>$msg</strong>";
        return $incidencia;
    }

}
