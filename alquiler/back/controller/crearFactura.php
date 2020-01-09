<?php

//Este no fue hecho por Anarchy, pero las frases manuales también son chidas

include_once realpath('../facade/FacturaFacade.php');
$factura_id = obtenerUltimoConsecutivo();
$fecha = date("Y-m-d H:i:s");
$fac_descueto = strip_tags($_POST['descuento']);
$Cliente_idcliente = strip_tags($_POST['cliente_id ']);
    $cliente= new Cliente();
    $cliente->setIdcliente($Cliente_idcliente);
FacturaFacade::insert($factura_id, $fecha, $fac_descueto, $cliente);

include_once realpath('../facade/TransporteFacade.php');
$transporte_flete = strip_tags($_POST['transporte_flete']);
$factura= new Factura();
        $factura->setIdfactura($factura_id);
$transporte_conductor = strip_tags($_POST['conductor_nombre']);
TransporteFacade::insert($transporte_flete, $factura, $transporte_conductor);

$alquileres = strip_tags($_POST['alquileres']);
