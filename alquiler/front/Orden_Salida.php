 <?php $fcha = date("Y-m-d"); ?>


<html>
    <head>  
        <title>Crear alquileres</title>
        <link rel="stylesheet" href="css/jquery-editable-select.min.css" />
        <script src="js/jquery-editable-select.min.js"></script>        
    </head>

    <div>
        <div class="panel panel-default">
            <div class="ibox-title"> 
                <div style="text-align: center; color: white">
                    <h1><b>Orden de Salida</b></h1>
                </div>
            </div>
            <div align=center class="panel-body">
                <!--<form role="form" id="PersonaInsert">-->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                             <div class="col-sm-3" >
                                                            <label class=" col-form-label"><b>Nit:</b></label>

                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select name="country" oninput="getSelectValue()" id="Inputpersona_cedula" class="form-control">

                                    </select>
                                </div> 
                            </div>
                           

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class=" row">
                            <label class="col-sm-3 col-form-label"><b>Fecha :</b></label>

                            <div class="col-sm-9 p-xs ">
                                <input id="inputfecha_inicio" value="<?php echo $fcha; ?>" type="date"  class="form-control" ></div>
                        </div>

                    </div>
                    <div class="col-lg-2">  

                        <div class="form-group row"><label id="labelOrdenAbierta" class="col-lg-2 col-form-label" style="color: red; font-size: 24; visibility: hidden;"><b>Orden abierta</b></label>

                            <div class="col-lg-6"><input display="none" name="num_factura" id="Inputnum_factura" type="text" placeholder="0" class="form-control" style="color: red; font-size: 28 ; font-weight: bold; border: 1px solid #ffffff;    background-color: #ffffff;visibility: hidden;" readonly>
                            </div>
                        </div>         
                    </div></div>

                <div class="row">
                    <div class="col-lg-6" style="font-size: 12px; font-weight: bold; " >

                        <div class="form-group"  style="display: none">
                            <label for="Inputid">id</label>
                            <input  type="text" name="id" class="form-control" id="Inputid" placeholder="id" required>
                        </div>

                        <div class=" row ">
                            <label style="text-align: left" class="col-sm-4 col-form-label"><b>Nombre y Apellido :</b></label>

                            <div class="col-sm-8 p-xs  " >
                                <input  type="text" id="Inputnombres" name="nombres" class="form-control" readonly></div>
                        </div>




                        <div class="  row">
                            <label class="col-sm-2 col-form-label"><b>Cedula :</b></label>

                            <div class="col-sm-10 p-xs "><input  type="text" id="Inputcc" name="cc" class="form-control" readonly></div>
                        </div>
                        <div class="  row">
                            <label class="col-sm-2 col-form-label"><b>Telefono :</b></label>

                            <div class="col-sm-10 p-xs "><input  type="text" id="Inputtelefono" name="telefono" class="form-control" readonly></div>
                        </div>
                        <div class="  row">
                            <label class="col-sm-2 col-form-label"><b>Obra :</b></label>

                            <div class="col-sm-10 p-xs "><input  type="text" id="obra" name="obra" class="form-control" maxlength="100"></div>
                        </div>
                        <div class="  row">
                            <label class="col-sm-2 col-form-label"><b>Direccion Obra:</b></label>

                            <div class="col-sm-10 p-xs "><input  type="text" id="direccionObra" maxlength="200" name="obra" class="form-control" ></div>
                        </div>
                        <br>











                    </div>


                    <div class="col-lg-6" style="font-size: 12px; font-weight: bold; ">
                        <!--<div class="container">-->

                        <div class=" row">
                            <label class="col-sm-2 col-form-label"><b>Direccion:</b></label>

                            <div class="col-sm-10 p-xs "><input   type="text" id="Inputdireccion" name="direccion" class="form-control" readonly></div>
                        </div>
                        <div class="  row">
                            <label class="col-sm-2 col-form-label"><b>Correo :</b></label>

                            <div class="col-sm-10 p-xs "><input  type="text" id="Inputcorreo" name="correo" class="form-control" readonly></div>
                        </div>
                        <div class="  row">
                            <label class="col-sm-2 col-form-label"><b>Observacion:</b></label>

                            <div class="col-sm-10 p-xs ">
                                <textarea  type="text" id="InputObservacion" rows="6"  name="Observacion" class="form-control" ></textarea>
