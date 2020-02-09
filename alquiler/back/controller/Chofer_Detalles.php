<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once realpath('../facade/ChoferesFacade.php');

$id= $_GET['empresa'];

  $list=ChoferesFacade::listAll_Detalles($id);
 
        $rta="";
        foreach ($list as $obj => $Choferes) {	
            
	       $rta.="{
	    \"idchoferes\":\"{$Choferes->getidchoferes()}\",
	    \"cc_chofer\":\"{$Choferes->getcc_chofer()}\",
	    \"nom_chofer\":\"{$Choferes->getnom_chofer()}\",
	    \"chofe_telefono\":\"{$Choferes->getchofe_telefono()}\",
	    \"direccion\":\"{$Choferes->getdireccion()}\"
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
   