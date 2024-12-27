<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
       <meta charset="UTF-8">
        <title> Insertar Coordinador </title>
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
                    <li id="blau"><a href="#">Animador</a></li>
                    <li id="groc"><a href="#">Grupo</a></li>
		
		</ul>
            </li>
            
            <li id="metro"><a href="#">Mostrar</a>
		<ul>
                    <li id="blau"><a href="#">Animadores</a></li>
                    <li id="groc"><a href="#">Grupos</a></li>
		
		</ul>
            </li>
            
           <li id="start" class="current"><a href="CerrarSesion.php">Cerrar Sesión</a></li>
        
        </ul>
    </div>
        
        <div id="main">

      <div id="content">
          <center><h3>Datos del Coordinador</h3></center>
        
        
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
                    <button type="submit" >Registrar Coordinador</button>
                
        </form>
          </div>
        <?php
            require './Conexion/conexion.php';
            if($_POST){
                
                $cedu=$_POST['cedula'];
                $nom=$_POST['nombres'];
                $ape=$_POST['apellidos'];
                $cargo=$_POST['cargo'];
                $correo=$_POST['correo'];
                $tel=$_POST['tel'];
                $cel=$_POST['cel'];
                
                
                    $sql="INSERT INTO tb_coordinador(nombres_coordinador,apellidos_coordinador,cedula,cargo,celular,telefono,correo,usuario,clave)"
                            . "VALUES ('$nom','$ape','$cedu','$cargo','$cel','$tel','$correo','$cedu','$cedu')";
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
