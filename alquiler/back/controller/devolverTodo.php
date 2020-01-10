<?php

// Hecho a mano por el benévolo señor Arciniegas
// Sí, en cada archivo que hago me toca inventar algo nuevo para escribir ( ¬.¬)

include_once realpath('../facade/FacturaFacade.php');
include_once realpath('../facade/AlquilerFacade.php');
include_once realpath('../facade/ProductoFacade.php');

require_once realpath('../facade/GlobalController.php');
$generalDao = GlobalController::getGeneralDaoInstance();
$generalDao->comenzarTransaccion();
try{
    $cliente_id = strip_tags($_POST['cliente_id']);


    $facturas = FacturaFacade::listByCliente($cliente_id);
    foreach ($facturas as $obj => $Factura) {
        $alquileres = AlquilerFacade::listByFactura($Factura->getidfactura());
        foreach ($alquileres as $objx => $Alquiler) {
            $jsonDev = $Alquiler->getAlq_devuelto();
            if($jsonDev != NULL && $jsonDev != ""){
                $arrayDevoluciones = json_decode($jsonDev);
                $totalDevuelto = 0;
                foreach ($arrayDevoluciones as $key => $devuelto) {
                    $totalDevuelto += $devuelto->cantidad;
                }
                if($totalDevuelto == $Alquiler->getCantidad()){
                    AlquilerFacade::devolver($Alquiler->getIdalquiler(),$Alquiler->getCantidad());
                    ProductoFacade::devolver($Alquiler->getProducto_idprod(), $Alquiler->getCantidad());
                }
            }
        }
    }
    $generalDao->confirmarTransaccion();
    echo "exito";
}catch(Exception $e){
    $generalDao->rollback();
    echo "error\n".$e->getMessage();
    var_dump($e);
}
