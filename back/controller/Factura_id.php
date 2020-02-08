<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once realpath('../facade/FacturaFacade.php');

      $list=FacturaFacade::Count_fact();
        $rta="";
        foreach ($list as $obj => $Factura) {	
	       $rta.="{
	    \"idfactura\":\"{$Factura->getidfactura()}\"
	   
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