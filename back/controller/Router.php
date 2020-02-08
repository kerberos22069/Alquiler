<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya no la quiero, es cierto, pero tal vez la quiero. Es tan corto el amor, y es tan largo el olvido.  \\
include_once realpath('AlquilerController.php');
include_once realpath('ClienteController.php');
include_once realpath('FacturaController.php');
include_once realpath('Libro_diarioController.php');
include_once realpath('ProductoController.php');
include_once realpath('TransporteController.php');

$ruta = strip_tags($_POST['ruta']);
    	$rtn = "";
    	switch ($ruta) {
           case 'AlquilerInsert':
    			$rtn = AlquilerController::insert();
    			break;
    		case 'AlquilerList':
    			$rtn = AlquilerController::listAll();
    			break;
           case 'ClienteInsert':
    			$rtn = ClienteController::insert();
    			break;
    		case 'ClienteList':
    			$rtn = ClienteController::listAll();
    			break;
           case 'FacturaInsert':
    			$rtn = FacturaController::insert();
    			break;
    		case 'FacturaList':
    			$rtn = FacturaController::listAll();
    			break;
           case 'Libro_diarioInsert':
    			$rtn = Libro_diarioController::insert();
    			break;
    		case 'Libro_diarioList':
    			$rtn = Libro_diarioController::listAll();
    			break;
           case 'ProductoInsert':
    			$rtn = ProductoController::insert();
    			break;
    		case 'ProductoList':
    			$rtn = ProductoController::listAll();
    			break;
           case 'TransporteInsert':
    			$rtn = TransporteController::insert();
    			break;
    		case 'TransporteList':
    			$rtn = TransporteController::listAll();
    			break;
    		default:
    			$rtn="404 Ruta no encontrada.";
    			break;
    	}

echo $rtn;

//That`s all folks!