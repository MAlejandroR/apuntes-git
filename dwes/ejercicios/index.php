<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

//Inicializamos variables para evitar warning
$n = 0;
$enunciado = "";
$ejecucion = "";


$directorios = $ficheros = scandir("./");

unset ($directorios[array_search("..", $ficheros)]);
unset ($directorios[array_search(".", $ficheros)]);
$n=0;

foreach ($directorios as $directorio) {

    if (file_exists("./$directorio/$directorio.ini")) {//Es un dir de temas que quiero visualizar

        $ficheros = scandir("./$directorio");


//Eliminamos los ficheros . y ..
        unset ($ficheros[array_search("..", $ficheros)]);
        unset ($ficheros[array_search(".", $ficheros)]);




        foreach ($ficheros as $index => $fichero) {
            //elimino fichero s ocultos y el . y ..
            if (file_exists("./$directorio/$fichero/$fichero.ini")) {//Es un dir de temas que quiero visualizar

                $file = "./$directorio/$fichero/$fichero.ini";
                $datos = parse_ini_file("$file");
                if ($datos == false) {
                    echo "<h2>No se ha podido procesar $file, revisa la configuración</h2>";
                }
                $practica[$n] = $datos;
                $practica[$n]['proyecto'] = $fichero;
                $practica[$n]['tema'] = $directorio;

            }
            $n++;
        }
        $n++;
    }

}
//echo "<ol>";
/* //Mostrar los temas del array antes de ordenar
foreach ($practica as $index => $fichero){
    echo "<li>".$fichero['tema']."</li>";
}
echo "</ol>";
echo "</ol>";
eclass="dropdown-item"varcho "</ol>";
*/
//Para ordenar por tema

foreach ($practica as $index => $fichero) {
    $aux[$index] = $fichero['tema'];
}


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
        $enunciado .= "&nbsp&nbsp<a class='contenido' target='_new' href='" . $practica[$pos]['tema']."/". $practica[$pos]['proyecto'] . "/contenido.php_" . "' >Ver fuentes proyecto </a>";
    }

    $enunciado .= "</h2>";

    $enunciado .= $practica[$pos]['enunciado'];
    $ejecucion = "http://web_old.infenlaces.com/dwes/ejercicios/" . $practica[$pos]['tema']."/". $practica[$pos]['proyecto'] . "/" . $practica[$pos]['index'];

}


$listado = "<div class='collapse navbar-collapse' id='navbarSupportedContent'>
          <ul class='navbar-nav ml-auto'>";
$tema = "";
$n = 0;

foreach ($practica as $index => $fichero) {
    $n++;
    $tema_actual = $practica[$index]['tema'];
    if ($tema != $tema_actual) {
        $tema = $tema_actual;
        $listado .= <<<FIN
       <span class="nav-item dropdown">
            <a class="nav-link dropdown-toggle tema" href="#" id="navbarDropdown$n" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               $tema
            </a>
FIN;
    }

    $listado .= <<<FIN
            <div class="dropdown-menu" aria-labelledby="navbarDropdown$n">
            
                <li  class="dropdown-item"><a href='index.php_?num_practica=$index'>{$practica[$index]['listado']}</a></li>
               
            </div>
        </span>

FIN;


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./estilo.css" type="text/css">
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <script src="menu.js"></script>

</head>
<body class="container">
<!-- MRM Pend
Trabajar un botón para desconectar  ....
-->

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
