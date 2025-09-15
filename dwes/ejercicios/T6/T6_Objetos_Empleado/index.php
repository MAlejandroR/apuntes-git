<?php

//realizamos la carga automática de las clases
spl_autoload_register(function ($clase){
    require_once "$clase.php";
});


//Si vengo del click en el submit del formulario
if (isset($_POST['submit'])) {

    //Leo con filter input para poder filtrar valores de los input
    $n = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $a = filter_input(INPUT_POST, 'apellido');
    $h = filter_input(INPUT_POST, 'horas', FILTER_VALIDATE_FLOAT);
    $p_h = filter_input(INPUT_POST, 'precio_hora', FILTER_VALIDATE_FLOAT);

    //Creo un objeto de la clase empelado
    $empleado = new Empleado($n, $a, $h, $p_h);

    //Visualizo información usando los métodos de la clase
    $datos= $empleado;
    $datos.= "<hr />";
    $datos.= $empleado->genera_nomina();

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Nomina Empleados</title>

</head>
<body>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div class="contenedor">
<fieldset ">
    <legend>Datos de empleado</legend>
    <form action="index.php" method="POST">
        Nombre
        <input type="text" name="nombre" id=""><br />
        Apellido
        <input type="text" name="apellido" id=""><br />
        Horas trabajadas
        <input type="text" name="horas" id=""><br />
        Precio Hora
        <input type="text" name="precio_hora" id=""><br />
        <input type="submit" value="Mostrar datos Usuario y nómina " name="submit">
    </form>
</fieldset>
    <div class="contenedor_nominas">
        <div >

    <?php echo isset($datos)? $datos: null ?>
        </div>
    </div>
</div>
</body>
</html>
