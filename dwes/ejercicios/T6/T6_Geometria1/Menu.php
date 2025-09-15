<?php
class Menu {
    private $enlaces=[];

    public function cargarOpcion($enlace,$titulo)
    {
        $this->enlaces[$titulo]=$enlace;
    }
    public function get_horizontal()
    {
        $menu="";
        foreach($this->enlaces as $titulo=>$url)
        {
            $menu.= "<a class=menu href='$url'>$titulo</a>";

        }
        return $menu;
    }
    public function get_vertical()
    {
        $menu="";
        foreach($this->enlaces as $titulo=>$url)
        {
            $menu.= "<a class=menu  href='$url'>$titulo</a>";
            $menu.="<br />";
        }
      return $menu;
    }

}


