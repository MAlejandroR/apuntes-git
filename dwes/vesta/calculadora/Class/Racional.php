<?php

class Racional {

    private $num;
    private $den;

    /**
     * Racional constructor.
     * @param null $num
     * @param null $den
     * @source construimos un objeto del tipo num/den sobrecargándolo como se muestra
         //opciones new Racional () =>1/1
         //opciones new Racional (5) =>5/1
         //opciones new Racional (5,2) =>5/2
         //opciones new Racional ("5/2") =>5/2
         //opciones new Racional ("5") =>5/1
    */
    public function __construct($num=null, $den=1) {

        $this->den = $den;

        if(is_null($num)) {
            $this->num = 1;
        } else {
            if(is_numeric($num)) {
                $this->num = $num;
            } else {
                $valor = explode('/', $num);
                $this->num = $valor[0];
                $this->den = $valor[1];
            }
        }

    }

    /**
     * @param Racional $op1
     * @return Racional Resultado de sumar al racional acutal el Racional que recibo como parámetro
     */
    public function sumar(Racional $op1):Racional {
        $den = ($this->den * $op1->den);
        $num = ($this->den * $op1->num + $this->num * $op1->den);
        $resultado = new Racional($num, $den);     
        return $resultado;
    }

    /**
     * @param Racional $op1
     * @return Racional Resultado de restar al racional acutal el Racional que recibo como parámetro
     */
    public function restar(Racional $op1) {
        $den = ($this->den * $op1->den);
        $num = ($this->num * $op1->den - $this->den * $op1->num);
        $resultado = new Racional($num, $den);     
        return $resultado;
    }

    /**
     * @param Racional $op1
     * @return Racional Resultado de multiplicar al racional actual el Racional que recibo como parámetro
     */
    public function multiplicar(Racional $op1) {
        $num = $this->num * $op1->num;
        $den = $this->den * $op1->den;
        $resultado = new Racional($num, $den);     
        return $resultado;
    }

    /** 
     * @param Racional $op1
     * @return Racional Resultado de dividir al racional actual el Racional que recibo como parámetro
     */
    public function dividir(Racional $op1) {
        $num = $this->num * $op1->den;
        $den = $op1->num * $this->den;
        $resultado = new Racional($num, $den);     
        return $resultado;
    }

    public function __toString() {
        return ($this->num . "/" . $this->den);
    }


    /**
     * Este método obtiene un racional simplificado del actual
     * @return Racional
     * @source simplifica el Racional actual, retornando otro objeto Racional con esos valores como num y den
     * importante: no modifica el Racional actual
     */
    public function simplificar() {

        if ($this->num == 0) {
            $resultado = 0;
        } elseif ($this->den == 0) {
            $resultado = "INF";        
        } else {
            $a = $this->num;
            $b = $this->den;
            
            while($b != 0){
                $t = $b;
                $b = $a % $b;
                $a = $t;
            }
            
            $num = $this->num / $a;
            $den = $this->den / $a;
            $resultado = new Racional($num, $den);   
        }
 
        return $resultado;

    }
}
