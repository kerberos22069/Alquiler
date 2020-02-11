

  <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                           <!-- <table class="table table-striped table-bordered table-hover dataTables-example" >-->
                                <thead>
                                    <tr>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">#Orden</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Fecha Orden</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important"># Orden de SAlida</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Cliente</th>
                                        <th style=" color:#FFFFFF; background-color: #616161  !important">Valor</th>
                                     
                                        



                                    </tr>
                                </thead>
                                <tbody id="TransporteList">

                                </tbody>

                            </table>
                        </div>
                                
                                        <div class="row">
                                <div class="col-sm">

                                </div>
                                <div class="col-sm">

                                </div>
                                <div class="col-sm">

                                </div>
                                <div class="col-sm">

                                </div>

                                <!--<hr>-->   
                                <div class="col-sm-3">
                                    <hr>
                                    <div class=" row"  id="div_conductores">

                                      
                                        <div class="col-sm-6 p-xs">
                                            
                                        </div>                      
                                    </div>                

                                    <div class="  row">
<!--                                        <label class="col-sm-6 col-form-label"><b>DESCUENTO $</b></label>
                                        <div class="col-sm-6 p-xs">
                                            <input value="0" style=" border:1px solid #ffffff;" type="text" id="Inputfact_descuento" name="fact_descuento" class="div>form-control" onchange="restar();">
                                        </div>-->
                                    </div>    
                                    <div class="  row">
                                        <label class="col-sm-6 col-form-label"><b>TOTAL $</b></label>
                                        <div class="col-sm-6 p-xs">
                                            <input style=" border:1px solid #ffffff;" type="text" id="Inputfact_total_Tra" name="fact_total" class="form-control" value="0" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button type="button" id="agregarProd" class="btn btn-primary" onclick="enviarFactura()" style="width: 100% " disabled>
                                            + Imprimir
                                        </button>  
                                    </div>
                                    <br>     
                                </div>

                            </div>
                        
                    </div>

<script>
    
    $(document).ready(function () {

      cargarTotales();

//      $("#Inputpersona_cedula").onChange();

    });
    
    function  cargarTotales(){
          
//          alert();
    var Id_chofer2= document.getElementById('InputId_orden').value;
    var fecha_ini_tra2= document.getElementById('Imputfecha_inicio_tran').value;
    var fecha_fin_tra2= document.getElementById('Imputfecha_fin_tran').value;
     document.getElementById('Inputfact_total_Tra').value='0';
    var empresa=Id_chofer2+" "+fecha_ini_tra2+" "+fecha_fin_tra2;
//          alert(empresa);
                  $.get('../back/controller/Reporte_transporte_Total.php', {'empresa': empresa}, function (depa) {
                                  depa = JSON.parse(depa);
                                      $("#Inputfact_total_Tra").val(depa[1].transporte_flete);
                                      console.log(depa[1].transporte_flete);
                                     
                                  });
                              

    }
</script>