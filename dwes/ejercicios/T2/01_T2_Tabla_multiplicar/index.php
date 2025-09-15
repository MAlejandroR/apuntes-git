<?php
$tabla = "";
if (isset($_POST['submit'])) {
    $num = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT);
    $tabla = "<table>";
    for ($n = 1; $n <= 10; $n++) {
        $rtdo = $n * $num;
        $tabla .= "<tr>
                <td>$num</td>
                <td>*</td>
                <td>$n</td>
                <td>$rtdo</td>
                </tr>";

    }
    $tabla .= "</tabla>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Tabla de multiplicar</title>
</head>
<body>

<legend>Tabla de multiplicar</legend>
<?php if (isset($_POST['submit'])) :
    echo "$tabla";
else:?>
    <fieldset>
        <form action="index.php" method="post">
            <label>Inserta un número</label>
            <input type="text" name="numero" id=""><br/>
            <input type="submit" value="Calcular" name="submit">
    </fieldset>
    </form>
<?php
ENDIF
?>


</body>
</html>
