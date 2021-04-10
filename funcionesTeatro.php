<?php

class Funciones{
    //atributos
    private $nombreFuncion;
    private $horaInicio;
    private $duracionObra;
    private $precio;

    public function __construct($nombreFuncion, $horaInicio, $duracionObra, $precio){
        $this->nombreFuncion = $nombreFuncion;
        $this->horaInicio = $horaInicio;
        $this->duracionObra = $duracionObra;
        $this->precio = $precio;
    }
    
    //Sets.
    public function setNombreFuncion($nombre){
        $this->nombreFuncion = $nombre;
    }
    public function setHoraInicio($hora){
        $this->horaInicio = $hora;
    }
    public function setDuracionObra($duracion){
        $this->duracionObra = $duracion;
    }
    public function setPrecio($valor){
        $this->precio = $valor;
    }
    //Gets.
    public function getNombreFuncion(){
        return $this->nombreFuncion;
    }
    public function getHoraInicio(){
        return $this->horaInicio;
    }
    public function getDuracionObra(){
        return $this->duracionObra;
    }
    public function getPrecio(){
        return $this->precio;        
    }
   
    public function __toString(){
        $cadena = "- Nombre de la funcion: ".$this->getNombreFuncion()." - Hora de inicio: ".$this->getHoraInicio().
        " - Duracion de la obra: ".$this->getDuracionObra()." - Precio: ".$this->getPrecio()."\n";
        return $cadena;
    } 
} //Cierre class.
?>