<?php


class gastos {
    
    private $id;
    private $tipoGasto;
    private $descripcion;
    private $valorGasto;
    private $fechaGasto;
    
    
//    FALTA
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setTipoGasto($tipoGasto){
        $this->tipoGasto = $tipoGasto;
    }
    
    public function getTipoGasto(){
        return $this->tipoGasto;
    }
    
    public function setDescripcion($Descripcion){
        $this->Descripcion = $Descrpicion;
    }
    
    public function getDescripcion(){
        return $this->Descripcion;
    }
    
    public function setValorGasto($valorGasto){
        $this->vaorGasto = $valorGasto;
    }
    
    public function getValorGasto(){
        return $this->valorGasto;
    }
    
    public function setFechaGasto($fechaGasto){
        $this->fechaGasto = $fechaGasto;
    }
    
    public function getFechaGasto(){
        return $this->fechaGasto;
    }
    
  
    }
