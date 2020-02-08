<!DOCTYPE html>
<html>
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
        <!-- Sweet Alert -->
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    

    

    <div class="wrapper wrapper-content animated fadeInRight">
     
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title"> 
                         <div style="text-align: center; color: black" >
            <h1><b>Listado de Administradores</b></h1>
                        
                        </div>
                        <div class="ibox-tools">

                            <!--     <button type="button" class="btn btn-primary" data-toggle="modal" 
                                         data-target="#myModal5" data-backdrop="static" data-keyboard="false">
                                          + Agregar
                                      </button>-->

                            <button type="button" class="btn btn-primary" onclick="Administrador_Registrar()">
                                + Agregar
                            </button>

                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped" >
                           <!-- <table class="table table-striped table-bordered table-hover dataTables-example" >-->
                                <thead>
                                    <tr>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Id</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">nombres y apellidos</th>
                                       <th style=" color:#FFFFFF; background-color: #616161  !important">cedula</th>
                                       <th style=" color:#FFFFFF; background-color: #616161  !important">correo</th>
                                       <th style=" color:#FFFFFF; background-color: #616161  !important">telefono</th>
                                       <th style=" color:#FFFFFF; background-color: #616161  !important">descripcion</th>
                                      
                                       <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-eye"></i></th>
                                        <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-edit"></i></th>
                                <!--        <th style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-trash"></i></th>-->
                                      
                                      
                                    </tr>
                                </thead>
                                <tbody id="AdministradorsList">

                                </tbody>
                   
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de Registrar Empleado -->
       <div class="modal  inmodal fade" id="myModalDetalles" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg mdialTamanio">
                                    <div id="menumodal1" class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                                            <h4 class="modal-title" style="color: black  ; text-shadow: 5px 5px 5px #aaa;">Detalles Cliente</h4>
                                           
                                        </div>
                                        <div class="modal-body"> <!-- Abrri Contenio-->
                                          <div>
          <div class="panel panel-default">
      <!--        <div align=center class="panel-heading"><h3 class="panel-title">Registrar clientes</h3></div>-->
              <div align=center class="panel-body">
                  <form role="form" id="ClientesReset">
                       <div class="row">
                           <div class="col-lg-6">
                                 <div class="form-group">
                          <label for="Inputnombres">nombres</label>
                          <input type="text" name="nombres" class="form-control" id="Inputnombres" placeholder="nombres" readonly>
                       </div>
                      <div class="form-group">
                          <label for="Inputapellidos">apellidos</label>
                          <input type="text" name="apellidos" class="form-control" id="Inputapellidos" placeholder="apellidos" readonly>
                       </div>
                      <div class="form-group">
                          <label for="Inputcedula">cedula</label>
                          <input type="text" name="cedula" class="form-control" id="Inputcedula" placeholder="cedula" readonly>
                       </div>
                           </div>
                           <div class="col-lg-6">
                                           <div class="form-group">
                          <label for="Inputcorreo">correo</label>
                          <input type="text" name="correo" class="form-control" id="Inputcorreo" placeholder="correo" readonly>
                       </div>
                      <div class="form-group">
                          <label for="Inputtelefono">telefono</label>
                          <input type="text" name="telefono" class="form-control" id="Inputtelefono" placeholder="telefono" readonly>
                       </div>
                      <div class="form-group">
                          <label for="Inputdescripcion">descripcion</label>
                          <input type="text" name="descripcion" class="form-control" id="Inputdescripcion" placeholder="descripcion" readonly>
                       </div>
                           </div>
                           
                    
                           <div style="display: none" class="form-group">
                          <label for="Inputedad">edad</label>
                          <input type="text" name="edad" class="form-control" id="Inputedad" placeholder="edad">
                       </div>
          
          
                  
               </div><!-- panel-body -->
              </form>
          </div> <!-- panel -->
      </div>
       
                                 
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
    <!-- finaliza modal de Empleado Registrar-->
    
    
    
<!-- Modal de Expedicion -->
<div class="modal fade" id="expedicionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <select disabled  id="departamentos" onchange="cargarCiudades(this.value);">
          <option value="-1">Seleccionar</option>
        </select>
         <select disabled  id="ciudades" onchange="cargarContenido();">
          <option value="-1">Seleccionar</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            
       
            
            
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
    <script>
        function mostrarTodo(idp) {
     
               // console.log(idp);
                cargarAdministrador(idp);
               $('#myModalDetalles').addClass(' data-backdrop="static" data-keyboard="false"');
               $('#myModalDetalles').modal({show: true});
               
        }
        
          function cargarAdministrador(empresa){  
//              console.log(empresa);
                 //  document.getElementById("ClientesReset").reset();
        //  $("#ClientesReset").reset();
        
        $.get('../back/controller/Admin_list.php',{'empresa':empresa},function(depa){      
            
           depa = JSON.parse(depa);
  
           
             $("#Inputnombres").val(depa[1].nombres);
              $("#Inputapellidos").val(depa[1].apellidos);
              $("#Inputcedula").val(depa[1].cedula);
              $("#Inputcorreo").val(depa[1].correo);
              $("#Inputtelefono").val(depa[1].telefono);
              $("#Inputdescripcion").val(depa[1].descripcion);
          
 
        }); 
      }
    </script>














    <!-- That´s all folks! -->
</html>