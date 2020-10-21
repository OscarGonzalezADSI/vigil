function agregardatos(id_aprendiz, persona_id, aprendizEstado){
    cadena = "id_aprendiz=" + id_aprendiz +
    "&persona_id=" + persona_id +
    "&aprendizEstado=" + aprendizEstado;

    accion = "insertar";
    mensaje_si = "Cliente agregado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}
function agregaform(datos) {
    d = datos.split('||');
    $('#id_aprendizu').val(d[0]);
    $('#persona_idu').val(d[1]);
    $('#aprendizEstadou').val(d[2]);
}

function modificarCliente(){
    id_aprendiz = $('#id_aprendizu').val();
    persona_id = $('#persona_idu').val();
    aprendizEstado = $('#aprendizEstadou').val();
    cadena = "id_aprendiz=" + id_aprendiz +
    "&persona_id=" + persona_id +
    "&aprendizEstado=" + aprendizEstado;

    accion = "modificar";
    mensaje_si = "Cliente modificado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function preguntarSiNo(id_aprendiz) {
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        alert("El registro será eliminado.");
        eliminarDatos(id_aprendiz);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatos(id_aprendiz) {
    cadena = "id_aprendiz=" + id_aprendiz;

    accion = "borrar";
    mensaje_si = "Cliente borrado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function a_ajax(cadena, accion, mensaje_si, mensaje_no){
    $.ajax({
        type: "POST",
        url: "../modelo/aprendiz_modelo.php?accion="+accion,
        data: cadena,
        success: function (r){
            if (r == 1) {
            $('#tabla_aprendiz_activo').load('../vista/componentes/vista_aprendiz_activo.php');
            $('#tabla_aprendiz_egresado').load('../vista/componentes/vista_aprendiz_egresado.php');
            $('#tabla_aprendiz_suspendido').load('../vista/componentes/vista_aprendiz_suspendido.php');
            $('#tabla_aprendiz_sancionado').load('../vista/componentes/vista_aprendiz_sancionado.php');
                alert(mensaje_si);
            } else {
                alert(mensaje_no);
            }
        }
    });
}
