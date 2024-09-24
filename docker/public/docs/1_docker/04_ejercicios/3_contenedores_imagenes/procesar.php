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
/*Por si lo preparo como un api*/
//$respuesta=['respueta'=>$respuesta, 'solucion'=>$solucion, 'resultado'=>$rtdo];
//$respuesta =json_encode($respuesta);
//return $respuesta;
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
    <link rel="alternate" type="application/rss&#43;xml" href="http://web.infenlaces.com/dwes/docker/docs/1_docker/04_ejercicios/1_imagenes/index.xml">
    <meta name="robots" content="index, follow">


    <link rel="shortcut icon" href="/dwes/docker/favicons/favicon.ico" >
    <link rel="apple-touch-icon" href="/dwes/docker/favicons/apple-touch-icon-180x180.png" sizes="180x180">
    <link rel="icon" type="image/png" href="/dwes/docker/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/dwes/docker/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/dwes/docker/favicons/android-36x36.png" sizes="36x36">
    <link rel="icon" type="image/png" href="/dwes/docker/favicons/android-48x48.png" sizes="48x48">
    <link rel="icon" type="image/png" href="/dwes/docker/favicons/android-72x72.png" sizes="72x72">
    <link rel="icon" type="image/png" href="/dwes/docker/favicons/android-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/dwes/docker/favicons/android-144x144.png" sizes="144x144">
    <link rel="icon" type="image/png" href="/dwes/docker/favicons/android-192x192.png" sizes="192x192">

    <title>Crea imágenes | Desarrollo Web</title>
    <meta name="description" content="Powerful, extensible, and feature-packed frontend toolkit. Build and customize with Sass, utilize prebuilt grid system and components, and bring projects to life with powerful JavaScript plugins.">
    <meta property="og:url" content="http://web.infenlaces.com/dwes/docker/docs/1_docker/04_ejercicios/1_imagenes/">
    <meta property="og:site_name" content="Desarrollo Web">
    <meta property="og:title" content="Crea imágenes">
    <meta property="og:description" content="Descargar, ver y borrar imágenes Comandos a usar docker pull docker images docker rmi nombre_imagen docker rmi (docker images) 1. Descarga una imagen llamada ubuntu_latest 2. Descarga una imagen llamada manolo/web:v1 3. Verficia que las has descargado listándolas 4. Borra la imagen llamada manolo/web:v10 5. Verifica que la has borrado 6. Vuelve a cargar una imagen llamada manolo/web:v10 7. Borra todas las imágemes 8. Verifica que no tienes ninguna imagen ">
    <meta property="og:locale" content="es">
    <meta property="og:type" content="website">

    <meta itemprop="name" content="Crea imágenes">
    <meta itemprop="description" content="Descargar, ver y borrar imágenes Comandos a usar docker pull docker images docker rmi nombre_imagen docker rmi (docker images) 1. Descarga una imagen llamada ubuntu_latest 2. Descarga una imagen llamada manolo/web:v1 3. Verficia que las has descargado listándolas 4. Borra la imagen llamada manolo/web:v10 5. Verifica que la has borrado 6. Vuelve a cargar una imagen llamada manolo/web:v10 7. Borra todas las imágemes 8. Verifica que no tienes ninguna imagen ">
    <meta itemprop="wordCount" content="70">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Crea imágenes">
    <meta name="twitter:description" content="Descargar, ver y borrar imágenes Comandos a usar docker pull docker images docker rmi nombre_imagen docker rmi (docker images) 1. Descarga una imagen llamada ubuntu_latest 2. Descarga una imagen llamada manolo/web:v1 3. Verficia que las has descargado listándolas 4. Borra la imagen llamada manolo/web:v10 5. Verifica que la has borrado 6. Vuelve a cargar una imagen llamada manolo/web:v10 7. Borra todas las imágemes 8. Verifica que no tienes ninguna imagen ">




    <link rel="preload" href="/dwes/docker/scss/main.min.a18241fb76e390a924e57554186f3b012335c9bde30f23936d3bd6d9b05f0f6e.css" as="style">
    <link href="/dwes/docker/scss/main.min.a18241fb76e390a924e57554186f3b012335c9bde30f23936d3bd6d9b05f0f6e.css" rel="stylesheet" integrity="">

    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous"></script>

</head>
<body class="td-section">
<header>
    <header>
        <nav class="js-navbar-scroll navbar navbar-expand navbar-dark flex-column flex-md-row td-navbar">
            <a class="navbar-brand" href="/manuel/"><span class="navbar-brand__logo navbar-logo">Desarrollo Web</span></a>
            <div class="td-navbar-nav-scroll ml-md-auto pr-20%" id="main_navbar ">
                <h1 style="text-color:white">Soluciones a ejercicos</h1>
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
            <hr />
            <span class="d-block text-end fw-bold fst-italic" style="font-size: 1.2rem;">En 5 segundos la página te redirigirá....</span>
        </div>
    </div>
    </body>
    </html>
