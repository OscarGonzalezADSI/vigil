<?php
include_once '../../modelo/conexion.php';
$conn = conexion();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>arreglos</title>
</head>
<div class="row"><br><br><br><br>
    <div>
<center>
<h2>matricula</h2>
</center>
<button class="btn btn-primary navbar-left"
               data-toggle="modal"
               data-target="#modalNuevo">
    Agregar matricula
    <span class="glyphicon glyphicon-plus"></span>
</button></div>
    <table class="table table-hover table-condensed table-bordered table-responsive">
    <thead>
        <tr>
            <th>id_matricula</th>
            <th>ficha_id</td>
            <th>aprendizCedula</th>
            <th>aprendizApellido</th>
            <th>aprendizNombre</th>
            <th>aprendizEstado</th>
        </tr>
   </thead>
    <tbody>
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
        <tr>

            <td><?php echo $fila['id_matricula']; ?></td>
            <td><?php echo $fila['ficha_id']; ?></td>
            <td><?php echo $fila['aprendizCedula']; ?></td>
            <td><?php echo $fila['aprendizApellido']; ?></td>
            <td><?php echo $fila['aprendizNombre']; ?></td>
            <td><?php echo $fila['aprendizEstado']; ?></td>
            <td>
                <button class="btn btn-warning glyphicon glyphicon-pencil"
                               data-toggle="modal"
                               data-target="#modalEdicion"
                               onclick="agregaform('<?php echo $datos; ?>')">
                </button></td>
            <td>
                <button class="btn btn-danger glyphicon glyphicon-remove"
                           onclick="preguntarSiNo('<?php echo $fila['id_matricula']; ?>')">
                </button>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
    </table>
</div>
</body>
</html>
<?php
mysqli_close($conn);
?>
