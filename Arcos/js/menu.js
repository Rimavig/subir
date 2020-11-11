$(document).ready(main);

var contador = 1;
var contador1 = 1;
var contador2 = 1;
var contador3 = 1;
var contador4 = 1;
var value = "";
var value1 = "";
var value2 = "";

//Estilo de desplazamiento
function navx(navt,navy) {
			$(navt).animate({
				left: navy
			});
}
//menu
function main (){
		$('.prueba').click(function(){
				contador = 1;
				navx('.nav_bar', '-100%');
				contador1 = 1;
				navx('.nav1_bar', '-100%');
				contador2 = 1;
				navx('.nav2_bar', '-100%');
				contador3 = 1;
				navx('.nav3_bar', '-100%');
				contador4 = 1;
				navx('.nav4_bar', '-100%');
		});
		$('.menu_bar').click(function(){
			if (contador == 1){
				navx('.nav_bar', '0');
				contador = 0;
			} else {
				contador = 1;
				navx('.nav_bar', '-100%');
				contador1 = 1;
				navx('.nav1_bar', '-100%');
				contador2 = 1;
				navx('.nav2_bar', '-100%');
				contador3 = 1;
				navx('.nav3_bar', '-100%');
				contador4 = 1;
				navx('.nav4_bar', '-100%');
				};
		});
		$('.menu1_bar').click(function(){
			if(window.matchMedia("(min-width:820px )").matches){
				if (contador1 == 1){
					navx('.nav1_bar', '110px');
					contador2 = 1;
					navx('.nav2_bar', '-100%');
					contador3 = 1;
					navx('.nav3_bar', '-100%');
					contador4 = 1;
					navx('.nav4_bar', '-100%');
					contador1 = 0;
				} else {
					contador1 = 1;
					navx('.nav1_bar', '-100%');
				};
			}else{
				if (contador1 == 1){
					navx('.nav1_bar', '180px');
					contador2 = 1;
					navx('.nav2_bar', '-100%');
					contador3 = 1;
					navx('.nav3_bar', '-100%');
					contador4 = 1;
					navx('.nav4_bar', '-100%');
					contador1 = 0;
				} else {
					contador1 = 1;
					navx('.nav1_bar', '-100%');
				};
			};
		});
		$('.menu2_bar').click(function(){
			if(window.matchMedia("(min-width:820px )").matches){
				if (contador2 == 1){
					navx('.nav2_bar', '220px');
					contador1 = 1;
					navx('.nav1_bar', '-100%');
					contador3 = 1;
					navx('.nav3_bar', '-100%');
					contador4 = 1;
					navx('.nav4_bar', '-100%');
					contador2 = 0;
				} else {
					contador2 = 1;
					navx('.nav2_bar', '-100%');
				};
			}else{
				if (contador2 == 1){
					navx('.nav2_bar', '180px');
					contador1 = 1;
					navx('.nav1_bar', '-100%');
					contador3 = 1;
					navx('.nav3_bar', '-100%');
					contador4 = 1;
					navx('.nav4_bar', '-100%');
					contador2 = 0;
				} else {
					contador2 = 1;
					navx('.nav2_bar', '-100%');
				};
			};
		});
		$('.menu3_bar').click(function(){
			if(window.matchMedia("(min-width:820px )").matches){
				if (contador3 == 1){
					navx('.nav3_bar', '380px');
					contador1 = 1;
					navx('.nav1_bar', '-100%');
					contador2 = 1;
					navx('.nav2_bar', '-100%');
					contador4 = 1;
					navx('.nav4_bar', '-100%');
					contador3 = 0;
				} else {
					contador3 = 1;
					navx('.nav3_bar', '-100%');
				};
			}else{
				if (contador3 == 1){
					navx('.nav3_bar', '180px');
					contador1 = 1;
					navx('.nav1_bar', '-100%');
					contador2 = 1;
					navx('.nav2_bar', '-100%');
					contador4 = 1;
					navx('.nav4_bar', '-100%');
					contador3 = 0;
				} else {
					contador3 = 1;
					navx('.nav3_bar', '-100%');
				};
			};
		});
		$('.menu4_bar').click(function(){
			if(window.matchMedia("(min-width:820px )").matches){
				if (contador4 == 1){
					navx('.nav4_bar', '380px');
					contador1 = 1;
					navx('.nav1_bar', '-100%');
					contador2 = 1;
					navx('.nav2_bar', '-100%');
					contador3 = 1;
					navx('.nav3_bar', '-100%');
					contador4 = 0;
				} else {
					contador4 = 1;
					navx('.nav4_bar', '-100%');
				};
			}else{
				if (contador4 == 1){
					$('.nav4_bar').animate({
						left: '180px'
					});
					contador1 = 1;
					$('.nav1_bar').animate({
						left: '-100%'
					});
					contador2 = 1;
					$('.nav2_bar').animate({
						left: '-100%'
					});
					contador3 = 1;
					$('.nav3_bar').animate({
						left: '-100%'
					});
					contador4 = 0;
				} else {
					contador4 = 1;
					$('.nav4_bar').animate({
						left: '-100%'
					});
				};
				};
		});
};

