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
                            <h1><b>Listado de Facturas</b></h1>

                        </div>
                        <div class="ibox-tools">

                            <!--     <button type="button" class="btn btn-primary" data-toggle="modal" 
                                         data-target="#myModal5" data-backdrop="static" data-keyboard="false">
                                          + Agregar
                                      </button>-->

                            <button type="button" class="btn btn-primary" onclick="Clientes_Registrar()">
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
                                       <th style=" color:#FFFFFF; background-color: #616161  !important">Id_Fact</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Cliente</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Fecha</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Valor</th>

                                       
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
                                    <td class="center footable-visible">80000</td>
                                    <td class="footable-visible footable-last-column"><a onclick="mostrar_Productos_d()"><i class="fa fa-check text-navy"></i></a></td>
                                    <td class="footable-visible footable-last-column"><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                   
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

 
    
    
    <!-- Modal ddetalles del alquiler -->
    <div class="modal  inmodal fade" id="myModalDetalles" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg mdialTamanio">
            <div id="menumodal1" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <h4 class="modal-title" style="color: white  ; text-shadow: 5px 5px 5px #aaa;">Detalles Productos</h4>

                </div>
                <div class="modal-body"> <!-- Abrri Contenio-->
                    <div>
                        <div class="panel panel-default">
                            <!--        <div align=center class="panel-heading"><h3 class="panel-title">Registrar clientes</h3></div>-->
                            <div align=center class="panel-body">
                           
                                        <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped" >
                           <!-- <table class="table table-striped table-bordered table-hover dataTables-example" >-->
                                <thead>
                                    <tr>
                                                             
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">#</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Nombre</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Descripcion</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Cantidad</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Precio</th>

                                       
                                      

                                    </tr>
                                </thead>
                                <tbody id="FacturasList">
                                <tr class="gradeX footable-even" style="">
                                    <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>01</td>
                                    <td class="footable-visible">Taladro
                                       
                                    </td>
                                    <td class="footable-visible">42"</td>
                                    <td class="center footable-visible">2</td>
                                    <td class="center footable-visible">12000</td>
                                   
<!--                                    <td class="center footable-visible footable-last-column">X</td>-->
                                </tr>    

                                </tbody>

                            </table>
                        </div>

                    </div>
                                
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

                            $.get('../back/controller/Clientes_Eliminar.php', {'empresa': empresa}, function (depa) {
                            });
                            Clientes_Listar();

                        } else {
                            swal("Cancelado", "Se ha cancelado la operación :)", "error");
                        }
                    });

        }

    </script>

    <script>
        function mostrar_Productos_d(idp) {

            // console.log(idp);
            cargarCliente(idp);
            $('#myModalDetalles').addClass(' data-backdrop="static" data-keyboard="false"');
            $('#myModalDetalles').modal({show: true});

        }


        function cargarCliente(empresa) {
//              console.log(empresa);
            //  document.getElementById("ClientesReset").reset();
            //  $("#ClientesReset").reset();

            $.get('../back/controller/Clientes_Detalles.php', {'empresa': empresa}, function (depa) {

                depa = JSON.parse(depa);


                $("#Inputnombres").val(depa[1].nombres);
                $("#Inputapellidos").val(depa[1].apellidos);
                $("#Inputcedula").val(depa[1].cedula);
                $("#Inputcorreo").val(depa[1].correo);
                $("#Inputtelefono").val(depa[1].telefono);
                $("#Inputedad").val(depa[1].edad);
                $("#Inputfecha_nacimiento").val(depa[1].fecha_nacimiento);
                $("#Inputid").val(depa[1].id);


            });
        }
    </script>

    <script>

        function Cliente_Actualizar() {

            var url1 = "../back/controller/Clientes_Update.php";

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