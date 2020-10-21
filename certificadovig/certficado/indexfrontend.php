


<?php


$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$cedula = $_GET['cedula'];
$curso = $_GET['curso'];
$ciudad = $_GET['ciudad'];
$fecha = $_GET['fecha'];

?>









<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Firma Digital</title>
	<!-- BOOSTRAP -->
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<!-- FIRMAS -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
	
	<link rel="stylesheet" type="text/css" href="librerias/css/estilos.css">	
	
	
	
</head>
<body>
	<div class="row">
		<div class="col-sm-1" style="background-color:#fff;"></div>	
		<div id="principal" class="col-sm-10">
			<!-- CONTENIDO DE LA TUTELA -->
			<img id="scream" style="width:223px; height:50px;"
			src="imagenes/borde.jpg" alt="imagenes/borde.jpg">
			<img id="scream2" style="width:50px; height:223px;"
			src="imagenes/bordeVertical.jpg" alt="imagenes/bordeVertical.jpg">
			<img id="scream3" style="width:300px; height:95px;"
			src="imagenes/encabezado.jpg" alt="imagenes/encabezado.jpg">
			<img id="scream4" style="width:300px; height:164px;"
			src="imagenes/datos.jpg" alt="imagenes/datos.jpg">
			<img id="scream5" style="width:678px; height:229px;"
			src="imagenes/pie.jpg" alt="imagenes/pie.jpg">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>

				<div style="text-align:center;">
					<h1>
						<b>LUGAR Y FECHA: <?php echo $ciudad; ?> <?php echo $fecha; ?></b>
					</h1>
				</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>	
			<br>
				<div style="text-align:center;">
					<h1>
					<b><?php echo $nombre; ?> <?php echo $apellido; ?></b><br>
					<b>C.C.: <?php echo $cedula; ?></b><br>
					<b>Se capacito y aprobó el seminario de: <?php echo $curso; ?></b><br>
					<b>----------------------------------------------------------------------------------</b>
					</h1>
				</div>
			<br>
				<div style="text-align:center; color:blue;">
					<b>NO VALIDO PARA TRAMITAR ARMAS DE FUEGO</b>
				</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			</center>
			<H1 class="text-primary"></H1>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<canvas id="pizarra">Your browser does not support the HTML5 canvas tag.</canvas>
			<br>
			<br>
			<br>
			<!--
				
			-->
			<button class="btn btn-primary" id="BtnAmpliar" onclick="BtnAmpliar()">BtnAmpliar</button>
			<button class="btn btn-primary" id="guardar">Guardar</button>
			<script type="text/javascript" src="librerias/javascript/firmafrontend.js"></script>
			<script type="text/javascript" src="librerias/javascript/DetallesFirma.js"></script>
		</div>	
		<div class="col-sm-1" style="background-color:#000000;"></div>
	</div>
</body>
</html>