</div>
                        </div>


                    </div>



                </div>


                <!--</form>-->
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div>


    <hr>

    <div id="mostrarcontenido2" style="display: none">
        
        <div class="panel panel-default">
   
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">             
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm">
                                    <button type="button" id="agregarProduc" class="btn btn-primary" onclick="modalProductos()">
                                        + Agregar productos
                                    </button>
                                </div>
                                <div class="col-sm"></div>
                                <div class="col-sm"></div>
                                <div class="col-sm"></div>
                                <div class="col-sm"></div>
                                <div class="col-sm">                    
                                   <!-- 
                                        <button type="button" id="btn_admin_conductor" class="btn btn-primary" onclick="administrarConductor()" disabled>
                                        Añadir Transporte
                                        </button>
                                    -->
                                </div>
                            </div>


                            <div class="ibox-tools">



                            </div>
                            <div class="table-responsive">
                                <table id="mytable"   class="table table-striped" >
                               <!-- <table class="table table-striped table-bordered table-hover dataTables-example" >-->
                                    <thead>
                                        <tr>
                                            <th style=" color:#FFFFFF; background-color: #616161  !important">Id</th>
                                            <th style=" color:#FFFFFF; background-color: #616161  !important">Nombre</th>
                                            <th style=" color:#FFFFFF; background-color: #616161  !important">Descripcion</th>
                                            <th style=" color:#FFFFFF; background-color: #616161  !important">Precio</th>
                                            <th style=" color:#FFFFFF; background-color: #616161  !important">Cantidad</th>
                                            <th style=" color:#FFFFFF; background-color: #616161  !important">Desc</th>
                                               <th style=" color:#FFFFFF; background-color: #616161  !important">Dias Prestamo</th>
                                            <th style=" color:#FFFFFF; background-color: #616161  !important">Valor Total</th>

                                        



