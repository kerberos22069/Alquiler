<html>
    <div>
        <div class="panel panel-default">
            <div align=center class="panel-heading"><h3 class="panel-title">Modulo ventas</h3></div>
            <div align=center class="panel-body">
                <!--<form role="form" id="PersonaInsert">-->
                <div class="row">
                    <div class="col-lg-6">
                                 <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                   
                                    <input type="text" name="persona_cedula" class="form-control" id="Inputpersona_cedula" placeholder="Cedula" required>
                                </div> 
                            </div>
                            <div class="col-sm-2" style="padding-top: -45px">
                                <div class="form-group" style="padding-top: -45px">
                                    <label for="Inputpersona_cedula">    </label>
                                    <button type="button" class="btn btn-primary" onclick="buscarcedula()">Buscar </button>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-2">  

                        <div class="form-group row"><label class="col-lg-2 col-form-label" style="color: red; font-size: 24">Num</label>

                            <div class="col-lg-6"><input  name="num_factura" id="Inputnum_factura" type="text" placeholder="0" class="form-control" style="color: red; font-size: 24">
                            </div>
                        </div>         
                    </div></div>

                <div class="row">
                    <div class="col-lg-6" style="font-size: 12px; font-weight: bold; " >
                        <div class="form-group"  style="display: none">
                            <label for="Inputid">id</label>
                            <input style="background-color: white; border:1px solid #ffffff;" type="text" name="id" class="form-control" id="Inputid" placeholder="id" required>
                        </div>
                        
        <div class="form-group  row">
            <label class="col-sm-2 col-form-label"><b>Nombre y Apellido :</b></label>

                                    <div class="col-sm-10">
                                        <input style="background-color: white; border:1px solid #ffffff;" type="text" id="Inputnombres" name="nombres" class="form-control"></div>
                                </div>
        <div class="form-group  row">
            <label class="col-sm-2 col-form-label"><b>Cedula :</b></label>

                                    <div class="col-sm-10"><input style="background-color: white; border:1px solid #ffffff;" type="text" id="Inputcc" name="cc" class="form-control"></div>
                                </div>
        <div class="form-group  row">
            <label class="col-sm-2 col-form-label"><b>Telefono :</b></label>

                                    <div class="col-sm-10"><input style="background-color: white; border:1px solid #ffffff;" type="text" id="Inputcc" name="cc" class="form-control"></div>
                                </div>
   
                        
                     


                          
       


                    </div>


                    <div class="col-lg-6" style="font-size: 12px; font-weight: bold; ">
                        <!--<div class="container">-->

     <div class="form-group  row">
         <label class="col-sm-2 col-form-label"><b>Direccion :</b></label>

                                    <div class="col-sm-10"><input style="background-color: white; border:1px solid #ffffff;" type="text" id="Inputdireccion" name="direccion" class="form-control"></div>
                                </div>
        <div class="form-group  row">
            <label class="col-sm-2 col-form-label"><b>Correo :</b></label>

                                    <div class="col-sm-10"><input style="background-color: white; border:1px solid #ffffff;" type="text" id="Inputcorreo" name="correo" class="form-control"></div>
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

            $.get('../back/controller/Cliente_Detalles_1.php', {'empresa': empresa}, function (depa) {

                depa = JSON.parse(depa);
//                        console.log(depa);
                if (depa[1].result == 'error') {
                    alert('NO existe debe registra el Cliente ');
                    Clientes_Registrar();
                } else {

                    $("#Inputid").val(depa[1].idcliente);   
                     $("#Inputnombres").val(depa[1].cliente_nombre + " " + depa[1].cliente_apellido);
                    $("#Inputcc").val(depa[1].cliente_cc);//direccion
                    $("#Inputtelefono").val(depa[1].cliente_telefono);
                    $("#Inputcorreo").val(depa[1].cliente_correo);
                    $("#Inputdireccion").val(depa[1].cliente_direccion);

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
