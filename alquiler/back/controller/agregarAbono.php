<?php

//Hecho a mano por el benévolo señor Arciniegas
//¿En serio soy el único programador que hace esto?

include_once realpath('../facade/FacturaFacade.php');

$factura_id = strip_tags($_POST['factura_id']);
$cantidad = strip_tags($_POST['valor']);

$Factura = FacturaFacade::abonar($factura_id,$cantidad);


