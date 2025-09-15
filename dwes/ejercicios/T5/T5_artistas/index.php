<!--En este caso he puesto directamente el código php en el body
Para centrar la atención en recorrer el array

-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="artista.css" rel="stylesheet" type="text/css">

        <title>Datos de canciones</title>
    </head>
    <body>
        <?php
        /**
         * Tenemos un array artistas con los siguientes campos
          1.-Codigo
         *           Cada elemento codigo tiene los siguientes campos
              1.1.-name
              1.2.-decades
              1.3.-city
              1.4- coutry
              1.5-canciones
                     Canciones es un array de arrays cada uno de los cuales  tiene que tiene los siguentes campos
                    1.5.1.-titulo
                    1.5.2.-link

          Al visualizar
          cada artista en un div artista
          y las canciones en una lista no ordenada con el div canciones
         */
        require_once ("datos.php");
        //Tenemos un array de artistas identificados por un número
        //De cada artista tenemos el nombre décadas y linck
        //Tenemos un array de canciones de cada artista
        foreach ($artistas as $codigo) {
            echo " <div id='artista'>";
            echo "<a href=" . $codigo['link'] . ">";
            echo $codigo['name'] . "</a>";
            echo $codigo['decades'];
            echo "<div id='canciones'><ol>";
            foreach ($codigo['songs'] as $cancion)
                echo "<li><a href='" . $cancion['link'] . "'>" . $cancion['title'] . "</a></li>";
            echo "</ol></div></div>";
        }
        ?>
    </body>
</html>