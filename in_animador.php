<?PHP

    session_start();
        
        if(!isset($_SESSION['usuario'])){
            header("location:index.php");
            exit();
        }
        
        require './Conexion/conexion.php';
            $usernameSesion = $_SESSION['usuario'];
            //asegurar que no tenga "", <, > o &
            $username = htmlspecialchars($usernameSesion);
            
            $sql="select * from tb_coordinador where usuario='$username'";
            $mos=$conexion->query($sql);
            
            foreach ($mos as $re){$da="$re[1] $re[2]"; $id=$re[0]; $ca=$re[0];}

?>



<?php
    require './Clases/Animador.php';
    $Animador = new Animador();
?>
<html>
    <head>
       <meta charset="UTF-8">
        <title> Insertar Animador </title>
        <link rel="stylesheet" type="text/css" href="css/estils5.css" />
        <link rel="stylesheet" type="text/css" href="css/contacte.css" />
        <link rel="stylesheet"  href="css/formu.css" type="text/css" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
        <li class="active"><a href="inicio_admin.php">Inicio</a></li>
      
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Insertar <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="in_animador.php">Animador</a></li>
            <li><a href="in_grupo.php">Grupo</a></li>
            
          
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Mostrar <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="mostrar_animadores.php">Animadores</a></li>
          
            <li><a href="mostrar_grupos.php">Grupos</a></li>
          
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

      <div id="content">
          <center><h3>Datos del Animador</h3></center>
        <?php
            require './Conexion/conexion.php';
            $sql="select * from tb_carrera";
            $mos=$conexion->query($sql);
        ?>
        
          
        <form method="POST" class="form" align="center">
            
                
                    <label>Cédula</label>
                    <input type="text" name="cedula" required="true" autofocus="">  
                   
                    <label> Nombres</label>
                    <input type="text" name="nombres" required="true">  
                   
                     
                    <label> Apelidos</label>
                    <input type="text" name="apellidos" required="true">  
                    
                    <label>Cargo</label>
                    <input type="text" name="cargo" required="true"> 
                   
                    <label>Teléfono</label>
                    <input type="text" name="tel">
                    
                    <label>Celular</label>
                    <input type="text" name="cel" required="true">
                    
                    <label>Correo</label>
                    <input type="text" name="correo" required="true">
                    
                    
                    <br><br>
                    <button type="submit" >Registrar Animador</button>
                
        </form>
          </div>
        <?php
            //require './Conexion/conexion.php';
            if($_POST){
                
                $cedu=$_POST['cedula'];
                $nom=$_POST['nombres'];
                $ape=$_POST['apellidos'];
                $cargo=$_POST['cargo'];
                $correo=$_POST['correo'];
                $tel=$_POST['tel'];
                $cel=$_POST['cel'];
                
                $insertar=$Animador->insertarAnimador($cedu, $nom, $ape, $cargo, $tel, $cel, $correo);
                   
            }
        ?>
      
            
            </div>
        
        
            
        
    </body>
</html>
