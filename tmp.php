 <?php
        session_start();
        if(!isset($_SESSION['usuario'])){
            header("location:index.php");
            exit();
        } 
        require_once './Conexion/conexion.php';
        $usernameSesion = $_SESSION['usuario'];
        $username = htmlspecialchars($usernameSesion);
        $id_actividad=$_GET['er'];
        
        $ant="select * from tb_actividades where id_actividad=$id_actividad;";
        $ante=$conexion->query($ant);
        foreach ($ante as $ree){$nombre_ac=$ree[2];}
        
        $sql="select * from tb_animador where usuario='$username'";
        $mos=$conexion->query($sql);  
        foreach ($mos as $re){$id_animador=$re[0];}
        
        $sql="select cedula,nombres,apellidos
            from tb_estudiante,tb_actividades,tb_grupo
            where tb_grupo.id_animador=$id_animador
            and tb_grupo.id_grupo=tb_estudiante.id_grupo
            and tb_grupo.id_grupo=tb_actividades.id_grupo
            and tb_actividades.id_actividad=$id_actividad
            and tb_estudiante.cedula in (
                                             Select id_estudiante 
                                             from tb_historial
                                             where id_actividad=$id_actividad
                                            )
            order by apellidos              ;";
        $mos=$conexion->query($sql);  
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <div class="card btn-black bg-light" style=" padding: 7px;
        font-size: 15px;
        position: relative;   
        z-index: 2;
        background-color: #0062cc">

            
        <article class="card-body modal-content mx-auto" style="max-width: 900px; position: relative;
            background-color: #c1c1c1;
            margin-left:  60px;
            margin-right:  60px;
            border-bottom-color: #11282D">
            <center><h3 style="color: #0033cc">Actividad: <?php echo $nombre_ac?></h3><br></center>
            <center><h3>Participantes:</h3><br></center>
            <table class="table table-hover table-bordered" >
            <thead>
              <tr class="table-primary">
                <th scope="col" >#</th>
                <th scope="col" >Nombres</th>
                <th scope="col" >Apellidos</th>
                
              </tr>
            </thead>
            <tbody>
                <?php
                $num=1;
                foreach ($mos as $re){
                    echo "<tr class=\"table-light\">";
                    echo "<th scope=\"row\">$num</th>"; //#
                    echo "<td>$re[1]</td>";//nombre
                    echo "<td>$re[2]</td>";//apellido
                    echo "</tr>"; $num+=1;
                }
                ?>
            </tbody>
            </table>
            <form method="POST">
                <center><h3>Seleccione los integrantes:</h3><br></center>
                <?php
                    
                    $sql2="select cedula,nombres,apellidos
                        from tb_estudiante,tb_actividades,tb_grupo
                        where tb_grupo.id_animador=$id_animador
                        and tb_grupo.id_grupo=tb_estudiante.id_grupo
                        and tb_grupo.id_grupo=tb_actividades.id_grupo
                        and tb_actividades.id_actividad=$id_actividad 
                        and tb_estudiante.estado=1     
                            
                        and tb_estudiante.cedula not in (
                                                         Select id_estudiante 
                                                         from tb_historial
                                                         where id_actividad=$id_actividad
                                                        )
                        order by apellidos              ;";
                    $ver=$conexion->query($sql2);
                    
                    echo "<table align=center>";
                    foreach($ver as $mo){
                        echo "<tr>";
                        echo "<td>";
                        echo "<div class=\"custom-control custom-checkbox\">";
                        echo "<input type=\"checkbox\" class=\"custom-control-input\" name=\"nombres[]\" value=\"".$mo['cedula']."\" id=\"$mo[0]\"> "
                                . "<label class=\"custom-control-label\" for=\"$mo[0]\"> $mo[2] $mo[1] $mo[0]</label>";
                        
                        echo "</div>";
                        echo "</td>";    
                        echo "</tr>";
                    }
                    echo "</table>";
                    
                ?>
                 <center>
                <input type="submit" name="insertar" value="Insertar" class="btn btn-success"> 
                </center>
                <br>
                <a href="in_actividad2.php"><img src="img/responder.png" width="80" height="80">Atrás</a><br>
               
            </form>
        </article>
        </div>
        <?php
            if($_POST){
                $nombres=$_POST["nombres"];
                $sql3="";
                if(count($nombres)>0){
                    for ($i=0;$i<count($nombres);$i++){     
                    //echo "<br>Nombre $i INSERT INTO tb_estu2(nombre,estudiantes) VALUES ('$nombres[$i]'); <br>";
                    $sql3= $sql3 . "\n insert into tb_historial (id_estudiante,id_actividad) values "
                            . "('$nombres[$i]',$id_actividad);";
                    }
                
                    $insertar=$conexion->prepare($sql3);
                    $insertar->execute();
                    
                    
                    //header("location:tmp.php?er=$id_actividad");
                    exit();
                }else{
                    ob_start();
                    header("location:tmp.php?er=$id_actividad");
                }
                
                
            }
        ?>
    </body>
</html>
