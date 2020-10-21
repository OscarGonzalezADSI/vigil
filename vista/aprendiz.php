<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Clientes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php
	include('librerias.php');
	?>
	<script src="../controlador/funciones_aprendiz.js"></script>
    </head>
    <body id="body">
	<?php
	include 'header.php';
	?>
	<div class="container">
		<div class="row">
		
			<button class="btn btn-lg btn-primary navbar-left"
					data-toggle="modal"
					data-target="#modalNuevo"
					style="margin: 100px 0px 0px 0px; ">
				<span class="glyphicon glyphicon-plus"></span>
				Agregar aprendiz        
			</button>

			<div class="col-sm-12">
				<div id="tabla_aprendiz_activo"></div>
			</div>
			<div class="col-sm-12">
				<div id="tabla_aprendiz_egresado"></div>
			</div>
			<div class="col-sm-12"></div>
			<div class="col-sm-12">
				<div id="tabla_aprendiz_suspendido"></div>
			</div>
			<div class="col-sm-12"></div>
			<div class="col-sm-12">
				<div id="tabla_aprendiz_sancionado"></div>
			</div>
		</div>	
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
			<label>id_aprendiz</label>
			<input type="number" id="id_aprendiz" class="form-control input-sm" required="">

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

			<label for="aprendizEstado">aprendizEstado:</label>
			<select name="aprendizEstado" id="aprendizEstado" class="form-control input-sm" required="">
				<option value="3">-- Estado --</option>
				<option value="1">Activo</option>
				<option value="2">Egresado</option>
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
			<input type="number" hidden="" id="id_aprendizu">
			<input type="number" hidden="" id="persona_idu">
			
			<label for="aprendizEstadou">aprendizEstado:</label>
			<select name="aprendizEstadou" id="aprendizEstadou" class="form-control input-sm" required="">
				<option value="3">-- Estado --</option>
				<option value="1">Activo</option>
				<option value="2">Egresado</option>
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
		$('#tabla_aprendiz_activo').load('componentes/vista_aprendiz_activo.php');
	    });
	    $(document).ready(function () {
		$('#tabla_aprendiz_egresado').load('componentes/vista_aprendiz_egresado.php');
	    });
		$(document).ready(function () {
		$('#tabla_aprendiz_suspendido').load('componentes/vista_aprendiz_suspendido.php');
	    });
		$(document).ready(function () {
		$('#tabla_aprendiz_sancionado').load('componentes/vista_aprendiz_sancionado.php');
	    });




	</script>
	<script type="text/javascript">
	    $(document).ready(function () {
		$('#guardarnuevo').click(function () {
		    id_aprendiz = $('#id_aprendiz').val();
		    persona_id = $('#persona_id').val();
		    aprendizEstado = $('#aprendizEstado').val();
		    agregardatos(id_aprendiz, persona_id, aprendizEstado);
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
