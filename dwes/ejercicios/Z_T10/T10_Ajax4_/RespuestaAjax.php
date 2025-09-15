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
class RespuestaAjax
{
    /**
     * @param $user un string
     * Valida un usuario, en este caso que sea "admin" o no
     */
    public function valida($user)

    {
        switch ($user) {
            case "":
                $msj = "valor de usuario vacío aporte un valor ";
                break;
            case null:
                $msj = "valor de usuario vacío aporte un valor ";
                break;

            case "admin":
                $msj = "El usuario ADMIN validado";
                break;
            default:
                $msj = "El usuario $user NO validado como admin";
                break;
        }

        $response = new Response();
        $response->assign('div_valida', 'innerHTML', $msj);
        return $response;
    }

    /**
     * @param $color red o green
     * va a cambiar el color red por green o al revés
     * para ponerlo de fondo a un determinado div
     */
    public
    function cambia_color($color)
    {
        $color = ($color == "red") ? "green" : "red";
        $response = new Response();
        $response->assign('div_color', 'style.background', "$color");
        return $response;
    }

    public
    function mostrar_saludo()
    {
        $msj = "Hola desde el servior";
        $response = new Response();
        $response->assign('div_saludo', 'innerHTML', $msj);
        return $response;
    }

    public
    function ocultar_saludo()
    {

        $response = new Response();
        $response->assign('div_saludo', 'innerHTML', "");
        return $response;
    }


}

?>