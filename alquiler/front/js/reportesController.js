/* 
 * Hecho a mano por el benévolo señor Arciniegas
 * Sí, voy a poner comentarios en cuanto archivo cree ¿y qué?
 */

//MIS VARIABLES GLOBALES, NO TOQUES MI BASURA/////
faturas_global = [];
factura_id_select = -1
alquiler_devolucion_select = -1
//Esta variable es la cantidad de articulos alquilados, esta variable se utiliza en el proceso de devolucion parcial 
currentAlquiler = {};
//////////////////////////////////////////////////

function buscar_factura_by_fecha() {

    ultimaBusquedafuction = 0;

    var url = "../back/controller/reportePorTiempo.php";

    var fechas = {"fecha_ini": $('#fecha_inicio').val(), "fecha_fin": $('#fecha_fin').val()}

    $.ajax({
        type: "POST",
        url: url,
        data: fechas,

        success: function (data) {
            facturas_global = JSON.parse(data);
            //console.log(JSON.parse(data));
            if ($.isEmptyObject(facturas_global)) {
                mostrar_datos_vacios();
            } else {
                mostrar_reporte(facturas_global);
            }

        }
    });

}

function buscar_factura_by_cliente() {

    ultimaBusquedafuction = 1;

    var url = "../back/controller/reportePorCliente.php";

    var cedula = $('#cliente_cedula').val();
    if (cedula == null || cedula == "") {
        alert("Debe proporcionar un número de cédula para buscar");
    } else {
        var params = {"cliente_cedula": cedula}
        $.ajax({
            type: "POST",
            url: url,
            data: params,

            success: function (data) {
                facturas_global = JSON.parse(data);
                //console.log($.isEmptyObject(facturas_global));

                if ($.isEmptyObject(facturas_global)) {
                    mostrar_datos_vacios();
                } else {
                    mostrar_reporte(facturas_global);
                }

            }
        });
    }
}

function mostrar_reporte(data) {
    contenedor = document.getElementById('FacturasList');
    contenedor.innerHTML = "";

    for (let i in data) {
        mi_tr = tr("gradeX footable-even");
        //id
        mi_tr.appendChild(td(data[i].id, "footable-visible footable-first-column"));
        //nombre
        mi_tr.appendChild(td(data[i].cliente.cliente_nombre, "footable-visible"));
        //fecha
        mi_tr.appendChild(td(data[i].fecha, "footable-visible"));
        //total
        mi_tr.appendChild(td(formatearDinero(data[i].total), "footable-visible"));
        //pagado
        if (data[i].pagado) {
            mi_tr.appendChild(td_icono(data[i].id, "mostrar_alquileres", "check"));
        } else {
            mi_tr.appendChild(td_icono(data[i].id, "mostrar_alquileres", "times"));
        }
        //devuelto
        if (data[i].devuelto) {
            mi_tr.appendChild(td_icono(data[i].id, "mostrar_alquileres", "check"));
        } else {
            mi_tr.appendChild(td_icono(data[i].id, "mostrar_alquileres", "times"));
        }
        //detalles
        mi_tr.appendChild(td_icono(data[i].id, "mostrar_alquileres", "search-plus"));
        //devolver todo
        mi_tr.appendChild(td_icono(data[i].id, "devolverTodo", "hand-o-left", data[i].devuelto));
        //abonar
        mi_tr.appendChild(td_icono(data[i].id, "mostrar_abonos", "money", data[i].pagado));

        contenedor.appendChild(mi_tr);
    }

    seleccionarTabla();
}

function mostrar_datos_vacios() {
    contenedor = document.getElementById('FacturasList');
    contenedor.innerHTML = "";
    mi_tr = tr("gradeX footable-even");
    //Perdon por hacer esto, pero por alguna razon al segundo intento el metod td no sirve
    var td = document.createElement("td");
    td.setAttribute("class", "footable-visible footable-first-column");
    td.appendChild(document.createTextNode("No existen facturas para dentro de los parámetros de búsqueda"));
    td.setAttribute("colspan", 9);
    mi_tr.appendChild(td);
    contenedor.appendChild(mi_tr);
}

function tr(clase) {
    var tr = document.createElement("tr");
    tr.setAttribute("class", clase);
    return tr;
}

