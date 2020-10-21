<?php
include 'conexion.php';
$conn = conexion();

$accion = $_GET['accion'];

if($accion == "insertar"){

    $id_certificado = $_POST['id_certificado'];
    $matricula_id = $_POST['matricula_id'];

    $sql="INSERT INTO certificado(
          id_certificado, matricula_id
          )VALUE(
          '$id_certificado', '$matricula_id')";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "modificar"){

    $id_certificado = $_POST['id_certificado'];
    $matricula_id = $_POST['matricula_id'];

    $sql="UPDATE certificado SET
          matricula_id = '$matricula_id'
          WHERE id_certificado = '$id_certificado'";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "borrar"){

    $id_certificado = $_POST['id_certificado'];

    $sql = "DELETE FROM certificado
            WHERE id_certificado = '$id_certificado'";

    echo $consulta = mysqli_query($conn, $sql);
}


?>