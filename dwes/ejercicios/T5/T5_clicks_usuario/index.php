<?php
if (isset($_POST['submit'])) {
    //Leo el nuevo nombre
    $nombre = $_POST['name'];

    //Leo el array que contendrá todos los nombres anteriores
    //Observca que es un array asociativo por nombres cuyo valor de cada posición
    //es el números de clicks que ha echo
    $accesos = $_POST['accesos'];

    //Agrego el nuevo dato. Fíjate que si ya existiera esa posición (ese nombre)
    //accederé a ella e incrementaré el número de accesos
    //Si no existiera se agregará
    //Esto en otros lenguajes implicaría buscar a ver si existe, en php_ no hace falta
    $accesos[$nombre] ++;
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        <fieldset style="width:50%;background:antiquewhite;margin:20%">
            <legend>Click de usuarios</legend>
            <form action="" method="POST">
                Nombre
                <input type="text" name="name" id=""><br />
                <input type="submit" value="Click" name="submit">
                <?php
                //Guardo el array para poderlo leer
                //Tendremos que agregar tantos inputs como posiciones tenga el array
                //Pero todos tendrán el mismo nombre (aunque diferente índice)
                foreach ($accesos as $nombre => $clicks) {
                    echo "<input type=hidden name='accesos[$nombre]' value ='$clicks'>";
                    echo "<h3>$nombre ha hecho $clicks clicks</h3>";
                }
                ?>
            </form>

        </fieldset>

    </body>
</html>