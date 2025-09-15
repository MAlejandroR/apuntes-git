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

<body>
<?php
header("refresh:5;url=http://localhost/practica1/index.php_");
?>
<div class="solucion">
    <h1>Asignaciones en PHP</h1>
    <table border="1">
        <tr>
            <th>Expresión asignada</th>
            <th>Valor de la expresión</th>
        </tr>

        <tr><span class='msj'>
            <?php
                define("NUMERO1", 14);

                echo "<td><span class=bold>\$a=".NUMERO1."</td><td>-<span class='variable'>".NUMERO1."</span>- (".gettype(NUMERO1).") Viene de asignar una constante númerica entera</td>";
            ?>
</span>
        </tr>
        <tr><span class='msj'>
                <?php
                    define("NUMERO2", 2.86);

                    echo "<td><span class=bold>\$a=".NUMERO2."</td><td>-<span class='variable'>".NUMERO2."</span>- (".gettype(NUMERO2).") Viene de asignar una constante númerica decimal</td>";
                ?>
</span>
        </tr>
        <tr><span class='msj'>
                <?php
                    define("NUMERO3", 0b11010111);
                    $bin=decbin(NUMERO3);

                    echo "<td><span class=bold>\$a=0b$bin</td><td>-<span class='variable'>".NUMERO3."</span>- (".gettype(NUMERO3).") Viene de asignar una constante binaria</td>";
                ?>
</span>
        <tr><span class='msj'>
                <?php
                define("NUMERO4", 0xBA14);
                $hex=dechex(NUMERO4);

                echo "<td><span class=bold>\$a=0x$hex</td><td>-<span class='variable'>".NUMERO4."</span>- (".gettype(NUMERO4).") Viene de asignar una constante hexadecimal</td>";
                ?>
</span>
        </tr>
        <tr><span class='msj'>
                <?php
               define("CADENA","hola, soy Paula");

                    echo "<td><span class=bold>\$a=\"".CADENA."\"</td><td>-<span class='variable'>".CADENA."</span>- (".gettype(CADENA).") Viene de asignar una constante cadena de carácteres</td>";
                ?>
</span>
        </tr>
        <tr><span class='msj'>
                <td><span class=bold>$a=2+6</td>
                <?php
                    $a=2+6;

                    echo "<td>-<span class='variable'>$a</span>- (".gettype($a).") Viene de asignar una expresión aritmética</td>";
                ?>
</span>
        </tr>
        <tr><span class='msj'>
                <td><span class=bold>$a="hola"."buenas"</td>
                <?php
                    $a="hola"."buenas";

                    echo "<td>-<span class='variable'>$a</span>- (".gettype($a).") Viene de asignar una expresión de concatenación de cadenas de carácteres</td>";
                ?>
</span>
        </tr>
        <tr><span class='msj'>
                <td><span class=bold>$a=print("
                <?php
                $a=print("hola buenas");

                echo "\")</td><td>-<span class='variable'>$a</span>- (".gettype($a).") Viene de asignar una función </td>";
                ?>
</span>
        </tr>
        <tr><span class='msj'><td><span class=bold>$a=($v=

                 <?php
                 $num=14;
                 $a=($v=$num);

                 echo"$num)</td><td>-<span class='variable'>$a</span>- (".gettype($a).") Viene de asignar una expresión que es una asignación</td>";
                 ?>
</span>
        </tr>
    </table>
</div>
</body>

</html>