//Container cambia respecto al menu
$(document).ready(function () {

	$("#menu").click(function(event) {
		$('.container-fluid').load('../menu/main.html');
	});
	$("#aprobar").click(function(event) {
		$('.container-fluid').load('../buscar/ciudadela.php');
	});
	$("#aprobados").click(function(event) {
		$('.container-fluid').load('../invitaciones/invitaciones.php', {var1:"aprobados"});
	});
	$("#rechazados").click(function(event) {
		$('.container-fluid').load('../invitaciones/invitaciones.php', {var1:"rechazados"});
	});
})
function aceptar($message) {
		$('html, body').animate({scrollTop:0}, 'slow');
	 console.log($message);
	 if( $message=="true" ) {
		 $('.container-fluid').load('../menu/main.html');
	 }else{
		 $(".cont1").hide();
		 $(".cont2").show();
	 }
}
function cargar(tipo) {
		$('html, body').animate({scrollTop:0}, 'slow');
		console.log('cargar');
		$('.buscar').show();
		$(".cont3").hide();
		if (tipo=='ciudadela') {
			console.log('ciudadela');
			buscar('td:first');
		}
}

//Busca ciudadela ,usuarios, visitantes y selecciona
function buscar(tipo) {
		$('html, body').animate({scrollTop:0}, 'slow');
		tamaño();
		$("#tciudadela tbody tr").unbind();
		$(".cont3").hide();
		$('.buscar').show();
		$(".cont1").hide();
		$(".usuarios").hide();
		$(".visitantes").hide();
		$(".editar").hide();
		$(".eliminar").hide();
		$(".bloquear").hide();
		$(".permisos").show();
		if(tipo=='td:first'){
			$('.cont1').load('../buscar/aprobar.php', {var1:value});
		  $("#tciudadela tbody tr").click(function(event) {
				$(this).addClass('selected').siblings().removeClass('selected');
				value=$(this).find(tipo).text();
				$('.cont1').load('../buscar/aprobar.php', {var1:value});
		 });
		}
}
function Binvitaciones(tipo) {
		$('html, body').animate({scrollTop:0}, 'slow');
		tamaño();
		$("#tciudadela tbody tr").unbind();
		$(".cont3").hide();
		$('.buscar').show();
		$(".usuarios").hide();
		$("#tciudadela tbody tr").click(function(event) {
				$(this).addClass('selected').siblings().removeClass('selected');
				value=$(this).find('td:first').text();
				var invit="../invitaciones/";
				var tinvit=invit.concat(tipo);
				$('.cont1').load(tinvit, {var1:value});
		});
}
//Carga invitaciones Enviadas normales
function aprobados() {
	$('html, body').animate({scrollTop:0}, 'slow');
	console.log('aprobados');
	Binvitaciones("aprobadas.php");
}
//carga invitaciones enviadas Recurrentes
function rechazados() {
	$('html, body').animate({scrollTop:0}, 'slow');
	console.log('rechazados');
	Binvitaciones("rechazadas.php");
}
//Carga invitaciones Recibidas normales
function ciudadelas() {
		console.log('buscar-Ciudadelas');
		buscar('td:first');
}
function ingreso() {
		console.log('buscar-ingreso');
		buscar('ingreso');
}
function Busuarios() {
		console.log('buscar-Usuarios');
		buscar('td:eq(3)');
}
function aprobacion() {
		console.log('buscar-Usuarios-Aprobar');
		buscar('aprobar');
}
function visitantes() {
		console.log('buscar-Visitantes');
		buscar('td:eq(2)');
}
//Busca y selecciona informacion completa del usuario
function usuarios(tipo) {
	$('html, body').animate({scrollTop:0}, 'slow');
	console.log('#usuarios');
	if(window.matchMedia("(min-width:1400px )").matches){
			document.getElementById("container1").style.width = '1200px';
	}
		$(".cont3").hide();
		$(".cont2").hide();
		$(".cont1").show();
		$("#tusuarios tbody tr").unbind();
		$(".buscar").hide();
		$(".invitados").hide();
		$(".usuarios").show();
		Susuarios('0');
}
//Boton que abre pagina editar
function editar(tipo) {
	$('html, body').animate({scrollTop:0}, 'slow');
	console.log('#editar');
	tamaño();
	$(".usuarios").hide();
	$(".editar").show();
	$(".cont2").show();
	$('.cont2').load('../modificar/editar.php', {var1:value1,var2:value2});
}
//Boton editar
function Beditar(tipo) {
	$('html, body').animate({scrollTop:0}, 'slow');
	console.log('Beditar');
	$(".cont3").show();
	$(".editar").hide();
	$(".cont1").hide();
		var id=document.getElementById("id").value;
		var actividad=document.getElementById("actividad").value;
		var observaciones=document.getElementById("observaciones").value;
		if(tipo=='0'){
			 var value3 = id.concat(",",actividad,",",observaciones,",A");
			 document.getElementById("texto").innerHTML = "SE ACEPTO CORRECTAMENTE";
		}else{
			var value3 = id.concat(",",actividad,",",observaciones,",I");
			document.getElementById("texto").innerHTML = "SE RECHAZO CORRECTAMENTE";
		}
		console.log(value3);
		$('.cont2').load('../modificar/editar.php', {var1:value1,var3:value3});
}

