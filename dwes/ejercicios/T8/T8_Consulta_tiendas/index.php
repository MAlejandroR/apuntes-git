<?php
spl_autoload_register(function ($clase) {
    require_once("$clase.php");
});
$usuarios = null;
//Conectamos a la base de datos, en mi caso
$database = "dwes";
$host = "172.17.0.2";
$user = "root";
$pass = "root";

$conexion = new mysqli($host, $user, $pass, $database);
if ($conexion->connect_errno !== 0)
    die("No se ha podido conectar. error: <h2> " . $conexion->connect_error . "</h2>");

$sentencia = <<<FIN
         Select p.nombre_corto, t.nombre, s.unidades
         from producto p, tienda t, stock s
         where p.cod = s.producto AND
               s.tienda = t.cod
FIN;

$html = <<<FIN
           <table border=1>
             <tr>
               <th>Nombre producto</th>
               <th>Tienda</th>
               <th>Unidades</th>
              </tr>
FIN;


$tuplas = $conexion->query($sentencia);
$cantidad = $tuplas->num_rows;
while ($f = $tuplas->fetch_row()) {
    $html .= <<<FIN
        <tr>
                <td>$f[0]</td>
                <td>$f[1]</td>
                <td>$f[2]</td>
               </tr>
    
FIN;
}//End while
$html .= "</table>";


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Datos productos</title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>
<h1>Relación de <?=$cantidad ?> productos disponibles</h1>
<?= $html ?>
</body>
</html>
