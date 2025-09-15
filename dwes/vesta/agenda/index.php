<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
function valida_telefono($t, $n)
{
    global $agenda;
    $error = null;
    if (!is_numeric($t))
        $error = "<p style='color:red'>El teléfono debe ser numérico y <span class=variable>$t</span> no lo es.</p><br />";
    if ($t=="") {

        if (!(array_key_exists($n, $agenda))) {
            $error = "<p style='color:red'>Debe facilitar un teléfono para el contacto  <span class=variable>$n</span>.</p><br />";
        } else
            $error = null;
    }
    return $error;
}


function valida_nombre($n)
{
    $error = null;
    if ($n=="")
        $error = "<p style='color:red'>Debes facilitar un nombre para crear el contacto</p><br />";
    return $error;
}

//Verifico que me venga una variable con valor llamada agenda que es un array
$agenda = $_POST['agenda'] ?? [];
$error = null;

$opcion =$_POST['enviar']??null;

switch ($opcion) {
    case "Eliminar contactos":
        $agenda = [];
        break;
    case "Añadir contacto":
        $nombre = trim($_POST['nombre']);
        $telefono = trim($_POST['telefono']);
        $agenda = $_POST['agenda'] ??[];
        $error = valida_nombre($nombre);
        $error = ($error == null) ? valida_telefono($telefono, $nombre) : $error;
        if (!$error) {
            if ($telefono=="")
                unset ($agenda[$nombre]);
            else
                $agenda[$nombre] = $telefono;
        }
        break;
}


//Creando la cabecera de la página

if (sizeof($agenda) == 0)
    $msj = "sin contactos actualmente";
else
    $msj = "con " . sizeof($agenda) . " contactos ";

/*Mostramos los contactos de la agenda */

//Si hay contacto por que los leí
//       los visualizo al principio de la página
$contactos = null;
$deshabilitado = "disabled";
if (count($agenda) > 0) {
    $deshabilitado = null;
    $contactos .= "<table>";
    $contactos .= "<tr><th>Nombre</th><th>Teléfono</th></tr>";
    foreach ($agenda as $nombre => $telefono) {
        $contactos .= "<tr>";
        $contactos .= "<td>$nombre</td><td>$telefono</td>";
        $contactos .= "</tr>";
    }
    $contactos .= "</table>";
}
$contactos = ($contactos == null) ? "Agenda sin contactos" : $contactos;

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="./estilo.css" type="text/css">
    <script src='https://unpkg.com/vue'></script>
    <title> Agenda de contactos</title>
</head>
<header>
    Agenda de contactos: <?php echo $msj ?>
</header>
<body>

<div class="listado_contactos">
    <div class="center">LISTADO DE CONTACTOS</div>
    <hr>
    <div class="center">
        <?php echo "$contactos"; ?>
    </div>
</div>
<!-- Creamos el formulario para insertr los nuevos datos-->
<fieldset>
    <legend>Nuevo Contacto</legend>
    <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
        <br>
        <label for="nombre">Nombre</label><input type="text" name="nombre" size="15"/><br/>
        <label for="telefono">Teléfono </label><input type="text" name="telefono" size="15"/><br/>
        <input type="submit" value="Añadir contacto" name="enviar">
        <input type="submit" value="Eliminar contactos" name="enviar" <?php echo $deshabilitado ?> >

        <!-- Metemos los contactos existentes  ocultos en el formulario-->
        <?php /*Ahora para no perder los datos del array cargo cada pareja del array en un input
                  observar que para no visualizarlo lo hago en input ocultos
                  interesante ver que el nombre del input es el nombre del array y su clave
                  el valor es el valor que tiene el array para esa clave
                  luego y esto es lo que fallaba en php_ puedo leer TODO el array leyendo solo el nombre del array
                  QUE CHULO QUEDA :)
 	        */
        foreach ($agenda as $nom => $tel) {
            echo "<input type=hidden name='agenda[$nom]' ";
            echo "value= $tel />\n";
        }
        ?>
    </form>
</fieldset>
<div style="clear:both ">
    <hr/>
    <?php echo $error ?>
</div>

</body>

</html>
