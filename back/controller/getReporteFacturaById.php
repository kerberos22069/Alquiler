<?php

/* 
 * Hecho a mano por el benévolo señor Arciniegas
 * Porque si no lo hago yo, no lo hace nadie
 */
include_once realpath('../facade/FacturaFacade.php');
include_once realpath('../controller/reportes.php');

$factura_id = strip_tags($_POST['factura_id']);
//formalidad para reusar el reporte general 
$facturas = array();
$factura = FacturaFacade::select($factura_id);
array_push($facturas, $factura);

echo armarReporteDeFacturas($facturas);