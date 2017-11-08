<!DOCTYPE html>

<html>
    <head>
        <title>Balances</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <meta name ="author" content ="Norfi Carrodeguas">
        <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *; img-src 'self' data: content:;">
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="heder">
            <h1 style="text-align: center">Balance</h1>
            <nav class="navbar navbar-inverse">
                <div class="btn-group btn-group-justified">
                    <ul  class="nav navbar-nav">
                        <li class="dropdown"><a type="button" class="dropdown-toggle , btn btn-info" data-toggle="dropdown" href="#">Home<span class="glyphicon glyphicon-align-center"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="ingresos.php">Ingresos</a></li>
                                <li><a href="gasto.php">Gastos</a></li>
                                <li><a href="informes.php">Informe</a></li>
                                <li><a id="login" href="index.php">Cerrar sesion</a></li>
                            </ul>
                        </li>
                    </ul>


                </div>     
            </nav>
        </div>
        <div id="ingreso" class="container">
            <table class="table table-condensed" id="gastoTotal">
                <tr>
                    <td><strong>Disponible :</strong></td>
                    <td><div id="disponible"><h5></h5></div></td>
                </tr>
            </table>
        </div>
        
        <div id="canvas-holder" class="container" style=" display: flex;
  justify-content: center;">
            <canvas id="chart-area" width="300" height="300" ></canvas>
        </div>
        <div class="container">
            <table class="table table-condensed" id="respuesta">
                <tr>
                    <td><strong>ingreso total :</strong></td>
                    <td><strong id="totalBalance"></strong></td>
                </tr>
                <tr>
                    <td><strong>Transporte :</strong></td>
                    <td><strong id="transporte"></strong></td>
                </tr>
                <tr>
                    <td><strong>Alimentos :</strong></td>
                    <td><strong id="alimentos"></strong></td>
                </tr>
                <tr>
                    <td><strong>Servicios :</strong></td>
                    <td><strong id="servicios"></strong></td>
                </tr> 
                <tr>
                    <td><strong>Medicos :</strong></td>
                    <td><strong id="medicos"></strong></td>
                </tr>
                <tr>
                    <td><strong>Entretenimeentos :</strong></td>
                    <td><strong id="entretenimiento"></strong></td>
                </tr>
                <tr>
                    <td><strong>Otros :</strong></td>
                    <td><strong id="otros"></strong></td>
                </tr>
            </table>

        </div>
        <script src="js/Chart.js" type="text/javascript"></script>
        <script src="js/librerias/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/librerias/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/balance.js" type="text/javascript"></script>
    </body>
</html>
