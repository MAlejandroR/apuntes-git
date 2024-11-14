<?php
ini_set("display_errors", true);
error_reporting(E_ALL);
/**
 * @param $frase representa una solución que queremos verificar
 * @param $solucion es un array de palabras con la solución
 * @return booleano si la frase coincide con la solución sin tener en cuenta los espacios en blanco
 */
function contains(string|null $respuesta, string|null $solucion): bool
{
    $respuesta = explode(" ", $respuesta);
    $solucion = explode(" ", $solucion);
    $rtdo = array_diff($solucion, $respuesta);
    return (!(bool)count($rtdo));
}

$respuesta = htmlspecialchars(filter_input(INPUT_POST, "respuesta"));
$respuesta = trim(preg_replace('/\s+/', ' ', $respuesta));$solucion = htmlspecialchars(filter_input(INPUT_POST, "solucion"));

$ejercicio = filter_input(INPUT_POST, "ejercicio");

$rtdo = contains($respuesta, $solucion);

$msj = $rtdo ? "<span style='color:green'>Muy bien</span>" : "<span style='color:red'>No parece una buena solución</span>";

$msj .= "<br />Respuesta <span style='color:green'>$respuesta</span>";
$msj .= "<br />Solución <span style='color:green'>$solucion</span>";


$paginaDeReferencia = $_SERVER['HTTP_REFERER'];
header("Refresh: 5; url=$paginaDeReferencia");

?>

<!doctype html>
<html itemscope itemtype="http://schema.org/WebPage" lang="es" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Hugo 0.118.2">
    <link rel="alternate" type="application/rss&#43;xml"
          href="http://proyectosdwa.es/manuel/docs/0_docker/1_ejercicios/1_imagenes/index.xml">
    <meta name="robots" content="index, follow">


    <link rel="shortcut icon" href="/manuel/favicons/favicon.ico">
    <link rel="apple-touch-icon" href="/manuel/favicons/apple-touch-icon-180x180.png" sizes="180x180">
    <link rel="icon" type="image/png" href="/manuel/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/manuel/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/manuel/favicons/android-36x36.png" sizes="36x36">
    <link rel="icon" type="image/png" href="/manuel/favicons/android-48x48.png" sizes="48x48">
    <link rel="icon" type="image/png" href="/manuel/favicons/android-72x72.png" sizes="72x72">
    <link rel="icon" type="image/png" href="/manuel/favicons/android-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/manuel/favicons/android-144x144.png" sizes="144x144">
    <link rel="icon" type="image/png" href="/manuel/favicons/android-192x192.png" sizes="192x192">

    <title>Soluciones a ejercicios</title>
    <meta name="description" content="Apuntes sobre web">
    <meta property="og:title" content="Crea imágenes"/>
    <meta property="og:description" content="Apuntes sobre web"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://proyectosdwa.es/manuel/docs/0_docker/1_ejercicios/1_imagenes/"/>
    <meta itemprop="name" content="Crea imágenes">
    <meta itemprop="description" content="Apuntes sobre web">
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Crea imágenes"/>
    <meta name="twitter:description" content="Apuntes sobre web"/>


    <link rel="preload"
          href="/manuel/scss/main.min.a259b9314771009688f4539373ec884b9c75fd106d86fce70f6e126c27b44f1a.css" as="style">
    <link href="/manuel/scss/main.min.a259b9314771009688f4539373ec884b9c75fd106d86fce70f6e126c27b44f1a.css"
          rel="stylesheet" integrity="">

    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK"
            crossorigin="anonymous"></script>

</head>
<body class="td-section">
<header>
    <header>
        <nav class="js-navbar-scroll navbar navbar-expand navbar-dark flex-column flex-md-row td-navbar">
            <a class="navbar-brand" href="/manuel/"><span class="navbar-brand__logo navbar-logo"></span><span
                        class="navbar-brand__name">Desarrollo Web</span></a>
            <div class="td-navbar-nav-scroll ml-md-auto pr-20%" id="main_navbar ">
                <h1>Soluciones a ejercicos</h1>
                </ul>
            </div>
            <div class="navbar-nav d-none d-lg-block">

            </div>
        </nav>
    </header>
    <html>
    <body>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="text-center p-4" style="border: 2px solid #ccc; background-color: #f9f9f9;">
            <h1><?= $msj ?></h1>
            <div class="text-right font-weight-bold">
                En 5 segundos la página se redirigirá.
            </div>
        </div>
    </div>


    </body>
    </html>
