<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once realpath('../facade/ClienteFacade.php');

$id= $_GET['empresa'];

     $list=ClienteFacade::list_x_Id($id);
        $rta="";
        foreach ($list as $obj => $Cliente) {	
	       $rta.="{
	    \"idcliente\":\"{$Cliente->getidcliente()}\",
	    	    \"cliente_nombre\":\"{$Cliente->getcliente_nombre()}\",
	    \"cliente_apellido\":\"{$Cliente->getcliente_apellido()}\",
	    \"cliente_cc\":\"{$Cliente->getcliente_cc()}\",
	    \"cliente_correo\":\"{$Cliente->getcliente_correo()}\",
          \"cliente_telefono\":\"{$Cliente->getcliente_telefono()}\",
	    \"cliente_direccion\":\"{$Cliente->getcliente_direccion()}\"
	    
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
        
        