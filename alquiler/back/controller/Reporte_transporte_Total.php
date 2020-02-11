<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//    In Anarchy we trust  \\
include_once realpath('../facade/TransporteFacade.php');
//


$empresa = $_GET['empresa'];


//$arr = explode('-', $empresa, 4);

//
//$fechaI ='2020-01-01';
//$fechaF = '2020-02-01';
////
////$fechaI =$arr[1];
////$fechaF = $arr[2];
////$id = '1';
////
////$id = $arr[0];
//$id = '1';
//$fechaI = $_GET['fecha_ini_tra'];
//$fechaF = $_GET['fecha_fin_tra'];

$empresa = $_GET['empresa'];

//var_dump($empresa);

$arr = explode(' ',$empresa,4);


//$fechaI ='2020-01-01';
//$fechaF = '2020-02-01';
//$id = '1';
//
$id = $arr[1];
$fechaI =$arr[2];
$fechaF =$arr[3];




$list=TransporteFacade::reporte_transporte_Total($fechaI, $fechaF, $id);
        $rta="";
        foreach ($list as $obj => $Transporte) {	
	       $rta.="{
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
             $msg="{\"msg\":\"error\"}";
	       $rta="{\"result\":\"error\"}";		
        }
        echo "[{$msg},{$rta}]";
   