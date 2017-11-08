window.addEventListener("load", mostrar);

var f = new Date();

var boton = document.querySelector("#elegirCategoria");
boton.addEventListener("click", validarCategoria);
var elegir = document.querySelector("#elegir");
elegir.addEventListener("click", validarElegir);
var guardar = document.querySelector("#guardarGasto");
guardar.addEventListener("click", validarGastos);


function mostrar() {
    var accion = "mostrarGastos";
    var usuarioActual = sessionStorage.getItem('usuario');

    datos = {
        "usuario": usuarioActual,
        "controladorGastos": accion
    };
    $.ajax({
        data: datos,
        url: 'controlador/controladorGastos.php',
        type: 'post',
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) {
            console.log(response);

//            document.querySelector("#ingresaSueldo").value = "";
            if (response === " ") {
                alert("no hay respuesta");
            } else {
                gasto = eval(response);
                var output = '<table class="table table-condensed" id="respuesta">\n\
                         <tr>\n\
                         <td><strong>Fecha</strong></td>\n\
                         <td><strong>Importe</strong></td>\n\
                        </tr>';
                var ingreso = 0;
                for (var i in gasto) {
                    output += '<tr>\n\
          <td class="fecha">' + gasto[i].fechaGasto + " " + '</td>\n\
          <td>' + "$ " + gasto[i].valorGasto + " " + '</td>\n\
          <td><button class=" btn-danger btn-ms" id="eliminar" value="' + gasto[i].id + '">X</button></td>\n\
          </tr>';
                    ingreso += parseInt(gasto[i].valorGasto);
                }
                output += '</table>';
                document.querySelector("#respuesta").innerHTML = output;
                document.querySelector("#total").innerHTML = "$ " + ingreso;
               
            }
        }
    });
}



$("body").on("click", "#eliminar", eliminarRegistro);

function eliminarRegistro(e) {
    var usuarioActual = sessionStorage.getItem('usuario');
    var id = e.target.attributes.value.nodeValue;
    var eliminar = "eliminarPedir";
    var datos = {
        "usuario": usuarioActual,
        "id": id,
        "controladorGastos": eliminar
    };

    $.ajax({
        data: datos,
        url: 'controlador/controladorGastos.php',
        type: 'post',
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) {
            if (response === '') {
                alert("no hay respuesta");
            } else {
                var gasto = eval(response);
                var output = '<table class="table table-condensed" id="respuesta">\n\
                         <tr>\n\
                         <td><strong>Fecha</strong></td>\n\
                         <td><strong>Importe</strong></td>\n\
                        </tr>';
                var ingreso = 0;
                for (var i in gasto) {
                    output += '<tr>\n\
          <td class="fecha">' + gasto[i].fechaGasto + " " + '</td>\n\
          <td>' + "$ " + gasto[i].valorGasto + " " + '</td>\n\
          <td><button class=" btn-danger btn-ms" id="eliminar" value="' + gasto[i].id + '">X</button></td>\n\
          </tr>';
                    ingreso += parseInt(gasto[i].valorGasto);
                }
                output += '</table>';
                document.querySelector("#respuesta").innerHTML = output;
                document.querySelector("#total").innerHTML = "$ " + ingreso;
            }
        }
    });

}



function validarCategoria() {
    var elegir = document.querySelector("#categoriaElegir");
    var seleccionar = document.querySelector("#seleccionaCategoria");
    var categoria = document.querySelector("#resultadoCategoria").value;

    elegir.style.display = "none";
    seleccionar.style.display = "inline";
}

function validarElegir() {
    var evento = document.querySelector("#resultadoCategoria");
    var elegir = document.querySelector("#categoriaElegir");
    var seleccionar = document.querySelector("#seleccionaCategoria");
    var seleccion = document.querySelector("#categoriaSeleccionada").value;

    var botonCategoria = document.querySelector("#categoriaSeleccionada");
    botonCategoria.addEventListener("mouseover", function () {
        var mensajeUno = document.querySelector("#mensajeCategoria");
        mensajeUno.innerText = "";
    });

    if (seleccion === "Selecciones categoria") {
        var mensaje = document.querySelector("#mensajeCategoria");
        mensaje.innerText = "Debe elegir una categoria";
    } else {
        evento.value = seleccion;

        seleccionar.style.display = "none";
        elegir.style.display = "inline";
    }
}

