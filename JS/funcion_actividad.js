
function agregaestado(datosq){
    a=datosq.split('||');
    $('#clave').val(a[0]);
    $('#nombre').val(a[1]+' '+a[2]);
    $('#estado').val(a[3]);
    $('#estado2').val(a[3]);
    
}
function actualizarDatos(){
    clave=$('#clave').val();
    estado=$('#estado').val();
    
    cadena="clave="+clave+
            "&estado="+estado;
    
    $.ajax({
       type:"POST",
       url:"./Controller/Medio_Estado.php",
       data:cadena,
       success: function (r) {
            if(r==1){
                location.href ="in_estado_estudiante.php";
            }else{
                
            }
       }
    });
}