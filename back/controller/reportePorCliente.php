<?php

//Hecho a mano por el Benévolo señor Arciniegas
//Cualquier cosa para perder tiempo XD

include_once realpath('../facade/ClienteFacade.php');
include_once realpath('../facade/FacturaFacade.php');

include_once realpath('../controller/reportes.php');

$Cliente_cedula = strip_tags($_POST['cliente_cedula']);
$Cliente = ClienteFacade::list_x_CC($Cliente_cedula)[0];
$facturas =FacturaFacade::listByCliente($Cliente->getIdcliente());

echo armarReporteDeFacturas($facturas);