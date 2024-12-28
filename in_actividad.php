<?php
require './Clases/Actividad.php';
$Actividad= new Actividad();
?>

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
            
            $sql="select * from tb_animador where usuario='$username'";
            $mos=$conexion->query($sql);
            
            foreach ($mos as $re){$da="$re[2] $re[3]"; $id=$re[0]; $ca=$re[0];}

?>
<html>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1"> 
       <title> Insertar Actividad </title>
        <link rel="stylesheet" type="text/css" href="css/estils5.css" />
        <link rel="stylesheet" type="text/css" href="css/contacte.css" />
        <link rel="stylesheet"  href="css/formu.css" type="text/css" />
        
        
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
            <li><a href="in_estado_estudiante.php">Cambiar Estado de Estudiante</a></li>
          
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Mostrar <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="mostrar_integrantes.php">Estudiantes</a></li>
          
          <li><a href="generar_certificado.php">Certificados</a></li>
          
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
          <center><h3>Datos de la Actividad</h3></center>
        <?php
        
    
        
        if(!isset($_SESSION['usuario'])){
            header("location:index.php");
            exit();
        }  
            require './Conexion/conexion.php';
            $sql="select * from tb_carrera";
            $mos=$conexion->query($sql);
            
            //$sql1="select id_grupo,nombre_grupo from tb_grupo";
            //$mos1=$conexion->query($sql1);
        ?>
        
        <form method="POST" class="form" align="center">
            
            <label> Nombre de Actividad:</label>
            <input type="text" name="nombre" required="true">  
                   
            <label> Fecha:</label>
            <input type="date" name="fecha" required="true">  
                     
            <label>Lugar:</label>
            <input type="text" name="lugar"  required="true">
          
            <br><br>
            <button type="submit" >Registrar Actividad</button>
                
        </form>
          <br>
          <center>
          <a href="in_actividad2.php"><img src="img/ai.png" width="80" height="80">Añadir Participantes </a>
          </center>
          </div>
        <?php
            $usernameSesion = $_SESSION['usuario'];
            //asegurar que no tenga "", <, > o &
            $username = htmlspecialchars($usernameSesion);
            
        //SELECCION DE ID-GRUPO
        $sql1="select id_animador from tb_animador where usuario='$username'";
        $ar1=$conexion->query($sql1);
        
        foreach($ar1 as $id){
            $id_animador=$id[0]; //id_animador
        }
        $sql2="select id_grupo from tb_grupo where id_animador=$id_animador";
        $ar2=$conexion->query($sql2);
        foreach($ar2 as $idg){    
                $id_grupo=$idg[0]; //id_grupo
        }
        if($_POST){
            $nombre=$_POST['nombre'];
            $fecha=$_POST['fecha'];
            $lugar=$_POST['lugar'];
            $Actividad->insertarActividad($id_grupo, $nombre, $fecha, $lugar);
            
        }
        
        ?>
      
            
            </div>
        
        
            
        
    </body>
</html>