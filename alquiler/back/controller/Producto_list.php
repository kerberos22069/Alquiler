<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once realpath('../facade/ProductoFacade.php');

     $list=ProductoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Producto) {	
	       $rta.="{
	    \"idprod\":\"{$Producto->getidprod()}\",
	    \"prod_nombre\":\"{$Producto->getprod_nombre()}\",
	    \"prod_descripcion\":\"{$Producto->getprod_descripcion()}\",
	    \"prod_precio\":\"{$Producto->getprod_precio()}\",
	    \"prod_stock\":\"{$Producto->getprod_stock()}\",
	    \"prod_disponible\":\"{$Producto->getprod_disponible()}\"
	   
	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        echo "[{$msg},{$rta}]";
        
//         \"prod_reparacion\":\"{$Producto->getprod_reparacion()}\",
//	    \"prod_danado\":\"{$Producto->getprod_danado()}\"