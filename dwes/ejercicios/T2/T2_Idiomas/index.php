<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 16/02/18
 * Time: 13:30
 */
$idioma = "sp";

//Estas variables son para dejar seleccionado el radio del idioma
$checked_fr = null;
$checked_en = null;
$checked_sp = null;


$idioma = $_POST['idioma']??"sp";


switch ($idioma) {
  case 'fr':
    $titulo_idioma = "Selectionnez la langue";
    $titulo_datos = "Accéder aux données";
    $idioma_fr = "Français";
    $idioma_sp = "Espagnol";
    $idioma_en = "Anglais";
    $user = "Entrez votre nom";
    $submit_datos = "Accès";
    $submit_idioma = "Sélectioner";
    $checked_fr = "checked";
    break;
  case 'en':
    $titulo_idioma = "Select a Language";
    $titulo_datos = "Access data";
    $idioma_fr = "France";
    $idioma_sp = "Spain";
    $idioma_en = "English";
    $user = "Enter your name";
    $submit_datos = "Access";
    $submit_idioma = "Select";
    $checked_en = "checked";
    break;
  case 'sp':
    $titulo_idioma = "Selecciona el idioma";
    $titulo_datos = "Datos de acceso";
    $idioma_fr = "Francés";
    $idioma_sp ="Español";
    $idioma_en = "Inglés";
    $user = "Inserta tu nombre";
    $submit_datos = "Acceder";
    $submit_idioma = "Selecionar";
    $checked_sp = "checked";
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
        <title>Document</title>
    </head>
    <body>
        <fieldset>
            <form action="index.php" method="post">

                <legend><?php echo $titulo_idioma ?></legend>
                <input type="radio" name="idioma" <?php echo $checked_fr ?> value="fr"><?php echo $idioma_fr ?><br/>
                <input type="radio" name="idioma" <?php echo $checked_en ?> value="en"><?php echo $idioma_en ?><br/>
                <input type="radio" name="idioma" <?php echo $checked_sp ?> value="sp"><?php echo $idioma_sp?><br/>
                <input type="submit" name="submit" value="<?php echo $submit_idioma ?>">
            </form>
        </fieldset>


        <form action="sitio.php" method="post">
            <fieldset>
                <legend><?php echo $titulo_datos ?></legend>
<?php echo $user ?><input type="text" name="nombre">
                <input type="submit" value="<?php echo $submit_datos ?>">
                <input type="hidden" name=idioma value="<?php echo $idioma ?>">
            </fieldset>
        </form>

    </body>
</html>
