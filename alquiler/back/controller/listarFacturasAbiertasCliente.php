<?php

//Hecho a mano por el benévolo señor Arciniegas
//Vivir es absurdo, pero suicidarse lo es aún más

$rta= array();

include_once realpath('../facade/FacturaFacade.php');

$Cliente_idcliente = strip_tags($_POST['cliente_id']);
$facturas =FacturaFacade::listAbiertasByCliente($Cliente_idcliente);

echo armarReporteDeFacturas($facturas);