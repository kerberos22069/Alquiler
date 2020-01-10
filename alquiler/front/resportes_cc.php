<!DOCTYPE html>
<html>
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
        <!-- Sweet Alert -->
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    

    

    <div class="wrapper wrapper-content animated fadeInRight">
     
        <div class="row">
            <div class="col-lg-12">
                
                  <div class="ibox ">
                        <div  style="text-align: center; " class="ibox-title">
                            <h2><b>Devoluciones</b></h2>
           
                        </div>
                        <div class="ibox-content">
                            <form action="http://localhost/core_ca/back/controller/obtenerInformeCedula.php" method ="get">
                          
                                          <div class="form-group  row has-success">
                           <label class="col-sm-2 col-form-label"></label>
                             <label class="col-sm-2 col-form-label">Ingrese Cedula c: </label>
                       
                                    <div    class="col-sm-4"><input id="b_cedula"  name="cedula"  type="text" class="form-control"></div>
          
                                   
                                    <div class="col-sm-2">
                                        <button id="btnBuscar" type="button" class="btn btn-primary" onclick="Buscar_cc()" >
                                          + Buscar
                                      </button>
                                    </div>
                                    


                           <div class="col-sm-2">
                               <button onclick="javascript: repintar1();" id="btnExcel" type="submit" class="btn btn-primary" disabled="true" >
                                       Exportar Excel
                                      </button>
                                    </div>
                                   
                                    
                        <label class="col-sm-2 col-form-label"></label>            
                                </div> 
                          </form>
                        </div>
                    </div>
                
                
                <div class="ibox ">
                    
         
                     
  <div id="mostrarcontenido2">
                                

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
              
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                           <!-- <table class="table table-striped table-bordered table-hover dataTables-example" >-->
                                <thead>
                                    <tr>
                                       <th style=" color:#FFFFFF; background-color: #616161  !important">Id_Fact</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Cliente</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Fecha</th>
                                       

                                       
                                        <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-eye"></i></th>
                                        <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-edit"></i></th>
<!--                                        <th style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-trash"></i></th>-->

                                    </tr>
                                </thead>
                                <tbody id="FacturasList">
                                <tr class="gradeX footable-even" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>01</td>
                                    <td class="footable-visible">Pedro Perez
                                       
                                    </td>
                                    <td class="footable-visible">01/01/2020</td>
                                 
                                    <td class="footable-visible footable-last-column"><a onclick="modalProductos_Alq()"><i class="fa fa-check text-navy"></i></a></td>
                                    <td class="footable-visible footable-last-column"><a onclick="" class="fa fa-check text-navy"></i></a></td>
                                   
<!--                                    <td class="center footable-visible footable-last-column">X</td>-->
                                </tr>    

                                </tbody>

                            </table>
                        </div>

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

                      <!--<div class="row">-->
    <!--<div class="col-lg-6">-->
                                         
    <div class="row">
        <div class="col-sm-6">
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
        
                      <div class="col-lg-3">
                                          <div class="form-group">
                          <label for="Inputproct_stock">Alquilado</label>
                          <input type="text" name="proct_stock" class="form-control" id="Inputproct_stock" placeholder="Telefono contacto" required>
                       </div>       
                                            
                      
                                        </div>
      
    </div>

                          
                
                                            
                                            <div class="form-group" style="display: none">
                          <label for="Inputprodc_referencia">N# Ref </label>
                          <input type="text" name="prodc_referencia" class="form-control" id="Inputprodc_referencia" placeholder="referencia" required>
                       </div>
                     
<!--                                  </div>-->
                          
                          
                          
                          
                          
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
        
        
    </div>
    
    
    


    
 <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
    
      
<script src="js/plugins/steps/jquery.steps.min.js"></script>
<!-- Jquery Validate -->
<script src="js/plugins/validate/jquery.validate.min.js"></script>
<script src="js/Ajax.js "></script>
<script src="js/ViewManager.js "></script>
<script src="js/HtmlBuilder.js "></script>


    <!-- Sweet alert -->
    <script src="js/plugins/sweetalert/sweetalert.min.js"></script>



    <!-- Page-Level Scripts -->
    <script>
        

$(document).ready(function(){
   document.getElementById("b_cedula").focus();
});
     
      function modalProductos_Alq(){
//               $('#myModalDetalles').addClass(' data-backdrop="static" data-keyboard="false"');
             $('#myModal2').modal({show: true});
//               $('#myModal2').modal('hide');//cerrarlo
cargarProductos_factura();
        }
       function Buscar_cc(){
           
                
      empr=document.getElementById("b_cedula").value;   
      
      
      
       if(empr==="" ){
     
       document.getElementById("b_cedula").style.borderColor = "#f56954";
        document.getElementById("b_cedula").focus();
        alert("Debe Escribir  una Cedula");
         return ;
 } else{
                    
    // console.log("jaja"+empr);
   Buscar_cc_tabla(empr);
        // empresa=$adasd;
      document.getElementById('btnBuscar').disabled=true;
      document.getElementById('btnExcel').disabled=false;                          
        }                
         
            
                     
  } 
    
    
    
  

     function aceptar_r(){
       $('#myModal_R').modal('hide');
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
                               empresa_Listar_P();
                           // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        } 
                        else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                        }
                    });
   
};

function descargarInfomeCedula(){
    dato1=document.getElementById("b_cedula").value; 
    
    alert(dato1);
   $.ajax({
            url: 'http://localhost/core_ca/back/controller/obtenerInformeCedula.php',
            data: { 'cedula' : dato1},
            type: "GET",
          
        });
}


</script>
<script>
            function repintar1(){
    
//document.getElementById("b_cedula").value = "";
//document.getElementById('btnBuscar').disabled=false;
//document.getElementById('btnExcel').disabled=true;   

  Reporte_cc();

}
</script>

    
    


    <!-- That´s all folks! -->

       </html>