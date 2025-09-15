<?php
//include "./../DB.php_";

//DB::inserta_acceso_user("Contendio T3_acceso_restringido");

$index = file_get_contents("./index.php_");
$general = file_get_contents("./general/index.php_");
$general_htaccess= file_get_contents("./general/.htaccess");
$grupo = file_get_contents("./grupo/index.php_");
$grupo_htaccess= file_get_contents("./grupo/.htaccess");
$restringido = file_get_contents("./restringido/index.php_");
$restringido_htaccess= file_get_contents("./restringido/.htaccess");
$sara = file_get_contents("./sara/index.php_");
$sara_htaccess= file_get_contents("./sara/.htaccess");
$nobody = file_get_contents("./nobody/index.php_");
$nobody_htaccess= file_get_contents("./nobody/.htaccess");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <link rel="stylesheet" href="./estilo.css" type="text/css">

    <title>Document</title>
</head>
<body>
<?php
//index
echo "<div class='fichero'>";
echo "<h2>Fichero index.php_ principal</h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($index)."</pre>";
echo "<hr />";
echo "</div>";
//general
echo "<div class='fichero'>";
echo "<h2>Acceso general: todos pueden acceder </h2>";
echo "<h3>Fichero ./general/index.php_  </h3>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($general)."</pre>";
echo "<hr />";
echo "</div>";
//restringido
echo "<div class='fichero'>";
echo "<h2>Acceso restringido : Solo usuarios registrados en fichero misUsuarios</h2>";
echo "<h3>Fichero ./restringido/index.php_ </h3>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($restringido)."</pre>";
echo "<h2>Fichero .htaccess para restringido</h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($restringido_htaccess)."</pre>";
echo "<hr />";
echo "</div>";
//grupo
echo "<div class='fichero'>";
echo "<h2>Acceso grupo: Solo usuarios del grupo misGrupos</h2>";
echo "<h3>Fichero ./grupo/index.php_ </h3>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($grupo)."</pre>";
echo "<h2>Fichero .htaccess para grupo</h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($grupo_htaccess)."</pre>";
echo "<hr />";
echo "</div>";
//sara
echo "<div class='fichero'>";
echo "<h2>Acceso sara: Solo el usuario sara puede acceder</h2>";
echo "<h3>Fichero ./sara/index.php_ </h3>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($sara)."</pre>";
echo "<h2>Fichero .htaccess para sara</h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($sara_htaccess)."</pre>";
echo "<hr />";
echo "</div>";
//nobody para borrar cookeis
echo "<div class='fichero'>";
echo "<h2>Para borrar el contenido que se almacena por la cookie de sesion</h2>";
echo "<h3>Fichero ./nobody/index.php_ </h3>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($nobody)."</pre>";
echo "<h2>Fichero .htaccess para eliminar credenciales</h2>";
echo "<pre class=\"prettyprint\">".htmlspecialchars($nobody_htaccess)."</pre>";
echo "<hr />";
echo "</div>";
?>


</body>
</html>
