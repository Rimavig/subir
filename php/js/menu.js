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
		$('.menu_P').click(function(){
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
var count=0;
var interval;
//Codigo que cambia el qr
function mensaje(texto) {
	var d = new Date();
  var t = d.toLocaleTimeString();
 	console.dir(t);
	count++;
	$('.container-fluid').load('usuarioB.php');
}
//Crea codigo para Residente cada 5s
//Residente
function intervalo(tipo) {
	if (tipo!="A") {
			$('.container-fluid').load('mensaje.php');
	}else {
		if (count==0) {
	        mensaje();
					if (interval) {
								clearInterval(interval);
					}
					interval=setInterval(mensaje,5000);
	  }	else{
			if (interval) {
		        clearInterval(interval);
		  }
		 	interval=setInterval(mensaje,5000);
		}
	}


 }
 //Carga las invitaciones Recurrentes al invitado
 //Invitado
function intervaloV(tipo) {
	clearInterval(interval);
	count=0;
	if (tipo!="A") {
			$('.container-fluid').load('mensaje.php');
	}else {
		$('.container-fluid').load('InvitacionA.php');
	}
}
//Compartir imagen
//Residente
function compartir() {
	 window.open('test.png');
}

//Crea Invitacion normal
//Residente
function invitacionN(tipo) {
	 	clearInterval(interval);
		 count=0;
		 	if (tipo=="N") {
	 			$('.container-fluid').load('mensaje.php');
	 	}else {
			 window.location.href='invitacionN.php';
	 	}
}
//Crea Invitacion Recurrente
//Residente
function invitacionR(tipo) {
		clearInterval(interval);
		count=0;
		 if (tipo=="N") {
				 $('.container-fluid').load('mensaje.php');
		 }else {
				window.location.href='invitacionR.php';
		 }
}
//Tipo de registro
function tipo1() {
 	 	$('.container').load('tipo1.php');
}
//Carga Registro
function registrar() {
	 var ciudadela=document.getElementById("tipo").value;
	 if (ciudadela=="Residente") {
  	  window.location.href='registration.php';
	 }else {
  	 window.location.href='registrationV.php';
	 }

}
//Genera codigo para invitado recurrente dependiendo de la invitacion Activa
//Invitado
function codigo(tipo) {
	if (tipo=="Activa") {
		if (count==0) {
					mensaje();
					if (interval) {
								clearInterval(interval);
					}
					interval=setInterval(mensaje,5000);
		}	else{
			if (interval) {
						clearInterval(interval);
			}
			interval=setInterval(mensaje,5000);
		}
	}else {
			alert("Esta Invitación no esta Activa");
	}
}
//Para qr
function limpiar() {
	clearInterval(interval);
	count=0;
}
//Perfil de Residente
//Residente
function perfil(tipo) {
	 clearInterval(interval);
	 count=0;
	 console.log(tipo);
	 if (tipo=="Visitante") {
	 			 window.location.href='perfilV.php';
	 }else{
		 		 window.location.href='perfil.php';
	 }

}
//Tipo de menu
function menu(ciudadela) {
		clearInterval(interval);
		count=0;
		if (ciudadela=="Visitante") {
			window.location.href='mainV.php';
		}else{
			console.log(ciudadela);
			window.location.href='main.php';
		}
}
//Carga el inicio cuando hace login
function inicio(id,tipo) {
			console.log(id);
			console.log(tipo);
			if (tipo=="0") {
				window.location.href='index.php';
			}else if  (tipo=="1") {
					console.log(tipo);
					var ciudadela=document.getElementById("ciudadela").value;
					if (ciudadela=="Visitante") {
						window.location.href='mainV.php?ciudadela='+ciudadela;
					}else{
						console.log(ciudadela);
						window.location.href='main.php?ciudadela='+ciudadela;
					//	$(location).href('http://address.com', {var1:id,var2:ciudadela})
					}
			}
}
//Login
function login() {
	console.log('#login');
	var nombres=document.getElementById("username").value;
	var apellidos=document.getElementById("password").value;
	$('.container').load('tipo.php', {var1:nombres,var2:apellidos});
}

//Boton editar
function login1(tipo) {
	console.log('inicio');
	if( tipo.length>1 ) {
    console.log($message);
    console.log($message.length);
    $('.container').load('tipo.php', {var1:$message});
    alert('Bienvenido');

  } else if ( $message=="" ) {
    alert('Los datos ingresados son incorrectos');
  }
}
//ajusta tamaño
function tamaño() {
	if(window.matchMedia("(min-width:1000px )").matches){
			document.getElementById("container1").style.width = '800px';
	}
}
//span
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
