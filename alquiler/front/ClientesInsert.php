<!DOCTYPE html>
<html>
    <!--              -------Creado por-------               -->
    <!--             \(x.x )/ Anarchy \( x.x)/               -->
    <!--              ------------------------               -->

    <!--//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\                  -->
    <!-- Sweet Alert -->
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <div>
        <div class="panel panel-default">
            <div align=center class="panel-heading"><h3 class="panel-title">Registrar clientes</h3></div>
            <div align=center class="panel-body">

                <form role="form" id="ClienteInsert">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Inputcliente_nombre">Nombre</label>
                                <input type="text" name="cliente_nombre" class="form-control" id="Inputcliente_nombre" placeholder="cliente_nombre">
                            </div>
                            <div class="form-group">
                                <label for="Inputcliente_apellido">Apellido</label>
                                <input type="text" name="cliente_apellido" class="form-control" id="Inputcliente_apellido" placeholder="cliente_apellido">
                            </div>
                            <div class="form-group">
                                <label for="Inputcliente_cc">NIT</label>
                                <input type="text" name="cliente_cc" class="form-control" id="Inputcliente_cc" placeholder="cliente_cc">
                            </div>

                        </div>
                        <div class="col-md-6">




                            <div class="form-group">
                                <label for="Inputcliente_direccion">Dirección</label>
                                <input type="text" name="cliente_direccion" class="form-control" id="Inputcliente_direccion" placeholder="cliente_direccion">
                            </div>
                            <div class="form-group">
                                <label for="Inputcliente_telefono">Teléfono</label>
                                <input type="text" name="cliente_telefono" class="form-control" id="Inputcliente_telefono" placeholder="cliente_telefono">
                            </div>
                            <div class="form-group">
                                <label for="Inputcliente_correo">Correo</label>
                                <input type="text" name="cliente_correo" class="form-control" id="Inputcliente_correo" placeholder="cliente_correo">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="registraraCliente()">Registrar</button>
                    <!--         <a href="javascript:preClienteInsert('ClienteInsert')" class="btn btn-warning">Registrar</a>-->


                </form>         





            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div>


    <!-- Sweet alert -->
    <script src="js/plugins/sweetalert/sweetalert.min.js"></script>

    <script>


                 function registraraCliente() {


                     var url1 = "../back/controller/Cliente_insert.php";

                     // console.log($("#ClientesInsert").serialize());

                     //  echo jason_encode('error');
                     $.ajax({
                         type: "POST",
                         url: url1,
                         data: $("#ClienteInsert").serialize(),

                         success: function (data) {
                             if (data == "1") {
                                 aceptarPersona();
                             }else if (data == 2) {
                                 errorPersonaCampos();
                             } else {
                                 errorPersonaInsert();
                             }

                         }
                     });

                 }
                 ;

                 function aceptarPersona() {


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

                                     Clientes_Listar();

                                 } else {
                                     swal("Cancelled", "Your imaginary file is safe :)", "error");
                                 }
                             });

                 }
                 ;


                 function errorPersonaCampos() {


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
                 ;
    </script>
    <!-- That`s all folks! -->
</html>