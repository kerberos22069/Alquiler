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
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Unidad de medida</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">codigo interno</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Cantidad en stock</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Marca</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Precio de Compra</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Precio de Venta</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Dias de Garantia</th>

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
                    <h4 class="modal-title" style="color: black  ; text-shadow: 5px 5px 5px #aaa;">Detalles Producto</h4>

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
                                                <br>
                                                <label for="Inputnombres">nombre</label>
                                                <input type="text" name="nombre" class="form-control" id="Inputnombres" placeholder="nombres">
                                            </div>
                                            <div class="form-group">
                                                <label for="Inputunidmedida">Unidad de Medida</label>
                                                <input type="text" name="unidad_medida" class="form-control" id="Inputunidmedida" placeholder="unidad de medida">
                                            </div>
                                            <div class="form-group">
                                                <label for="Inputcodigo">Codigo Interno</label>
                                                <input type="text" name="codigo_interno" class="form-control" id="Inputcodigo" placeholder="Codigo Interno">
                                            </div>
                                            <div class="form-group">
                                                <label for="Inputgarantia">Dias de Garantia</label>
                                                <input type="text" name="dias_garantia" class="form-control" id="Inputgarantia" placeholder="Dias de Garantia">
                                            </div>

                                            <div class="form-group">
                                                <label for="Inputcantidad">Cantidad en Stock</label>
                                                <input type="text" name="cantidad_en_stock" class="form-control" id="Inputcantidad" placeholder="Cantidad en Stock">
                                            </div>
                                        </div>


                                        <div class="col-lg-6">
                                            <div align=center class="panel-body" style="background-color: gainsboro ; box-shadow: 0.5px 0.5px 0.5px 0.5px #999;">
                                                <br>
                                                <br>
                                                <span>
                                                    <img alt="image" id="imgfoto" class="img" src="" width="40%" height="85%"/>
                                                </span>
                                            </div>

                                            <div class="form-group">
                                                <label for="Inputmarca">Marca</label>
                                                <input type="text" name="marca" class="form-control" id="Inputmarca" placeholder="Marca">
                                            </div>
                                            <div class="form-group">
                                                <label for="Inputprecompra">Precio Compra</label>
                                                <input type="text" name="precio_compra" class="form-control" id="Inputprecompra" placeholder="Precio Compra">
                                            </div>
                                            <div class="form-group">
                                                <label for="Inputpreventa">Precio Venta</label>
                                                <input type="text" name="precio_venta" class="form-control" id="Inputpreventa" placeholder="Precio Venta">
                                            </div>

                                            <div style="display: none" class="form-group">
                                                <label for="Inputid_servicio">id_servicio_id</label>
                                                <input type="text" name="id_servicio" class="form-control" id="Inputid_servicio" placeholder="Precio Venta" readonly>
                                            </div>

                                            <div style="display: none" class="form-group">
                                                <label for="Inputid_proveedor">id_proveedor_id</label>
                                                <input type="text" name="id_proveedor" class="form-control" id="Inputid_proveedor" placeholder="Precio Venta" readonly>
                                            </div>

                                            <div style="display: none" class="form-group">
                                                <label for="Inputid_producto">id_productos_id</label>
                                                <input type="text" name="id" class="form-control" id="Inputid_producto" placeholder="Precio Venta" readonly>
                                            </div>

                                        </div>

                                    </div><!-- panel-body -->
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
                $(document).ready(function () {




                    $('.dataTables-example').DataTable({
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
                function mostrarTodo(idp) {

                    // console.log(idp);
                    cargarCliente(idp);
                    $('#myModalDetalles').addClass(' data-backdrop="static" data-keyboard="false"');
                    $('#myModalDetalles').modal({show: true});

                }

                function cargarCliente(empresa) {
                    //              console.log(empresa);
                    //  document.getElementById("ClientesReset").reset();
                    //  $("#ClientesReset").reset();

                    $.get('../back/controller/Productos_Detalles.php', {'empresa': empresa}, function (depa) {

                        depa = JSON.parse(depa);


                        $("#Inputnombres").val(depa[1].nombre);
                        $("#Inputunidmedida").val(depa[1].unidad_medida);
                        $("#Inputcodigo").val(depa[1].codigo_interno);
                        $("#Inputcantidad").val(depa[1].cantidad_en_stock);
                        $("#Inputmarca").val(depa[1].marca);
                        $("#Inputgarantia").val(depa[1].dias_garantia);
                        $("#Inputprecompra").val(depa[1].precio_compra);
                        $("#Inputpreventa").val(depa[1].precio_venta);
                        $("#Inputid_servicio").val(depa[1].id_servicio_id);
                        $("#Inputid_proveedor").val(depa[1].id_proveedor_id);
                        $("#Inputid_producto").val(depa[1].id);
                        $("#imgfoto").attr("src","../imagenes/"+depa[1].codigo_interno+".png");
                        //$("#imgfoto").attr("src","");


                    });
                }
            </script>

            <script>
                                function mostrarEliminar(empresa) {

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
                                                    $.get('../back/controller/Productos_Eliminar.php', {'empresa': empresa}, function (depa) {
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

                    var url1 = "../back/controller/Productos_Update.php";

                    $("#ClientesReset").serialize();

                    $.ajax({
                        type: "POST",
                        url: url1,
                        data: $("#ClientesReset").serialize(),

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