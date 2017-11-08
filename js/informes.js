var z =document.querySelectorAll("#categorias input");

for (var i = 0; i < z.length; i++) {
    z[i].addEventListener('click', mostrar);
}

function mostrar(event) {
    var usuarioActual = window.sessionStorage.getItem("usuario");
    var categoria = this.value;
    var accion = "informePorcategoria";
   datos={
   "usuario":usuarioActual,
   "Categoria":categoria,
   "controladorGastos":accion
};
$.ajax({
        data: datos,
        url: 'controlador/controladorGastos.php',
        type: 'post',
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) {

            if (response.length ===0) {

                         $('.collapse').collapse('hide');

                         var spanCategoria= "#"+categoria;
          document.querySelector(spanCategoria).innerHTML = "vacio";

            } else {
                gasto = eval(response);
           var output='';
           for (var i in gasto) {
                output +='<table class="table table-condensed">\n\
                   <tr class="table-info">\n\
                       <td><strong>Numero:</strong></td>\n\
                       <td>'+gasto[i].id+'</td>\n\
                   </tr>\n\
                   <tr>\n\
                       <td><strong>Descripcion:</strong></td>\n\
                       <td>'+gasto[i].descripcion+'</td>\n\
                   </tr>\n\
                   <tr>\n\
                       <td><strong>Fecha:</strong></td>\n\
                       <td>'+gasto[i].fechaGasto+'</td>\n\
                   </tr>\n\
                   <tr>\n\
                       <td><strong>Importe:</strong></td>\n\
                       <td>$ '+gasto[i].valorGasto+'</td>\n\
                   </tr>\n\
               </table>';

           }
           $('.collapse').collapse('hide');
           var spanCategoria= "#"+categoria;
           document.querySelector(spanCategoria).innerHTML = output;
           
		}

     }
    });
}