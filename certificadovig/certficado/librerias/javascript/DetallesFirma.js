






var c = document.getElementById("pizarra");
var ctx = c.getContext("2d");
var img = document.getElementById("scream");
// ctx.drawImage(img, 10, 10);
ctx.font = "35px Courier";


campos =["", ""];
campos[0] = "Oscar Gonzalez";
campos[1] = "1.090.384.538";

datos =["", ""];
datos[0] = "Oscar Ivan Gonzalez Peña";
datos[1] = "C.C: 1.090.384.538";

x = 0;	
y = 250;

// linea de firma
//------------------------------
xi = 700;
//------------------------------
ctx.moveTo(x,y);
ctx.lineTo(xi,y);

ctx.moveTo(x,y);
ctx.lineTo(xi,y);

ctx.moveTo(x,y);
ctx.lineTo(xi,y);

ctx.stroke();
//------------------------------



// recorre la lista de texto a exponer
//------------------------------
x=x+x+x
var i;
for (i = 0; i < datos.length; i++) {
	ctx.strokeText(datos[i], x, y+=35);
	ctx.strokeText(datos[i], x, y);
	ctx.strokeText(datos[i], x, y);
	ctx.strokeText(datos[i], x, y);
	ctx.strokeText(datos[i], x, y);
}
//------------------------------





