<!--                                        <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-eye"></i></th>
                                        <th  style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-edit"></i></th>-->
                                            <th style=" color:#FFFFFF; background-color: #616161  !important"><i class="fa fa-trash"></i></th>


                                        </tr>
                                    </thead>
                                    <tbody id="Ventas_factList">
                                        <tr>

                                            <th style="padding: 1px;" ></th>
                                            <th style="padding: 1px;" ></th>
                                            <th style="padding: 1px;" ></th>
                                            <th style="padding: 1px;" ></th>
                                            <th style="padding: 1px;" ></th>
                                            <th style="padding: 1px;" ></th>
                                            <th style="padding: 1px;" ></th>
                                            <th style="padding: 1px;" ></th>
                                            <th style="padding: 1px;" ></th>

                                        </tr>
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
                                    <div class=" row" style="visibility: hidden;" id="div_conductores">

                                        <select class="col-sm-6 form-control"  id="InputChoferes">

                                        </select>  
                                        <div class="col-sm-6 p-xs">
                                            <input value="0" id="input_flete" style=" border:1px solid #ffffff;" type="number" min="0" class="form-control" onchange="restar()">
                                        </div>                      
                                    </div>                

                                    <div class="  row" style="display: none">
                                        <label class="col-sm-6 col-form-label"><b>DESCUENTO $</b></label>
                                        <div class="col-sm-6 p-xs">
                                            <input value="0" style=" border:1px solid #ffffff;" type="text" id="Inputfact_descuento" name="fact_descuento" class="form-control" onchange="restar();">
                                        </div>
                                    </div>    
                                    <div class="  row">
                                        <label class="col-sm-6 col-form-label"><b>TOTAL $</b></label>
                                        <div class="col-sm-6 p-xs">
                                            <input style=" border:1px solid #ffffff;" type="text" id="Inputfact_total" name="fact_total" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button type="button" id="agregarProd" class="btn btn-primary" onclick="enviarFactura()" style="width: 100% " disabled>
                                            + Enviar Factura
                                        </button>  
                                    </div>
                                    <br>     
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
            
            </div>
    </div>

    <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">


        <div class="modal-dialog modal-lg mdialTamanio">
            <div id="menumodal1" class="modal-content animated flipInY">
                <form role="form" id="ProductInsert">
                    <!--                                        <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                <h4 class="modal-title">Listar Usuarios</h4>
                                                               
                                                            </div>-->
                    <div class="modal-body">
                        <div class="panel panel-default">
                            <!--        <div align=center class="panel-heading"><h3 class="panel-title">Registrar clientes</h3></div>-->
                            <div align=center class="panel-body">





                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="row">
                                            <div class="col-sm-9">
                                                <div class="form-group">

                                                    <label for="Inputproducto">Productos </label>
                                                    <select  name="producto"  class="form-control" id="Inputproducto"  onchange="mostrarDatosP(this.value);">


                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Inputpersona_nombre">Cantidad </label>
                                                    <input type="number" name="canti" class="form-control" id="Inputcanti" min="1" value=0 onChange="multiplicar();">
                                                </div>
                                            </div>

                                        </div>




                                        <div class="form-group" style="display: none">
                                            <label for="Inputprodc_referencia">N# Ref </label>
                                            <input type="text" name="prodc_referencia" class="form-control" id="Inputprodc_referencia"  required>
                                        </div>

                                        <div class="form-group">
                                            <label for="Inputproduc_nombre">Nombre </label>
                                            <input type="text" name="produc_nombre" class="form-control" id="Inputproduc_nombre"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Inputprodc_descr">Descripcion</label>
                                            <input type="text" name="prodc_descr" class="form-control" id="Inputprodc_descr" >
                                        </div>

                                        <div class="form-group">
                                            <label for="Inputproc_dias">Dias Prestamo</label>
                                            <input type="text" name="proc_dias" class="form-control" id="Inputproc_dias"  required>
                                        </div>                  

                                    </div>



                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="Inputproct_stock">Stock</label>
                                            <input type="text" name="proct_stock" class="form-control" id="Inputproct_stock"  required>
                                        </div>       
                                        
                                       
                                        <div class="form-group" style="display: none">
                                            <label for="Inputdescuento">Descuento</label>
                                            <input type="text" name="descuento" class="form-control" id="Inputdescuento"  value="0"  onChange="recalcular();" readonly="true">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="Inputpersona_cedula">Precio</label>
                                            <input type="text" name="precio_unitario" class="form-control" id="Inputprecio_unitario"  value=0 onChange="multiplicar();" >
                                        </div>

                                        <div class="form-group">
                                            <label for="Inputprecio_total">precio Total</label>
                                            <input type="text" name="precio_total" class="form-control" id="Inputprecio_total"  value="0">
                                        </div>


                                    </div>

                                </div>


                            </div> <!-- panel -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="editar" id="adicionar"type="button" class="btn btn-primary" disabled="true" >Agregar</button>
                        <!--                                            <button name="editar" id="editar" type="button" class="btn btn-primary" onclick="registraraProducto()">Agregar</button>-->
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>


                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de confirmacion para generar factura -->
    <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                    <h4 class="modal-title" style="font-size: 15px">¿Desea imprimir esta orden de salida?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="imprimirOrdenSalida()">Imprimir</button>
                    <button type="button" class="btn btn-white center" data-dismiss="modal">Cancelar</button>                                           
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal de confirmacion para generar factura -->
    <script src="js/Ajax.js "></script>
    <script src="js/ViewManager.js "></script>
    <script src="js/HtmlBuilder.js "></script> 

    <script>

/////////////////////////////////////////////////
/*
 * Necesito saber cuando agrego o quito el conductor a la factura parcial.
 * Por esa razon, solamente compruebo si es par agregado, impar no agregado.
 * Inicia en uno porque es impar, eso significa que aun no se agregado ningun conductor.
 */
is_conductor_agregado = 1;

/*
 * Contiene todos los clientes registrados en base de datos.
 * El unico momento en que esto se actualiza es el document on ready. 
 */
clientes = [];

/*
 * Esta variable definira
 *
 */
clienteCcOrdenSalida = -1;
//////////////////////////////////////////////// 

$(document).ready(function () {

    //cargareNum_Factura();
    cargarClientes();
    cargarConductos();

});

    