//Necesitada modificarlo para que el texto estuviera centrado
function td(texto, clase) {
    var td = document.createElement("td");
    td.setAttribute("class", clase);
    td.appendChild(document.createTextNode(texto));
    return td;
}

function td_icono(id_factura, onclick, icono, disabled = false) {
    var td = document.createElement("td");
    td.setAttribute("class", "footable-visible");
    td.setAttribute("style", "font-size: 15px; text-align: center;");
    var a = document.createElement("a");
    aux = onclick + "(" + id_factura + ")";
    if (!disabled) {
        a.setAttribute("onclick", aux);
    } else {
        a.setAttribute("style", "color: currentColor; cursor: not-allowed; opacity: 0.5;");
    }
    var i = document.createElement("i");
    var clase = "fa fa-" + icono;
    i.setAttribute("class", clase);
    a.appendChild(i);
    td.appendChild(a);
    return td;
}


var ultimaBusquedafuction = 0;

function rebuscarUltimaBusqueda() {
    if (ultimaBusquedafuction == 0) {
        buscar_factura_by_fecha();
    } else {
        buscar_factura_by_cliente();
    }
}

function devolverTodo(factura_id) {
    var formData = {};
    formData["factura_id"] = factura_id;
    $.post('../back/controller/devolverTodo.php', formData, function (result, state) {
        postDevuelto(result, state);
    });
}

function postDevuelto(result, state) {
//Maneje aquÃ­ la respuesta del servidor.
//Consideramos buena prÃ¡ctica no manejar cÃ³digo HTML antes de este punto.
    if (state == "success") {
        if (result == "exito") {
            alert("Devuelto con éxito");
            rebuscarUltimaBusqueda();
        } else {
            alert("Hubo un errror en la petición ( u.u)\n" + result);
            console.log(result);
            rebuscarUltimaBusqueda();
        }
    } else {
        rebuscarUltimaBusqueda();
        alert("Hubo un errror interno ( u.u)\n" + result);
    }
}

function formatearDinero(dinero) {
    dinero = dinero.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
    dinero = dinero.split('').reverse().join('').replace(/^[\.]/, '');
    return "$ " + dinero;
}

var anchoTabla = 7;
function mostrar_alquileres(id_factura, flag_repaint = true, imprimir = false) {
    contenedor = document.getElementById('articulosList');
    contenedor.innerHTML = "";
    alquiler = obtenerFactura(id_factura).alquileres;
    factura_id_select = id_factura;
    for (let i in alquiler) {
        mi_tr = tr("gradeX footable-even");
        //Nombre
        mi_tr.appendChild(td(alquiler[i].producto_nombre, "footable-visible"));
        //Valor unitario
        mi_tr.appendChild(td(formatearDinero(alquiler[i].valor), "footable-visible"));
        //Cantidad
        mi_tr.appendChild(td(alquiler[i].cantidad, "footable-visible"));
        //Dias
        mi_tr.appendChild(td(alquiler[i].dias, "footable-visible"));
        //Total
        mi_tr.appendChild(td(formatearDinero(alquiler[i].subTotal), "footable-visible"));
        //Devoluciones
        mi_tr.appendChild(parsearDevoluciones(JSON.parse(alquiler[i].devoluciones)));
        //Devolver parcial
        if (!imprimir) {
            mi_tr.appendChild(td_icono(alquiler[i].alquiler_id, "habilitarFormularioDevolucion", "hand-o-left", alquiler[i].devuelto));
        } else {
            anchoTabla = 6;
        }

        contenedor.appendChild(mi_tr);
    }


    //Aqui va la segunda parte de la lista
    setConductores(id_factura);
    //Aqui va la parte de devoluciones
    setAbonos(id_factura);
    // y aúúúúún hay máááás
    setDescuento(id_factura);
    //Parte final
    var factura = obtenerFactura(id_factura);
    document.getElementById('total_factura').innerHTML = "Total factura: " + formatearDinero(factura.total);
    document.getElementById('total_pagar').innerHTML = "Total a pagar: " + formatearDinero(factura.total - factura.totalAbonado);

    if (!imprimir) {
        aux = "abrirImpresion('" + id_factura + "')";
        btn_exportar.setAttribute("onClick", aux);
        if (flag_repaint) {
            $('#myModalDetalles').modal({show: true});
        }
}
}

