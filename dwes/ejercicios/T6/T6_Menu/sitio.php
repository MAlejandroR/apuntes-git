
<?php
session_start();
spl_autoload_register(function ($class){
    require_once "$class.php";
});

$menu = unserialize($_SESSION['menu']);
$modo = $_GET['modo'];
if ($modo=='V')
    $op_menu = $menu->get_vertical();
if ($modo=='H')
    $op_menu = $menu->get_horizontal();


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Crea Menu</title>
</head>
<body>
<?php
  echo $op_menu;
?>
<br />
<form action="index.php">
    <input type="submit" value="Volver">
</form>


</body>
</html>