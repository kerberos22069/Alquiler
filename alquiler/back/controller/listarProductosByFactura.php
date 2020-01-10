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