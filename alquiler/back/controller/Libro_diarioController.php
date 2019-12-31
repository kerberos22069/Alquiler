<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Lo sé porque lo sabe Fredy  \\
include_once realpath('../facade/Libro_diarioFacade.php');


class Libro_diarioController {

    public static function insert(){
        $idlibro_diario = strip_tags($_POST['idlibro_diario']);
        Libro_diarioFacade::insert($idlibro_diario);
return true;
    }

    public static function listAll(){
        $list=Libro_diarioFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Libro_diario) {	
	       $rta.="{
	    \"idlibro_diario\":\"{$Libro_diario->getidlibro_diario()}\"
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