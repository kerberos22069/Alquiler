<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once realpath('../facade/AlquilerFacade.php');

  $list=AlquilerFacade::listxAll();
        $rta="";
        $num=1;
        foreach ($list as $obj => $Alquiler) {	
	       $rta.="{
	    \"num\":\"$num\",
	    
	    \"fecha_inicio\":\"{$Alquiler->getfecha_inicio()}\",
             \"idalquiler\":\"{$Alquiler->getidalquiler()}\",
	
	    \"valor\":\"{$Alquiler->getvalor()}\",
	    \"pagado\":\"{$Alquiler->getpagado()}\",
	    \"fechafin\":\"{$Alquiler->getfechafin()}\"
	   
	       },";
            $num++;
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        echo "[{$msg},{$rta}]";
    