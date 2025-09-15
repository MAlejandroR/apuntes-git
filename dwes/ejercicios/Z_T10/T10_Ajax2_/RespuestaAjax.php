<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 16/04/19
 * Time: 17:02
 */

//Especificamos la clase que vamos a usar (psr-4)
use Jaxon\Response\Response;

/**
 * Class Respuesta_Ajax
 * creamos una clase cuyos métodos van a ser
 * las accinoes que el cliente puede solicitar por ajax
 * el servidor solo ejecuta ese método
 * devuelve meditane un objeto Response datos al cliente
 */
class RespuestaAjax{
    /**
     * emite un mensaje de saludo
     */
    public function incrementa($num){

       $response = new Response();
       $num++;


        $response->assign('div_numero', 'innerHTML', $num);
        return $response;
    }

}
?>