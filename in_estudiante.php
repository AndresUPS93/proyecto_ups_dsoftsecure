<?php
require './Clases/Carrera.php';
require './Clases/Estudiante.php';
$Carrera= new Carrera();
$Estudiante= new Estudiante();
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
<head>
   <meta charset="UTF-8">
    <title> Insertar Estudiante </title>
    
    <link rel="stylesheet" type="text/css" href="css/contacte.css" />
    <link rel="stylesheet"  href="css/formu.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/estils5.css" />
    
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
        
            <center><h3>Datos del Estudiante</h3></center>
                <?php
                if(!isset($_SESSION['usuario'])){
                    header("location:index.php");
                    exit();
                }  
                require './conexion/conexion.php';
                
                ?>
        
        <form method="POST" class="form" align="center" enctype="multipart/form-data">
            <label>Carrera</label>
            <select name="carrera" class="custom-select" style="width:200px">
                <?php
                 $combo= $Carrera->MostrarCmbCarerra();
                 echo $combo;
                ?>
             </select>
            <br><br>
            
            <label>Cédula</label>
            <input type="text" name="cedula" required="true" autofocus="" maxlength="10" onkeypress="return justNumbers(event);">  

            <label> Nombres</label>
            <input type="text" name="nombres" required="true" onkeypress="return soloLetras(event);">  

            <label> Apelidos</label>
            <input type="text" name="apellidos" required="true" onkeypress="return soloLetras(event);">  

            <label>Teléfono</label>
            <input type="text" name="tel" maxlength="9" onkeypress="return justNumbers(event);">

            <label>Celular</label>
            <input type="text" name="cel" required="true" maxlength="10" onkeypress="return justNumbers(event);">

            <label>Correo</label>
            <input type="text" name="correo" required="true">

            <label>Nivel</label>
            <select name="niv" class="custom-select" style="width:200px">
               echo "<option value="1">1</option>"; 
               echo "<option value="2">2</option>"; 
               echo "<option value="3">3</option>"; 
               echo "<option value="4">4</option>"; 
               echo "<option value="5">5</option>"; 
               echo "<option value="6">6</option>"; 
               echo "<option value="7">7</option>"; 
               echo "<option value="8">8</option>"; 
               echo "<option value="9">9</option>"; 
               echo "<option value="10">10</option>"; 
            </select>
            <br><br> 
                   
            <label>Rol</label>
            <select name="rol" class="custom-select" style="width:200px">
                echo "<option value="Integrante">Integrante</option>"; 
                echo "<option value="Coordinador">Coordinador</option>";
                echo "<option value="Subcoordinador">Subcoordinador</option>";
            </select>
            <br><br>
                    
            <label>Foto</label>
            <input type="file" name="foto" required="true"> 

            <br><br>
            <button type="submit" class="btn-primary" >Registrar Estudiante</button>
                
        </form>
          </div>
        <?php
        
        
        //require './Conexion/conexion.php';
        $usernameSesion = $_SESSION['usuario'];
            //asegurar que no tenga "", <, > o &
        $username = htmlspecialchars($usernameSesion);
            
        //SELECCION DE ID-GRUPO
        $sql1="select id_animador from tb_animador where usuario='$username'";
        $ar1=$conexion->query($sql1);
        
        foreach($ar1 as $id){
            
            $sql2="select id_grupo from tb_grupo where id_animador=$id[0]";
            $ar2=$conexion->query($sql2);
            
            foreach($ar2 as $idg){
            
                if($_POST){
                $carrera=$_POST['carrera'];
              
                $cedu=$_POST['cedula'];
                $nom=$_POST['nombres'];
                $ape=$_POST['apellidos'];
                $tel=$_POST['tel'];
                $cel=$_POST['cel'];
                $correo=$_POST['correo'];
                $niv=$_POST['niv'];
                $rol=$_POST['rol'];
                $foto = $_FILES['foto']["name"];
                $ruta = $_FILES['foto']["tmp_name"];
                $destino = "fotos/".$foto ;
                copy($ruta,$destino);
                $Estudiante->insertarEstudiante($idg[0], $carrera, $cedu, $nom,$ape, $tel, $cel, $correo, $niv, $rol, $destino);
                
                }
            }
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