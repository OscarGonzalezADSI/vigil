<?php
include_once '../../modelo/conexion.php';
$conn = conexion();
?>

<div class="row">
<div class="col-sm-10" style="background-color:#F39C12; border-radius:20px 20px 0px 0px; height:20px; margin-top:50px;"></div>
<div class="col-sm-10" style="background-color:#00000050; height:80px; margin-top:0px; margin-buttom:0px; padding-top:5px;">
    <h2 style="color:#ffffff;">Fichas Activas</h2>
</div>
<div class="col-sm-10" style="background-color:#F39C12; border-radius:0px 0px 20px 20px; height:20px; margin-buttom:0px"></div>


    <?php
    $sql = 'SELECT
            curso.cursoNombre as Curso,
            curso.cursoDescripcion as Descripcion,
            curso.cursoDuracion as Duracion,
            persona.personaNombre as Nombreinstructor,
            persona.personaApellido as Apellidoinstructor,
            ficha.id_ficha as id_ficha,
            ficha.curso_id as curso_id,
            ficha.instructor_id as instructor_id,
            ficha.fichaInicio as fichaInicio,
            ficha.fichaFin as fichaFin,
            ficha.fichaEstado as fichaEstado
            FROM persona, instructor, curso, ficha
            WHERE curso.id_curso = ficha.curso_id
            AND instructor.id_instructor = ficha.instructor_id
            AND persona.id_persona = instructor.persona_id';
    $result = mysqli_query($conn, $sql);
    WHILE($fila = mysqli_fetch_assoc($result)){
        $datos = $fila['id_ficha'] . "||" .
                  $fila['curso_id'] . "||" .
                  $fila['instructor_id'] . "||" .
                  $fila['fichaInicio'] . "||" .
                  $fila['fichaFin'] . "||" .
                  $fila['fichaEstado'];
    ?>




<div class="col-sm-3" style="margin-top:48px; margin-right:48px;">
    <div style="background-color:#F39C12; border-radius:20px 20px 0px 0px; height:20px; margin-buttom:0px"></div>
    <div style="background-color:#00000050; margin-top:0px; padding:10px">
        <button class="btn btn-warning btn-xs glyphicon glyphicon-pencil"
                    data-toggle="modal"
                    data-target="#modalEdicion"
                    onclick="agregaform('<?php echo $datos; ?>')"
                style="float:right; margin:5px;">
        </button>
        <button class="btn btn-danger btn-xs glyphicon glyphicon-remove"
                onclick="preguntarSiNo('<?php echo $fila['id_aprendiz']; ?>')"
                style="float:right; margin:5px;">
        </button>
        <div style="margin-top:30px;">
            <b>Ficha: <?php echo $fila['id_ficha']; ?></b>
        </div>
        <table class="table table-hover table-condensed table-responsive" style="margin: 0px 0px 0px 0px">
            <tbody>
            <tr>
                <td><b>Curso:</b> <?php echo $fila['Curso']; ?></td>
            </tr>
            <tr>
                <td><b>Descripción:</b><br> <?php echo $fila['Descripcion']; ?></td>
            </tr>
            <tr>
                <td><b>instructor:</b><br> <?php echo $fila['Apellidoinstructor']; ?> <?php echo $fila['Nombreinstructor']; ?></td>
            </tr>
            <tr>
                <td><b>Duración:</b> <?php echo $fila['Duracion']; ?></td>
            </tr>
            <tr>
                <td><b>fecha Inicio:</b> <?php echo $fila['fichaInicio']; ?></td>
            </tr>
            <tr>
                <td><b>fecha Fin:</b> <?php echo $fila['fichaFin']; ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="background-color:#F39C12; border-radius:0px 0px 20px 20px; height:20px; margin-buttom:0px"></div>
</div>



<?php
}
?>
</div>
</body>
</html>
<?php
mysqli_close($conn);
?>
