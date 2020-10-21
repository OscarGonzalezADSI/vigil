function agregardatos(id_curso, cursoNombre, cursoDescripcion, cursoDuracion){
    cadena = "id_curso=" + id_curso +
    "&cursoNombre=" + cursoNombre +
    "&cursoDescripcion=" + cursoDescripcion +
    "&cursoDuracion=" + cursoDuracion;

    accion = "insertar";
    mensaje_si = "Cliente agregado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}
function agregaform(datos) {
    d = datos.split('||');
    $('#id_cursou').val(d[0]);
    $('#cursoNombreu').val(d[1]);
    $('#cursoDescripcionu').val(d[2]);
    $('#cursoDuracionu').val(d[3]);
}

function modificarCliente(){
    id_curso = $('#id_cursou').val();
    cursoNombre = $('#cursoNombreu').val();
    cursoDescripcion = $('#cursoDescripcionu').val();
    cursoDuracion = $('#cursoDuracionu').val();
    cadena = "id_curso=" + id_curso +
    "&cursoNombre=" + cursoNombre +
    "&cursoDescripcion=" + cursoDescripcion +
    "&cursoDuracion=" + cursoDuracion;

    accion = "modificar";
    mensaje_si = "Cliente modificado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function preguntarSiNo(id_curso) {
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        alert("El registro será eliminado.");
        eliminarDatos(id_curso);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatos(id_curso) {
    cadena = "id_curso=" + id_curso;

    accion = "borrar";
    mensaje_si = "Cliente borrado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function a_ajax(cadena, accion, mensaje_si, mensaje_no){
    $.ajax({
        type: "POST",
        url: "../modelo/curso_modelo.php?accion="+accion,
        data: cadena,
        success: function (r){
            if (r == 1) {
                $('#tabla_curso_activado').load('../vista/componentes/vista_curso_activado.php');
                $('#tabla_curso_desactivado').load('../vista/componentes/vista_curso_desactivado.php');
                alert(mensaje_si);
            } else {
                alert(mensaje_no);
            }
        }
    });
}