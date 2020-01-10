<?php

//Hecho por el benévolo señor Arciniegas
//Cada segundo de mi vida es una agonía

include_once realpath('../facade/AlquilerFacade.php');
include_once realpath('../facade/ProductoFacade.php');
include_once realpath('../facade/ClienteFacade.php');

$factura_id = strip_tags($_POST['factura_id']);

$alquileres = AlquilerFacade::listByFactura($factura_id);
$myFactura = new stdClass();
$myFactura->alquileres = array();
foreach ($alquileres as $objx => $Alquiler) {
    //Sacrifico rendimiento por simpleza de desarrollo
    //si algún día molesta, se duplica el método en el dao con un Join y ya
    $producto = ProductoFacade::select($Alquiler->getProducto_idprod()->getIdprod());
    $myAlquiler = new stdClass();
    $myAlquiler->producto_nombre = $producto->getprod_nombre();

    $cliente = ClienteFacade::select($Factura->getcliente_idcliente()->getidcliente()); //por esto es que odio el formato workbench...
    $myCliente = new stdClass();
    $myCliente->cliente_id=$cliente->getidcliente();
    $myCliente->cliente_cedula=$cliente->getcliente_cc();
    $myCliente->cliente_nombre=$cliente->getcliente_nombre().$cliente->getcliente_apellido();
    
    $myFactura->cliente = $myCliente;
    
    $myAlquiler->devoluciones = $Alquiler->getAlq_devuelto();

    $myAlquiler->cantidad = $Alquiler->getCantidad();
        $date1 = new DateTime($Alquiler->getFecha_inicio());
        $date2 = new DateTime($Alquiler->getFecha_fin());
        $diff = $date1->diff($date2);
    $myAlquiler->dias = $diff->days;
    $myAlquiler->valor = $Alquiler->getValor();
    
    array_push($myFactura->alquileres, $myAlquiler);
}

echo json_encode($myFactura);

