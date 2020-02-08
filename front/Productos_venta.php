
<html>
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
     <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
              
                    <div class="ibox-content">
                          <div class="row">
        <div class="col-sm">
            <button type="button" id="agregarProd" class="btn btn-primary" onclick="modalProductos()"  >
                                + Agregar
                            </button>
        </div>
        <div class="col-sm">
            
        </div>
        <div class="col-sm">
             
        </div>
        <div class="col-sm">
             
        </div>
        <div class="col-sm">
            
            
              <button type="button" id="agregarProd" class="btn btn-primary" onclick="enviarFactura()"  >
                                + Enviar Factura
                            </button>
        </div>
    </div>
                        
                     
    <div class="ibox-tools">

                         

                        </div>
                        <div class="table-responsive">
                            <table id="mytable" class="table table-striped" >
                           <!-- <table class="table table-striped table-bordered table-hover dataTables-example" >-->
                                <thead>
                                    <tr>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Id</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Nombre</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Descripcion</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Precio</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Cantidad</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Desc</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Valor Total</th>
                    
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Dias Prestamo</th>
                    


<!--                                        <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-eye"></i></th>
                                        <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-edit"></i></th>-->
                                        <th style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-trash"></i></th>


                                    </tr>
                                </thead>
                                <tbody id="Ventas_factList">

                                </tbody>

                            </table>
                        </div>
    <div class="row">
        <div class="col-sm">
   
        </div>
        <div class="col-sm">
         
        </div>
        <div class="col-sm">
         
        </div>
        <div class="col-sm">
         
        </div>
        <div class="col-sm">
   
        </div>
        <!--<hr>-->   
        <div class="col-sm">
               <hr>  
                                   <div class="form-group" >
                                          <!--<hr>-->  
                          <label for="Inputpersona_nombre">TOTAL </label>
                          <input type="text" name="total_fact" class=" form-control" id="Inputtotal_fact" placeholder="Nombre y Apellido" value="0">
                       </div>
        </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    
    
       <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
            
                                  
                                <div class="modal-dialog modal-lg mdialTamanio">
                                    <div id="menumodal1" class="modal-content animated flipInY">
                                          <form role="form" id="ProductInsert">
<!--                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Listar Usuarios</h4>
                                           
                                        </div>-->
                                        <div class="modal-body">
                                              <div class="panel panel-default">
      <!--        <div align=center class="panel-heading"><h3 class="panel-title">Registrar clientes</h3></div>-->
              <div align=center class="panel-body">
              
      
                  
                     
               
                      <div class="row">
                                        <div class="col-lg-6">
                                         
    <div class="row">
        <div class="col-sm-9">
               <div class="form-group">
 
                          <label for="Inputproducto">Productos </label>
                          <select  name="producto" class="form-control" id="Inputproducto"  onchange="mostrarDatosP(this.value);">
                                   
                                
                             </select> 
                       </div>
        </div>
        <div class="col-sm-3">
             <div class="form-group">
                          <label for="Inputpersona_nombre">Cantidad </label>
                          <input type="number" name="canti" class="form-control" id="Inputcanti" placeholder="0" value=0 onChange="multiplicar();">
                       </div>
        </div>
      
    </div>

                          
                
                                            
                                            <div class="form-group" style="display: none">
                          <label for="Inputprodc_referencia">N# Ref </label>
                          <input type="text" name="prodc_referencia" class="form-control" id="Inputprodc_referencia" placeholder="referencia" required>
                       </div>
                                            
                      <div class="form-group">
                          <label for="Inputproduc_nombre">Nombre </label>
                          <input type="text" name="produc_nombre" class="form-control" id="Inputproduc_nombre" placeholder="Nombre y Apellido" required>
                       </div>
                                                        <div class="form-group">
                          <label for="Inputprodc_descr">Descripcion</label>
                          <input type="text" name="prodc_descr" class="form-control" id="Inputprodc_descr" placeholder="persona_direccion">
                       </div>
                      
                           <div class="form-group">
                          <label for="Inputproc_dias">Dias Prestamo</label>
                          <input type="text" name="proc_dias" class="form-control" id="Inputproc_dias" placeholder="Telefono contacto" required>
                       </div>                  
                                            
                                  </div>
                          
                          
                          
                                        <div class="col-lg-6">
                                          <div class="form-group">
                          <label for="Inputproct_stock">Stock</label>
                          <input type="text" name="proct_stock" class="form-control" id="Inputproct_stock" placeholder="Telefono contacto" required>
                       </div>       
                                            
                                            
                                                         <div class="form-group">
                          <label for="Inputpersona_cedula">Precio</label>
                          <input type="text" name="precio_unitario" class="form-control" id="Inputprecio_unitario" placeholder="Cedula" value=0 onChange="multiplicar();" >
                       </div>
                       
                                   <div class="form-group">
                          <label for="Inputdescuento">Descuento</label>
                          <input type="text" name="descuento" class="form-control" id="Inputdescuento" placeholder="persona_direccion" value="0"  onChange="des();">
                       </div>
                                   <div class="form-group">
                          <label for="Inputprecio_total">precio Total</label>
                          <input type="text" name="precio_total" class="form-control" id="Inputprecio_total" placeholder="persona_direccion" value="0">
                       </div>
                              
  
                                        </div>
                          
                                    </div>
                      
  
          </div> <!-- panel -->
      </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button name="editar" id="adicionar"type="button" class="btn btn-primary" >Agregar</button>
