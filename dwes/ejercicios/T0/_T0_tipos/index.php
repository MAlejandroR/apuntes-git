<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$a = 10;
echo "Valor de la variable \$a=10 -$a-  de tipo <span style='fonts-size:1.4em '>". gettype($a)."</span><br />";
$a = true;
echo "Valor de la variable \$a=true -$a-  de tipo <span style='fonts-size:1.4em '>". gettype($a)."</span><br />";
$a = false;
echo "Valor de la variable \$a=false -$a-  de tipo <span style='fonts-size:1.4em '>". gettype($a)."</span><br />";
$a = 10.24;
echo "Valor de la variable \$a=10.24 -$a-  de tipo <span style='fonts-size:1.4em '>". gettype($a)."</span><br />";
$a = "hola caracola";
echo "Valor de la variable \$a=\"Hola caracola\" -$a-  de tipo <span style='fonts-size:1.4em '>". gettype($a)."</span><br />";
$a = null;
echo "Valor de la variable \$a=null -$a-  de tipo <span style='fonts-size:1.4em '>". gettype($a)."</span><br />";
?>
</body>
</html>