function validarGastos() {
    var categoria = document.querySelector("#resultadoCategoria").value;
    var nombre = document.querySelector("#nombre").value;
    var importe = document.querySelector("#importe").value;
    var fecha = document.querySelector("#fecha").value;
    var usuario = window.sessionStorage.getItem("usuario");
    var gastosID = 'insertarPedir';

    ddhoy = f.getDate();
    mmhoy = f.getMonth();
    aahoy = f.getFullYear();
    var fechaActual = aahoy + mmhoy + ddhoy;
    aa = fecha.substring(0, 4);
    mm = fecha.substring(5, 7);
    dd = fecha.substring(8, 10);
    var fechaComparacion = aa + mm + dd;
    var fechaCorregida = dd + "/" + mm + "/" + aa;

    var botonCategoria = document.querySelector("#elegirCategoria");
    botonCategoria.addEventListener("mouseover", function () {
        var mensajeUno = document.querySelector("#mensajeCategoria");
        mensajeUno.innerText = "";
    });

    var nombreEvento = document.querySelector("#nombre");
    nombreEvento.addEventListener("mouseover", function () {
        var mensaje = document.querySelector("#mensajeNombre");
        mensaje.innerText = "";
    });

    var importeEvento = document.querySelector("#importe");
    importeEvento.addEventListener("mouseover", function () {
        var mensaje = document.querySelector("#mensajeImporte");
        mensaje.innerText = "";
    });

    var fecha = document.querySelector("#fecha");
    fecha.addEventListener("mouseover", function () {
        var mensaje = document.querySelector("#mensajeImporte");
        mensaje.innerText = "";
    });


    if (categoria === "") {
        var mensaje = document.querySelector("#mensajeCategoria");
        mensaje.innerText = "Debe elegir una categoria";
    } else if (nombre === "") {
        var mensaje = document.querySelector("#mensajeNombre");
        mensaje.innerText = "Debe ingresar el nombre gasto";
    } else if (importe === "") {
        var mensaje = document.querySelector("#mensajeImporte");
        mensaje.innerText = "Debe ingresar el nombre gasto";
    } else if (fecha === "") {
        var mensaje = document.querySelector("#mensajeFecha");
        mensaje.innerText = "Debe ingresar una fecha";
    } else if (fechaComparacion <= fechaActual) {
        var mensaje = document.querySelector("#mensajeFecha");
        mensaje.innerText = "Debe ingresar una fecha correcta";
    } else {

        datos = {
            "categoria": categoria,
            "nombre": nombre,
            "importe": importe,
            "fecha": fechaCorregida,
            "usuario": usuario,
            "controladorGastos": gastosID


        };

        $.ajax({
            data: datos,
            url: 'controlador/controladorGastos.php',
            type: 'post',
            beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
            },
            success: function (response) {
                if (response === "") {
                    alert("no hay respuesta");
                } else {
                    document.querySelector("#resultadoCategoria").value = "";
                    document.querySelector("#nombre").value = "";
                    document.querySelector("#importe").value = "";
                    document.querySelector("#fecha").value = "";
                    gasto = eval(response);
                    var output = '<table class="table table-condensed" id="respuesta">\n\
                         <tr>\n\
                         <td><strong>Fecha</strong></td>\n\
                         <td><strong>Importe</strong></td>\n\
                        </tr>';
                    var ingreso = 0;
                    for (var i in gasto) {
                        output += '<tr>\n\
          <td>' + gasto[i].fechaGasto + " " + '</td>\n\
          <td>' + "$ " + gasto[i].valorGasto + " " + '</td>\n\
          <td><button class=" btn-danger btn-ms" id="eliminar" value="' + gasto[i].id + '">X</button></td>\n\
          </tr>';
                        ingreso += parseInt(gasto[i].valorGasto);
                    }
                    output += '</table>';
                    document.querySelector("#mostrar").innerHTML = output;
                    document.querySelector("#total").innerHTML = "$ " + ingreso;
                }
            }
        });
    }

}


