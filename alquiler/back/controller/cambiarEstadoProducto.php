<?php

//Hecho por el benévolo señor Arciniegas
//Con las manos untadas de sangre motilona y babas de perro

include_once realpath('../facade/ProductoFacade.php');
require_once realpath('../facade/GlobalController.php');
$generalDao = GlobalController::getGeneralDaoInstance();
$generalDao->comenzarTransaccion();
try{

    $producto_id = strip_tags($_POST['producto_id']);
    $producto_estadoAnterior = strip_tags($_POST['producto_estadoAnterior']);
    $producto_estadoNuevo = strip_tags($_POST['producto_estadoNuevo']);
    $producto_cantidad = strip_tags($_POST['producto_cantidad']);

    ProductoFacade::cambiarEstado($producto_id,$producto_estadoAnterior,$producto_estadoNuevo,$producto_cantidad);

    $generalDao->confirmarTransaccion();
    echo "exito";
}catch(Exception $e){
    $generalDao->rollback();
    echo "error";
}
