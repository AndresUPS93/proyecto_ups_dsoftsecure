<?php

class Actividad {
    function getNombre() {
        return $this->nombre;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getLugar() {
        return $this->lugar;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setLugar($lugar) {
        $this->lugar = $lugar;
    }
    function insertarActividad($id_grupo,$nombre,$fecha,$lugar){
        require_once'conexion.php';
        $db= new Conexion();
        $db->conexion();
        $sql="INSERT INTO tb_actividades(id_grupo,nombre_actividad,fecha_actividad,lugar)"
                        . "VALUES ($id_grupo,'$nombre','$fecha','$lugar')";
        
        $insertar=$db->insertar($sql);
        echo $insertar;
    }


    
}