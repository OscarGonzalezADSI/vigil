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
<h2>curso</h2>
</center>
<button class="btn btn-primary navbar-left"
               data-toggle="modal"
               data-target="#modalNuevo">
    Agregar curso
    <span class="glyphicon glyphicon-plus"></span>
</button></div>
    <table class="table table-hover table-condensed table-bordered table-responsive">
    <thead>
        <tr>
            <th>id_curso</th>
            <th>cursoNombre</th>
            <th>cursoDescripcion</th>
            <th>cursoDuracion</th>
        </tr>
   </thead>
    <tbody>
    <?php
    $sql = 'SELECT * FROM curso';
    $result = mysqli_query($conn, $sql);
    WHILE($fila = mysqli_fetch_assoc($result)){
        $datos = $fila['id_curso'] . "||" .
                  $fila['cursoNombre'] . "||" .
                  $fila['cursoDescripcion'] . "||" .
                  $fila['cursoDuracion'];
    ?>
        <tr>
            <td><?php echo $fila['id_curso']; ?></td>
            <td><?php echo $fila['cursoNombre']; ?></td>
            <td><?php echo $fila['cursoDescripcion']; ?></td>
            <td><?php echo $fila['cursoDuracion']; ?></td>
            <td>
                <button class="btn btn-warning glyphicon glyphicon-pencil"
                               data-toggle="modal"
                               data-target="#modalEdicion"
                               onclick="agregaform('<?php echo $datos; ?>')">
                </button></td>
            <td>
                <button class="btn btn-danger glyphicon glyphicon-remove"
                           onclick="preguntarSiNo('<?php echo $fila['id_curso']; ?>')">
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
