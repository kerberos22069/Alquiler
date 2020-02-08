<?php

include_once realpath('../facade/AlquilerFacade.php');
include_once realpath('../dto/alquiler.php');
/*
		
"{
   alquiler_id:"",
   alquiler_cantidad:"", 
   alquiler_valor:""
}"   }}

//comemtario estupido
//Comentario ridiculo
*/
$alquiler_id = $_GET['alquiler_id'];
$alquiler_cantidad_h = $_GET['alquiler_cantidad'];
$alquiler_valor_h = $_GET['alquiler_valor'];

$alquiler = new Alquiler();
$alquiler->setIdalquiler($alquiler_id);
$alquiler->setCantidad($alquiler_cantidad_h);
$alquiler->setValor($alquiler_valor_h);

$aux = AlquilerFacade::editarAlquiler($alquiler);

$rta = array('rta' => $aux);

header("Content-type: application/json; charset=utf-8");

echo  json_encode($rta); 