<?php
    
class Estudiante{
    public $nombre; 
    public $apellido; 
    public $telefono; 
    public $celular; 
    public $correo; 
    public $nivel; 
    
    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCelular() {
        return $this->celular;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getNivel() {
        return $this->nivel;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function MostrarEstudiantes($idg){
        require_once 'conexion.php';
        $db= new Conexion();
        $db->conexion();
        $sql="select * from tb_estudiante where id_grupo=$idg";
        $cmb=$db->mostrar($sql);
        $acu="";
        $acu.="<table class=\"table table-hover table-bordered\">";
                $acu.="<th class=\"table-dark\">Id</th>";
                $acu.= "<th class=\"table-dark\">Nombres</th>";
                $acu.= "<th class=\"table-dark\">Apellidos</th>";
                $acu.= "<th class=\"table-dark\">Nivel</th>";
                $acu.= "<th class=\"table-dark\">Rol</th>";
        foreach ($cmb as $re){
            $acu.= "<tr>";
            $acu.= "<td>$re[0]</td>";
            $acu.= "<td>$re[4]</td>";
            $acu.= "<td>$re[5]</td>";
            $acu.= "<td>$re[9]</td>";
            $acu.= "<td>$re[10]</td>";
            $acu.= "</tr>";
        }
        
        $acu.= "</table>";
        return $acu;        
    }
    
    function insertarEstudiante($idg,$carrera,$cedu,$nom,$ape,$tel,$cel,$correo,$niv,$rol,$destino){
        require_once'conexion.php';
        $db= new Conexion();
        $db->conexion();
        $sql="INSERT INTO tb_estudiante(id_grupo,id_carrera,cedula,nombres,"
                . "apellidos,telefono,celular,correo,nivel,rol,foto,estado)"
            . "VALUES ($idg,$carrera,'$cedu','$nom','$ape','$tel','$cel','$correo',$niv,'$rol','$destino',1)";
        
        $insertar=$db->insertar($sql);
        echo $insertar;
           
            
    }


   
}
