'use strict';

angular.module('newApp')
  .controller('imagenesCtrl', ['$scope','pluginsService', function ($scope,pluginsService) {
    var oTable;
    $scope.$on('$viewContentLoaded', function () {
    //PERFIL CATEGORIA   
        //boton principal
        $(document).on('click', '.editar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            var tipo=$(this).parents().find('#tipo')[0].value;
            console.log(tipo);
            $('.page-spinner-loader').removeClass('hide');
            $('#editar-imagen').load('./tables/imagenes/editar_imagen.php', {var1:estado.innerHTML,tipo:tipo},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#editar-imagen').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var tipo=$(this).parents().find('#tipo')[0].value;
            $('#crear-imagen').load('./tables/imagenes/crear_imagen.php',{tipo:tipo},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#crear-imagen').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        //boton Secundario
        $(document).on('click', '.editar_imagen', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#Eid')[0].value;
            var tipo=$(this).parents().find('#Etipo')[0].value;
            var nombres=$(this).parents().find('#Enombres')[0].value;
            var descripcion=$(this).parents().find('#Edescripcion')[0].value;
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            var imagenv = document.getElementById('imagen_load');
            var band=true;
            if (imagenv != null) {
                var imagen = document.getElementById('imagen_load').src;
                var image1 = new Image();
                image1.src = imagen;
                if(tipo=="Esala" | tipo=="Edistribucion"){
                    if (image1.width.toFixed(0) != 2448  | image1.height.toFixed(0) != 1888) {
                        alert('Las medidas deben ser: 2448 x 1888');
                        band=false;
                    } 
                }else{
                    band=true;
                }
                if(band){
                    $('.page-spinner-loader').removeClass('hide'); 
                    $('#alerta').load('./tables/imagenes/alerta.php', {tipo:tipo,tipo2:"editar",id:id,imagen:imagen,nombreT:nombreT, nombres:nombres,descripcion:descripcion},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }else{
                     $(this).prop("disabled",false);
                }
               
            } else {
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/imagenes/alerta.php', {tipo:tipo,tipo2:"editar",id:id,nombreT:nombreT, nombres:nombres,descripcion:descripcion},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
            //$(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_imagen', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var nombres=$(this).parents().find('#nombres')[0].value;
            var imagenv = document.getElementById('imagen_load');
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            var descripcion=$(this).parents().find('#descripcion')[0].value;
            var tipo=$(this).parents().find('#tipo')[0].value;
            var band=true;
            if (imagenv != null) {
                var imagen = document.getElementById('imagen_load').src;
                var image1 = new Image();
                image1.src = imagen;
                if(tipo=="sala" | tipo=="distribucion"){
                    if (image1.width.toFixed(0) != 2448  | image1.height.toFixed(0) != 1888) {
                        alert('Las medidas deben ser: 2448 x 1888');
                        band=false;
                    } 
                }else{
                    band=true;
                }
                if(band){
                    $('.page-spinner-loader').removeClass('hide');

                    $('#alerta').load('./tables/imagenes/alerta.php', {tipo:tipo,tipo2:"crear",imagen:imagen, nombreT:nombreT,nombres:nombres,descripcion:descripcion},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }else{
                     $(this).prop("disabled",false);
                }
            } else {
                alert('Seleccione una Imagen');
                $(this).prop("disabled",false);
            }
           // $(this).prop("disabled",false);
        });
        //boton de modal al cerrar
        $("#editar-imagen").on('hidden.bs.modal', function () {
            $('#editar-imagen').load('./tables/imagenes/vacio.php',function() {    
            });
        });
        $("#crear-imagen").on('hidden.bs.modal', function () {
            $('#crear-imagen').load('./tables/imagenes/vacio.php',function() {    
            });
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
            var tipo="ES"+$(this).parents().find('#tipo')[0].value;   
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/imagenes/alerta.php', {tipo:tipo,tipo2:"estado",nombreT:nombreT, estado:"I", id:id},function() {    
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
                    $('#alerta').load('./tables/imagenes/alerta.php', {tipo:tipo,tipo2:"estado",nombreT:nombreT, estado:"A", id:id},function() {
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
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log( this);
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            var tipo="ES"+$(this).parents().find('#tipo')[0].value; 
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('#alerta').load('./tables/imagenes/alerta.php', {tipo:tipo,tipo2:"estado",nombreT:nombreT, estado:"B", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                  // estado.checked = false;
                   //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                  //  oTable.fnDraw();
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
        $(document).off('click','.editar');
        $(document).off('click','.crear');
        $(document).off('click','.editar_imagen');
        $(document).off('click','.crear_imagen');
        $(document).off('click','.estado');
        $(document).off('click','.delete');
       
      });
  }]);
