<?php

// Hecho a mano por el benévolo señor Arciniegas
// Sí, en cada archivo que hago me toca inventar algo nuevo para escribir ( ¬.¬)

include_once realpath('../facade/AlquilerFacade.php');
include_once realpath('../facade/ProductoFacade.php');

require_once realpath('../facade/GlobalController.php');
$generalDao = GlobalController::getGeneralDaoInstance();
$generalDao->comenzarTransaccion();
try{
    
    $alquiler_id =  $_POST['alquiler_id'];
    $cantidad =  $_POST['cantidad'];
    $estado =  $_POST['estado'];
    $fecha = $_POST['fecha']; 
    
    $AlquilerOriginal = AlquilerFacade::select($alquiler_id);
        AlquilerFacade::devolver($alquiler_id,$cantidad,$estado, $fecha);
        ProductoFacade::devolver($AlquilerOriginal->getProducto_idprod()->getIdprod(), $cantidad,$estado);
    $generalDao->confirmarTransaccion();
    echo "exito";
}catch(Exception $e){
    $generalDao->rollback();
    echo "error\n".$e->getMessage();
    var_dump($e);
}
