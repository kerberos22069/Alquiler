<?php

//Hecho a mano por el Benévolo señor Arciniegas
//Cualquier cosa para perder tiempo XD
 
include_once realpath('../facade/FacturaFacade.php');

include_once realpath('../controller/reportes.php');

$fecha_ini = strip_tags($_POST['fecha_ini']);
$fecha_fin = strip_tags($_POST['fecha_fin']);
$facturas =FacturaFacade::listRange($fecha_ini, $fecha_fin);

echo armarReporteDeFacturas($facturas);