<?php
$num = rand(1,10);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="tabla.css" type="text/css">
    <title>Document</title>
</head>
<body>
<table border="1">
    <caption>Tabla del <?php echo $num ?> </caption>
    <?php
    for ($a =1; $a<=10; $a++){
        echo "<tr>";
        echo "<td>$num</td><td>x</td><td>$a</td><td>".$num*$a."</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>


