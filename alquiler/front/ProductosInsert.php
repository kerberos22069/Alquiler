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
            <div align=center class="panel-heading"><h3 class="panel-title">Registrar Productos</h3></div>
            <div align=center class="panel-body">
                <form method="post" enctype="multipart/form-data" role="form" id="ProductoInsert_1">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                          <label for="Inputprod_nombre">Nombre del producto</label>
                          <input type="text" name="prod_nombre" class="form-control" id="Inputprod_nombre" placeholder="Nombre">
                       </div>
                      <div class="form-group">
                          <label for="Inputprod_descripcion">Descripción del producto</label>
                          <input type="text" name="prod_descripcion" class="form-control" id="Inputprod_descripcion" placeholder="Descripción" >
                       </div>
                      <div class="form-group">
                          <label for="Inputprod_precio">Precio base del producto</label>
                          <input type="number" name="prod_precio" class="form-control" id="Inputprod_precio" placeholder="Precio" value="0">
                       </div>                            
                    </div>



                        <div class="col-lg-6">
                          <div class="form-group">
                          <label for="Inputprod_stock">Stock del producto</label>
                          <input type="number" name="prod_stock" class="form-control" id="Inputprod_stock" placeholder="prod_stock" value="0">
                       </div>
                      <div class="form-group">
                          <label for="Inputprod_disponible" hidden="true">producto disponible</label>
                          <input type="text" name="prod_disponible" class="form-control" id="Inputprod_disponible" placeholder="prod_disponible" value="0" hidden="true">
                       </div>
                      <div class="form-group">
                          <label for="Inputprod_reparacion" hidden="true">producto reparacion</label>
                          <input type="text" name="prod_reparacion" class="form-control" id="Inputprod_reparacion" placeholder="prod_reparacion" value="0" hidden="true">
                       </div>
                      <div class="form-group">
                          <label for="Inputprod_danado" hidden="true">producto dañado</label>
                          <input type="text" name="prod_danado" class="form-control" id="Inputprod_danado" placeholder="prod_dañado" value="0" hidden="true">
                       </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="registrar_Producto()">Registrar</button>
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
                            cargarServicios();
                            cargarProveedores();
                        });
    </script>

    <script>
        
        function registrar_Producto() {
            var formData = new FormData(document.getElementById('ProductoInsert_1'));
            formData.append('action', 'InsertNew');

            EnviarPost(formData, '../back/controller/Producto_insert.php', function (result, state) {
            });
        }

        function EnviarPost(formData, url, func) {
            var resul = null
            var state = null
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'html',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {
                    resul = result
                    aceptarPersona();
                }
            });
        }
    </script>

    <script>

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
                            
                            Productos_Listar();

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

    <script>
        function cargarServicios() {
            $.get('../back/controller/Servicio_Detalles.php', function (depa) {

                var mySelect = document.getElementById("Inputid_servicio");
                removeAllChildren(mySelect);
                mySelect.appendChild(createOPTION(-1, 'SELECCIONE'));
                depa = JSON.parse(depa);
                for (var i = 1; i < depa.length; i++) {
                    mySelect.appendChild(createOPTION(depa[i].id, depa[i].nombre));
                }

            });
        }

        function cargarProveedores() {
            $.get('../back/controller/Proveedor_Detalles.php', function (depa) {

                var mySelect = document.getElementById("Inputid_proveedor");
                removeAllChildren(mySelect);
                mySelect.appendChild(createOPTION(-1, 'SELECCIONE'));
                depa = JSON.parse(depa);
                for (var i = 1; i < depa.length; i++) {
                    mySelect.appendChild(createOPTION(depa[i].id, depa[i].nombre));
                }

            });
        }
    </script>

</html>