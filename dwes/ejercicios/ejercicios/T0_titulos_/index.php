<?php
//Registro el evento
/*
require_once "DB.php_";
DB::registra_accion();
*/
// fin s





$d = rand(1, 32);
$m = rand(1, 14);
$y = rand(1, 1990);



$fecha = "$d-$m-$y";
$error = null;

/*
 * function bisiesto($y){
    $b= false;
    if ( (($y%4==0)and($y%100!=0))or($y%400==0))
        return true;
    else
        return false;
}
fucntion bisiesto($y){

}


* */


function bisiesto($year)
{
    if ($year % 400 == 0)
        return true;
    else
        if (($year % 100 != 0) && ($year % 4 == 0)) {
            return true;
        } else {
            return false;
        }
}


switch ($m) {
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
        if ($d > 31)
            $error = "En el $m mes solo 31 días no $d días";
        break;
    case 4:
    case 6:
    case 9:
    case 11:
        if ($d > 30)
            $error = "En el $m mes solo 30 días no $d días";
        break;
        break;
    case 2:
        if (bisiesto($y)) {
            if ($dia > 29)
                $error = "En el $m mes y año bisiesto solo hasta 29 días no $d días";
        } else {
            if ($d > 28)
                $error = "En el $m mes y año no bisiesto solo hasta 28 días no $d días";
        }
        break;
    default:
        $error = "Mes $m no correcto";
        break;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>
<?php if (is_null($error)) {
    echo "La fecha $fecha es correcta";
} else {
    echo "La fecha $fecha no es correcta";
    echo "error: $error";
}
?>
</h1>
</body>
</html>
