<?php
class Animador {
    public $cedula;
    public $nombre;
    public $apellido;
    public $cargo;
    public $telefono;
    public $celular;
    public $correo;
    function getCedula() {
        return $this->cedula;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCargo() {
        return $this->cargo;
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

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
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
    function insertarAnimador($cedu,$nom,$ape,$cargo,$tel,$cel,$correo){
        require_once'conexion.php';
        $db= new Conexion();
        $db->conexion();
        $sql="INSERT INTO tb_animador(cedula,nombres_animador,apellidos_animador,"
                . "cargo,telefono,celular,correo,usuario,clave)"
                . "VALUES ('$cedu','$nom','$ape','$cargo','$tel','$cel','$correo','$cedu','$cedu');";
        
        $insertar=$db->insertar($sql);
        echo $insertar;
    }
    
    function Mostrar_Animador(){
        require_once'conexion.php';
        $db= new Conexion();
        $db->conexion();
        $sql="select id_animador, cedula,concat(nombres_animador,' ',apellidos_animador) as nombres, cargo,celular,correo from tb_animador";
        $cmb=$db->mostrar($sql);
        
        
        
        $acu="";
        
        $acu.="<table class=\"table table-hover table-bordered\">";
                $acu.="<th class=\"table-dark\">Id</th>";
                $acu.="<th class=\"table-dark\">Cedula</th>";
                $acu.= "<th class=\"table-dark\">Nombres</th>";
                $acu.= "<th class=\"table-dark\">Cargo</th>";
                $acu.= "<th class=\"table-dark\">Celular</th>";
                $acu.= "<th class=\"table-dark\">Correo</th>";
                $acu.= "<th class=\"table-dark\">Grupo</th>";
       
                
         foreach ($cmb as $re){
            for ($index = 0; $index <1; $index++) {   
            $acu.= "<tr>";
            $acu.= "<td>$re[0]</td>";
            $acu.= "<td>$re[1]</td>";
            $acu.= "<td>$re[2]</td>";
            $acu.= "<td>$re[3]</td>";
            $acu.= "<td>$re[4]</td>";
            $acu.= "<td>$re[5]</td>";
            
            
             
            $sql1="select nombre_grupo from tb_grupo where id_animador=$re[$index]";
            $cmb1=$db->mostrar($sql1);
            foreach ($cmb1 as $gru){
                $acu.= "<td>$gru[0]</td>";
                
            }
                
            }
            
            $acu.= "</tr>";
            
        }
        
        $acu.= "</table>";
        return $acu;
        $db=null;
    }

    
    
    function MostrarCmbAnimador(){
        require_once'conexion.php';
        $db= new Conexion();
        $db->conexion();
        $sql="select id_animador, concat(nombres_animador,' ',apellidos_animador) as nombres from tb_animador";
        $cmb=$db->mostrar($sql);
        $acu="";
        foreach ($cmb as $re){
            $acu.= "<option value=$re[0]>$re[1]</option>";
        }
        return $acu;
        $db=null;
    }
    
}
