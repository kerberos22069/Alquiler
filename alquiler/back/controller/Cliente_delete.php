<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once realpath('../facade/ClienteFacade.php');

$idcliente= $_GET['empresa'];
//        $idcliente = strip_tags($_POST['idcliente']);
    
        ClienteFacade::update_delete($idcliente);
echo 1;