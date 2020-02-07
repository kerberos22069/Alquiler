<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\
include_once realpath('../facade/ChoferesFacade.php');


class ChoferesController {

    public static function insert(){
        $idchoferes = strip_tags($_POST['idchoferes']);
        $cc_chofer = strip_tags($_POST['cc_chofer']);
        $nom_chofer = strip_tags($_POST['nom_chofer']);
        $chofe_telefono = strip_tags($_POST['chofe_telefono']);
        $direccion = strip_tags($_POST['direccion']);
        ChoferesFacade::insert($idchoferes, $cc_chofer, $nom_chofer, $chofe_telefono, $direccion);
return true;
    }

    public static function listAll(){
        $list=ChoferesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Choferes) {	
	       $rta.="{
	    \"idchoferes\":\"{$Choferes->getidchoferes()}\",
	    \"cc_chofer\":\"{$Choferes->getcc_chofer()}\",
	    \"nom_chofer\":\"{$Choferes->getnom_chofer()}\",
	    \"chofe_telefono\":\"{$Choferes->getchofe_telefono()}\",
	    \"direccion\":\"{$Choferes->getdireccion()}\"
	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        return "[{$msg},{$rta}]";
    }

}
//That`s all folks!