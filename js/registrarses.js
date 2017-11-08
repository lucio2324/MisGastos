
var registrarse=document.querySelector("#formulario");
registrarse.addEventListener("submit",validarLogin);

function validarLogin(e) {
    e.preventDefault();
    var usuarioEvento = document.querySelector("#usuario");
    var claveEvento = document.querySelector("#clave");
    var usuario = document.querySelector("#usuario").value;
    var clave = document.querySelector("#clave").value;
    var claveRepetida = document.querySelector("#claveRepetida").value;
    var claveRepetidaEvento = document.querySelector("#claveRepetida");
    var spanUsuario = document.getElementById("validarUsuario");
    var spanClave = document.getElementById("validarClave");
    var spanClaveRepetida = document.getElementById("validarClaveRepetida");
    var registrar='registrar';
    
    usuarioEvento.addEventListener("mouseover", function () {
        spanUsuario.innerText = "";
    });
    claveEvento.addEventListener("mouseover", function () {
        spanClave.innerText = "";
    });
claveRepetidaEvento.addEventListener("mouseover", function () {
        spanClaveRepetida.innerText = "";
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
    }else if (claveRepetida === "") {
         mensajeClave = document.querySelector("#validarClaveRepetida");
        mensajeClave.innerHTML = "Debe ingresar la contraseña nuevamente";
    }else if (clave !== claveRepetida) {
        mensajeClave = document.querySelector("#validarClaveRepetida");
        mensajeClave.innerText = "Debe ingresar la misma contraseña";
    }else{
datos={
    "usuario":usuario,
    "clave":clave,
    "controlador":registrar
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
             document.querySelector("#claveRepetida").value="";
    if (response==="true") {
        sessionStorage.setItem('usuario', usuario);
        location.href="index.php";
    }}
        });

    } 
}
