<?php

//Hecho a mano por el Benévolo señor Arciniegas
//Cualquier cosa para perder tiempo XD

$rta= array();

include_once realpath('../facade/FacturaFacade.php');
include_once realpath('../facade/ClienteFacade.php');
include_once realpath('../facade/AlquilerFacade.php');

$fecha_ini = strip_tags($_POST['fecha_ini']);
$fecha_fin = strip_tags($_POST['fecha_fin']);
$facturas =FacturaFacade::listRange($fecha_ini, $fecha_fin);

foreach ($facturas as $obj => $Factura) {
    $myFactura->id=$Factura->getidfactura();
    $myFactura->fecha=$Factura->getfecha();
    
    $cliente = ClienteFacade::select($Factura->getcliente_idcliente()->getidcliente()); //por esto es que odio el formato workbench...
    $myCliente->cliente_id=$cliente->getidcliente();
    $myCliente->cliente_cedula=$cliente->getcliente_cc();
    $myCliente->cliente_nombre=$cliente->getcliente_nombre().$cliente->getcliente_apellido();
    
    $myFactura->cliente = $myCliente;
    $myFactura->total = 0 - $Factura->getfac_descueto();
    $myFactura->alquileres = array();
    
    $alquileres = AlquilerFacade::listByFactura($Factura->getidfactura());
    
    foreach ($alquileres as $objx => $Alquiler) {
        //Sacrifico rendimiento por simpleza de desarrollo
        //si algún día molesta, se duplica el método en el dao con un Join y ya
        $producto = ProductoFacade::select($Alquiler->getProducto_idprod()->getIdprod());
        $myAlquiler->producto_nombre = $producto->getprod_nombre();
        
        $myAlquiler->devoluciones = $Alquiler->getAlq_devuelto();
        
        $myAlquiler->cantidad = $Alquiler->getCantidad();
            $date1 = new DateTime($Alquiler->getFecha_inicio());
            $date2 = new DateTime($Alquiler->getFecha_fin());
            $diff = $date1->diff($date2);
        $myAlquiler->dias = $diff->days;
        $myAlquiler->valor = $Alquiler->getValor();
        
        $myFactura->total = $myFactura->total + ($myAlquiler->cantidad * $myAlquiler->dias * $myAlquiler->valor);
        array_push($myFactura->alquileres, $myAlquiler);
    }
    array_push($rta, $myFactura);
}

echo json_encode($rta);
