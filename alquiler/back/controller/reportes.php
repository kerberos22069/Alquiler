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

            $myAlquiler = manejarMovimientos($myAlquiler, $Alquiler);

            if (!$myAlquiler->devuelto) {
                $myFactura->devuelto = false;
            }

            $datetime1 = date_create($Alquiler->getFecha_inicio());
            if($myAlquiler->devuelto){
                $datetime2 = date_create($Alquiler->getFechafin());
            }else{
                $datetime2 = date_create();
            }
            $interval = date_diff($datetime1, $datetime2);
            $myAlquiler->dias = $interval->format('%d');
            $myAlquiler->valor = $Alquiler->getValor();
            //Se suman los no devueltos todavía
            $myAlquiler->subTotal += $myAlquiler->dias * $myAlquiler->valor * ($myAlquiler->cantidad - $myAlquiler->totalDevuelto);
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

function manejarMovimientos($myAlquiler, $Alquiler) {
    //Se mira si tiene una lista de devoluciones válida y si se formatea para recorrerla y saber el total de productos devueltos
    $arrayMovimientos = array();
    $jsonMovimientos = $Alquiler->getAlq_devuelto();
    if ($jsonMovimientos != NULL && $jsonMovimientos != "") {
        $movimientos = json_decode($jsonMovimientos);
        $totalDevuelto = 0;
        $totalAlquilado = 0;
        $cola_alquileres = [];
        foreach ($movimientos as $key => $movimiento) {

            $movimiento->dias = 0;
            $movimiento->valor = 0;

            if ($movimiento->tipo == 0) {
                //Devolución
                $totalDevuelto += $movimiento->cantidad;
                $movimiento = iterarSobreColaAlquileres($movimiento, $Alquiler->getValor(), $cola_alquileres);
                $myAlquiler->subTotal += $movimiento->valor;
            } else {
                //Alquiler
                $totalAlquilado += $movimiento->cantidad;
                array_push($cola_alquileres, clone $movimiento);
            }

            array_push($arrayMovimientos, $movimiento);
        }
    }
    $myAlquiler->movimientos = $arrayMovimientos;
    $myAlquiler->cantidad = $totalAlquilado;
    $myAlquiler->totalDevuelto = $totalDevuelto;
    $myAlquiler->devuelto = ($totalAlquilado == $totalDevuelto);
    return $myAlquiler;
}

function iterarSobreColaAlquileres($movimiento, $valor, $cola_alquileres) {
    //Calcula los días de activos antes de una devolución y obtiene el total $ del producto para esa cantidad de días
    $cantidadVirtual = intval($movimiento->cantidad);
    while($cantidadVirtual >0){
        $alquilerMasViejo = array_shift($cola_alquileres);
        $alquilerMasViejo->cantidad = intval($alquilerMasViejo->cantidad);
        if($alquilerMasViejo->cantidad > $cantidadVirtual){
            $cantidadASacar = $cantidadVirtual;
            $alquilerMasViejo->cantidad -= $cantidadVirtual;
            array_unshift($cola_alquileres, $alquilerMasViejo);
            $cantidadVirtual = 0;
        }else if($alquilerMasViejo->cantidad == $cantidadVirtual){
            $cantidadASacar = $cantidadVirtual;
            $cantidadVirtual = 0;
            //Son virtualmente iguales, pero en este no se vuelve a meter el alquiler viejo en la cola
        }else{
            $cantidadASacar = $alquilerMasViejo->cantidad;
            $cantidadVirtual -= $alquilerMasViejo->cantidad;
            //Saca lo que tenga que sacar del alquiler más viejo, reduce su cantidad y sigue iterando alv
        }
        $movimiento = calcularSubTotalMovimiento($movimiento, $alquilerMasViejo->fecha, $valor, $cantidadASacar);
    }
    return $movimiento;
}

function calcularSubTotalMovimiento($movimiento, $fecha_alquiler, $valor, $cantidad) {
    $datetime1 = date_create($fecha_alquiler);
    $datetime2 = date_create($movimiento->fecha);
    $interval = date_diff($datetime1, $datetime2);
    $dias = $interval->format('%d');
    $movimiento->valor += $dias * $valor * $cantidad;
    
    if($dias > $movimiento->dias ){
        $movimiento->dias = $dias;
    }
    
    return $movimiento;
}
