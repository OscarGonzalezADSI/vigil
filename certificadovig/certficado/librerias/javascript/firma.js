/*
 * Copyright (C) 2020 Ernesto Baruch
 * GitHub:       https://github.com/Baruch13
 * E-mail:       ernestobaruch15@gmail.com
 * WhatsApp:     (+57)302 3342189
 *
 * Con el apoyo de Oscar Gonzalez
 * GitHub:       https://github.com/OscarGonzalez1987/
 * E-mail:       oigonzalezp@gmail.com
 * WhatsApp:     (+57)322 8858439
 *
 * Fuente De Consulta:

 * DIBUJAR USANDO EL RATÓN O EL DEDO CON HTML
 * NOTA:De aqui saque le codigo de la pizarra
 * https://programadorwebvalencia.com/dibujar-con-el-raton-en-HTML-y-Javascript/

 * Convertir de HTML a PDF utilizando Javascript
 * NOTA: De aqui saque el Jquery
 * https://programacion.net/articulo/convertir_de_html_a_pdf_utilizando_javascript_2122

 * Cómo convertir una página HTML a PDF entonces descargarlo?
 * NOTA: De aqui saque para generar el documento pdf
 * https://www.it-swarm.dev/es/javascript/ como-convertir-una-pagina-html-pdf-entonces-descargarlo/834786198/
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// VARIABLES
let miCanvas = document.querySelector('#pizarra');
let lineas = [];
let correccionX = 0;
let correccionY = 0;
let pintarLinea = false;
let posicion = miCanvas.getBoundingClientRect()

correccionX = posicion.x;
correccionY = posicion.y;

miCanvas.width = 700;
miCanvas.height = 350;

// FUNCIONES

//Funcion que empieza a dibujar la linea
function empezarDibujo () {
	pintarLinea = true;
	lineas.push([]);
};

//Funcion dibuja la linea
function dibujarLinea (event) {
	event.preventDefault();
	if (pintarLinea) {
		let ctx = miCanvas.getContext('2d')
		
		// Estilos de linea
		ctx.lineJoin = ctx.lineCap = 'round';
		ctx.lineWidth = 1;
		
		// Color de la linea
		ctx.strokeStyle = '#000';
		
		// Marca el nuevo punto
		let nuevaPosicionX = 0;
		let nuevaPosicionY = 0;
		
		if (event.changedTouches == undefined) {
			// Versión ratón
			nuevaPosicionX = event.layerX;
			nuevaPosicionY = event.layerY;
		} else {
			// Versión touch, pantalla tactil
			nuevaPosicionX = event.changedTouches[0].pageX - correccionX;
			nuevaPosicionY = event.changedTouches[0].pageY - correccionY;
		}
		
		// Guarda la linea
		lineas[lineas.length - 1].push({
			x: nuevaPosicionX,
			y: nuevaPosicionY
		});
		
		// Redibuja todas las lineas guardadas
		ctx.beginPath();
		lineas.forEach(function (segmento) {
			ctx.moveTo(segmento[0].x, segmento[0].y);
			segmento.forEach(function (punto, index) {
				ctx.lineTo(punto.x, punto.y);
			});
		});
		
		ctx.stroke();
	}
}
//Funcion que deja de dibujar la linea
function pararDibujar () {
	pintarLinea = false;
}

//crea un banner
function insertarBanner(xi, yi, imagen, ancho, alto){
	var img = new Image();
	img.src = imagen;
	for(i=0;i<6;i++){
		// doc.addImage(imageData, formato, x, y, ancho, alto, alias, compresión, rotación);		
		doc.addImage(img, 'JPEG', xi, yi, ancho, alto);
		xi = xi+ancho;
	}		
}

function insertarBannerlateral(xi, yi, imagen, ancho, alto){
	var img = new Image();
	img.src = imagen;
	for(i=0;i<8;i++){
		// doc.addImage(imageData, formato, x, y, ancho, alto, alias, compresión, rotación);		
		doc.addImage(img, 'JPEG', xi, yi, ancho, alto);
		yi = yi+alto;
	}		
}

function insertarImagen(xi, yi, imagen, ancho, alto){
	var img = new Image();
	img.src = imagen;
	// doc.addImage(imageData, formato, x, y, ancho, alto, alias, compresión, rotación);		
	doc.addImage(img, 'JPEG', xi, yi, ancho, alto);		
}







// Eventos raton
miCanvas.addEventListener('mousedown', empezarDibujo, false);
miCanvas.addEventListener('mousemove', dibujarLinea, false);
miCanvas.addEventListener('mouseup', pararDibujar, false);

// Eventos pantallas táctiles
miCanvas.addEventListener('touchstart', empezarDibujo, false);
miCanvas.addEventListener('touchmove', dibujarLinea, false);



//document.getElementById("guardar").style.display = "none";

document.getElementById("scream").style.display = "none";
document.getElementById("scream2").style.display = "none";
document.getElementById("scream3").style.display = "none";
document.getElementById("scream4").style.display = "none";
document.getElementById("scream5").style.display = "none";

// código Guardar Firma
let doc = new jsPDF('p','pt','a4');





















$('#guardar').click(function(){
	// oculta los botones mientras guarda el pdf
	BtnNone();
	// oculta el borde de la firma mientras guarda el pdf
	document.getElementById('pizarra').style.border= '0px solid #000000';
	
	doc.addHTML(document.body, function() {
		
	xi = 75;
	yi = 45;
	ancho = 450;
	alto = 145;
	imagen = 'imagenes/encabezado.jpg';
	insertarImagen(xi, yi, imagen, ancho, alto);

	xi = 75;
	yi = 310;
	ancho = 450;
	alto = 153;
	imagen = 'imagenes/datos.jpg';
	insertarImagen(xi, yi, imagen, ancho, alto);


	xi = 75;
	yi = 655;
	ancho = 450;
	alto = 135;
	imagen = 'imagenes/pie.jpg';
	insertarImagen(xi, yi, imagen, ancho, alto);

	//crea el banner superior
	xi = 0;
	yi = 0;
	ancho = 111;
	alto = 25;
	imagen = 'imagenes/borde.jpg';
	insertarBanner(xi, yi, imagen, ancho, alto);

	var xi = 10;
	var yi = 817;
	var ancho = 111;
	var alto = 25;
	var imagen = 'imagenes/borde.jpg';
	insertarBanner(xi, yi, imagen, ancho, alto);





	xi = 0;
	yi = 25;
	ancho = 25;
	alto = 111;
	imagen = 'imagenes/bordeVertical.jpg';
	insertarBannerlateral(xi, yi, imagen, ancho, alto);

	xi = 570;
	yi = 25;
	ancho = 25;
	alto = 111;
	imagen = 'imagenes/bordeVertical.jpg';
	insertarBannerlateral(xi, yi, imagen, ancho, alto);

	doc.save('html.pdf');
	// reaparece el boton
	BtnBlock();
	});
}); 

// oculta los botones
function BtnNone() {
document.getElementById("guardar").style.display = "none";
document.getElementById("BtnAmpliar").style.display = "none"; 
}	

// reaparece los botones
function BtnBlock() {
document.getElementById("guardar").style.display = "block";
document.getElementById("BtnAmpliar").style.display = "block";
}

// ampliar zona de firma
function BtnAmpliar() {
document.getElementById("pizarra").style.width = "350px";
document.getElementById("pizarra").style.height = "175px";
document.getElementById("BtnAmpliar").style.display = "none";
document.getElementById("guardar").style.display = "block";
}	
	
	
	
	
	
	
	
		
function ejecutar(){
	// oculta los botones mientras guarda el pdf
	BtnNone();
	// oculta el borde de la firma mientras guarda el pdf
	document.getElementById('pizarra').style.border= '0px solid #000000';
	
	doc.addHTML(document.body, function() {
		
	xi = 75;
	yi = 45;
	ancho = 450;
	alto = 145;
	imagen = 'imagenes/encabezado.jpg';
	insertarImagen(xi, yi, imagen, ancho, alto);

	xi = 75;
	yi = 310;
	ancho = 450;
	alto = 153;
	imagen = 'imagenes/datos.jpg';
	insertarImagen(xi, yi, imagen, ancho, alto);


	xi = 75;
	yi = 655;
	ancho = 450;
	alto = 135;
	imagen = 'imagenes/pie.jpg';
	insertarImagen(xi, yi, imagen, ancho, alto);

	//crea el banner superior
	xi = 0;
	yi = 0;
	ancho = 111;
	alto = 25;
	imagen = 'imagenes/borde.jpg';
	insertarBanner(xi, yi, imagen, ancho, alto);

	var xi = 10;
	var yi = 817;
	var ancho = 111;
	var alto = 25;
	var imagen = 'imagenes/borde.jpg';
	insertarBanner(xi, yi, imagen, ancho, alto);





	xi = 0;
	yi = 25;
	ancho = 25;
	alto = 111;
	imagen = 'imagenes/bordeVertical.jpg';
	insertarBannerlateral(xi, yi, imagen, ancho, alto);

	xi = 570;
	yi = 25;
	ancho = 25;
	alto = 111;
	imagen = 'imagenes/bordeVertical.jpg';
	insertarBannerlateral(xi, yi, imagen, ancho, alto);

	doc.save('html.pdf');
	// reaparece el boton
	BtnBlock();
	});
}

ejecutar();
location.href ="http://localhost/web/OurCRUD/proyectos/cursos/vista/certificado.php";