<!--                                            <button name="editar" id="editar" type="button" class="btn btn-primary" onclick="registraraProducto()">Agregar</button>-->
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    
                                           
                                        </div>
                                                 </form>
                                    </div>
                                </div>
                            </div>
    
    
     <script src="js/Ajax.js "></script>
            <script src="js/ViewManager.js "></script>
            <script src="js/HtmlBuilder.js "></script> 
    <script src="js/plugins/sweetalert/sweetalert.min.js"></script>
        <script>
        $(document).ready(function(){
//            cargarePS();
//            cargarArl();
//            cargarNac();
//            cargarRol();
cargareNum_Factura2();

 i = 1; //contador para asignar id al boton que borrara la fila

      });
      </script>

    <script>
        
        
            function cargareNum_Factura2(){    
           
        $.get('../back/controller/Ventas_Num_Factura.php',function(depa){      
    
          depa = JSON.parse(depa);
          
            $("#Inputnum_factu").val(depa[1].precio_total);//direccion
        
        }); 
      }
//               function ActivarEditar(){
//        
//      document.getElementById('editar').disabled=false;
//
//};

        
        
        function modalProductos(){
//               $('#myModalDetalles').addClass(' data-backdrop="static" data-keyboard="false"');
             $('#myModal2').modal({show: true});
//               $('#myModal2').modal('hide');//cerrarlo
cargarProductos();
        }
  
      
    function cargarProductos(){      
        ActivarEditar();
//       alert();
          $.get('../back/controller/Producto_list.php',function(depa){   
         
          var mySelect=document.getElementById("Inputproducto");
          removeAllChildren(mySelect);
           mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
          depa = JSON.parse(depa);
         for (var i = 1 ; i < depa.length; i++) {
              mySelect.appendChild(createOPTION(depa[i].idprod,depa[i].prod_nombre));
            }  
          
        }); 
      }
      
    function mostrarDatosP(empresa){ 
        
//        alert(empresa);
        
        $.get('../back/controller/Producto_detalles.php', {'empresa': empresa}, function (depa) {     
              
          
          
                        depa = JSON.parse(depa);
                        
                        
                      
                        $("#Inputprodc_referencia").val(depa[1].idprod);
                        $("#Inputproduc_nombre").val(depa[1].prod_nombre);
                        $("#Inputprodc_descr").val(depa[1].prod_descripcion);
                        $("#Inputprecio_unitario").val(depa[1].prod_precio);
                        $("#Inputproct_stock").val(depa[1].prod_stock);
                        $("#Inputproc_dias").val(depa[1].foto);
                       
                    
                       
          
          
      
          
        }); 
      }
      
   
  
    </script>
    
    <script>
