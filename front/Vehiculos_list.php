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
                            <h1><b>Listado de Vehiculos</b></h1>

                        </div>
                        <div class="ibox-tools">

                            <!--     <button type="button" class="btn btn-primary" data-toggle="modal" 
                                         data-target="#myModal5" data-backdrop="static" data-keyboard="false">
                                          + Agregar
                                      </button>-->

                            <button type="button" class="btn btn-primary" onclick="Vehiculo_Registrar()">
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
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Marca</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Placa</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Kilometraje</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">año</th>


                                        <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-eye"></i></th>
                                <!--    <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-edit"></i></th>  -->
                                        <th style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-trash"></i></th>


                                    </tr>
                                </thead>
                                <tbody id="VehiculosList">

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
                    <h4 class="modal-title" style="color: black  ; text-shadow: 5px 5px 5px #aaa;">Actualizar Vehiculo</h4>

                </div>
                <div class="modal-body"> <!-- Abrri Contenio-->
                    <div>
                        <div class="panel panel-default">
                            <!--        <div align=center class="panel-heading"><h3 class="panel-title">Registrar clientes</h3></div>-->
                            <div align=center class="panel-body">
                                <form role="form" id="VehiculoUpdate">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Inputmarca">Marca</label>
                                                <input type="text" name="marca" class="form-control" id="Inputmarca" placeholder="Marca" >
                                            </div>
                                            <div class="form-group">
                                                <label for="Inputplaca">Placa</label>
                                                <input type="text" name="placa" class="form-control" id="Inputplaca" placeholder="Placa" >
                                            </div>

                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="Inputkilometraje">Kilometraje</label>
                                                <input type="text" name="kilometraje" class="form-control" id="Inputkilometraje" placeholder="Kilometraje" >
                                            </div>
                                            <div class="form-group">
                                                <label for="Inputanio">Año</label>
                                                <input type="text" name="anio" class="form-control" id="Inputanio" placeholder="Año" >
                                            </div>

                                            <div style="display: none" class="form-group">
                                                <label for="Inputid_cliente">id_cliente</label>
                                                <input type="text" name="id_cliente" class="form-control" id="Inputid_cliente" readonly>
                                            </div>

                                            <div style="display: none" class="form-group">
                                                <label for="Inputid">id_vehiculo</label>
                                                <input type="text" name="id" class="form-control" id="Inputid" readonly>
                                            </div>

                                        </div>

                                    </div><!-- panel-body -->
                                </form>
                            </div> <!-- panel -->
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="Vehiculos_Actualizar()">Actualizar</button>
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

            <script>
                function mostrarEliminar(idp) {
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
                                    $.get('../back/controller/Vehiculos_eliminar.php', {'idp': idp}, function (depa) {
                                    });
                                    Vehiculo_Listar();

                                } else {
                                    swal("Cancelado", "Se ha cancelado la operación :)", "error");
                                }
                            });


                }
            </script>

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

                    $.get('../back/controller/Vehiculos_Detalles.php', {'empresa': empresa}, function (depa) {

                        depa = JSON.parse(depa);

                        $("#Inputid").val(depa[1].id);
                        $("#Inputmarca").val(depa[1].marca);
                        $("#Inputplaca").val(depa[1].placa);
                        $("#Inputkilometraje").val(depa[1].kilometraje);
                        $("#Inputanio").val(depa[1].anio);
                        $("#Inputid_cliente").val(depa[1].id_cliente_id);



                    });
                }

            </script>

            <script>


                function Vehiculos_Actualizar() {

                    var url1 = "../back/controller/Vehiculo_Update.php";

                    $("#VehiculoUpdate").serialize();

                    $.ajax({
                        type: "POST",
                        url: url1,
                        data: $("#VehiculoUpdate").serialize(),

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
                                    Vehiculo_Listar();
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