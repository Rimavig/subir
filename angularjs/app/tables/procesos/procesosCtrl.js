'use strict';

angular.module('newApp')
  .controller('procesosCtrl', ['$scope','pluginsService', function ($scope ,pluginsService) {
    $(document).ready(function () { 
        $('#beneficio').load('./tables/procesos/tab_beneficio.php',function() {  
        });
        $('#preguntas').load('./tables/procesos/tab_preguntas.php',function() {  
        });
        $('#informacion').load('./tables/procesos/tab_informacion.php',function() {  
        });
        $('#adminAmigos').load('./tables/procesos/adminAmigos.php',function() {  
        });
        $('#adminCumple').load('./tables/procesos/adminCumple.php',function() {  
        });
        $('#adminRegalo').load('./tables/procesos/adminRegalo.php',function() {  
        });
    });    
    $scope.reload = function()
    {
    location.reload(); 
    }
      $scope.$on('$viewContentLoaded', function () {
        //boton principal
        function isValidHttpUrl(string) {
            let url;
            
            try {
              url = new URL(string);
            } catch (_) {
              return false;  
            }
          
            return url.protocol === "http:" || url.protocol === "https:";
          }
        $(document).on('click', '.crearBeneficio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Camigos').load('./tables/procesos/crear_beneficio.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Camigos').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarBeneficio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents('tr').find('#idBeneficio')[0].innerHTML;
            $('#Camigos').load('./tables/procesos/crear_beneficio.php', {id:id},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Camigos').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_beneficio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var beneficio=$(this).parents().find('#Cbeneficio')[0].value;
            var band=true;
            if(beneficio.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese beneficio correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(band){
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"crear",tipo2:"crear_beneficio",beneficio:beneficio},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.editar_beneficio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#id')[0].value;
            var beneficio=$(this).parents().find('#Cbeneficio')[0].value;
            var band=true;
            if(beneficio.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese beneficio correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            
            if(band){
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"editar",tipo2:"editar_beneficio",beneficio:beneficio,id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.crearPregunta', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Camigos').load('./tables/procesos/crear_pregunta.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Camigos').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_pregunta', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var Cpregunta=$(this).parents().find('#Cpregunta')[0].value;
            var Crespuesta=$(this).parents().find('#Crespuesta')[0].value;
            var band=true;
            if(Cpregunta.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese pregunta correcta</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(Crespuesta.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese respuesta correcta</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(band){
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"crear",tipo2:"crear_pregunta",Cpregunta:Cpregunta,Crespuesta:Crespuesta},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.editar_pregunta', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#id')[0].value;
            var Cpregunta=$(this).parents().find('#Cpregunta')[0].value;
            var Crespuesta=$(this).parents().find('#Crespuesta')[0].value;
            var band=true;
            if(Cpregunta.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese pregunta correcta</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(Crespuesta.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese respuesta correcta</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(band){
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"editar",tipo2:"editar_pregunta",Cpregunta:Cpregunta,Crespuesta:Crespuesta,id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.editarPregunta', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents('tr').find('#idPregunta')[0].innerHTML;
            $('#Camigos').load('./tables/procesos/crear_pregunta.php', {id:id},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Camigos').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editar_informacion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var informacionT=$(this).parents().find('#informacionT')[0].value;
            var band=true;
            if(informacionT.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese información correcta</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(band){
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"editar",tipo2:"editar_informacion",informacionT:informacionT},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.editar_contacto', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var nombres=$(this).parents().find('#nombres')[0].value;
            var celular=$(this).parents().find('#celular')[0].value;
            var telefono=$(this).parents().find('#telefono')[0].value;
            var correo=$(this).parents().find('#correo')[0].value;
            var pagina=$(this).parents().find('#pagina')[0].value;
            var facebook=$(this).parents().find('#facebook')[0].value;
            var instagram=$(this).parents().find('#instagram')[0].value;
            var direccion=$(this).parents().find('#direccion')[0].value;
            var twitter=$(this).parents().find('#twitter')[0].value;
            var Whatsapp=$(this).parents().find('#Whatsapp')[0].value;
            var Youtube=$(this).parents().find('#Youtube')[0].value;
            var Linkedin=$(this).parents().find('#Linkedin')[0].value;
            var band=true;
            if(nombres.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombres correctos</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(direccion.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese dirección correcta</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(celular.length!=10){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese celular correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(telefono.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese telefono correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(!isValidHttpUrl(pagina)){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese pagina web correcta</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(!isValidHttpUrl(facebook)){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese facebook correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(!isValidHttpUrl(instagram)){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese instagram correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(!isValidHttpUrl(twitter)){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese twitter correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(!isValidHttpUrl(Whatsapp)){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese Whatsapp correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(!isValidHttpUrl(Youtube)){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese Youtube correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(!isValidHttpUrl(Linkedin)){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese Linkedin correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            //Se muestra un texto a modo de ejemplo, luego va a ser un icono
            if (!emailRegex.test(correo)) {
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese correo correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            
            if(band){
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"editar",tipo2:"editar_contacto",nombres:nombres,celular:celular,telefono:telefono,correo:correo,pagina:pagina,facebook:facebook,instagram:instagram,direccion:direccion,direccion:direccion,twitter:twitter, Linkedin:Linkedin,Youtube:Youtube, Whatsapp:Whatsapp },function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.editar_fundacion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var nombres=$(this).parents().find('#nombres')[0].value;
            var descripcion1=$(this).parents().find('#descripcion1')[0].value;
            var descripcion2=$(this).parents().find('#descripcion2')[0].value;
            var precio1=$(this).parents().find('#precio1')[0].value;
            var precio2=$(this).parents().find('#precio2')[0].value;
            var precio3=$(this).parents().find('#precio3')[0].value;
            var precio4=$(this).parents().find('#precio4')[0].value;
            var precio5=$(this).parents().find('#precio5')[0].value;
            var precio6=$(this).parents().find('#precio6')[0].value;
            var band=true;
            if(nombres.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombres correctos</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(descripcion1.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese descripcion1 correcta</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(descripcion2.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese descripcion2 correcta</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(precio1 < 1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese precio1 correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(precio2 < 1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese precio2 correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(precio3 < 1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese precio3 correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(precio4 < 1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese precio4 correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(precio5 < 1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese precio5 correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(precio6 < 1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese precio6 correcto</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
                    theme       : 'made',
                    type        : 'error',
                    maxVisible  : 5,
                    animation   : {
                        open  : 'animated bounceIn',
                        close : 'animated bounceOut'
                    },
                    timeout: 3000,
                });
                band=false;
            }
            if(band){
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"editar",tipo2:"editar_fundacion",nombres:nombres,descripcion1:descripcion1,descripcion2:descripcion2,precio1:precio1,precio2:precio2,precio3:precio3,precio4:precio4,precio5:precio5,precio6:precio6},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        //boton e
        //boton eliminar
        $(document).on('click', '.eliminarBeneficio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idBeneficio')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"eliminar",tipo2:"eliminarBeneficio", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
        //boton eliminar
        $(document).on('click', '.eliminarPregunta', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idPregunta')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"eliminar",tipo2:"eliminarPregunta", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
        $(document).on('click', '.adminAmigosB', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var puntos=$(this).parents().find('#puntos')[0].value;
            var recibe=$(this).parents().find('#recibe')[0].value;
            if (confirm("Estas seguro de actualizar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"adminAmigosB",tipo2:"", id:"1",factor:puntos,descuento:recibe},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
        $(document).on('click', '.adminCumpleB', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var cumple=$(this).parents().find('#cumple')[0].value;
            if (confirm("Estas seguro de actualizar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"adminAmigosB",tipo2:"", id:"2",factor:"",descuento:cumple},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
        $(document).on('click', '.adminRegaloB', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var regalo=$(this).parents().find('#regalo')[0].value;
            if (confirm("Estas seguro de actualizar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"adminAmigosB",tipo2:"", id:"3",factor:"",descuento:regalo},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });

      });

      $scope.$on('$destroy', function () {
        $('#table-editable').DataTable().clear().destroy();
        var tables = $.fn.dataTable.fnTables(true);
        $(tables).each(function () {
            $(this).dataTable().fnDestroy();
        });
        $(document).off('click','.crearBeneficio');
        $(document).off('click','.editarBeneficio');
        $(document).off('click','.crear_beneficio');
        $(document).off('click','.editar_beneficio');
        $(document).off('click','.crearPregunta');
        $(document).off('click','.crear_pregunta');
        $(document).off('click','.editar_pregunta');
        $(document).off('click','.editarPregunta');
        $(document).off('click','.editar_informacion');
        $(document).off('click','.editar_contacto');
        $(document).off('click','.editar_fundacion');
        $(document).off('click','.eliminarBeneficio');
        $(document).off('click','.eliminarPregunta');
        $(document).off('click','.adminAmigos');
        $(document).off('click','.adminCumple');
        $(document).off('click','.adminRegalo');
      });
  }]);
