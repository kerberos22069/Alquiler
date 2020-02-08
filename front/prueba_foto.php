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
                <form action="../back/controller/Prueba_foto.php" enctype="multipart/form-data" method="post" id="ClientesInsert">


                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="Inputnombres">nombres</label>
                            <input type="text" name="nombres" class="form-control" id="Inputnombres" placeholder="nombres">
                        </div>
                        <div class="form-group">
                            <label for="Inputapellidos">apellidos</label>
                            <input type="text" name="apellidos" class="form-control" id="Inputapellidos" placeholder="apellidos">
                        </div>
                        <div class="form-group">
                            <label for="Inputfoto">Foto</label>
                            <input id="imagen" name="imagen" class="form-control" type="file">
                        </div>

                    </div>


                    <button type="button" class="btn btn-primary" onclick="registraraCliente()">Registrar</button>
                </form>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div>


    <!-- Sweet alert -->
    <script src="js/plugins/sweetalert/sweetalert.min.js"></script>


    <script>


                        function registraraCliente() {

//                            var url1 = "../back/controller/Prueba_foto.php";
//                            
//                            $.ajax({
//                                type: "POST",
//                                url: url1,
//                                data: $("#ClientesInsert"),
//
//                                success: function (data) {
//                                    console.log(data);
////                                    if (data == 1) {
////                                        aceptarPersona();
////                                    }
////                                    if (data == 2) {
////                                        errorPersonaCampos();
////                                    } else {
////                                        errorPersonaInsert();
////                                    }
//                                }
//                            });
                            document.getElementById("ClientesInsert").submit();
                            
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