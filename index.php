<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" href="img/dollar-311344_960_720.ico">
    </head>
    <body>
        <div id="heder">
            <h1>Iniciar sesion</h1>
        </div>

        <div class="container">
            <form id="formulario" action="#" method="post">
            <div class="form-group">
                <label for="usuario">Ingrese su usuario:</label>
                <input type="text" id="usuario" class="form-control"><span id="validarUsuario"></span><br><br>
            </div>   

            <div class="form-group">
                <label  for="clave">Ingrese su contraseña:</label>
                <input type="password" id="clave" class="form-control"><span id="validarClave"></span><br><br>
            </div>   

            <div class="form-group">
                <input id="iniciar" type="submit" class="btn btn-primary" value="Ingresa"><br><br>
            </div>
            </form>
            <a href="registro.php" class="btn btn-info" >Registrarse</a>
        </div>
        
        <span id="error"></span>
        
<!--        PREGUNTAR PARA QUE SIRVE-->

        <input id="usuarioBase" value="">
        <input id="claveBase" value="">
 
<!--        PREGUNTAR PARA QUE SIRVE-->
        
        <script src="js//librerias/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/iniciarSesion.js" type="text/javascript"></script>
    </body>
</html>