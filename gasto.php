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
            <h1 style="text-align: center">Gastos</h1>
            <nav class="navbar navbar-inverse">
                <div class="btn-group btn-group-justified">
                    <ul  class="nav navbar-nav">
                        <li class="dropdown"><a type="button" class="dropdown-toggle , btn btn-info" data-toggle="dropdown" href="#">Home</a>
                            <ul class="dropdown-menu">
                                <li><a href="ingresos.php">Ingresos</a></li>
                                <li><a id="balance" href="balance.php">Balance</a></li>
                                <li><a href="informes.php">Informe</a></li>
                                <li><a id="login" href="index.php">Cerrar sesion</a></li>
                            </ul>
                        </li>
                    </ul>


                </div>     
            </nav>
        </div>
            <div class="container">

                <div id="categoriaElegir" class="form-group">
                    <label  for="resultadoCategoria">Categoria</label>
                    <input type="text" id="resultadoCategoria" class="form-control" disabled="true"><br>
                    <input type="button" id="elegirCategoria" class="btn-info" value="Elegir categoria">
                </div><span id="mensajeCategoria" ></span>

                <div id="seleccionaCategoria" class="form-group">

                    Seleccione una categoria
                    <select id="categoriaSeleccionada" class="form-control">
                        <option>Selecciones categoria</option>
                        <option>Transporte</option>
                        <option>Alimentos</option>
                        <option>Servicio</option>
                        <option>Medicos</option>
                        <option>Entretenimiento</option>
                        <option>Otros</option>
                    </select><br>

                    <input id="elegir" type="button" class="btn-info" value="Elegir">

                </div>
                <div class="form-group">
                    <label  for="nombre">Nombre del Gasto:</label>
                    <input type="text" id="nombre" class="form-control" placeholder="Ingrese el nombre del gasto"><span id="mensajeNombre"></span>
                </div>
                <div class="form-group">
                    <label  for="importe">Importe:</label>
                    <input type="number" id="importe" class="form-control" placeholder="Ingrese el importe del gastos"><span id="mensajeImporte"></span>

                </div>
                <div class="form-group">
                    <label  for="fecha">Fecha del Gasto:</label>
                    <input type="date" id="fecha"/><span id="mensajeFecha"></span>
                </div>
                <input type="button" class="btn-info" id="guardarGasto" value="Guardar">

            </div><br>
            <div id="mostrar" class="container">
                <table class="table table-condensed" id="respuesta">
                    <tr>
                        <td><strong>Fecha</strong></td>
                        <td><strong>Importe</strong></td>
                    </tr>
                </table>
            </div>
            <div id="gastoTotal" class="container">
                <table class="table table-condensed" id="gastoTotal">
                    <tr>
                        <td><strong>Gasto total</strong></td>
                        <td><strong id="total"></strong></td>
                    </tr>

                </table>
            </div>
          <script src="js/librerias/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/librerias/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/moment.js" type="text/javascript"></script>
        <script src="js/gast.js" type="text/javascript"></script>
    </body>
</html>