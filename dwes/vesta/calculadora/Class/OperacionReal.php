<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OperacionReal
 *
 * @author manuel
 */
class OperacionReal extends Operacion {

    public function __construct($operacion) {
        parent::__construct($operacion);
    }

    public function opera() {
        $resultado = null;
        switch ($this->operador) {
            case '+':
                $resultado = $this->op1 + $this->op2;
            break;
            case '-':
                $resultado = $this->op1 - $this->op2;
            break;
            case '*':
                $resultado = $this->op1 * $this->op2;
            break;
            case '/':
                if ($this->op1 == 0 && $this->op2 == 0)
                    $resultado = "NAN";
                elseif ($this->op2 == 0)
                    $resultado = "INF";
                else
                    $resultado = $this->op1 / $this->op2;
            break;
        }
        return $resultado;
    }

    /**
     * @return string|void devolverá la cadena de caracteres de la expresión  que luego mostraré     *
     */
    public function __toString() {
        return "<br />$this->op1$this->operador$this->op2 = " . $this->opera();
    }

    /**
     * @return string retornará la información de toda la operación
     * En el ejemplo de ejecución lo puedes ver en forma de tabla después de ejecutarla
     */
    public function describe() {
        $operacion = parent::describe();
        $operacion .= "<tr><td>Resultado</td><td>".$this->opera()."</td></tr>\n";
        $operacion .= "</table>\n";
        return $operacion;
    }

}
