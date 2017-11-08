window.addEventListener("load", mostrar);

var f = new Date;

var boton = document.querySelector("#guardarIngreso");
boton.addEventListener("click", validarGasto);


function mostrar() {
    var accion = "mostrarIngreso";
    var usuarioActual = sessionStorage.getItem('usuario');

    datos = {
        "usuario": usuarioActual,
        "controladorIngresos": accion
    };
    $.ajax({
        data: datos,
        url: 'controlador/controladorIngresos.php',
        type: 'post',
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) {
            document.querySelector("#ingresaSueldo").value = "";
            if (response === "") {
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
          <td class="fecha">' + gasto[i].fechaIngreso + " " + '</td>\n\
          <td>' + "$ " + gasto[i].valor + " " + '</td>\n\
          <td><button class=" btn-danger btn-ms" id="eliminar" value="' + gasto[i].id + '">X</button></td>\n\
          </tr>';
                    ingreso += parseInt(gasto[i].valor);
                }
                output += '</table>';
                document.querySelector("#respuesta").innerHTML = output;
                document.querySelector("#total").innerHTML = "$ " + ingreso;
                moment.locale("es");
                $(".fecha").each(function () {
                    $(this).text(moment($(this).text(), "YYYYMMDD").fromNow());
                });
                console.log($(".fecha"));
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
        "controladorIngresos": eliminar
    };

    $.ajax({
        data: datos,
        url: 'controlador/controladorIngresos.php',
        type: 'post',
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) {
            document.querySelector("#ingresaSueldo").value = "";
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
          <td class="fecha">' + gasto[i].fechaIngreso + " " + '</td>\n\
          <td>' + "$ " + gasto[i].valor + " " + '</td>\n\
          <td><button class=" btn-danger btn-ms" id="eliminar" value="' + gasto[i].id + '">X</button></td>\n\
          </tr>';
                    ingreso += parseInt(gasto[i].valor);
                }
                output += '</table>';
                document.querySelector("#respuesta").innerHTML = output;
                document.querySelector("#total").innerHTML = "$ " + ingreso;
                $(".fecha").each(function () {
                    $(this).text(moment($(this).text(), "YYYYMMDD").fromNow());
                });
            }
        }
    });

}


function validarGasto() {
    var ingreso = document.querySelector("#ingresaSueldo").value;
    var ingresoE = document.querySelector("#ingresaSueldo");
    var usuarioActual = sessionStorage.getItem('usuario');
    var espanEvento = document.querySelector("#sueldo");
    var ingresoID = 'registrarPedir';

    ddhoy = f.getDate();
    mmhoy = f.getMonth();
    aahoy = f.getFullYear();
    var fechaActual = aahoy + "/" + mmhoy + "/" + ddhoy;

    ingresoE.addEventListener("mouseover", function () {
        espanEvento.innerText = "";
    });

    if (ingreso === "") {
        espanEvento.innerText = "Debe ingresar algun ingreso";
    } else {

        var datos = {
            "usuario": usuarioActual,
            "fecha": fechaActual,
            "ingreso": ingreso,
            "controladorIngresos": ingresoID
        };

        $.ajax({

            url: 'controlador/controladorIngresos.php',
            type: 'post',
            data: datos,
            dataType: 'json',

            beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
            },
            success: function (response) {
                document.querySelector("#ingresaSueldo").value = "";
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
          <td class="fecha">' + gasto[i].fechaIngreso + " " + '</td>\n\
          <td>' + "$ " + gasto[i].valor + " " + '</td>\n\
          <td><button class=" btn-danger btn-ms" id="eliminar" value="' + gasto[i].id + '">X</button></td>\n\
          </tr>';
                        ingreso += parseInt(gasto[i].valor);
                    }
                    output += '</table>';
                    document.querySelector("#respuesta").innerHTML = output;
                    document.querySelector("#total").innerHTML = "$ " + ingreso;
                    $(".fecha").each(function () {
                    $(this).text(moment($(this).text(), "YYYYMMDD").fromNow());

                });
                }
            }
        });
    }
}

