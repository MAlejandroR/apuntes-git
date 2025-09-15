<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
</head>
<body>

<div class="solucion">
    <h1>Probando instrucciones de php </h1>
    <hr />
    <ol>
        <div class=  msj>
            <li>
                <?php
                $nombre="\"Manuel\"";
                $apellido="\"Romero\"";
                echo "Mi nombre es ", $nombre, " y mi apellido es ", $apellido;
                ?>
                <br />
            </li>
        </div>

        <div class=  msj>
            <li>
                <?php
                $nombre="\"Manuel\"";
                $apellido="\"Romero\"";
                print ("Mi nombre es $nombre y mi apellido es $apellido");
                ?>
                <br />
            </li>
        </div>

        <div class=  msj>
            <li>
                <?php
                echo "echo imprime tanto una cadena como varios argumentos, en cambio, 
                print solo acepta un único argumento o cadena";
                ?>
            </li>
        </div>

        <div class=  msj>
            <li>
                <?php
                print ("print devuelve un boolean si la sentencia a tenido éxito o no");
                ?>
            </li>
        </div>

        <div class=  msj>
            <li>
                <?php
                echo "Ambos son iguales en cuanto a uso y funcionalidad ya que 
                ambos permiten imprimir cadenas o argumentos";
                ?>
            </li>
        </div>

        <div class=  msj>
            <li>
                <?php
                echo "Tanto echo como print pueden usarse con y 
                sin paréntesis porque no son funciones";
                ?>
            </li>
        </div>

        <div class=  msj>
            <li>
                <?php
                $informe = <<<END
