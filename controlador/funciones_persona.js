function agregardatos(id_persona, personaNombre, personaApellido, personaCedula, personaDireccion, personaCelular, personaCorreo, orden){
    cadena = "id_persona=" + id_persona +
    "&personaNombre=" + personaNombre +
    "&personaApellido=" + personaApellido +
    "&personaCedula=" + personaCedula +
    "&personaDireccion=" + personaDireccion +
    "&personaCelular=" + personaCelular +
    "&personaCorreo=" + personaCorreo;
    
    accion = orden;
    mensaje_si = "Cliente agregado con exito // <a href='http://localhost/web/OurCRUD/proyectos/cursos/vista/matricula.php'>matricular</a>";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function agregaform(datos) {
    d = datos.split('||');
    $('#id_personau').val(d[0]);
    $('#personaNombreu').val(d[1]);
    $('#personaApellidou').val(d[2]);
    $('#personaCedulau').val(d[3]);
    $('#personaDireccionu').val(d[4]);
    $('#personaCelularu').val(d[5]);
    $('#personaCorreou').val(d[6]);
}

function modificarCliente(){
    id_persona = $('#id_personau').val();
    personaNombre = $('#personaNombreu').val();
    personaApellido = $('#personaApellidou').val();
    personaCedula = $('#personaCedulau').val();
    personaDireccion = $('#personaDireccionu').val();
    personaCelular = $('#personaCelularu').val();
    personaCorreo = $('#personaCorreou').val();
    cadena = "id_persona=" + id_persona +
    "&personaNombre=" + personaNombre +
    "&personaApellido=" + personaApellido +
    "&personaCedula=" + personaCedula +
    "&personaDireccion=" + personaDireccion +
    "&personaCelular=" + personaCelular +
    "&personaCorreo=" + personaCorreo;

    accion = "modificar";
    mensaje_si = "Cliente modificado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function preguntarSiNo(id_persona) {
    var opcion = confirm("¿Esta seguro de eliminar el registro?");
    if (opcion == true) {
        alert("El registro será eliminado.");
        eliminarDatos(id_persona);
    } else {
        alert("El proceso de eliminación del registro ha sido cancelado.");
    }
}

function eliminarDatos(id_persona) {
    cadena = "id_persona=" + id_persona;

    accion = "borrar";
    mensaje_si = "Cliente borrado con exito";
    mensaje_no= "Error de registro";
    a_ajax(cadena, accion, mensaje_si, mensaje_no);
}

function a_ajax(cadena, accion, mensaje_si, mensaje_no){
    $.ajax({
        type: "POST",
        url: "../modelo/persona_modelo.php?accion="+accion,
        data: cadena,
        success: function (r){
            if (r == 1) {
            $('#tabla').load('../vista/componentes/vista_persona.php');
                alert(mensaje_si);
            } else {
                alert(mensaje_no);
            }
        }
    });
}
