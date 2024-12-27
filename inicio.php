<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
    <head>
        
        <title> GRUPOS ASU </title>
        <meta charset="utf-8">
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/estilo.css" type="text/css" />
        <link rel="stylesheet" href="css/texto.css" type="text/css" />
        
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

        
        <?php          
        //DatoS del grupo
            
            $sql2="select nombre_grupo,area,descripcion,mision,vision,actividades from tb_grupo where id_animador=$id";
            $exe=$conexion->query($sql2);
            
           
            
            
            foreach($exe as $dato){
                
                    
                
                echo "<p><h1>$dato[0]</h1></p><br>";
        
                
                
                
                //GALERIA DE IMAGENES
               echo " <div class=\"slider\">
			<ul>
				<li>
  
        <img src=\"img/$dato[0]/img1.jpg\"  width=\"600\" height=\"400\"/>
              
              
 </li>
				<li>
  <img src=\"img/$dato[0]/img2.jpg\" width=\"600\" height=\"400\"/>
</li>
				<li>
  <img src=\"img/$dato[0]/img3.jpg\"  width=\"600\" height=\"400\"/>
</li>
				<li>
  <img src=\"img/$dato[0]/img4.jpg\"  width=\"600\" height=\"400\"/>
</li>
                                
			</ul>
		</div>";
                
                
                
                
                
                ?>
        
        
                
                <?php
                echo "<h2 style=\"text-align: justify\">Área</h2>";
                echo "<p style=\"text-align: justify\">$dato[1]</p><br>";
                
                echo "<h2 style=\"text-align: justify\">Descripción</h2>";
                echo "<p style=\"text-align: justify\">$dato[2]</p><br>";
                
                echo "<h2 style=\"text-align: justify\";>Misión</h2>";
                echo "<p style=\"text-align: justify\">$dato[3]</p><br>";
                
                echo "<h2 style=\"text-align: justify\">Visión</h2>";
                echo "<p style=\"text-align: justify\">$dato[4]</p><br>";
                
                echo "<h2 style=\"text-align: justify\">Actividades</h2>";
                echo "<p style=\"text-align: justify\">$dato[5]</p><br>";
                
                
                
                
            }
             
              $file ="C:\xampp\htdocs\ASU_Final\img\"$dato[0]\"\img1.jpg";
              $exists = is_file( $file );
              echo $exists;
        
        ?>
          
             </div>
       
    </body>
</html>
