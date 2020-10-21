<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Clientes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php
	include('librerias.php');
	?>
	<script src="../controlador/funciones_persona.js"></script>
    </head>
    <body id="body">
	<?php
	include 'header.php';
	?>
	<div class="container">
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
			<label>id_persona</label>
			<input type="number" id="id_persona" class="form-control input-sm" required="">
			<label>personaNombre</label>
			<textarea id="personaNombre" rows="4" cols="50"class="form-control input-sm" required=""></textarea>
			<label>personaApellido</label>
			<textarea id="personaApellido" rows="4" cols="50"class="form-control input-sm" required=""></textarea>
			<label>personaCedula</label>
			<textarea id="personaCedula" rows="4" cols="50"class="form-control input-sm" required=""></textarea>
			<label>personaDireccion</label>
			<textarea id="personaDireccion" rows="4" cols="50"class="form-control input-sm" required=""></textarea>
			<label>personaCelular</label>
			<textarea id="personaCelular" rows="4" cols="50"class="form-control input-sm" required=""></textarea>
			<label>personaCorreo</label>
			<textarea id="personaCorreo" rows="4" cols="50"class="form-control input-sm" required=""></textarea>
			<label for="orden">insertar como:</label>
			<select name="orden" id="orden" class="form-control input-sm" required="">
				<option value="insertarAprendiz">-- Estado --</option>
				<option value="insertarAprendiz">insertar como Aprendiz</option>
				<option value="insertarInstructor">insertar como Instructor</option>
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
			<input type="number" hidden="" id="id_personau">
			<label>personaNombre</label>
			<textarea id="personaNombreu" rows="4" cols="50" class="form-control input-sm" required=""></textarea>
			<label>personaApellido</label>
			<textarea id="personaApellidou" rows="4" cols="50" class="form-control input-sm" required=""></textarea>
			<label>personaCedula</label>
			<textarea id="personaCedulau" rows="4" cols="50" class="form-control input-sm" required=""></textarea>
			<label>personaDireccion</label>
			<textarea id="personaDireccionu" rows="4" cols="50" class="form-control input-sm" required=""></textarea>
			<label>personaCelular</label>
			<textarea id="personaCelularu" rows="4" cols="50" class="form-control input-sm" required=""></textarea>
			<label>personaCorreo</label>
			<textarea id="personaCorreou" rows="4" cols="50" class="form-control input-sm" required=""></textarea>
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
		$('#tabla').load('componentes/vista_persona.php');
	    });
	</script>
	<script type="text/javascript">
	    $(document).ready(function () {
		$('#guardarnuevo').click(function () {
		    id_persona = $('#id_persona').val();
		    personaNombre = $('#personaNombre').val();
		    personaApellido = $('#personaApellido').val();
		    personaCedula = $('#personaCedula').val();
		    personaDireccion = $('#personaDireccion').val();
		    personaCelular = $('#personaCelular').val();
			personaCorreo = $('#personaCorreo').val();
			orden = $('#orden').val();
		    agregardatos(id_persona, personaNombre, personaApellido, personaCedula, personaDireccion, personaCelular, personaCorreo, orden);
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
