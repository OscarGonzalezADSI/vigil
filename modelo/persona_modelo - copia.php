<?php
include 'conexion.php';
$conn = conexion();

$accion = $_GET['accion'];

if($accion == "insertar"){

    $id_persona = $_POST['id_persona'];
    $personaNombre = $_POST['personaNombre'];
    $personaApellido = $_POST['personaApellido'];
    $personaCedula = $_POST['personaCedula'];
    $personaDireccion = $_POST['personaDireccion'];
    $personaCelular = $_POST['personaCelular'];
    $personaCorreo = $_POST['personaCorreo'];

    $sql="INSERT INTO persona(
          id_persona, personaNombre, personaApellido, personaCedula, personaDireccion, personaCelular, personaCorreo
          )VALUE(
          '$id_persona', '$personaNombre', '$personaApellido', '$personaCedula', '$personaDireccion', '$personaCelular', '$personaCorreo')";

    echo $consulta = mysqli_query($conn, $sql);
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