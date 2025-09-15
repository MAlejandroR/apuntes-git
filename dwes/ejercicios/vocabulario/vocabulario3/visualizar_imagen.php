<?php
$idioma = $_GET['idioma'] ?? $_POST['idioma'] ?? null;
$imagen = $_SESSION["idioma"];
$msj = null;

if (isset($_POST['submit'])) {
    var_dump($_POST);
    $palabra_usuario = $_POST['palabra'];
    $aciertos = 0;
    foreach ($palabra_usuario as $pos => $letra)
        if ($letra == $imagen[$pos])
            $aciertos++;
    $msj = "<h2>Has acertado $aciertos caracteres</h2>";
    $msj .= "<h2>Palabra a resolver es <span style='color:green'>$imagen</span></h2>";
    $palabra_usuario = implode("", $palabra_usuario);
    $msj .= "<h2>Palabra  escrita por el usuario es  <span style='color:green'>$palabra_usuario</span></h2>";


}

?>

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
<fieldset>
    <legend>Examen de Vocabulario</legend>
    <img src="./idiomas/<?= "$idioma/$imagen" ?>" alt="imagen a visualizar">
</fieldset>
<?php if (is_null($msj)): ?>

    <form action="visualizar_imagen.php" method="post">
        <?php
        $char = $imagen[0];
        $n = 0;
        while ($char != ".") {
            echo "<input type=text maxlength='1' size=2 name=palabra[]>";
            $n++;
            $char = $imagen[$n];
        }
        ?>
        <input type="hidden" value="<?=$imagen?>" name="imagen">
        <input type="hidden" value="<?=$idioma?>" name="idioma">
        <input type="submit" value="Validar" name="submit">
    </form>
<?php else:
    echo $msj; ?>
    <a href="index.php"> Volver al index</a>
<?php endif; ?>
</body>
</html>
