<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Clientes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php
	include('librerias.php');
	?>
	<script src="../controlador/funciones_curso.js"></script>
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
			Agregar curso       
		</button>

		<div id="tabla_curso_activado"></div>
	    <div id="tabla_curso_desactivado"></div>
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
			<label>id_curso</label>
			<input type="number" id="id_curso" class="form-control input-sm" required="">
			<label>cursoNombre</label>
			<textarea id="cursoNombre" rows="4" cols="50"class="form-control input-sm" required=""></textarea>
			<label>cursoDescripcion</label>
			<textarea id="cursoDescripcion" rows="4" cols="50"class="form-control input-sm" required=""></textarea>
			<label>cursoDuracion</label>
			<textarea id="cursoDuracion" rows="4" cols="50"class="form-control input-sm" required=""></textarea>
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
			<input type="number" hidden="" id="id_cursou">
			<label>cursoNombre</label>
			<textarea id="cursoNombreu" rows="4" cols="50" class="form-control input-sm" required=""></textarea>
			<label>cursoDescripcion</label>
			<textarea id="cursoDescripcionu" rows="4" cols="50" class="form-control input-sm" required=""></textarea>
			<label>cursoDuracion</label>
			<textarea id="cursoDuracionu" rows="4" cols="50" class="form-control input-sm" required=""></textarea>
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
			$('#tabla_curso_activado').load('componentes/vista_curso_activado.php');
			$('#tabla_curso_desactivado').load('componentes/vista_curso_desactivado.php');
	    });
	</script>
	<script type="text/javascript">
	    $(document).ready(function () {
		$('#guardarnuevo').click(function () {
		    id_curso = $('#id_curso').val();
		    cursoNombre = $('#cursoNombre').val();
		    cursoDescripcion = $('#cursoDescripcion').val();
		    cursoDuracion = $('#cursoDuracion').val();
		    agregardatos(id_curso, cursoNombre, cursoDescripcion, cursoDuracion);
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
