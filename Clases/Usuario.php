<?php

class Usuario
{
    
    public $nombre_usuario;
    public $clave;

    function getNombreUsuario(){
        return $this->nombre_usuario;
    }
    function getClave(){
        return $this->clave;
    }

    function setNombreUsuario($nombre) {
        $this->nombre_usuario = $nombre;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function actualizarUsuario($clave_old, $clave_new, $usuario){
        require_once'conexion.php';
        $db= new Conexion();
        $db->conexion();
        
        // 1. Validar la clave antigua
        $sql_check = "SELECT clave FROM tb_animador WHERE usuario = '$usuario'";
        $result = $db->mostrar($sql_check);
        $clave='';
        foreach($result as $val){

            $clave=$val[0];

        }


        if($clave_old != $clave){

               return "<script> alert(\"Error: La clave antigua no coincide.\"); </script>";
        } 
        
        // 2. Validar la nueva clave
        if (!$this->validarClave($clave_new)) {
            return "<script> alert(\"Error: La nueva clave no cumple con los requisitos (8 caracteres, una letra, un número y un carácter especial)\"); </script>";
        }
        
        // 3. Actualizar la clave
        $sql="UPDATE tb_animador SET clave = '$clave_new' WHERE usuario = '$usuario'";        
        $actualizar=$db->actualizar($sql);

        if($actualizar){
            return "<script> alert(\"Clave actualizada correctamente.\"); </script>";
        }else{
            return "<script> alert(\"Error al actualizar la clave.\"); </script>";
        }
    }

     private function validarClave($clave) {
        if (strlen($clave) < 8) {
            return false;
        }
    
        if (!preg_match('/[a-zA-Z]/', $clave)) {
          return false;
        }
    
        if (!preg_match('/\d/', $clave)) {
            return false;
        }
    
        if (!preg_match('/[^a-zA-Z0-9]/', $clave)) {
            return false;
        }
    
        return true;
    }
}
?>