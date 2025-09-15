!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset style="width:60%">
            <legend>Datos personales</legend>
            <form action="datos.php" method="POST">
                <!--
                Podremos valores por defecto
                para poder probarlo más rápido
                -->
                <label for="">Nombre</label>
                <input type="text" name="nombre" value="Manuel"><br />
                <label for="">Apellido</label>
                <input type="text" name="apellido" value="Romero">
                <br />
                <label for="">Direccion</label>
                <input type="text" name="direccion" value="Mi casa">
                <br>
                <label for="">
                    Fecha Nacimiento
                </label><input type="date" name="fNac" value="2000-01-02">
                <br>
                <label for="">Edad</label>
                <input type="text" name="edad" value="95">
                <br />

                <b>Idiomas</b><br />
                <input type="checkbox" name="idiomas[]" checked value="castellano" id="">
                <label for="">Castellano</label>
                <br>

                <input type="checkbox" name="idiomas[]" checked value="rumano" id="">
                <label for="">Rumano</label>
                <br>


                <input type="checkbox" name="idiomas[]" value="inglés" id="">
                <label for="">Inglés</label>
                <br>
                <input type="checkbox" name="idiomas[]" value="francés" id="">
                <label for="">Francés</label>
                <br>
                <b>Género</b><br />
                <input type="radio" name="genero" checked value="masculino" id="">Masculino<br />
                <input type="radio" name="genero" value="femenino" id="">Femenino<br />
                <input type="radio" name="genero" value="no_aporta" id="">No quiero aportar<br />

                <label for="">Dirección de correo</label>
                <input type="email" name="email" value="micorreo@gmail.com"><br /><br />
                Estudios
                <select name="estudios" value="eso">


                    <option value="eso">ESO</option><br />
                    <option value="bach"  >BACH</option><br />
                    <option value="cicloFormativo">Ciclo Formativo</option><br />
                    <option value="gradoUniversitario">Grado Universitario</option><br />
                </select>
                <hr />
                <input type="submit" value="Enviar">

            </form>
        </fieldset>

    </body>
</html>