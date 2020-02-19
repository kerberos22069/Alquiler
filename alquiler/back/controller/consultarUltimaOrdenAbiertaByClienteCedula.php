<?php
include_once realpath('../facade/ClienteFacade.php');
include_once realpath('../facade/FacturaFacade.php');
	$cliente_cedula = strip_tags($_POST['cliente_cedula']);
	$cliente = ClienteFacade::list_x_CC($cliente_cedula);
    $facturas = FacturaFacade::listAbiertasByCliente($cliente->getIdcliente());
    $lastId = array("lastId" => -1);
    if (count($facturas) > 0) {
        $factura = $facturas[0];
        $lastId["lastId"] = $factura->getIdfactura();
    } 
	$rta = json_encode($lastId);
	$msg="{\"msg\":\"exito\"}";    
    return "[{$msg},{$rta}]";
    }