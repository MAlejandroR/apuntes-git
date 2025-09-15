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
<?= $jaxon->getCss() //<!--   // Insert the Jaxon CSS code into the page    ?>
</head>
<script>
    function ajax_incrementa(num) {
        JaxonRespuestaAjax.incrementa(num);
        return false;
    }
</script>

<body>
<h1>Tenemos un botón que hará solicitud de ajax al servidor</h1>
<h3>Incrementaremos el valor del número</h3>
<div id='div_numero' style="width:200px; height:50px; border-style:solid;">
        0
</div>

<button onclick='ajax_incrementa(document.getElementById("div_numero").innerHTML.trim());'> Incrementa</button>
<?php
// Insert the Jaxon javascript code into the page
echo $jaxon->getJs();
echo $jaxon->getScript();
?>
</body>
</html>
