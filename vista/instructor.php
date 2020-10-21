<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Clientes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php
	include('librerias.php');
	?>
	<script src="../controlador/funciones_instructor.js"></script>
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
		Agregar Instructor        
	</button>
	
	    <div id="tabla_instructor_activo"></div>
	    <div id="tabla_instructor_retirado"></div>		
	    <div id="tabla_instructor_suspendido"></div>
	    <div id="tabla_instructor_sancionado"></div>
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
			<label>id_instructor</label>
			<input type="number" id="id_instructor" class="form-control input-sm" required="">


			<label for="persona_id">persona_id:</label>

			<select name="persona_id" id="persona_id" class="form-control input-sm" required="">
				<option value=""></option>
				<?php

				include_once '../modelo/conexion.php';
				$conns = conexion();

				$sqls = 'SELECT
						persona.id_persona as id_persona,
						persona.personaCedula as personaCedula,
						persona.personaApellido as personaApellido,
						persona.personaNombre as personaNombre
						FROM persona';

				$results = mysqli_query($conns, $sqls);
				WHILE($filas = mysqli_fetch_assoc($results)){
				?>

					<option value="<?php echo $filas['id_persona'];?>">
					<?php echo $filas['personaCedula'];?> - 
					<?php echo $filas['personaApellido'];?> 
					<?php echo $filas['personaNombre'];?>
					</option>

				<?php
				}
				mysqli_close($conns);
				?>
			</select>



			<label for="instructorEstado">instructorEstado:</label>
			<select name="instructorEstado" id="instructorEstado" class="form-control input-sm" required="">
				<option value="3">-- Estado --</option>
				<option value="1">Activo</option>
				<option value="2">Retirado</option>
				<option value="3">Suspendido</option>
				<option value="4">Sancionado</option>
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
			<input type="number" hidden="" id="id_instructoru">
			<input type="number" hidden="" id="persona_idu">
			
			<label for="instructorEstadou">instructorEstadou:</label>
			<select name="instructorEstadou" id="instructorEstadou" class="form-control input-sm" required="">
				<option value="3">-- Estado --</option>
				<option value="1">Activo</option>
				<option value="2">Retirado</option>
				<option value="3">Suspendido</option>
				<option value="4">Sancionado</option>
			</select>
			
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
			$('#tabla_instructor_activo').load('componentes/vista_instructor_activo.php');
			$('#tabla_instructor_retirado').load('componentes/vista_instructor_retirado.php');		
			$('#tabla_instructor_suspendido').load('componentes/vista_instructor_suspendido.php');
			$('#tabla_instructor_sancionado').load('componentes/vista_instructor_sancionado.php');
	    });
	</script>
	<script type="text/javascript">
	    $(document).ready(function () {
		$('#guardarnuevo').click(function () {
		    id_instructor = $('#id_instructor').val();
		    persona_id = $('#persona_id').val();
		    instructorEstado = $('#instructorEstado').val();
		    agregardatos(id_instructor, persona_id, instructorEstado);
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
