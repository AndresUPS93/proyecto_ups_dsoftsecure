<?php
require_once './Clases/Usuario.php';
$Usuario= new Usuario();
?>
<?PHP

    session_start();
        
        if(!isset($_SESSION['usuario'])){
            header("location:index.php");
            exit();
        }
        
        require_once './Conexion/conexion.php';
            $usernameSesion = $_SESSION['usuario'];
            //asegurar que no tenga "", <, > o &
            $username = htmlspecialchars($usernameSesion);
            
            $sql="select * from tb_animador where usuario='$username'";
            $mos=$conexion->query($sql);
            
            foreach ($mos as $re){$da="$re[2] $re[3]"; $id=$re[0]; $ca=$re[0];}            
           

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
    <title> Insertar Estudiante </title>
    
    <link rel="stylesheet" type="text/css" href="css/contacte.css" />
    <link rel="stylesheet"  href="css/formu.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/estils5.css" />
    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js" integrity="sha384-oqVuAfXRKap7fdgcCY5uykM6+R9GqQ8K/uxy9rx7HNQlGYl1kPzQho1wx4JwY8wC"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/estilo.css" type="text/css" />
        
        <style>
      .navbar-inverse {
    background-color: #12457a;
    border-color: white;
}

.navbar-inverse .navbar-brand {
    color: lightgray;
    
}

.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:focus, .navbar-inverse .navbar-nav > .active > a:hover {
    color: #fff;
    background-color: #12457a;
}

.navbar-inverse .navbar-nav > li > a {
    color: beige;
}

.navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:focus, .navbar-inverse .navbar-nav > .open > a:hover {
    color: #fff;
    background-color: gray;
}

  </style>



</head>

<body>
    <div id="header">

            <a href="#">
            <img
                id="logo"
                src="img/logope.jpg"
                alt="logo"
                width="380"
                height="80" />
           
            </a>
      
       </div>
    
<nav class="navbar navbar-inverse"  >
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">
         
                           Asocianismo Salesiano Universitario  
    </a>
        
    </div>
    <ul class="nav navbar-nav">
        <li class="active"><a href="inicio.php">Inicio</a></li>
      
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Insertar <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="in_estudiante.php">Estudiante</a></li>
            <li><a href="in_actividad.php">Actividad</a></li>

          
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Mostrar <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="mostrar_integrantes.php">Estudiantes</a></li>
         
          <li><a href="generar_certificado.php">Certificados</a></li>
          
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Seguridad<span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="in_clave.php">Actualizar Contraseña</a></li>
          
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Bienvenido/a <?php echo $da;?> </a></li>
      <li><a href="CerrarSesion.php"><span class="glyphicon glyphicon-off"></span> Cerrar sesión</a></li>
    </ul>
  </div>
</nav>
        
    <div class="container">
        
            <div class="center"><h3>Cambio de Contraseña</h3></div>
                <?php
                if(!isset($_SESSION['usuario'])){
                    header("location:index.php");
                    exit();
                }  
                require_once './conexion/conexion.php';
                
                ?>
        
        <form method="POST" class="form" align="center" enctype="multipart/form-data">
            <label>Clave Actual</label>
            <input type="password" class="form-control" placeholder=" Clave *" required="true" name="clave_old"/>

            <label>Clave Nueva</label>
            <input type="password" class="form-control" placeholder=" Clave *" required="true" name="clave_new"/>


            
            <br><br>
            <button type="submit" class="btn-primary" >Actualizar</button>
                
        </form>
          </div>
        <?php
        
        
        //require './Conexion/conexion.php';
        $usernameSesion = $_SESSION['usuario'];
            //asegurar que no tenga "", <, > o &
        $username = htmlspecialchars($usernameSesion);

        if($_POST){
            $clave_old=$_POST['clave_old'];
            $clave_new=$_POST['clave_new'];
            
            $msj=$Usuario->actualizarUsuario($clave_old, $clave_new, $username);
            echo $msj;
        }
              
        
        
            
        ?>
            <!--<a href="http://localhost/GruposASU/in_historico.php/?variable1=$grupo">Siguiente</a>;-->
          
            

        
        
           
        
</body>

<script type="text/javascript">
function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
        }
        
function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
 </script>
</html>