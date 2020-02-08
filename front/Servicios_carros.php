<!DOCTYPE html>
<html>
    <!--              -------Creado por-------               -->
    <!--             \(x.x )/ Anarchy \( x.x)/               -->
    <!--              ------------------------               -->
    <!-- Sweet Alert -->
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <!--//    Les traigo amor  \\                  -->
    <div>
        <div class="panel panel-default">
            <div align=center class="panel-heading"><h3 class="panel-title">Orden Mecanicos</h3></div>
            <div align=center class="panel-body">
                <form role="form" id="PersonaInsert">

            
                    <div class="row">
                        <div class="col-lg-6">
                                    <div class="form-group">
                                <label for="Inputclientes">Cliente</label>
                                <select name="id_cliente" onchange="cargarDatosCorreo(this.value);" class="form-control" id="Inputclientes">
                                </select> 
                            </div>  
                            <div class="form-group">
                                <label for="Inputclientes">Vehiculo</label>
                                <select name="id_vehiculo"  class="form-control" id="InputVehiculo">
                                    <option>SELECCIONE</option>
                                </select> 
                            </div>  

                        </div>
                        <div class="col-lg-6">
                   
                            <div class="form-group">
                                <label for="Inputmecanico">Mecanico Asignado</label>
                                <select name="created_at" class="form-control" id="Inputmecanico">
                                </select> 
                            </div>  

                            <div class="form-group">
                                <label for="Inputservicio">Servicio Prestado</label>
                                <select name="id_servicio" class="form-control" id="Inputservicio">
                                </select> 
                            </div> 

                            <div style="display:none" class="form-group">
                                <label for="Inputpercorreo">Correo</label>
                                <input type="text" name="correo" class="form-control" id="Inputcorreo">
                            </div>

                            <div style="display:none" class="form-group">
                                <label for="Inputpernombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="Inputnombre">
                            </div>

                        </div>
                        <div class="col-lg-12">
                                <div  class="form-group">
                                <label for="Inputpernombre">Observacion</label>
                                <textarea type="text" name="updated_at" class="form-control" id="updated_at"></textarea>
                            </div> 
                        </div>     
                    
                        
                    </div>
      
   <button type="button" class="btn btn-primary" onclick="registraraPersona()">Registrar</button>

                </form>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div>

<!--    <div id="mostrarcontenido2">

    </div>-->

    <!-- Sweet alert -->
    <script src="js/plugins/sweetalert/sweetalert.min.js"></script>

    <script src="js/plugins/steps/jquery.steps.min.js"></script>
    <script src="js/plugins/validate/jquery.validate.min.js"></script>
    <script src="js/Ajax.js "></script>
    <script src="js/ViewManager.js "></script>
    <script src="js/HtmlBuilder.js "></script>

    <script>
                                    $(document).ready(function () {
                                        cargarClientes();
                                        cargarMecanicos();
                                        cargarServicio();
                                        //cargarProducto();
                                        var emp = 0;
                                        Mecanicos_Vender(emp);
                                    });
    </script>
    <script>


        function registraraPersona() {

            var url1 = "../back/controller/Vehiculos_servicio_insert.php";
              console.log($("#PersonaInsert").serialize());
            $.ajax({
                type: "POST",
                url: url1,
                data: $("#PersonaInsert").serialize(),

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
//                            Persona_Listar();
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

    </script>


    <script>
        function cargarDatosCorreo(empresa) {
            cargarVehiculos_Cliente(empresa);
            $.get('../back/controller/Clientes_Detalles.php', {'empresa': empresa}, function (depa) {

                depa = JSON.parse(depa);
                $("#Inputnombre").val(depa[1].nombres + " " + depa[1].apellidos);
                $("#Inputcorreo").val(depa[1].correo);

            });
        }
    </script>

    <script>
        function cargarClientes() {
            $.get('../back/controller/Clientes_Detalles_Combo.php', function (depa) {


                var mySelect = document.getElementById("Inputclientes");
                removeAllChildren(mySelect);
                mySelect.appendChild(createOPTION(-1, 'SELECCIONE'));
                depa = JSON.parse(depa);
                for (var i = 1; i < depa.length; i++) {
                    mySelect.appendChild(createOPTION(depa[i].id, depa[i].nombres + " " + depa[i].apellidos));
                }

            });
        }

        function cargarMecanicos() {
            $.get('../back/controller/Mecanicos_Detalles.php', function (depa) {

                var mySelect = document.getElementById("Inputmecanico");
                removeAllChildren(mySelect);
                mySelect.appendChild(createOPTION(-1, 'SELECCIONE'));
                depa = JSON.parse(depa);
                for (var i = 1; i < depa.length; i++) {
                    mySelect.appendChild(createOPTION(depa[i].id, depa[i].nombres + " " + depa[i].apellidos));
                }

            });
        }

        function cargarServicio() {
            $.get('../back/controller/Servicio_Detalles.php', function (depa) {

                var mySelect = document.getElementById("Inputservicio");
                removeAllChildren(mySelect);
                mySelect.appendChild(createOPTION(-1, 'SELECCIONE'));
                depa = JSON.parse(depa);
                for (var i = 1; i < depa.length; i++) {
                    mySelect.appendChild(createOPTION(depa[i].id, depa[i].nombre));
                }

            });
        }
        
        function cargarVehiculos_Cliente(empresa) {
          $.get('../back/controller/Vehiculos_List_xCliente.php', {'empresa': empresa}, function (depa) {


                var mySelect = document.getElementById("InputVehiculo");
                removeAllChildren(mySelect);
                mySelect.appendChild(createOPTION(-1, 'SELECCIONE'));
                depa = JSON.parse(depa);
                for (var i = 1; i < depa.length; i++) {
                    mySelect.appendChild(createOPTION(depa[i].id, depa[i].marca));
                }

            });
        }

//        function cargarProducto() {
//            $.get('../back/controller/Productos_Detalles_Combo.php', function (depa) {
//
//                var mySelect = document.getElementById("Inputproducto");
//                removeAllChildren(mySelect);
//                mySelect.appendChild(createOPTION(-1, 'SELECCIONE'));
//                depa = JSON.parse(depa);
//                for (var i = 1; i < depa.length; i++) {
//                    mySelect.appendChild(createOPTION(depa[i].id, depa[i].nombre));
//                }
//
//            });
//        }
    </script>



    <!-- That`s all folks! -->
</html>