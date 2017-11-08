<?php

include '../modelo/ingresosModelo.php';

$ingresosModelo = new ingresosModelo();

if (isset($_POST['controladorIngresos'])) {

    switch ($_POST['controladorIngresos']) {

        case 'registrarPedir':

            $resultado = $ingresosModelo->InsertIngreso($_POST['ingreso'], $_POST['fecha'], $_POST['usuario']);
            if ($resultado == 'true') {
                $resultado1 = $ingresosModelo->SelectIngresoById($_POST['usuario']);
                echo $resultado1;
            } else {
                echo $resultado;
            }

            break;

        case'mostrarIngreso':

            $resultado2 = $ingresosModelo->SelectIngresoById($_POST['usuario']);
            echo $resultado2;

            break;

        case 'eliminarPedir':

            $resultado = $ingresosModelo->deleteIngreso($_POST['id']);
            if ($resultado == 'true') {
                $resultado1 = $ingresosModelo->SelectIngresoById($_POST['usuario']);
                echo $resultado1;
            } else {
                echo $resultado;
            }

            break;

        default :

            echo 'algo fallo';
            break;
    }
} else {
    echo 'El $_POST controladorIngresos esta vacio';
}