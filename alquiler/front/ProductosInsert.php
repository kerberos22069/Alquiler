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
                <form method="post" enctype="multipart/form-data" role="form" id="ClientesInsert">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Inputnombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="Inputnombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="Inputunidad_medida">Unidad de Medida</label>
                                <input type="text" name="unidad_medida" class="form-control" id="Inputunidad_medida" placeholder="Unidad de Medida">
                            </div>
                            <div class="form-group">
                                <label for="Inputcodigo_interno">Codigo Interno</label>
                                <input type="text" name="codigo_interno" class="form-control" id="Inputcodigo_interno" placeholder="Codigo Interno">
                            </div>
                            <div class="form-group">
                                <label for="Inputcantidad_en_stock">Cantidad En Stock</label>
                                <input type="text" name="cantidad_en_stock" class="form-control" id="Inputcantidad_en_stock" placeholder="Cantidad En Stock">
                            </div>
                            <div class="form-group">
                                <label for="Inputmarca">Marca</label>
                                <input type="text" name="marca" class="form-control" id="Inputmarca" placeholder="Marca">
                            </div>

                            <div class="form-group">
                                <label for="Inputfoto">Foto</label>
                                <input id="imagen" name="imagen" class="form-control" type="file">
                            </div>
                        </div>



                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Inputprecio_compra">Precio Compra</label>
                                <input type="text" name="precio_compra" class="form-control" id="Inputprecio_compra" placeholder="Precio Compra">
                            </div>
                            <div class="form-group">
                                <label for="Inputprecio_venta">Precio Venta</label>
                                <input type="text" name="precio_venta" class="form-control" id="Inputprecio_venta" placeholder="Precio Venta">
                            </div>
                            <div class="form-group">
                                <label for="Inputdias_garantia">Dias de Garantia</label>
                                <input type="text" name="dias_garantia" class="form-control" id="Inputdias_garantia" placeholder="Dias de Garantia">
                            </div>

                            <div class="form-group">
                                <label for="Inputid_servicio">Servicio</label>
                                <select name="id_servicio" class="form-control" id="Inputid_servicio">

                                </select> 
                            </div> 

                            <div class="form-group">
                                <label for="Inputid_proveedor">Proveedor</label>
                                <select name="id_proveedor" class="form-control" id="Inputid_proveedor">

                                </select> 
                            </div> 
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="registraraCliente()">Registrar</button>
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
        
        function registraraCliente() {
            var formData = new FormData(document.getElementById('ClientesInsert'));
            formData.append('action', 'InsertNew');

            EnviarPost(formData, '../back/controller/Productos_Insert.php', function (result, state) {
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