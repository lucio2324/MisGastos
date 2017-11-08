$("button").click(mostrar);

function mostrar(e) {
    var categoria = e.target.textContent;
    var usuarioActual = window.sessionStorage.getItem("usuario");
    var accion="informes";

   
 
datos ={
    "categoria":categoria,
    "usuario":usuarioActual,
    "accion":accion
}

 $.ajax({
  data:  datos,
  url:   'respuesta.php',
  type:  'post',
  beforeSend: function () {
          $("#resultado").html("Procesando, espere por favor...");
  },
  success:  function (response) {

    var row= eval(response);

 for (var i = 0; i < row.length; i++) {
                 output +='<table class="table table-condensed">\n\
                    <tr class="info">\n\
                        <td>Numero:</td>\n\
                        <td>'+i+'</td>\n\
                    </tr>\n\
                    <tr class="info">\n\
                        <td>Nonbre:</td>\n\
                        <td>'+row[i].nombre+'</td>\n\
                    </tr>\n\
                    <tr class="info">\n\
                        <td>Fecha:</td>\n\
                        <td>'+row[i].fecha+'</td>\n\
                    </tr>\n\
                    <tr class="info">\n\
                        <td>Importe:</td>\n\
                        <td>$ '+row[i].importe+'</td>\n\
                    </tr>\n\
                </table>' ;
                }
                
 document.querySelector(categoria).innerHTML = output;        

  }                     
});
}

