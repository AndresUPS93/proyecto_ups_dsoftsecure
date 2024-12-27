<?php
class Carrera{
    
    public $nombre_carrera;
    function getNombre_carrera() {
        return $this->nombre_carrera;
    }

    function setNombre_carrera($nombre_carrera) {
        $this->nombre_carrera = $nombre_carrera;
    }

        function MostrarCmbCarerra(){
        require_once'conexion.php';
        $db= new Conexion();
        $db->conexion();
        $sql="select * from tb_carrera";
        $cmb=$db->mostrar($sql);
        $acu="";
        foreach ($cmb as $re){
            $acu.= "<option value=$re[0]>$re[1]</option>";
        }
        return $acu;        
    }
}
