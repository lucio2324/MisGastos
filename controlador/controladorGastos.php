<?php

include '../modelo/gastosModelo.php';

$gastosModelo = new gastosModelo();

if (isset($_POST['controladorGastos'])) {

    switch ($_POST['controladorGastos']) {

        case 'insertarPedir':

            $resultado = $gastosModelo->insertGasto($_POST['categoria'], $_POST['nombre'], $_POST['importe'], $_POST['fecha'], $_POST['usuario']);

            if ($resultado == 'true') {
                $resultado1 = $gastosModelo->selectGastosByUsuario($_POST['usuario']);
                echo $resultado1;
            } else {
                echo $resultado;
            }


            break;

        case 'mostrarGastos':

            $resultado3 = $gastosModelo->selectGastosByUsuario($_POST['usuario']);

            echo $resultado3;

            break;

        case 'eliminarPedir':

            $resultado = $gastosModelo->deleteGasto($_POST['id']);
            if ($resultado == 'true') {
                $resultado1 = $gastosModelo->selectGastosByUsuario($_POST['usuario']);
                echo $resultado1;
            } else {
                echo $resultado;
            }

            break;

        case 'dastosPorCategoriaYSueldoTotal':

            $resultado = $gastosModelo->balanceByCategoria($_POST['usuario']);

            echo $resultado;

            break;
        
        case 'informePorcategoria':
            
            $resultado = $gastosModelo->informeByCategoria($_POST['Categoria'], $_POST['usuario']);
            
            echo $resultado;
            
            break;

        default:

            echo 'algo fallo';
            break;
    }
} else {

    echo 'El $_POST controladorGastos esta vacio';
}