//selecciona usuarios
function Susuarios(tipo) {
	console.log('#usuarios');
	$(".cont2").hide();
	$("#tusuarios tbody tr").click(function(event) {
			console.log('#usuarios1');
			$('#buscar').unbind();
			$('#usuarios').unbind();
			$('#invitados').unbind();
			$("#tciudadela tbody tr").unbind();
			$(this).addClass('selected').siblings().removeClass('selected');
			value1=$(this).find('td:eq(0)').html();
	});
}
//ajusta tamaño
function tamaño() {
	if(window.matchMedia("(min-width:1000px )").matches){
			document.getElementById("container1").style.width = '800px';
	}
}
$(function() {
			$(".meter > span").each(function() {
				$(this)
					.data("origWidth", $(this).width())
					.width(0)
					.animate({
						width: $(this).data("origWidth")
					}, 1200);
			});
		});
//filtrar
function Search(tipo,tipo2)
 {
     const tableReg = document.getElementById(tipo);
     const searchText = document.getElementById(tipo2).value.toLowerCase();
     let total = 0;

     // Recorremos todas las filas con contenido de la tabla
     for (let i = 1; i < tableReg.rows.length; i++) {
         // Si el td tiene la clase "noSearch" no se busca en su cntenido
         if (tableReg.rows[i].classList.contains("noSearch")) {
             continue;
         }

         let found = false;
         const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
         // Recorremos todas las celdas
         for (let j = 0; j < cellsOfRow.length && !found; j++) {
             const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
             // Buscamos el texto en el contenido de la celda
             if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                 found = true;
                 total++;
             }
         }
         if (found) {
             tableReg.rows[i].style.display = '';
         } else {
             // si no ha encontrado ninguna coincidencia, esconde la
             // fila de la tabla
             tableReg.rows[i].style.display = 'none';
         }
     }

     // mostramos las coincidencias
     const lastTR=tableReg.rows[tableReg.rows.length-1];
     const td=lastTR.querySelector("td");
     lastTR.classList.remove("hide", "red");
     if (searchText == "") {
         lastTR.classList.add("hide");
     } else if (total) {
         td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
     } else {
         lastTR.classList.add("red");
         td.innerHTML="No se han encontrado coincidencias";
     }
 }
 //filtra ciudadelas
 function doSearch()
  {
      Search('tciudadela','searchTerm');
  }
 //filtrar usuarios
 function doSearch1()
  {
      Search('tusuarios','searchTerm1');
  }
