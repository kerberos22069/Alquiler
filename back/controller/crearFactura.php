<?php

//Este no fue hecho por Anarchy, pero las frases manuales también son chidas

require_once realpath('../facade/GlobalController.php');
$generalDao = GlobalController::getGeneralDaoInstance();
$generalDao->comenzarTransaccion();
try {

    $Cliente_idcliente = strip_tags($_POST['cliente_id']);

    include_once realpath('../facade/FacturaFacade.php');
    $facturas = FacturaFacade::listAbiertasByCliente($Cliente_idcliente);
    if (count($facturas) > 0) {
        $factura = $facturas[0];
        $factura_id = $factura->getIdfactura();
    } else {
        $factura_id = strip_tags($_POST['factura_id']);
        $factura = new Factura();
        $factura->setIdfactura($factura_id);
        $cliente = new Cliente();
        $cliente->setIdcliente($Cliente_idcliente);
        FacturaFacade::insert($factura_id, $fecha, $fac_descueto, $cliente);
    }

<<<<<<< HEAD

    date_default_timezone_set('America/Lima');
    $fecha = date("Y-m-d H:i:s");
    $fac_descueto = strip_tags($_POST['descuento']);

    include_once realpath('../facade/TransporteFacade.php');
    $transporte_flete = strip_tags($_POST['transporte_flete']);
    if ($transporte_flete != NULL && $transporte_flete != "" && $transporte_flete != "0") {
        $transporte_conductor = strip_tags($_POST['conductor_nombre']);
        TransporteFacade::insert($transporte_flete, $factura, $transporte_conductor);
    }


=======
    date_default_timezone_set('America/Lima');
    $fecha = date("Y-m-d H:i:s");
    
>>>>>>> 6f984a332a57320822c2fe5ba099c54e81274a8f
    include_once realpath('../facade/AlquilerFacade.php');
    include_once realpath('../facade/ProductoFacade.php');
    $alquileres = json_decode(strip_tags($_POST['alquileres']));

    foreach ($alquileres as $obj => $alquiler) {
        $cantidad = $alquiler->cantidad;
        $valor = $alquiler->valor;
        $Producto_idprod = $alquiler->id_producto;
<<<<<<< HEAD

                $producto= new Producto();
                $producto->setIdprod($Producto_idprod);
        AlquilerFacade::insert($fecha, $cantidad, $valor, $producto, $factura);
        ProductoFacade::alquilar($Producto_idprod, $cantidad);
    }
   

        $producto = new Producto();
        $producto->setIdprod($Producto_idprod);
        AlquilerFacade::insert($fecha, $cantidad, $valor, $producto, $factura);
        ProductoFacade::alquilar($Producto_idprod, $cantidad);
    }


=======
        $producto = new Producto();
        $producto->setIdprod($Producto_idprod);
        
        if (count($facturas) > 0) {
            $listByFactura = AlquilerFacade::listByFactura($factura_id);
            foreach ( $listByFactura as $objx => $alquilerExistente) {
                if($alquilerExistente->getProducto_idprod() == $Producto_idprod){
                    $alquilerExistente->setCantidad($alquiler->cantidad + $alquilerExistente->getCantidad());
                    AlquilerFacade::editarAlquiler($alquilerExistente);
                    break;
                }
            }
        }else{
            AlquilerFacade::insert($fecha, $cantidad, $valor, $producto, $factura);
        }
        ProductoFacade::alquilar($Producto_idprod, $cantidad);
    }
    
    
    $fac_descueto = strip_tags($_POST['descuento']);

    include_once realpath('../facade/TransporteFacade.php');
    $transporte_flete = strip_tags($_POST['transporte_flete']);
    if ($transporte_flete != NULL && $transporte_flete != "" && $transporte_flete != "0") {
        $transporte_conductor = strip_tags($_POST['conductor_nombre']);
        TransporteFacade::insert($transporte_flete, $factura, $transporte_conductor);
    }

>>>>>>> 6f984a332a57320822c2fe5ba099c54e81274a8f
    $generalDao->confirmarTransaccion();
    echo '{"factura_id" : ' . $factura_id . '}';
} catch (Exception $e) {
    $generalDao->rollback();
    echo '{"factura_id" : -1}';
    echo $e->getMessage();
}