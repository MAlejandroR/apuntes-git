
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
<?php
header("refresh:5;url=http://localhost/practica1/index.php_");
?>
<div class="solucion">
    <h1>Variables en PHP</h1>
    <table border="1">
        <tr>
            <th>Valores Asignados</th>
            <th>Mostrando Valores</th>
        </tr>

        <tr><span class='msj'>
                <?php
                    $v=306;

                    print "<td>\$v=$v</td><td>Variable <span class='bold'>decimal</span>, valor <span class='variable'>-$v-</span></td>";
                ?>
        </span>

        </tr>
        <tr><span class='msj'>
                <?php
                    $v=0154;
                    $v_octal=decoct($v);

                    print "<td>\$v=0$v_octal</td><td> Variable <span class='bold'>octal</span>, valor <span class='bold'>decimal</span> <span class='variable'>-$v-</span> y en <span class='bold'>octal</span> <span class='variable'>-$v_octal-</span>";
                ?>
        </span>

        </tr>
        <tr><span class='msj'>
                <?php
                    $v=0xBA14;
                    $v_hexa=dechex($v);

                    print "<td>\$v=0x$v_hexa</td><td>Variable <span class='bold'>hexadecimal</span>,valor <span class='bold'>decimal</span> <span class='variable'>-$v-</span> y en <span class='bold'>hexadecimal</span>  <span class='variable'>-$v_hexa-</span></td>";
                ?>
        </span>

        </tr>
        <tr><span class='msj'>
                <?php
                    $v=0b1110;
                    $v_bin=decbin($v);

                    print "<td>\$v=0b$v_bin</td><td>Variable <span class='bold'>binaria</span>, valor <span class='bold'>decimal</span> <span class='variable'>-$v-</span> y en <span class='bold'>binario</span>  <span class='variable'>-$v_bin-</span></td>";
                ?>
        </span>

        </tr>
        <tr><span class='msj'>
                <?php
                    $v=8.5647789118;

                    print "<td>\$v=$v</td><td>Variable <span class='bold'>float</span>,valor  <span class='variable'>-$v-</span> y en <span class='bold'>notación científica</span> es ";
                    printf ("<span class='variable'>-%e-</span></td>",$v);
                ?>
        </span>

        </tr>
        <tr><span class='msj'>
                <?php
                    $v=2.44540000E+1;

                    printf ("<td>\$v= %e</td><td>Variable <span class='bold'>float</span>,valor <span class='variable'>-$v-</span>  y en <span class='bold'>notación científica</span> es <span class='variable'>-%e- </span></td>", $v, $v);
                ?>
        </span>

        </tr>
        <tr><span class='msj'>
                <?php
                    $v=null;

                    if (is_null($v)){//true
                        print "<td>\$v=null</td><td>Variable <span class='bold'>null</span>  es <span class='variable'>-$v-</span> y en string es<span class='variable'> -null-<span> </td>";
                    }
                ?>
        </span>

        </tr>
        <tr><span class='msj'>
               <?php
                    $v=true;

                    if ($v){//true
                        print "<td>\$v=true</td><td>Variable <span class='bold'>boolean</span>,valor <sapn class='variable'>-$v-</sapn> y en string es <span class='variable'>-true-</span></td>";
                    }else{//false
                        print "<td>\$v=false</td><td>Variable <span class='bold'>boolean</span>,valor <sapn class='variable'>-$v-</sapn> y en string es <span class='variable'>-false-</span></td>";
                    }
                ?>
</span>


        </tr>
        <tr><span class='msj'>
               <?php
                    $v=false;

                    if ($v){//true
                        print "<td>\$v=true</td><td>Variable <span class='bold'>boolean</span>,valor <sapn class='variable'>-$v-</sapn> y en string es <span class='variable'>-true-</span></td>";
                    }else{//false
                        print "<td>\$v=false</td><td>Variable <span class='bold'>boolean</span>,valor <sapn class='variable'>-$v-</sapn> y en string es <span class='variable'>-false-</span></td>";
                    }
               ?>
</span>


        </tr>


        <tr><span class='msj'>
                <?php
                    $v="Esto es una cadena de caracteres";

                    print "<td>\$v=\"$v\"</td><td>Variable <span class='bold'>string</span>, valor  <span class='variable'>-$v-</span></td>";
                ?>
</span>
        </tr>
        <tr><span class='msj'>
                <?php
                    $v='Esto es una cadena de caracteres';

                    print "<td>\$v='$v'</td><td>Variable <span class='bold'>string</span>, valor  <span class='variable'>-$v-</span></td>";
                ?>
</span>
        </tr>
        <tr><span class='msj'>

                <?php
                    $v=<<<END
Esto que ves,
es una cadena
multilínea
y termina aquí             
END;

                    print"<td>\$v=<<< END<pre>$v</pre><br/>END;</td><td>Variable <span class='bold'>string</span>, valor  <span class='variable'>-$v-";
                ?>
</span>

        </tr>

        <tr><span class='msj'>

                <?php
                $v=<<<'END'
Esto que ves,
es una cadena
multilínea
y termina aquí              
END;

                    print"<td>\$v=<<< 'END'<pre>$v</pre><br/>END;</td><td>Variable <span class='bold'>string</span>, valor  <span class='variable'>-$v-";
                ?>
</span>
        </tr>
    </table>
</div>

</div>
</body>
</html>