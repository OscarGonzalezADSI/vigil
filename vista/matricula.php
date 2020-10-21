<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Clientes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php
	include('librerias.php');
	?>
	<script src="../controlador/funciones_matricula.js"></script>
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
			Agregar Matrícula       
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
			
			<input type="number" hidden="" id="id_matricula">
			<label for="aprendiz_id">aprendiz_id:</label>

			<select name="aprendiz_id" id="aprendiz_id" class="form-control input-sm" required="">
				<option value=""></option>
				<?php

				include_once '../modelo/conexion.php';
				$conns = conexion();

				$sqls = 'SELECT
						aprendiz.id_aprendiz as id_aprendiz,
						persona.personaCedula as personaCedula,
						persona.personaNombre as personaNombre,
						persona.personaApellido as personaApellido
						FROM aprendiz, persona
						WHERE persona.id_persona = aprendiz.persona_id';

				$results = mysqli_query($conns, $sqls);
				WHILE($filas = mysqli_fetch_assoc($results)){
				?>

					<option value="<?php echo $filas['id_aprendiz'];?>">
					<?php echo $filas['personaCedula'];?> - 
					<?php echo $filas['personaNombre'];?> -
					<?php echo $filas['personaApellido'];?>
					</option>

				<?php
				}
				mysqli_close($conns);
				?>
			</select>
			
			<label for="ficha_id">ficha_id:</label>

			<select name="ficha_id" id="ficha_id" class="form-control input-sm" required="">
				<option value=""></option>
				<?php

				include_once '../modelo/conexion.php';
				$conns = conexion();

				$sqls = 'SELECT
						ficha.id_ficha as id_ficha,
						curso.cursoNombre as cursoNombre,
						persona.personaNombre as personaNombre,
						persona.personaApellido as personaApellido
						FROM ficha, instructor, persona, curso
						WHERE instructor.id_instructor = ficha.instructor_id
						AND persona.id_persona = instructor.persona_id
						AND curso.id_curso = ficha.curso_id';

				$results = mysqli_query($conns, $sqls);
				WHILE($filas = mysqli_fetch_assoc($results)){
				?>

					<option value="<?php echo $filas['id_ficha'];?>">
					<?php echo $filas['cursoNombre'];?> - 
					<?php echo $filas['personaNombre'];?> 
					<?php echo $filas['personaApellido'];?>
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
			<input type="number" hidden="" id="id_matriculau">
			<label>aprendiz_id</label>
			<input type="number" id="aprendiz_idu" class="form-control input-sm" required="">
			<label>ficha_id</label>
			<input type="number" id="ficha_idu" class="form-control input-sm" required="">
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
		$('#tabla').load('componentes/vista_matricula.php');
	    });
	</script>
	<script type="text/javascript">
	    $(document).ready(function () {
		$('#guardarnuevo').click(function () {
		    id_matricula = $('#id_matricula').val();
		    aprendiz_id = $('#aprendiz_id').val();
		    ficha_id = $('#ficha_id').val();
		    agregardatos(id_matricula, aprendiz_id, ficha_id);
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
