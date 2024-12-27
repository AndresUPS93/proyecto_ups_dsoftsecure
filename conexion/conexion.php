<?php

    $user="root";
    $pass="";
    $dbname="dbasu2019";
    
    /*En este caso el tipo es pgsql, además le indicamos el puerto */
    
    
    try{
       // $conexion=new PDO("pgsql:host=localhost;port=5432;dbname=$dbname",$user,$pass);
       $conexion=new PDO("mysql:host=localhost;charset=UTF8;dbname=$dbname",$user,$pass);
                
        
    } catch (Exception $ex) {
        echo "Conexion no exitosa";
        //print "¡Error!: " . $ex->getMessage() . "<br/>";
    }
