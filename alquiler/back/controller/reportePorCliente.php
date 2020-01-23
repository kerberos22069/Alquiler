<?php

//Hecho a mano por el Benévolo señor Arciniegas
//Cualquier cosa para perder tiempo XD

$rta= array();

include_once realpath('../facade/ClienteFacade.php');
include_once realpath('../facade/FacturaFacade.php');
include_once realpath('../facade/AlquilerFacade.php');
include_once realpath('../facade/ProductoFacade.php');

$Cliente_cedula = strip_tags($_POST['cliente_cedula']);
$Cliente = ClienteFacade::list_x_CC($Cliente_cedula)[0];
$facturas =FacturaFacade::listByCliente($Cliente->getIdcliente());

foreach ($facturas as $obj => $Factura) {
    $myFactura = new stdClass();
    $myFactura->id=$Factura->getidfactura();
    $myFactura->fecha=$Factura->getfecha();
    
    $myFactura->total = 0 - $Factura->getfac_descueto();
    $myFactura->alquileres = array();
    
    $alquileres = AlquilerFacade::listByFactura($Factura->getidfactura());
    
    foreach ($alquileres as $objx => $Alquiler) {
        //Sacrifico rendimiento por simpleza de desarrollo
        //si algún día molesta, se duplica el método en el dao con un Join y ya
        $producto = ProductoFacade::select($Alquiler->getProducto_idprod()->getIdprod());
        $myAlquiler = new stdClass();
        $myAlquiler->producto_nombre = $producto->getprod_nombre();
        
        $myAlquiler->devoluciones = $Alquiler->getAlq_devuelto();
        
        $myAlquiler->cantidad = $Alquiler->getCantidad();
            $date1 = new DateTime($Alquiler->getFecha_inicio());
            $date2 = new DateTime($Alquiler->getFechafin());
            $diff = $date1->diff($date2);
        $myAlquiler->dias = $diff->days;
        $myAlquiler->valor = $Alquiler->getValor();
        
        $myFactura->total = $myFactura->total + ($myAlquiler->cantidad * $myAlquiler->dias * $myAlquiler->valor);
        array_push($myFactura->alquileres, $myAlquiler);
    }
    array_push($rta, $myFactura);
}

echo json_encode($rta);
