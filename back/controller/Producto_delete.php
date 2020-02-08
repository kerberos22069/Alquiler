<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once realpath('../facade/ProductoFacade.php');

$id_prod= $_GET['empresa'];

   
        ProductoFacade::update_delete($id_prod);
echo true;