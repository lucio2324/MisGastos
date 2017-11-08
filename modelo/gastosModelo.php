<?php

require '../bd/mysql.php';

class gastosModelo {

    private $msj;
    private $result;

    public function insertGasto($tipoGasto, $descripcion, $valorGasto, $fechaGasto, $idUsuario) {

        $con = new mysql();

        filter_var($tipoGasto, FILTER_SANITIZE_SPECIAL_CHARS);
        filter_var($descripcion, FILTER_SANITIZE_SPECIAL_CHARS);
        filter_var($valorGasto, FILTER_SANITIZE_SPECIAL_CHARS);

        $query = "INSERT INTO gastos (tipoGasto, descripcion, valorGasto, fechaGasto, idUsuario) VALUES ( :tipoGasto,:descripcion ,:valorGasto , :fechaGasto ,:idUsuario )";


        $sql = $con->prepare($query);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql->bindValue(':tipoGasto', $tipoGasto, PDO::PARAM_STR);
        $sql->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
        $sql->bindValue(':valorGasto', $valorGasto, PDO::PARAM_INT);
        $sql->bindValue(':fechaGasto', $fechaGasto, PDO::PARAM_STR);
        $sql->bindValue(':idUsuario', $idUsuario, PDO::PARAM_STR);

        $sql->execute();

        if ($sql == TRUE) {
            return $this->msj = 'true';
        } else {
            return $this->msj = 'false';
        }
    }

    public function selectGastosByUsuario($idUsuario) {

        $con = new mysql();

        $query = "SELECT id,fechaGasto, valorGasto  FROM gastos c WHERE c.idUsuario = :idUsuario";

        $sql = $con->prepare($query);
        $sql->bindValue(":idUsuario", $idUsuario, PDO::PARAM_STR);
        $sql->execute();

        $this->result = $sql->fetchAll(PDO::FETCH_ASSOC);

        header('Content-Type: application/json');
        return json_encode($this->result);
    }

    public function deleteGasto($idGasto) {

        $con = new mysql();

        $query = "DELETE FROM gastos WHERE id = :idGasto";

        $sql = $con->prepare($query);
        $sql->bindValue(":idGasto", $idGasto, PDO::PARAM_INT);
        $sql->execute();

        if ($sql == TRUE) {
            return $this->msj = 'true';
        } else {
            return $this->msj = 'false';
        }
    }

    public function balanceByCategoria($idUsuario) {
        $con = new mysql();

        $query = "select  c.tipoGasto, sum(c.valorGasto) from gastos c WHERE c.idUsuario= :idUsuario group by c.tipoGasto, c.idUsuario";
        $sql = $con->prepare($query);
        $sql->bindValue(":idUsuario", $idUsuario, PDO::PARAM_STR);
        $sql->execute();
        $this->result = $sql->fetchAll(PDO::FETCH_KEY_PAIR);

        $gastoTotal = 0;
        foreach ($this->result as $valor) {
            $gastoTotal = $gastoTotal + $valor;
        }

        $this->result = array_map('intval', $this->result);

        $query2 = "select c.idUsuario, sum(c.valor) as 'ingreso' from ingresos c where c.idUsuario =:idUsuario";
        $sql2 = $con->prepare($query2);
        $sql2->bindValue(":idUsuario", $idUsuario, PDO::PARAM_STR);
        $sql2->execute();
        $result2 = $sql2->fetchAll(PDO::FETCH_KEY_PAIR);

        $ingreso = (int) $result2[$idUsuario];

        $balance = $ingreso - $gastoTotal;

        $this->result['ingresoTotal'] = $ingreso;
        $this->result['balance'] = $balance;
        header('Content-Type: application/json');
        return json_encode($this->result);
    }
    
     public function informeByCategoria($Categoria, $idUsuario) {

        $con = new mysql();

        $query = 'SELECT id, descripcion, valorGasto, fechaGasto FROM gastos WHERE tipoGasto= :Categoria AND idUsuario= :idUsuario ';

        $sql = $con->prepare($query);
        $sql->bindValue(':Categoria', $Categoria, PDO::PARAM_STR);
        $sql->bindValue(':idUsuario', $idUsuario, PDO::PARAM_STR);
        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        
        header('Content-Type: application/json');
        return json_encode($result);
    }

}
