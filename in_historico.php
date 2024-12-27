<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
       <meta charset="UTF-8">
        <title> Insertar Histórico </title>
        <link rel="stylesheet" type="text/css" href="css/estils5.css" />
        <link rel="stylesheet" type="text/css" href="css/contacte.css" />
        <link rel="stylesheet" href="css/estilo.css" type="text/css" />
        <link rel="stylesheet"  href="css/formu.css" type="text/css" />
        
        
        
    </head>
    <body>
      <div id="header">
        <h1>
            <a href="#">
            <img
                id="logo"
                src="img/imagen.png"
                alt="logo"
                width="480"
                height="96" />
            GRUPOS ASU
            </a>
        </h1>
      
    </div>
    <div id="nav">
      <h2>Navegació</h2>
        <ul>
           <li id="start" class="current"><a href="#">Inicio</a></li>
	   
	    <li id="metro"><a href="#">Insertar</a>
		<ul>
                    <li id="blau"><a href="in_estudiante.php">Estudiante</a></li>
                    <li id="groc"><a href="in_actividad.php">Actividad</a></li>
		
		</ul>
            </li>
            
            <li id="metro"><a href="#">Mostrar</a>
		<ul>
                    <li id="blau"><a href="#">Estudiantes</a></li>
                    <li id="groc"><a href="#">Actividades</a></li>
		
		</ul>
            </li>
                <li id="start" class="current"><a href="CerrarSesion.php">Cerrar Sesión</a></li>
        </ul>
    </div>
        
        <div id="main">

      <div id="content">
          <center><h3>Registro Histórico</h3></center>
        
        
        <form method="POST" class="form" align="center">
            
                
                                 
                                
                    <label> Fecha de ingreso:</label>
                    <input type="date" name="fin" required="true">  
                   
                     
                    <label> Fecha de salida:</label>
                    <input type="date" name="fout">  
                    
          
                    <br><br>
                    <button type="submit" >Registrar Histórico</button>
                
        </form>
          </div>
        <?php
            require './Conexion/conexion.php';
            $g=$_GET['grupo'];
            echo $g;
            
            if($_POST){
                
                
                
                
                
                
                
                
                $fingreso=$_POST['grupo'];
                $fsalida=$_POST['nombre'];
              
                
                
                
                    $sql="INSERT INTO tb_historico(id_estudiante,fecha_ingreso,fecha_salida)"
                            . "VALUES ($grupo,'$fingreso','$fsalida')";
                    //echo "$sql";
                    $inser=$conexion->prepare($sql);
                    $inser->execute();
                    echo "<script> alert(\"Los datos se han ingresado con éxito\"); </script>";
                                
                
                
                
            }
        ?>
      <div id="menu">
        <h2>Menú</h2>
        
	
      </div>
            
            </div>
        
        
            
        
    </body>
</html>