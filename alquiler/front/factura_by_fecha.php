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
                            <h1><b>Facturas</b></h1>

                        </div>
                        
                    </div>                      
                    <div class="ibox-content">
                        <div class="row">
                         <div class="col-lg-12">
                            <div class="form-group row has-success">
                                <label class="col-sm-2 col-form-label">
                                    Fecha inicio:
                                </label>
                                <div class="col-sm-3">
                                    <input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control">
                                </div>

                                <label class="col-sm-2 col-form-label">
                                    Fecha fin:
                                </label>
                                <div class="col-sm-3">
                                    <input id="fecha_fin" name="fecha_fin" type="date" class="form-control">
                                </div>                     

                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary" onclick="buscar_factura_by_fecha()" >
                                        Buscar por fecha
                                    </button>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row has-success">
                                <label class="col-sm-2 col-form-label">
                                    Cédula:
                                </label>
                                <div class="col-sm-4">
                                    <input id="cliente_cedula" name="cliente_cedula" class="form-control">
                                </div>                    
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary" onclick="buscar_factura_by_cliente()" >
                                        Buscar por cliente.
                                    </button>
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
    <!-- finaliza modal de Devolver Parcial-->

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

        function seleccionarTabla() {

            if ( $.fn.dataTable.isDataTable( '#tabla_facturas' ) ) {
                table = $('#tabla_facturas').DataTable();
            }
            else {
                table =  $('#tabla_facturas').DataTable({
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

    <script type="text/javascript">

        //MIS VARIABLES GLOBALES, NO TOQUES MI BASURA/////
        faturas_global = [];
        factura_id_select = -1
        //////////////////////////////////////////////////
        
        function buscar_factura_by_fecha() {
            
            var url = "../back/controller/reportePorTiempo.php";

            var fechas = { "fecha_ini" : $('#fecha_inicio').val(), "fecha_fin": $('#fecha_fin').val()}

            $.ajax({
                type: "POST",
                url: url,
                data: fechas,

                success: function (data) {
                    facturas_global = JSON.parse(data);
                    console.log($.isEmptyObject(facturas_global));
                    if($.isEmptyObject(facturas_global)){
                        mostrar_datos_vacios();
                    }else{
                        mostrar_reporte(facturas_global);    
                    }
                    
                }
            });

        }
        
        function buscar_factura_by_cliente () {
            
            var url = "../back/controller/reportePorCliente.php";
            
            var cedula = $('#cliente_cedula').val();
            if(cedula == null || cedula == ""){
                alert("Debe proporcionar un número de cédula para buscar");
            }else{
                var params = { "cliente_cedula": cedula}
                $.ajax({
                    type: "POST",
                    url: url,
                    data: params,

                    success: function (data) {
                        facturas_global = JSON.parse(data);
                        console.log($.isEmptyObject(facturas_global));
                        if($.isEmptyObject(facturas_global)){
                            mostrar_datos_vacios();
                        }else{
                            mostrar_reporte(facturas_global);    
                        }

                    }
                });
            }
        }

        function mostrar_reporte(data){
            contenedor = document.getElementById('FacturasList'); 
            contenedor.innerHTML = "";
            for(let i in data){
                mi_tr = tr("gradeX footable-even");
                //id
                mi_tr.appendChild( td(data[i].id, "footable-visible footable-first-column") );
                //nombre
                mi_tr.appendChild( td(data[i].cliente.cliente_nombre, "footable-visible") );
                //fecha
                mi_tr.appendChild( td(data[i].fecha, "footable-visible"));
                //total
                mi_tr.appendChild( td(formatearDinero(data[i].total), "footable-visible"));
                //pagado
                if(data[i].pagado){
                    mi_tr.appendChild( td_icono(data[i].id,"mostrar_alquileres","check"));
                }else{
                    mi_tr.appendChild( td_icono(data[i].id,"mostrar_alquileres","times"));
                }
                //devuelto
                if(data[i].devuelto){
                    mi_tr.appendChild( td_icono(data[i].id,"mostrar_alquileres","check"));
                }else{
                    mi_tr.appendChild( td_icono(data[i].id,"mostrar_alquileres","times"));
                }
                //detalles
                mi_tr.appendChild( td_icono(data[i].id,"mostrar_alquileres","search-plus"));  
                //devolver todo
                mi_tr.appendChild( td_icono(data[i].id,"devolverTodo","hand-o-left",data[i].devuelto));
                //abonar
                mi_tr.appendChild( td_icono(data[i].id,"abrirModalAbono","money",data[i].pagado));

             contenedor.appendChild(mi_tr);
            }

            seleccionarTabla();
        }

        function mostrar_datos_vacios(){
            contenedor = document.getElementById('FacturasList'); 
            contenedor.innerHTML = "";
            mi_tr = tr("gradeX footable-even");
            //Perdon por hacer esto, pero por alguna razon al segundo intento el metod td no sirve
            var td = document.createElement("td");        
            td.setAttribute("class", "footable-visible footable-first-column");
            td.appendChild(document.createTextNode("No existen facturas para dentro de los parámetros de búsqueda"));
            td.setAttribute("colspan", 7);
            mi_tr.appendChild(td);
            contenedor.appendChild(mi_tr);        
        }

        function tr(clase){
            var tr = document.createElement("tr");        
            tr.setAttribute("class", clase);
            return tr;
        }

        function td(texto, clase){
            var td = document.createElement("td");        
            td.setAttribute("class", clase);
            td.appendChild(document.createTextNode(texto));
            return td;
        }

        function td_icono(id_factura,onclick,icono,disabled=false){
            var td = document.createElement("td");        
            td.setAttribute("class", "footable-visible");
            td.setAttribute("style", "font-size: 15px; text-align: center;");
            var a = document.createElement("a");
            aux = onclick+"("+id_factura+")";
            if(!disabled){
                a.setAttribute("onclick", aux);
            }else{
                a.setAttribute("style", "color: currentColor; cursor: not-allowed; opacity: 0.5;");
            }
            var i = document.createElement("i");
            var clase = "fa fa-"+icono;
            i.setAttribute("class", clase);
            a.appendChild(i);
            td.appendChild(a);          
            return td;
        }


    
        
    function devolverTodo(factura_id){
        var formData = {};
        formData["factura_id"]=factura_id;
        $.post('../back/controller/devolverTodo.php',formData, function(result,state){
         postDevuelto(result,state);
        });
    }
    
    function postDevuelto(result,state){
     //Maneje aquÃ­ la respuesta del servidor.
     //Consideramos buena prÃ¡ctica no manejar cÃ³digo HTML antes de este punto.
        if(state=="success"){
             if(result=="exito"){            
                alert("Devuelto con éxito");
             }else{
                alert("Hubo un errror en la petición ( u.u)\n"+result);
                console.log(result);
             } 		}else{
                alert("Hubo un errror interno ( u.u)\n"+result);
        }
    }
    
    function abrirModalAbono(factura_id){
        alert("Abrir modal para abonar\n"+factura_id);
    }

    function formatearDinero(dinero){
        dinero = dinero.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        dinero = dinero.split('').reverse().join('').replace(/^[\.]/,'');
        return "$ " + dinero;
    }

    function mostrar_alquileres(id_alquiler) {
            contenedor = document.getElementById('articulosList'); 
            contenedor.innerHTML = "";
            alquiler = obtenerAlquileres(id_alquiler);
            //Perdon por esto, id_alquiler es la factura.
            factura_id_select = id_alquiler;
            console.log("CUAL ES LA JODA");
            for(let i in alquiler){
                console.log("PAR DE CATRE HPS");
                mi_tr = tr("gradeX footable-even");
                //Nombre
                mi_tr.appendChild( td(alquiler[i].producto_nombre, "footable-visible") );
                //Valor unitario
                mi_tr.appendChild( td(formatearDinero(alquiler[i].valor), "footable-visible") );
                //Cantidad
                mi_tr.appendChild( td(alquiler[i].cantidad, "footable-visible"));
                //Dias
                mi_tr.appendChild( td(alquiler[i].dias, "footable-visible"));
                //Total
                total = alquiler[i].valor * alquiler[i].cantidad * alquiler[i].dias;
                mi_tr.appendChild( td(formatearDinero(total), "footable-visible"));
                //Devoluciones
                mi_tr.appendChild(parsearDevoluciones(JSON.parse(alquiler[i].devoluciones)));
                //Devolver parcial
                mi_tr.appendChild(td_icono(alquiler[i].id,"mostrarModalDevolverParcial","hand-o-left",alquiler[i].devuelto));

             contenedor.appendChild(mi_tr);
            }
            //console.log(contenedor);
            $('#myModalDetalles').modal({show: true});
        }

        function obtenerAlquileres(id_factura){
            for(let i in facturas_global){
                if(parseInt(facturas_global[i].id, 10) === id_factura ){
                    return facturas_global[i].alquileres;
                }
            }
            return [];
        }

        function parsearDevoluciones(devoluciones){
            var td = document.createElement("td");        
            td.setAttribute("class", "footable-visible");
            var ul = document.createElement("ul");        
            for(let i in devoluciones){
                var li = document.createElement("li");
                rta = "Fecha: "+devoluciones[i].fecha+", Cantidad: "+devoluciones[i].cantidad+", Estado: "+obtenerEstado(devoluciones[i].estado);
                li.appendChild(document.createTextNode(rta));
                ul.appendChild(li)
            }
            td.appendChild(ul);
            return td;
        }

        function obtenerEstado(estado){
            switch (estado) {
              case 0:
                return "Buen estado";
                break;
              case 1: 
                return "Alquiler";
                break;               
              case 2: 
                return "Dañados"
                break; 
              case 3: 
                return "En reparacion"
                break; 
              default:
                return "Sin definir";
            }
        }

    

        function mostrarModalDevolverParcial(id_factura){
            $('#myModalDevolverParcial').modal({show: true});
        }

        function cerrarModalDevolverTodo(){
            $('#myModalDevolverParcial').modal('hide');

           // 
            //$('body').removeClass('modal-open');

         
        }

        function number_format(amount, decimals) {

            amount += ''; // por si pasan un numero en vez de un string
            amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

            decimals = decimals || 0; // por si la variable no fue fue pasada

            // si no es un numero o es igual a cero retorno el mismo cero
            if (isNaN(amount) || amount === 0) 
                return parseFloat(0).toFixed(decimals);

            // si es mayor o menor que cero retorno el valor formateado como numero
            amount = '' + amount.toFixed(decimals);

            var amount_parts = amount.split('.'),
                regexp = /(\d+)(\d{3})/;

            while (regexp.test(amount_parts[0]))
                amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

            return amount_parts.join('.');
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