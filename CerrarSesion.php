<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        require './conexion/conexion.php';
        session_start();
        session_destroy();
        $conexion=null;
        header("location:index.php");
        exit();
        ?>
    </body>
</html>
