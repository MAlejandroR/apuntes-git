
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              <title>Adivina número</title>
    </head>
    <body>
        <fieldset style="width: 50%;float:left;margin-left: 20%; background: bisque">
            <legend><h1>Juego adivina número</h1></legend>


            <h2>    Debes de adivinar un número que yo genero</h2>
            <h2>    El número está entre 0 y 1024</h2>
            <h2>    Cada vez que verifiques yo te diré</h2>
            <ul>
                <ol>Si el número buscado es mayor</ol>
                <ol>Si el número buscado es menor</ol>
                <ol>Si has aceertado el número</ol>
            </ul>
            <h2>    Tienes 10 intentos</h2>
            <h2>    Se te indicará el número de intentos que llevas</h2>
            <form action="jugar.php" method="POST">
                <input type="submit" value="Empezar" name="submit">
            </form>
        </fieldset>

    </body>
</html>
