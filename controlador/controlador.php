<?php

include '../modelo/usuarioModelo.php';

$userModel = new usuarioModelo();


if (isset($_POST['controlador'])) {

    switch ($_POST['controlador']) {

        case 'login':
            
            $resultado = $userModel->validateUsuario($_POST['usuario'], $_POST['clave']);
           
                echo $resultado;
           
            break;


        case 'registrar':

            $resultado2 = $userModel->insertUsuario($_POST['usuario'], $_POST['clave']);
            
            echo $resultado2;

            break;


        
        default :

            echo'algo fallo';

            break;
    }
} else {
    echo 'El $_POST controlador esta vacio';
}

