<?php
ini_set("display_errors", true);
error_reporting(E_ALL);


require_once "funciones.php";
//Inicilizo variables
$name = $_POST['name'];
$pass = $_POST['pass'];
$admin = false;

//Verifico condiciones
if (empty($name)) {
    header("Location:index.php_?msj='Debe registrarse y especificar nombre'");
    exit();
}

if (empty($pass)) {
    header("index.php_?msj='Debe registrarse y especificar password'");
    exit();
}

if (($pass === 'admin') and ($name === 'admin'))
    $admin = true;

//Evalúo la acción que trajo a este script
switch ($_POST['enviar']) {
    case 'Subir fichero y acceder':
        $file = $_FILES['fichero'];
        upload_file($file);
        $ficheros = show_files($admin);
        break;
    case 'Subir fichero':
        $file = $_FILES['fichero'];
        $msj = "El fichero " . $file['name'] . "<br />";
        if (upload_file($file))
            $msj .= "se ha subido correctamente";
        else
            $msj .= "no se ha podido subir. <br />Error: " . $file['error'];
        header("Location:index.php_?msj=$msj");
        break;
    case 'Acceder':
        $ficheros = show_files($admin);
        break;
    case 'publicar':
        $ficheros_subir = $_POST['ficheros_publicar'];
        //var_dump($ficheros_subir);
        publicar_ficheros($ficheros_subir);
        $ficheros = show_files($admin);
        break;
    default:
        header("Location:index.php_?msj='Debe registrarse para subir ficheros'");
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
    <!--    <script src='https://unpkg.com/vue'></script>-->
    <script src="https://unpkg.com/vue@3"></script>
    <!--    <script src='https://github.com/vuejs/vue-devtools'></script>-->
    <title>Descarga de ficheros</title>

</head>
<body>
<h1>WEB DE DESCARGAS DE FICHEROS</h1>
<div id="app">
    <form action="index.php" method="POST">
        <input style="float:right; margin-right:30%" type="submit" value="Volver" name="enviar">
        <input type="hidden" value="<?php echo $name ?>" name="name">
        <input type="hidden" value="<?php echo $pass ?>" name="pass">

    </form>
    <?php echo $ficheros ?>
</div>
<script type="text/javascript">

    Vue.createApp({
        data() {
            return {
                check: '',
                boton_check_musica: "Seleccionar todos",
                boton_check_imagenes: "Seleccionar todos",
                boton_check_otros: "Seleccionar todos",
                boton_check_pdf: "Seleccionar todos",
                deshabilitado: '',
                musica: [],
                pdf: [],
                otros: [],
                imagenes: [],
                check_musica: false,
                check_pdf: false,
                check_otros: false,
                check_imagenes: false
            }
        },
        methods:
            {
                select_all_musica: function (event) {
                    alert("hola");
                    this.check_musica = !this.check_musica;
                    if (this.check_musica == true)
                        this.musica = [<?php echo $lista_musica ?>];
                    else
                        this.musica = [];
                    this.boton_check_musica = this.check_musica ? "Desmarcar todos" : "Seleccionar todos";
                    this.verifica();
                    event.preventDefault();
                }
                ,
                select_all_pdf: function (event) {
                    this.check_pdf = !this.check_pdf;
                    if (this.check_pdf == true)
                        this.pdf = [<?php echo $lista_pdf ?>];
                    else
                        this.pdf = [];
                    this.boton_check_pdf = this.check_pdf ? "Desmarcar todos" : "Seleccionar todos";
                    this.verifica();
                    event.preventDefault();
                }
                ,
                select_all_imagenes: function (event) {
                    this.check_imagenes = !this.check_imagenes;
                    if (this.check_imagenes == true)
                        this.imagenes = [<?php echo $lista_imagenes ?>];
                    else
                        this.imagenes = [];
                    this.boton_check_imagenes = this.check_imagenes ? "Desmarcar todos" : "Seleccionar todos";
                    this.verifica();
                    event.preventDefault();
                }
                ,
                select_all_otros: function (event) {
                    this.check_otros = !this.check_otros;
                    if (this.check_otros == true) {
                        this.otros = [<?php echo $lista_otros ?>];
                    } else {
                        this.otros = [];
                    }

                    this.boton_check_otros = this.check_otros ? "Desmarcar todos" : "Seleccionar todos";
                    this.verifica();
                    event.preventDefault();
                }
                ,
                //Para enabled/disabled el botón submit de cada grupo  de ficheros a publicar
                actualizar: function (event) {
                    // console.log(event);

                    var check = event.target.checked
                    console.log("valor de check -" + check);
                    if (check === true)
                        this.deshabilitado = false;
                    else {
                        this.verifica("un_click");
                    }
                }
                ,
                verifica: function (accion) {
                    //para ver los que tengo seleccionados
                    total = this.musica.length + this.imagenes.length + this.pdf.length + this.otros.length
                    //Esto es por si tengo uno y lo he desseccionado
                    if ((total == 1) && (accion == "un_click"))
                        this.deshabilitado = true;
                    else {
                        if (total == 0) //Si tengo cero ya que quité todos
                            this.deshabilitado = true;
                        else
                            this.deshabilitado = false;
                    }
                }
            }
    }).mount("#app");
</script>
</body>

</html>