function setConductores(id_factura) {
    contenedor = document.getElementById('articulosList');
    mi_tr = tr("gradeX footable-even");
    var mi_td = document.createElement("td");
    mi_td.setAttribute("class", "footable-visible footable-first-column th");
    mi_td.appendChild(document.createTextNode("Servicio de transporte"));
    mi_td.setAttribute("colspan", anchoTabla);
    mi_td.setAttribute("style", " color:#FFFFFF; background-color: #616161  ");
    mi_tr.appendChild(mi_td);
    contenedor.appendChild(mi_tr);
    conductores = getConductoresByFactura(id_factura);
    if (conductores.length > 0) {
        for (let i in conductores) {
            mi_tr = tr("gradeX footable-even");
            //Conductor
            mi_tr.appendChild(td("Conductor:", "footable-visible"));
            mi_td = td(conductores[i].conductor, "footable-visible");
            mi_td.setAttribute("colspan", 2);
            mi_tr.appendChild(mi_td);
            //Valor unitario
            mi_td = td("Valor:", "footable-visible");
            mi_td.setAttribute("colspan", 2);
            mi_tr.appendChild(mi_td);
            mi_tr.appendChild(td(formatearDinero(conductores[i].flete), "footable-visible"));

            contenedor.appendChild(mi_tr);
        }
    } else {
        mi_tr = tr("gradeX footable-even");
        mi_td_var = td("Ninguno", "footable-visible");
        mi_td_var.setAttribute("colspan", anchoTabla);
        mi_tr.appendChild(mi_td_var);
        contenedor.appendChild(mi_tr);
    }
}

function getConductoresByFactura(id_factura) {
    return obtenerFactura(id_factura).transportes;
}

function setAbonos(id_factura) {
    contenedor = document.getElementById('articulosList');
    mi_tr = tr("gradeX footable-even");
    var mi_td = document.createElement("td");
    mi_td.setAttribute("class", "footable-visible footable-first-column th");
    mi_td.appendChild(document.createTextNode("Abonos"));
    mi_td.setAttribute("colspan", anchoTabla);
    mi_td.setAttribute("style", " color:#FFFFFF; background-color: #616161");
    mi_tr.appendChild(mi_td);
    contenedor.appendChild(mi_tr);
    abonos = getAbonosByFactura(id_factura);
    if (abonos.length > 0) {
        for (let i in abonos) {
            mi_tr = tr("gradeX footable-even");
            //Cantidad
            mi_tr.appendChild(td("Valor:", "footable-visible"));
            //Valor
            mi_td = td(formatearDinero(abonos[i].cantidad), "footable-visible");
            mi_td.setAttribute("colspan", 2);
            mi_tr.appendChild(mi_td);
            //Fecha
            mi_td = td("Fecha:", "footable-visible");
            mi_td.setAttribute("colspan", 2)
            mi_tr.appendChild(mi_td);
            mi_td = td(abonos[i].fecha, "footable-visible");
            mi_td.setAttribute("colspan", 2);
            mi_tr.appendChild(mi_td);

            contenedor.appendChild(mi_tr);
        }
    } else {
        mi_tr = tr("gradeX footable-even");
        mi_td_var = td("Ninguno", "footable-visible");
        mi_td_var.setAttribute("colspan", anchoTabla);
        mi_tr.appendChild(mi_td_var);
        contenedor.appendChild(mi_tr);
    }
}

function getAbonosByFactura(id_factura) {
    return JSON.parse(obtenerFactura(id_factura).abonos);
}

function setDescuento(id_factura) {
    contenedor = document.getElementById('articulosList');
    mi_tr = tr("gradeX footable-even");
    var mi_td = document.createElement("td");
    mi_td.setAttribute("class", "footable-visible footable-first-column th");
    mi_td.appendChild(document.createTextNode("Descuentos sobre el total"));
    mi_td.setAttribute("colspan", anchoTabla);
    mi_td.setAttribute("style", " color:#FFFFFF; background-color: #616161 ");
    mi_tr.appendChild(mi_td);
    contenedor.appendChild(mi_tr);
    mi_tr = tr("gradeX footable-even"); //Sobreescribe para meter la fila de abajo
    //Cantidad
    mi_tr.appendChild(td("Valor:", "footable-visible"));
    //Valor
    mi_td = td(formatearDinero(obtenerFactura(id_factura).descuento), "footable-visible");
    mi_td.setAttribute("colspan", 2);
    mi_tr.appendChild(mi_td);
    var relleno = document.createElement("td");
    relleno.setAttribute("colspan", anchoTabla - 3);
    mi_tr.appendChild(relleno);
    contenedor.appendChild(mi_tr);
}

