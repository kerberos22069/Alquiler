<?php
include_once realpath('../facade/ClienteFacade.php');
include_once realpath('../facade/FacturaFacade.php');
	$cliente_cedula = strip_tags($_POST['cliente_cedula']);
	$cliente = ClienteFacade::list_x_CC($cliente_cedula);
	$lastId = array("factura" => -1);
	if (count($cliente) > 0) {
		$facturas = FacturaFacade::listAbiertasByCliente($cliente[0]->getIdcliente());
		if (count($facturas) > 0) {
        $factura = $facturas[0];
        $lastId["factura"] = $factura->get_data_formated();
    } 
	}
	$rta = json_encode($lastId);
	$msg="{\"msg\":\"exito\"}";    
    echo "[{$msg},{$rta}]";
  