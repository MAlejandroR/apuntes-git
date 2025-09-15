<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Práctica de PHP</title>
</head>
<body>
<?php

// Defino dos variables con mi nombre y apellidos
$nombre = "Manuel";
$apellido = "Romero";

// Visualizo el texto con echo y print
// Ejemplo: mi nombre es "Manuel" y mi apellido es "Romero"

// 1) Con echo pasando varios argumentos (separados por coma)
echo "Mi nombre es \"", $nombre, "\" y mi apellido es \"", $apellido, "\"<br>";

// 2) Con print
print "Mi nombre es \"$nombre\" y mi apellido es \"$apellido\"<br>";

// 3, 4 y 5) Explicación de diferencias y semejanzas entre echo y print:
// - `echo` permite múltiples argumentos separados por comas, mientras que `print` solo acepta una cadena como argumento.
// - `echo` es levemente más rápido y no devuelve un valor, mientras que `print` siempre devuelve 1.
// - Ambos se usan para mostrar texto en pantalla.

// 6) Explicación de por qué se pueden pasar los argumentos sin usar paréntesis
// En PHP, `echo` y `print` son constructores del lenguaje, por lo que no necesitan paréntesis para pasar sus argumentos.

/* 7) 1_Cookies heredoc */
$informe = <<<FIN
Este es el primer texto de informe.
Aquí va la segunda línea de contenido.
La tercera línea añade más texto.
Cuarta línea con información adicional.
Finalmente, la quinta línea del informe.
FIN;

// Visualizamos el contenido de 'informe'
echo "El contenido de 'informe' es:<br> $informe <br><br>";

/* PROBANDO VARIABLES (del 8 al 19) */
// 8) Crea una variable y asígnale un valor
$variable = "PHP básico";
echo "Valor: $variable, Tipo: ", gettype($variable), "<br>";

// Cambios de tipo de la variable
$variable = true;
echo "Valor: $variable, Tipo: ", gettype($variable), "<br>";

$variable = 12.34;
echo "Valor: $variable, Tipo: ", gettype($variable), "<br>";

$variable = "Texto";
echo "Valor: $variable, Tipo: ", gettype($variable), "<br>";

$variable = null;
echo "Valor: $variable, Tipo: ", gettype($variable), "<br>";

// Prueba de variable no definida
echo "Valor de variable no definida: ", gettype($variable_no_definida ?? 'No existe'), "<br>";

/* 20) Visualiza el código ASCII del valor 64 al 122 */
echo "Caracteres ASCII de 64 a 122:<br>";
for ($i = 64; $i <= 122; $i++) {
  printf("%c ", $i);
}
echo "<br><br>";

// 21) Visualiza el contenido de la función time() y explica su valor
echo "Valor de time(): " . time() . " (Representa el número de segundos desde 1 de enero de 1970 UTC)<br><br>";

// 22) Fecha actual en formato dia-mes-año
echo "Fecha actual: " . date("d-m-Y") . "<br><br>";

// 23, 24 y 25) Días, horas y minutos desde el 1/1/1970
$tiempo = time();
echo "Días desde 1/1/1970: " . floor($tiempo / (60 * 60 * 24)) . "<br>";
echo "Horas desde 1/1/1970: " . floor($tiempo / (60 * 60)) . "<br>";
echo "Minutos desde 1/1/1970: " . floor($tiempo / 60) . "<br><br>";

// 26, 27 y 28) Fecha actual en español, inglés y francés
setlocale(LC_TIME, "es_ES.UTF-8");
echo strftime("Fecha en español: %A, %d de %B de %Y") . "<br>";

setlocale(LC_TIME, "en_US.UTF-8");
echo strftime("Fecha en inglés: %A, %d %B %Y") . "<br>";

setlocale(LC_TIME, "fr_FR.UTF-8");
echo strftime("Fecha en francés: %A, %d %B %Y") . "<br><br>";

// 29-30) Fecha de cumpleaños y cálculo de edad
$cumpleanos = strtotime("1990-12-15");
$hoy = time();
$diferencia = $hoy - $cumpleanos;
$edad_anos = floor($diferencia / (365 * 24 * 60 * 60));
$edad_meses = floor(($diferencia % (365 * 24 * 60 * 60)) / (30 * 24 * 60 * 60));
$edad_dias = floor((($diferencia % (365 * 24 * 60 * 60)) % (30 * 24 * 60 * 60)) / (24 * 60 * 60));
echo "Tienes $edad_anos años, $edad_meses meses y $edad_dias días<br><br>";

// 31-32) Edad para una fecha específica
$fecha_especifica = strtotime("1969-10-30");
$diferencia = $hoy - $fecha_especifica;
$edad_anos = floor($diferencia / (365 * 24 * 60 * 60));
$edad_meses = floor(($diferencia % (365 * 24 * 60 * 60)) / (30 * 24 * 60 * 60));
$edad_dias = floor((($diferencia % (365 * 24 * 60 * 60)) % (30 * 24 * 60 * 60)) / (24 * 60 * 60));
echo "Para el 30/10/1969: tienes $edad_anos años, $edad_meses meses y $edad_dias días<br><br>";

// 33-36) Uso de getdate y explicación
print_r(getdate());
echo "<br>Explicación de getdate(1): obtiene la fecha para la marca de tiempo 1, es decir, 1 segundo después de 1/1/1970.<br>";
$fecha_nacimiento = getdate(strtotime("1969-01-01"));
echo "Edad de persona nacida el 1/1/1969 en años: " . (date("Y") - $fecha_nacimiento['year']) . "<br><br>";

// 37-64) Explicación de ejemplo strtotime
echo "<hr>";
echo strtotime("now"), "<br/>";
echo date('d-m-Y', strtotime("now")), "<br/>";
echo strtotime("27 September 1970"), "<br/>";
echo date('d-m-Y',strtotime("10 September 2000")), "<br/>";
echo strtotime("+1 day"), "<br/>";
echo date('d-m-Y',strtotime("+1 day")), "<br/>";
echo strtotime("+1 week"), "<br/>";
echo date('d-m-Y',strtotime("+1 week")), "<br/>";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br/>";
echo date('d-m-Y',strtotime("+1 week 2 days 4 hours 2 seconds")), "<br/>";
echo strtotime("next Thursday"), "<br/>";
echo date('d-m-Y',strtotime("next Thursday")), "<br/>";
echo strtotime("last Monday"), "<br/>";
echo date('d-m-Y',strtotime("last Monday")), "<br/>";
echo "<hr>";

?>
</body>
</html>
