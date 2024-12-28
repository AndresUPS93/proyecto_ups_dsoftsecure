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
        <title> Imprimir Certificado </title>
       <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="JS/funcion_nota.js"></script>
        
        <link rel="stylesheet" type="text/css" href="css/estils5.css" />
        <link rel="stylesheet" type="text/css" href="css/contacte.css" />
       <link rel="stylesheet" href="css/estilo.css" type="text/css" />
       
       
       <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js" integrity="sha384-oqVuAfXRKap7fdgcCY5uykM6+R9GqQ8K/uxy9rx7HNQlGYl1kPzQho1wx4JwY8wC"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
       
       
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
.table-primary, .table-primary > td, .table-primary > th {
    color: #fff;
    background-color: #333a40;
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
        <h3>Listado de Integrantes</h3>
        
        
      
        <?php
  
        if(!isset($_SESSION['usuario'])){
            header("location:index.php");
            exit();
        } 
        require './Conexion/conexion.php';
        $usernameSesion = $_SESSION['usuario'];
        $username = htmlspecialchars($usernameSesion);
        
        $sql="select * from tb_animador where usuario='$username'";
        $mos=$conexion->query($sql);  
        foreach ($mos as $re){$id_animador=$re[0];}

        $estudiante="select id_estudiante,tb_estudiante.id_grupo,tb_estudiante.id_carrera,"
                . "tb_estudiante.cedula,tb_estudiante.nombres,tb_estudiante.apellidos, "
                . "tb_estudiante.telefono,tb_estudiante.celular,tb_estudiante.correo,"
                . "tb_estudiante.nivel,tb_estudiante.rol "
                . "from tb_estudiante,tb_animador,tb_grupo "
                . "where tb_estudiante.id_grupo=tb_grupo.id_grupo and "
                . "tb_grupo.id_animador=tb_animador.id_animador "
                . "and tb_animador.id_animador=$id_animador";
        $mos=$conexion->query($estudiante);
        
        ?>
        <br>
        <table class="table table-hover table-bordered" >
        <thead>
          <tr class="table-primary">
            <th scope="col" >#</th>
            <th scope="col" >Cédula</th>
            <th scope="col" >Nombres</th>
            <th scope="col" >Apellidos</th>
            <th scope="col" >Celular</th>
            <th scope="col" >Correo</th>
            <th scope="col" >Correo</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $num=1;
            foreach ($mos as $re){
            echo "<tr>";
            echo "<th scope=\"row\">$num</th>"; //#
            echo "<td>$re[3]</td>";//cedula
            echo "<td>$re[4]</td>";//nombre
            echo "<td>$re[5]</td>";//apellido
            echo "<td>$re[7]</td>";//celular
            echo "<td>$re[8]</td>";//correo
            
            $acu= $re[3]."||".$re[4]."||".$re[5];
            $num +=1;
            ?>
            <td>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#idVentana" 
                        onclick="agregaform('<?php echo $acu ?>')">Certificado</button>
            </td>
        
            
            <?php
            }
            
            echo "</tr>";
            
            ?>
            
        </tbody>

        </table>
        
        <div class="container">
            
            <div class="modal" id="idVentana">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <h4 class="modal-title" id="myModalLabel">Generar Certificado</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            
                        </div>
                        <div class="modal-body">
                            <h4>Nota: El certificado se entregará bajo ciertas condiciones</h4>
                            <br>
                            <table>
                            <tr><td>Estudiante: </td> </tr>
                            <tr><td><input type="text" id="apellido" name=""></td>
                            <td><input type="text" id="nombre" name=""></td></tr>
                            <tr>
                            <td>Con cedula:</td></tr>
                            <tr><td><input type="text" id="cedula" name="" size="10"></td>
                            </tr>
                            </table>
                            <!--<label id="dato" ></label>-->
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="comprobar">
                            Comprobar Requisitos</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal" id="guardarRegistro">
                            Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        </div>
        </div>
    
    
    
    </body>
    
    
<script type="text/javascript">
    $(document).ready(function() {
       
        $('#comprobar').click(function() {
           
           cedula=$('#cedula').val();
           location.href ="Controller/ControllerCertificado.php?c="+cedula;
        });
        
    });
</script>
</html>


