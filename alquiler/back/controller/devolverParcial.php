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
    $alquileresADevolver = json_decode(strip_tags($_POST['alquileres']));

    $facturas = FacturaFacade::listByCliente($cliente_id);
    foreach ($facturas as $obj => $Factura) {
        $alquileres = AlquilerFacade::listByFactura($Factura->getidfactura());
        foreach ($alquileres as $objx => $Alquiler) {
            //Recorre la lista que me dan y compara los alquileres del cliente con la lista
            //descartando a los que no me piden cambiar (devolver)
            foreach ($alquileresADevolver as $objy => $AlquilerADevolver) {
                if($Alquiler->getIdalquiler() == $AlquilerADevolver->alquiler_id){
                    $jsonDev = $Alquiler->getAlq_devuelto();
                    //Se mira si tiene una lista de devoluciones válida y si se formatea para recorrerla y saber el total
                    if($jsonDev != NULL && $jsonDev != ""){
                        $arrayDevoluciones = json_decode($jsonDev);
                        $totalDevuelto = 0;
                        foreach ($arrayDevoluciones as $key => $devuelto) {
                            $totalDevuelto += $devuelto->cantidad;
                        }
                        //Si está abierto (en este método no debería importar, puesto que se habrá validado en vista,
                        //pero es mejor dejarlo, por siácalas) o sea, si hay cosas por devolver, las devuelve :3
                        if($totalDevuelto == $Alquiler->getCantidad()){
                            AlquilerFacade::devolver($Alquiler->getIdalquiler(),$AlquilerADevolver->cantidad,$AlquilerADevolver->estado);
                            ProductoFacade::devolver($Alquiler->getProducto_idprod(), $AlquilerADevolver->cantidad,$AlquilerADevolver->estado);
                        }
                    }
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
