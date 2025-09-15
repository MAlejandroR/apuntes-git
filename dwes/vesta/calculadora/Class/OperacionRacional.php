<?php

/**
 * Description of OperacionRacional
 *
 * @author manuel
 */
class OperacionRacional extends Operacion {

    public function __construct($operacion) {
        parent::__construct($operacion);
        $this->op1 = new Racional($this->op1);
        $this->op2 = new Racional($this->op2);
    }

    /**
     * Este método realiza el cálculo de una operación Racional
     */

    public function opera() {
        $resultado = null;
        switch ($this->operador) {
            case '+':
                $resultado = $this->op1->sumar($this->op2);
            break;
            case '-':
                $resultado = $this->op1->restar($this->op2);
            break;
            case '*':
                $resultado = $this->op1->multiplicar($this->op2);
            break;
            case ':':
                $resultado = $this->op1->dividir($this->op2);
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
        $operacion .= "<tr><td>Resultado simplificado</td><td>".$this->opera()->simplificar()."</td></tr>\n";
        $operacion .= "</table>\n";
        return $operacion;
    }

}
