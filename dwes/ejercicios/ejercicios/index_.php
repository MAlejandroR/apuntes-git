<?php
spl_autoload_register(function ($clase) {
    require_once("$clase.php");
});

require_once("Usuario.php_");
require_once("DB.php_");

Usuario::limpia_sesion();
if (filter_input(INPUT_POST, "borrar_session")) {
    Usuario::limpia_sesion();
}

session_start();

/**
 * Mientras no estemos validados (guardando en variable de sesión
 */
do {

    $credenciales = Usuario::autentificar();
    var_dump($credenciales);

    if (DB::verifica_usuario($credenciales))
        $_SESSION['user']=$credenciales['user'];
    else {
        $_SERVER['PHP_AUTH_USER']=null;
    }
}while($_SESSION['user']);


$ficheros = scandir("./");
//Eliminamos los ficheros . y ..
unset ($ficheros[array_search("..", $ficheros)]);
unset ($ficheros[array_search(".", $ficheros)]);

$n = 0;
//Para ordenar el array de los ini por el tema


foreach ($ficheros as $index => $fichero) {
    //elimino fichero s ocultos y el . y ..
    if (file_exists("./$fichero/$fichero.ini")) {//Si no es directorio, lo elimino
        $file = "./$fichero/$fichero.ini";
        $datos = parse_ini_file("$file");
        if ($datos == false) {
            echo "<h2>No se ha podido procesar $file, revisa la configuración</h2>";
        }

        $practica[$n] = $datos;
        $practica[$n]['proyecto'] = $fichero;
        $n++;
    }
}


//echo "<ol>";
/* //Mostrar los temas del array antes de ordenar
foreach ($practica as $index => $fichero){
    echo "<li>".$fichero['tema']."</li>";
}
echo "</ol>";
*/
//Para ordenar por tema
foreach ($practica as $index => $fichero)
    $aux[$index] = $fichero['tema'];
array_multisort($aux, SORT_ASC, $practica);


/* //Mostrar los temas del array después  de ordenar
echo "<h2>Proyectos ordenados </h2>><ol>";

foreach ($practica as $index => $fichero){
    echo "<li>".$fichero['tema']."</li>";
}
echo "</ol>";
*/

if (isset($_GET['num_practica'])) {

    $pos = $_GET['num_practica'];
    $titulo = $practica[$pos]['titulo'];
    $enunciado = "<h2>$titulo";


    if ($practica[$pos]['revisado'] == 'si') {
        $enunciado .= "&nbsp&nbsp<a class='contenido' target='_new' href='" . $practica[$pos]['proyecto'] . "/contenido.php_" . "' >Ver fuentes proyecto </a>";
    }

    $enunciado .= "</h2>";

    $enunciado .= $practica[$pos]['enunciado'];
    $ejecucion = "http://manuel.infenlaces.com/web_old/" . $practica[$pos]['proyecto'] . "/" . $practica[$pos]['index'];

}


$listado = "";
$tema = "";
foreach ($practica as $index => $fichero) {
    $tema_actual = $practica[$index]['tema'];
    if ($tema != $tema_actual) {
        $tema = $tema_actual;
        $listado .= "<div class='tema'>$tema</div>";
    }
    $listado .= "<li><a href='index.php_?num_practica=$index'>" . $practica[$index]['listado'] . "</a></li>";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body class="container">
<!-- MRM Pend
Trabajar un botón para desconectar  ....
-->
<form action="index.php" method="POST">
    <input type="submit" value="borrar_session" name="borrar_session">
</form>
<header>Prácticas del programación php</header>
<section class="container1">
    <nav class="listado">
        <h2>Listado de prácticas</h2>
        <ul>
            <?php
            echo $listado;
            ?>
        </ul>
    </nav>

    <section class="container2">

        <article class=enunciado>

            <?php echo $enunciado ?>
        </article>
        <hr>
        <iframe class=ejecucion src="<?php echo $ejecucion ?>"></iframe>
    </section>
</section>
<footer>CPI FP Los Enlaces Desarrollo de aplicaciones en entorno servidor. Profesor Manuel Romero</footer>
</body>
</html>