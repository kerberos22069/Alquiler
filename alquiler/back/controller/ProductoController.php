<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Oh! (°o° ) ¡es Fredy Arciniegas, el intelectualoide millonario!  \\
include_once realpath('../facade/ProductoFacade.php');


class ProductoController {

    public static function insert(){
        $idprod = strip_tags($_POST['idprod']);
        $prod_nombre = strip_tags($_POST['prod_nombre']);
        $prod_descripcion = strip_tags($_POST['prod_descripcion']);
        $prod_precio = strip_tags($_POST['prod_precio']);
        $prod_stock = strip_tags($_POST['prod_stock']);
        $prod_disponible = strip_tags($_POST['prod_disponible']);
        $prod_reparacion = strip_tags($_POST['prod_reparacion']);
        $prod_daÃÂ±ado = strip_tags($_POST['prod_daÃÂ±ado']);
        ProductoFacade::insert($idprod, $prod_nombre, $prod_descripcion, $prod_precio, $prod_stock, $prod_disponible, $prod_reparacion, $prod_daÃÂ±ado);
return true;
    }

    public static function listAll(){
        $list=ProductoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Producto) {	
	       $rta.="{
	    \"idprod\":\"{$Producto->getidprod()}\",
	    \"prod_nombre\":\"{$Producto->getprod_nombre()}\",
	    \"prod_descripcion\":\"{$Producto->getprod_descripcion()}\",
	    \"prod_precio\":\"{$Producto->getprod_precio()}\",
	    \"prod_stock\":\"{$Producto->getprod_stock()}\",
	    \"prod_disponible\":\"{$Producto->getprod_disponible()}\",
	    \"prod_reparacion\":\"{$Producto->getprod_reparacion()}\",
	    \"prod_daÃÂ±ado\":\"{$Producto->getprod_daÃÂ±ado()}\"
	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        return "[{$msg},{$rta}]";
    }

}
//That`s all folks!