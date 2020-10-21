function agregardatos(id_matricula, aprendiz_id, ficha_id){
    cadena = "id_matricula=" + id_matricula +
    "&aprendiz_id=" + aprendiz_id +
    "&ficha_id=" + ficha_id;

    accion = "insertar";
    mensaje_si = "Cliente agregado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}
function agregaform(datos) {
    d = datos.split('||');
    $('#id_matriculau').val(d[0]);
    $('#aprendiz_idu').val(d[1]);
    $('#ficha_idu').val(d[2]);
}

function modificarCliente(){
    id_matricula = $('#id_matriculau').val();
    aprendiz_id = $('#aprendiz_idu').val();
    ficha_id = $('#ficha_idu').val();
    cadena = "id_matricula=" + id_matricula +
    "&aprendiz_id=" + aprendiz_id +
    "&ficha_id=" + ficha_id;

    accion = "modificar";
    mensaje_si = "Cliente modificado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function preguntarSiNo(id_matricula) {
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        alert("El registro será eliminado.");
        eliminarDatos(id_matricula);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatos(id_matricula) {
    cadena = "id_matricula=" + id_matricula;

    accion = "borrar";
    mensaje_si = "Cliente borrado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function a_ajax(cadena, accion, mensaje_si, mensaje_no){
    $.ajax({
        type: "POST",
        url: "../modelo/matricula_modelo.php?accion="+accion,
        data: cadena,
        success: function (r){
            if (r == 1) {
            $('#tabla').load('../vista/componentes/vista_matricula.php');
                alert(mensaje_si);
            } else {
                alert(mensaje_no);
            }
        }
    });
}
