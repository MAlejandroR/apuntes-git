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
    public function saluda(){
        $msj="texto actualizado por el servidor mediante llamada ajax, el resto de la página no se actualiza
";
       $response = new Response();
        $response->alert("Van a venir nuevos datos");
        $response->assign('div_saluda', 'innerHTML', $msj);
        return $response;
    }

}
?>