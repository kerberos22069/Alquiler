<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mátalos a todos, y que dios elija  \\
include_once realpath('../facade/FacturaFacade.php');


class FacturaController {

    public static function insert(){
        $idfactura = strip_tags($_POST['idfactura']);
        $fecha = strip_tags($_POST['fecha']);
        $fac_descueto = strip_tags($_POST['fac_descueto']);
        $Cliente_idcliente = strip_tags($_POST['cliente_idcliente']);
        $cliente= new Cliente();
        $cliente->setIdcliente($Cliente_idcliente);
        //Si en un futuro muy lejano, estas tres variables representan un problema, recuerde que es porque se crearon despues de definir el modelo y muy seguramente fueron un accidente al igual que usted. Para solucionarlo puede suicidarse o llamar el post por el name
        $obra = "NO APLICA"; 
        $direccion_obra = "NO APLICA"; 
        $observacion = "NO APLICA";
        FacturaFacade::insert($idfactura, $fecha, $fac_descueto, $cliente, $obra, $direccion_obra, $observacion);
return true;
    }

    public static function listAll(){
        $list=FacturaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Factura) {	
	       $rta.="{
	    \"idfactura\":\"{$Factura->getidfactura()}\",
	    \"fecha\":\"{$Factura->getfecha()}\",
	    \"fac_descueto\":\"{$Factura->getfac_descueto()}\",
	    \"cliente_idcliente_idcliente\":\"{$Factura->getcliente_idcliente()->getidcliente()}\"
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