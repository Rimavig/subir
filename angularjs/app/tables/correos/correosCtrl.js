'use strict';

angular.module('newApp')
  .controller('correosCtrl', ['$scope','pluginsService', function ($scope,pluginsService) {
    var oTable;
    $scope.reload = function()
    {
    location.reload(); 
    }
    $(document).ready(function () { 
        $('#correoD').load('./tables/correos/tab_destinatarios.php', function() {    
            $("#table-editable1").dataTable({ "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }, 
                "bPaginate" : false,
                "destroy":true,
                "searching": false,
                "autoWidth": false,
                "select":false,
                "paging": false,
                "bFilter": false,
                "scrollX": false,
                "bInfo": false, 
                "order": [[ 0, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                    }
            ]});  
        });
        $('#correosE').load('./tables/correos/tab_error.php', function() {    
            $("#table-editable").dataTable({ "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }, 
                "bPaginate" : false,
                "destroy":true,
                "searching": false,
                "autoWidth": false,
                "select":false,
                "paging": false,
                "bFilter": false,
                "scrollX": false,
                "bInfo": false, 
                "order": [[ 0, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                    }
            ]});  
        });
        if (document.getElementById("cke-editor1") !== null) {
            CKEDITOR.replace('cke-editor1', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                   
            });
        }
        if (document.getElementById("cke-editor2") !== null) {
            CKEDITOR.replace('cke-editor2', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor3") !== null) {
            CKEDITOR.replace('cke-editor3', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor4") !== null) {
            CKEDITOR.replace('cke-editor4', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor5") !== null) {
            CKEDITOR.replace('cke-editor5', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor6") !== null) {
            CKEDITOR.replace('cke-editor6', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor7") !== null) {
            CKEDITOR.replace('cke-editor7', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor8") !== null) {
            CKEDITOR.replace('cke-editor8', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor9") !== null) {
            CKEDITOR.replace('cke-editor9', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor10") !== null) {
            CKEDITOR.replace('cke-editor10', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor11") !== null) {
            CKEDITOR.replace('cke-editor11', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor12") !== null) {
            CKEDITOR.replace('cke-editor12', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }

        if (document.getElementById("cke-editor13") !== null) {
            CKEDITOR.replace('cke-editor13', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor14") !== null) {
            CKEDITOR.replace('cke-editor14', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },

                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor15") !== null) {
            CKEDITOR.replace('cke-editor15', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },

                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor16") !== null) {
            CKEDITOR.replace('cke-editor16', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },

                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor17") !== null) {
            CKEDITOR.replace('cke-editor17', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },

                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        if (document.getElementById("cke-editor18") !== null) {
            CKEDITOR.replace('cke-editor18', {
                height: '150px',
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },

                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
            });
        }
        pluginsService.init();
    }); 
    
    $scope.$on('$viewContentLoaded', function () {
        function isValidHttpUrl(string) {
            let url;
            
            try {
              url = new URL(string);
            } catch (_) {
              return false;  
            }
          
            return url.protocol === "http:" || url.protocol === "https:";
          }
    //PERFIL CATEGORIA   
        //boton principal
        $(document).on('click', '.guardarCorreo', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var asunto=$(this).parents().find('#asunto')[0].value;
            var id=$(this).parents().find('#idCorreo')[0].value;
            var imagenP=$(this).parents().find('#imagenP')[0].value;
            var Himagen="";
            var imagen=$(this).parents().find('.imagenCorreo').children()[0];
            var telefono=$(this).parents().find('#telefono')[0].value;
            var pagina=$(this).parents().find('#pagina')[0].value;
            var facebook=$(this).parents().find('#facebook')[0].value;
            var instagram=$(this).parents().find('#instagram')[0].value;
            var direccion=$(this).parents().find('#direccion')[0].value;
            var twitter=$(this).parents().find('#twitter')[0].value;
            if (id=="1"){
                var descripcion1 = CKEDITOR.instances["cke-editor1"].getData();
                var descripcion2 = CKEDITOR.instances["cke-editor2"].getData();
            }else if (id=="2"){
                var descripcion1 = CKEDITOR.instances["cke-editor3"].getData();
                var descripcion2 = CKEDITOR.instances["cke-editor4"].getData();
            }else if (id=="3"){
                var descripcion1 = CKEDITOR.instances["cke-editor5"].getData();
                var descripcion2 = CKEDITOR.instances["cke-editor6"].getData();
            }else if (id=="4"){
                var descripcion1 = CKEDITOR.instances["cke-editor7"].getData();
                var descripcion2 = CKEDITOR.instances["cke-editor8"].getData();
            }else if (id=="5"){
                var descripcion1 = CKEDITOR.instances["cke-editor9"].getData();
                var descripcion2 = CKEDITOR.instances["cke-editor10"].getData();
            }else if (id=="6"){
                var descripcion1 = CKEDITOR.instances["cke-editor11"].getData();
                var descripcion2 = CKEDITOR.instances["cke-editor12"].getData();
            }else if (id=="7"){
                var descripcion1 = CKEDITOR.instances["cke-editor13"].getData();
                var descripcion2 = CKEDITOR.instances["cke-editor14"].getData();
            }else if (id=="8"){
                var descripcion1 = CKEDITOR.instances["cke-editor15"].getData();
                var descripcion2 = CKEDITOR.instances["cke-editor16"].getData();
            }else if (id=="9"){
                var descripcion1 = CKEDITOR.instances["cke-editor17"].getData();
                var descripcion2 = CKEDITOR.instances["cke-editor18"].getData();
            }
           
            var enlaceRedesSociales =facebook+";"+instagram+";"+twitter+";"+pagina+";";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1600 | image1.height.toFixed(0) != 1200) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1600 x 1200</p></div>',
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
                    $(this).prop("disabled",false); 
                    band=false;
                } 
            }
            if(asunto.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese asunto correcto</p></div>',
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
            if(descripcion1.length<3){
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
            if(descripcion2.length<3){
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
            if(telefono.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese télefono correcto</p></div>',
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
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese página web correcta</p></div>',
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
            
            
            if(band){
                $('#alerta').load('./tables/correos/alerta.php', {tipo:"guardarCorreo",id:id,asunto:asunto,telefono:telefono,enlaceRedesSociales:enlaceRedesSociales,descripcion1:descripcion1,descripcion2:descripcion2,direccion:direccion,imagen:imagenP, Himagen:Himagen},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.correoPrueba', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#idCorreo')[0].value;
            $('#alerta').load('./tables/correos/alerta.php', {tipo:"correoPrueba",id:id},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
        });
        $(document).on('click', '.eliminarD', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/correos/alerta.php', {tipo:"eliminarD", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
        });
        $(document).on('click', '.editarD', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Cusuarios').load('./tables/correos/editar_destinatario.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cusuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_destinatario', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var idPlantilla=$(this).parents().find('#tipo')[0].value;
            var correo=$(this).parents().find('#correo')[0].value;
            var band=true;
            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
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
                $('#alerta').load('./tables/correos/alerta.php', {tipo:"crear_destinatario", idPlantilla:idPlantilla,correo:correo},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }  
        });
        $(document).on('click', '.editar_destinatario', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var idDestinatario=$(this).parents().find('#idDestino')[0].value;
            var idPlantilla=$(this).parents().find('#tipo')[0].value;
            var correo=$(this).parents().find('#correo')[0].value;
            var band=true;
            var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
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
                $('#alerta').load('./tables/correos/alerta.php', {tipo:"editar_destinatario", idPlantilla:idPlantilla,correo:correo,id:idDestinatario},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }  
        });
        $(document).on('click', '.crearDestino', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Cusuarios').load('./tables/correos/crear_destino.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cusuarios').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.eliminarE', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/correos/alerta.php', {tipo:"eliminarE", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
          //  $(this).prop("disabled",false);
        });
        $(document).on('click', '.correoE', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            $('.page-spinner-loader').removeClass('hide');
            $('#alerta').load('./tables/correos/alerta.php', {tipo:"correoE", id:id},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.enviarT', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#alerta').load('./tables/correos/alerta.php', {tipo:"enviarT"},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
            $(this).prop("disabled",false);
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
        $(document).off('click','.guardarCorreo');
        $(document).off('click','.eliminarD');
        $(document).off('click','.editarD');
        $(document).off('click','.crear_destinatario');
        $(document).off('click','.editar_destinatario');
        $(document).off('click','.crearDestino');
        $(document).off('click','.eliminarE');
        $(document).off('click','.editarE');
        $(document).off('click','.correoE');
        $(document).off('click','.enviarT');
       
      });
  }]);
