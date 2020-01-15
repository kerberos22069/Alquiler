<?php

//Hecho a mano por el benévolo señor Arciniegas
//Vivir es absurdo, pero suicidarse lo es aún más

$rta= array();

include_once realpath('../facade/FacturaFacade.php');
include_once realpath('../facade/AlquilerFacade.php');
include_once realpath('../facade/ProductoFacade.php');

$Cliente_idcliente = strip_tags($_POST['cliente_id']);
$facturas =FacturaFacade::listByCliente($Cliente_idcliente);

foreach ($facturas as $obj => $Factura) {
    $abierta=false;
    
    $myFactura = new stdClass();
    $myFactura->id=$Factura->getidfactura();
    $myFactura->fecha=$Factura->getfecha();
    $myFactura->abonos=$Factura->getAbonos();
    
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
        
        $jsonDev = $Alquiler->getAlq_devuelto();
        if($jsonDev != NULL && $jsonDev != ""){
            $arrayDevoluciones = json_decode($jsonDev);
            $totalDevuelto = 0;
            foreach ($arrayDevoluciones as $key => $devuelto) {
                $totalDevuelto += $devuelto->cantidad;
            }
            if($totalDevuelto != $Alquiler->getCantidad()){
                $abierta = true;
            }
        }
        
        $myAlquiler->cantidad = $Alquiler->getCantidad();
            $date1 = new DateTime($Alquiler->getFecha_inicio());
            $date2 = new DateTime($Alquiler->getFecha_fin());
            $diff = $date1->diff($date2);
        $myAlquiler->dias = $diff->days;
        $myAlquiler->valor = $Alquiler->getValor();
        
        $myFactura->total = $myFactura->total + ($myAlquiler->cantidad * $myAlquiler->dias * $myAlquiler->valor);
        array_push($myFactura->alquileres, $myAlquiler);
    }
    if($abierta){
        array_push($rta, $myFactura);
    }
}

echo json_encode($rta);