//   

    
    function registraraProducto3(){
      
      emp=document.getElementById("Inputnum_factu").value;
  
        var url1 = "../back/controller/produc_fact_insert.php";
        
    console.log($("#ProductInsert").serialize());
      
    //  echo jason_encode('error');
    
        $.ajax({                        
           type: "POST",                 
           url: url1,                     
           data: $("#ProductInsert").serialize(), 
       
                 
           success: function(data){

          Productos_Vender(emp);
             cargareTotal_Factura(emp);   
                     $('#myModal2').modal('hide');//cerrarlo

//           cargareTotal_Factura(emp);             
           }
       });
   
};



     function aceptarPersona(){
  

       swal({
                        title: "Registro",
                        text: "Registro Exitoso!",
                        type: "success",
                       // showCancelButton: true,
                        confirmButtonColor: "#1ab394",
                        confirmButtonText: "Ok",
                       // cancelButtonText: "No, cancel plx!",
                      //   closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                   Ventas_Registrar();
//                      Clientes_Listar();
                  
                        } 
                        else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
   
};


     function errorPersonaCampos(){
  

       swal({
                        title: "Error",
                        text: "Complete los Campos!",
                        type: "error",
                       // showCancelButton: true,
                        confirmButtonColor: "#dd6b55",
                        confirmButtonText: "Ok",
                       // cancelButtonText: "No, cancel plx!",
                      //   closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                          // alert('mySelect2'+mySelect2);
                        //  console.log("mySelect2");
                    //  Persona_Listar();
                     //  swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        } 
                        else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
   
};

  function errorPersonaInsert(){
  

       swal({
                        title: "Error",
                        text: "No se Pudo Registrar!",
                        type: "error",
                       // showCancelButton: true,
                        confirmButtonColor: "#dd6b55",
                        confirmButtonText: "Ok",
                       // cancelButtonText: "No, cancel plx!",
                      //   closeOnConfirm: false,
                        closeOnCancel: false },
                    function (isConfirm) {
                        if (isConfirm) {
                          // alert('mySelect2'+mySelect2);
                        //  console.log("mySelect2");
                    //  Persona_Listar();
                     //  swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        } 
                        else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
   
};



/* Sumar dos números. */
//function sumar (valor) {
//    var total = 0;	
//    valor = parseInt(valor); // Convertir el valor a un entero (número).
//	
//    total = document.getElementById('Inputprecio_total').innerHTML;
//	
//    // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
//    total = (total == null || total == undefined || total == "") ? 0 : total;
//	
//    /* Esta es la suma. */
//    total = (parseInt(total) + parseInt(valor));
//	
//    // Colocar el resultado de la suma en el control "span".
//    document.getElementById('Inputprecio_total').innerHTML = total;
//}

function multiplicar(){
    can=0;
    m1=0;
//   can=document.getElementById("Inputcantidad").value;  
   m1 = document.getElementById("Inputcanti").value;  
   
         
  m2 = document.getElementById("Inputprecio_unitario").value;
  r = m1*m2;
  document.getElementById("Inputprecio_total").value = r;
   
    

};
function Descuento(){
    can=0;
    m1=0;
//   can=document.getElementById("Inputcantidad").value;  
   m1 = document.getElementById("Inputprecio_total").value;  
   
         
  m2 = document.getElementById("descuento").value;
  r = m1-m2;
  document.getElementById("Inputprecio_total").value = r;
   
    

};




    function mostrarEliminar(empresa){    
           
//           alert(empresa);
        $.get('../back/controller/produc_fact_delete.php', {'empresa': empresa},function(depa){      
    
          depa = JSON.parse(depa);
          
            if(depa[1].result=='error'){
//                            alert('Exitoso');
                               emp=document.getElementById("Inputnum_factu").value;        
          Productos_Vender(emp);
           cargareTotal_Factura(emp);  
                        }
        }); 
        
      
        
        
        
      }
      
      
    function enviarFactura(){    
      var clienete=document.getElementById("Inputid").value;
      var total=document.getElementById("Inputtotal_fact").value;
      var correo=document.getElementById("Inputcorreo").value;
      var nombre=document.getElementById("Inputnombres").value;
      var enviar = clienete+"-"+total+"-"+correo+"-"+nombre;
      
      
//           alert(empresa);
        $.get('../back/controller/Factura_insert.php', {'enviar': enviar},function(depa){      
    
//          depa = JSON.parse(depa);
//           aceptarPersona();
//            if(depa[1].result=='error'){
////                            alert('Exitoso');
//                               emp=document.getElementById("Inputnum_factu").value;        
//          Productos_Vender(emp);
//           cargareTotal_Factura(emp);  
//                        }
        }); 
        
      
        
        
        
      }

</script>
<script>
     $(document).ready(function() {
//obtenemos el valor de los input


$('#adicionar').click(function() {
  var idref = document.getElementById("Inputprodc_referencia").value;
  var nombre = document.getElementById("Inputproduc_nombre").value;
  var descripcion = document.getElementById("Inputprodc_descr").value;
  var v_unit = document.getElementById("Inputprecio_unitario").value;
  var canti = document.getElementById("Inputcanti").value;
  var descuen = document.getElementById("Inputdescuento").value;
  var precio_total = document.getElementById("Inputprecio_total").value;
  var alquiler = document.getElementById("Inputproc_dias").value;
 
  var fila = '<tr id="row' + i + '">\n\
<td>' + idref + '</td><td>' + nombre + '</td><td>' + descripcion + '</td>\n\
<td>' + v_unit + '</td><td>' + canti + '</td><td>' + descuen + '</td><td>' + precio_total + '</td><td>' + alquiler + '</td>\n\
<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

  i++;

  $('#mytable tr:first').after(fila);
    $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
    var nFilas = $("#mytable tr").length;
    $("#adicionados").append(nFilas - 1);
    //le resto 1 para no contar la fila del header
    document.getElementById("Inputprodc_referencia").value ="";
    document.getElementById("Inputproduc_nombre").value = "";
    document.getElementById("Inputprodc_descr").value = "";
    document.getElementById("Inputprecio_unitario").value = "0";
    document.getElementById("Inputcanti").value = "0";
    document.getElementById("Inputprecio_total").value = "0";
    document.getElementById("Inputproc_dias").value = "0";
    document.getElementById("Inputproducto").value = "-1";
    document.getElementById("Inputproducto").focus();
  });
$(document).on('click', '.btn_remove', function() {
  var button_id = $(this).attr("id");
    //cuando da click obtenemos el id del boton
    $('#row' + button_id + '').remove(); //borra la fila
    //limpia el para que vuelva a contar las filas de la tabla
    $("#adicionados").text("");
    var nFilas = $("#mytable tr").length;
    $("#adicionados").append(nFilas - 1);
  });
});
</script>
    
<!-- function  enviarFactura(){
      clienete=document.getElementById("Inputid").value;
      total=document.getElementById("Inputid").value;
      
       $.get('../back/controller/Productos_Detalles.php', {'clienete': clienete},{'total': total} function (depa) {
           
//            depa = JSON.parse(depa);
          
//            $("#Inputnum_factura").val(depa[1].precio_total);//direccion
           aceptarPersona();
           
        }); 
 }
-->


</html>
