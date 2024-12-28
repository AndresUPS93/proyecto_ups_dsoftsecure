<?php
require './Clases/Grupo.php';
$Grupo= new Grupo();
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
            
            $sql="select * from tb_coordinador where usuario='$username'";
            $mos=$conexion->query($sql);
            
            foreach ($mos as $re){$da="$re[1] $re[2]"; $id=$re[0]; $ca=$re[0];}

?>
<html>
       <meta charset="UTF-8">
        <title> Mostrar Grupos </title>
        <link rel="stylesheet" type="text/css" href="css/estils5.css" />
        <link rel="stylesheet" type="text/css" href="css/contacte.css" />
        <link rel="stylesheet" href="css/estilo.css" type="text/css" />
        
        
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

.table-dark {
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
        <h3>Seleccione el área:</h3>
        <?php
        require_once './Conexion/conexion.php';
        $sql="select id_grupo,area from tb_grupo";
        $ar=$conexion->query($sql);
        ?>
        
        <div class="form-group">
            <form method="POST">
            <table align="center">
                <tr>
                    <td><select class="combobox form-control " name="cmbCa" >
                        <?php
                        foreach ($ar as $mor){
                            echo "<option value=$mor[0]>$mor[1]</option>";
                        }
                        ?>
                      </select></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="submit" value="Consultar">
                    </td>
                </tr>
            </table>
            </form>
        </div>
      
            <?php
            if($_POST){
                $ca=$_POST['cmbCa'];
                
                require_once './Clases/Grupo.php';
                
                
                $Grupo= new Grupo();
                $tabla=$Grupo->mostrarTablaGrupo($ca);
                echo "$tabla";
                
               
            }
      ?>
      </div>

     
            </div>
           
        
        
            
        
    </body>
</html>
