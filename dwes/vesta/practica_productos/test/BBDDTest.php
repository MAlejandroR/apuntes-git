<?php

use PHPUnit\Framework\TestCase;
require ('./../clases/BBDD.php');

final class BBDDTest extends TestCase
{
    public function testConstruct():void{
        $bd = new BBDD();
        $tipobd= gettype($bd);
        $this->assertSame('object', $tipobd);
    }
    public function testEjecutaSentencia():void{
        $bd = new BBDD();
        $sentencia = "select count(*) from familia";
        $rtdo = $bd->ejectua_sentencia($sentencia);
        $num_filas = sizeof($rtdo);
        $this->assertSame(15, $num_filas);
    }

}