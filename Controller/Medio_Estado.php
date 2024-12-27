<?php
        // put your code here
        require '../conexion/conexion.php';
        $clave=$_POST['clave'];
        $estado=$_POST['estado'];
        
        if($estado=="Activo"){
            $sql="update tb_estudiante set estado=0 where cedula=$clave;";
        }else{
            $sql="update tb_estudiante set estado=1 where cedula=$clave;";
        }
        $inse=$conexion->prepare($sql);
        echo $inse->execute();
        
        
?>