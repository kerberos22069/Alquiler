<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once realpath('../facade/ProductoFacade.php');

//        $idprod ='2';
//        $prod_nombre = 'zxczczx';
//        $prod_descripcion = 'sdfsdfsdfsdf';
//        $prod_precio ='5';
//        $prod_stock ='2';
//        $prod_disponible = 0;
//        $prod_reparacion = 0;
//        $prod_danado =0;
        $idprod = strip_tags($_POST['idprod']);
        $prod_nombre = strip_tags($_POST['prod_nombre']);
        $prod_descripcion = strip_tags($_POST['prod_descripcion']);
        $prod_precio = strip_tags($_POST['prod_precio']);
        $prod_stock = strip_tags($_POST['prod_stock']);
        $prod_disponible = strip_tags($_POST['prod_disponible']);
        $prod_reparacion = strip_tags($_POST['prod_reparacion']);
        $prod_danado = strip_tags($_POST['prod_danado']);
        ProductoFacade::update($idprod, $prod_nombre, $prod_descripcion, $prod_precio, $prod_stock, $prod_disponible, $prod_reparacion, $prod_danado);
echo true;