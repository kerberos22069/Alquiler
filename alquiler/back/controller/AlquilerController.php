<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La gente siempre me pregunta si conozco a Tyler Durden.  \\
include_once realpath('../facade/AlquilerFacade.php');


class AlquilerController {

    public static function insert(){
        $idalquiler = strip_tags($_POST['idalquiler']);
        $fecha_inicio = strip_tags($_POST['fecha_inicio']);
        $Cliente_idcliente = strip_tags($_POST['cliente_idcliente']);
        $cliente= new Cliente();
        $cliente->setIdcliente($Cliente_idcliente);
        $cantidad = strip_tags($_POST['cantidad']);
        $valor = strip_tags($_POST['valor']);
        $pagado = strip_tags($_POST['pagado']);
        $fechafin = strip_tags($_POST['fechafin']);
        $Producto_idprod = strip_tags($_POST['producto_idprod']);
        $producto= new Producto();
        $producto->setIdprod($Producto_idprod);
        $Factura_idfactura = strip_tags($_POST['factura_idfactura']);
        $factura= new Factura();
        $factura->setIdfactura($Factura_idfactura);
        $alq_stado = strip_tags($_POST['alq_stado']);
        $alq_devuelto = strip_tags($_POST['alq_devuelto']);
        AlquilerFacade::insert($idalquiler, $fecha_inicio, $cliente, $cantidad, $valor, $pagado, $fechafin, $producto, $factura, $alq_stado, $alq_devuelto);
return true;
    }

    public static function listAll(){
        $list=AlquilerFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Alquiler) {	
	       $rta.="{
	    \"idalquiler\":\"{$Alquiler->getidalquiler()}\",
	    \"fecha_inicio\":\"{$Alquiler->getfecha_inicio()}\",
	    \"cliente_idcliente_idcliente\":\"{$Alquiler->getcliente_idcliente()->getidcliente()}\",
	    \"cantidad\":\"{$Alquiler->getcantidad()}\",
	    \"valor\":\"{$Alquiler->getvalor()}\",
	    \"pagado\":\"{$Alquiler->getpagado()}\",
	    \"fechafin\":\"{$Alquiler->getfechafin()}\",
	    \"producto_idprod_idprod\":\"{$Alquiler->getproducto_idprod()->getidprod()}\",
	    \"factura_idfactura_idfactura\":\"{$Alquiler->getfactura_idfactura()->getidfactura()}\",
	    \"alq_stado\":\"{$Alquiler->getalq_stado()}\",
	    \"alq_devuelto\":\"{$Alquiler->getalq_devuelto()}\"
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