function cargareNum_Factura() {

    $.get('../back/controller/Factura_id.php', function (depa) {

        depa = JSON.parse(depa);

        $("#Inputnum_factura").val(depa[1].idfactura);//direccion

    });
}

function cargarClientes() {
    $.ajax({
        url: '../back/controller/Cliente_list.php',
        type: 'get',
        success: function (response) {
            clientes = JSON.parse(response);
            clientes.shift();
            construirOptionComboBuscarClientes(clientes);
            $('#Inputpersona_cedula')
                    .editableSelect()
                        .on('select.editable-select', function (e, li) {
                            buscarcedula();
                        });
        },
        error: function (response) {
            console.log("No se ha podido cargar los clientes")
        }
    });
}

function construirOptionComboBuscarClientes(misClientes) {
    mi_select = document.getElementById('Inputpersona_cedula');
    for (let i in misClientes) {
        mi_option = document.createElement("option");
        mi_option.setAttribute("value", misClientes[i].cliente_cc);
        mi_option.appendChild(document.createTextNode(misClientes[i].cliente_nombre));
        mi_select.appendChild(mi_option);
    }
    //Esto hay que arreglarlo. La idea es que los nombres y numeros de cedula no se combinan
    for (let i in misClientes) {
        mi_option = document.createElement("option");
        mi_option.setAttribute("value", misClientes[i].cliente_cc);
        mi_option.appendChild(document.createTextNode(misClientes[i].cliente_cc));
        mi_select.appendChild(mi_option);
    }
}

var prod_alq = [];

function enviarFactura() {
    var nun_factura = document.getElementById("Inputnum_factura").value;
    if(nun_factura === ""){
        nun_factura = 0;
    }
    var clienete = document.getElementById("Inputid").value;
    //var flete = document.getElementById("input_flete").value;
    //var conductor = document.getElementById("InputChoferes").value;
    //var descuent = document.getElementById("Inputfact_descuento").value;
    var alquileres = '[' + prod_alq + ']';
    //nuevos datos para el recibo
    var fecha = document.getElementById("inputfecha_inicio").value;
    var obra = document.getElementById("obra").value;
    var direccObra = document.getElementById("direccionObra").value;
    var observacion = document.getElementById("InputObservacion").value;

    if (JSON.parse(alquileres).length > 0) {

        var parametros = {
            "factura_id": nun_factura,
            "fecha_inicio": fecha,
            //"descuento": descuent,
            "cliente_id": clienete,
            //"transporte_flete": flete,
            //"conductor_nombre": conductor,
            "alquileres": alquileres,
            "obra" : obra,
            "direccionObra" :  direccObra,
            "observacion" : observacion
        };
        console.log(parametros);
        $.ajax({
            data: parametros, //datos que se envian a traves de ajax
            url: '../back/controller/crearFactura.php', //archivo que recibe la peticion
            type: 'post', //método de envio
            beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");

            },
            success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                console.log(response);
                rta = JSON.parse(response);
                if (rta.factura_id >= 0) {                    
                    //facturas_by_fecha();
                    modal5();
                } else {
                    alert("Ha habido un problema con la solicitud");
                }
            },
            error: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                $("#resultado").html(response);
            }
        });

    } else {
        alert("La factura está vacía. \nRegistra algunos productos para alquilar y vuelve a intentarlo.")
    }
}

$('#visibilityHidden').click(function (e) {

    // Resetear, por si acaso has estado jugando con la otra propiedad
    $('#hide-me').css('display', 'block');

    if ($('#hide-me').css('visibility') != 'hidden') {
        $('#hide-me').css('visibility', 'hidden');
    } else {
        $('#hide-me').css('visibility', 'visible');
    }
});


function modal5() {
    $('#myModal5').modal({show: true});
}



function imprimirOrdenSalida() {
    var clienteCc = document.getElementById("Inputcc").value;
    var nun_factura = document.getElementById("Inputnum_factura").value;
    window.open('reciboOrdenesSalida.html?clienteCc=' + clienteCc + '&nun_factura=' + (nun_factura-1));
    
}




/*
 * Esta funcion hace muchas cosas que no entiendo, lo unico que me interesa es lo de abajo
 * Cada vez que le dan agregar producto se inserta en la variable globa prod_alq
 */
