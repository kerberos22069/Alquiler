<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//    In Anarchy we trust  \\
include_once realpath('../facade/TransporteFacade.php');
//
$fechaI ='2020-01-01';
$fechaF = '2020-02-01';
//$id = '1';
//
$id = $_GET['Id_chofer'];
//$fechaI = $_GET['fecha_ini_tra'];
//$fechaF = $_GET['fecha_fin_tra'];




$list=TransporteFacade::reporte_transporte($fechaI, $fechaF, $id);
        $rta="";
        foreach ($list as $obj => $Transporte) {	
	       $rta.="{
	    \"idtransporte\":\"{$Transporte->getidtransporte()}\",
            \"factura_fecha\":\"{$Transporte->getfactura_idfactura()->getFecha()}\",    
	      \"factura_idfactura_idfactura\":\"{$Transporte->getfactura_idfactura()->getidfactura()}\",
	      \"factura_cliente\":\"{$Transporte->getfactura_idfactura()->getAbonos()}\",
                 \"transporte_flete\":\"{$Transporte->gettransporte_flete()}\"
	    
	       },";
        }

//        $transporte->setIdtransporte($data[$i]['idtransporte']);
//          $transporte->setTransporte_flete($data[$i]['valor']);
//           $factura = new Factura();
//           $factura->setIdfactura($data[$i]['factura_idfactura']);
//           $factura->setFecha($data[$i]['fecha']);
//           $factura->setAbonos($data[$i]['cliente_nombre']);
//           $transporte->setFactura_idfactura($factura);
//        
        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        echo "[{$msg},{$rta}]";
   