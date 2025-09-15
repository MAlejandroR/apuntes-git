<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 15/04/19
 * Time: 16:57
 */
require_once "./../../../vendor/autoload.php_";
require_once "RespuestaAjax.php";
use Jaxon\Jaxon;
use Jaxon\Response\Response;
// Obtenemos un objeto de la clase jaxon a traveś de un método que nos devuelve un objeto jaxon
$jaxon = jaxon();
// Register an instance of the class with Jaxon
$jaxon->register(Jaxon::CALLABLE_OBJECT, new RespuestaAjax());
// Call the Jaxon processing engine
$jaxon->processRequest();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        function ajax_saluda() {
            const a =document.getElementById('div_saludo').innerHTML.trim();


            if (a=='')
                JaxonRespuestaAjax.mostrar_saludo();
            else
                JaxonRespuestaAjax.ocultar_saludo();
            
           return false;

        }

        function ajax_valida(user) {
            JaxonRespuestaAjax.valida(user);
            return false;
        }

        function ajax_color(color) {

            JaxonRespuestaAjax.cambia_color(color);
            return false;
        }


    </script>
</head>
<body>

<h1>Tenemos tres botones que harán solicitud de ajax al servidor</h1>

<h3>Aquí aparecerá el saludo cuando hagamos click saluda</h3>
<div id='div_saludo'style="width:400px; height:50px; border-style:solid">


</div>

<h3>Aquí dirá si el usuario es o no admin</h3>
Usuario:
<input type="text" id="user">
<div id="div_valida" style="width:400px; height:50px; border-style:solid">
</div>
<h3>Aquí aparecerá cambiará el fondo de este div entre green y red</h3>
<div id="div_color" style="width:400px; height:50px; border-style:solid;background:red">
</div>

<button onclick="ajax_saluda()">Saluda</button>
<button onclick="ajax_valida(document.getElementById('user').value)">Valida</button>
<button onclick="ajax_color(document.getElementById('div_color').style.background)">Cambia color</button>

</div>

<h3></h3>
<?php
// Insert the Jaxon javascript code into the page
echo $jaxon->getJs();
echo $jaxon->getScript();
?>
</body>
</html>
