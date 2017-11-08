<?php

class usuario{
    
    private $id;
    private $nombre;
    private $contraseña;
    private $email;
    
    public function __construct() {
        
    }
        public function setId($id){
        $this->id = $id;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setContraseña($contraseña){
        $this->contraseña = $contraseña;
    }
    
    public function getContraseña(){
        return $this->contraseña;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    
   

}



