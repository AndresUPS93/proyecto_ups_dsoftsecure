<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("location:index.php");
        exit();
    }
    require './Conexion/conexion.php';
        $usernameSesion = $_SESSION['usuario'];
        $username = htmlspecialchars($usernameSesion);
        
        $sql="select * from tb_animador where usuario='$username'";
        $mos=$conexion->query($sql);  
        foreach ($mos as $re){$id_animador=$re[0];}//id_animador
?>

<?PHP

    
        
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
        <title>Añadir Participantes</title>
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="JS/funcion_actividad.js"></script>
        
        <link rel="stylesheet" type="text/css" href="css/estils5.css" />
        <link rel="stylesheet" type="text/css" href="css/contacte.css" />
        <link rel="stylesheet" href="css/estilo.css" type="text/css" />
        
        
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    
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
                <center><h3>Listado de Actividades</h3></center>
                <br>
            <table class="table table-hover table-bordered" >
            <thead>
              <tr class="bg-info">
                <th scope="col" >#</th>
                <th scope="col" >Nombre Actividad</th>
                <th scope="col" >Fecha</th>
                <th scope="col" >Acción</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                $sql="SELECT id_actividad,nombre_actividad,fecha_actividad
                    from tb_actividades,tb_grupo
                    where tb_grupo.ID_GRUPO=tb_actividades.ID_GRUPO
                    and tb_grupo.ID_ANIMADOR=$id_animador;";
                $mos=$conexion->query($sql);
                $num=1;
                foreach ($mos as $re){
                    echo "<tr>";
                    echo "<th scope=\"row\">$num</th>"; //#
                    echo "<td>$re[1]</td>";//nombre_actividad
                    echo "<td>$re[2]</td>";//fecha
                    $num += 1;
                    $acu= $re[0]."||".$re[1]."||".$re[2]."||";
                    
                ?>
                <td>
                    <a href="tmp.php?er=<?php echo $re[0]?>"><img src="img/plus.png" width="35" height="35"></a>
                </td>
                <?php
                    echo "</tr>";
                }
                ?>
            </tbody>
            
            </table>
                
            </div>
        </div>
        
    </body>
</html>
