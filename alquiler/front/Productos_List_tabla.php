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
                        <div style="text-align: center; color: white" >
                            <h1><b>Listado de Productos</b></h1>

                        </div>
                        <div class="ibox-tools">

                            <!--     <button type="button" class="btn btn-primary" data-toggle="modal" 
                                         data-target="#myModal5" data-backdrop="static" data-keyboard="false">
                                          + Agregar
                                      </button>-->

                            <button type="button" class="btn btn-primary" onclick="Productos_Registrar()">
                                + Agregar
                            </button>

                        </div>
                    </div>
                    
                    <div class="ibox-content">

                        <div class="table-responsive">
                           <table class="table table-striped table-bordered table-hover dataTables-example" >
                           <!-- <table class="table table-striped table-bordered table-hover dataTables-example" >-->
                                <thead>
                                    <tr>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Id</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Nombre</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Detalle</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Precio Alquiler</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Cant | Total</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Cant | stock</th>
                                     

                                        <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-eye"></i></th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-trash"></i></th>


                                    </tr>
                                </thead>
                                <tbody id="ProductosList_2">

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
                    <h4 class="modal-title" style="color: white  ; text-shadow: 5px 5px 5px #aaa;">Detalles Producto</h4>

                </div>
                <div class="modal-body"> <!-- Abrri Contenio-->
                    <div>
                        <div class="panel panel-default">
                            <!--        <div align=center class="panel-heading"><h3 class="panel-title">Registrar clientes</h3></div>-->
                            <div align=center class="panel-body">
                                <form role="form" id="Product_update_2">
                                   <div class="row">
                        <div class="col-lg-6">
                            
                            <div class="form-group">
                          <label for="Inputidprod">idalquiler</label>
                          <input type="text" name="idprod" class="form-control" id="Inputidprod" placeholder="idalquiler" required>
                       </div>
                            
                            <div class="form-group">
                          <label for="Inputprod_nombre">producto nombre</label>
                          <input type="text" name="prod_nombre" class="form-control" id="Inputprod_nombre" placeholder="prod_nombre">
                       </div>
                      <div class="form-group">
                          <label for="Inputprod_descripcion">producto descripcion</label>
                          <input type="text" name="prod_descripcion" class="form-control" id="Inputprod_descripcion" placeholder="prod_descripcion">
                       </div>
                      <div class="form-group">
                          <label for="Inputprod_precio">producto precio alquiler</label>
                          <input type="text" name="prod_precio" class="form-control" id="Inputprod_precio" placeholder="prod_precio" value="0">
                       </div>
                            
                    </div>



                        <div class="col-lg-6">
                          <div class="form-group">
                          <label for="Inputprod_stock">producto stock</label>
                          <input type="text" name="prod_stock" class="form-control" id="Inputprod_stock" placeholder="prod_stock" value="0">
                       </div>
                      <div class="form-group">
                          <label for="Inputprod_disponible">producto disponible</label>
                          <input type="text" name="prod_disponible" class="form-control" id="Inputprod_disponible" placeholder="prod_disponible" value="0">
                       </div>
                      <div class="form-group">
                          <label for="Inputprod_reparacion">producto reparacion</label>
                          <input type="text" name="prod_reparacion" class="form-control" id="Inputprod_reparacion" placeholder="prod_reparacion" value="0">
                       </div>
                      <div class="form-group">
                          <label for="Inputprod_danado">producto dañado</label>
                          <input type="text" name="prod_danado" class="form-control" id="Inputprod_danado" placeholder="prod_dañado" value="0">
                       </div>
                        </div>
                    </div>
                                </form>
                            </div> <!-- panel -->
                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="Productos_Actualizar()">Actualizar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
            
                </div>
            </div>
            <!-- finaliza modal de Empleado Registrar-->



            
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
                $(document).ready(function () {
                    $('.dataTables-example').DataTable({
                        language : {
                             "url": "js/Spanish.json"
                        },
                        pageLength: 25,
                        responsive: true,
                        dom: '<"html5buttons"B>lTfgitp',
                        buttons: [
                            {extend: 'copy'},
                            {extend: 'csv'},
                            {extend: 'excel', title: 'ExampleFile'},
                            {extend: 'pdf', title: 'ExampleFile'},

                            {extend: 'print',
                                customize: function (win) {
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

                function limpiarDataTable(clase) {
                    var table = $('.'+clase).DataTable();
                    table.clear().draw();
                }

                function mostrarTodo(idp) {

                    // console.log(idp);
                    cargarPrdoc(idp);
                    $('#myModalDetalles').addClass(' data-backdrop="static" data-keyboard="false"');
                    $('#myModalDetalles').modal({show: true});

                }

                function cargarPrdoc(empresa) {
                    //              console.log(empresa);
                    //  document.getElementById("ClientesReset").reset();
                    //  $("#ClientesReset").reset();

                    $.get('../back/controller/Producto_detalles.php', {'empresa': empresa}, function (depa) {

                        depa = JSON.parse(depa);


                        $("#Inputidprod").val(depa[1].idprod);
                        $("#Inputprod_nombre").val(depa[1].prod_nombre);
                        $("#Inputprod_descripcion").val(depa[1].prod_descripcion);
                        $("#Inputprod_precio").val(depa[1].prod_precio);
                        $("#Inputprod_stock").val(depa[1].prod_stock);
                        $("#Inputprod_disponible").val(depa[1].prod_alquilado);
                        $("#Inputprod_reparacion").val(depa[1].prod_reparacion);
                        $("#Inputprod_danado").val(depa[1].prod_danado);
                        $("#imgfoto").attr("src","../imagenes/"+depa[1].foto);
                        //$("#imgfoto").attr("src","");


                    });
                }
            </script>

            <script>
                                function mostrarEliminar(empresa) {
                                    limpiarDataTable("dataTables-example");
                                    swal({
                                        title: "Eliminar",
                                        text: "Desea Eliminar el Registro!",
                                        type: "success",
                                        showCancelButton: true,
                                        confirmButtonColor: "#dd4b39",
                                        confirmButtonText: "Ok",
                                        cancelButtonText: "No, cancel!",
                                        //   closeOnConfirm: false,
                                        closeOnCancel: false},
                                            function (isConfirm) {
                                                if (isConfirm) {
                                                    
                                                    $.get('../back/controller/Producto_delete.php', {'empresa': empresa}, function (depa) {
                                                    });
                                                    
                                                    Productos_Listar();

                                                } else {
                                                    swal("Cancelado", "Se ha cancelado la operación :)", "error");
                                                }
                                            });

                                }

            </script>
            <script>


                function Productos_Actualizar() {

                    var url1 = "../back/controller/Producto_update.php";

                   console.log($("#Product_update_2").serialize()) ;

                    $.ajax({
                        type: "POST",
                        url: url1,
                        data: $("#Product_update_2").serialize(),
                       

                        success: function (data) {

                            aceptarPersona();

                        }
                    });

                }
                ;

                function aceptarPersona() {
                    $('#myModalDetalles').modal('hide');

                    swal({
                        title: "Registro",
                        text: "Registro Exitoso!",
                        type: "success",
                        // showCancelButton: true,
                        confirmButtonColor: "#1ab394",
                        confirmButtonText: "Ok",
                        // cancelButtonText: "No, cancel plx!",
                        //   closeOnConfirm: false,
                        closeOnCancel: false},
                            function (isConfirm) {
                                if (isConfirm) {
                                    // alert('mySelect2'+mySelect2);
                                    //  console.log("mySelect2");
                                    Productos_Listar();
                                    //  swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                } else {
                                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                                }
                            });

                }
                ;


                function errorPersona() {


                    swal({
                        title: "Error",
                        text: "Complete los Campos!",
                        type: "error",
                        // showCancelButton: true,
                        confirmButtonColor: "#dd6b55",
                        confirmButtonText: "Ok",
                        // cancelButtonText: "No, cancel plx!",
                        //   closeOnConfirm: false,
                        closeOnCancel: false},
                            function (isConfirm) {
                                if (isConfirm) {
                                    // alert('mySelect2'+mySelect2);
                                    //  console.log("mySelect2");
                                    //  Persona_Listar();
                                    //  swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                } else {
                                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                                }
                            });

                }
                ;

                function errorPersonaInsert() {


                    swal({
                        title: "Error",
                        text: "No se Pudo Registrar!",
                        type: "error",
                        // showCancelButton: true,
                        confirmButtonColor: "#dd6b55",
                        confirmButtonText: "Ok",
                        // cancelButtonText: "No, cancel plx!",
                        //   closeOnConfirm: false,
                        closeOnCancel: false},
                            function (isConfirm) {
                                if (isConfirm) {
                                    // alert('mySelect2'+mySelect2);
                                    //  console.log("mySelect2");
                                    //  Persona_Listar();
                                    //  swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                } else {
                                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                                }
                            });

                }


            </script>

            <!-- That´s all folks! -->
            </html>