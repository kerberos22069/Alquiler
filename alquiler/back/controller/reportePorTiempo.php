<?php

//Hecho a mano por el Benévolo señor Arciniegas
//Cualquier cosa para perder tiempo XD

$rta= array();
 
include_once realpath('../facade/FacturaFacade.php');
include_once realpath('../facade/ClienteFacade.php');
include_once realpath('../facade/AlquilerFacade.php');
include_once realpath('../facade/ProductoFacade.php');

$fecha_ini = strip_tags($_POST['fecha_ini']);
$fecha_fin = strip_tags($_POST['fecha_fin']);
$facturas =FacturaFacade::listRange($fecha_ini, $fecha_fin);

foreach ($facturas as $obj => $Factura) {
    
    $myFactura = new stdClass();
    $myFactura->id=$Factura->getidfactura();
    $myFactura->fecha=$Factura->getfecha();
    
    $cliente = ClienteFacade::select($Factura->getcliente_idcliente()->getidcliente()); //por esto es que odio el formato workbench...
    $myCliente = new stdClass();
    $myCliente->cliente_id=$cliente->getidcliente();
    $myCliente->cliente_cedula=$cliente->getcliente_cc();
    $myCliente->cliente_nombre=$cliente->getcliente_nombre()." ".$cliente->getcliente_apellido();
    
    $myFactura->cliente = $myCliente;
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
        //Se mira si tiene una lista de devoluciones válida y si se formatea para recorrerla y saber el total de productos devueltos
        if($jsonDev != NULL && $jsonDev != ""){
            $arrayDevoluciones = json_decode($jsonDev);
            $totalDevuelto = 0;
            foreach ($arrayDevoluciones as $key => $devuelto) {
                $totalDevuelto += $devuelto->cantidad;
            }
        }
                
        $myAlquiler->cantidad = $Alquiler->getCantidad()+$totalDevuelto;
        
        $datetime1 = date_create($Alquiler->getFecha_inicio());
        $datetime2 = date_create($Alquiler->getFechafin());
        $interval = date_diff($datetime1, $datetime2);
        $myAlquiler->dias = $interval->format('%d');
        $myAlquiler->valor = $Alquiler->getValor();
        
        $myFactura->total = $myFactura->total + ($myAlquiler->cantidad * $myAlquiler->dias * $myAlquiler->valor);
        array_push($myFactura->alquileres, $myAlquiler);
    }
    array_push($rta, $myFactura);
}

echo json_encode($rta);
