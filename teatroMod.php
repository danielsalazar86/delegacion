<?php

class Teatro{
    //atributos
    private $nombreTeatro;
    private $direccionTeatro;
    private $funciones;
    
    public function __construct($nombreT, $direccionT, $funcionesT){    
        $this->nombreTeatro = $nombreT;
        $this->direccionTeatro = $direccionT;
        $this->funciones = $funcionesT;
    }
    
    //Sets.
    public function setNombre($nombre){
        $this->nombreTeatro = $nombre;
    }
    public function setDireccion($direccion){
        $this->direccionTeatro = $direccion;
    }
    public function setFunciones($arrayFunciones){
        $this->funciones = $arrayFunciones;
    }
    
    //Gets.
    public function getNombre(){
        return $this->nombreTeatro;
    }
    public function getDireccion(){
        return $this->direccionTeatro;
    }
    public function getFunciones(){
        return $this->funciones;
    }
    
    
    public function cambiarTeatro($nombre, $direccion){
        $this->setNombre($nombre);
        $this->setDireccion($direccion);
    }
    
    public function cambiarFunciones($nuevaFuncion, $horaInicio, $duracion,  $precioNuevo, $posicion){
        $arregloFunciones = $this->getFunciones();
        $esta = false;
        $i = 0;
        $j = count($arregloFunciones);
        while($i< $j && !$esta){
            if($i == $posicion){
                $arregloFunciones[$i]->setNombreFuncion($nuevaFuncion);
                $arregloFunciones[$i]->setHoraInicio($horaInicio);
                $arregloFunciones[$i]->setDuracionObra($duracion);
                $arregloFunciones[$i]->setPrecio($precioNuevo);
                $this->setFunciones($arregloFunciones);
               $esta = true;
            }
        $i++;
        }
    }
    
    public function corroboraHorariosFunciones(){
        $arregloFunciones2 = $this->getFunciones();
        $sale = false;
        $i = 0;
        $j = count($arregloFunciones2);
        $arregloHoras = array();
        while($i< $j){
               $arregloHoras[$i]  =  $arregloFunciones2[$i]->getHoraInicio();  
               $i++;
        }
        
        if(count($arregloHoras) > count(array_unique ($arregloHoras))){
           $sale = true; 
        }
        
        return $sale;       
     }
   
    public function __toString(){
        $cadena = "El teatro ".$this->getNombre(). " esta ubicado en la direccion ".$this->getDireccion()."\n".
        "Presenta las siguientes funciones: \n";
        $arregloFunciones3 = $this->getFunciones();
        
        foreach ($arregloFunciones3 as $valor){
            $cadena.= $valor;
        }
        return $cadena;
    }
} //cierre class.