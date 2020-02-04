<?php

 require_once 'app_pdf/vendor/autoload.php'; 
 
 require_once 'app_pdf/plantilla/formato_fact.php'; 
 
 $css = file_get_contents('app_pdf/plantilla/style.css') ; 
 
 

 $mpdf= new \Mpdf\Mpdf([
     
 ]);
 $plantilla = getPlantilla();
 $mpdf->WriteHTML($css , \Mpdf\HTMLParserMode::HEADER_CSS );
 $mpdf->WriteHTML($plantilla , \Mpdf\HTMLParserMode::HTML_BODY );
// $mpdf->WriteHTML("Hola Mundo" , \Mpdf\HTMLParserMode::HTML_BODY );
 
 $mpdf->Output();
 