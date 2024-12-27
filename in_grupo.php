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
require './Clases/Grupo.php';
$Animador= new Animador();
$Grupo= new Grupo();
?>
<html>
    <head>
       <meta charset="UTF-8">
        <title> Insertar Grupo </title>
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
          <center><h3>Datos del Grupo</h3></center>
        
        
        <form method="POST" class="form" align="center">
            <label>Animador</label>
            <select name="animador" >
                <?php
                    $cmbAnimador=$Animador->MostrarCmbAnimador();
                    echo $cmbAnimador;
                ?>
            </select>
            <br><br>

            <label> Nombre del grupo</label>
            <input type="text" name="ngrupo" required="true">  


            <label> Descripción</label>
            <textarea name="desc" cols="40" rows="5" required="true"></textarea>  
            <br><br>
            <label>Misión</label>
            <textarea name="mision" cols="40" rows="5" required="true"></textarea> 
            <br><br>
            <label>Visión</label>
            <textarea name="vision" cols="40" rows="5" required="true"></textarea>
            <br><br>
            <label>Actividades</label>
            <textarea name="act" cols="40" rows="5" required="true"></textarea>
            <br><br>


            <label>Número de Integrantes</label>
            <br>
            <input type="text" name="nint" required="true"> 
            <br><br>

            <label>Área</label>
                        <select name="area" >


            echo "<option value="Cultural">Cultural</option>";
            echo "<option value="Comunicacional">Comunicacional</option>";
            echo "<option value="Académico">Académico</option>";
            echo "<option value="Deportiva">Deportiva</option>";
            echo "<option value="Socio Político de Pastoral">Socio Político de Pastoral</option>";
            echo "<option value="Socio Político de Bienestar Estudiantil">Socio Político de Bienestar Estudiantil</option>";


                 </select>
            <br><br>
            <button type="submit" >Registrar Grupo</button>
                
        </form>
          </div>
        <?php
            
            if($_POST){
                
                $anim=$_POST['animador'];
                $ngrupo=$_POST['ngrupo'];
                $desc=$_POST['desc'];
                $mis=$_POST['mision'];
                $vis=$_POST['vision'];
                $act=$_POST['act'];
                $nint=$_POST['nint'];
                
                $insertarGrupo=$Grupo->insertarGrupo($anim, $ngrupo, $desc, $mis, $vis, $act, $nint);
                    
                     
            }
        ?>
      
            
            </div>
        
        
            
        
    </body>
</html>
