<?php

/*
 * Hecho a mano por el benévolo señor Arciniegas
 * Bah, no es cierto, sólo copié y pegué el código para reutilizarlo XD
 */

include_once realpath('../facade/FacturaFacade.php');
include_once realpath('../facade/ClienteFacade.php');
include_once realpath('../facade/AlquilerFacade.php');
include_once realpath('../facade/ProductoFacade.php');
include_once realpath('../facade/TransporteFacade.php');

function armarReporteDeFacturas($facturas) {

    $rta = array();

    foreach ($facturas as $obj => $Factura) {

        $myFactura = new stdClass();
        $myFactura->id = $Factura->getidfactura();
        $date = date_create($Factura->getfecha());
        $myFactura->fecha = date_format($date, "d/m/Y H:i:s");

        $cliente = ClienteFacade::select($Factura->getcliente_idcliente()->getidcliente()); //por esto es que odio el formato workbench...
        $myCliente = new stdClass();
        $myCliente->cliente_id = $cliente->getidcliente();
        $myCliente->cliente_cedula = $cliente->getcliente_cc();
        $myCliente->cliente_nombre = $cliente->getcliente_nombre() . " " . $cliente->getcliente_apellido();
        $myCliente->cliente_correo = $cliente->getcliente_correo();
        $myCliente->cliente_telefono = $cliente->getcliente_telefono();
        $myCliente->cliente_direccion = $cliente->getcliente_direccion();

        $myFactura->cliente = $myCliente;
        $myFactura->total = 0;

        $myFactura->devuelto = true;

        $myFactura->alquileres = array();

        $alquileres = AlquilerFacade::listByFactura($Factura->getidfactura());

        foreach ($alquileres as $objx => $Alquiler) {
            //Sacrifico rendimiento por simpleza de desarrollo
            //si algún día molesta, se duplica el método en el dao con un Join y ya
            $producto = ProductoFacade::select($Alquiler->getProducto_idprod()->getIdprod());
            $myAlquiler = new stdClass();
            $myAlquiler->alquiler_id = $Alquiler->getIdalquiler();
            $myAlquiler->producto_nombre = $producto->getprod_nombre();

            $myAlquiler->devoluciones = $Alquiler->getAlq_devuelto();

            $myAlquiler->subTotal = 0;
            $jsonDev = $Alquiler->getAlq_devuelto();
            //Se mira si tiene una lista de devoluciones válida y si se formatea para recorrerla y saber el total de productos devueltos

            if ($jsonDev != NULL && $jsonDev != "") {
                $arrayDevoluciones = json_decode($jsonDev);
                $totalDevuelto = 0;
                foreach ($arrayDevoluciones as $key => $devuelto) {
                    $totalDevuelto += $devuelto->cantidad;
                    //Calcula los días de activos antes de una devolución y obtiene el total $ del producto para esa cantidad de días
                    $datetime1 = date_create($Alquiler->getFecha_inicio());
                    $datetime2 = date_create($devuelto->fecha);
                    $interval = date_diff($datetime1, $datetime2);
                    $myAlquiler->subTotal += $interval->format('%d') * $Alquiler->getValor() * $devuelto->cantidad;
                }
            }
            $myAlquiler->cantidad = $Alquiler->getCantidad() + $totalDevuelto;
            $myAlquiler->totalDevuelto = $totalDevuelto;
            $myAlquiler->devuelto = $Alquiler->getCantidad() <= 0;
            if (!$myAlquiler->devuelto) {
                $myFactura->devuelto = false;
            }

            $datetime1 = date_create($Alquiler->getFecha_inicio());
            $datetime2 = date_create($Alquiler->getFechafin());
            $interval = date_diff($datetime1, $datetime2);
            $myAlquiler->dias = $interval->format('%d');
            $myAlquiler->valor = $Alquiler->getValor();

            //Se suman los no devueltos todavía
            $myAlquiler->subTotal += $myAlquiler->dias * $myAlquiler->valor * $Alquiler->getCantidad();

            $myFactura->total += $myAlquiler->subTotal;
            array_push($myFactura->alquileres, $myAlquiler);
        }

        $transportes = TransporteFacade::listByFactura($Factura->getidfactura());
        $myFactura->transportes = array();
        $totalTransporte = 0;
        foreach ($transportes as $objs => $Transporte) {
            $myTransporte = new stdClass();
            $myTransporte->flete = $Transporte->getTransporte_flete();
            $myTransporte->conductor = $Transporte->getTransporte_conductor();
            $totalTransporte += $myTransporte->flete;
            array_push($myFactura->transportes, $myTransporte);
        }
        $myFactura->totalTransporte = $totalTransporte;
        $myFactura->total += $totalTransporte;

        $myFactura->descuento = $Factura->getFac_descueto();
        $myFactura->total -= $myFactura->descuento;

        $abonos = json_decode($Factura->getAbonos());
        $totalAbonado = 0;
        foreach ($abonos as $objq => $Abono) {
            $totalAbonado += $Abono->cantidad;
        }

        $myFactura->totalAbonado = $totalAbonado;
        $myFactura->abonos = $Factura->getAbonos();

        $myFactura->pagado = $myFactura->total == $totalAbonado;

        array_push($rta, $myFactura);
    }

    return json_encode($rta);
}
