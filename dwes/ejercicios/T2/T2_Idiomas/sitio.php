<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 16/02/18
 * Time: 14:55
 */

$nombre = $_POST['nombre'];
$idioma = $_POST ['idioma'];
switch ($idioma) {
    case 'fr':
        $saludo = "Bienvenue sur ce site $nombre";
        $volver ="revenir";
        break;
    case 'en':
        $saludo = "Wellcome to this Website $nombre";
        $volver ="return";
        break;
    case 'sp':
        $saludo = "Bienvenido a esta página web_old $nombre";
        $volver ="Volver";
        break;
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<h1><?php echo $saludo ?> </h1>
<form action="index.php" method="post">
    <input type="submit" value="<?=$volver?>" />
    <input type="hidden" value="<?=$idioma?>" name="idioma" />

</form>

</body>
</html>
