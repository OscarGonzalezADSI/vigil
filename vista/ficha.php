<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Clientes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php
	include('librerias.php');
	?>
	<script src="../controlador/funciones_ficha.js"></script>
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
			Agregar Ficha       
		</button>

		<div id="tabla_ficha_activado"></div>
	    <div id="tabla_ficha_desactivado"></div>
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
			<label>id_ficha</label>
			<input type="number" id="id_ficha" class="form-control input-sm" required="">
			<label>curso_id</label>
			<input type="number" id="curso_id" class="form-control input-sm" required="">
			<label>instructor_id</label>
			<input type="number" id="instructor_id" class="form-control input-sm" required="">
			<label>fichaInicio</label>
			<input type="datetime-local" id="fichaInicio" class="form-control input-sm" required="">
			<label>fichaFin</label>
			<input type="datetime-local" id="fichaFin" class="form-control input-sm" required="">
			<label>fichaEstado</label>
			<input type="number" id="fichaEstado" class="form-control input-sm" required="">
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
			<input type="number" hidden="" id="id_fichau">
			<label>curso_id</label>
			<input type="number" id="curso_idu" class="form-control input-sm" required="">
			<label>instructor_id</label>
			<input type="number" id="instructor_idu" class="form-control input-sm" required="">
			<label>fichaInicio</label>
			<input type="datetime-local" id="fichaIniciou" class="form-control input-sm" required="">
			<label>fichaFin</label>
			<input type="datetime-local" id="fichaFinu" class="form-control input-sm" required="">
			<label>fichaEstado</label>
			<input type="number" id="fichaEstadou" class="form-control input-sm" required="">
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
			$('#tabla_ficha_activado').load('componentes/vista_ficha_activado.php');
			$('#tabla_ficha_desactivado').load('componentes/vista_ficha_desactivado.php');
	    });
	</script>
	<script type="text/javascript">
	    $(document).ready(function () {
		$('#guardarnuevo').click(function () {
		    id_ficha = $('#id_ficha').val();
		    curso_id = $('#curso_id').val();
		    instructor_id = $('#instructor_id').val();
		    fichaInicio = $('#fichaInicio').val();
		    fichaFin = $('#fichaFin').val();
		    fichaEstado = $('#fichaEstado').val();
		    agregardatos(id_ficha, curso_id, instructor_id, fichaInicio, fichaFin, fichaEstado);
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
