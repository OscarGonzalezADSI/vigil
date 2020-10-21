<?php
include 'conexion.php';
$conn = conexion();

$accion = $_GET['accion'];

if($accion == "insertar"){

    $id_instructor = $_POST['id_instructor'];
    $persona_id = $_POST['persona_id'];
    $instructorEstado = $_POST['instructorEstado'];

    $sql="INSERT INTO instructor(
          id_instructor, persona_id, instructorEstado
          )VALUE(
          '$id_instructor', '$persona_id', '$instructorEstado')";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "modificar"){

    $id_instructor = $_POST['id_instructor'];
    $persona_id = $_POST['persona_id'];
    $instructorEstado = $_POST['instructorEstado'];

    $sql="UPDATE instructor SET
          persona_id = '$persona_id', 
          instructorEstado = '$instructorEstado'
          WHERE id_instructor = '$id_instructor'";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "borrar"){

    $id_instructor = $_POST['id_instructor'];

    $sql = "DELETE FROM instructor
            WHERE id_instructor = '$id_instructor'";

    echo $consulta = mysqli_query($conn, $sql);
}


?>