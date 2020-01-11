<?php

//Hecho a mano por el benévolo señor Arciniegas
//Entre la lucha de +4

include_once realpath('../facade/FacturaFacade.php');
require_once realpath('../facade/GlobalController.php');
$generalDao = GlobalController::getGeneralDaoInstance();
$generalDao->comenzarTransaccion();
try{
    $factura_id = strip_tags($_POST['factura_id']);
    $alquileres = json_decode(strip_tags($_POST['alquileres']));

    foreach ($alquileres as $obj => $alquiler) {
        $fecha = date("Y-m-d H:i:s");
        AlquilerFacade::insert($fecha, $alquiler->cantidad, $alquiler->valor, $alquiler->producto_id, $factura_id);
    }
$generalDao->confirmarTransaccion();
    echo "exito";
}catch(Exception $e){
    $generalDao->rollback();
    echo "error\n";
    echo $e->getMessage();
}

//comentario estúpido XD