function recorrerTabla() {
    /*recorro la tabla para calcular las columnas del precio para total y hacer desuento*/
    rtotal = 0;
    m1 = 0;
    prod_alq = [];
    $("#mytable tbody tr").each(function (index) {
        if (index != 0) {
            var campo1, campo2, campo3;
            $(this).children("td").each(function (index2) {
                switch (index2) {
                    case 0:
                        campo1 = $(this).text();
                        break;
                    case 4:
                        campo2 = $(this).text();
                        break;
                    case 7:
                        campo3 = $(this).text();

                        rtotal = parseInt(rtotal) + parseInt(campo3);


                        break;
                }
                $(this).css("background-color", "#ECF8E0");
            });
            var text2 = '{ "id_producto":"' + campo1 + '" , "cantidad":"' + campo2 + '", "valor":"' + campo3 / campo2 + '" }';
            prod_alq.push(text2);
        }
        m1 = document.getElementById("Inputfact_descuento").value;

        flete = document.getElementById("input_flete").value;

        rtotal2 = 0;
        rtotal2 = parseInt(rtotal) - parseInt(m1) + parseInt(flete);

        document.getElementById("Inputfact_total").value = rtotal2;



    })
}
;

function sumar(valor) {


    m1 = valor;

    rtotal = parseInt(rtotal) + parseInt(m1)


    document.getElementById("Inputfact_total").value = rtotal;



}
;
function restar() {/*se llama a recorrer para q recalcule con el dato de descuento*/

    recorrerTabla();

}
;

function recalcular() {
    subtotal = 0;

    m11 = document.getElementById("Inputdescuento").value;
    ;

    m22 = document.getElementById("Inputprecio_total").value;

    subtotal = parseInt(m22) - parseInt(m11)


    document.getElementById("Inputprecio_total").value = subtotal;

}
;

function buscarcedula() {
    var basic_text = document.getElementById("Inputpersona_cedula").value;

    var basic_value = $("#Inputpersona_cedula").siblings('.es-list').find('li.selected').attr('value');

    empresa = basic_value;

    consultarUltimaOrdenAbiertaByClienteCedula(empresa);

    $.get('../back/controller/Cliente_Detalles_1.php', {'empresa': basic_value}, function (depa) {
        depa = JSON.parse(depa);
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
            Activar_tabla();
        }
    });
}

function consultarUltimaOrdenAbiertaByClienteCedula(clienteCedula){
     $.post('../back/controller/consultarUltimaOrdenAbiertaByClienteCedula.php', 
        {'cliente_cedula': clienteCedula}, 
        function (depa) {
        depa = JSON.parse(depa);
        console.log(depa);
        myfactura = depa[1].factura; 
        if(myfactura != -1){
            document.getElementById("labelOrdenAbierta").style.visibility = "visible";
            aparearElValueAunConjuntoDeElementos(["obra", "direccionObra","InputObservacion"],[myfactura.obra, myfactura.direccion_obra,myfactura.observacion]);
            insertarElMismoAtributoAunConjuntoDeElementos(["obra", "direccionObra","InputObservacion"],"readonly",true);
            $('#inputfecha_inicio').val(myfactura.fecha.split(" ")[0]);
        }else{
            document.getElementById("labelOrdenAbierta").style.visibility = "hidden";
            setFechaElement("inputfecha_inicio");
            aparearElValueAunConjuntoDeElementos(["obra", "direccionObra","InputObservacion"],["","",""]);
            eliminarElMismoAtributoAunConjuntoDeElementosConMusicaLinkingParkDeFondo(["obra", "direccionObra","InputObservacion"],"readonly");
        }
    });

}

//--- Conjunto de funciones maricas que al final del dia son utiles

    function aparearElValueAunConjuntoDeElementos(idElementos, innerHTMLs) {
        for(let i in idElementos){
            document.getElementById(idElementos[i]).value = innerHTMLs[i];
        }
    }

    function insertarElMismoAtributoAunConjuntoDeElementos(idElementos, atributo, value){
        for(let i in idElementos){
            document.getElementById(idElementos[i]).setAttribute(atributo, value);
        }
    }

    function eliminarElMismoAtributoAunConjuntoDeElementosConMusicaLinkingParkDeFondo(idElementos, atributo){
        for(let i in idElementos){
            document.getElementById(idElementos[i]).removeAttribute(atributo);
        }
        /*It starts with one thing I don't know why It doesn't even matter how hard you try Keep that in mind*/
    }

    function setFechaElement(idElement){
        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0,10);
        });

        $('#'+idElement).val(new Date().toDateInputValue());
    }

