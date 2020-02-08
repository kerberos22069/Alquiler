<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once realpath('../facade/ClienteFacade.php');

      
        $cliente_nombre = strip_tags($_POST['cliente_nombre']);
        $cliente_apellido = strip_tags($_POST['cliente_apellido']);
        $cliente_cc = strip_tags($_POST['cliente_cc']);
        $cliente_correo = strip_tags($_POST['cliente_correo']);
        $cliente_direccion = strip_tags($_POST['cliente_direccion']);
         $cliente_telefono = strip_tags($_POST['cliente_telefono']);
        $cliente_stado = "1";
        ClienteFacade::insert( $cliente_nombre, $cliente_apellido, $cliente_cc, $cliente_correo, $cliente_telefono, $cliente_direccion, $cliente_stado);
echo 1;