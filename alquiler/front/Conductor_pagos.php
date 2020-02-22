<?php $fcha = date("Y-m-d"); ?>
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
                                 <input id="Imputfecha_inicio_tran" value="<?php echo $fcha; ?>" name="fecha_inicio_tran" type="date" class="form-control">
                                </div>
                                    
                                 
                                </div>
                                                              
                                    
                                </div>
                                
                                <div class="col-sm-4" >
                                      <div class=" row ">
                            <label style="text-align: left" class="col-sm-4 col-form-label"><b>Hasta:</b></label>

                            <div class="col-sm-8 p-xs " >
                                 <input id="Imputfecha_fin_tran" value="<?php echo $fcha; ?>" name="fecha_fin_tran" type="date" class="form-control">
                                </div>
                                    
                                 
                                </div>
                                </div>
                               

                                <div class="col-sm-2" >
                                    <button type="button" class="btn btn-primary" onclick="relacion_viajes()" >
                                        Buscar por fecha
                                    </button>
                                </div>
                                <div class="col-sm-1">
                                      <button type="button" class="btn btn-primary" onclick="ver()" >
                                        Ver
                                    </button>
                                    
                                   <button id="btnImprimir">Imprimir</button>   
                                    
                                </div>
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

 $(document).ready(function(){
        $('#btnImprimir').click(function(){
           $.ajax({
               url: 'ticket.php',
               type: 'POST',
               success: function(response){
                   if(response==1){
                       alert('Imprimiendo....');
                   }else{
                       alert('Error');
                   }
               }
           }); 
        });
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
    function ver() {
                                  var nun_factura = document.getElementById("InputId_orden").value;
                                  var nom_cliente = document.getElementById("Inputnombres_orden").value;
                                  var cc_cliente = document.getElementById("Inputcc_orden").value;
//                                  var tel_clien = document.getElementById("Inputtelefono").value;
                                  var fecha_ini = document.getElementById("Imputfecha_inicio_tran").value;
                                  var fecha_fin = document.getElementById("Imputfecha_fin_tran").value;
                                  var total = document.getElementById("Inputfact_total_Tra").value;
//
          recorrerTabla_conduc();
        
         var client = []
client.push(nun_factura);
client.push(nom_cliente);
client.push(cc_cliente);
client.push(fecha_ini);
client.push(fecha_fin);
client.push(total);


         window.location.href="formatos/recibo_flete.php?usuario="+client+"&productos="+prod_alq2,"'_blank" ; 
    }
        
      
//          
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