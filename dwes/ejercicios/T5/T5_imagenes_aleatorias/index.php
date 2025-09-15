<?php
$imagenes = ["http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/a_piece_for_the_wicked_vol_1.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/double_t.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/flagrantly_yours.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/gothic.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/iliad_of_a_wolverhampton_wanderer.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/libertine.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/lullabies_for_tough_guys.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/nocturnal_nomad.jpg",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/the_idle_gait_of_the_self_possessed.gif",
    "http://www.tecn.upf.es/~ocelma/cpom/practicas/php/random_images/discography/the_life_and_times_of_a_ballad_monger.jpg"
];
for ($i = 0; $i < 2; $i++) {
    $i1 = rand(0, count($imagenes) - 1);
    do {
        $i2 = rand(0, count($imagenes) - 1);
    } while ($i2 == $i1);
    do {
        $i3 = rand(0, count($imagenes) - 1);
    } while (($i3 == $i1)OR ( $i3 == $i2));
}
/* Alternativamente puedo usar la función sigueinte
  //$indices = array_rand($imagenes, 3);
 *
 */
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <META HTTP-EQUIV=Refresh CONTENT='2; URL=index.php'>
        <title></title>
    </head>
    <body>
        <fieldset>
            <?php
            /**
             * En caso de haber usado la función
             * Debo recoger los índices
             */
//$i1 = $indices[0];
//$i2 = $indices[1];
//$i3 = $indices[2];
            echo "<img src='$imagenes[$i1]' alt='imagen 1'>";
            echo "<img src='$imagenes[$i3]' alt='imagen 2'>";
            echo "<img src='$imagenes[$i2]' alt='imagen 3'>";
            ?>

        </fieldset>
    </body>
</html>