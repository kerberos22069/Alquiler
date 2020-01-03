<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya están los patrones implementados, ahora sí viene lo chido...  \\
include_once realpath('../facade/ProductoFacade.php');


class ProductoController {

    public static function insert(){
        $idprod = strip_tags($_POST['idprod']);
        $prod_nombre = strip_tags($_POST['prod_nombre']);
        $prod_descripcion = strip_tags($_POST['prod_descripcion']);
        $prod_precio = strip_tags($_POST['prod_precio']);
        $prod_stock = strip_tags($_POST['prod_stock']);
        $prod_alquilado = strip_tags($_POST['prod_alquilado']);
        $prod_reparacion = strip_tags($_POST['prod_reparacion']);
        $prod_danado = strip_tags($_POST['prod_danado']);
        $prod_stado = strip_tags($_POST['prod_stado']);
        $foto = strip_tags($_POST['foto']);
        ProductoFacade::insert($idprod, $prod_nombre, $prod_descripcion, $prod_precio, $prod_stock, $prod_alquilado, $prod_reparacion, $prod_danado, $prod_stado, $foto);
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
	    \"prod_alquilado\":\"{$Producto->getprod_alquilado()}\",
	    \"prod_reparacion\":\"{$Producto->getprod_reparacion()}\",
	    \"prod_danado\":\"{$Producto->getprod_danado()}\",
	    \"prod_stado\":\"{$Producto->getprod_stado()}\",
	    \"foto\":\"{$Producto->getfoto()}\"
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