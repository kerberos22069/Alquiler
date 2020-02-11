<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//    In Anarchy we trust  \\
include_once realpath('../facade/TransporteFacade.php');

$empresa = $_GET['Id_datos'];

//var_dump($empresa);

$arr = explode(' ',$empresa,4);


//$fechaI ='2020-01-01';
//$fechaF = '2020-02-01';
//$id = '1';
//
$id = $arr[1];
$fechaI =$arr[2];
$fechaF =$arr[3];

//var_dump($fechaF);

//die();



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
	       $msg="{\"msg\":\"NO HAY REGISTROS\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        echo "[{$msg},{$rta}]";
   