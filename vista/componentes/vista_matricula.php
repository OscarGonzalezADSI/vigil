<?php
include_once '../../modelo/conexion.php';
$conn = conexion();
?>

<div class="row">
<div class="col-sm-10" style="background-color:#F39C12; border-radius:20px 20px 0px 0px; height:20px; margin-top:50px;"></div>
<div class="col-sm-10" style="background-color:#00000050; height:80px; margin-top:0px; margin-buttom:0px; padding-top:5px;">
    <h2 style="color:#ffffff;">Matriculas</h2>
</div>
<div class="col-sm-10" style="background-color:#F39C12; border-radius:0px 0px 20px 20px; height:20px; margin-buttom:0px"></div>


    <?php
    $sql = 'SELECT
            matricula.id_matricula as id_matricula,
            matricula.aprendiz_id as aprendiz_id,
            matricula.ficha_id as ficha_id,
            persona.personaCedula as aprendizCedula,
            persona.personaApellido as aprendizApellido,
            persona.personaNombre as aprendizNombre,
            aprendiz.aprendizEstado as aprendizEstado
            FROM matricula, aprendiz, persona
            WHERE aprendiz.id_aprendiz = matricula.aprendiz_id
            AND persona.id_persona = aprendiz.persona_id';
    $result = mysqli_query($conn, $sql);
    WHILE($fila = mysqli_fetch_assoc($result)){
        $datos = $fila['id_matricula'] . "||" .
                  $fila['aprendiz_id'] . "||" .
                  $fila['ficha_id'];
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
            <b>ficha_id: <?php echo $fila['ficha_id']; ?></b>
        </div>
        <table class="table table-hover table-condensed table-responsive" style="margin: 0px 0px 0px 0px">
            <tbody>
            <tr>
                <td><b>id_matricula:</b> </td><td><?php echo $fila['id_matricula']; ?></td>
            </tr>
            <tr>
                <td><b>ficha_id:</b> </td><td><?php echo $fila['ficha_id']; ?></td>
            </tr>
            <tr>
                <td><b>aprendizCedula:</b> </td><td><?php echo $fila['aprendizCedula']; ?></td>
            </tr>
            <tr>
                <td><b>aprendizApellido:</b> </td><td><?php echo $fila['aprendizApellido']; ?></td>
            </tr>
            <tr>
                <td><b>aprendizNombre:</b> </td><td><?php echo $fila['aprendizNombre']; ?></td>
            </tr>
            <tr>
                <td><b>aprendizEstado:</b> </td></td><?php echo $fila['aprendizEstado']; ?></td>
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
            
            
            
            
            