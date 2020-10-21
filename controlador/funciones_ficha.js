function agregardatos(id_ficha, curso_id, instructor_id, fichaInicio, fichaFin, fichaEstado){
    cadena = "id_ficha=" + id_ficha +
    "&curso_id=" + curso_id +
    "&instructor_id=" + instructor_id +
    "&fichaInicio=" + fichaInicio +
    "&fichaFin=" + fichaFin +
    "&fichaEstado=" + fichaEstado;

    accion = "insertar";
    mensaje_si = "Cliente agregado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}
function agregaform(datos) {
    d = datos.split('||');
    $('#id_fichau').val(d[0]);
    $('#curso_idu').val(d[1]);
    $('#instructor_idu').val(d[2]);
    $('#fichaIniciou').val(d[3]);
    $('#fichaFinu').val(d[4]);
    $('#fichaEstadou').val(d[5]);
}

function modificarCliente(){
    id_ficha = $('#id_fichau').val();
    curso_id = $('#curso_idu').val();
    instructor_id = $('#instructor_idu').val();
    fichaInicio = $('#fichaIniciou').val();
    fichaFin = $('#fichaFinu').val();
    fichaEstado = $('#fichaEstadou').val();
    cadena = "id_ficha=" + id_ficha +
    "&curso_id=" + curso_id +
    "&instructor_id=" + instructor_id +
    "&fichaInicio=" + fichaInicio +
    "&fichaFin=" + fichaFin +
    "&fichaEstado=" + fichaEstado;

    accion = "modificar";
    mensaje_si = "Cliente modificado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function preguntarSiNo(id_ficha) {
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        alert("El registro será eliminado.");
        eliminarDatos(id_ficha);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatos(id_ficha) {
    cadena = "id_ficha=" + id_ficha;

    accion = "borrar";
    mensaje_si = "Cliente borrado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function a_ajax(cadena, accion, mensaje_si, mensaje_no){
    $.ajax({
        type: "POST",
        url: "../modelo/ficha_modelo.php?accion="+accion,
        data: cadena,
        success: function (r){
            if (r == 1) {
                $('#tabla_ficha_activado').load('../vista/componentes/vista_ficha_activado.php');
                $('#tabla_ficha_desactivado').load('../vista/componentes/vista_ficha_desactivado.php');
                alert(mensaje_si);
            } else {
                alert(mensaje_no);
            }
        }
    });
}
