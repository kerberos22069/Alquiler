<?php

 require_once 'app_pdf/vendor/autoload.php'; 
 
 require_once 'app_pdf/plantilla/formato_fact.php'; 
 
// require_once ('Ventas_insert.php'); 
 
 $css = file_get_contents('app_pdf/plantilla/style.css') ; 
 
 

 $mpdf= new \Mpdf\Mpdf([
     
 ]);
 

 $cliente=$_GET['usuario'];

 
//die();
 
 $plantilla = getPlantilla($cliente);
 
 
 $mpdf->WriteHTML($css , \Mpdf\HTMLParserMode::HEADER_CSS );
 $mpdf->WriteHTML($plantilla , \Mpdf\HTMLParserMode::HTML_BODY );
// $mpdf->WriteHTML("Hola Mundo" , \Mpdf\HTMLParserMode::HTML_BODY );
 
 $mpdf->Output();
 