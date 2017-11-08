window.addEventListener("load",nobackbutton)

var registrarse=document.querySelector("#formulario");
registrarse.addEventListener("submit",validarLogin);

function nobackbutton(){
    window.location.hash = "no-back-button";
    window.location.hash = "Again-No-back-button"; //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";};  
}

function validarLogin(e) {
    e.preventDefault();
    var usuarioEvento = document.querySelector("#usuario");
    var claveEvento = document.querySelector("#clave");
    var usuario = document.querySelector("#usuario").value;
    var clave = document.querySelector("#clave").value;
    var spanUsuario = document.getElementById("validarUsuario");
    var spanClave = document.getElementById("validarClave");
    var spanClaveRepetida = document.getElementById("validarClaveRepetida");
    var login = 'login';
    usuarioEvento.addEventListener("mouseover", function () {
        spanUsuario.innerText = "";
    });
    claveEvento.addEventListener("mouseover", function () {
        spanClave.innerText = "";
    });


    if (usuario === "") {
        mensajeUsuario = document.querySelector("#validarUsuario");
        mensajeUsuario.innerText = "Es campo del usuario no puede estar vacio";
    } else
    if (clave === "") {
        mensajeClave = document.querySelector("#validarClave");
        mensajeClave.innerText = "Este capo de la contraseña no puede estar vacio";
    } else if (clave.length < 4) {
         mensajeClave = document.querySelector("#validarClave");
        mensajeClave.innerHTML = "Debe ingresar una clave de 4 caracteres como minimo";
    }else{
datos={
    "usuario":usuario,
    "clave":clave,
    "controlador":login
};

 $.ajax({
                data:  datos,
                url:   'controlador/controlador.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
             document.querySelector("#usuario").value="";
             document.querySelector("#clave").value="";
    if (response==="true") {
        sessionStorage.setItem('usuario', usuario);
        location.href="bienvenida.php";
    }else{
        
            mensajeClave = document.querySelector("#validarClave");
        mensajeClave.innerText = response;
    
    }
                        
             }
        });

    } 
}



  