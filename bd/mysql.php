<?php

class mysql extends PDO {

    private $driver = "mysql";
    private $host = "localhost";
    private $port = "3306";
    private $namebd = "A-ControlCash";
    private $username = "alvaro";
    private $password = "alvaro";
    protected $db;

    public function __construct() {

        
        $dsn = $this->driver . ':host=' . $this->host . ';port= ' . $this->port . ';dbname=' . $this->namebd;

        try {
            parent::__construct($dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }

}
