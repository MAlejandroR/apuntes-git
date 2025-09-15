<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
    <title>Document</title>
</head>
<body>
<div class="solucion">
    <h1>Funciones: paso de parámetros</h1>

    <?php
    function mayor(&$a, $b){

        echo "<div class='parrafo'><div class='bold'>Dentro de la función,  antes de modificar parámetros: <span class='variable'>\$a = $a  \$b = $b</span></div></div>";

        $a*=2;
        $b*=2;

        echo "<div class='parrafo'><div class='bold'>Dentro de la función,  después  de modificar parámetros <span class='variable'>\$a = $a  \$b = $b</span></div></div>";

        return ($a>$b)? $a : $b;
    }

    $var1=9;
    $var2=5;

    echo "<div class='parrafo'><div class='bold'>Programa principal, antes de invocar a la función. <span class='variable'>\$var1= $var1 \$var2 = $var2</span></div></div>";
    $resultado = mayor($var1, $var2); //var1 se va a modificarse tras la función ya que es pasada como valor por referencia
    //var2 no se modificará
    echo "<div class='parrafo'><div class='bold'>Programa principal, después de invocar a la función. <span class='variable'>\$var1= $var1 \$var2 = $var2</span></div></div>";

    echo "<div class='parrafo'><div class='bold'>El valor mayor es: <span class='variable'>$resultado</span></div></div>";
    ?>

    <div class='parrafo'><div class='bold'>Si hicieramos una variable global igual al segundo parámetro se modificaría dentro y fuera de la función. Resultaría lo mismo que pasar la variable por referencia.</div></div>
    <br/>
</div>
</body>
</html>