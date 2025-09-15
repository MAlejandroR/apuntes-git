<?php
spl_autoload_register (function ($clase) {
    require_once ("$clase.php");
});
$datos=$_POST['datos'];

$bd=new BD($datos);
var_dump ($bd);
exit();
if (isset($_POST['submit']) {
    switch ($_POST['acciones']) {
        case 'registrar':
            $nom=filter_input (INPUT_POST, 'nombre');
            $pass=filter_input (INPUT_POST, 'pass');
            $nom=mysqli_real_escape_string ($conexion, $nom);
            $pass=mysqli_real_escape_string ($conexion, $pass);
            $pass=md5 (pass);
            if (empty($nom) || empty($pass))
                $msj="Debes rellenar nombre y password";
            else {
                $sentencia="insert into usuarios values ('$nom', '$pass');";
                $conexion->query ($sentencia);
                if ($conexion->affected_rows === 1)
                    $msj.="Fila insertada correctamente";
                else
                    $msj.="No se ha podido insertar la fila";
            }
            break;
        case 'ver usuarios':
            $sentencia="select * from usuarios";
            $usuarios=$conexion->query ($sentencia);
            break;
        case 'vaciar tabla':
            $sentencia="delete from usuarios";
            $resultado=$conexion->query ($sentencia);
            $msj.="Se han borrado $conexion->affected_rows filas";
            break;
    }

}

function mostrar_usuarios($resultado)
{
    if ($resultado == null)
        return null;
    echo "<div id=listado>";
    $cabecera=["nombre", "password"];
    $contenido=[];
    while ($c=$resultado->fetch_row ()) {
        $contenido[]=$c;
    }
    $tabla=new Tabla($cabecera, $contenido);
    $tabla->set_border (1);
    $tabla->set_titulo ($resultado->num_rows . " usuarios");
    echo $tabla->draw_table ();
    echo '</div>';
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro usuarios</title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>
<h1>Registro Acceso a base de datos</h1>
<div id="login">

    <fieldset>
        <legend>Acceso al sistema</legend>
        <form action="." method="POST">
            <?php
            $datos=[0=>["<label for='nombre' >Nombre</label>",
                "<input type='text' name ='nombre'>"],
                1=>["<label for='pass'>Password </label>",
                    "<input type='text' name ='pass'>"]];
            $tablaFormulario=new Tabla(null, $datos);
            $tablaFormulario=new Tabla(null, $datos);
            echo $tablaFormulario->draw_table ();
            ?>
            <hr/>
            <input type="submit" value="registrar" name="login"/>
            <input type="submit" value="ver usuarios" name="login"/>
            <input type="submit" value="vaciar tabla" name="login"/>
        </form>
    </fieldset>

    <?php
    mostrar_usuarios ($usuarios);

    if (!empty($msj))
        echo "<div id='msj'>.$msj.</div>";
    ?>

</div>
</body>
</html>