//---

    

function multiplicar() {
    can = 0;
    m1 = 0;
    diasp=0;
    canti = 0;
    stock1 = 0;
    if (canti > 0) {

    }
    canti = parseInt(document.getElementById("Inputcanti").value, 10);
    stock1 = parseInt(document.getElementById("Inputproct_stock").value, 10);
//    diasp = parseInt(document.getElementById("Inputproc_dias").value, 10);
    if (stock1 < canti) {
        alert('LA CANTIDAD SUPERA EL STOCK');

        document.getElementById("Inputcanti").value = "" + stock1;

        return;
    } else {
        Activar_productos();
       diasp =document.getElementById("Inputproc_dias").value;
        m1 = document.getElementById("Inputcanti").value;
        m2 = document.getElementById("Inputprecio_unitario").value;
        r = parseInt(m1) * parseInt(m2) * parseInt(diasp);
        document.getElementById("Inputprecio_total").value = r;
    }

}

       
    

function Descuento() {
    can = 0;
    m1 = 0;
//   can=document.getElementById("Inputcantidad").value;  
    m1 = document.getElementById("Inputprecio_total").value;


    m2 = document.getElementById("descuento").value;
    r = m1 - m2;
    document.getElementById("Inputprecio_total").value = r;
}


function Activar_Cho_enviar() {


    document.getElementById('agregarProd').disabled = false;
    document.getElementById('btn_admin_conductor').disabled = false;
}


function Activar_productos() {


    document.getElementById('adicionar').disabled = false;
//      document.getElementById('btn_admin_conductor').disabled=false;
}
;

function desactivar_productos() {


    document.getElementById('adicionar').disabled = true;
//      document.getElementById('btn_admin_conductor').disabled=false;
}
;

function desactivar_Cho_enviar() {


    document.getElementById('agregarProd').disabled = true;
    document.getElementById('btn_admin_conductor').disabled = true;
}
;
//      document.getElementById('editar').disabled=true;
//  $( "input:radio" ).on("click",function(){
//  $("input[type=submit]").removeAttr("disabled"); 

//     
//   
//};

function Activar_tabla() {
    // Resetear, por si acaso has estado jugando con la otra propiedad
    $('#mostrarcontenido2').css('display', 'block');
    $('#mostrarcontenido2').css('visibility', 'visible');
//  if( $('#mostrarcontenido2').css('visibility') != 'hidden' ) {
//    $('#mostrarcontenido2').css('visibility', 'hidden');
//  } else {
//    $('#mostrarcontenido2').css('visibility', 'visible');
//  }

}
;

function modalProductos() {
//               $('#myModalDetalles').addClass(' data-backdrop="static" data-keyboard="false"');
    $('#myModal2').modal({show: true});
//               $('#myModal2').modal('hide');//cerrarlo
    cargarProductos();
}

function cargarProductos() {
    ActivarEditar();
//       alert();
    $.get('../back/controller/Producto_list.php', function (depa) {

        var mySelect = document.getElementById("Inputproducto");
        removeAllChildren(mySelect);
        mySelect.appendChild(createOPTION(-1, 'SELECCIONE'));
        depa = JSON.parse(depa);
        for (var i = 1; i < depa.length; i++) {
            mySelect.appendChild(createOPTION(depa[i].idprod, depa[i].prod_nombre+" - "+depa[i].prod_descripcion));
        }

    });
}

function cargarConductos() {
//                                  ActivarEditar();
//       alert();
    $.get('../back/controller/Chofer_list.php', function (depa) {

        var mySelect = document.getElementById("InputChoferes");
        removeAllChildren(mySelect);
        mySelect.appendChild(createOPTION(-1, 'SELECCIONE'));
        depa = JSON.parse(depa);
        for (var i = 1; i < depa.length; i++) {
            mySelect.appendChild(createOPTION(depa[i].idchoferes, depa[i].nom_chofer));
        }

    });
}

