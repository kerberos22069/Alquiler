
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
<!--                    <div class="ibox-title"> 
                        <div style="text-align: center; color: white" >
                            <h1><b>Facturas</b></h1>

                        </div>
                        
                    </div>                      -->
                    <div class="ibox-content">
                        <div class="row">
                         <div class="col-lg-12">
                            <div class="form-group row has-success">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    
                                    <div class=" row ">
                            <label style="text-align: left" class="col-sm-4 col-form-label"><b>Desde:</b></label>

                            <div class="col-sm-8 p-xs " >
                                 <input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control">
                                </div>
                                    
                                 
                                </div>
                                                              
                                    
                                </div>
                                
                                <div class="col-sm-4" >
                                      <div class=" row ">
                            <label style="text-align: left" class="col-sm-4 col-form-label"><b>Hasta:</b></label>

                            <div class="col-sm-8 p-xs " >
                                 <input id="fecha_fin" name="fecha_fin" type="date" class="form-control">
                                </div>
                                    
                                 
                                </div>
                                </div>
                               

                                <div class="col-sm-2" >
                                    <button type="button" class="btn btn-primary" onclick="buscar_factura_by_fecha()" >
                                        Buscar por fecha
                                    </button>
                                </div>
                                 <div class="col-sm-1"></div>
                            </div>
                            <hr>
                        </div>
                     <div class="col-lg-12">
                            <div class="form-group row has-success">
                                <label class="col-sm-2 col-form-label">
                                    
                                </label>
                                <label class="col-sm-2 col-form-label">
                                    Cédula:
                                </label>
                                <div class="col-sm-4">
                                    <input id="cliente_cedula" name="cliente_cedula" class="form-control" onkeypress="return runScript(event)">
                                </div>                    
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary" onclick="buscar_factura_by_cliente()" >
                                        Buscar por cliente.
                                    </button>
                                </div>
                                <div class="col-sm-2">
                                    
                                </div>
                            </div>
                        </div>
                      </div>
                        <hr>
                        <div class="table-responsive">
                            <table id="tabla_facturas" class="table table-striped table-bordered table-hover dataTables-example" >
                           <!-- <table class="table table-striped table-bordered table-hover dataTables-example" >-->
                                <thead>
                                    <tr>
                                       <th style=" color:#FFFFFF; background-color: #616161  !important">#Factura</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Cliente</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Fecha</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Total</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Pagado</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Devuelto</th>
                                       
                                        <th  style=" color:#FFFFFF; background-color: #616161  !important">Detalles</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Devolver Todo</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Abonar</th>


                                    </tr>
                                </thead>
                                <tbody id="FacturasList">
                                  
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    
    
    <!-- Modal ddetalles del alquiler -->
    <div class="modal inmodal fade" id="myModalDetalles" tabindex="-1" role="dialog"  aria-hidden="true"  style="overflow-y: scroll;"> 
        <div class="modal-dialog  mdialTamanio" style="width: 80%; max-width: 80%; margin-left: 10%; margin-right: 10%">
            <div id="menumodal1" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <h4 class="modal-title" style="color: white  ; text-shadow: 5px 5px 5px #aaa;">Detalles Productos</h4>

                </div>
                <div class="modal-body"> <!-- Abrri Contenio-->
                    <div>
                        <div id="elementH"></div>
                        <div id="panelReporte" class="panel panel-default">
                            <!--        <div align=center class="panel-heading"><h3 class="panel-title">Registrar clientes</h3></div>-->
                            <div align=center class="panel-body">
                           
                                        <div class="ibox-content">


                        <div class="table-responsive" style="  
                height: 400px; 
                overflow-x: hidden; 
                overflow-x: auto; 
                text-align:justify; ">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>                                                        
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Nombre</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Valor unitario</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Cantidad</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Dias</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Total</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Devoluciones</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Delvolver productos</th>
                                    </tr>
                                </thead>
                                <tbody id="articulosList">
                                <tr class="gradeX footable-even" style="">
                                    <td class="footable-visible">Taladro</td>
                                    <td class="footable-visible">42"</td>
                                    <td class="center footable-visible">2</td>
                                    <td class="center footable-visible">12000</td>
                                    <td class="center footable-visible">2</td>
                                    <td class="center footable-visible">12000</td>
                                    <td class="center footable-visible">12000</td>
                                </tr>    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div> <!-- panel -->
                <div class="ibox-content">
                    <h3>
                        <div class="table-responsive">
                            <p id="total_factura">$0000000</p>
                        </div>
                        <div class="table-responsive">
                            <p id="total_pagar">$0000000</p>
                        </div>
                    </h3>
                </div>
                                
                            </div> <!-- panel -->
                        </div>

                        <div class="modal-footer">                            
                            <div class="ibox-content" id="contenedor_add_devoluciones" align="left" style="float: left; border-left: 10px; display: none; background: inherit">
                                <form role="form" >
                                    <div class="row">                                                           
                                        <div class="form-group">
                                            <label >Producto</label>
                                            <label  id="producto_a_devolver" class="form-control" />
                                        </div>    
                                        <div class="form-group" style="margin-left: 15px;">
                                            <label for="cantidad_devuelta" >Cantidad</label>
                                            <input type="number" id="cantidad_devuelta" class="form-control" min="1"/>
                                        </div>
                                        <div class="form-group" style="margin-left: 15px;">
                                            <label for="fecha_devolucion">Fecha devolucion</label>
                                            <input type="date" id="fecha_devolucion" class="form-control"/>
                                        </div>
                                        <div class="form-group" style="margin-left: 15px;">
                                                <label for="estado_objeto" >Estado del objeto</label>
                                                 <select class="form-control" id="estado_objeto">
                                                    <option value="0">Buen estado</option>
                                                    <option value="2">Dañados</option>
                                                    <option value="3">En reparacion</option>
                                                </select>                                            
                                            </div>                                   
                                        <button type="button" class="btn btn-primary" style="margin-left: 15px; margin-top: auto;margin-bottom: 15px;" onclick="agregar_devolucion()">Agregar</button>
                                    </div>                                                            
                                </form> 
                            </div>
                        </div>
                    <button type="button" class="btn btn-primary" id="btn_exportar" style="float: right; border-right: 0px;">Exportar</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal" style="float: right; border-right: 0px;">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="modal  inmodal fade" id="myModalDevolverParcial" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg mdialTamanio">
            <div id="menumodal1" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="cerrarModalDevolverTodo()"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <h4 class="modal-title" style="color: white  ; text-shadow: 5px 5px 5px #aaa;">Devolver parcial</h4>

                </div>
                <div class="modal-body"> <!-- Abrri Contenio-->
                    <div>
                        <div class="panel panel-default">
                            <!--        <div align=center class="panel-heading"><h3 class="panel-title">Registrar clientes</h3></div>-->
                            <div align=center class="panel-body">
                           
                                        <div class="ibox-content">


                        <div class="table-responsive" >
                            <table class="table table-striped" >
                                <thead>
                                    <tr>                                                        
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Nombre</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Valor unitario</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Cantidad</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Dias</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Total</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Devoluciones</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeX footable-even" style="">
                                    <td class="footable-visible">Taladro</td>
                                    <td class="footable-visible">42"</td>
                                    <td class="center footable-visible">2</td>
                                    <td class="center footable-visible">12000</td>
                                    <td class="center footable-visible">2</td>
                                    <td class="center footable-visible">12000</td>
                                    <td class="center footable-visible">12000</td>
                                </tr>    
                                </tbody>
                            </table>
                        </div>

                    </div>
                                
                            </div>
                            <div>                              
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                                                       
                            

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
    
    <script src ="js/reportesController.js"></script>

    <!-- Sweet alert -->
    <script src="js/plugins/sweetalert/sweetalert.min.js"></script>


    <!-- Page-Level Scripts -->
    <script>

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

        $(document).ready(function () {

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