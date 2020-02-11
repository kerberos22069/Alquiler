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
                            <h1><b>Conductores</b></h1>

                        </div>
                        <div class="ibox-tools">

                            <!--     <button type="button" class="btn btn-primary" data-toggle="modal" 
                                         data-target="#myModal5" data-backdrop="static" data-keyboard="false">
                                          + Agregar
                                      </button>-->

                            <button type="button" class="btn btn-primary" onclick="Conductor_Registrar()">
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
                                         <th style=" color:#FFFFFF; background-color: #616161  !important">Cédula</th>
                                    
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Nombres y Apellidos</th>
                                           <th style=" color:#FFFFFF; background-color: #616161  !important">Telefono</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Direccion</th>

                                        <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-eye"></i></th>
                                        <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-eye"></i></th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-trash"></i></th>
                                      



                                    </tr>
                                </thead>
                                <tbody id="ChoferesList">

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
                    <h4 class="modal-title" style="color: black  ; text-shadow: 5px 5px 5px #aaa;">Detalles Conductor</h4>

                </div>
                <div class="modal-body"> <!-- Abrri Contenio-->
                    <div>
                        <div class="panel panel-default">
                            <!--        <div align=center class="panel-heading"><h3 class="panel-title">Registrar clientes</h3></div>-->
                            <div align=center class="panel-body">
                                         <form role="form" id="Chofer_Insert">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" style="display: none">
                                <label for="Inputcliente_nombre">Id </label>
                                <input type="text" name="idchoferes" class="form-control" id="Inputidcliente" placeholder="cliente_nombre">
                            </div>
                            
                            <div class="form-group">
                                <label for="Inputcliente_nombre">Nombres y Apellidos</label>
                                <input type="text" name="nom_chofer" class="form-control" id="Inputcliente_nombre" placeholder="cliente_nombre">
                            </div>
                            
                            <div class="form-group">
                                <label for="Inputcliente_cc">Cedula</label>
                                <input type="text" name="cc_chofer" class="form-control" id="Inputcliente_cc" placeholder="cliente_cc">
                            </div>

                        </div>
                        <div class="col-md-6">




                            <div class="form-group">
                                <label for="Inputcliente_direccion">Dirección</label>
                                <input type="text" name="direccion" class="form-control" id="Inputcliente_direccion" placeholder="cliente_direccion">
                            </div>
                            <div class="form-group">
                                <label for="Inputcliente_telefono">Teléfono</label>
                                <input type="text" name="chofe_telefono" class="form-control" id="Inputcliente_telefono" placeholder="cliente_telefono">
                            </div>
                            
                        </div>
                    </div>
             

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

 var Global_nom_Con;
 var Global_cc_Con;
 var Global_ID_Con;


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
        function mostrarEliminar(empresa) {

//alert(empresa);
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

                            $.get('../back/controller/Chofer_delete.php', {'empresa': empresa}, function (depa) {
                            });
//                            console.log('recargar');
                            
                            Conductor_list();
                           

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

        function AbrirRelacionViaje(idp,id2,id3) {

            // console.log(idp);
//            alert(""+idp+""+id2+""+id3);
            Global_nom_Con=id3;
            Global_cc_Con=id2;
            Global_ID_Con=idp;
//            cargarCliente(idp);
         relacion_pago_choferes();

        }


        function cargarCliente(empresa) {
//              console.log(empresa);
            //  document.getElementById("ClientesReset").reset();
            //  $("#ClientesReset").reset();

            $.get('../back/controller/Chofer_Detalles.php', {'empresa': empresa}, function (depa) {

                depa = JSON.parse(depa);

                $("#Inputidcliente").val(depa[1].idchoferes);
                $("#Inputcliente_nombre").val(depa[1].nom_chofer);
                
                $("#Inputcliente_cc").val(depa[1].cc_chofer);
                
                $("#Inputcliente_telefono").val(depa[1].chofe_telefono);
                $("#Inputcliente_direccion").val(depa[1].direccion);
               
                


            });
        }
    </script>

    <script>

        function Cliente_Actualizar() {

            var url1 = "../back/controller/Chofer_update.php";



            $.ajax({
                type: "POST",
                url: url1,
                data: $("#Chofer_Insert").serialize(),

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
                            Conductor_list();
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