<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Clientes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php
	include('librerias.php');
	?>
	<script src="../controlador/funciones_certificado.js"></script>
    </head>
    <body id="body">
	<?php
	include 'header.php';
	?>
	<div class="container">
	
		<button class="btn btn-lg btn-primary navbar-left"
				data-toggle="modal"
				data-target="#modalNuevo"
				style="margin: 100px 0px 0px 0px; ">
			<span class="glyphicon glyphicon-plus"></span>
			Agregar Certificado       
		</button>

	    <div id="tabla"></div>
	</div>
	<!-- MODAL PARA INSERTAR REGISTROS -->
	<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
		    <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">Agregar cliente</h4>
		    </div>
		    <div class="modal-body">
			<input type="number" hidden="" id="id_certificadou">
			
			
			
			
			<label for="matricula_id">matricula_id:</label>

			<select name="matricula_id" id="matricula_id" class="form-control input-sm" required="">
				<option value=""></option>
				<?php

				include_once '../modelo/conexion.php';
				$conns = conexion();

				$sqls = 'SELECT
						persona.personaCedula as personaCedula,
						persona.personaApellido as personaApellido,
						curso.cursoNombre as cursoNombre,
						matricula.id_matricula as id_matricula
						FROM matricula, aprendiz, persona, ficha, curso
						WHERE aprendiz.id_aprendiz = matricula.aprendiz_id
						AND persona.id_persona = aprendiz.persona_id
						AND ficha.id_ficha = matricula.ficha_id
						AND curso.id_curso = ficha.curso_id
						ORDER BY persona.personaCedula';

				$results = mysqli_query($conns, $sqls);
				WHILE($filas = mysqli_fetch_assoc($results)){
				?>

					<option value="<?php echo $filas['id_matricula'];?>">
					<?php echo $filas['personaCedula'];?> -
					<?php echo $filas['personaApellido'];?> -
					<?php echo $filas['cursoNombre'];?>
					</option>

				<?php
				}
				mysqli_close($conns);
				?>
			</select>	
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			</div>
		    <div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
			    Agregar
			</button>
		    </div>
		</div>
	    </div>
	</div>
	<!-- MODAL PARA EDICION DE DATOS-->
	<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
		    <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
		    </div>
		    <div class="modal-body">
			<input type="number" hidden="" id="id_certificadou">
			<label>matricula_id</label>
			<input type="number" id="matricula_idu" class="form-control input-sm" required="">
			</div>
		    <div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizadatos">
			    Actualizar
			</button>
		    </div>
		</div>
	    </div>
	</div>
	<script type="text/javascript">
	    $(document).ready(function () {
		$('#tabla').load('componentes/vista_certificado.php');
	    });
	</script>
	<script type="text/javascript">
	    $(document).ready(function () {
		$('#guardarnuevo').click(function () {
		    id_certificado = $('#id_certificado').val();
		    matricula_id = $('#matricula_id').val();
		    agregardatos(id_certificado, matricula_id);
		});
		$('#actualizadatos').click(function () {
		    modificarCliente();
		});
	    });
	</script>
	<?php
	include './footer.php';
	?>
    </body>
</html>
