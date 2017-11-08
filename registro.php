<!DOCTYPE html>
<html>
<head>
       <title>Registrarse</title>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
       <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    
    <div id="heder">
        <h4>Registrese</h4>
    
    </div><br>
    <div id="registro">
        <div class="container">
        <form id="formulario" action="#" method="post">
        <div class="form-group">
    <label for="usuario">Usuario:</label>
    <input type="text" class="form-control" id="usuario"><span id="validarUsuario"></span>
    </div>
     
        <div class="form-group">
    <label  for="clave">Contraseña:</label>
   <input type="password" class="form-control" id="clave"><span id="validarClave"></span>
        </div>
  
        <div class="form-group">
    <label for="claveRepetida">Repetir contraseña:</label> 
    <input type="password" class="form-control" id="claveRepetida"><span id="validarClaveRepetida"></span>
        </div>
            
            <div class="form-group">
             <a href="index.php" class="btn btn-success">Atras</a>
           <input type="submit" id="Registrarse" class="btn btn-primary" value="Registrarse">
         </div>
         </form>   
        </div>
  </div>
  <div id="resultado"></div>
  <div id="seguardo">
      <div class="container">
      <h4> Se ha registrado correctamente </h4><br><br>
        
        <a href="index.html" class="btn btn-success">Aceptar</a>
      </div>
  </div><br>
  <input id="usuarioBase" value="">
  <script src="js/librerias/jquery-3.2.1.min.js" type="text/javascript"></script>
       <script src="js/registrarses.js" type="text/javascript"></script>
 </body>
</html>