<?php

include_once realpath('../facade/FacturaFacade.php');

/*
		
"{
  factura_id : """"
}"

*/

$factura_id = $_GET['factura_id'];
 

$facturas = FacturaFacade::consultarProductoNoDevueltosByFactura($factura_id);

header("Content-type: application/json; charset=utf-8");

echo  json_encode($facturas);