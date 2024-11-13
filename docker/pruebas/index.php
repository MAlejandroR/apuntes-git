<?php
$tv = file_get_contents("tv.json");
$cadenas = json_decode($tv, true);
foreach ($cadenas as $cadena) {
    echo "<h1>{$cadena['name']}</h1>";
    foreach ($cadena['channels'] as $canal){
        echo "
        <a href='{$canal['web_old']}'>
            <img src = '{$canal['logo']}'>
        </a>";
    }
    echo "<hr style='background-color:green;height:10px' />";
}
?>

