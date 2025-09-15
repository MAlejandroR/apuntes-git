<?php

class Punto
{
    private $x;
    private $y;
    private $size;
    /**
     * @var $html_script html con el script que dibuja en el canvas un punto
     */
    private $html_script;


    /**
     * Punto constructor.
     * @param int $x coordenada x
     * @param int $y coordenada i
     * @param Lienzo $canvas
     * * @param $s tamaño en pixeles (opcional)
     */
    public function __construct(int $x, int $y, Lienzo $canvas, $s = 3)
    {
        $this->x = $x > $canvas->get_height ? 200 : $x;
        $this->y = $y > $canvas->get_height ? 200 : $x;
        $this->size = $s;
    }

    /**
     * @param $s tamaña opcional
     * @source método explícito para dibujar el punto
     */
    public function dibujar($s = null)
    {
        $this->size = $s ?? $this->size;
        $canvas = <<<FIN
        <!--dibujamos en él -->
        <script lang=javascript>
             var canvas = document.getElementById('canvas');
             var ctx = canvas.getContext('2d');
             ctx.fillStyle = "#ff2626"; // Color rojo
             ctx.beginPath(); // Iniciar trazo
             ctx.arc($this->x, $this->y, $this->size, 0, Math.PI * 2, true); // Dibujar un punto usando la funcion arc
             ctx.fill(); // Terminar trazo
             </script>
FIN;
        $this->html_script = $canvas;

    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return $this->html_script ? $this->html_script: "X = $this->x Y=$this->>y";
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }
}
