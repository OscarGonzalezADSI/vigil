function agregardatos(id_certificado, matricula_id){
    cadena = "id_certificado=" + id_certificado +
    "&matricula_id=" + matricula_id;

    accion = "insertar";
    mensaje_si = "Cliente agregado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}
function agregaform(datos) {
    d = datos.split('||');
    $('#id_certificadou').val(d[0]);
    $('#matricula_idu').val(d[1]);
}

function modificarCliente(){
    id_certificado = $('#id_certificadou').val();
    matricula_id = $('#matricula_idu').val();
    cadena = "id_certificado=" + id_certificado +
    "&matricula_id=" + matricula_id;

    accion = "modificar";
    mensaje_si = "Cliente modificado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function preguntarSiNo(id_certificado) {
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        alert("El registro será eliminado.");
        eliminarDatos(id_certificado);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatos(id_certificado) {
    cadena = "id_certificado=" + id_certificado;

    accion = "borrar";
    mensaje_si = "Cliente borrado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function a_ajax(cadena, accion, mensaje_si, mensaje_no){
    $.ajax({
        type: "POST",
        url: "../modelo/certificado_modelo.php?accion="+accion,
        data: cadena,
        success: function (r){
            if (r == 1) {
            $('#tabla').load('../vista/componentes/vista_certificado.php');
                alert(mensaje_si);
            } else {
                alert(mensaje_no);
            }
        }
    });
}
