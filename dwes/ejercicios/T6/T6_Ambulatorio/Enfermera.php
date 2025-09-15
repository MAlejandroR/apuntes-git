<?php

class Enfermera extends PersonalAmbulatorio {

    //put your code here
    private $anyoTitulacion;
    private $curas = [];

    public function __construct($n, $a, $d, $e, $aT) {
        parent::__construct($n, $a, $d, $e);
        $this->anyoTitulacion = $aT;
    }

    public function avisoMedico(Medica $medico, $mensaje) {
        $medico->pasarConsulta($this->apellido, $mensaje, 1);
    }

    public function hacerCura($ordenante, $tipoCura) {
        $msj = "Fecha : " . date("d-m-y", time()) . "<br/>";
        $msj .= "Ordenante $ordenante<br />";
        $msj .= "Tipo de cura $cura <hr />";
        $this->curas[] = $msj;
    }

}
