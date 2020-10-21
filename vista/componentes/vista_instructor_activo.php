<?php
include_once '../../modelo/conexion.php';
$conn = conexion();
?>

<div class="row">
<div class="col-sm-10" style="background-color:#F39C12; border-radius:20px 20px 0px 0px; height:20px; margin-top:50px;"></div>
<div class="col-sm-10" style="background-color:#00000050; height:80px; margin-top:0px; margin-buttom:0px; padding-top:5px;">
    <h2 style="color:#ffffff;">Instructores Activos</h2>
</div>
<div class="col-sm-10" style="background-color:#F39C12; border-radius:0px 0px 20px 20px; height:20px; margin-buttom:0px"></div>


    <?php
    $sql = 'SELECT
            persona.id_persona as id_persona,
            persona.personaNombre as personaNombre,
            persona.personaApellido as personaApellido,
            persona.personaCedula as personaCedula,
            persona.personaDireccion as personaDireccion,
            persona.personaCelular as personaCelular,
            persona.personaCorreo as personaCorreo,
            instructor.id_instructor as id_instructor,
            instructor.persona_id as persona_id,
            instructor.instructorEstado as instructorEstado
            FROM persona, instructor
            WHERE persona.id_persona = instructor.persona_id
            AND instructor.instructorEstado = 1';
    $result = mysqli_query($conn, $sql);
    WHILE($fila = mysqli_fetch_assoc($result)){
        $datos = $fila['id_instructor'] . "||" .
                  $fila['persona_id'] . "||" .
                  $fila['instructorEstado'];
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
                onclick="preguntarSiNo('<?php echo $fila['id_instructor']; ?>')"
                style="float:right; margin:5px;">
        </button>
        <div style="margin-top:30px;">
            <b><?php echo $fila['personaApellido']; ?> <?php echo $fila['personaNombre']; ?></b>
        </div>
        <table class="table table-hover table-condensed table-responsive" style="margin: 0px 0px 0px 0px">
            <tbody>
                <tr>
                    <td><b>Celular:</b> <?php echo $fila['personaCelular']; ?></td>
                </tr>
                <tr>
                    <td><b>Correo:</b> <?php echo $fila['personaCorreo']; ?></td>
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
