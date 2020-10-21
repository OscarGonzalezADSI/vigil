<?php
include 'conexion.php';
$conn = conexion();

$accion = $_GET['accion'];

function insertar($conn){
    
    $id_curso = $_POST['id_curso'];
    $cursoNombre = $_POST['cursoNombre'];
    $cursoDescripcion = $_POST['cursoDescripcion'];
    $cursoDuracion = $_POST['cursoDuracion'];

    $sql="INSERT INTO curso(
        id_curso, cursoNombre,
        cursoDescripcion, cursoDuracion
        ) VALUES (
        '$id_curso',
        '$cursoNombre',
        '$cursoDescripcion',
        '$cursoDuracion'
        )";

    mysqli_query($conn, $sql);
    sleep(1);


    /* consulta curso */
    $sqlCurso="SELECT
        curso.id_curso as id_curso
        FROM curso
        WHERE curso.cursoNombre ='$cursoNombre'";
    $resultCurso = mysqli_query($conn, $sqlCurso);
    $filaCurso = mysqli_fetch_assoc($resultCurso);
    $id_Curso = $filaCurso['id_curso'];
    sleep(1);


    /* consulta instructor */
    $sqlInstructor = "SELECT
        instructor.id_instructor as id_instructor
        FROM persona, instructor
        WHERE persona.id_persona = instructor.persona_id
        AND persona.personaCedula = '88888888'";
    $resultInstructor = mysqli_query($conn, $sqlInstructor);
    $filaInstructor = mysqli_fetch_assoc($resultInstructor);
    $id_instructor = $filaInstructor['id_instructor'];   
    sleep(1);


    /* consulta ficha */
    $sqlFicha = "INSERT INTO ficha(
        id_ficha, curso_id,
        instructor_id, fichaInicio,
        fichaFin, fichaEstado
        ) VALUES (
        NULL, $id_Curso,
        $id_instructor, '',
        '', 1
        );";
    echo $resultFicha = mysqli_query($conn, $sqlFicha); 
}






















if($accion == "insertar"){

    insertar($conn);
}

elseif($accion == "modificar"){

    $id_curso = $_POST['id_curso'];
    $cursoNombre = $_POST['cursoNombre'];
    $cursoDescripcion = $_POST['cursoDescripcion'];
    $cursoDuracion = $_POST['cursoDuracion'];

    $sql="UPDATE curso SET
          cursoNombre = '$cursoNombre', 
          cursoDescripcion = '$cursoDescripcion', 
          cursoDuracion = '$cursoDuracion'
          WHERE id_curso = '$id_curso'";

    echo $consulta = mysqli_query($conn, $sql);
}

elseif($accion == "borrar"){

    $id_curso = $_POST['id_curso'];

    $sql = "DELETE FROM curso
            WHERE id_curso = '$id_curso'";

    echo $consulta = mysqli_query($conn, $sql);
}


?>