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
            <div align=center class="panel-heading"><h3 class="panel-title">Registrar Vehiculo</h3></div>
            <div align=center class="panel-body">
                <form role="form" id="PersonaInsert">

                    <div class="form-group">
                        <label for="Inputclientes">Cliente</label>
                        <select name="id_cliente" class="form-control" id="Inputclientes">

                        </select> 
                    </div>  

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="Inputpermarca">Marca</label>
                                <input type="text" name="marca" class="form-control" id="Inputpermarca" placeholder="Marca" required>
                            </div>
                            <div class="form-group">
                                <label for="Inputplaca">Placa</label>
                                <input type="text" name="placa" class="form-control" id="Inputplaca" placeholder="Placa" required>
                            </div>


                        </div>


                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="Inputanio">Año</label>
                                <input type="text" name="anio" class="form-control" id="Inputanio" placeholder="Año" required>
                            </div>

                            <div class="form-group">
                                <label for="Inputkilometraje">Kilometraje</label>
                                <input type="text" name="kilometraje" class="form-control" id="Inputkilometraje" placeholder="Kilometraje" required>
                            </div>


                        </div>

                    </div>

                    <button type="button" class="btn btn-primary" onclick="registraraPersona()">Registrar</button>
                </form>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div>

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
                        });
    </script>
    <script>


        function registraraPersona() {

            var url1 = "../back/controller/Vehiculo_Insert.php";
            //  console.log($("#PersonaInsert").serialize());
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
    </script>


    <!-- That`s all folks! -->
</html>