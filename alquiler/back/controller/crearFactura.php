<?php

//Este no fue hecho por Anarchy, pero las frases manuales también son chidas

require_once realpath('../facade/GlobalController.php');
$generalDao = GlobalController::getGeneralDaoInstance();
$generalDao->comenzarTransaccion();
try{

    include_once realpath('../facade/FacturaFacade.php');
    //$factura_id = obtenerUltimoConsecutivo();
    $factura_id = strip_tags($_POST['factura_id']);
    $fecha = strip_tags($_POST['fecha_inicio']);
    $fac_descueto = strip_tags($_POST['descuento']);
    $Cliente_idcliente = strip_tags($_POST['cliente_id']);
        $cliente= new Cliente();
        $cliente->setIdcliente($Cliente_idcliente);
    FacturaFacade::insert($factura_id, $fecha, $fac_descueto, $cliente);

    include_once realpath('../facade/TransporteFacade.php');
    $transporte_flete = strip_tags($_POST['transporte_flete']);
    if($transporte_flete != NULL && $transporte_flete != "" && $transporte_flete != 0){
        $factura= new Factura();
                $factura->setIdfactura($factura_id);
        $transporte_conductor = strip_tags($_POST['conductor_nombre']);
        TransporteFacade::insert($transporte_flete, $factura, $transporte_conductor);
    }

    $alquileres = strip_tags($_POST['alquileres']);
    $alquileres = json_decode($alquileres);

    foreach ($alquileres as $obj => $alquiler) {
        $cantidad = $alquiler->cantidad;
        $valor = $alquiler->valor;
        $Producto_idprod = $alquiler->producto_id;
                $producto= new Producto();
                $producto->setIdprod($Producto_idprod);
        AlquilerFacade::insert($fecha, $cantidad, $valor, $producto, $factura);
    }
    
    $generalDao->confirmarTransaccion();
    echo "{factura_id : ".$factura_id."}";
}catch(Exception $e){
    $generalDao->rollback();
    echo "{factura_id : -1}\n";
    echo $e->getMessage();
}