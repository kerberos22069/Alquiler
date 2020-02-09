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
                            <h1><b>Ordenes de Salida</b></h1>

                        </div>
                        <div class="ibox-tools">

                            <!--     <button type="button" class="btn btn-primary" data-toggle="modal" 
                                         data-target="#myModal5" data-backdrop="static" data-keyboard="false">
                                          + Agregar
                                      </button>-->

                            <button type="button" class="btn btn-primary" onclick="Salida_Registrar()">
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
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Nombres y Apellidos</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Cédula</th>

                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Correo</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Telefono</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Devolucion</th>

                                        <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-eye"></i></th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-trash"></i></th>



                                    </tr>
                                </thead>
                                <tbody id="ClienteList">

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
                                <form role="form" id="clienteUp">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div style="display: none"class="form-group">
                          <label for="Inputidcliente">idcliente</label>
                          <input type="text" name="idcliente" class="form-control" id="Inputidcliente" placeholder="idcliente" required>
                       </div>
                      <div class="form-group">
                          <label for="Inputcliente_nombre">cliente_nombre</label>
                          <input type="text" name="cliente_nombre" class="form-control" id="Inputcliente_nombre" placeholder="cliente_nombre">
                       </div>
                      <div class="form-group">
                          <label for="Inputcliente_apellido">cliente_apellido</label>
                          <input type="text" name="cliente_apellido" class="form-control" id="Inputcliente_apellido" placeholder="cliente_apellido">
                       </div>
                                                                   <div class="form-group">
                          <label for="Inputcliente_correo">cliente_correo</label>
                          <input type="text" name="cliente_correo" class="form-control" id="Inputcliente_correo" placeholder="cliente_correo">
                       </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                  <div class="form-group">
                          <label for="Inputcliente_cc">cliente_cc</label>
                          <input type="text" name="cliente_cc" class="form-control" id="Inputcliente_cc" placeholder="cliente_cc">
                       </div>
                      <div class="form-group">
                          <label for="Inputcliente_telefono">cliente_telefono</label>
                          <input type="text" name="cliente_telefono" class="form-control" id="Inputcliente_telefono" placeholder="cliente_telefono">
                       </div>
                      <div class="form-group">
                          <label for="Inputcliente_direccion">cliente_direccion</label>
                          <input type="text" name="cliente_direccion" class="form-control" id="Inputcliente_direccion" placeholder="cliente_direccion">
                       </div>
                                        </div>

                                


                                    </div><!-- panel-body -->
                                </form>
                            </div> <!-- panel -->
                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="Cliente_Actualizar()">Actualizar</button>
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

                            $.get('../back/controller/Cliente_delete.php', {'empresa': empresa}, function (depa) {
                            });
                            console.log('recargar');
                            Clientes_Listar();

                        } else {
                            swal("Cancelado", "Se ha cancelado la operación :)", "error");
                        }
                    });

        }

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

            $.get('../back/controller/Cliente_Detalles.php', {'empresa': empresa}, function (depa) {

                depa = JSON.parse(depa);

                $("#Inputidcliente").val(depa[1].idcliente);
                $("#Inputcliente_nombre").val(depa[1].cliente_nombre);
                $("#Inputcliente_apellido").val(depa[1].cliente_apellido);
                $("#Inputcliente_cc").val(depa[1].cliente_cc);
                $("#Inputcliente_correo").val(depa[1].cliente_correo);
                $("#Inputcliente_telefono").val(depa[1].cliente_telefono);
                $("#Inputcliente_direccion").val(depa[1].cliente_direccion);
               
                


            });
        }
    </script>

    <script>

        function Cliente_Actualizar() {

            var url1 = "../back/controller/Cliente_update.php";

            $("#ClienteUpdate").serialize();

            $.ajax({
                type: "POST",
                url: url1,
                data: $("#clienteUp").serialize(),

                success: function (data) {

                    aceptarPersona();
                    
                }
            });

        };

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
                            Clientes_Listar();
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