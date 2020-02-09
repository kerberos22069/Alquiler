<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    In Anarchy we trust  \\
include_once realpath('../facade/TransporteFacade.php');


class TransporteController {

    public static function insert(){
        $idtransporte = strip_tags($_POST['idtransporte']);
        $transporte_flete = strip_tags($_POST['transporte_flete']);
        $Factura_idfactura = strip_tags($_POST['factura_idfactura']);
        $factura= new Factura();
        $factura->setIdfactura($Factura_idfactura);
        $transporte_conductor = strip_tags($_POST['transporte_conductor']);
        TransporteFacade::insert($idtransporte, $transporte_flete, $factura, $transporte_conductor);
return true;
    }

    public static function listAll(){
        $list=TransporteFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Transporte) {	
	       $rta.="{
	    \"idtransporte\":\"{$Transporte->getidtransporte()}\",
	    \"transporte_flete\":\"{$Transporte->gettransporte_flete()}\",
	    \"factura_idfactura_idfactura\":\"{$Transporte->getfactura_idfactura()->getidfactura()}\",
	    \"transporte_conductor\":\"{$Transporte->gettransporte_conductor()}\"
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