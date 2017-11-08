<!DOCTYPE html>

<html>
    <head>
        <title>Guardar los gastos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *; img-src 'self' data: content:;">
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <div id="heder">
            <h4 style="text-align: center">Ingresos</h4>
            <nav class="navbar navbar-inverse">
                <div class="btn-group btn-group-justified">
                    <ul  class="nav navbar-nav">
                        <li class="dropdown"><a type="button" class="dropdown-toggle , btn btn-info" data-toggle="dropdown" href="#">Home</a>
                            <ul class="dropdown-menu">
                                <li><a id="balance" href="balance.php">Balance</a></li>
                                <li><a href="gasto.php">Gastos</a></li>
                                <li><a href="informes.php">Informe</a></li>
                                <li><a id="login" href="index.php">Cerrar sesion</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>     
            </nav>
        </div>
        <div class="container">

                <label  for="ingresaSueldo">Ingreso</label>
                <input type="number" id="ingresaSueldo" class="form-control" placeholder="Introdusca su ingreso"/><br>
                <input type="submit" id="guardarIngreso" class=" btn-info" value="Guardar"/>
            <span id="sueldo"></span>
        </div>
            <div class="container">
                <table class="table table-condensed" id="respuesta">
                    <tr>
                        <td><strong>Fecha</strong></td>
                        <td><strong>Sueldo</strong></td>
                    </tr>

                </table>
            </div>

            <div class="container">
                <table class="table table-condensed" id="sueldoTotal">
                    <tr>
                        <td><strong>ingreso total</strong></td>
                        <td><strong id="total"></strong></td>
                    </tr>

                </table>
            </div>
        <script src="js/librerias/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/librerias/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/moment.js" type="text/javascript"></script>
        <script src="js/ingresos.js" type="text/javascript"></script>
    </body>
</html>