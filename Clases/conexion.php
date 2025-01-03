<?php

class Conexion{  
    private $cone="";
    public function conexion(){
        try{
            $user="root";
            $pass=getenv('MYSQL_SECURE_PASSWORD');
            $dbname="dbasu2019";
            $this->cone= new PDO("mysql:host=localhost;charset=UTF8;dbname=$dbname",$user,$pass);
            
        } catch (Exception $ex) {
            echo "Error".$ex->getMessage();
        }
    }
    
    public function mostrar($sql){
        $mostrar=$this->cone->query($sql);
        return $mostrar;
    }
    public function insertar($sql){
        $inser=$this->cone->prepare($sql);
        $mensa="";
        if($inser->execute()){
            $mensa= "<script> alert(\"Los datos se han ingresado con éxito\"); </script>";
        } else {
            $mensa="<script> alert(\"Error-->Revise los datos ingresados\"); </script>";
        } 
        return $mensa;
    }

    public function actualizar($sql){
        $inser=$this->cone->prepare($sql);
        $mensa="";
        if($inser->execute()){
            $mensa= "<script> alert(\"Los datos se han actulizado con éxito\"); </script>";
        } else {
            $mensa="<script> alert(\"Error-->Revise los datos ingresados\"); </script>";
        } 
        return $mensa;
    }
    
}
