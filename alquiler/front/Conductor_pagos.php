
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title"> 
                        <div style="text-align: center; color: white" >
                            <h1><b>Relacion de Viajes</b></h1>

                        </div>
                        
                    </div>                      
                    <div class="ibox-content">
                        
                        <input style="display: none" type="text" id="InputId_orden" name="Id_orden" class="form-control" >
                        <div class="row">
                        
                        <div class="col-lg-6">
                            
                               
                              
                                
                        <div class=" row ">
                            <label style="text-align: left" class="col-sm-4 col-form-label"><b>Nombre y Apellidos :</b></label>

                            <div class="col-sm-8 p-xs " >
                                <input  type="text" id="Inputnombres_orden" name="nombres_orden" class="form-control" readonly></div>
                        </div>



                               </div>
                           
                       
                        
                        <div class="col-lg-6">
                            

                        <div class="  row">
                            <label class="col-sm-4 col-form-label"><b>Cedula :</b></label>

                            <div class="col-sm-8 p-xs "><input  type="text" id="Inputcc_orden" name="cc_orden" class="form-control" readonly></div>
                        </div>
                        </div>
  
                      </div>
                          <hr>
                        <div class="row">
                              <div class="col-lg-12">
                            <div class="form-group row has-success">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    
                                    <div class=" row ">
                            <label style="text-align: left" class="col-sm-4 col-form-label"><b>Desde:</b></label>

                            <div class="col-sm-8 p-xs " >
                                 <input id="Imputfecha_inicio_tran" name="fecha_inicio_tran" type="date" class="form-control">
                                </div>
                                    
                                 
                                </div>
                                                              
                                    
                                </div>
                                
                                <div class="col-sm-4" >
                                      <div class=" row ">
                            <label style="text-align: left" class="col-sm-4 col-form-label"><b>Hasta:</b></label>

                            <div class="col-sm-8 p-xs " >
                                 <input id="Imputfecha_fin_tran" name="fecha_fin_tran" type="date" class="form-control">
                                </div>
                                    
                                 
                                </div>
                                </div>
                               

                                <div class="col-sm-2" >
                                    <button type="button" class="btn btn-primary" onclick="relacion_viajes()" >
                                        Buscar por fecha
                                    </button>
                                </div>
                                 <div class="col-sm-1"></div>
                            </div>
                            <hr>
                        </div>
                        </div>
                        <hr>
                        
                        <div id="mostrarcontenido2">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    
    
    <!-- Modal ddetalles del alquiler -->

   
    <!-- finaliza modal de Empleado Registrar-->
    
    <!-- Modal ddetalles del abonos -->
    <div class="modal inmodal fade" id="myModalAbonos" tabindex="-1" role="dialog"  aria-hidden="true"  style="overflow-y: scroll;"> 
        <div class="modal-dialog modal-lg mdialTamanio">
            <div id="menumodal1" class="modal-content">
                <div class="modal-header">
                    <button type="button" id="cerrarAbonos" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <h4 class="modal-title" style="color: white  ; text-shadow: 5px 5px 5px #aaa;">Abonos</h4>

                </div>
                <div class="modal-body"> <!-- Abrri Contenio-->
                    <div>
                        <div class="panel panel-default">
                            <!--        <div align=center class="panel-heading"><h3 class="panel-title">Registrar clientes</h3></div>-->
                            <div align=center class="panel-body">
                           
                              <div class="ibox-content">
                                  <table class="table table-striped">
                                      <thead><th style=" color:#FFFFFF; background-color: #616161  !important">Detalles de abonos</th></thead>
                                      <tbody id="txt_abonos_detalles"></tbody>
                                  </table>
                                  <h3><label id="txt_abonos_total"><b>Total:</b></label>
                                  <br>
                                  <label id="txt_abonos_abonado"><b>Abonado:</b></label>
                                  <br>
                                  <label id="txt_abonos_faltante">Faltante:</label></h3>
                                  <hr>
                                  <input id="input_abonos" />
                                  <button id="btn_abonos_abonar" class="btn btn-primary"> Abonar</button>
                              </div>
                                
                            </div> <!-- panel -->
                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- finaliza modal de abonos-->


<!-- Modal Devolver parcial -->
    
    <!-- finaliza modal de Empleado Registrar-->

    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>


    <script src="js/plugins/steps/jquery.steps.min.js"></script>
    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>
    <script src="js/Ajax.js "></script>
    <script src="js/ViewManager.js "></script>
    <script src="js/HtmlBuilder.js "></script>
    
    <script src ="js/reportesController.js"></script>

    <!-- Sweet alert -->
    <script src="js/plugins/sweetalert/sweetalert.min.js"></script>


    <!-- Page-Level Scripts -->
    <script>

        $(document).ready(function () {

        document.getElementById('Inputnombres_orden').value=Global_nom_Con;
        document.getElementById('InputId_orden').value=Global_ID_Con;
        document.getElementById('Inputcc_orden').value=Global_cc_Con;

        
        /**
         * Metemos las fechas por default
         *
         **/

        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0,10);
        });

        $('#fecha_inicio').val(new Date().toDateInputValue());
        $('#fecha_fin').val(new Date().toDateInputValue());


        });




        function seleccionarTabla() {

            if ( $.fn.dataTable.isDataTable( '#tabla_facturas' ) ) {
                table = $('#tabla_facturas').DataTable();
            }
            else {
                table =  $('#tabla_facturas').DataTable({
                    pageLength: 25,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    order: [[ 2, 'des' ]],
                    buttons: [
                        {extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'Reporte de alquileres'},
                        {extend: 'pdf', title: 'Reporte de alquileres'},

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
            }
            
           
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

        };
        
   function relacion_viajes() {

    var Id_chofer= document.getElementById('InputId_orden').value;
    var fecha_ini_tra= document.getElementById('Imputfecha_inicio_tran').value;
    var fecha_fin_tra= document.getElementById('Imputfecha_fin_tran').value;

 transpore_pagos(Id_chofer,fecha_ini_tra,fecha_fin_tra);

    
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
        
        function abrirImpresion(idFactura){
            window.open('imprimir.html?factura_id='+idFactura+'');
        }
        
        function abrirImpresionOrdenDevolucion(idFactura){
            window.open('ordenDevolucion.html?factura_id='+idFactura+'');
        }
        
        //Fue un lindo sueño, pero, por pragmatismo, voy a hacer la facil y reconsultar ese berguero :"3
        function json2url(obj,url=""){
            for (key in obj) {
                item = obj[key];
                //console.log(key, value, value instanceof Object);
                if(item instanceof Object){
                    console.log(item);
                    url += json2url(item); //una función recursiva e iterativa jajaja k craisy
                }else{
                    console.log(item);
                    url += new URLSearchParams(item).toString();
                }
            }
            return url;
        }

        function runScript(e) {
    //See notes about 'which' and 'key'
    if (e.keyCode == 13) {
        buscar_factura_by_cliente();
    }
}
    </script>
    
    <!-- That´s all folks! --