function mostrar_abonos(id_factura) {

    factura = obtenerFactura(id_factura);

    document.getElementById('txt_abonos_detalles').innerHTML = "";
    document.getElementById('txt_abonos_detalles').appendChild(parsearAbonos(JSON.parse(factura.abonos)));

    document.getElementById('txt_abonos_total').innerHTML = 'Total: ' + formatearDinero(factura.total);
    document.getElementById('txt_abonos_abonado').innerHTML = 'Abonado: ' + formatearDinero(factura.totalAbonado);
    document.getElementById('txt_abonos_faltante').innerHTML = 'Faltante: ' + formatearDinero(factura.total - factura.totalAbonado);
    document.getElementById('input_abonos').value = factura.total - factura.totalAbonado;
    aux = "abonar(" + id_factura + ")";
    document.getElementById('btn_abonos_abonar').setAttribute("onclick", aux);

    $('#myModalAbonos').modal({show: true});
}

function abonar(factura_id) {
    var formData = {};
    formData["factura_id"] = factura_id;
    formData["valor"] = document.getElementById('input_abonos').value;
    $.post('../back/controller/agregarAbono.php', formData, function (result, state) {
        postAbono(result, state);
    });
}

function postAbono(result, state) {
    if (state == "success") {
        if (result == "exito") {
            alert("Abono realizado con éxito");
            rebuscarUltimaBusqueda();
            document.getElementById("cerrarAbonos").click();
        } else {
            alert("Hubo un errror en la petición ( u.u)\n" + result);
            console.log(result);
        }
    } else {
        alert("Hubo un errror interno ( u.u)\n" + result);
    }
}


function obtenerFactura(id_factura) {
    for (let i in facturas_global) {
        if (parseInt(facturas_global[i].id, 10) === parseInt(id_factura, 10)) {
            return facturas_global[i];
        }
    }
    return [];
}

function obtenerClienteByFactura(id_factura) {
    for (let i in facturas_global) {
        if (parseInt(facturas_global[i].id, 10) === id_factura) {
            return facturas_global[i].cliente;
        }
    }
    return [];
}

/*
 * Al momento de hacer la devolucion se necesita saber la cantidad de productos alquilados
 * Como soy un idiota, mi variable global guarda el id y no el objeto completo.
 * Por esa razon, esta funcion devuelve un alquiler dado su id.
 * Aprovechando que tengo el id de factura seleccionada, la utilizo para buscar el articulo de forma mas rapida 
 */
function obtenerAlquiler(factura_id, alquiler_id) {
    for (let i in facturas_global) {
        if (parseInt(facturas_global[i].id, 10) === factura_id) {
            for (let j in facturas_global[i].alquileres) {
                if (parseInt(facturas_global[i].alquileres[j].alquiler_id, 10) === alquiler_id) {
                    return facturas_global[i].alquileres[j];
                }
            }
        }
    }
    return [];
}

function parsearAbonos(abonos) {
    var td = document.createElement("td");
    td.setAttribute("class", "footable-visible");
    if (abonos.length > 0) {
        var ul = document.createElement("ul");
        for (let i in abonos) {
            var li = document.createElement("li");
            rta = "Fecha: " + abonos[i].fecha + ", Cantidad: " + formatearDinero(abonos[i].cantidad);
            li.appendChild(document.createTextNode(rta));
            ul.appendChild(li)
        }
        td.appendChild(ul);
    } else {
        txt = document.createTextNode("No se ha efectuado ningún abono a la factura");
        td.appendChild(txt);
    }
    return td;
}

