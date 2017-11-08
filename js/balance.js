window.addEventListener("load", mostrar);


function mostrar() {
    var usuario = window.sessionStorage.getItem("usuario");
    var accion = "dastosPorCategoriaYSueldoTotal";
    dato = {
        "usuario": usuario,
        "controladorGastos": accion
    };
    $.ajax({
        data: dato,
        url: 'controlador/controladorGastos.php',
        type: 'post',
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) {

            resultado = eval(response);

            if (typeof (resultado.ingresoTotal) === "undefined") {
                var sueldoTotal = 0;
            } else {
                var sueldoTotal = resultado.ingresoTotal;
            }

            if (typeof (resultado.Transporte) === "undefined") {
                var Transporte = 0;
            } else {
                var Transporte = resultado.Transporte;
            }

            if (typeof (resultado.Alimentos) === "undefined") {
                var Alimentos = 0;
            } else {
                var Alimentos = resultado.Alimentos;
            }

            if (typeof (resultado.Servicio) === "undefined") {
                var Servicios = 0;
            } else {
                var Servicios = resultado.Servicio;
            }

            if (typeof (resultado.Medicos) === "undefined") {
                var Medicos = 0;
            } else {
                var Medicos = resultado.Medicos;
            }

            if (typeof (resultado.Entretenimiento) === "undefined") {
                var Entretenimiento = 0;
            } else {
                var Entretenimiento = resultado.Entretenimiento;
            }

            if (typeof (resultado.Otros) === "undefined") {
                var Otros = 0;
            } else {
                var Otros = resultado.Otros;
            }

            var Disponible = resultado.balance;

            document.querySelector("#totalBalance").innerText = "$ " + sueldoTotal;

            var pieData = [
                {
                    value: Transporte,
                    color: "#0b82e7",
                    highlight: "#BFFF00",
                    label: "Transporte"
                },
                {
                    value: Alimentos,
                    color: "#e3e860",
                    highlight: "#a9ad47",
                    label: "Alimentos"
                },
                {
                    value: Servicios,
                    color: "#DBA901",
                    highlight: "#b74865",
                    label: "Servicios"
                },
                {
                    value: Medicos,
                    color: "#5ae85a",
                    highlight: "#42a642",
                    label: "Medicos"
                },
                {
                    value: Entretenimiento,
                    color: "#e965db",
                    highlight: "#a6429b",
                    label: "Entretenimiento"
                },
                {
                    value: Otros,
                    color: "#642EFE",
                    highlight: "#42a642",
                    label: "Otros"
                },
               
            ];
            var ctx = document.getElementById("chart-area").getContext("2d");
            window.myPie = new Chart(ctx).Pie(pieData);

            document.querySelector("#transporte").innerText = "$ " + Transporte;
            document.querySelector("#alimentos").innerText = "$ " + Alimentos;
            document.querySelector("#servicios").innerText = "$ " + Servicios;
            document.querySelector("#medicos").innerText = "$ " + Medicos;
            document.querySelector("#entretenimiento").innerText = "$ " + Entretenimiento;
            document.querySelector("#otros").innerText = "$ " + Otros;
            document.querySelector("#disponible").innerText = "$ " + Disponible;

        }
    });

}




