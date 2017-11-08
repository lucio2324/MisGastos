<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
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
                                <li><a href="gastos.html">Gastos</a></li>
                                <li><a href="balance.html">Balances</a></li>
                                <li><a href="ingresos.html">Ingresos</a></li>
                                <li><a href="index.html">Cerrar sesion</a></li>
                            </ul>
                        </li>
                    </ul> 
                </div>     
            </nav>
        </div><br>
        <div class="container">
            <button  type="button" id="t" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#transporte">Transporte</button>
            <div id="Transporte" class="collapse">
                
            </div><br>
            <button  type="button" id="t" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#alimentos">Alimentos</button>
            <div id="Alimentos" class="collapse">
                
            </div><br>
            <button type="button" id="t" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#servicios">Servicios</button>
            <div id="Servicios" class="collapse">

            </div><br>
            <button type="button" id="t" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#medicos">Medicos</button>
            <div id="Medicos" class="collapse"> 

            </div><br>
            <button type="button" id="t" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#entretenimiento">Entretenimiento</button>
            <div id="Entretenimiento" class="collapse">

            </div><br>
            <button type="button" id="t" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#otros">Otros</button>
            <div id="Otros" class="collapse">

            </div><br>
        </div>

        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/informe.js" type="text/javascript"></script>
    </body>
</html>
