'use strict';

angular.module('newApp')
  .controller('usuariosCtrl', ['$scope','pluginsService', function ($scope,pluginsService) {
    var oTable;
    setTimeout(function(){
        handleiCheck();
    },200);
    $scope.reload = function()
    {
    location.reload(); 
    }
    $scope.$on('$viewContentLoaded', function () {
    //PERFIL USUARIOS ADMINISTRADORES    
        //boton principal
        $(document).on('click', '.editar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            console.log(estado.innerHTML);
            $('.page-spinner-loader').removeClass('hide');
            $('#Cusuarios').load('./tables/usuarios/editar_usuario.php', {var1:estado.innerHTML, tipo:"admin"},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cusuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Cusuarios').load('./tables/usuarios/crear_usuario.php',{tipo:"admin"},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cusuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.facturacion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var estado=$(this).parents('tr').find('.hide_column')[0];
            $('#factura').load('./tables/usuarios/facturacion.php',{var1:estado.innerHTML,tipo:"admin"},function() {   
                $('.clientes').addClass('hide'); 
                $('.factura').removeClass('hide'); 
                $('.page-spinner-loader').addClass('hide');
               $("#table-editable1").dataTable({ "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }, 
                "ajax": "tables/usuarios/facturacion-data.php?var1="+estado.innerHTML,
                "ordering": false,
                "autoWidth": false,
                "dom": "<'row'<'col-xs-6 col-sm-4 col-md-6 tabla-estilo 'l><'col-xs-6 col-sm-5 col-md-5 tabla-estilo'f><'col-xs-6 col-sm-5 col-md-6 tabla-estilo1'B>r>t<'row'<'col-xs-12 col-sm-6 col-md-6 tabla-estilo'i><'spcol-md-6an6'p>>",
                "buttons" :[
                    {
                        text: '<i class="fa fa-refresh"></i>',
                        "className": 'btn btn-default',
                        action: function () {
                            table.ajax.reload();
                        }
                    }                                       
                ],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                         "className": "hide_column"
                     }
                ]});
            }); 
            $(this).prop("disabled",false);
        });
        //boton Secundario
        $(document).on('click', '.editar_usuario', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#id')[0].value;
            var nombres=$(this).parents().find('#nombres')[0].value;
            var apellidos=$(this).parents().find('#apellidos')[0].value;
            var usuario=$(this).parents().find('#usuario')[0].value;
            var cedula=$(this).parents().find('#cedula')[0].value;
            var celular=$(this).parents().find('#celular')[0].value;
            var correo=$(this).parents().find('#correo')[0].value;
            var sexo=$(this).parents().find('#sexo')[0].value;
            var direccion=$(this).parents().find('#direccion')[0].value;
            var fecha=$(this).parents().find('#fecha')[0].value;
            var perfil=$(this).parents().find('#perfil')[0].value;
            var band=true;
            if(nombres.length<3){
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
            if(apellidos.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese apellidos correctos</p></div>',
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
            if(usuario.length<4){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese usuario correcto</p></div>',
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
            if(cedula.length!=10){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese cédula correcta</p></div>',
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
            if(fecha==""){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese fecha correcta</p></div>',
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
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"editar",id:id, nombres:nombres,apellidos:apellidos,usuario:usuario,cedula:cedula,celular:celular,correo:correo,sexo:sexo,direccion:direccion,fecha:fecha,perfil:perfil},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.crear_usuario', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var nombres=$(this).parents().find('#nombres')[0].value;
            var apellidos=$(this).parents().find('#apellidos')[0].value;
            var usuario=$(this).parents().find('#usuario')[0].value;
            var cedula=$(this).parents().find('#cedula')[0].value;
            var celular=$(this).parents().find('#celular')[0].value;
            var correo=$(this).parents().find('#correo')[0].value;
            var sexo=$(this).parents().find('#sexo')[0].value;
            var direccion=$(this).parents().find('#direccion')[0].value;
            var fecha=$(this).parents().find('#fecha')[0].value;
            var perfil=$(this).parents().find('#perfil')[0].value;
            var band=true;
            if(nombres.length<3){
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
            if(apellidos.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese apellidos correctos</p></div>',
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
            if(usuario.length<4){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese usuario correcto</p></div>',
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
            if(cedula.length!=10){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese cédula correcta</p></div>',
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
            if(fecha==""){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese fecha correcta</p></div>',
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
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"crear", nombres:nombres,apellidos:apellidos,usuario:usuario,cedula:cedula,celular:celular,correo:correo,sexo:sexo,direccion:direccion,fecha:fecha,perfil:perfil},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
            
          //  $(this).prop("disabled",false);
        });
        //boton cancela la creación
        $(document).on('click', '.estado', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            console.log(id);
            var estado=$(this).parents('tr').find('#box')[0];
            var nRow = $(this).parents('tr')[0];          
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estado", estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                      // estado.checked = false;
                       //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                      //  oTable.fnDraw();
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estado", estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                      //  estado.checked = true;
                      //  oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" checked disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">On</span> </label>', nRow, 6, false);
                      //  oTable.fnDraw();    
                    });
                    
                }
            }
            
        });
        //boton eliminar
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estado", estado:"B", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                  // estado.checked = false;
                   //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                  //  oTable.fnDraw();
                });
            }
           // $(this).prop("disabled",false);
        });
         //boton clave
         $(document).on('click', '.clave', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if (confirm("Estas seguro de resetear clave?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estado", estado:"C", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                    
                  // estado.checked = false;
                   //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                  //  oTable.fnDraw();
                });
            }
          //  $(this).prop("disabled",false);
        });
    //PERFIL USUARIOS CLIENTES   

        //boton principal
        $(document).on('click', '.editarC', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            console.log(estado.innerHTML);
            $('.page-spinner-loader').removeClass('hide');
            $('#Cusuarios').load('./tables/usuarios/editar_usuarioClientes.php', {var1:estado.innerHTML, tipo:"cliente"},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cusuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crearC', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Cusuarios').load('./tables/usuarios/crear_usuarioClientes.php',{tipo:"cliente"},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cusuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        //boton Secundario
        $(document).on('click', '.editar_usuarioC', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#id')[0].value;
            var nombres=$(this).parents().find('#nombres')[0].value;
            var apellidos=$(this).parents().find('#apellidos')[0].value;
            var usuario=$(this).parents().find('#usuario')[0].value;
            var cedula=$(this).parents().find('#cedula')[0].value;
            var celular=$(this).parents().find('#celular')[0].value;
            var correo=$(this).parents().find('#correo')[0].value;
            var sexo=$(this).parents().find('#sexo')[0].value;
            var direccion=$(this).parents().find('#direccion')[0].value;
            var fecha=$(this).parents().find('#fecha')[0].value;
            var estado=$(this).parents().find('#boxA')[0];
            var amigos="";

            if(estado.checked) {
                amigos="S";
            }else{
                amigos="N";
            }   
            var band=true;
            if(nombres.length<3){
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
            if(apellidos.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese apellidos correctos</p></div>',
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
            if(usuario.length<4){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese usuario correcto</p></div>',
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
            if(cedula.length!=10){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese cédula correcta</p></div>',
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
            if(fecha==""){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese fecha correcta</p></div>',
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
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"editarC",id:id, nombres:nombres,apellidos:apellidos,usuario:usuario,cedula:cedula,celular:celular,correo:correo,sexo:sexo,direccion:direccion,fecha:fecha,amigos:amigos},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.crear_usuarioC', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var nombres=$(this).parents().find('#nombres')[0].value;
            var apellidos=$(this).parents().find('#apellidos')[0].value;
            var usuario=$(this).parents().find('#usuario')[0].value;
            var cedula=$(this).parents().find('#cedula')[0].value;
            var celular=$(this).parents().find('#celular')[0].value;
            var correo=$(this).parents().find('#correo')[0].value;
            var sexo=$(this).parents().find('#sexo')[0].value;
            var direccion=$(this).parents().find('#direccion')[0].value;
            var fecha=$(this).parents().find('#fecha')[0].value;
            var estado=$(this).parents().find('#box')[0];
            var amigos="";
            if(estado.checked) {
                amigos="S";
            }else{
                amigos="N";
            }
            var band=true;
            if(nombres.length<3){
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
            if(apellidos.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese apellidos correctos</p></div>',
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
            if(usuario.length<4){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese usuario correcto</p></div>',
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
            if(cedula.length!=10){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese cédula correcta</p></div>',
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
            if(fecha==""){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese fecha correcta</p></div>',
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
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"crearC", nombres:nombres,apellidos:apellidos,usuario:usuario,cedula:cedula,celular:celular,correo:correo,sexo:sexo,direccion:direccion,fecha:fecha,amigos:amigos},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }   
           
          //  $(this).prop("disabled",false);
        });    
        //boton cancela la creación
        $(document).on('click', '.estadoC', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            console.log(id);
            var estado=$(this).parents('tr').find('#box')[0];
            var nRow = $(this).parents('tr')[0];          
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoC", estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                      // estado.checked = false;
                       //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                      //  oTable.fnDraw();
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoC", estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                      //  estado.checked = true;
                      //  oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" checked disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">On</span> </label>', nRow, 6, false);
                      //  oTable.fnDraw();    
                    });
                    
                }
            }
          
        });
        //boton eliminar
        $(document).on('click', '.deleteC', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoC", estado:"B", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                  // estado.checked = false;
                   //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                  //  oTable.fnDraw();
                });
            }
          //  $(this).prop("disabled",false);
        });
        //boton clave
        $(document).on('click', '.claveC', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if (confirm("Estas seguro de resetear clave?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoC", estado:"C", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                  // estado.checked = false;
                   //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                  //  oTable.fnDraw();
                });
            }
          //  $(this).prop("disabled",false);
        });
        $(document).on('click', '.correoR', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            $('.page-spinner-loader').removeClass('hide');
            $('#alerta').load('./tables/reportes/alerta.php', {tipo:"UclienteV", id:id},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
        });
    //PERFIL USUARIOS EVENTOS    
        //boton principal
        $(document).on('click', '.editarE', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            console.log(estado.innerHTML);
            $('.page-spinner-loader').removeClass('hide');
            $('#Cusuarios').load('./tables/usuarios/editar_usuario.php', {var1:estado.innerHTML, tipo:"evento"},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cusuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crearE', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Cusuarios').load('./tables/usuarios/crear_usuario.php',{tipo:"evento"},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cusuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        //boton Secundario
        $(document).on('click', '.editar_usuarioE', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#id')[0].value;
            var nombres=$(this).parents().find('#nombres')[0].value;
            var apellidos=$(this).parents().find('#apellidos')[0].value;
            var usuario=$(this).parents().find('#usuario')[0].value;
            var cedula=$(this).parents().find('#cedula')[0].value;
            var celular=$(this).parents().find('#celular')[0].value;
            var correo=$(this).parents().find('#correo')[0].value;
            var sexo=$(this).parents().find('#sexo')[0].value;
            var direccion=$(this).parents().find('#direccion')[0].value;
            var fecha=$(this).parents().find('#fecha')[0].value;
            var perfil=$(this).parents().find('#perfil')[0].value;
            var band=true;
            if(nombres.length<3){
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
            if(apellidos.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese apellidos correctos</p></div>',
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
            if(usuario.length<4){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese usuario correcto</p></div>',
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
            if(cedula.length!=10){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese cédula correcta</p></div>',
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
            if(fecha==""){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese fecha correcta</p></div>',
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
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"editarE",id:id, nombres:nombres,apellidos:apellidos,usuario:usuario,cedula:cedula,celular:celular,correo:correo,sexo:sexo,direccion:direccion,fecha:fecha,perfil:perfil},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }   
           
        //    $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_usuarioE', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var nombres=$(this).parents().find('#nombres')[0].value;
            var apellidos=$(this).parents().find('#apellidos')[0].value;
            var usuario=$(this).parents().find('#usuario')[0].value;
            var cedula=$(this).parents().find('#cedula')[0].value;
            var celular=$(this).parents().find('#celular')[0].value;
            var correo=$(this).parents().find('#correo')[0].value;
            var sexo=$(this).parents().find('#sexo')[0].value;
            var direccion=$(this).parents().find('#direccion')[0].value;
            var fecha=$(this).parents().find('#fecha')[0].value;
            var perfil=$(this).parents().find('#perfil')[0].value;
            var band=true;
            if(nombres.length<3){
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
            if(apellidos.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese apellidos correctos</p></div>',
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
            if(usuario.length<4){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese usuario correcto</p></div>',
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
            if(cedula.length!=10){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese cédula correcta</p></div>',
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
            if(fecha==""){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese fecha correcta</p></div>',
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
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"crearE", nombres:nombres,apellidos:apellidos,usuario:usuario,cedula:cedula,celular:celular,correo:correo,sexo:sexo,direccion:direccion,fecha:fecha,perfil:perfil},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }  
            
          //  $(this).prop("disabled",false);
        });
        //boton cancela la creación
        $(document).on('click', '.estadoE', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            console.log(id);
            var estado=$(this).parents('tr').find('#box')[0];
            var nRow = $(this).parents('tr')[0];          
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoE", estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    // estado.checked = false;
                    //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                    //  oTable.fnDraw();
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoE", estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                    //  estado.checked = true;
                    //  oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" checked disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">On</span> </label>', nRow, 6, false);
                    //  oTable.fnDraw();    
                    });
                    
                }
            }
           // $(this).prop("disabled",false);
        });
        //boton eliminar
        $(document).on('click', '.deleteE', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoE", estado:"B", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                // estado.checked = false;
                //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                //  oTable.fnDraw();
                });
            }
           // $(this).prop("disabled",false);
        });
         //boton clave
         $(document).on('click', '.claveE', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if (confirm("Estas seguro de resetear clave?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoE", estado:"C", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                  // estado.checked = false;
                   //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                  //  oTable.fnDraw();
                });
            }
          //  $(this).prop("disabled",false);
        });
    //PERFIL FACTURACION   
        //boton principal
        $(document).on('click', '.editarF', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            console.log(estado.innerHTML);
            $('.page-spinner-loader').removeClass('hide');
            $('#Cusuarios').load('./tables/usuarios/editar_facturacion.php', {var1:estado.innerHTML, tipo:"evento"},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cusuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crearF', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#idUsuario')[0].value;
            $('.page-spinner-loader').removeClass('hide');
            $('#Cusuarios').load('./tables/usuarios/crear_facturacion.php',{var1:id, tipo:"evento"},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cusuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editar_facturacion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var tipo=$(this).parents().find('#tipo')[0].value;
            var nombres=$(this).parents().find('#nombres')[0].value;
            var apellidos=$(this).parents().find('#apellidos')[0].value;
            var cedula=$(this).parents().find('#cedula')[0].value;
            var razon=$(this).parents().find('#razon')[0].value;
            var ruc=$(this).parents().find('#ruc')[0].value;
            var direccion=$(this).parents().find('#direccionF')[0].value;
            var correo=$(this).parents().find('#correoF')[0].value;
            var pasaporte=$(this).parents().find('#pasaporte')[0].value;
            var idUsuario=$(this).parents().find('#idUsuario')[0].value;
            var id=$(this).parents().find('#id')[0].value;
            var band=true;
            if(direccion.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese dirección</p></div>',
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
            if ( tipo=="cedula"){
                if(nombres.length<3){
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
                if(apellidos.length<3){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese apellidos correctos</p></div>',
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
                if(cedula.length!=10){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese cédula correcta</p></div>',
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
            }else if (tipo=="ruc"){
                if(razon.length<3){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese razón social correcto</p></div>',
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
                if(ruc.length!=13){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese ruc correcto</p></div>',
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
            }else if (tipo=="pasaporte"){
                if(nombres.length<3){
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
                if(apellidos.length<3){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese apellidos correctos</p></div>',
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
                if(pasaporte.length<5){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese pasaporte correcto</p></div>',
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
            }
            if(band){
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"editarF",id:id, nombres:nombres,apellidos:apellidos,cedula:cedula,razon:razon,direccion:direccion,correo:correo, ruc:ruc,pasaporte:pasaporte,tipoF:tipo,usuario:idUsuario},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }   
           
        //    $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_facturacion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var tipo=$(this).parents().find('#tipo')[0].value;
            var nombres=$(this).parents().find('#nombres')[0].value;
            var apellidos=$(this).parents().find('#apellidos')[0].value;
            var cedula=$(this).parents().find('#cedula')[0].value;
            var razon=$(this).parents().find('#razon')[0].value;
            var ruc=$(this).parents().find('#ruc')[0].value;
            var pasaporte=$(this).parents().find('#pasaporte')[0].value;
            var direccion=$(this).parents().find('#direccionF')[0].value;
            var correo=$(this).parents().find('#correoF')[0].value;
            var id=$(this).parents().find('#idUsuario')[0].value;
            var band=true;
            console.log(direccion);
            if(direccion.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese dirección</p></div>',
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
            if ( tipo=="cedula"){
                if(nombres.length<3){
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
                if(apellidos.length<3){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese apellidos correctos</p></div>',
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
                if(cedula.length!=10){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese cédula correcta</p></div>',
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
            }else if (tipo=="ruc"){
                if(razon.length<3){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese razón social correcto</p></div>',
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
                if(ruc.length!=13){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese ruc correcto</p></div>',
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
            }else if (tipo=="pasaporte"){
                if(nombres.length<3){
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
                if(apellidos.length<3){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese apellidos correctos</p></div>',
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
                if(pasaporte.length<5){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese pasaporte correcto</p></div>',
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
            }
            if(band){
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"crearF", nombres:nombres,apellidos:apellidos,cedula:cedula,razon:razon,direccion:direccion,correo:correo,ruc:ruc,pasaporte:pasaporte,tipoF:tipo,usuario:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }  
            
          //  $(this).prop("disabled",false);
        });
        //boton cancela la creación
        $(document).on('click', '.estadoF', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            console.log(id);
            var estado=$(this).parents('tr').find('#box')[0];
            var nRow = $(this).parents('tr')[0];          
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoF", estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    // estado.checked = false;
                    //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                    //  oTable.fnDraw();
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoF", estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                    //  estado.checked = true;
                    //  oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" checked disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">On</span> </label>', nRow, 6, false);
                    //  oTable.fnDraw();    
                    });
                    
                }
            }
           // $(this).prop("disabled",false);
        });
        //boton eliminar
        $(document).on('click', '.deleteF', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoF", estado:"B", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                // estado.checked = false;
                //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                //  oTable.fnDraw();
                });
            }
           // $(this).prop("disabled",false);
        });
        $(document).on('click', '.cancelar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var table = $('#table-editable').DataTable();
            table.ajax.reload();
            $('.clientes').removeClass('hide');   
            $('.factura').addClass('hide');
        });
        $(document).on('change','#tipo' ,function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            if ( this.value=="cedula"){
                $('.cedula').removeClass('hide');
                $('.nombres').removeClass('hide');
                $('.ruc').addClass('hide');
                $('.pasaporte').addClass('hide');
                $('.razon').addClass('hide');
            }else if ( this.value=="ruc"){
                $('.ruc').removeClass('hide'); 
                $('.cedula').addClass('hide');
                $('.razon').removeClass('hide');
                $('.nombres').addClass('hide');
                $('.pasaporte').addClass('hide');
            }else{
                $('.nombres').removeClass('hide');
                $('.pasaporte').removeClass('hide');
                $('.ruc').addClass('hide');
                $('.cedula').addClass('hide');
                $('.razon').addClass('hide');
            }
        });
        });

      $scope.$on('$destroy', function () {
        $('#table-editable').DataTable().clear().destroy();
        $('#table-editable1').DataTable().clear().destroy();
        var tables = $.fn.dataTable.fnTables(true);
        $(tables).each(function () {
            $(this).dataTable().fnDestroy();
        });
        $(document).off('click','.editar');
        $(document).off('click','.crear');
        $(document).off('click','.facturacion');
        $(document).off('click','.editar_usuario');
        $(document).off('click','.crear_usuario');
        $(document).off('click','.estado');
        $(document).off('click','.clave');
        $(document).off('click','.delete');
        $(document).off('click','.editarC');
        $(document).off('click','.crearC');
        $(document).off('click','.editar_usuarioC');
        $(document).off('click','.crear_usuarioC');
        $(document).off('click','.estadoC');
        $(document).off('click','.deleteC');
        $(document).off('click','.claveC');
        $(document).off('click','.editarE');
        $(document).off('click','.crearE');
        $(document).off('click','.editar_usuarioE');
        $(document).off('click','.crear_usuarioE');
        $(document).off('click','.estadoE');
        $(document).off('click','.deleteE');
        $(document).off('click','.claveE');
        $(document).off('click','.editarF');
        $(document).off('click','.crearF');
        $(document).off('click','.editar_facturacion');
        $(document).off('click','.crear_facturacion');
        $(document).off('click','.estadoF');
        $(document).off('click','.deleteF');
        $(document).off('click','.cancelar');
        $(document).off('change','#tipo');

      });
  }]);
