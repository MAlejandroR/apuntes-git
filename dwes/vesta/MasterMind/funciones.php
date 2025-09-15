<?php

/**
 * @param $jugada una jugada de 4 colores
 * @return bool | array
 * retorna true si la jugada es válida (se aportan 4 colores=
 * Si no es válida, retorna un array con dos mensajes:
 * mesajeJugar = > un texto para la sección de jugar (el menu)
 * msj=> otro texto pra la sección de información
 */
function valida_jugada ($jugada)
{

    if ((is_null($jugada)) || (sizeof($jugada) != 4)) {
        $jugadaValida['mensajeJugar'] = "<span class='error'>Debes seleccionar 4 colores para jugar</span>";
        $jugadaValida['msj'] = "<h3 class='error'>Jugadas anteriores</h3>";
        $jugadaValida['msj'] .= obtener_jugadas();
    }else
        $jugadaValida = true;
    return $jugadaValida;
}



function mostrar_clave(array $arrayColores): string
{
    $htmlClave = "<div class='jugada'>";
    foreach ($arrayColores as $color)
        $htmlClave .= "<span class='Color  $color'>$color</span>";
    $htmlClave .= "</div >";
    return $htmlClave;

}

function mostrar_formulario_jugar():string
{
    //Creamos 4 submits

    $selectores = ""; //quitamos el warning inicializanso
    for ($n = 0; $n < 4; $n++) {
        $options="";
        $class="";
        foreach (COLORES as $color) {
            $ultimoColorSeleccionado =$_POST['combinacion'][$n] ??"";
            $selected="";
            $class = $class ?? "";
            if ($color==$ultimoColorSeleccionado) {
                $selected = "selected";
                $class = "class = $color";
            }
            $options .= "<option class ='$color' value='$color' $selected>$color</option>\n";
        }
        $selectores .= "\n<select onchange='cambia_color($n)' $class name='combinacion[]' id='combinacion$n'>\n";
        $selectores.="<option value='' selected disabled hidden>Color</option>";
        $selectores.=$options;
        $selectores .= "</select>\n";
    }
    return $selectores;
}

function generar_clave(): array
{
    $clave = [];

    $posiciones = array_rand(COLORES, 4);

    foreach ($posiciones as $item) {
        $clave[] = COLORES[$item];
    }

    return $clave;
}

/**
 * @param $clave
 * compara la clave con la jugada
 * Anota el resultado que son los colores acertados y de ellos cuantos
 * Están en la posiciòn correcta
 */
function comparaJugada(array $jugada, array $clave): array
{
    $resultado = [];
    $posicionesAcertadas = 0;
    $coloresAcertados = 0;

    foreach ($jugada as $posicion => $color) {
        if ($color == $clave[$posicion])
            $posicionesAcertadas++;
    }
    //quitamos duplicados
    $jugada = array_unique($jugada);
    foreach ($jugada as $color)
        if (in_array($color, $clave))
            $coloresAcertados++;
    return $resultado = ['posiciones'=>$posicionesAcertadas,'colores'=> $coloresAcertados];
}


/**
 * @param array $jugadas
 * @return array obtiene todas las jugadas
 */
function obtener_jugadas(): string
{
    $jugadas = $_SESSION['jugadas'] ??  [];
    if ($jugadas ==[])
        return "No hay jugadas actualmente";
    $numeroJugadas = count($jugadas);

    $htmlJugadas = obtener_jugada_actual($jugadas);
    $htmlJugadas .="<hr />";
    $htmlJugadas .="Histórico de jugadas";

    $jugadas = array_reverse($jugadas);
    $htmlJugadas .= obtener_listado_jugadas_anteriores($jugadas,$numeroJugadas);
    return $htmlJugadas;

}

/**
 * @param $jugadas
 * @param string $htmlJugadas
 * @param $numeroJugadaActual
 * @return string
 */
function obtener_listado_jugadas_anteriores(array $jugadas, int $numeroJugadas): string
{
    $htmlJugadas ="";
    foreach ($jugadas as $numeroJugada => $jugada) {

        $htmlJugadas .= "<div class='jugada'>";
        $htmlJugadas .= "<h3 class=titulo jugadaNumero>Valor de la jugada " . ($numeroJugadas - $numeroJugada) . "  </h3>\n";
        $htmlJugadas .= "<span class='jugadaRedondeles'>";
        for ($n = 0; $n < $jugada['resultado']['posiciones']; $n++)
            $htmlJugadas .= "<span class='negro '>$n</span>\n";
        for ($n = $jugada['resultado']['posiciones']; $n < $jugada['resultado']['colores']; $n++)
            $htmlJugadas .= "<span  class='blanco' style ='width:1000px'>$n</span>\n";
        $htmlJugadas .= "</span>";
        $htmlJugadas .= "<span class='jugadaColores'>";
        foreach ($jugada['jugada'] as $color)
            $htmlJugadas .= "<span class='Color_small  $color'>$color[0]</span>\n";
        $htmlJugadas .= "</span>\n\n";
        $htmlJugadas .= "</div>\n\n";
    }
    return $htmlJugadas;
}
function obtener_listado_final_jugadas(): string
{
    $htmlJugadas ="";
    $jugadas = array_reverse($_SESSION['jugadas']);
    $numeroJugadas= sizeof($jugadas);

    foreach ($jugadas as $numeroJugada => $jugada) {

        $htmlJugadas .= "<div class='jugada'>";
        $htmlJugadas .= "<h3 class=titulo jugadaNumero>Valor de la jugada " . ($numeroJugadas - $numeroJugada) . "  </h3>\n";
        $htmlJugadas .= "<span class='jugadaColores'>";
        foreach ($jugada['jugada'] as $color)
            $htmlJugadas .= "<span class='Color  $color'>$color[0]</span>\n";
        $htmlJugadas .= "</span>\n\n";
        $htmlJugadas .= "</div>\n\n";
    }
    return $htmlJugadas;
}

/**
 * @param $jugadas
 * @return array
 */
function obtener_jugada_actual($jugadas): string
{
    $numeroJugadaActual = sizeof($jugadas);

    $coloresActual = $jugadas[$numeroJugadaActual - 1]['resultado']['colores'];
    $posicionesActual = $jugadas[$numeroJugadaActual - 1]['resultado']['posiciones'];

    //Anotaciones de la jugada actual
    $htmlJugadas = "<h3>Jugada actual $numeroJugadaActual </h3>";

    $htmlJugadas .= "<h3>Resultado : $coloresActual Colores y $posicionesActual posiciones </h3>";
    return  $htmlJugadas;
}

?>