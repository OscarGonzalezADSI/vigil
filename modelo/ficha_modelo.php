<?php
include 'conexion.php';
$conn = conexion();

$accion = $_GET['accion'];

if($accion == "insertar"){

    $id_ficha = $_POST['id_ficha'];
    $curso_id = $_POST['curso_id'];
    $instructor_id = $_POST['instructor_id'];
    $fichaInicio = $_POST['fichaInicio'];
    $fichaFin = $_POST['fichaFin'];
    $fichaEstado = $_POST['fichaEstado'];

    $sql="INSERT INTO ficha(
          id_ficha, curso_id, instructor_id, fichaInicio, fichaFin, fichaEstado
          )VALUE(
          '$id_ficha', '$curso_id', '$instructor_id', '$fichaInicio', '$fichaFin', '$fichaEstado')";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "modificar"){

    $id_ficha = $_POST['id_ficha'];
    $curso_id = $_POST['curso_id'];
    $instructor_id = $_POST['instructor_id'];
    $fichaInicio = $_POST['fichaInicio'];
    $fichaFin = $_POST['fichaFin'];
    $fichaEstado = $_POST['fichaEstado'];

    $sql="UPDATE ficha SET
          curso_id = '$curso_id', 
          instructor_id = '$instructor_id', 
          fichaInicio = '$fichaInicio', 
          fichaFin = '$fichaFin', 
          fichaEstado = '$fichaEstado'
          WHERE id_ficha = '$id_ficha'";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "borrar"){

    $id_ficha = $_POST['id_ficha'];

    $sql = "DELETE FROM ficha
            WHERE id_ficha = '$id_ficha'";

    echo $consulta = mysqli_query($conn, $sql);
}


?>