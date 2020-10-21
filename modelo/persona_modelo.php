<?php
include 'conexion.php';
$conn = conexion();

$accion = $_GET['accion'];

function insertar ($conn){
    $id_persona = $_POST['id_persona'];
    $personaNombre = $_POST['personaNombre'];
    $personaApellido = $_POST['personaApellido'];
    $personaCedula = $_POST['personaCedula'];
    $personaDireccion = $_POST['personaDireccion'];
    $personaCelular = $_POST['personaCelular'];
    $personaCorreo = $_POST['personaCorreo'];

    $sql="INSERT INTO persona(
          id_persona, personaNombre,
          personaApellido, personaCedula,
          personaDireccion, personaCelular,
          personaCorreo
          )VALUE(
          '$id_persona', '$personaNombre',
          '$personaApellido', '$personaCedula',
          '$personaDireccion', '$personaCelular',
          '$personaCorreo')";

    $rta = mysqli_query($conn, $sql);
}

function insertarAprendiz ($conn){

    $personaCedula = $_POST['personaCedula'];

    $sql="SELECT id_persona
        FROM persona
        WHERE persona.personaCedula ='$personaCedula'";

    $result = mysqli_query($conn, $sql);

    $fila = mysqli_fetch_assoc($result);
    $id_persona = $fila['id_persona'];

    $sql="INSERT INTO aprendiz(
        id_aprendiz, persona_id, aprendizEstado
        ) VALUES (
        NULL, '$id_persona', '1'
        );";

    echo $rta = mysqli_query($conn, $sql);
}

function insertarInstructor ($conn){

    $personaCedula = $_POST['personaCedula'];

    $sql="SELECT id_persona
        FROM persona
        WHERE persona.personaCedula ='$personaCedula'";

    $result = mysqli_query($conn, $sql);

    $fila = mysqli_fetch_assoc($result);
    $id_persona = $fila['id_persona'];

    $sql="INSERT INTO
        instructor(
        id_instructor, persona_id, instructorEstado
        ) VALUES (
        NULL, '$id_persona', '1'
        );";

    echo $rta = mysqli_query($conn, $sql);
}

if($accion == "insertarAprendiz"){
    insertar($conn);
    sleep(5);
    insertarAprendiz($conn);
}

elseif($accion == "insertarInstructor"){
    insertar($conn);
    sleep(5);
    insertarInstructor($conn);
}

elseif($accion == "modificar"){

    $id_persona = $_POST['id_persona'];
    $personaNombre = $_POST['personaNombre'];
    $personaApellido = $_POST['personaApellido'];
    $personaCedula = $_POST['personaCedula'];
    $personaDireccion = $_POST['personaDireccion'];
    $personaCelular = $_POST['personaCelular'];
    $personaCorreo = $_POST['personaCorreo'];

    $sql="UPDATE persona SET
          personaNombre = '$personaNombre', 
          personaApellido = '$personaApellido', 
          personaCedula = '$personaCedula', 
          personaDireccion = '$personaDireccion', 
          personaCelular = '$personaCelular', 
          personaCorreo = '$personaCorreo'
          WHERE id_persona = '$id_persona'";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "borrar"){

    $id_persona = $_POST['id_persona'];

    $sql = "DELETE FROM persona
            WHERE id_persona = '$id_persona'";

    echo $consulta = mysqli_query($conn, $sql);
}

?>