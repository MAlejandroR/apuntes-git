<?php


class Lienzo
{

    private $canvas;
    private $width;
    private  $height ;

    public function __construct($w,$h, $l, $r){
        $this->width=$w;
        $this->height=$h;
        function write($texto){
            return $texto;
        }
        $aux = "write";
        $this->canvas =<<<FIN
        <canvas id="canvas"  width=$this->width height=$this->height style="margin-left=$l{$aux("px")}, margin-right=$r{$aux("px")}">
             <p>Su navegador no soporta canvas :(</p>
        </canvas>
FIN;
    }

    public function __toString(){
        return $this->canvas;
    }




}
