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
            $('#usuarios').load('./tables/usuarios/editar_usuario.php', {var1:estado.innerHTML, tipo:"admin"},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#usuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Cusuarios').load('./tables/usuarios/crear_usuario.php',{tipo:"admin"},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cusuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        //boton Secundario
        $(document).on('click', '.editar_usuario', function (e) {
            e.preventDefault();
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
            $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"editar",id:id, nombres:nombres,apellidos:apellidos,usuario:usuario,cedula:cedula,celular:celular,correo:correo,sexo:sexo,direccion:direccion,fecha:fecha,perfil:perfil},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
           // $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_usuario', function (e) {
            e.preventDefault();
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
            $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"crear", nombres:nombres,apellidos:apellidos,usuario:usuario,cedula:cedula,celular:celular,correo:correo,sexo:sexo,direccion:direccion,fecha:fecha,perfil:perfil},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
          //  $(this).prop("disabled",false);
        });
        //boton cancela la creación
        $(document).on('click', '.estado', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
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
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
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
    //PERFIL USUARIOS CLIENTES   

        //boton principal
        $(document).on('click', '.editarC', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('#fila0')[0];
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
            $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"editarC",id:id, nombres:nombres,apellidos:apellidos,usuario:usuario,cedula:cedula,celular:celular,correo:correo,sexo:sexo,direccion:direccion,fecha:fecha,amigos:amigos},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
         //   $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_usuarioC', function (e) {
            e.preventDefault();
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
            $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"crearC", nombres:nombres,apellidos:apellidos,usuario:usuario,cedula:cedula,celular:celular,correo:correo,sexo:sexo,direccion:direccion,fecha:fecha,amigos:amigos},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
          //  $(this).prop("disabled",false);
        });    
        //boton cancela la creación
        $(document).on('click', '.estadoC', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
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
        $(document).on('click', '.deleteC', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
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

    //PERFIL USUARIOS EVENTOS    
        //boton principal
        $(document).on('click', '.editarE', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('#fila0')[0];
            console.log(estado.innerHTML);
            $('.page-spinner-loader').removeClass('hide');
            $('#usuarios').load('./tables/usuarios/editar_usuario.php', {var1:estado.innerHTML, tipo:"evento"},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#usuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crearE', function (e) {
            e.preventDefault();
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
            $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"editarE",id:id, nombres:nombres,apellidos:apellidos,usuario:usuario,cedula:cedula,celular:celular,correo:correo,sexo:sexo,direccion:direccion,fecha:fecha,perfil:perfil},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
        //    $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_usuarioE', function (e) {
            e.preventDefault();
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
            $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"crearE", nombres:nombres,apellidos:apellidos,usuario:usuario,cedula:cedula,celular:celular,correo:correo,sexo:sexo,direccion:direccion,fecha:fecha,perfil:perfil},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
          //  $(this).prop("disabled",false);
        });
        //boton cancela la creación
        $(document).on('click', '.estadoE', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
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
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
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
        $(document).off('click','.editarC');
        $(document).off('click','.crearC');
        $(document).off('click','.editar_usuarioC');
        $(document).off('click','.crear_usuarioC');
        $(document).off('click','.estadoC');
        $(document).off('click','.deleteC');
        $(document).off('click','.editarE');
        $(document).off('click','.crearE');
        $(document).off('click','.editar_usuarioE');
        $(document).off('click','.crear_usuarioE');
        $(document).off('click','.estadoE');
        $(document).off('click','.deleteE');
      });
  }]);
