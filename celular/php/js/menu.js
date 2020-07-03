
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
function navx(navt,navy) {
			$(navt).animate({
				left: navy
			});
}
function menu_bar(){
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

}
function menu1_bar(){
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
		menu_P();
}
function menu2_bar(){
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
}
function menu3_bar(){
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
		menu_P();
}
function menu4_bar(){
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
			menu_P();
}
function menu_P(){
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
}


var count=0;
var interval;
//Codigo que cambia el qr
function mensaje(texto) {
	$('html, body').animate({scrollTop:0}, 'slow');
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
		menu_P();

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
			menu1_bar();
}
//Compartir imagen
//Residente
function compartir() {
	 window.open('test.png');
}
function compartir1(tipo) {
	console.log(tipo);
	 window.open("https://api.whatsapp.com/send?text=" + encodeURIComponent(tipo));
}
function salir() {
	$('html, body').animate({scrollTop:0}, 'slow');
	$('.container-fluid').load('base.php');
}
//Crea Invitacion normal
//Residente
function invitacionN(tipo) {
		$('html, body').animate({scrollTop:0}, 'slow');
	 	clearInterval(interval);
		 count=0;
		 	if (tipo=="N") {
	 			$('.container-fluid').load('mensaje.php');
	 	}else {
			$('.container-fluid').load('invitacionN.php');
	 	}
		menu_P();
}
//Cargo invitacion Normal
function enviarN() {
	$('html, body').animate({scrollTop:0}, 'slow');
	var nombres=document.getElementById("nombres").value;
	var apellidos=document.getElementById("apellidos").value;
	var email=document.getElementById("email").value;
		$(".container1").hide();
		$('.invitacion-enviar').load('enviar.php',{nombres:nombres,apellidos:apellidos,email:email});
		$(".invitacion-enviar").show();
}
function enviarR() {
	$('html, body').animate({scrollTop:0}, 'slow');
	var nombres=document.getElementById("nombres").value;
	var apellidos=document.getElementById("apellidos").value;
	var email=document.getElementById("email").value;
	var cedula=document.getElementById("cedula").value;
	var inicio=document.getElementById("inicio").value;
	var termino=document.getElementById("termino").value;
	var tiempo="";
	if( inicio < termino ) {
		tiempo="bien";
	} else{
	  tiempo="mal";
	}
		$(".container1").hide();
		$('.invitacion-enviar').load('enviarR.php',{nombres:nombres,apellidos:apellidos,email:email,cedula:cedula,inicio:inicio,termino:termino,tiempo:tiempo});
		$(".invitacion-enviar").show();
}
//Crea Invitacion Recurrente
//Residente
function invitacionR(tipo) {
		$('html, body').animate({scrollTop:0}, 'slow');
		clearInterval(interval);
		count=0;
		 if (tipo=="N") {
				 $('.container-fluid').load('mensaje.php');
		 }else {
			 $('.container-fluid').load('invitacionR.php');
		 }
		 	menu_P();
}
//Tipo de registro
function tipo1() {
	  $('html, body').animate({scrollTop:0}, 'slow');
 	 	$('.container-fluid').load('tipo1.php');
}
//Carga Registro
function registrar() {
	 $('html, body').animate({scrollTop:0}, 'slow');
	 var ciudadela=document.getElementById("tipo").value;
	  $(".cont1").hide();
	 if (ciudadela=="Residente") {
		 	$('.container-fluid').load('registration.php');
	 }else {
  	 $('.container-fluid').load('registrationV.php');
	 }

}
//Validar registro
function registrarse() {
	$('html, body').animate({scrollTop:0}, 'slow');
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
	 var ciudadela=document.getElementById("ciudadela").value;
	 $(".cont2").hide();
	 $(".cont1").show();
	 $('.cont1').load('tipoR.php', {
		 tipo:tipo,nombres:nombres,apellidos:apellidos,email:email,
		 contraseña:contraseña,contraseña1:contraseña1,cedula:cedula,
		 celular:celular,nacimiento:nacimiento,sexo:sexo,ciudadela:ciudadela
	 });
}
function registrarseV() {
	$('html, body').animate({scrollTop:0}, 'slow');
	 var tipo="visitante";
	 var nombres=document.getElementById("nombres").value;
	 var apellidos=document.getElementById("apellidos").value;
	 var contraseña=document.getElementById("contraseña").value;
	 var contraseña1=document.getElementById("contraseña1").value;
	 var cedula=document.getElementById("cedula").value;
	 $(".cont2").hide();
	 $(".cont1").show();
	 $('.cont1').load('tipoR.php', {
		 tipo:tipo,nombres:nombres,apellidos:apellidos,
		 contraseña:contraseña,contraseña1:contraseña1,cedula:cedula
	 });
}
//Validar registro
function aceptar($message) {
	$('html, body').animate({scrollTop:0}, 'slow');
	 console.log($message);
	 if( $message=="true" ) {
		 $('.container-fluid').load('login.php');
	 }else{
		 $(".cont1").hide();
		 $(".cont2").show();
	 }
}
//Validar invitación
function aceptar1($message) {
		$('html, body').animate({scrollTop:0}, 'slow');
	 console.log($message);
	 if( $message=="true" ) {
		 $('.container-fluid').load('base.php');
	 }else{
		 $(".invitacion-enviar").hide();
		 $(".container1").show();
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
  window.location.href='login.php';
	count=0;
}
//Perfil de Residente
//Residente
function perfil(tipo) {
	$('html, body').animate({scrollTop:0}, 'slow');
	 clearInterval(interval);
	 count=0;
	 console.log(tipo);
	 if (tipo=="Visitante") {
		 	$('.container-fluid').load('perfilV.php');
	 }else{
		 	$('.container-fluid').load('perfil.php');
	 }
	 menu4_bar();
}
//Tipo de menu
function menu(ciudadela) {
	$('html, body').animate({scrollTop:0}, 'slow');
		clearInterval(interval);
		count=0;
		if (ciudadela=="Visitante") {
			$('.container-fluid').load('base.php', {ciudadela:ciudadela});
		}else{
			console.log(ciudadela);
				$('.container-fluid').load('base.php', {ciudadela:ciudadela});
		}
			menu_P();
}
//Carga el inicio cuando hace login
function inicio(id,tipo) {
		$('html, body').animate({scrollTop:0}, 'slow');
		console.log(id);
		console.log(tipo);
		if (tipo=="0") {
			$('.container-fluid').load('login1.php');
		}else if  (tipo=="1") {
				console.log(tipo);
				var ciudadela=document.getElementById("ciudadela").value;
				if (ciudadela=="Visitante") {
					$(".menu_visitante").show();
					$('.body-fluid').load('mainV.php', {ciudadela:ciudadela});
				}else{
					$(".menu_residente").show();
					$('.body-fluid').load('main.php', {ciudadela:ciudadela});
				}
		}
}
//Login
function login() {
	$('html, body').animate({scrollTop:0}, 'slow');
	console.log('#login');
	var nombres=document.getElementById("username").value;
	var apellidos=document.getElementById("password").value;
	$('.container-fluid').load('tipo.php', {var1:nombres,var2:apellidos});
}

//Boton editar
function login1(tipo) {
	$('html, body').animate({scrollTop:0}, 'slow');
	console.log('inicio');
	if( tipo.length>1 ) {
    console.log($message);
    console.log($message.length);
    $('.container-fluid').load('tipo.php', {var1:$message});

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
             if (searchText.length == 0 || compareWith.loginOf(searchText) > -1) {
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
