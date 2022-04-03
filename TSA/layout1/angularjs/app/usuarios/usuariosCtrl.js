'use strict';

angular.module('newApp')
  .controller('usuariosCtrl', ['$scope','pluginsService', function ($scope,pluginsService) {
    var oTable;
    $(document).ready(function () {
    
        $('table').each(function () {
            if ($.fn.dataTable.isDataTable($(this))) {
                oTable =$(this).dataTable();
            }
        });
    });
    $scope.$on('$viewContentLoaded', function () {
    //PERFIL USUARIOS ADMINISTRADORES    
        //boton principal
        $(document).on('click', '.editar', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('#fila0')[0];
            console.log(estado.innerHTML);
            $('.page-spinner-loader').removeClass('hide');
            $('#usuarios').load('./usuarios/editar_usuario.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#usuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Cusuarios').load('./usuarios/crear_usuario.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cusuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarV', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('#fila0')[0];
            console.log(estado.innerHTML);
            $('.page-spinner-loader').removeClass('hide');
            $('#usuarios').load('./usuarios/editar_visitante.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#usuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crearV', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Cusuarios').load('./usuarios/crear_visitante.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cusuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        //boton Secundario
        $(document).on('click', '.editar_usuario', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#id')[0].value;
            var nombres=$(this).parents().find('#Enombres')[0].value;
            var apellidos=$(this).parents().find('#Eapellidos')[0].value;
            var ciudadela=$(this).parents().find('#Eciudadela')[0].value;
            var cedula=$(this).parents().find('#Ecedula')[0].value;
            var celular=$(this).parents().find('#Ecelular')[0].value;
            var correo=$(this).parents().find('#Ecorreo')[0].value;
            var estado=$(this).parents().find('#EboxI')[0];
            var estado1=$(this).parents().find('#EboxV')[0];
            var ingreso="";
            var invitacion="";
            var band=true;
            if(estado.checked) {
                ingreso="A";
            }else{
                ingreso="I";
            }   
            if(estado1.checked) {
                invitacion="S";
            }else{
                invitacion="N";
            } 
            if(nombres.length<3){
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un nombre correcto</p></div>',
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
            if(apellidos.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un apellido correcto</p></div>',
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
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./usuarios/alerta.php', {tipo:"editar",id:id, nombres:nombres,apellidos:apellidos,cedula:cedula,celular:celular,correo:correo,ingreso:ingreso, invitacion:invitacion},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false);
            }
           
           // 
        });
        $(document).on('click', '.crear_usuario', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var nombres=$(this).parents().find('#nombres')[0].value;
            var apellidos=$(this).parents().find('#apellidos')[0].value;
            var ciudadela=$(this).parents().find('#ciudadela')[0].value;
            var cedula=$(this).parents().find('#cedula')[0].value;
            var celular=$(this).parents().find('#celular')[0].value;
            var correo=$(this).parents().find('#correo')[0].value;
            var estado=$(this).parents().find('#boxI')[0];
            var estado1=$(this).parents().find('#boxV')[0];
            var ingreso="";
            var invitacion="";
            var band=true;
            if(estado.checked) {
                ingreso="A";
            }else{
                ingreso="I";
            }   
            if(estado1.checked) {
                invitacion="S";
            }else{
                invitacion="N";
            } 
            if(nombres.length<3){
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un nombre correcto</p></div>',
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
            if(apellidos.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un apellido correcto</p></div>',
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
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./usuarios/alerta.php', {tipo:"crear", nombres:nombres,apellidos:apellidos,ciudadela:ciudadela, cedula:cedula,celular:celular,correo:correo,ingreso:ingreso, invitacion:invitacion},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.editar_visitante', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#id')[0].value;
            var nombres=$(this).parents().find('#Enombres')[0].value;
            var apellidos=$(this).parents().find('#Eapellidos')[0].value;
            var celular=$(this).parents().find('#Ecelular')[0].value;
            var contrasena=$(this).parents().find('#Econtrasena')[0].value;
            var band=true; 
            if(nombres.length<3){
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un nombre correcto</p></div>',
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
            if(apellidos.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un apellido correcto</p></div>',
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
            if(band){
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./usuarios/alerta.php', {tipo:"editarV",id:id, nombres:nombres,apellidos:apellidos,celular:celular, contrasena:contrasena},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false);
            }
           
           // 
        });
        $(document).on('click', '.crear_visitante', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var nombres=$(this).parents().find('#nombres')[0].value;
            var apellidos=$(this).parents().find('#apellidos')[0].value;
            var celular=$(this).parents().find('#celular')[0].value;
            var contrasena=$(this).parents().find('#contrasena')[0].value;
            var band=true;
            console.log(nombres);
            console.log(contrasena);
            if(nombres.length<3){
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un nombre correcto</p></div>',
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
            if(apellidos.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un apellido correcto</p></div>',
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
            if(contrasena.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese una contraseña mayor de 5 caracteres</p></div>',
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
            
            if(band){
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./usuarios/alerta.php', {tipo:"crearV", nombres:nombres,apellidos:apellidos,celular:celular, contrasena:contrasena},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false);
            }
        });
        //boton cancela la creación
        $(document).on('click', '.estado', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;      
            if (confirm("Estas seguro de Resetear Contraseña?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./usuarios/alerta.php', {tipo:"estado", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                  // estado.checked = false;
                   //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                  //  oTable.fnDraw();
                });
            }
            
        });
        $(document).on('click', '.estadoV', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;      
            var estado=$(this).parents('tr').find('#box')[0];      
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./usuarios/alerta.php', {tipo:"estadoV", estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./usuarios/alerta.php', {tipo:"estadoV", estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                    
                }
            }
            
        });
        //boton eliminar
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./usuarios/alerta.php', {tipo:"eliminar", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
        });
        $(document).on('click', '.deleteV', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./usuarios/alerta.php', {tipo:"eliminarV", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
        });
    });

      $scope.$on('$destroy', function () {
        $('table').each(function () {
            if ($.fn.dataTable.isDataTable($(this))) {
                $(this).dataTable({
                    "bDestroy": true
                }).fnDestroy();
            }
            
        });
        $(document).off('click','.editar');
        $(document).off('click','.crear');
        $(document).off('click','.editar_usuario');
        $(document).off('click','.crear_usuario');
        $(document).off('click','.estado');
        $(document).off('click','.delete');
        $(document).off('click','.editarV');
        $(document).off('click','.crearV');
        $(document).off('click','.editar_visitante');
        $(document).off('click','.crear_visitante');
        $(document).off('click','.estadoV');
        $(document).off('click','.deleteV');
    
      });
  }]);
