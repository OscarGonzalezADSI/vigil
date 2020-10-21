function agregardatos(id_instructor, persona_id, instructorEstado){
    cadena = "id_instructor=" + id_instructor +
    "&persona_id=" + persona_id +
    "&instructorEstado=" + instructorEstado;

    accion = "insertar";
    mensaje_si = "Cliente agregado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}
function agregaform(datos) {
    d = datos.split('||');
    $('#id_instructoru').val(d[0]);
    $('#persona_idu').val(d[1]);
    $('#instructorEstadou').val(d[2]);
}

function modificarCliente(){
    id_instructor = $('#id_instructoru').val();
    persona_id = $('#persona_idu').val();
    instructorEstado = $('#instructorEstadou').val();
    cadena = "id_instructor=" + id_instructor +
    "&persona_id=" + persona_id +
    "&instructorEstado=" + instructorEstado;

    accion = "modificar";
    mensaje_si = "Cliente modificado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function preguntarSiNo(id_instructor) {
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        alert("El registro será eliminado.");
        eliminarDatos(id_instructor);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatos(id_instructor) {
    cadena = "id_instructor=" + id_instructor;

    accion = "borrar";
    mensaje_si = "Cliente borrado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function a_ajax(cadena, accion, mensaje_si, mensaje_no){
    $.ajax({
        type: "POST",
        url: "../modelo/instructor_modelo.php?accion="+accion,
        data: cadena,
        success: function (r){
            if (r == 1) {
                $('#tabla_instructor_activo').load('../vista/componentes/vista_instructor_activo.php');
                $('#tabla_instructor_retirado').load('../vista/componentes/vista_instructor_retirado.php');		
                $('#tabla_instructor_suspendido').load('../vista/componentes/vista_instructor_suspendido.php');
                $('#tabla_instructor_sancionado').load('../vista/componentes/vista_instructor_sancionado.php');
                alert(mensaje_si);
            } else {
                alert(mensaje_no);
            }
        }
    });
}
