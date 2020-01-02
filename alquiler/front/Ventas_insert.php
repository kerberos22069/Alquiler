<html>
    <div>
        <div class="panel panel-default">
            <div align=center class="panel-heading"><h3 class="panel-title">Modulo ventas</h3></div>
            <div align=center class="panel-body">
                <!--<form role="form" id="PersonaInsert">-->
                <div class="row">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-2">  

                        <div class="form-group row"><label class="col-lg-2 col-form-label" style="color: red; font-size: 24">Num</label>

                            <div class="col-lg-6"><input  name="num_factura" id="Inputnum_factura" type="text" placeholder="0" class="form-control" style="color: red; font-size: 24">
                            </div>
                        </div>         
                    </div></div>

                <div class="row">
                    <div class="col-lg-6" style="font-size: 10px;">
                        <div class="form-group" style="display: none" >
                            <label for="Inputid">id</label>
                            <input style="background-color: white; border:1px solid #ffffff;" type="text" name="id" class="form-control" id="Inputid" placeholder="id" required>
                        </div>
                        
        <div class="form-group  row">
            <label class="col-sm-2 col-form-label">Nombre y Apellido</label>

                                    <div class="col-sm-10">
                                        <input style="background-color: white; border:1px solid #ffffff;" type="text" id="Inputnombres" name="nombres" class="form-control"></div>
                                </div>
        <div class="form-group  row">
            <label class="col-sm-2 col-form-label">Direccion</label>

                                    <div class="col-sm-10"><input style="background-color: white; border:1px solid #ffffff;" type="text" id="Inputnombres" name="nombres" class="form-control"></div>
                                </div>
        <div class="form-group  row">
            <label class="col-sm-2 col-form-label">Correo</label>

                                    <div class="col-sm-10"><input style="background-color: white; border:1px solid #ffffff;" type="text" id="Inputnombres" name="nombres" class="form-control"></div>
                                </div>
                        
                     


                          

                        <div style="display:none" class="form-group">
                            <label for="Inputcorreo">Correo</label>
                            <input type="text" name="Inputcorreo" class="form-control" id="Inputcorreo" readonly>
                        </div>        


                    </div>


                    <div class="col-lg-6">
                        <!--<div class="container">-->


                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="Inputpersona_cedula">Cedula</label>
                                    <input type="text" name="persona_cedula" class="form-control" id="Inputpersona_cedula" placeholder="Cedula" required>
                                </div> 
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="Inputpersona_cedula">    </label>
                                    <button type="button" class="btn btn-primary" onclick="buscarcedula()">Buscar </button>
                                </div>

                            </div>

                        </div>
                        <!--</div>-->



                        <div class="form-group">
                            <label for="Inputpersona_tel_contacto">Tel_Contacto</label>
                            <input type="text" name="telefono" class="form-control" id="Inputtelefono" placeholder="Telefono contacto" readonly>
                        </div>

                    </div>

                </div>


                <!--</form>-->
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div>


    <hr>

    <div id="mostrarcontenido2">

    </div>



    <script>
        $(document).ready(function () {


            cargareNum_Factura();
//              emp=0;
//             Productos_Vender(emp);
        });


        function cargareNum_Factura() {

            $.get('../back/controller/Ventas_Num_Factura.php', function (depa) {

                depa = JSON.parse(depa);

                $("#Inputnum_factura").val(depa[1].precio_total);//direccion

            });
        }

        function buscarcedula() {

            empresa = document.getElementById("Inputpersona_cedula").value;
//          alert(empresa);

            $.get('../back/controller/Cliente_Detalles.php', {'empresa': empresa}, function (depa) {

                depa = JSON.parse(depa);
//                        console.log(depa);
                if (depa[1].result == 'error') {
                    alert('NO existe debe registra el Cliente ');
                    Clientes_Listar();
                } else {

                    $("#Inputid").val(depa[1].id);
                    $("#Inputnombres").val(depa[1].nombres + " " + depa[1].nombres);
                    $("#Inputcreated_at").val(depa[1].created_at);//direccion
                    $("#Inputtelefono").val(depa[1].telefono);
                    $("#Inputcorreo").val(depa[1].correo);

                    emp = 0;
                    Productos_Vender(emp);
                    document.getElementById('agregarProd').disabled = false;
                }

            });
        }


//         function ActivarEditar(){
//        
//        alert();
//      document.getElementById('agregarProd').disabled=false;
////      document.getElementById('editar').disabled=true;
////  $( "input:radio" ).on("click",function(){
////  $("input[type=submit]").removeAttr("disabled"); 
////  });
//     
//   
//};



    </script> 


</html>
