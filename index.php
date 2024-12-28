<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> GRUPOS ASU </title>
        <!-- JQUERY -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!--FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <!-- Los iconos tipo Solid de Fontawesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
        <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

        <!-- Nuestro css-->
        <link rel="stylesheet" type="text/css" href="css/index.css">
    </head>
    
    <body >
        <div class="modal-dialog text-center">
            <div class="col-sm-8 main-section">
                <div class="modal-content">
                    <div class="col-12 user-img">
                        <img src="img/avatar1.png"/><br>
                    </div>
                    <form class="col-12" method="post">
                        <div class="form-group" id="user-group">
                            <input type="text" class="form-control" placeholder=" Usuario *" 
                               required="true" name="usu" />
                        </div>
                        <div class="form-group" id="clave-group">
                            <input type="password" class="form-control" placeholder=" Clave *" 
                               required="true" name="clave"/>
                        </div>
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-sign-in-alt"></i>  INICIAR SESIÓN </button>
                    </form>
                    <div class="col-12">
                        
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    
        <?php
        require './conexion/conexion.php';
        
        session_start();
        if(isset($_SESSION['usuario'])){
            header("location:inicio.php");
            exit();
        }
        
           if($_POST){
                $usuario=$_POST['usu'];
                $clave=$_POST['clave'];
                //echo $usº uario," $clave" ;
                require './Conexion/conexion.php';
             
                $existenciausql=("SELECT COUNT(*) FROM tb_animador where usuario='$usuario' ");
                $stmt1= $conexion->prepare($existenciausql);
                $stmt1->execute();
                
                $existenciausql1=("SELECT COUNT(*) FROM tb_coordinador where usuario='$usuario' ");
                $stmt11= $conexion->prepare($existenciausql1);
                $stmt11->execute();
                
                if($stmt1->fetchColumn() >= 1){
                    
                        $_SESSION['usuario']=$usuario;
                         //header("location:inicio.php");
                        header("location:inicio.php");
                        exit();
                         
                   }else if($stmt11->fetchColumn() >= 1){
                         $_SESSION['usuario']=$usuario;
                         header("location:inicio_admin.php");
                         exit();
                    }
                   else{
                     echo "<script> alert(\"No existe el usuario o la contraseña es incorrecta\"); </script>";
                    }
                    
            }
        ?>
        </form>
       
    
    </body>
</html>
