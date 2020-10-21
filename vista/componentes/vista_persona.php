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
<h2>persona</h2>
</center>
<button class="btn btn-primary navbar-left"
               data-toggle="modal"
               data-target="#modalNuevo">
    Agregar persona
    <span class="glyphicon glyphicon-plus"></span>
</button></div>
    <table class="table table-hover table-condensed table-bordered table-responsive">
    <thead>
        <tr>
            <th>id_persona</th>
            <th>personaNombre</th>
            <th>personaApellido</th>
            <th>personaCedula</th>
            <th>personaDireccion</th>
            <th>personaCelular</th>
            <th>personaCorreo</th>
        </tr>
   </thead>
    <tbody>
    <?php
    $sql = 'SELECT * FROM persona';
    $result = mysqli_query($conn, $sql);
    WHILE($fila = mysqli_fetch_assoc($result)){
        $datos = $fila['id_persona'] . "||" .
                  $fila['personaNombre'] . "||" .
                  $fila['personaApellido'] . "||" .
                  $fila['personaCedula'] . "||" .
                  $fila['personaDireccion'] . "||" .
                  $fila['personaCelular'] . "||" .
                  $fila['personaCorreo'];
    ?>
        <tr>
            <td><?php echo $fila['id_persona']; ?></td>
            <td><?php echo $fila['personaNombre']; ?></td>
            <td><?php echo $fila['personaApellido']; ?></td>
            <td><?php echo $fila['personaCedula']; ?></td>
            <td><?php echo $fila['personaDireccion']; ?></td>
            <td><?php echo $fila['personaCelular']; ?></td>
            <td><?php echo $fila['personaCorreo']; ?></td>
            <td>
                <button class="btn btn-warning glyphicon glyphicon-pencil"
                               data-toggle="modal"
                               data-target="#modalEdicion"
                               onclick="agregaform('<?php echo $datos; ?>')">
                </button></td>
            <td>
                <button class="btn btn-danger glyphicon glyphicon-remove"
                           onclick="preguntarSiNo('<?php echo $fila['id_persona']; ?>')">
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
