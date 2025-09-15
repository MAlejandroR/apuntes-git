<?php


class Directorio
{
    private $contenido_dir = [];


    /**
     * Elimina el dir . y .. de la lista de directorios que tenemos
     * En el atributo $contenido_dir
     */
    private function quita_puntos()
    {

        $pos_punto = array_search(".", $this->contenido_dir);
        unset ($this->contenido_dir[$pos_punto]);
        $pos_punto_punto = array_search("..", $this->contenido_dir);
        unset ($this->contenido_dir[$pos_punto_punto]);

    }

    /**
     * Directorio constructor.
     * @param string $dir directorio del que vamos a obtener su contenido
     */
    public function __construct($dir = "idiomas")
    {
        $this->ruta = $dir;
        $this->contenido_dir = scandir($dir);
        $this->quita_puntos();

    }


    //El contendio del directorio actual
    public function get_contenido_dir(){
        return $this->contenido_dir;
    }

    /**
     * @return bool si el directorio actual está o no vacío
     */
    public function vacio(){
        if (count($this->contenido_dir)==0)
            return true;
        else
            return false;
    }


    private function actuliza_contenido(){
        $this->contenido_dir = scandir($this->ruta);
        $this->quita_puntos();

    }
    public function add_dir ($directorio){
        $created = false;
        if (mkdir("$this->ruta/$directorio", 0777)) {
            $this->actualiza_contenido();
            $created = true;
        }
        return $created;

    }


}