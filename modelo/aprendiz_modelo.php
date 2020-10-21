<?php
include 'conexion.php';
$conn = conexion();

$accion = $_GET['accion'];

if($accion == "insertar"){

    $id_aprendiz = $_POST['id_aprendiz'];
    $persona_id = $_POST['persona_id'];
    $aprendizEstado = $_POST['aprendizEstado'];

    $sql="INSERT INTO aprendiz(
          id_aprendiz, persona_id, aprendizEstado
          )VALUE(
          '$id_aprendiz', '$persona_id', '$aprendizEstado')";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "modificar"){

    $id_aprendiz = $_POST['id_aprendiz'];
    $persona_id = $_POST['persona_id'];
    $aprendizEstado = $_POST['aprendizEstado'];

    $sql="UPDATE aprendiz SET
          persona_id = '$persona_id', 
          aprendizEstado = '$aprendizEstado'
          WHERE id_aprendiz = '$id_aprendiz'";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "borrar"){

    $id_aprendiz = $_POST['id_aprendiz'];

    $sql = "DELETE FROM aprendiz
            WHERE id_aprendiz = '$id_aprendiz'";

    echo $consulta = mysqli_query($conn, $sql);
}


?>