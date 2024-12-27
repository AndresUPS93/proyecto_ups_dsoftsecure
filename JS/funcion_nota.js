function agregaform(datos){
    //alert(datos); muestra en un <script>
    d=datos.split('||');
    $('#apellido').val(d[2]);
    $('#nombre').val(d[1]);
    $('#cedula').val(d[0]);
}



function comprobar(){
    apellido=$('#apellido').val();
    nombre=$('#nombre').val();
    cedula=$('#cedula').val();
    
    cadena="apellido="+apellido+
            "&cedula="+cedula+
            "&nombre="+nombre;
    
    $.ajax({
       type:"POST",
       url:"./Controller/ControllerCertificado.php",
       data:cadena,
       success: function (r) {
            if(r==1){
               
            }else{
               
            }
       }
    });        
    
}