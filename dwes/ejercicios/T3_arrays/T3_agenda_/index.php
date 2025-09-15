<?php
//controlador

$log = fopen("log.txt","a");
$date = date("hh:mm:ss D-m-Y", time());
fwrite ($log, $date." INICIO ");
fwrite ($log, PHP_EOL);

function add_input_hidden($agenda){
    foreach ($agenda as $nombre=>$telefono){
        echo "<input type=hidden name=agenda[$nombre] value=$telefono />\n";
    }
}
function show_agenda($agenda){
    foreach ($agenda as $nombre=>$telefono){
        echo "<h2> Nombre  $nombre Telefono $telefono </h2>\n";
    }
}
if (isset ($_POST['enviar'])){
    //Leer datos del formulario
    $nombre= isset($_POST['nombre']) ?  trim($_POST['nombre']): null;
    $tel= isset($_POST['tel']) ?  trim($_POST['tel']): null;
    $agenda= isset($_POST['agenda']) ?  $_POST['agenda']: [];
    fwrite ($log, "USUARIOS LEÍDOS ".sizeof($agenda)." usuarios");
    $t="NUEVO CONTACTO => Nombre : $nombre Teléfono : $tel";
    fwrite ($log, $t);

    $msj=null;
    
  
    
    if (empty($nombre)) {
        $msj = "Has de especificar un nombre";
    }
    
    if (empty($tel)) {
        if (!array_key_exists($nombre, $agenda))
           $msj = "Has de especificar un nombre que exista para borrarlo";
        else{
            unset ($agenda[$nombre]);
            $msj="Contacto de $nombre borrado";
        }
    }
   if (is_null($msj))
        $agenda[$nombre]=$tel;
        
}



$date = date("hh:mm:ss D-m-Y", time());
fwrite ($log, $date." FIN ");
fclose($log);

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
        <title></title>
    </head>
    <body>
        <?php echo $msj;?>
        <form action="index.php" method="POST">
            
            <input type="text" name="nombre" id="">
            <input type="text" name="tel" id="">
            <input type="submit" value="Agregar" name="enviar">
            <?php
            add_input_hidden($agenda);
            show_agenda($agenda);
            ?>
            
        </form>
    </body>
</html>
