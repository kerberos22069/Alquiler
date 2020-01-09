<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once realpath('../facade/AlquilerFacade.php');

        $idalquiler = strip_tags($_POST['idalquiler']);
        $fecha_inicio = date("Y-m-d H:i:s");
        $cantidad = strip_tags($_POST['cantidad']);
        $valor = strip_tags($_POST['valor']);
        $pagado = strip_tags($_POST['pagado']);
        $fechafin = strip_tags($_POST['fechafin']);
        $Producto_idprod = strip_tags($_POST['producto_idprod']);
        $producto= new Producto();
        $producto->setIdprod($Producto_idprod);
        $Factura_idfactura = strip_tags($_POST['factura_idfactura']);
        $factura= new Factura();
        $factura->setIdfactura($Factura_idfactura);
        $alq_stado = strip_tags($_POST['alq_stado']);
        $alq_devuelto = strip_tags($_POST['alq_devuelto']);
        AlquilerFacade::insert($idalquiler, $fecha_inicio, $cantidad, $valor, $pagado, $fechafin, $producto, $factura, $alq_stado, $alq_devuelto);
return true;