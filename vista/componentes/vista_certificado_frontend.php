<?php
include_once '../../modelo/conexion.php';
$conn = conexion();
?>

<div class="row">
<div class="col-sm-10" style="background-color:#F39C12; border-radius:20px 20px 0px 0px; height:20px; margin-top:50px;"></div>
<div class="col-sm-10" style="background-color:#00000050; height:80px; margin-top:0px; margin-buttom:0px; padding-top:5px;">
    <h2 style="color:#ffffff;">Certificados</h2>
</div>
<div class="col-sm-10" style="background-color:#F39C12; border-radius:0px 0px 20px 20px; height:20px; margin-buttom:0px"></div>



    <?php

    $cedula = $_GET['cedula'];


    $sql = "SELECT
            persona.personaNombre as personaNombre,
            persona.personaApellido as personaApellido,
            persona.personaCedula as personaCedula,
            persona.foto as foto,
            curso.cursoNombre as cursoNombre,
            curso.cursoDescripcion as cursoDescripcion,
            curso.cursoDuracion as cursoDuracion,
            certificado.id_certificado as id_certificado,
            certificado.matricula_id as matricula_id,
            certificado.certificadoFecha as certificadoFecha
            FROM certificado, matricula, aprendiz, persona, ficha, curso
            WHERE matricula.id_matricula = certificado.matricula_id
            AND aprendiz.id_aprendiz = matricula.aprendiz_id
            AND persona.id_persona = aprendiz.persona_id
            AND ficha.id_ficha = matricula.ficha_id
            AND curso.id_curso = ficha.curso_id
            AND persona.personaCedula =".$cedula;
    $result = mysqli_query($conn, $sql);
    WHILE($fila = mysqli_fetch_assoc($result)){
        $datos = $fila['id_certificado'] . "||" .
                  $fila['matricula_id'] . "||" .
                  $fila['certificadoFecha'];
    ?>




<div class="col-sm-5" style="margin-top:48px; margin-right:48px;">
    <div style="background-color:#F39C12; border-radius:20px 20px 0px 0px; height:20px; margin-buttom:0px"></div>
    <div style="background-color:#00000050; margin-top:0px; padding:10px">

        <div style="margin-top:30px;">
            <b><?php echo $fila['id_certificado']; ?> <?php echo $fila['id_certificado']; ?></b>
        </div>
        <table class="table table-hover table-condensed table-responsive" style="margin: 0px 0px 0px 0px">
            <tbody>
                <tr>
                    <td><b>Nombre:</b> <?php echo $fila['personaNombre']; ?> <?php echo $fila['personaApellido']; ?></td>
                </tr>
                <tr>
                    <td><b>Cedula:</b> <?php echo $fila['personaCedula']; ?></td>
                </tr>
                <tr>
                    <td><b>foto:</b> <?php echo $fila['foto']; ?></td>
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
                <tr>
                    <td><b>certificadoFecha:</b> <?php echo $fila['certificadoFecha']; ?></td>
                </tr>
                <tr>
                    <td>
                        <a class="btn btn-primary" href="http://localhost/web/prueba_descarga_github/vigil/certificadovig/certficado/index.php?nombre=<?php echo $fila['personaNombre']; ?>&apellido=<?php echo $fila['personaApellido']; ?>&cedula=<?php echo $fila['personaCedula']; ?>&curso=<?php echo $fila['cursoNombre']; ?>&ciudad=cucuta&fecha=02-04-2020">Descargar</a>
                    </td>
                
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
