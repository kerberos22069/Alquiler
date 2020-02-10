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
            <div align=center class="panel-heading"><h3 class="panel-title">Registrar Conductor</h3></div>
            <div align=center class="panel-body">

                <form role="form" id="Chofer_Insert">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Inputcliente_nombre">Nombres y apellidos</label>
                                <input type="text" name="nom_chofer" class="form-control" id="Inputcliente_nombre" placeholder="Nombre y apellido">
                            </div>
                            
                            <div class="form-group">
                                <label for="Inputcliente_cc">Cédula del conductor</label>
                                <input type="text" name="cc_chofer" class="form-control" id="Inputcliente_cc" placeholder="Cédula">
                            </div>

                        </div>
                        <div class="col-md-6">




                            <div class="form-group">
                                <label for="Inputcliente_direccion">Dirección</label>
                                <input type="text" name="direccion" class="form-control" id="Inputcliente_direccion" placeholder="Dirección (Opcional)">
                            </div>
                            <div class="form-group">
                                <label for="Inputcliente_telefono">Teléfono</label>
                                <input type="text" name="chofe_telefono" class="form-control" id="Inputcliente_telefono" placeholder="Teléfono">
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


                     var url1 = "../back/controller/Chofer_insert.php";

                     // console.log($("#ClientesInsert").serialize());

                     //  echo jason_encode('error');
                     $.ajax({
                         type: "POST",
                         url: url1,
                         data: $("#Chofer_Insert").serialize(),

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

                                     Conductor_list();

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