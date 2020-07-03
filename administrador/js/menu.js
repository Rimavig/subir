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
	$("#ciudadela").click(function(event) {
		$('.container-fluid').load('../buscar/ciudadela.php');
	});
	$("#usuarioB").click(function(event) {
		$('.container-fluid').load('../buscar/usuarioB.php');
	});
	$("#usuario").click(function(event) {
		$('.container-fluid').load('../menu/registration.php');
	});
	$("#codigo").click(function(event) {
		$('.container-fluid').load('../menu/generacion.php');
	});
	$("#familia").click(function(event) {
		$('.container-fluid').load('../buscar/VisitantesB.php');
	});
	$("#ingreso").click(function(event) {
		$('.container-fluid').load('../buscar/ingreso.php');
	});
	$("#aprobacion").click(function(event) {
		$('.container-fluid').load('../buscar/aprobacion.php');
	});
	$("#recibidos").click(function(event) {
		$('.container-fluid').load('../invitaciones/TipoInvitaciones.php', {var1:"InvitacionesR"});
	});
	$("#enviados").click(function(event) {
		$('.container-fluid').load('../invitaciones/TipoInvitaciones.php', {var1:"InvitacionesE"});
	});
	$("#invitacion").click(function(event) {
		$('.container-fluid').load('../invitaciones/invitacion.php');
	});
	$("#registroR").click(function(event) {
		$('.container-fluid').load('./registration.php');
	});
	$("#registroV").click(function(event) {
		$('.container-fluid').load('./registrationV.php');
	});
})
//registro Residente
function registrarse() {
	 var tipo="residente";
	 var nombres=document.getElementById("nombres").value;
	 var apellidos=document.getElementById("apellidos").value;
	 var email=document.getElementById("email").value;
	 var contraseña=document.getElementById("contraseña").value;
	 var contraseña1=document.getElementById("contraseña1").value;
	 var cedula=document.getElementById("cedula").value;
	 var celular=document.getElementById("celular").value;
	 var nacimiento=document.getElementById("nacimiento").value;
	 console.log(nacimiento);
	 var sexo=document.getElementById("sexo").value;
	 console.log(sexo);
	 var ciudadel=document.getElementById("ciudadel").value;
	 $(".cont2").hide();
	 $(".cont1").show();
	 $('.cont1').load('../menu/tipoR.php', {
		 tipo:tipo,nombres:nombres,apellidos:apellidos,email:email,
		 contraseña:contraseña,contraseña1:contraseña1,cedula:cedula,
		 celular:celular,nacimiento:nacimiento,sexo:sexo,ciudadel:ciudadel
	 });
}
//registro visitante
function registrarseV() {
	 var tipo="visitante";
	 var nombres=document.getElementById("nombres").value;
	 var apellidos=document.getElementById("apellidos").value;
	 var contraseña=document.getElementById("contraseña").value;
	 var contraseña1=document.getElementById("contraseña1").value;
	 var cedula=document.getElementById("cedula").value;
	 $(".cont2").hide();
	 $(".cont1").show();
	 $('.cont1').load('../menu/tipoR.php', {
		 tipo:tipo,nombres:nombres,apellidos:apellidos,
		 contraseña:contraseña,contraseña1:contraseña1,cedula:cedula
	 });
}
function aceptar($message) {
	 console.log($message);
	 if( $message=="true" ) {
		 $('.container-fluid').load('../menu/main.html');
	 }else{
		 $(".cont1").hide();
		 $(".cont2").show();
	 }
}
function cargar(tipo) {
		console.log('cargar');
		$('.buscar').show();
		$(".cont3").hide();
		if (tipo=='ciudadela') {
			console.log('ciudadela');
			buscar('td:first');
		}else if (tipo=='usuario') {
			console.log('usuario');
			$('.container-fluid').load('../buscar/usuarioB.php');
		}else if (tipo=='visitantes') {
			console.log('visitantes');
			$('.container-fluid').load('../buscar/VisitantesB.php');
		}else if (tipo=='aprobacion') {
			console.log('aprobacion');
			buscar('aprobar');
		}
}
//Escoge el tipo invitaciones enviadas
function Invitaciones() {
		$(".container1").hide();
		$(".contaw").hide();
		$(".Inormal").hide();
}
function InormalE() {
		console.log('InormalE');
		Invitaciones();
		$('.conti2').load('../invitaciones/Invitaciones.php', {var1:"normalE"});
}
function IrecurrenteE() {
		console.log('IrecurrenteE');
		Invitaciones();
		$('.conti2').load('../invitaciones/Invitaciones.php', {var1:"RecurrenteE"});
}
//Escoge el tipo invitaciones Recibidas
function InormalR() {
		console.log('InormalR');
		Invitaciones();
		$('.conti2').load('../invitaciones/Invitaciones.php', {var1:"normalR"});
}
function IrecurrenteR() {
		console.log('IrecurrenteR');
		Invitaciones()
		$('.conti2').load('../invitaciones/invitaciones.php', {var1:"RecurrenteR"});
}
//busca ciudadelas y carga invitaciones
function Binvitaciones(tipo) {
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
function EbuscarN() {
	console.log('EbuscarN');
	Binvitaciones("Ienviadas.php");
}
//carga invitaciones enviadas Recurrentes
function EbuscarR() {
	console.log('EbuscarR');
	Binvitaciones("IenviadasR.php");
}
//Carga invitaciones Recibidas normales
function RbuscarN() {
	console.log('RbuscarN');
	Binvitaciones("Irecibidas.php");
}
//carga invitaciones Recibidas Recurrentes
function RbuscarR() {
	console.log('RbuscarR');
	Binvitaciones("IrecibidasR.php");
}


//Busca ciudadela ,usuarios, visitantes y selecciona
function buscar(tipo) {
		tamaño();
		$("#tciudadela tbody tr").unbind();
		$(".cont3").hide();
		$('.buscar').show();
		$(".usuarios").hide();
		$(".visitantes").hide();
		$(".editar").hide();
		$(".eliminar").hide();
		$(".bloquear").hide();
		$(".permisos").show();
		if(tipo=='td:first'){
			$('.cont1').load('../buscar/usuarios.php', {var1:value});
		  $("#tciudadela tbody tr").click(function(event) {
				$(this).addClass('selected').siblings().removeClass('selected');
				value=$(this).find(tipo).text();
				$('.cont1').load('../buscar/usuarios.php', {var1:value});
		 });
		}else if(tipo=='td:eq(3)'){
		  $("#tciudadela tbody tr").click(function(event) {
				$(this).addClass('selected').siblings().removeClass('selected');
				value=$(this).find(tipo).text()+",usuarios";
				$('.cont1').load('../buscar/usuarios.php', {var1:value});
				});
		}else if(tipo=='td:eq(2)'){
		  $("#tciudadela tbody tr").click(function(event) {
				$(this).addClass('selected').siblings().removeClass('selected');
				value=$(this).find(tipo).text()+",visitantes";
				$('.cont1').load('../buscar/Visitantes.php', {var1:value});
			});
		}else if(tipo=='ingreso'){
		  $("#tciudadela tbody tr").click(function(event) {
				$(this).addClass('selected').siblings().removeClass('selected');
				value=$(this).find('td:first').text()+",ingreso";
				$('.cont1').load('../buscar/Lingreso.php', {var1:value});
			});
		}else if(tipo=='aprobar'){
			$('.cont1').load('../buscar/usuariosA.php', {var1:value});
		  $("#tciudadela tbody tr").click(function(event) {
				$(this).addClass('selected').siblings().removeClass('selected');
				value=$(this).find('td:first').text()+",aprobacion";
				$('.cont1').load('../buscar/usuariosA.php', {var1:value});
			});
		}
}
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
	console.log('#usuarios');
	if(window.matchMedia("(min-width:1400px )").matches){
			document.getElementById("container1").style.width = '1200px';
	}
		$(".cont3").hide();
		$(".cont1").show();
		$("#tusuarios tbody tr").unbind();
		$(".buscar").hide();
		$(".invitados").hide();
		$(".usuarios").show();
	if(tipo=='1'){
		 Susuarios('1');
	}else if(tipo=='2'){
		Susuarios('2');
	}else{
		Susuarios('0');
	}

}
//Boton que abre pagina editar
function editar(tipo) {
	console.log('#editar');
	tamaño();
	$(".usuarios").hide();
	$(".editar").show();
	$(".cont2").show();
	if(tipo=='1'){
		 	$('.cont2').load('../modificar/editarI.php', {var1:value1,var2:value2});
	}else{
		$('.cont2').load('../modificar/editar.php', {var1:value1,var2:value2});
	}

}
//Boton editar
function Beditar(tipo) {
	console.log('Beditar');
	$(".cont3").show();
	$(".editar").hide();
	$(".cont1").hide();
	if(tipo=='1'){
		var nombres=document.getElementById("nombres").value;
		var apellidos=document.getElementById("apellidos").value;
		var cedula=document.getElementById("cedula").value;
		var contraseña=document.getElementById("contraseña").value;
		var value4 = document.getElementById("Mingreso").checked;
		var value3 = nombres.concat(",",apellidos,",",contraseña,",",cedula,",",value4);
		document.getElementById("texto").innerHTML = "SE EDITO CORRECTAMENTE";
		$('.cont2').load('../modificar/editarI.php', {var1:value1,var2:value2,var3:value3});
	}else{
		var nombres=document.getElementById("nombres").value;
		var apellidos=document.getElementById("apellidos").value;
		var email=document.getElementById("email").value;
		var contraseña=document.getElementById("contraseña").value;
		var cedula=document.getElementById("cedula").value;
		var celular=document.getElementById("celular").value;
		var ciudadel=document.getElementById("ciudadel").value;
		var value3 = nombres.concat(",",apellidos,",",email,",",contraseña,",",cedula,",",celular,",",ciudadel);
		console.log(value3);
		document.getElementById("texto").innerHTML = "SE EDITO CORRECTAMENTE";
		$('.cont2').load('../modificar/editar.php', {var1:value1,var2:value2,var3:value3});
	}

}
//Boton que abre pagina eliminar
function eliminar(tipo) {
	console.log('#eliminar');
	tamaño();
	$(".usuarios").hide();
	$(".eliminar").show();
	$(".cont2").show();
	if(tipo=='1'){
				$('.cont2').load('../modificar/eliminarI.php', {var1:value1,var2:value2});
	}else{
			$('.cont2').load('../modificar/eliminar.php', {var1:value1,var2:value2});
	}


}
//Boton eliminar
function Beliminar(tipo) {
	console.log('Beliminar');
	$(".cont3").show();
	$(".eliminar").hide();
	$(".cont1").hide();
	var value3 = "eliminar";
	document.getElementById("texto").innerHTML = "SE ELIMINO CORRECTAMENTE";
	if(tipo=='1'){
			$('.cont2').load('../modificar/eliminarI.php', {var1:value1,var2:value2,var3:value3});
	}else{
			$('.cont2').load('../modificar/eliminar.php', {var1:value1,var2:value2,var3:value3});
	}

}
//Boton que abre pagina bloquear
function bloquear() {
	console.log('#bloquear');
	tamaño();
	$(".usuarios").hide();
	$(".bloquear").show();
	$(".cont2").show();
	$('.cont2').load('../modificar/bloquear.php', {var1:value1,var2:value2});
}
//Boton bloquear
function Bbloquear() {
	console.log('Bbloquear');
	$(".cont3").show();
	$(".bloquear").hide();
	$(".cont1").hide();
	var value3 = "bloquear";
	document.getElementById("texto").innerHTML = "SE BLOQUEO CORRECTAMENTE";
	$('.cont2').load('../modificar/bloquear.php', {var1:value1,var2:value2,var3:value3});
}
//Boton que abre pagina permisos
function permisos(tipo) {
	console.log('#permisos');
	tamaño();
	$(".usuarios").hide();
	$(".permisos").show();
	$(".cont2").show();
	if (tipo=='1') {
		console.log("asdas");
		$('.cont2').load('../modificar/permisosA.php', {var1:value1,var2:value2});
	}else{
		$('.cont2').load('../modificar/permisos.php', {var1:value1,var2:value2});
	}

}

//Boton editar permisos
function Bpermisos(tipo) {
	console.log('Bpermisos');
	$(".cont3").show();
	$(".permisos").hide();
	$(".cont1").hide();
	var value3 = document.getElementById("Minvitacion").checked;
	var value4 = document.getElementById("Mingreso").checked;
	document.getElementById("texto").innerHTML = "SE REALIZO CORRECTAMENTE";
	if (tipo=='1') {
		console.log("asdas");
		$('.cont2').load('../modificar/permisosA.php', {var1:value1,var2:value2,var3:value3,var4:value4});
	}else{
		$('.cont2').load('../modificar/permisos.php', {var1:value1,var2:value2,var3:value3,var4:value4});
	}

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
			if(tipo=='1'){
				value1=$(this).find('td:eq(2)').html();
				value2='Activo';
			}else if (tipo=='0') {
				value1=$(this).find('td:eq(3)').html();
				value2=$(this).find('td:eq(7)').html();
				console.log(value1);
				console.log(value2);
			}else{
				value1=$(this).find('td:eq(2)').html();
				value2=$(this).find('td:eq(4)').html();
				console.log(value1);
				console.log(value2);
			}
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
