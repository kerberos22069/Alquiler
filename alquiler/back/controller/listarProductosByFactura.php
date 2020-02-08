<?php

// Hecho a mano por el benévolo señor Arciniegas
// Haciendo comentarios estúpidos desde el 98

include_once realpath('../facade/AlquilerFacade.php');
include_once realpath('../facade/ProductoFacade.php');

$factura_id = strip_tags($_POST['factura_id']);

$alquileres = AlquilerFacade::listByFactura($factura_id);
$myFactura = array();
foreach ($alquileres as $objx => $Alquiler) {
    //Sacrifico rendimiento por simpleza de desarrollo
    //si algún día molesta, se duplica el método en el dao con un Join y ya
    $producto = ProductoFacade::select($Alquiler->getProducto_idprod()->getIdprod());
    $myAlquiler = new stdClass();
    $myAlquiler->producto_nombre = $producto->getprod_nombre();

    $myAlquiler->alquiler_id = $Alquiler->getIdalquiler();
    $myAlquiler->producto_nombre = $producto->getprod_nombre();

    $myAlquiler->devoluciones = $Alquiler->getAlq_devuelto();

    $jsonDev = $Alquiler->getAlq_devuelto();
    //Se mira si tiene una lista de devoluciones válida y si se formatea para recorrerla y saber el total de productos devueltos
    if($jsonDev != NULL && $jsonDev != ""){
        $arrayDevoluciones = json_decode($jsonDev);
        $totalDevuelto = 0;
        foreach ($arrayDevoluciones as $key => $devuelto) {
            $totalDevuelto += $devuelto->cantidad;
        }
    }
    $myAlquiler->cantidad = $Alquiler->getCantidad()+$totalDevuelto;
    $myAlquiler->totalDevuelto = $totalDevuelto;
    $myAlquiler->devuelto = $Alquiler->getCantidad() <= 0;

    $datetime1 = date_create($Alquiler->getFecha_inicio());
    $datetime2 = date_create($Alquiler->getFechafin());
    $interval = date_diff($datetime1, $datetime2);
    $myAlquiler->dias = $interval->format('%d');
    $myAlquiler->valor = $Alquiler->getValor();
    
    array_push($myFactura, $myAlquiler);
}

echo json_encode($myFactura);