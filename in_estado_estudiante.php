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
        foreach ($mos as $re){$id_animador=$re[0];}
        $estudiante="select id_estudiante,tb_estudiante.id_grupo,tb_estudiante.id_carrera,"
                . "tb_estudiante.cedula,tb_estudiante.nombres,tb_estudiante.apellidos, "
                . "tb_estudiante.telefono,tb_estudiante.celular,tb_estudiante.correo,"
                . "tb_estudiante.nivel,tb_estudiante.rol, case estado 
                                                            when 1 then 'Activo'
                                                            when 0 then 'Inactivo'
                                                            end "
                . "from tb_estudiante,tb_animador,tb_grupo "
                . "where tb_estudiante.id_grupo=tb_grupo.id_grupo and "
                . "tb_grupo.id_animador=tb_animador.id_animador "
                . "and tb_animador.id_animador=$id_animador";
        $mos=$conexion->query($estudiante);
        
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Estado Estudiante</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="JS/funcion_actividad.js"></script>
        <script src="JS/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <br><br><br>
        <table class="table table-hover table-bordered table-dark" >
        <thead>
          <tr class="">
            <th scope="col" style="text-align: center;">#</th>
            <th scope="col" style="text-align: center;">Cédula</th>
            <th scope="col" style="text-align: center;">Nombres</th>
            <th scope="col" style="text-align: center;">Apellidos</th>
            <th scope="col" style="text-align: center;">Celular</th>
            <th scope="col" style="text-align: center;">Correo</th>
            <th scope="col" style="text-align: center;">Estado</th>
            <th scope="col" style="text-align: center;">Acción</th>
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
            echo "<td>$re[11]</td>";//correo
            
            $acu= $re[3]."||".$re[4]."||".$re[5]."||".$re[11];
            $num +=1;
            
            ?>
            <td>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#idEstado" 
                        onclick="agregaestado('<?php echo $acu ?>')">CambiarEstado</button>
            </td>
            <?php
            }
             echo "</tr>";
            ?>
        </tbody>
        </table>
        
        <div class="container">
            
            <div class="modal" id="idEstado">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Cambio Estado</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            Está seguro de habilitar al estudiante
                            <input type="text" disabled id="nombre" name="" size="25">
                            <br>con cédula:
                            <input type="text" disabled id="clave" name="" size="9" >
                            <input type="text" disabled id="estado" name="" size="9" >
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizar">
                            Cambiar Estado</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal" id="guardarRegistro">
                            Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
<script type="text/javascript">
    $(document).ready(function() {
       
        $('#actualizar').click(function() {
           actualizarDatos();
            
           
        });
        
    });
</script>
</html>
