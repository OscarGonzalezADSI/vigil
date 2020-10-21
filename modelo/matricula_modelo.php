<?php
include 'conexion.php';
$conn = conexion();

$accion = $_GET['accion'];

if($accion == "insertar"){

    $id_matricula = $_POST['id_matricula'];
    $aprendiz_id = $_POST['aprendiz_id'];
    $ficha_id = $_POST['ficha_id'];

    $sql="INSERT INTO matricula(
          id_matricula, aprendiz_id, ficha_id
          )VALUE(
          '$id_matricula', '$aprendiz_id', '$ficha_id')";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "modificar"){

    $id_matricula = $_POST['id_matricula'];
    $aprendiz_id = $_POST['aprendiz_id'];
    $ficha_id = $_POST['ficha_id'];

    $sql="UPDATE matricula SET
          aprendiz_id = '$aprendiz_id', 
          ficha_id = '$ficha_id'
          WHERE id_matricula = '$id_matricula'";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "borrar"){

    $id_matricula = $_POST['id_matricula'];

    $sql = "DELETE FROM matricula
            WHERE id_matricula = '$id_matricula'";

    echo $consulta = mysqli_query($conn, $sql);
}


?>