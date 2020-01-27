<?php

//Hecho a mano por el benévolo señor Arciniegas
//¿En serio soy el único programador que hace esto?

require_once realpath('../facade/GlobalController.php');
$generalDao = GlobalController::getGeneralDaoInstance();
$generalDao->comenzarTransaccion();
try{

    include_once realpath('../facade/FacturaFacade.php');

    $factura_id = strip_tags($_POST['factura_id']);
    $valor = strip_tags($_POST['valor']);

    $Factura = FacturaFacade::abonar($factura_id,$valor);

    echo 'exito';
}catch(Exception $e){
    $generalDao->rollback();
    echo $e->getMessage();
    var_dump($e);
}
