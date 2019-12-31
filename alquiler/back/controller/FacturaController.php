<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora con 25% menos groserías  \\
include_once realpath('../facade/FacturaFacade.php');


class FacturaController {

    public static function insert(){
        $idfactura = strip_tags($_POST['idfactura']);
        $fecha = strip_tags($_POST['fecha']);
        $fac_descueto = strip_tags($_POST['fac_descueto']);
        FacturaFacade::insert($idfactura, $fecha, $fac_descueto);
return true;
    }

    public static function listAll(){
        $list=FacturaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Factura) {	
	       $rta.="{
	    \"idfactura\":\"{$Factura->getidfactura()}\",
	    \"fecha\":\"{$Factura->getfecha()}\",
	    \"fac_descueto\":\"{$Factura->getfac_descueto()}\"
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