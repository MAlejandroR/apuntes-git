<?php

class Conserje extends PersonalAmbulatorio {

    //put your code here
    private $ubicacion;

    public function __construct($n, $a, $d, $e, $u) {
        parent::__construct($n, $a, $d, $e);
        $this->ubicacion = $u;
    }








    public function avisoMedico(Medica $medico, $mensaje, $tipoAviso) {
    if ($tipoAviso == "Consulta")
    $medico->pasarConsulta($this->apellido, $mensaje, 2);
    if ($tipoAviso == "Visita")
    $medico->realizarVisita($this->apellido, $mensaje);
}

public function avisoEnfermera(Enfermera $enfermera, $mensaje) {
    $enfermera->hacerCura($this->apellido, $mensaje);
}

}
