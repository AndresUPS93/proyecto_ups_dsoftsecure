<?php

require '../conexion/conexion.php';
$cedula=$_GET['c'];
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/LOGO.png',10,8,50);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(70);
    // Título
    $this->Cell(55,10,'Universidad Politecnica Salesiana',0,0,'C');
    $this->Ln(15);
    $this->Cell(70);
    $this->Cell(60,10,'Certificado Grupo ASU',0,0,'C');
    $this->Ln(15);
    $this->Image('../img/logope.jpg',155,8,50);
    
    
}
// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
//n_actividad
$sql="select count(*) from tb_historial where id_estudiante=$cedula";
$mos=$conexion->query($sql);
foreach($mos as $re){$n_actividad=$re[0];}

//fecha ingreso
$sql="select fecha_ingreso 
from tb_historico,tb_estudiante
where tb_historico.id_estudiante=tb_estudiante.id_estudiante
and tb_estudiante.cedula=$cedula;";
$mos=$conexion->query($sql);
foreach($mos as $re){$n_fe=$re[0];}
$hoy= date("Y-m-d");

$date1 = new DateTime($n_fe);
$date2 = new DateTime($hoy);
$diff = $date1->diff($date2);


if( ($n_actividad>=2) && ($diff->days>=365)){
    $sql="Select nombre_grupo,cedula,nombres,apellidos,telefono,celular,correo,nivel,rol,foto,nombre_carrera
        from tb_estudiante,tb_grupo,tb_carrera
        where tb_estudiante.cedula=$cedula 
         and tb_grupo.id_grupo=tb_estudiante.id_grupo "
        . "and tb_carrera.id_carrera=tb_estudiante.id_carrera;";
    $mos=$conexion->query($sql);  
    foreach ($mos as $re){
        $nombre_grupo=$re[0];
        $cedula=$re[1];
        $nombre=$re[2];
        $apellido=$re[3];
        $telefono=$re[4];
        $celular=$re[5];
        $correo=$re[6];
        $nivel=$re[7];
        $foto=$re[9];
        $carrera=$re[10];

    }

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('courier','B',12);
    $pdf->Cell(80,10,utf8_decode('Datos del grupo'),1,1,'C');

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(40,10,utf8_decode('Nombre del Grupo:  '.$nombre_grupo));
    $pdf->Ln(10);
    $pdf->Cell(40,10,utf8_decode('Fecha Ingreso al grupo:'));

    $pdf->Ln(10);
    $pdf->SetFont('courier','B',12);
    $pdf->Cell(80,10,utf8_decode('Datos Personales'),1,1,'C');

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(40,10,utf8_decode('Nombre:    '.$nombre)); $pdf->Ln(8);
    $pdf->Cell(40,10,utf8_decode('Apellido:  '.$apellido));$pdf->Ln(8);
    $pdf->Cell(40,10,utf8_decode('Cédula:    '.$cedula)); $pdf->Ln(8);
    $pdf->Cell(40,10,utf8_decode('Dirección:  ')); $pdf->Ln(8);
    $pdf->Cell(40,10,utf8_decode('Teléfono fijo:  '.$telefono));$pdf->Ln(8);
    $pdf->Cell(40,10,utf8_decode('Teléfono movil:  '.$celular));$pdf->Ln(8);
    $pdf->Cell(40,10,utf8_decode('Correo electrónico:  '.$correo));$pdf->Ln(10);

    $pdf->SetFont('courier','B',12);
    $pdf->Cell(80,10,utf8_decode('Datos Académicos'),1,1,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(40,10,utf8_decode('Nivel:    '.$nivel)); $pdf->Ln(8);
    $pdf->Cell(40,10,utf8_decode('Carrera:  '.$carrera));$pdf->Ln(8);

    $pdf->Image('../img/logope.jpg',155,8,50);
    $pdf->Image('../'.$foto,155,29,25);



    $pdf->AddPage();
    $pdf->SetFont('Arial','B',15);
    $pdf->SetFont('courier','B',12);
    $pdf->Cell(80,10,utf8_decode('Seguimiento Personal'),0,0,'C'); $pdf->Ln(10);

    $sql2="Select nombre_actividad,fecha_actividad,lugar 
            from tb_historial,tb_actividades,tb_estudiante 
            where tb_estudiante.cedula=$cedula 
            and tb_estudiante.cedula=tb_historial.id_estudiante 
            and tb_actividades.id_actividad=tb_historial.id_actividad";

    $mos2=$conexion->query($sql2);
    $nu=1;
    foreach ($mos2 as $re){
        $nombre_actividad=$re[0];
        $fecha_actividad=$re[1];
        $lugar=$re[2];
        $pdf->Cell(10,10,utf8_decode('N°'.$nu),1,0,'C');
        $pdf->Cell(182,10,utf8_decode('Nombre de la actividad: '.$nombre_actividad),1,0,'C');
        $pdf->Ln(10);
        $pdf->Cell(91,10,utf8_decode('Fecha: '.$fecha_actividad),1,0,'C');
        $pdf->Cell(101,10,utf8_decode('Lugar: '.$lugar),1,0,'C');
        $pdf->Ln(20);
        $nu+=1;
    }
    $pdf->Output();

    
}else{
    echo "<script> alert(\"El estudiante no cumple los requisitos de certificado\"); </script>";
}



////aqui si vale

        
        
        
        