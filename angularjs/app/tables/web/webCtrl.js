'use strict';

angular.module('newApp')
  .controller('webCtrl', ['$scope','pluginsService', function ($scope ,pluginsService) {
    $(document).ready(function () { 
        $('#teatroQuienes').load('./tables/web/quienes_somos.php', function() {    
            $("#table-objetivos").dataTable({ "language": {
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
                "order": [[ 3, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 0,2]},
                    { "sWidth": "40%", "className": "text-justify", "aTargets": [1]},
                    { "sWidth": "10%", "className": "text-center", "aTargets":[3,4]}
            ]}); 
        });
        $('#fundacionQuienes').load('./tables/web/quienes_somos_fundacion.php', function() {    
            $("#table-lineas").dataTable({ "language": {
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
                "order": [[ 2, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 0,2]},
                    { "sWidth": "40%", "className": "text-justify", "aTargets": [4]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [ 1,3,5,6]}
            ]}); 
        });
        $('#teatroInstalaciones').load('./tables/web/instalaciones.php', function() {    
            $("#table-instalaciones").dataTable({ "language": {
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
                "order": [[ 2, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                    { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                    { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
            ]});
        });
        $('#teatroNoticias').load('./tables/web/noticias.php', function() {    
            $("#table-noticias").dataTable({ "language": {
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
                "order": [[ 2, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                    { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                    { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
            ]});
            
        });
        $('#teatroEspacios').load('./tables/web/espacios.php', function() {    
            $("#table-noticias").dataTable({ "language": {
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
                "order": [[ 2, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                    { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                    { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
            ]});
        });
       
        $('#fundacionProyectos').load('./tables/web/proyectos.php', function() {    
            $("#table-noticias").dataTable({ "language": {
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
                "order": [[ 2, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                    { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                    { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
            ]});
        });
        $('#teatroRealizados').load('./tables/web/realizados.php', function() {    
            $("#table-realizados").dataTable({ "language": {
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
                "order": [[ 2, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                    { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                    { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
            ]});
        });
        $('#otrasPreguntas').load('./tables/web/preguntas.php', function() {    
            $("#table-preguntas").dataTable({ "language": {
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
                "order": [[ 1, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "3%", "className": "text-center", "aTargets": [ 1]},
                    { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [4,5]},
                    { "sWidth": "20%", "className": "text-justify", "aTargets": [2]}
            ]}); 
        });
        $('#otrasResponsabilidad').load('./tables/web/ambiental.php', function() {    
            $("#table-ambiental").dataTable({ "language": {
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
                "order": [[ 2, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                    { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                    { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
            ]});
        });
        $('#otrasAmigos').load('./tables/web/amigos_teatro.php', function() {    
            $("#table-preguntasA").dataTable({ "language": {
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
                "order": [[ 1, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "3%", "className": "text-center", "aTargets": [ 1]},
                    { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [4,5]},
                    { "sWidth": "20%", "className": "text-justify", "aTargets": [2]}
            ]}); 
            $("#table-beneficios").dataTable({ "language": {
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
                "order": [[ 2, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 2]},
                    { "sWidth": "15%", "className": "text-center", "aTargets": [1]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [5,3,6]},
                    { "sWidth": "30%", "className": "text-justify", "aTargets": 4}
            ]});
        });
        $('#otrasContacto').load('./tables/web/contacto.php', function() {    
            $("#table-boleteria").dataTable({ "language": {
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
                "order": [[ 1, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 1]},
                    { "sWidth": "30%", "className": "text-justify", "aTargets": [2]},
                    { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [4]}
            ]}); 
            $("#table-cafe").dataTable({ "language": {
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
                "order": [[ 1, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 1]},
                    { "sWidth": "30%", "className": "text-justify", "aTargets": [2]},
                    { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [4]}
            ]}); 
            $("#table-whatsapp").dataTable({ "language": {
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
                "order": [[ 1, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 1]},
                    { "sWidth": "30%", "className": "text-justify", "aTargets": [2]},
                    { "sWidth": "40%", "className": "text-justify", "aTargets": [3]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [4]}
            ]}); 
        });
        $('#imagenTeatro').load('./tables/web/imagenes/teatro.php', function() {    
        });
        $('#imagenCafe').load('./tables/web/imagenes/cafe.php', function() {    
        });
        $('#imagenPromocion').load('./tables/web/imagenes/promociones.php', function() {    
        });
        $('#imagenAlquiler').load('./tables/web/imagenes/alquiler.php', function() {    
        });
        $('#imagenFundacion').load('./tables/web/imagenes/fundacion.php', function() {    
        });

        $('#imagenContacto').load('./tables/web/imagenes/contacto.php', function() {    
        });
        $('#imagenAmigos').load('./tables/web/imagenes/amigos.php', function() {    
        });
        $('#cafeInformacion').load('./tables/web/tab_informacion.php', function() {   
            CKEDITOR.replace( 'cke-editor', {
                toolbar :
                    [
                        { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                        { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                        { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                        { name: 'links', items : [ 'Link','Unlink' ] }
                    ]
                
              }); 
        });
        $('#cafeGaleria').load('./tables/web/tab_galeria.php', function() {    
        });

        $('#imagenNoticias').load('./tables/web/imagenes/noticias.php', function() {    
        });
        $('#imagenInicio').load('./tables/web/imagenes/imagenP.php', function() {    
        });
        $('#imagenBannerW').load('./tables/web/imagenes/bannerW.php', function() {    
        });
        $('#imagenBannerM').load('./tables/web/imagenes/bannerM.php', function() {    
        });
        $('#imagenAmbiental').load('./tables/web/imagenes/ambiental.php', function() {    
        });
        $('#imagenPreguntas').load('./tables/web/imagenes/preguntas.php', function() {    
        });
        $('#publicidadSweb').load('./tables/web/publicidad_carga.php', function() {    
            $("#table-publicidad").dataTable({ "language": {
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
                "order": [[ 2, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 2,6]},
                    { "sWidth": "20%", "className": "text-justify", "aTargets": [1,5]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [3,4,7]}
            ]}); 
        });
        $('#informacionSweb').load('./tables/web/informacion_carga.php', function() {    
            $("#table-informacion").dataTable({ "language": {
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
                "order": [[ 1, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 1,3]},
                    { "sWidth": "30%", "className": "text-justify", "aTargets": [2]}
            ]}); 
        });
        $('#principalSweb').load('./tables/web/principal_carga.php', function() {   
            $("#table-principalesB").dataTable({ "language": {
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
                "order": [[ 2, "asc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "20%", "className": "text-center", "aTargets": [ 1,4,6]},
                    { "sWidth": "5%", "className": "text-center", "aTargets": [2,7,8]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [3,5]},
            ]});  
        });

        $('#contactoG').load('./tables/web/contactoG.php', function() {    
            $("#table-general").dataTable({ "language": {
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
                "order": [[ 5, "desc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "10%", "className": "text-center", "aTargets": [ 1,2]},
                    { "sWidth": "20%", "className": "text-center", "aTargets": [ 3,4]},
                    { "sWidth": "5%", "className": "text-center", "aTargets": [5,6,7]},
            ]});  
        });
        $('#contactoA').load('./tables/web/contactoA.php', function() {    
            $("#table-alquilerC").dataTable({ "language": {
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
                "order": [[ 10, "desc" ]],
                "aoColumnDefs": [
                    {
                        "targets": [ 0 ],
                            "className": "hide_column"
                        },
                    { "sWidth": "5%", "className": "text-center", "aTargets": [ 1,2,3,4]},
                    { "sWidth": "10%", "className": "text-center", "aTargets": [5]},
                    { "sWidth": "20%", "className": "text-center", "aTargets": [9]},
                    { "sWidth": "5%", "className": "text-center", "aTargets": [6,7,10]},
                    { "sWidth": "3%", "className": "text-center", "aTargets": [11,12,8]},
            ]});  
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
        $(document).on('click', '.guardarQuienes', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.Equienes_somosI').children()[0];
            var sinopsis=$(this).parents().find('#quienesInfo')[0].value;
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 307 | image1.height.toFixed(0) != 365) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 307 x 365</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarQuienes",Himagen:Himagen, sinopsis:sinopsis},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarMisionT', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.EmisionI').children()[0];
            var sinopsis=$(this).parents().find('#misionInfo')[0].value;
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 482 | image1.height.toFixed(0) != 288) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 482 x 288</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarMisionT",Himagen:Himagen, sinopsis:sinopsis},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarVisionT', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.EvisionI').children()[0];
            var sinopsis=$(this).parents().find('#visionInfo')[0].value;
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 482 | image1.height.toFixed(0) != 288) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 482 x 288</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarVisionT",Himagen:Himagen, sinopsis:sinopsis},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarQuienesF', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var sinopsis=$(this).parents().find('#quienesInfo')[0].value;
            var band=true;
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarQuienesF", sinopsis:sinopsis},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarProyectosT', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var sinopsis=$(this).parents().find('#proyectosInfoT')[0].value;
            var band=true;
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarProyectosT", sinopsis:sinopsis},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarMisionF', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.EmisionI').children()[0];
            var sinopsis=$(this).parents().find('#misionInfo')[0].value;
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 482 | image1.height.toFixed(0) != 288) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 482 x 288</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarMisionF",Himagen:Himagen, sinopsis:sinopsis},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarVisionF', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.EvisionI').children()[0];
            var sinopsis=$(this).parents().find('#visionInfo')[0].value;
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 482 | image1.height.toFixed(0) != 288) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 482 x 288</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarVisionF",Himagen:Himagen, sinopsis:sinopsis},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarAmigos', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var sinopsis=$(this).parents().find('#amigosInfo')[0].value;
            var band=true;
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarAmigos", sinopsis:sinopsis},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarNosotrosT', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.Esobre_nosotrosI').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1366 | image1.height.toFixed(0) != 230) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1366 x 230</p></div>',
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
            }else{
                band=false;
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccione una Imagen</p></div>',
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
            }
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarNosotrosT",Himagen:Himagen},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
                $('.page-spinner-loader').addClass('hide');
            } 
        });
        
        $(document).on('click', '.crearObjetivo', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_objetivo.php', function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarObjetivo', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_objetivo.php', {var1:id.innerHTML}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_objetivo', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var objetivo=$(this).parents().find('#Iobjetivo')[0].value;
            var orden=$(this).parents().find('#ordenObjetivo')[0].value;
            var band=true;
            if(objetivo.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese objetivo correcto</p></div>',
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
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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
                $('#alerta').load('./tables/web/alerta.php', {tipo:"crear_objetivo",objetivo:objetivo, orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });
        $(document).on('click', '.editar_objetivo', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#EidObjetivo')[0].value;
            var objetivo=$(this).parents().find('#Iobjetivo')[0].value;
            var orden=$(this).parents().find('#ordenObjetivo')[0].value;
            var band=true;
            if(objetivo.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese objetivo correcto</p></div>',
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
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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
                $('#alerta').load('./tables/web/alerta.php', {tipo:"editar_objetivo",id:id,objetivo:objetivo, orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
        });

        $(document).on('click', '.crearInstalacion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_teatro.php', {tipo:"instalacion"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $('.infoG').load('./tables/web/infoG.php',{tipo:"instalacion"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarInstalacion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_teatro.php', {var1:id.innerHTML,tipo:"instalacion"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $('.infoG').load('./tables/web/infoG.php',{var1:id.innerHTML,tipo:"instalacion"}, function() {  
            });
            $(this).prop("disabled",false);
        });

        $(document).on('click', '.crearNoticia', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_teatro.php', {tipo:"noticia"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
            });
            $('.infoG').load('./tables/web/infoG.php',{tipo:"noticia"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarNoticia', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_teatro.php', {var1:id.innerHTML,tipo:"noticia"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
                $(document).on('focusin.modal', function (e) {
                 
                })
            });
            $('.infoG').load('./tables/web/infoG.php',{var1:id.innerHTML,tipo:"noticia"}, function() {  
            });
            $(this).prop("disabled",false);
        });

        $(document).on('click', '.crearRealizados', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_teatro.php', {tipo:"realizados"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
                $(document).on('focusin.modal', function (e) {
                 
                })
            });
            $('#teatroInformacion').load('./tables/mantenimiento/vacio.php', function() {  
            });
            $('.infoG').load('./tables/web/infoG.php',{tipo:"realizados"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarRealizados', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#teatroInformacion').load('./tables/web/editar_informacion.php',{var1:id.innerHTML,tipo:"realizados"}, function() {  
                $('.alquilerS').removeClass('hide');
                $('.alquilerP').addClass('hide');
                $('.page-spinner-loader').addClass('hide');
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
            });
            $('#teatroDescargable').load('./tables/web/descargable.php',{var1:id.innerHTML,tipo:"realizados"}, function() {  
            });
            $('#teatroGaleria').load('./tables/web/galeria.php',{var1:id.innerHTML,tipo:"realizados"}, function() {  
                $('.page-spinner-loader').addClass('hide');
            });
            $('#Mteatro').load('./tables/mantenimiento/vacio.php', function() {    
            });
            $('.infoG').load('./tables/web/infoG.php',{var1:id.innerHTML,tipo:"realizados"}, function() {  
            });
            $(this).prop("disabled",false);
        });

        $(document).on('click', '.crearEspacio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_teatro.php', {tipo:"espacios"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
                $(document).on('focusin.modal', function (e) {
                 
                })
            });
            $('#teatroInformacion').load('./tables/mantenimiento/vacio.php', function() {  
            });
            $('.infoG').load('./tables/web/infoG.php',{tipo:"espacios"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarEspacio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#teatroInformacion').load('./tables/web/editar_informacion.php',{var1:id.innerHTML,tipo:"espacios"}, function() {  
                $('.alquilerS').removeClass('hide');
                $('.alquilerP').addClass('hide');
                $('.page-spinner-loader').addClass('hide');
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
            });
            $('#teatroDescargable').load('./tables/web/descargable.php',{var1:id.innerHTML,tipo:"espacios"}, function() {  
                $('.page-spinner-loader').addClass('hide');
            });
            $('#teatroGaleria').load('./tables/web/galeria.php',{var1:id.innerHTML,tipo:"espacios"}, function() {  
                $('.page-spinner-loader').addClass('hide');
            });
            $('#Mteatro').load('./tables/mantenimiento/vacio.php', function() {    
            });
            $('.infoG').load('./tables/web/infoG.php',{var1:id.innerHTML,tipo:"espacios"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crearProyecto', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_teatro.php', {tipo:"proyectos"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
                $(document).on('focusin.modal', function (e) {
                 
                })
            });
            $('#teatroInformacion').load('./tables/mantenimiento/vacio.php', function() {  
            });
            $('.infoG').load('./tables/web/infoG.php',{tipo:"proyectos"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarProyecto', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#teatroInformacion').load('./tables/web/editar_informacion.php',{var1:id.innerHTML,tipo:"proyectos"}, function() {  
                $('.alquilerS').removeClass('hide');
                $('.alquilerP').addClass('hide');
                $('.page-spinner-loader').addClass('hide');
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
            });
            $('#teatroDescargable').load('./tables/web/descargable.php',{var1:id.innerHTML,tipo:"proyectos"}, function() {  
                $('.page-spinner-loader').addClass('hide');
            });
            $('#teatroGaleria').load('./tables/web/galeria.php',{var1:id.innerHTML,tipo:"proyectos"}, function() {  
                $('.page-spinner-loader').addClass('hide');
            });
            $('#Mteatro').load('./tables/mantenimiento/vacio.php', function() {    
            });
            $('.infoG').load('./tables/web/infoG.php',{var1:id.innerHTML,tipo:"proyectos"}, function() {  
            });
            $(this).prop("disabled",false);
        });

        $(document).on('click', '.crearLineas', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_teatro.php', {tipo:"lineas"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
                $(document).on('focusin.modal', function (e) {
                 
                })
            });
            $('.infoG').load('./tables/web/infoG.php',{tipo:"lineas"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarLineas', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_teatro.php', {var1:id.innerHTML,tipo:"lineas"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
                $(document).on('focusin.modal', function (e) {
                 
                })
            });
            $('.infoG').load('./tables/web/infoG.php',{var1:id.innerHTML,tipo:"lineas"}, function() {  
            });
            $(this).prop("disabled",false);
        });

        $(document).on('click', '.crearResponsabilidad', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_teatro.php', {tipo:"ambiental"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
                $(document).on('focusin.modal', function (e) {
                 
                })
            });
            $('.infoG').load('./tables/web/infoG.php',{tipo:"ambiental"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarResponsabilidad', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_teatro.php', {var1:id.innerHTML,tipo:"ambiental"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
                $(document).on('focusin.modal', function (e) {
                 
                })
            });
            $('.infoG').load('./tables/web/infoG.php',{var1:id.innerHTML,tipo:"ambiental"}, function() {  
            });
            $(this).prop("disabled",false);
        });

        $(document).on('click', '.crearBeneficio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_teatro.php', {tipo:"amigos"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $('.infoG').load('./tables/web/infoG.php',{tipo:"amigos"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarBeneficio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_teatro.php', {var1:id.innerHTML,tipo:"amigos"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir

            });
            $('.infoG').load('./tables/web/infoG.php',{var1:id.innerHTML,tipo:"amigos"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        
        $(document).on('click', '.crearPreguntaF', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_pregunta.php', {tipo:"preguntas"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
            });
            $('.infoG').load('./tables/web/infoG.php',{tipo:"preguntas"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarPreguntaF', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_pregunta.php', {var1:id.innerHTML,tipo:"preguntas"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
            });
            $('.infoG').load('./tables/web/infoG.php',{var1:id.innerHTML,tipo:"preguntas"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crearPreguntaA', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_pregunta.php', {tipo:"amigos_preguntas"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
            });
            $('.infoG').load('./tables/web/infoG.php',{tipo:"amigos_preguntas"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarPreguntaA', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_pregunta.php', {var1:id.innerHTML,tipo:"amigos_preguntas"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
                CKEDITOR.replace( 'cke-editor', {
                    toolbar :
                        [
                            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
                            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
                            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent' ] },
                            { name: 'links', items : [ 'Link','Unlink' ] }
                        ]
                    
                  });
            });
            $('.infoG').load('./tables/web/infoG.php',{var1:id.innerHTML,tipo:"amigos_preguntas"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crearBoleteria', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_pregunta.php', {tipo:"boleteria"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $('.infoG').load('./tables/web/infoG.php',{tipo:"boleteria"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarBoleteria', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_pregunta.php', {var1:id.innerHTML,tipo:"boleteria"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $('.infoG').load('./tables/web/infoG.php',{var1:id.innerHTML,tipo:"boleteria"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crearCafe', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_pregunta.php', {tipo:"cafe"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $('.infoG').load('./tables/web/infoG.php',{tipo:"cafe"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarCafe', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_pregunta.php', {var1:id.innerHTML,tipo:"cafe"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $('.infoG').load('./tables/web/infoG.php',{var1:id.innerHTML,tipo:"cafe"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crearWhatsapp', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_pregunta.php', {tipo:"whatsapp"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $('.infoG').load('./tables/web/infoG.php',{tipo:"whatsapp"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarWhatsapp', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_pregunta.php', {var1:id.innerHTML,tipo:"whatsapp"}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $('.infoG').load('./tables/web/infoG.php',{var1:id.innerHTML,tipo:"whatsapp"}, function() {  
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_pregunta', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            var tipo2=$(this).parents().find('#tipo2')[0].value;
            var nombre=$(this).parents().find('#Inombre')[0].value;
            if(tipo2=="boleteria" | tipo2=="cafe" | tipo2=="whatsapp" ){
                var descripcion=$(this).parents().find('#cke-editor')[0].value;
            }else{
                var objEditor2 = CKEDITOR.instances["cke-editor"];
                var descripcion = objEditor2.getData();
            }
            var orden=$(this).parents().find('#Iorden')[0].value;
            var band=true;
            if(tipo2=="whatsapp"){
                if(descripcion.length!=10){
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
            }else{
                if(descripcion.length<5){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese descripción correcta</p></div>',
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
            if(nombre.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
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
            
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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

            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"crear_pregunta",nombreT:nombreT,tipo2:tipo2,nombre:nombre,descripcion:descripcion,orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 

        });
        $(document).on('click', '.editar_pregunta', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#EidObjetivo')[0].value;
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            var tipo2=$(this).parents().find('#tipo2')[0].value;
            var nombre=$(this).parents().find('#Inombre')[0].value;
            if(tipo2=="boleteria" | tipo2=="cafe" | tipo2=="whatsapp" ){
                var descripcion=$(this).parents().find('#cke-editor')[0].value;
            }else{
                var objEditor2 = CKEDITOR.instances["cke-editor"];
                var descripcion = objEditor2.getData();
            }
          
            var orden=$(this).parents().find('#Iorden')[0].value;
            var band=true;
            if(nombre.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
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
            if(tipo2=="whatsapp"){
                if(descripcion.length!=10){
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
            }else{
                if(descripcion.length<5){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese descripción correcta</p></div>',
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
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"editar_pregunta",id:id, nombreT:nombreT,tipo2:tipo2,nombre:nombre,descripcion:descripcion,orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });

        $(document).on('click', '.crear_tabla', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            var tipo2=$(this).parents().find('#tipo2')[0].value;
            var nombre=$(this).parents().find('#Inombre')[0].value;
            if(tipo2=="instalaciones" | tipo2=="amigos"){
                var descripcion=$(this).parents().find('#cke-editor')[0].value;
            }else{
                var objEditor2 = CKEDITOR.instances["cke-editor"];
                var descripcion = objEditor2.getData();
            }
            var orden=$(this).parents().find('#Iorden')[0].value;
            var imagen = document.getElementById('imagen_load');
            var band=true;
            var Himagen="";
            if(nombre.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
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
            if(descripcion.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese descripción correcta</p></div>',
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
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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
            if (imagen != null) {
                Himagen = document.getElementById('imagen_load').src;
                var image1 = new Image();
                image1.src = Himagen;
                if (tipo2=="noticia"){
                    if (image1.width.toFixed(0) != 1018 | image1.height.toFixed(0) != 302) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1018 x 302</p></div>',
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
                }else if (tipo2=="instalacion" ){
                    if (image1.width.toFixed(0) != 458 | image1.height.toFixed(0) != 320) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 458 x 320</p></div>',
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
                }else if ( tipo2=="espacios" | tipo2=="realizados" | tipo2=="proyectos" | tipo2=="amigos"){
                    if (image1.width.toFixed(0) != 324 | image1.height.toFixed(0) != 160) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 324 x 160</p></div>',
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
                }else if ( tipo2=="lineas" ){
                    if (image1.width.toFixed(0) != 193 | image1.height.toFixed(0) != 193) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 193 x 193</p></div>',
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
                }else if ( tipo2=="ambiental" ){
                    if (image1.width.toFixed(0) != 467 | image1.height.toFixed(0) != 307) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 193 x 193</p></div>',
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
                
            }else{
                band=false;
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccione una Imagen</p></div>',
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
            }
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"crear_tabla",Himagen:Himagen, nombreT:nombreT,tipo2:tipo2,nombre:nombre,descripcion:descripcion,orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 

        });
        $(document).on('click', '.editar_tabla', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#EidObjetivo')[0].value;
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            var tipo2=$(this).parents().find('#tipo2')[0].value;
            var nombre=$(this).parents().find('#Inombre')[0].value;
            if(tipo2=="instalaciones" | tipo2=="amigos"){
                var descripcion=$(this).parents().find('#cke-editor')[0].value;
            }else{
                var objEditor2 = CKEDITOR.instances["cke-editor"];
                var descripcion = objEditor2.getData();
            }
           
            
            var orden=$(this).parents().find('#Iorden')[0].value;
            var imagen = document.getElementById('imagen_load');
            var band=true;
            var Himagen="";
            if(nombre.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
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
            if(descripcion.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese descripción correcta</p></div>',
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
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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
            if (imagen != null) {
                Himagen = document.getElementById('imagen_load').src;
                var image1 = new Image();
                image1.src = Himagen;
                if (tipo2=="noticia"){
                    if (image1.width.toFixed(0) != 1018 | image1.height.toFixed(0) != 302) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1018 x 302</p></div>',
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
                }else if (tipo2=="instalacion" ){
                    if (image1.width.toFixed(0) != 458 | image1.height.toFixed(0) != 320) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 458 x 320</p></div>',
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
                }else if ( tipo2=="espacios" | tipo2=="realizados" | tipo2=="proyectos"  | tipo2=="amigos"){
                    if (image1.width.toFixed(0) != 324 | image1.height.toFixed(0) != 160) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 324 x 160</p></div>',
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
                }else if ( tipo2=="lineas" ){
                    if (image1.width.toFixed(0) != 193 | image1.height.toFixed(0) != 193) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 193 x 193</p></div>',
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
                }else if ( tipo2=="ambiental" ){
                    if (image1.width.toFixed(0) != 467 | image1.height.toFixed(0) != 307) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 193 x 193</p></div>',
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
            }
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"editar_tabla",id:id, Himagen:Himagen, nombreT:nombreT,tipo2:tipo2,nombre:nombre,descripcion:descripcion,orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.editar_cafe', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var nombre=$(this).parents().find('#Inombre')[0].value;
            var objEditor2 = CKEDITOR.instances["cke-editor"];
            var descripcion = objEditor2.getData();
            var band=true;
            if(nombre.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
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
            if(descripcion.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese descripción correcta</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"editar_cafe",id:"127",nombre:nombre,descripcion:descripcion},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.crearGaleria', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_galeria.php', function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarGaleria', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idGaleria')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_galeria.php', {var1:id.innerHTML}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_galeria', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#EidObjetivo')[0].value;
            var orden=$(this).parents().find('#IordenG')[0].value;
            var imagen = document.getElementById('imagen_load');
            var band=true;
            var Himagen="";
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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
            if (imagen != null) {
                Himagen = document.getElementById('imagen_load').src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 499 | image1.height.toFixed(0) != 304) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 499 x 304</p></div>',
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
                
            }else{
                band=false;
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccione una Imagen</p></div>',
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
            }
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"crear_galeria",Himagen:Himagen, id:id, orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 

        });
        $(document).on('click', '.editar_galeria', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#EidGaleria')[0].value;
            var id1=$(this).parents().find('#EidObjetivo')[0].value;
            var orden=$(this).parents().find('#IordenG')[0].value;
            var imagen = document.getElementById('imagen_load');
            var band=true;
            var Himagen="";
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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
            if (imagen != null) {
                Himagen = document.getElementById('imagen_load').src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 499 | image1.height.toFixed(0) != 304) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 499 x 304</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"editar_galeria",id:id,id1:id1, Himagen:Himagen, orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });

        $(document).on('click', '.crearDescarga', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_descarga.php', function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarDescarga', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idDescarga')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_descarga.php', {var1:id.innerHTML}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_descarga', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#EidObjetivo')[0].value;
            var nombre=$(this).parents().find('#InombreD')[0].value;
            var orden=$(this).parents().find('#IordenD')[0].value;
            var file = document.getElementById('archivo1').files[0];
            var band=true;
            let formData = new FormData();
            if(nombre.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
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
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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
            if (file != null) {
                formData.append('file', file);
                formData.append("tipo", "crear_descarga");
                formData.append("id", id);
                formData.append("nombre", nombre);
                formData.append("orden", orden);
            }else{
                band=false;
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccione un archivo</p></div>',
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
            }
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $.ajax({
                    url: "./tables/web/alerta.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success : function(data) {
                        $('.page-spinner-loader').addClass('hide');
                        if(data=="true"){
                            $(this).prop("disabled",false); 
                            var n = noty({
                                text        : '<div class="alert alert-success "><p><strong>Se creó correctamente</p></div>',
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
                                $('#teatroDescargable').load('./tables/web/descargable.php',{var1:id}, function() {  
                                    $('#Mteatro').modal('hide');
                                });
                        }else{
                            var n = noty({
                                text        : '<div class="alert alert-warning "><p><strong>Error no se pudo crear</p></div>',
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
                            $(".crear_descarga").prop("disabled",false); 
                        }
                        console.log(data);
                    }
                  });
            }else{
                $(this).prop("disabled",false); 
            } 

        });
        $(document).on('click', '.editar_descarga', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#EidDescarga')[0].value;
            var id1=$(this).parents().find('#EidObjetivo')[0].value;
            var nombre=$(this).parents().find('#InombreD')[0].value;
            var orden=$(this).parents().find('#IordenD')[0].value;
            var file = document.getElementById('archivo1').files[0];
            var band=true;
            let formData = new FormData();
            if(nombre.length<5){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
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
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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
            if (band){
                formData.append('file', file);
                formData.append("tipo", "editar_descarga");
                formData.append("id", id);
                formData.append("nombre", nombre);
                formData.append("orden", orden);
                $('.page-spinner-loader').removeClass('hide'); 
                $.ajax({
                    url: "./tables/web/alerta.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success : function(data) {
                        $('.page-spinner-loader').addClass('hide');
                        if(data=="true"){
                            $(this).prop("disabled",false); 
                            var n = noty({
                                text        : '<div class="alert alert-success "><p><strong>Se editó correctamente</p></div>',
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
                                $('#teatroDescargable').load('./tables/web/descargable.php',{var1:id1}, function() {  
                                    $('#Mteatro').modal('hide');
                                });
                        }else{
                            var n = noty({
                                text        : '<div class="alert alert-warning "><p><strong>Error no se pudo editar</p></div>',
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
                            $(".editar_descarga").prop("disabled",false); 
                        }
                    }
                  });
            }else{
                $(this).prop("disabled",false); 
            } 

        });
        
        $(document).on('click', '.cancelar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.alquilerP').removeClass('hide');
            $('.alquilerS').addClass('hide');
        });
        //boton e
        //boton eliminar
        $(document).on('click', '.eliminarTabla', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/web/alerta.php', {tipo:"eliminarTabla", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
        $(document).on('click', '.eliminarGaleria', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idGaleria')[0].innerHTML;
            var id1=$(this).parents().find('#EidObjetivo')[0].value;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/web/alerta.php', {tipo:"eliminarGaleria", id:id,id1:id1},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
        $(document).on('click', '.eliminarDescarga', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idDescarga')[0].innerHTML;
            var id1=$(this).parents().find('#EidObjetivo')[0].value;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/web/alerta.php', {tipo:"eliminarDescarga", id:id,id1:id1},function() {    
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

        //imagenes
        $(document).on('click', '.guardarBalquiler', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.Balquiler').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1396 | image1.height.toFixed(0) != 390) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1396 x 390</p></div>',
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
            }else{
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccioné una imagen</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarImagen",tipo2:"Balquiler", Himagen:Himagen,},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarBambiental', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.Bambiental').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1396 | image1.height.toFixed(0) != 390) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1396 x 390</p></div>',
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
            }else{
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccioné una imagen</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarImagen",tipo2:"Bambiental", Himagen:Himagen,},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarBamigos', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.Bamigos').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1396 | image1.height.toFixed(0) != 390) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1396 x 390</p></div>',
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
            }else{
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccioné una imagen</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarImagen",tipo2:"Bamigos", Himagen:Himagen,},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarBcontacto', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.Bcontacto').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1396 | image1.height.toFixed(0) != 390) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1396 x 390</p></div>',
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
            }else{
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccioné una imagen</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarImagen",tipo2:"Bcontacto", Himagen:Himagen,},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarBfundacion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.Bfundacion').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1396 | image1.height.toFixed(0) != 390) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1396 x 390</p></div>',
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
            }else{
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccioné una imagen</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarImagen",tipo2:"Bfundacion", Himagen:Himagen,},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarBpreguntas', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.Bpreguntas').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1396 | image1.height.toFixed(0) != 390) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1396 x 390</p></div>',
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
            }else{
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccioné una imagen</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarImagen",tipo2:"Bpreguntas", Himagen:Himagen,},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarBnoticias', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.Bnoticias').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1396 | image1.height.toFixed(0) != 390) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1396 x 390</p></div>',
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
            }else{
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccioné una imagen</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarImagen",tipo2:"Bnoticias", Himagen:Himagen,},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarBteatro', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.Bteatro').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1396 | image1.height.toFixed(0) != 390) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1396 x 390</p></div>',
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
            }else{
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccioné una imagen</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarImagen",tipo2:"Bteatro", Himagen:Himagen,},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarBcafe', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.Bcafe').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1396 | image1.height.toFixed(0) != 390) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1396 x 390</p></div>',
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
            }else{
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccioné una imagen</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarImagen",tipo2:"Bcafe", Himagen:Himagen,},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarBpromociones', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.Bpromociones').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1396 | image1.height.toFixed(0) != 390) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1396 x 390</p></div>',
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
            }else{
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccioné una imagen</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarImagen",tipo2:"Bpromociones", Himagen:Himagen,},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarimagenP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.imagenP').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 512 | image1.height.toFixed(0) != 768) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 512 x 768</p></div>',
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
            }else{
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccioné una imagen</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarImagen",tipo2:"imagenP", Himagen:Himagen,},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarBannerW', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.BannerW').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1018 | image1.height.toFixed(0) != 120) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1018 x 120</p></div>',
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
            }else{
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccioné una imagen</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarImagen",tipo2:"BannerW", Himagen:Himagen,},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.guardarBannerM', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var imagen=$(this).parents().find('.BannerM').children()[0];
            var Himagen="";
            var band=true;
            if (imagen != null) {
                Himagen = imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 750 | image1.height.toFixed(0) != 220) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 750 x 220</p></div>',
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
            }else{
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccioné una imagen</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarImagen",tipo2:"BannerM", Himagen:Himagen,},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.crearInformacionA', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_informacionA.php',  function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarInformacionA', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_informacionA.php', {var1:id.innerHTML}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_InformacionA', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var descripcion=$(this).parents().find('#Idescripcion')[0].value;
            var orden=$(this).parents().find('#Iorden')[0].value;
            var band=true;      
            if(descripcion.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese descripción correcta</p></div>',
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
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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

            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"crear_InformacionA",descripcion:descripcion,orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 

        });
        $(document).on('click', '.editar_informacionA', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#EidObjetivo')[0].value;
            var descripcion=$(this).parents().find('#Idescripcion')[0].value;
            var orden=$(this).parents().find('#Iorden')[0].value;
            var band=true;
        
            if(descripcion.length<3){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese descripción correcta</p></div>',
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
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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
            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"editar_informacionA",id:id,descripcion:descripcion,orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.crearPublicidad', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_publicidad.php',  function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarPublicidad', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_publicidad.php', {var1:id.innerHTML}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_publicidad', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var nombre=$(this).parents().find('#Inombre')[0].value;
            var tipo=$(this).parents().find('#Itipo')[0].value;
            var link=$(this).parents().find('#Ilink')[0].value;
            var orden=$(this).parents().find('#Iorden')[0].value;
            var imagen = document.getElementById('imagen_load');
            var band=true;
            var Himagen="";
            if (imagen != null) {
                Himagen =imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if(tipo=="P"){
                    if (image1.width.toFixed(0) != 204 | image1.height.toFixed(0) != 348) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 204 x 348</p></div>',
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
                } else{
                    if (image1.width.toFixed(0) != 204 | image1.height.toFixed(0) != 230) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 204 x 230</p></div>',
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
            }else{
                band=false;
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccione una Imagen</p></div>',
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
            }
            if(nombre.length<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
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
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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

            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"crear_publicidad",nombre:nombre, Himagen:Himagen , tipo2:tipo, link:link,orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 

        });
        $(document).on('click', '.editar_publicidad', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#EidObjetivo')[0].value;
            var nombre=$(this).parents().find('#Inombre')[0].value;
            var tipo=$(this).parents().find('#Itipo')[0].value;
            var link=$(this).parents().find('#Ilink')[0].value;
            var orden=$(this).parents().find('#Iorden')[0].value;
            var imagen = document.getElementById('imagen_load');
            var band=true;
            var Himagen="";
            if (imagen != null) {
                Himagen =imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if(tipo=="P"){
                    if (image1.width.toFixed(0) != 204 | image1.height.toFixed(0) != 348) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 204 x 348</p></div>',
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
                } else{
                    if (image1.width.toFixed(0) != 204 | image1.height.toFixed(0) != 230) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 204 x 230</p></div>',
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
            }
            if(nombre.length<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
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
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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

            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"editar_publicidad",id:id, nombre:nombre, Himagen:Himagen , tipo2:tipo, link:link,orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.crearBannerP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/crear_bannerP.php',  function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarBannerP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Mteatro').load('./tables/web/editar_bannerP.php', {var1:id.innerHTML}, function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Mteatro').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_bannerP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var nombre=$(this).parents().find('#Inombre')[0].value;
            var nombre_boton=$(this).parents().find('#InombreB')[0].value;
            var descripcion=$(this).parents().find('#Idescripcion')[0].value;
            var link=$(this).parents().find('#Ilink')[0].value;
            var orden=$(this).parents().find('#Iorden')[0].value;
            var imagen = document.getElementById('imagen_load');
            var band=true;
            var Himagen="";
            if (imagen != null) {
                Himagen =imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1396 | image1.height.toFixed(0) != 614) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1396 x 614</p></div>',
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
            }else{
                band=false;
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccione una Imagen</p></div>',
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
            }
            if(nombre.length<1 ){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese título correcto</p></div>',
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
            if(nombre_boton.length<1 ){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
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
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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

            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"crear_bannerP",nombre:nombre, Himagen:Himagen , nombre_boton:nombre_boton,descripcion:descripcion, link:link,orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 

        });
        $(document).on('click', '.editar_bannerP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#EidObjetivo')[0].value;
            var nombre=$(this).parents().find('#Inombre')[0].value;
            var nombre_boton=$(this).parents().find('#InombreB')[0].value;
            var descripcion=$(this).parents().find('#Idescripcion')[0].value;
            var link=$(this).parents().find('#Ilink')[0].value;
            var orden=$(this).parents().find('#Iorden')[0].value;
            var imagen = document.getElementById('imagen_load');
            var band=true;
            var Himagen="";
            if (imagen != null) {
                Himagen =imagen.src;
                var image1 = new Image();
                image1.src = Himagen;
                if (image1.width.toFixed(0) != 1396 | image1.height.toFixed(0) != 614) {
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>La Imagen debe ser: 1396 x 614</p></div>',
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
            if(nombre.length<1 ){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese título correcto</p></div>',
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
            if(nombre_boton.length<1 ){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese nombre correcto</p></div>',
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
            if(orden<1){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese orden correcto</p></div>',
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

            if (band){
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/web/alerta.php', {tipo:"editar_bannerP",nombre:nombre,id:id, Himagen:Himagen , nombre_boton:nombre_boton,descripcion:descripcion, link:link,orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false); 
            } 
        });



        $(document).on('click', '.eliminarInformacionA', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/web/alerta.php', {tipo:"eliminarInformacionA", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
        $(document).on('click', '.eliminarBannerP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/web/alerta.php', {tipo:"eliminarBannerP", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
        $(document).on('click', '.eliminarPublicidad', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#idObjetivo')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/web/alerta.php', {tipo:"eliminarPublicidad", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
        $(document).on('click', '.guardarUrl', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var url=$(this).parents().find('#urlR')[0].value;
            if (confirm("Estas seguro de editar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/web/alerta.php', {tipo:"guardarUrl", url:url},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
        $(document).on('click', '.estadoIP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents().find('#box')[0];
 
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php', {tipo:"estadoIP", estado:"I"},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php',{tipo:"estadoIP", estado:"A"},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
           // $(this).prop("disabled",false);
        });
        $(document).on('click', '.estadoInstalacion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('#box')[0];
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php', {tipo:"estadoInstalacion", estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php',{tipo:"estadoInstalacion", estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
           // $(this).prop("disabled",false);
        });
        $(document).on('click', '.estadoBannerP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('#box')[0];
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php', {tipo:"estadoBannerP", estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php',{tipo:"estadoBannerP", estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
           // $(this).prop("disabled",false);
        });
        $(document).on('click', '.estadoPublicidad', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('#box')[0];
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php', {tipo:"estadoPublicidad", estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php',{tipo:"estadoPublicidad", estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
        });
        $(document).on('click', '.estadoDescarga', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('#box')[0];
            var id=$(this).parents('tr').find('#idDescarga')[0].innerHTML;
            var id1=$(this).parents().find('#EidObjetivo')[0].value;
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php', {tipo:"estadoDescarga", estado:"I", id:id,id1:id1},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php',{tipo:"estadoDescarga", estado:"A", id:id,id1:id1},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
        });
        $(document).on('click', '.estadoGaleria', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('#box')[0];
            var id=$(this).parents('tr').find('#idGaleria')[0].innerHTML;
            var id1=$(this).parents().find('#EidObjetivo')[0].value;
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php', {tipo:"estadoGaleria", estado:"I", id:id,id1:id1},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php',{tipo:"estadoGaleria", estado:"A", id:id,id1:id1},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
        });
        $(document).on('click', '.estadoG', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            console.log(id);
            var estado=$(this).parents('tr').find('#box')[0];
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php', {tipo:"estadoG", estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php', {tipo:"estadoG", estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');    
                    });
                    
                }
            }
            
        });
        $(document).on('click', '.eliminarG', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('#alerta').load('./tables/web/alerta.php', {tipo:"estadoG", estado:"B", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }  
        });
        $(document).on('click', '.estadoA', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            console.log(id);
            var estado=$(this).parents('tr').find('#box')[0];
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php', {tipo:"estadoA", estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/web/alerta.php', {tipo:"estadoA", estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');    
                    });
                    
                }
            }
            
        });
        $(document).on('click', '.eliminarA', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('#alerta').load('./tables/web/alerta.php', {tipo:"estadoA", estado:"B", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }  
        });
      });


      $scope.$on('$destroy', function () {
        $('#table-objetivos').DataTable().clear().destroy();
        $('#table-lineas').DataTable().clear().destroy();
        $('#table-instalaciones').DataTable().clear().destroy();
        $('#table-noticias').DataTable().clear().destroy();
        $('#table-realizados').DataTable().clear().destroy();
        $('#table-preguntas').DataTable().clear().destroy();
        $('#table-ambiental').DataTable().clear().destroy();
        $('#table-preguntasA').DataTable().clear().destroy();
        $('#table-boleteria').DataTable().clear().destroy();
        $('#table-noticias').DataTable().clear().destroy();
        $('#table-cafe').DataTable().clear().destroy();
        $('#table-whatsapp').DataTable().clear().destroy();
        $('#table-publicidad').DataTable().clear().destroy();
        $('#table-informacion').DataTable().clear().destroy();
        $('#table-principalesB').DataTable().clear().destroy();
        if (CKEDITOR.instances["cke-editor"]) {
            CKEDITOR.instances["cke-editor"].destroy();
       }
       var tables = $.fn.dataTable.fnTables(true);
       $(tables).each(function () {
           $(this).dataTable().fnDestroy();
       });
        $(document).off('click','.editar_cafe');
        $(document).off('click','.guardarQuienes');
        $(document).off('click','.guardarMisionT');
        $(document).off('click','.guardarVisionT');
        $(document).off('click','.guardarQuienesF');
        $(document).off('click','.guardarProyectosT');
        $(document).off('click','.guardarMisionF');
        $(document).off('click','.guardarVisionF');
        $(document).off('click','. guardarAmigos');
        $(document).off('click','.guardarNosotrosT');
        $(document).off('click','.crearObjetivo');
        $(document).off('click','.editarObjetivo');
        $(document).off('click','.crear_objetivo');
        $(document).off('click','.editar_objetivo');
        $(document).off('click','.crearInstalacion');
        $(document).off('click','.editarInstalacion');
        $(document).off('click','.crearNoticia');
        $(document).off('click','.editarNoticia');
        $(document).off('click','.crearRealizados');
        $(document).off('click','.editarRealizados');
        $(document).off('click','.crearEspacio');
        $(document).off('click','.editarEspacio');
        $(document).off('click','.crearProyecto');
        $(document).off('click','.editarProyecto');
        $(document).off('click','.crearLineas');
        $(document).off('click','.editarLineas');
        $(document).off('click','.crearResponsabilidad');
        $(document).off('click','.editarResponsabilidad');
        $(document).off('click','.crearBeneficio');
        $(document).off('click','.editarBeneficio');
        $(document).off('click','.crearPreguntaF');
        $(document).off('click','.editarPreguntaF');
        $(document).off('click','.crearPreguntaA');
        $(document).off('click','.editarPreguntaA');
        $(document).off('click','.crearBoleteria');
        $(document).off('click','.editarBoleteria');
        $(document).off('click','.crearCafe');
        $(document).off('click','.editarCafe');
        $(document).off('click','.crearWhatsapp');
        $(document).off('click','.editarWhatsapp');
        $(document).off('click','.crear_pregunta');
        $(document).off('click','.editar_pregunta');
        $(document).off('click','.crear_tabla');
        $(document).off('click','.editar_tabla');
        $(document).off('click','.crearGaleria');
        $(document).off('click','.editarGaleria');
        $(document).off('click','.crear_galeria');
        $(document).off('click','.editar_galeria');
        $(document).off('click','.crearDescarga');
        $(document).off('click','.editarDescarga');
        $(document).off('click','.crear_descarga');
        $(document).off('click','.editar_descarga');
        $(document).off('click','.cancelar');
        $(document).off('click','.eliminarTabla');
        $(document).off('click','.eliminarGaleria');
        $(document).off('click','.eliminarDescarga');
        $(document).off('click','.eliminarPregunta');
        $(document).off('click','.guardarBalquiler');
        $(document).off('click','.guardarBambiental');
        $(document).off('click','.guardarBamigos');
        $(document).off('click','.guardarBcontacto');
        $(document).off('click','.guardarBfundacion');
        $(document).off('click','.guardarBpreguntas');
        $(document).off('click','.guardarBnoticias');
        $(document).off('click','.guardarBteatro');
        $(document).off('click','.guardarBpromociones');
        $(document).off('click','.guardarimagenP');
        $(document).off('click','.guardarBannerW');
        $(document).off('click','.guardarBannerM');
        $(document).off('click','.crearInformacionA');
        $(document).off('click','.editarInformacionA');
        $(document).off('click','.crear_InformacionA');
        $(document).off('click','.editar_informacionA');
        $(document).off('click','.crearPublicidad');
        $(document).off('click','.editarPublicidad');
        $(document).off('click','.crear_publicidad');
        $(document).off('click','.editar_publicidad');
        $(document).off('click','.crearBannerP');
        $(document).off('click','.editarBannerP');
        $(document).off('click','.crear_bannerP');
        $(document).off('click','.editar_bannerP');
        $(document).off('click','.eliminarInformacionA');
        $(document).off('click','.eliminarBannerP');
        $(document).off('click','.eliminarPublicidad');
        $(document).off('click','.estadoIP');
        $(document).off('click','.estadoInstalacion');
        $(document).off('click','.estadoBannerP');
        $(document).off('click','.estadoPublicidad');
        $(document).off('click','.estadoDescarga');
        $(document).off('click','.estadoGaleria');
        $(document).off('click','.estadoG');
        $(document).off('click','.estadoA');
      });
  }]);
