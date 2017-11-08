<?php

require '../bd/mysql.php';

class usuarioModelo {

    private $result;
    private $msj;

    public function validateUsuario($nombre, $contrasena) {

        filter_var($nombre, FILTER_SANITIZE_SPECIAL_CHARS);
        filter_var($contrasena, FILTER_SANITIZE_SPECIAL_CHARS);


        $query = "select nombre from usuario c WHERE c.nombre=:nombre";
        $query2 = "select nombre, contrasena from usuario c where c.nombre=:nombre AND c.contrasena=:contrasena";

        $con = new mysql();

        $sql = $con->prepare($query);
        $sql->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $sql->execute();
        $validarNombre = $sql->rowCount();

        if ($validarNombre != 0) {

            $sql2 = $con->prepare($query2);
            $sql2->bindValue(':nombre', $nombre, PDO::PARAM_STR);
            $sql2->bindValue(':contrasena', $contrasena, PDO::PARAM_STR);
            $sql2->execute();
            $validarContrasena = $sql2->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($validarContrasena)) {

                return $this->msj = 'true';
            } else {

                return $this->msj = 'contraseña incorrecta';
            }
        } else {

            return $this->msj = 'el usuario no exite';
        }
    }

    public function insertUsuario($nombre, $contrasena) {

        filter_var($nombre, FILTER_SANITIZE_SPECIAL_CHARS);
        filter_var($contrasena, FILTER_SANITIZE_SPECIAL_CHARS);
        $query = "INSERT INTO usuario ( nombre , contrasena ) VALUES ( :nombre ,:contrasena )";

        $con = new mysql();
        $sql = $con->prepare($query);
        $sql->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $sql->bindValue(':contrasena', $contrasena, PDO::PARAM_STR);

        $sql->execute();

        if ($sql == TRUE) {

            return $this->msj = 'true';
        } else {
            return $this->msj = 'false';
        }
    }

}
