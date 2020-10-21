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
<h2>aprendiz</h2>
</center>
<button class="btn btn-primary navbar-left"
               data-toggle="modal"
               data-target="#modalNuevo">
    Agregar aprendiz
    <span class="glyphicon glyphicon-plus"></span>
</button></div>
    <table class="table table-hover table-condensed table-bordered table-responsive">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Celular</th>
            <th>Correo</th>
        </tr>
   </thead>
    <tbody>
    <?php

    $sql = 'SELECT
            persona.personaApellido as Apellido,
            persona.personaNombre as Nombre,
            persona.personaCelular as Celular,
            persona.personaCorreo as Correo,
            persona.TIMESTAMP as FechaRegistro,
            persona.UPDATE as Modificado,
            aprendiz.id_aprendiz as id_aprendiz,
            aprendiz.persona_id as persona_id,
            aprendiz.aprendizEstado as aprendizEstado
            FROM aprendiz, persona
            WHERE aprendiz.persona_id = persona.id_persona';

    $result = mysqli_query($conn, $sql);
    WHILE($fila = mysqli_fetch_assoc($result)){
        $datos = $fila['id_aprendiz'] . "||" .
                  $fila['persona_id'] . "||" .
                  $fila['aprendizEstado'];
    ?>
        <tr>


            <td><?php echo $fila['Apellido']; ?> <?php echo $fila['Nombre']; ?></td>
            <td><?php echo $fila['Celular']; ?></td>
            <td><?php echo $fila['Correo']; ?></td>
            <td>
                <button class="btn btn-warning glyphicon glyphicon-pencil"
                               data-toggle="modal"
                               data-target="#modalEdicion"
                               onclick="agregaform('<?php echo $datos; ?>')">
                </button></td>
            <td>
                <button class="btn btn-danger glyphicon glyphicon-remove"
                           onclick="preguntarSiNo('<?php echo $fila['id_aprendiz']; ?>')">
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
