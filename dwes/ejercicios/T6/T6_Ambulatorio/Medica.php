<?php

/**
 * Description of Medica
 * @author manuel
 */
class Medica extends PersonalAmbulatorio {

    //put your code here

    private $especialidad;
    private $visitas = [];
    private $consultas = [];

    public function __construct($n, $a, $d, $e, $esp) {
        parent::__construct($n, $a, $d, $e);
        $this->especialidad = $esp;
    }

    /*    public function pasarConsulta($enfermera, $mensaje) {

      $msj = "<div style=margin-left:5em> Fecha : " . date("d-m-y", time()) . "</div>";
      $msj.="<div style=margin-left:5em>Enfermera $enfermera</div>";
      $msj.="<div style=margin-left:5em>Tipo de consulta   " . $mensaje ."</div>";
      $this->consultas[] =$msj;

      }
     *
     */

    public function pasarConsulta($enfermera, $mensaje) {

        $msj = "Fecha : " . date("d-m-y H:i:s", time());
        $msj .= ".  Enfermero/a :   $enfermera";
        $msj .= ".  Tipo de consulta   <strong>" . $mensaje . "</strong>";
        $this->consultas[] = $msj;
    }

    public function realizarVisita($ordenante, $aviso) {

        $msj = "Fecha : " . date("d-m-y H:i:s", time()) . "";
        $msj .= ". Envía  <strong> $ordenante</strong>";
        $msj .= ". Aviso: <strong>$aviso</strong>";
        $this->visitas[] = $msj;
    }

    public function __toString() {
        $msj = "<div class='medico'> Médico : <strong>$this->apellido, $this->nombre</strong> de $this->edad años de edad";
        $msj .= ".  Especialidad <strong>$this->especialidad</strong>";
        $msj .= "<div class='tituloAcciones'>Consultas realizadas  " . count($this->consultas) . " consultas :</div>";
        $msj .= "<div class='contenidoAcciones'>";
        foreach ($this->consultas as $num => $consulta) {
            $msj .= "Consulta $num: ";
            $msj .= "$consulta<br />";
        }
        $msj .= "</div>";
        $msj .= "<div class='tituloAcciones'>Visitas realizadas : " . count($this->visitas) . " visitas.</div>";
        $msj .= "<div class='contenidoAcciones'>";
        foreach ($this->visitas as $num => $visita) {
            $msj .= " Visita $num: ";
            $msj .= " $visita <br />";
        }
        $msj .= "</div>";
        $msj .= "</div>";
        return $msj;
    }

}
