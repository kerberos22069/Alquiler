<?php

/* 
 * Controlador encargado de retornar todas las facturas, sin execpcion, a un cliente dado su id
 */

include_once realpath('../facade/FacturaFacade.php');

$my_json_input = json_decode(file_get_contents('php://input'), true);

$facturas = FacturaFacade::listByCliente($my_json_input['cliente_id']);

$rta = array();

foreach ($facturas as $factura) {
	array_push($rta, $factura->get_data_formated());
}

header("Content-type: application/json; charset=utf-8");

echo  json_encode($rta);