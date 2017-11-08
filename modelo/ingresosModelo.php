<?php

require '../bd/mysql.php';

class ingresosModelo {

    private $msj;

    public function InsertIngreso($valor, $fechaIngreso, $idUsuario) {

        $con = new mysql();

        filter_var($valor, FILTER_SANITIZE_SPECIAL_CHARS);
        filter_var($fechaIngreso, FILTER_SANITIZE_SPECIAL_CHARS);

        $query = "INSERT INTO ingresos( valor, fechaIngreso, idUsuario) VALUES ( :valor, :fechaIngreso, :idUsuario )";


        $sql = $con->prepare($query);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql->bindValue(':valor', $valor, PDO::PARAM_INT);
        $sql->bindValue(':fechaIngreso', $fechaIngreso, PDO::PARAM_STR);
        $sql->bindValue(':idUsuario', $idUsuario, PDO::PARAM_STR);

        $sql->execute();
        $insertar = $sql->rowCount();

        if ($insertar != 0) {
            return $this->msj = 'true';
        } else {
            return $this->msj = 'false';
        }
    }

    public function SelectIngresoById($idUsuario) {

        $con = new mysql();

        $query = "SELECT id, valor, fechaIngreso FROM ingresos c WHERE c.idUsuario = :idUsuario";

        $sql = $con->prepare($query);
        $sql->bindValue(":idUsuario", $idUsuario, PDO::PARAM_STR);
        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function deleteIngreso($idIngreso) {

        $con = new mysql();

        $query = "DELETE FROM ingresos  WHERE id = :idIngreso ";

        $sql = $con->prepare($query);
        $sql->bindValue(':idIngreso', $idIngreso, PDO::PARAM_INT);
        $sql->execute();

        if ($sql == TRUE) {
            return $this->msj = 'true';
        } else {
            return $this->msj = 'false';
        }
    }
    
    

}
