'use strict';

angular.module('newApp')
  .controller('notificacionCtrl', ['$scope','pluginsService', function ($scope,pluginsService) {
    var oTable;
    $scope.reload = function()
    {
    location.reload(); 
    }
    
    $(document).ready(function () { 
        $(".datepicker").datetimepicker(
            {
                locale: 'es',
                minDate: new Date()
            });
        pluginsService.init();
    }); 
    
    $scope.$on('$viewContentLoaded', function () {
        
        $(document).on('click', '.enviar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var band=true;
            $('.page-spinner-loader').removeClass('hide');
            var tipo=$(this).parents().find('#tipo')[0].value;
            var destinatario=$(this).parents().find('#destinatario')[0].value;
            var fecha=$(this).parents().find('#fecha')[0].value;
            var estado=$(this).parents().find('#box')[0].checked;
            var evento=$(this).parents().find('#evento')[0].value;
            var eventoV=$(this).parents().find('#eventoV')[0].value;
            var titulo=$(this).parents().find('#titulo')[0].value;
            var descripcion=$(this).parents().find('#descripcion')[0].value;
            var valueA = $("#clientesS  option");
            if(titulo.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese tìtulo correcto</p></div>',
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
            if(titulo.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese descripciòn correcto</p></div>',
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
            if(estado){
                if(fecha===""){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Seleccióne fecha correcta</p></div>',
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
            var valuesA = Array.from(valueA).map(el => el.value)+"";
            if(destinatario=="personal"){
                if(valuesA.length === 0){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Seleccióne Usuarios correctamente</p></div>',
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
            }else{
                valuesA="";
            }
            if(band){
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"notificacion",notificacion:tipo,destinatario:destinatario,fecha:fecha,estado:estado,evento:evento,titulo:titulo,descripcion:descripcion,valuesA:valuesA,eventoV:eventoV},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            } else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('change','#tipo' ,function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            if ( this.value=="evento"){
                $(this).parents().find('.promocion').hide();
                $(this).parents().find('.evento').show(); 
            }else if ( this.value=="promocion"){
                $(this).parents().find('.promocion').hide();
                $(this).parents().find('.evento').show(); 
                
            }else{
                $(this).parents().find('.evento').hide(); 
                $(this).parents().find('.promocion').hide();
            }
        });
        $(document).on('change','#destinatario' ,function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log($(this).parents().find('·evento'));
            if ( this.value=="personal"){
                $(this).parents().find('.clientes').show();
                $(this).parents().find('.eventoV').hide();
            }else if ( this.value=="evento"){
                $(this).parents().find('.clientes').hide();
                $(this).parents().find('.eventoV').show();        
            }else{
                $(this).parents().find('.clientes').hide();
                $(this).parents().find('.eventoV').hide();
            }
        });
        $(document).on('change','#box' ,function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            if(this.checked){
                $(this).parents().find('.fecha').show();  
            }else{
                $(this).parents().find('.fecha').hide();
            }
        });
        $(document).on('click', '.agregar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var selectedItem = $("#clientesT option:selected");
            $("#clientesS").append(selectedItem);
            $("#clientesT").select2("val", "");
            
        });
        $(document).on('click', '.eliminar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var selectedItem = $("#clientesS option:selected");
            $("#clientesT").append(selectedItem);
            selectedItem.prop("selected", false); 
            selectedItem.removeAttr("selected");
            $("#clientesS").select2("val", "");
        });
        $(document).on('click', '.deleteN', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr')[0].childNodes[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/procesos/alerta2.php', {tipo:"deleteN",tipo2:"deleteN", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
    });

      $scope.$on('$destroy', function () {
        let editor = window['CKEDITOR'];
        for(var name in editor.instances)
        {
            if (editor.instances[name]) {
                console.log(name);
                editor.instances[name].destroy(true);
            }
        } 
        var tables = $.fn.dataTable.fnTables(true);
        $(tables).each(function () {
            $(this).dataTable().fnDestroy();
        });
        $(document).off('click','.enviar');
        $(document).off('change','#tipo');
        $(document).off('change','#destinatario');
        $(document).off('change','#box');
        $(document).off('click','.agregar');
        $(document).off('click','.eliminar');
        $(document).off('click','.deleteN');
      });
  }]);
