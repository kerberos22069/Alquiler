<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once realpath('../facade/ProductoFacade.php');

//       $idprod = strip_tags($_POST['idprod']);

        
        $prod_nombre = strip_tags($_POST['prod_nombre']);
        $prod_descripcion = strip_tags($_POST['prod_descripcion']);
        $prod_precio = strip_tags($_POST['prod_precio']);
        $prod_stock = strip_tags($_POST['prod_stock']);
        $prod_alquilado = strip_tags($_POST['prod_disponible']);
        $prod_reparacion = strip_tags($_POST['prod_reparacion']);
        $prod_danado = strip_tags($_POST['prod_danado']);
        ProductoFacade::insert( $prod_nombre, $prod_descripcion, $prod_precio, $prod_stock, $prod_alquilado, $prod_reparacion, $prod_danado);
echo true;