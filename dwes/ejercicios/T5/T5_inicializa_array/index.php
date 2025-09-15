<?php
//En este caso sólo código php_ y var_dump para visualizar el array

//Delcaro y asigno valores al array
$array = [1, "pedro", "Almudena", 8, [6, 7, "juan"]];
echo "<h2>Visualizo el array </h2><hr />";
var_dump($array);

//Agrego elementos,  mantengo los valores anteriores
echo "<h2>Agrego dos elementos</h2><hr />";
$array[15] = "Otro elemento";
$array[30] = "Otro el último elemento";
echo "<h2>Visualizo el array despúes de agregar</h2><hr />";
var_dump($array);

//Recorro con foreach el array
foreach ($array as $valor) {
    $array_copia[] = $valor;
}

//Copio y visualizo el array
$array = $array_copia;
echo "<h2>Visualizo el array compactado</h2><hr />";
var_dump($array);
?>