Este es un informe que tiene cinco líneas
esta es la primera
a continuación va la segunda
la tercera ya en el medio
la cuarta que es la penúltima
y la última la quinta
END;
                echo "<pre>$informe</pre>";
                ?>
            </li>
        </div>

        <div class=  msj>
            <li> <span class=variable>
                    <?php
                    $v=14;

                    echo "\$v=$v</span>, Valor de la variable \$v 
                            <span class=variable>-$v-</span>             
            </li>
        </div>

        <div class=  msj>
            <li> Tipo de la variable es <span class=variable>" .gettype($v)."</span> 
                        ";
                    ?>
            </li>
        </div>

        <div class=  msj>
            <li> <span class=variable>
                    <?php
                    $v=true;

                    if ($v){
                        echo "\$v=true</span>, Valor de la variable <span class=variable>-$v-</span>";
                    }else{
                        echo "\$v=false</span>, Valor de la variable <span class=variable>-$v-</span>";
                    }
                    echo "
            </li>
        </div>
                      
        <div class=  msj>
            <li> Tipo de la variable es <span class=variable>".gettype($v)."</span>     
                        ";
                    ?>
            </li>
        </div>

        <div class=  msj>
            <li> <span class=variable>
                    <?php
                    $v=3.45;

                    echo "\$v=$v</span>, Valor de la variable <span class=variable>-$v-</span>
            </li>
        </div>
              
        <div class=  msj>
            <li> Tipo de la variable es <span class=variable>".gettype($v)."</span>
                        ";
                    ?>
            </li>
        </div>

        <div class=  msj>
            <li> <span class=variable>
                    <?php
                    $v="Hola buenas";

                    echo "\$v=\"$v\"</span>, Valor de la variable <span class=variable>-$v-</span>
            </li>
        </div>

        <div class=  msj>
            <li> Tipo de la variable es <span class=variable>".gettype($v)."</span> 
                        ";
                    ?>
            </li>
        </div>

        <div class=  msj>
            <li> <span class=variable>
                    <?php
                    $v=null;

                    if (is_null($v)){//true
                        echo "\$v=null";
                    }

                    echo "</span>, Valor de la variable <span class=variable>-$v-</span>
            </li>
        </div>

        <div class=  msj>
            <li> Tipo de la variable es <span class=variable>".gettype($v)."</span>
                        ";
                    ?>
            </li>
        </div>

        <div class=  msj>
            <li>
                <?php

                if(isset($a)){//true, has sido creada previamente
                    echo "\$a variable fue creada previamente, Valor";
                }else{//false, no ha sido creada previamente
                    echo "\$a variable no creada previamente, Valor";
                }

                echo "<span class=variable>-$a-</span>
                
            </li>
        </div>
          
        <div class=  msj>
            <li> Tipo de la variable no creada es <span class=variable>".gettype($a)."</span>
                        ";
                ?>
            </li>
        </div>
        
        <div class=  msj>
            <li> Código ascii del valor 64 al 122<br/>
                <?php
                for ($i=64;$i<=122;$i++){
                    printf("%d=%c ",$i,$i);
                }
                ?>
            </li>
        </div>

        <div class=  msj>
            <li> Tiempo time() <span class=span>
                    <?php
                    $fecha=time();
                    echo "$fecha, son los segundos transcurridos 
                    desde hoy hasta el 1/1/1970";
                    ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Fecha actual <span class=span>
                    <?php
                    $fecha=date("d-m-y");
                    echo $fecha;
                    ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Días desde el 1/1/1970 <span class=variable>
                    <?php
                    $fecha=date("Y/m/d");//1970/01/01
                    $dias=strtotime($fecha);
                    $conversion=floor($dias/(3600*24));
                    echo $conversion;
                    ?>
                </span> días
            </li>
        </div>

        <div class=  msj>
            <li> horas desde el 1/1/1970 <span class=variable>
                    <?php
                    $fecha=date("Y/m/d");//1970/01/01
                    $horas=strtotime($fecha);
                    $conversion=floor($horas/3600);
                    echo $conversion;
                    ?>
                </span> horas
            </li>
        </div>

        <div class=  msj>
            <li> minutos desde el 1/1/1970 <span class=variable>
                    <?php
                    $fecha=date("Y/m/d");//1970/01/01
                    $mins=strtotime($fecha);
                    $conversion=floor($mins/60);
                    echo $conversion;
                    ?>
                </span> minutos
            </li>
        </div>

        <div class=  msj>
            <li> Fecha con formato personalizado <span  class=variable>
                    <?php
                    //fecha en español
                    setlocale(LC_ALL, "es_ES.UTF-8");
                    $dia_cadena=strftime("%A");
                    $dia_num=strftime("%d");
                    $mes_cadena=strftime("%B");
                    $anyo_num=strftime("%Y");
                    echo "$dia_cadena, $dia_num $mes_cadena $anyo_num";
                    ?>
                </span>
            </li>
        </div>


        <div class=  msj>
            <li> Fecha con formato personalizado <span  class=variable>
                <?php
                //fecha en inglés
                setlocale(LC_ALL, "en_US.UTF-8");
                $dia_cadena=strftime("%A");
                $dia_num=strftime("%d");
                $mes_cadena=strftime("%B");
                $anyo_num=strftime("%Y");
                echo "$dia_cadena, $dia_num $mes_cadena $anyo_num";
                ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Fecha con formato personalizado <span  class=variable>
                <?php
                //fecha en francés
                setlocale(LC_ALL, "fr_FR.UTF-8");
                $dia_cadena=strftime("%A");
                $dia_num=strftime("%d");
                $mes_cadena=strftime("%B");
                $anyo_num=strftime("%Y");
                echo "$dia_cadena, $dia_num  $mes_cadena  $anyo_num";
                ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Con date_diff(),
                <?php
                $cumple=date_create('1969-12-27');
                $hoy=date_create(date("Y-m-d"));
                $intervalo=date_diff($cumple, $hoy);

                foreach ($intervalo as $valor){
                    $array_tiempo[]=$valor;
                }
                echo "Tienes $array_tiempo[0] años, $array_tiempo[1] meses y 
                     $array_tiempo[2] días";
                ?>
            </li>
        </div>

        <div class=  msj>
            <li>Con strtotime(),
                <?php
                $dia_cumple="31";
                $mes_cumple="05";
                $anyo_cumple="1999";
                $dia_hoy=date("d");
                $mes_hoy=date("m");
                $anyo_hoy=date("Y");

                $cumple=strtotime("$mes_cumple/$dia_cumple/$anyo_cumple");
                $hoy=strtotime("$mes_hoy/$dia_hoy/$anyo_hoy");

                $resta=$hoy-$cumple;

                $anyos=floor($resta/(3600*24*365));

                echo "Fecha de nacimiento $dia_cumple/$mes_cumple/$anyo_cumple, Fecha actual $dia_hoy/$mes_hoy/$anyo_hoy ";
                echo "tienes $anyos años";
                ?>
            </li>
        </div>

        <div class=  msj>
            <li>Con date_diff(),
                <?php
                $dia=31;
                $mes=05;
                $anyo=1999;
                $hoy_cadena=(date("d-m-Y"));
                $cumple=date_create('$anyo-$mes-$dia');
                $hoy=date_create(date("d-m-Y"));

                $intervalo=date_diff($cumple, $hoy);

                foreach ($intervalo as $valor){
                    $array_tiempo[]=$valor;
                }

                $meses=($array_tiempo[0]*12)+$array_tiempo[1];//años convertidos a meses + los meses naturales

                echo "Fecha de nacimiento $dia-$mes-$anyo, Fecha actual $hoy_cadena, ";

                echo "tienes $meses meses";
                ?>
            </li>
        </div>

        <div class=  msj>
            <li>Con strtotime(),
                <?php
                $dia_cumple="31";
                $mes_cumple="05";
                $anyo_cumple="1999";
                $dia_hoy=date("d");
                $mes_hoy=date("m");
                $anyo_hoy=date("Y");
                $cumple=strtotime("$mes_cumple/$dia_cumple/$anyo_cumple");
                $hoy=strtotime("$mes_hoy/$dia_hoy/$anyo_hoy");

                $resta=$hoy-$cumple;

                $meses=floor($resta/(3600*24*30.5));

                echo "Fecha de nacimiento $dia_cumple/$mes_cumple/$anyo_cumple, Fecha actual $dia_hoy/$mes_hoy/$anyo_hoy ";
                echo "tienes $meses meses";
                ?>
            </li>
        </div>

        <div class=  msj>
            <li>Con strtotime(),
                <?php
                $dia_cumple="31";
                $mes_cumple="05";
                $anyo_cumple="1999";
                $dia_hoy=date("d");
                $mes_hoy=date("m");
                $anyo_hoy=date("Y");

                $cumple=strtotime("$mes_cumple/$dia_cumple/$anyo_cumple");
                $hoy=strtotime("$mes_hoy/$dia_hoy/$anyo_hoy");

                $resta=$hoy-$cumple;

                $dias=floor($resta/(3600*24));

                echo "Fecha de nacimiento $dia_cumple-$mes_cumple-$anyo_cumple, Fecha actual $dia_hoy-$mes_hoy-$anyo_hoy, ";
                echo "tienes $dias días";
                ?>
            </li>
        </div>

        <div class=  msj>
            <li>
                <?php
                $fecha=getdate();
                print_r ($fecha);
                ?>
            </li>
        </div>

        <div class=  msj>
            <li> La anterior salida es un print_r de lo que retorna getdate(),
                cuyo significado es un array con una fecha completa ([seconds]=segundos, [minutes]=minutos, [hours]=horas, [mday]=dia del mes, [wday]=nº dia en la semana,
                [mon]=nº del mes, [year]=años con 4 dígitos, [yday]=nº dia en el año, [weekday]= dia de la semana textual,
                [month]=mes textual, [0]=segundos desde 1/1/1970 época Unix)
            </li>
        </div>

        <div class=  msj>
            <li>
                <?php
                $fecha=getdate(1);
                print_r ($fecha);
                ?>
            </li>
        </div>

        <div class=  msj>
            <li> La anterior salida es un print_r de lo que retorna
                getdate(1), cuyo significado es un array de una fecha a la que le estoy añadiendo
                un tiempo en segundos, en este caso 1 segundo, desde la fecha de época Unix 1/1/1970
            </li></div>

        <div class=  msj>
            <li> strtotime("now") = <span class=variable>
                    <?php
                    $fecha=strtotime("now");

                    echo $fecha;
                    ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de strtotime("now"), convierte la cadena "now" a fecha devolviendo
                los segundos transcurridos entre el instante now (fecha
                y tiempo actual) y la fecha Unix
            </li>
        </div>

        <div class=  msj>
            <li> date("d-m-Y", strtotime("now"))<span class=variable>
                <?php
                $fecha=date("d-m-Y", strtotime("now"));

                echo $fecha;
                ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de date("d-m-Y", strtotime("now")),
                strtotime() convierte la cadena "now" a fecha devolviendo los segundos transcurridos entre
                la fecha Unix y el instante now (fecha y tiempo actual),
                date() transforma esta marca de tiempo a un formato especificado (d: día con 2 dígitos,
                m: mes con 2 dígitos y Y: año con 4 dígitos)
            </li>
        </div>

        <div class=  msj>
            <li> strtotime("27 September 1970")<span class=variable>
                    <?php
                    $fecha=strtotime("27 September 1970");

                    echo $fecha;
                    ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de strtotime("27 September 1970"),
                convierte la cadena "27 September 1970" a una fecha devolviendo los segundos transcurridos entre la fecha Unix y
                la fecha que pasamos como parámetro (String) a la función strtotime()
            </li>
        </div>

        <div class=  msj>
            <li> date("d-m-Y",strtotime("10 September 2000"))<span class=variable>
                   <?php
                   $fecha=date("d-m-Y",strtotime("10 September 2000"));

                    echo $fecha;
                   ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de date("d-m-Y",strtotime("10 September 2000")) ,
                strtotime() convierte la cadena "10 September 2000" a fecha devolviendo los segundos transcurridos entre
                la fecha Unix y el instante now (fecha y tiempo actual),
                date() transforma esta marca de tiempo a un formato especificado (d: día con 2 dígitos,
                m: mes con 2 dígitos y Y: año con 4 dígitos)
            </li>
        </div>

        <div class=  msj>
            <li> strtotime("+1 day")<span class=variable>
                <?php
                $fecha=strtotime("+1 day");

                echo $fecha;
                ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de strtotime("+1 day"), suma un día a la fecha actual
                y convierte esta fecha a segundos tanscurridos desde la fecha Unix.
            </li>
        </div>

        <div class=  msj>
            <li> date("d-m-Y",strtotime("+1 day"))<span class=variable>
                  <?php
                  $fecha=date("d-m-Y",strtotime("+1 day"));

                  echo $fecha;
                  ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de date("d-m-Y",strtotime("+1 day")),
                strtotime suma un día a la fecha actual
                y convierte esta fecha a segundos transcurridos desde la fecha Unix,
                date pasa esta marca de tiempo a una fecha con formato especificado,
                devuelve la fecha actual con un día añadido
            </li>
        </div>

        <div class=  msj>
            <li> strtotime("+1 week") <span class=variable>
                <?php
                $fecha=strtotime("+1 week");

                echo $fecha;
                ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de strtotime("+1 week"), suma una semana a la fecha actual
                y convierte esta fecha a segundos tanscurridos desde la fecha Unix
            </li>
        </div>

        <div class=  msj>
            <li> date("d-m-Y",strtotime("+1 week"))<span class=variable>
                    <?php
                    $fecha=date("d-m-Y",strtotime("+1 week"));

                    echo $fecha;
                    ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de date("d-m-Y",strtotime("+1 week")),
                strtotime suma una semana a la fecha actual
                y convierte esta fecha a segundos transcurridos desde la fecha Unix,
                date pasa esta marca de tiempo a una fecha con formato especificado,
                devuelve la fecha actual con una semana añadida
            </li>
        </div>

        <div class=  msj>
            <li> strtotime("+1 week 2 days 4 hours 2 seconds") <span class=variable>
                   <?php
                   $fecha=strtotime("+1 week 2 days 4 hours 2 seconds");

                   echo $fecha;
                   ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de strtotime("+1 week 2 days 4 hours 2 seconds"), suma 1 semana
                2 días 4 horas y 2 segundos a la fecha actual y convierte esta fecha a segundos tanscurridos desde la fecha Unix
            </li>
        </div>

        <div class=  msj>
            <li> date("d-m-Y",strtotime("+1 week 2 days 4 hours 2 seconds"))<span class=variable>
                  <?php
                  $fecha=date("d-m-Y",strtotime("+1 week 2 days 4 hours 2 seconds"));

                  echo $fecha;
                  ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de date("d-m-Y",strtotime("+1 week 2 days 4 hours 2 seconds")),
                strtotime suma 1 semana 2 días 4 horas y 2 segundos a la fecha actual
                y convierte esta fecha a segundos transcurridos desde la fecha Unix,
                date pasa esta marca de tiempo a una fecha con formato especificado,
                devuelve la fecha actual con 1 semana 2 días 4 horas y 2 segundos añadida
            </li>
        </div>

        <div class=  msj>
            <li> strtotime("next Thursday")<span class=variable>
                  <?php
                  $fecha=strtotime("next Thursday");

                  echo $fecha;
                  ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de  strtotime("next Thursday"),
                a partir de la fecha actual, coge la fecha del siguiente Jueves
                y convierte esta fecha a segundos tanscurridos desde la fecha Unix
            </li>
        </div>

        <div class=  msj>
            <li> date("d-m-Y",strtotime("next Thursday"))<span class=variable>
                   <?php
                   $fecha=date("d-m-Y",strtotime("next Thursday"));

                   echo $fecha;
                   ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de date("d-m-Y",strtotime("next Thursday")),
                strtotime coge la fecha del próximo Jueves a partir de la fecha actual
                y convierte esta fecha a segundos transcurridos desde la fecha Unix,
                date pasa esta marca de tiempo a una fecha con formato especificado,
                devuelve la fecha del próximo Jueves partiendo de la fecha actual
            </li>
        </div>

        <div class=  msj>
            <li> strtotime("last Monday")<span class=variable>
                    <?php
                    $fecha=strtotime("last Monday");

                    echo $fecha;
                    ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de strtotime("last Monday"), coge la fecha del anterior
                Lunes a partir de la fecha actual y convierte esta fecha a segundos transcurridos desde la fecha Unix
            </li>
        </div>

        <div class=  msj>
            <li> date("d-m-Y",strtotime("last Monday"))<span class=variable>
                    <?php
                    $fecha=date("d-m-Y",strtotime("last Monday"));

                    echo $fecha;
                    ?>
                </span>
            </li>
        </div>

        <div class=  msj>
            <li> Significado de date("d-m-Y",strtotime("last Monday")),
                strtotime coge la fecha del anterior Lunes a partir de la fecha actual
                y convierte esta fecha a segundos transcurridos desde la fecha Unix,
                date pasa esta marca de tiempo a una fecha con formato especificado,
                devuelve la fecha del último Lunes a partir de la fecha actual
            </li>
        </div>
    </ol>
</div>
</body>
</html>