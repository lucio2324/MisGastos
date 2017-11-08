<!DOCTYPE html>

<html>
    <head>
        <title>Informes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="heder">
            <h1 style="text-align: center">Informes</h1>
            <nav class="navbar navbar-inverse">
                <div class="btn-group btn-group-justified">
                    <ul  class="nav navbar-nav">
                        <li class="dropdown"><a type="button" class="dropdown-toggle , btn btn-info" data-toggle="dropdown" href="#">Home<span class="glyphicon glyphicon-align-center"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="gasto.php">Gastos</a></li>
                                <li><a href="balance.php">Balances</a></li>
                                <li><a href="ingresos.php">Ingresos</a></li>
                                <li><a href="index.php">Cerrar sesion</a></li>
                            </ul>
                        </li>
                    </ul> 
                </div>     
            </nav>
        </div><br>
        <div id="categorias" class="container">
            <input type="button" value="Transporte" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#Transporte">
            <div id="Transporte" class="collapse"></div>
            <br>
            <input type="button" value="Alimentos" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#Alimentos">
            <div id="Alimentos" class="collapse"></div>
            <br>
            <input type="button" value="Servicios" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#Servicios">
            <div id="Servicios" class="collapse">Vacio</div>
            <br>
            <input type="button" value="Medicos" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#Medicos">
            <div id="Medicos" class="collapse"></div>
            <br>
            <input type="button" value="Entretenimiento" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#Entretenimiento">
            <div id="Entretenimiento" class="collapse"></div>
            <br>
            <input type="button" value="Otros" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#Otros">
            <div id="Otros" class="collapse"></div>
            <br>
        </div>

        <script src="js/librerias/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/librerias/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/informes.js" type="text/javascript"></script>
    </body>
</html>