function mostrarDatosP(empresa) {

//        alert(empresa);

    $.get('../back/controller/Producto_detalles.php', {'empresa': empresa}, function (depa) {



        depa = JSON.parse(depa);



        $("#Inputprodc_referencia").val(depa[1].idprod);
        $("#Inputproduc_nombre").val(depa[1].prod_nombre);
        $("#Inputprodc_descr").val(depa[1].prod_descripcion);
        $("#Inputprecio_unitario").val(depa[1].prod_precio);
//        $("#Inputdescuento").val(depa[1].prod_precio);
        $("#Inputproct_stock").val(depa[1].prod_stock);
        $("#Inputproc_dias").val(depa[1].foto);







    });
}


    </script> 
    <script>
        $(document).ready(function () {
            //obtenemos el valor de los input
            i = 1;

            $('#adicionar').click(function () {

                var idref = document.getElementById("Inputprodc_referencia").value;
                var nombre = document.getElementById("Inputproduc_nombre").value;
                var descripcion = document.getElementById("Inputprodc_descr").value;
                var v_unit = document.getElementById("Inputprecio_unitario").value;
                var canti = document.getElementById("Inputcanti").value;
                var descuen = document.getElementById("Inputdescuento").value;
                var precio_total = document.getElementById("Inputprecio_total").value;
                var alquiler = document.getElementById("Inputproc_dias").value;

                var fila = '<tr id="row' + i + '">\n\
    <td>' + idref + '</td><td>' + nombre + '</td><td>' + descripcion + '</td>\n\
    <td>' + v_unit + '</td><td>' + canti + '</td><td>' + descuen + '</td><td>' + alquiler + '</td><td>' + precio_total  + '</td>\n\
    <td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

                i++;

                $('#Ventas_factList tr:first').after(fila);
                //  $('#mytable tr:first').after(fila);
                recorrerTabla();
                $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
                //    var nFilas = $("#mytable tr").length;
                var nFilas = $("#Ventas_factList tr").length;
                $("#adicionados").append(nFilas - 1);
                //le resto 1 para no contar la fila del header
                document.getElementById("Inputprodc_referencia").value = "";
                document.getElementById("Inputproduc_nombre").value = "";
                document.getElementById("Inputprodc_descr").value = "";
                document.getElementById("Inputprecio_unitario").value = "0";
                document.getElementById("Inputcanti").value = "0";
                document.getElementById("Inputprecio_total").value = "0";
                document.getElementById("Inputproc_dias").value = "0";
                document.getElementById("Inputproct_stock").value = "0";
                document.getElementById("Inputproducto").value = "-1";
                document.getElementById("Inputproducto").focus();

                desactivar_productos();
                Activar_Cho_enviar();
            });
            var nFilas = 0;
            $(document).on('click', '.btn_remove', function () {

                var button_id = $(this).attr("id");
                //cuando da click obtenemos el id del boton
                $('#row' + button_id + '').remove(); //borra la fila

                //limpia el para que vuelva a contar las filas de la tabla
                $("#adicionados").text("");
                nFilas = $("#Ventas_factList tr").length;
                $("#adicionados").append(nFilas - 1);

//                    nFilas = $("#Ventas_factList tr").length;

//                    alert('asasa'+nFilas);

                if (nFilas === 1) {
//                           alert('asasa 2'+nFilas);
                    desactivar_Cho_enviar();
                }
recorrerTabla();
            });
//            recorrerTabla();
        });



        /*
         * Funcion encargada de administrar el estado de los conductores.
         */
        function administrarConductor() {
            is_conductor_agregado = is_conductor_agregado + 1;
            boton = document.getElementById("btn_admin_conductor");
            contenedor = document.getElementById("div_conductores");
            if ((is_conductor_agregado % 2) == 0) {
                boton.innerHTML = "Quitar Transporte";
                contenedor.style.visibility = "visible";
            } else {
                boton.innerHTML = "Añadir Transporte";
                contenedor.style.visibility = "hidden";
                input_flete.value = 0;
                restar();
            }
        }
    </script>

</html>
