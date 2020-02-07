<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...con el mayor de los disgustos, el benévolo señor Arciniegas.  \\
include_once realpath('../facade/ChoferesFacade.php');


class ChoferesController {

    public static function insert(){
        $idchoferes = strip_tags($_POST['idchoferes']);
        $cc_chofer = strip_tags($_POST['cc_chofer']);
        $nom_chofer = strip_tags($_POST['nom_chofer']);
        ChoferesFacade::insert($idchoferes, $cc_chofer, $nom_chofer);
return true;
    }

    public static function listAll(){
        $list=ChoferesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Choferes) {	
	       $rta.="{
	    \"idchoferes\":\"{$Choferes->getidchoferes()}\",
	    \"cc_chofer\":\"{$Choferes->getcc_chofer()}\",
	    \"nom_chofer\":\"{$Choferes->getnom_chofer()}\"
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