<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once realpath('../facade/ChoferesFacade.php');


   
//        $idchoferes = strip_tags($_POST['idchoferes']);

////        $idchoferes = strip_tags($_POST['idchoferes']);
        $cc_chofer = strip_tags($_POST['cc_chofer']);
        $nom_chofer = strip_tags($_POST['nom_chofer']);
        $chofe_telefono = strip_tags($_POST['chofe_telefono']);
        $direccion = strip_tags($_POST['direccion']);
        ChoferesFacade::insert( $cc_chofer, $nom_chofer, $chofe_telefono, $direccion);
echo true;