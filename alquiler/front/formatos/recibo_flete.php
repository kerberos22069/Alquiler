<!DOCTYPE html>
<html lang="en">
   <?php
   $cliente=$_GET['usuario'];
   $fletes=$_GET['productos'];
   
   $arr = explode(',', $cliente, 7);
   
   var_dump($arr) ;
   var_dump($fletes) ;
   ?>
    
    
    
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
  
    <header class="clearfix">
<!--    <button type="button" class="btn btn-primary" onclick="imprimir()">
                                        Imprimir
                                    </button>-->
      <div id="company" class="clearfix">
          <div><b>Comprobante</b> 3-2-1</div>
        <div>Company Name</div>
              <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
       
      <div id="project">
               
       
          <div><b>CONDUCTOR</b>&nbsp<?php echo $arr[1]; ?></div>
        <div><b>CEDULA</b>&nbsp <?php echo $arr[2]; ?></div>
<!--        <div><b>DIRECCION</b> 796 Silver Harbour, TX 79273, US</div>-->
        <div><b>DESDE</b>&nbsp <?php echo $arr[3]; ?></div>
        <div><b>HASTA</b>&nbsp <?php echo $arr[4]; ?></div>
      </div>
    </header>
    
        <main>
            
             <hr>
      <table>
        <thead>
          <tr>
            <th class="service">#ORDEN</th>
            <th class="desc">FECHA</th>
            <th>CLIENTE</th>
            <th>VALOR</th>
           
          </tr>
        </thead>
        <tbody>
          <?php
//$array = array(1, 2, 3, 4);
foreach ($arr as &$valor) {
    $valor = $valor ;
    
    echo ''.$valor;
}


// $array ahora es array(2, 4, 6, 8)
unset($valor); // rompe la referencia con el último elemento
?>  
            
          <tr>
            <td class="service">Design</td>
            <td class="desc">Creating a </td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
          
          </tr>
          <tr>
            <td class="service">Development</td>
            <td class="desc">Developing</td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
       
          </tr>
          <tr>
            <td class="service">SEO</td>
            <td class="desc">Optimize </td>
            <td class="unit">$40.00</td>
            <td class="qty">20</td>
 
          </tr>
          <tr>
            <td class="service">Training</td>
            <td class="desc">Initial </td>
            <td class="unit">$40.00</td>
            <td class="qty">4</td>
           
          </tr>
          <tr>
            <td colspan="3"></td>
            <td class="total"></td>
          </tr>
       
          <tr>
            <td colspan="3" class="grand total">TOTAL</td>
            <td class="grand total">&nbsp <?php echo $arr[5]; ?></td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <button type="button" class="btn btn-primary" onclick="imprimir()">
                                        Imprimir
                                    </button>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
    
    <script>
function imprimir() {
  window.print();
}
</script>
    
  </body>
</html>