function parsearDevoluciones(devoluciones) {
    var td = document.createElement("td");
    td.setAttribute("class", "footable-visible");
    if (devoluciones.length > 0) {
        var ul = document.createElement("ul");
        for (let i in devoluciones) {
            var li = document.createElement("li");
            rta = "Fecha: " + devoluciones[i].fecha + ", Cantidad: " + devoluciones[i].cantidad + ", Estado: " + obtenerEstado(devoluciones[i].estado);
            li.appendChild(document.createTextNode(rta));
            ul.appendChild(li)
        }
        td.appendChild(ul);
    } else {
        txt = document.createTextNode("No se ha efectuado ninguna devolución del producto");
        td.appendChild(txt);
    }
    return td;
}

function obtenerEstado(estado) {
    switch (String(estado)) {
        case "0":
            return "Buen estado";
            break;
        case "1":
            return "Alquiler";
            break;
        case "2":
            return "Dañados"
            break;
        case "3":
            return "En reparacion"
            break;
        default:
            return "Sin definir";
    }
}



/*
 * Este metodo prepara las variables globales para el funcionamiento de devolucion
 */
function habilitarFormularioDevolucion(id_alquiler) {
    document.getElementById("contenedor_add_devoluciones").style.display = "block";
    alquiler_devolucion_select = id_alquiler;
    currentAlquiler = obtenerAlquiler(factura_id_select, id_alquiler);
    document.getElementById("producto_a_devolver").innerHTML = currentAlquiler.producto_nombre;
    document.getElementById("cantidad_devuelta").focus();
    $('#fecha_devolucion').val(new Date().toDateInputValue());
    $("#cantidad_devuelta").animate({ scrollTop: $('#cantidad_devuelta')[0].scrollHeight}, 1000);
}

function deshabilitarFormularioDevolucion() {
    document.getElementById("contenedor_add_devoluciones").style.display = "none";
    alquiler_devolucion_select = -1;
    currentAlquiler = {};
    document.getElementById("producto_a_devolver").innerHTML = "";
}

function agregar_devolucion() { 

    //Validamos si la cantidad a devolver no supera a la cantidad alquilada
    if ($('#cantidad_devuelta').val() <= currentAlquiler.cantidad - currentAlquiler.totalDevuelto) {

        var url = "../back/controller/devolverParcial.php";

        //Cliente by factura seleccionada
        cliente = obtenerClienteByFactura(factura_id_select);
        cantidad = $('#cantidad_devuelta').val();
        estado = $('#estado_objeto').val();
        fecha = $('#fecha_devolucion').val();

        var alquileres = {};
        alquileres["alquiler_id"] = alquiler_devolucion_select;
        alquileres["cantidad"] = cantidad;
        alquileres["estado"] = estado;
        alquileres["fecha"] = fecha;

        $.ajax({
            type: "POST",
            url: url,
            data: alquileres,

            success: function (data) {
                if (data == "exito") {
                    actualizarFactura(factura_id_select);
                    deshabilitarFormularioDevolucion();
                } else {
                    console.log(data + " dos");
                }

            }
        });
    } else {
        alert("¡¡ ERROR !! \n\n La cantidad a devolver no puede superar la cantidad alquilada");
    }
}


/*
 * Una vez se agregan devoluciones es necesario actualizar la informacion de la vista.
 * En lugar de ponerme a joder modificando los datos locales, es mucho mas facil volver a traerse todos los 
 * alquiles y repintar todo
 */
function actualizarFactura(factura_id) {
    var url = "../back/controller/getReporteFacturaById.php";
    $.ajax({
        type: "POST",
        url: url,
        data: {"factura_id": factura_id},
        success: function (data) {
            //POR FAVOR, HAY QUE DEFINIR UN ESTANDAR SOBRE LAS RESPUESTAS
            for (let i in facturas_global) {
                if (parseInt(facturas_global[i].id, 10) === parseInt(factura_id, 10)) {
                    facturas_global[i] = JSON.parse(data)[0];
                    break;
                }
            }
            mostrar_alquileres(factura_id, false);
        }
    });
}

/*
 * Inserta los alquileres consultado a la factura
 * [despreciado]
 */
function actualizarAlquiler(factura_id, alquileres) {
    obtenerFactura(factura_id).alquileres = alquileres;
    mostrar_alquileres(factura_id, false);
}


function cerrarModalDevolverTodo() {
    $('#myModalDevolverParcial').modal('hide');

    // 
    //$('body').removeClass('modal-open');
}

function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0)
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
            regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}

