<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Certificado</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php
	include('librerias.php');
	?>
	<script src="../controlador/funciones_certificado_frontend.js"></script>
    </head>
    <body id="body">
	<?php
	include 'header.php';
	?>
	<div class="container"></br></br></br></br></br>

	<input id="cedula" type="text">
	<button class="btn btn-primary" id="consul">enviar</button>

	<?php
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if (empty($_GET["cedula"])) {
			$nameErr = "Name is required";
		} else {
			$name = test_input($_GET["cedula"]);
			
			?>
				<div id="tabla"></div>
				<?php
					$cedula = $_GET['cedula'];
					$ruta = 'componentes/vista_certificado_frontend.php?cedula='.$cedula;
				?>
				<script type="text/javascript">
					$(document).ready(function () {
					$('#tabla').load('<?php echo $ruta; ?>');
					});
				</script>
			<?php
		}
	}

	?>
	<script type="text/javascript">
		$('#consul').click(function () {
			cedula = $('#cedula').val();
			var ruta ="http://localhost/web/prueba_descarga_github/vigil/vista/certificado_frontend.php?cedula="+cedula;
		    location.href=ruta;
		});	
	</script>

	</div>
	<?php
	include './footer.php';
	?>
    </body>
</html>
