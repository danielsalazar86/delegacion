<?php

include_once 'teatroMod.php';
include_once 'funcionesTeatro.php';

function menuOpciones(){
    echo "Menu de opciones\n";
    echo "1 = Cargar datos\n";
    echo "2 = Cambiar nombre  y direccion del teatro\n";
    echo "3 = Cambiar los datos de una funcion\n";
    echo "4 = Corroborar horarios de funciones\n";
    echo "5 = Visualizar toda la informacion\n";
    echo "0 = Salir\n";
    $opc = trim(fgets(STDIN));
    return $opc;
}

function main(){
    $cargarDatos = false;
    do{
        $resp = menuOpciones();
        if($resp == 1){
                $arregloFuncionesT = array();                 
                echo "Ingrese nombre del teatro\n";
                $nombreT = trim(fgets(STDIN));
                echo "Ingrese direccion de teatro\n";
                $direccionT = trim(fgets(STDIN));
                
                echo "Ingrese el total de funciones\n";
                $totalFunciones = trim(fgets(STDIN));
                for($i=0; $i<$totalFunciones; $i++){
                    echo "Ingrese nombre de la funcion\n";
                    $nombreFuncion = trim(fgets(STDIN));
                    echo "Ingrese hora de inicio\n";
                    $horaInicio = trim(fgets(STDIN));
                    echo "Ingrese duración de la obra\n";
                    $duracionObra = trim(fgets(STDIN));
                    echo "Ingrese precio de la funcion\n";
                    $precio = trim(fgets(STDIN));                
                    $funciones = new Funciones($nombreFuncion, $horaInicio, $duracionObra, $precio);     
                    $arregloFuncionesT[$i] = $funciones;
                }
                $teatro = new Teatro($nombreT, $direccionT, $arregloFuncionesT);
                $cargarDatos = true;
        }
        
        elseif($resp == 2){
            if($cargarDatos == true){
                echo "Ingrese nuevo nombre del teatro\n";
                $nombre = trim(fgets(STDIN));
                echo "Ingrese nueva dirección del teatro\n";
                $direccion = trim(fgets(STDIN));
                $teatro->cambiarTeatro($nombre, $direccion);
            }
            else{
                echo "ERROR, aun no se han cargado los datos\n";
            }
        }
        
        elseif($resp == 3){
            if($cargarDatos == true){
                echo "Ingrese el nombre de la nueva funcion\n";
                $nuevaFuncion = trim(fgets(STDIN));
                echo "Ingrese hora de inicio\n";
                $horaInicio = trim(fgets(STDIN));
                echo "Ingrese la duracion\n";
                $duracionObra = trim(fgets(STDIN));
                echo "Ingrese precio de la nueva funcion\n";
                $precioNuevo = trim(fgets(STDIN));
                echo "Ingrese el numero de la funcion a reemplazar\n";
                $posicion = trim(fgets(STDIN));
                $teatro->cambiarFunciones($nuevaFuncion, $horaInicio, $duracionObra, $precioNuevo, $posicion);
            }
            else{
                echo "ERROR, aun no se han cargado los datos\n";
            }
        }
        
        elseif($resp == 4){
            if($cargarDatos == true){
                if($teatro->corroboraHorariosFunciones()){
                    echo "Atencion, hay funciones que poseen el mismo horario, revisar!!!\n"; 
                }
                else{
                    echo "Todas las funciones tienen distintos horarios\n"; 
                }   
            }
            else{
                echo "ERROR, aun no se han cargado los datos\n";
            }
        }
        
        elseif($resp == 5){
            if($cargarDatos == true){
                echo $teatro;
            }
            else{
                echo "ERROR, aun no se han cargado los datos\n";
            }
        }
    }while($resp != 0);
}
main();
?>