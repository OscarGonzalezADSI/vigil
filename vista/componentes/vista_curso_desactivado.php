<?php
include_once '../../modelo/conexion.php';
$conn = conexion();
?>

<div class="row">
<div class="col-sm-10" style="background-color:#F39C12; border-radius:20px 20px 0px 0px; height:20px; margin-top:50px;"></div>
<div class="col-sm-10" style="background-color:#00000050; height:80px; margin-top:0px; margin-buttom:0px; padding-top:5px;">
    <h2 style="color:#ffffff;">Cursos Desactivados</h2>
</div>
<div class="col-sm-10" style="background-color:#F39C12; border-radius:0px 0px 20px 20px; height:20px; margin-buttom:0px"></div>


    <?php
    $sql = 'SELECT * FROM curso';
    $result = mysqli_query($conn, $sql);
    WHILE($fila = mysqli_fetch_assoc($result)){
        $datos = $fila['id_curso'] . "||" .
                  $fila['cursoNombre'] . "||" .
                  $fila['cursoDescripcion'] . "||" .
                  $fila['cursoDuracion'];
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
            <b><?php echo $fila['cursoNombre']; ?></b>
        </div>
        <table class="table table-hover table-condensed table-responsive" style="margin: 0px 0px 0px 0px">
            <tbody>
                <tr>
                    <td><b>id_curso:</b> <?php echo $fila['id_curso']; ?></td>
                </tr>
                <tr>
                    <td><b>cursoNombre:</b> <?php echo $fila['cursoNombre']; ?></td>
                </tr>
                <tr>
                    <td><b>cursoDescripcion:</b> <?php echo $fila['cursoDescripcion']; ?></td>
                </tr>
                <tr>
                    <td><b>cursoDuracion:</b> <?php echo $fila['cursoDuracion']; ?></td>
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
