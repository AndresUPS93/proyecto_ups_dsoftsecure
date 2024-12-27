<?php
class Grupo{
    public $NombreGrupo;
    public $Descripcion;
    public $Mision;
    public $Vision;
    public $Actividades;
    public $numIntegrantes;
    
    function getNombreGrupo() {
        return $this->NombreGrupo;
    }

    function getDescripcion() {
        return $this->Descripcion;
    }

    function getMision() {
        return $this->Mision;
    }

    function getVision() {
        return $this->Vision;
    }

    function getActividades() {
        return $this->Actividades;
    }

    function setNombreGrupo($NombreGrupo) {
        $this->NombreGrupo = $NombreGrupo;
    }

    function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }

    function setMision($Mision) {
        $this->Mision = $Mision;
    }

    function setVision($Vision) {
        $this->Vision = $Vision;
    }

    function setActividades($Actividades) {
        $this->Actividades = $Actividades;
    }
    function getNumIntegrantes() {
        return $this->numIntegrantes;
    }

    function setNumIntegrantes($numIntegrantes) {
        $this->numIntegrantes = $numIntegrantes;
    }

    function insertarGrupo($anim,$ngrupo,$desc,$mis,$vis,$act,$nint){
        require_once'conexion.php';
        $db= new Conexion();
        $db->conexion();
        $sql="INSERT INTO tb_grupo(id_animador,id_coordinador,nombre_grupo,descripcion,"
                . "mision,vision,actividades,numero_de_integrantes)"
            . "VALUES ($anim,1,'$ngrupo','$desc','$mis','$vis','$act',$nint)";
        $insertar=$db->insertar($sql);
        //$db->cerrarconexion();
        echo $insertar;
    }
    
    function mostrarTablaGrupo($ca){
        require_once'conexion.php';
        $db= new Conexion();
        $db->conexion();
        
        $sql="select * from tb_grupo where id_grupo=$ca;";
        $table=$db->mostrar($sql);
        
        $sql1="select tb_grupo.id_animador,concat(nombres_animador,apellidos_animador) as nombres from tb_animador,tb_grupo where tb_animador.id_animador=tb_grupo.id_animador and tb_grupo.id_grupo=$ca;";
        $table1=$db->mostrar($sql1);
        
        
        $acu="";
        
        $acu.="<table class=\"table table-hover table-bordered\">";
        $acu.="<th class=\"table-dark\">Id</th>";
        $acu.="<th class=\"table-dark\">Nombre_Grupo</th>";
        $acu.="<th class=\"table-dark\">Área</th>";
        $acu.="<th class=\"table-dark\">Animador</th>";
        
        foreach($table1 as $id){ 
        
        foreach ($table as $ro){
                    $acu.= "<tr>";
                    $acu.= "<td>$ro[0]</td>";
                    $acu.= "<td>$ro[3]</td>";
                    $acu.= "<td>$ro[9]</td>";
                    $acu.= "<td>$id[1]</td>";
                    
                    echo "</tr>";
                }
        }
         $acu.= "</table>";
        return $acu;
        $db=null;
    }

}
