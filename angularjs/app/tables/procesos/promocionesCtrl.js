'use strict';

angular.module('newApp')
  .controller('promocionesCtrl', ['$scope','pluginsService','$location','$route', function ($scope ,pluginsService, $location,$route) {
    var oTable;

    $scope.crear_general = function () {
        $(this).prop("disabled",true); 
        $('.page-spinner-loader').removeClass('hide');
        $('#Cpromocion').load('./tables/procesos/crear_promocion_general.php',function() {    
            $('.page-spinner-loader').addClass('hide');
           $('#Cpromocion').modal('show'); // abrir
        });
        $(this).prop("disabled",false);

    }
    $scope.reload = function()
    {
    location.reload(); 
    }
    $scope.crear = function () {
        $(this).prop("disabled",true); 
        var id2=$scope.message;
        var nombre2=$scope.message2;
        $('.page-spinner-loader').removeClass('hide');
        $('#Cpromocion').load('./tables/procesos/crear_promocion.php',{var1:id2, nombre:nombre2},function() {    
            $('.page-spinner-loader').addClass('hide');
           $('#Cpromocion').modal('show'); // abrir
        });
        $(this).prop("disabled",false);
    }
    $scope.$on('$viewContentLoaded', function () {
        //CREAR PROMOCION
        $(document).on('click', '.editar', function (e) {
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr')[0].childNodes[0].innerHTML;
            var nombre=$(this).parents('tr')[0].childNodes[1].innerHTML;
            $scope.message = id;   
            $scope.message2 = nombre;   
            $('.page-spinner-loader').removeClass('hide');
           
            $('#codigo').load('./tables/procesos/tab_codigo.php', {var1:id, nombre:nombre},function() { 
                $('.page-spinner-loader').addClass('hide');
                $('.editarEvento').addClass('hide');   
                $('.tabEventos').removeClass('hide');
            });
            $('#compra').load('./tables/procesos/tab_compra.php', {var1:id, nombre:nombre},function() {    
            });
            $('#pago').load('./tables/procesos/tab_pago.php', {var1:id, nombre:nombre},function() {    
            });
            $('#tarjeta').load('./tables/procesos/tab_tarjeta.php', {var1:id, nombre:nombre},function() {    
            });
            $('#cruzados').load('./tables/procesos/tab_cruzados.php', {var1:id, nombre:nombre},function() {    
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.delete_general', function (e) {
            var id_promo=$(this).parents('tr')[0].childNodes[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr')[0].childNodes[1].innerHTML;
            var tipo=$(this).parents('tr')[0].childNodes[4].innerHTML;
            $(this).prop("disabled",true); 
            var tipo2="";
            if (tipo=="Factor de Compra/Pago"){
                tipo2="Fpago";
            }else if(tipo=="Boletos"){
                tipo2="boletos";
            }else if (tipo=="Código Promocional"){
                tipo2="Cpromocional";
            }else if (tipo=="Forma de Pago"){
                tipo2="FormaPago";
            }   
            $(this).prop("disabled",true); 
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/procesos/alerta.php', {estado:'B',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            } 
        });
        $(document).on('click', '.estado_general', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_promo=$(this).parents('tr')[0].childNodes[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr')[0].childNodes[1].innerHTML;
            var tipo=$(this).parents('tr')[0].childNodes[4].innerHTML;
            var estado=$(this).parents('tr').find('#box')[0];
            console.log(estado);
            var tipo2="";
            if (tipo=="Factor de Compra/Pago"){
                tipo2="Fpago";
            }else if(tipo=="Boletos"){
                tipo2="boletos";
            }else if (tipo=="Código Promocional"){
                tipo2="Cpromocional";
            }else if (tipo=="Forma de Pago"){
                tipo2="FormaPago";
            }   
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {estado:'I',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {estado:'A',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
        });
        $(document).on('click', '.editar_general', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_promo=$(this).parents('tr')[0].childNodes[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr')[0].childNodes[1].innerHTML;
            var tipo=$(this).parents('tr')[0].childNodes[4].innerHTML;
            $('.page-spinner-loader').removeClass('hide');
            var tipo2="";
            if (tipo=="Factor de Compra/Pago"){
                tipo2="Fpago";
            }else if(tipo=="Boletos"){
                tipo2="boletos";
            }else if (tipo=="Código Promocional"){
                tipo2="Cpromocional";
            }else if (tipo=="Forma de Pago"){
                tipo2="FormaPago";
            }   
            console.log(tipo2);
            $('#Cpromocion').load('./tables/procesos/editar_promocion_general.php',{id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cpromocion').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
    
        });
        $(document).on('click', '.crear_promocion_general', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var categoria=$(this).parents().find('#Ccategoria')[0].value;
            var nombre=$(this).parents().find('#Cnombre')[0].value;
            var descripcion=$(this).parents().find('#Cdescripcion')[0].value;
            var Cmaxima=$(this).parents().find('#Cmaxima')[0].value;
            var fechaI=$(this).parents().find('#CfechaI')[0].value;
            var fechaT=$(this).parents().find('#CfechaT')[0].value;
            var localidadG=$(this).parents().find('#Ctodos')[0].checked;
            var localidadW=$(this).parents().find('#Cweb')[0].checked;
            var localidadA=$(this).parents().find('#Capp')[0].checked;
            var localidadT=$(this).parents().find('#Ctaquilla')[0].checked;
            var tipo=$(this).parents().find('#Ctipo')[0].value;
            var estado=$(this).parents().find('#CboxA')[0];
            var amigos="";
            var band=true;
            if(estado.checked) {
                amigos="S";
            }else{
                amigos="N";
            } 
            if(localidadG | localidadW| localidadA | localidadT ) {
                band=true;
            }else{
                band=false;
                $(this).prop("disabled",false);
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Seleccione Localidad</p></div>',
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
            if(nombre.length<5){
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un nombre correcto para la promoción</p></div>',
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
            if(Cmaxima<0){
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese una cantidad válida </p></div>',
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
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese una descripción para la promoción</p></div>',
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
            if(fechaI==="" | fechaT==="" | fechaI>fechaT){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccióne fechas correctas</p></div>',
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
                if (  tipo=="none"){
                    $(this).prop("disabled",false);
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Seleccione Tipo de Promoción</p></div>',
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
                }else if ( tipo=="boletos"){
                    var desde=$(this).parents().find('#Cdesde')[0].value;
                    var hasta=$(this).parents().find('#Chasta')[0].value;
                    var descuento=$(this).parents().find('#CFCdescuento')[0].value;
                    var band2=true;
                    if(desde <= 0){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese desde que cantidad de asientos inicia la promoción</p></div>',
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
                        band2=false;
                    }
                    console.log(desde);
                    console.log(hasta);
                    if(hasta <= 0 | hasta < desde){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese hasta que cantidad de asientos inicia la promoción</p></div>',
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
                        band2=false;
                    }
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{id_evento:"1", id_platea:"1",id_funcion:"1",categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW,localidadA:localidadA,localidadT:localidadT,tipo:tipo, desde:desde, hasta:hasta, descuento:descuento, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                }else if ( tipo=="Fpago"){
                    var compra=$(this).parents().find('#Ccompra')[0].value;
                    var pago=$(this).parents().find('#Cpago')[0].value;
                    var band2=true;
                    if(compra <= 0){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese cantidad de asientos de compra</p></div>',
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
                        band2=false;
                    }
                    if(pago <= 0 | pago>compra){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese cantidad de asientos de pago</p></div>',
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
                        band2=false;
                    }

                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{id_evento:"1", id_platea:"1",id_funcion:"1",categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW,localidadA:localidadA,localidadT:localidadT,tipo:tipo, compra:compra, pago:pago, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                }else if (  tipo=="FormaPago"){
                    var tarjeta=$(this).parents().find('#Ctarjeta')[0].value;
                    var banco=$(this).parents().find('#Cbanco')[0].value;
                    var descuento=$(this).parents().find('#CTBdescuento')[0].value;
                    var band2=true;
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{id_evento:"1", id_platea:"1",id_funcion:"1",categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW,localidadA:localidadA,localidadT:localidadT,tipo:tipo, tarjeta:tarjeta, banco:banco, descuento:descuento, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }

                }else if ( tipo=="Cpromocional"){
                    var codigo=$(this).parents().find('#Ccodigo')[0].value;
                    var descuento=$(this).parents().find('#CCPdescuento')[0].value;
                    var band2=true;
                    if(codigo.length<5){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese un código de promo correcto para la promoción</p></div>',
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
                        band2=false;
                    }
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{id_evento:"1", id_platea:"1",id_funcion:"1",categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW, localidadA:localidadA, localidadT:localidadT, tipo:tipo, codigo:codigo, descuento:descuento, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                    
                }
            }else{
                $(this).prop("disabled",false);
            }
            
            
        });
        $(document).on('click', '.crear_promocion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#Cid')[0].value;
            var platea=$(this).parents().find('#Cplatea')[0].value;
            var funcion=$(this).parents().find('#Cfuncion')[0].value;
            var categoria=$(this).parents().find('#Ccategoria')[0].value;
            var nombre=$(this).parents().find('#Cnombre')[0].value;
            var descripcion=$(this).parents().find('#Cdescripcion')[0].value;
            var fechaI=$(this).parents().find('#CfechaI')[0].value;
            var fechaT=$(this).parents().find('#CfechaT')[0].value;
            var localidadG=$(this).parents().find('#Ctodos')[0].checked;
            var localidadW=$(this).parents().find('#Cweb')[0].checked;
            var localidadA=$(this).parents().find('#Capp')[0].checked;
            var localidadT=$(this).parents().find('#Ctaquilla')[0].checked;
            var tipo=$(this).parents().find('#Ctipo')[0].value;
            var Cmaxima=$(this).parents().find('#Cmaxima')[0].value;
            var estado=$(this).parents().find('#CboxA')[0];
            var amigos="";
            var band=true;
            if(estado.checked) {
                amigos="S";
            }else{
                amigos="N";
            } 
            if(localidadG | localidadW| localidadA | localidadT ) {
                band=true;
            }else{
                band=false;
                $(this).prop("disabled",false);
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Seleccione Localidad</p></div>',
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
            if(nombre.length<5){
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un nombre correcto para la promoción</p></div>',
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
            if(platea=="none"){
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccione una platea</p></div>',
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
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese una descripción para la promoción</p></div>',
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
            if(fechaI==="" | fechaT==="" | fechaI>fechaT){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccióne fechas correctas</p></div>',
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
                if (  tipo=="none"){
                    $(this).prop("disabled",false);
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Seleccione Tipo de Promoción</p></div>',
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
                }else if ( tipo=="boletos"){
                    var desde=$(this).parents().find('#Cdesde')[0].value;
                    var hasta=$(this).parents().find('#Chasta')[0].value;
                    var descuento=$(this).parents().find('#CFCdescuento')[0].value;
                    var band2=true;
                    if(desde <= 0 | desde=="" ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese desde que cantidad de asientos inicia la promoción</p></div>',
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
                        band2=false;
                    }
                    if(hasta <= 0 | hasta < desde | hasta==""){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese hasta que cantidad de asientos inicia la promoción</p></div>',
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
                        band2=false;
                    }
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{promo:"T",id_evento:id,id_platea:platea, id_funcion:funcion,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW,localidadA:localidadA,localidadT:localidadT,tipo:tipo, desde:desde, hasta:hasta, descuento:descuento, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                }else if ( tipo=="Fpago"){
                    var compra=$(this).parents().find('#Ccompra')[0].value;
                    var pago=$(this).parents().find('#Cpago')[0].value;
                    var band2=true;
                    if(compra <= 0 | compra==""){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese cantidad de asientos de compra</p></div>',
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
                        band2=false;
                    }
                    if(pago <= 0 | pago>compra | pago==""){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese cantidad de asientos de pago</p></div>',
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
                        band2=false;
                    }

                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{promo:"T",id_evento:id, id_platea:platea, id_funcion:funcion,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW,localidadA:localidadA,localidadT:localidadT,tipo:tipo, compra:compra, pago:pago, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                }else if (  tipo=="FormaPago"){
                    var tarjeta=$(this).parents().find('#Ctarjeta')[0].value;
                    var banco=$(this).parents().find('#Cbanco')[0].value;
                    var descuento=$(this).parents().find('#CTBdescuento')[0].value;
                    var band2=true;
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{promo:"T",id_evento:id, id_platea:platea, id_funcion:funcion,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW,localidadA:localidadA,localidadT:localidadT,tipo:tipo, tarjeta:tarjeta, banco:banco, descuento:descuento, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }

                }else if ( tipo=="Cpromocional"){
                    var codigo=$(this).parents().find('#Ccodigo')[0].value;
                    var descuento=$(this).parents().find('#CCPdescuento')[0].value;
                    var band2=true;
                    if(codigo.length<5){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese un código de promo correcto para la promoción</p></div>',
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
                        band2=false;
                    }
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{promo:"T",id_evento:id, id_platea:platea, id_funcion:funcion,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW, localidadA:localidadA, localidadT:localidadT, tipo:tipo, codigo:codigo, descuento:descuento, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                    
                }else if ( tipo=="cruzados"){
                    var cantidad1=$(this).parents().find('#cantidad1')[0].value;
                    var id_evento2=$(this).parents().find('#evento2')[0].value;
                    var cantidad2=$(this).parents().find('#cantidad2')[0].value;
                    var descuento=$(this).parents().find('#CRdescuento')[0].value;
                    var band2=true;
                    if(cantidad1 < 0 | cantidad2< 0 | cantidad1=="" | cantidad2==""){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese una cantidad de boletos correcta </p></div>',
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
                        band2=false;
                    }
                    if(cantidad1 == 0 && cantidad2!=0){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese una cantidad de boletos correcta </p></div>',
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
                        band2=false;
                    }
                    if(cantidad1 != 0 && cantidad2==0){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese una cantidad de boletos correcta </p></div>',
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
                        band2=false;
                    }
                    if(id_evento2 < 0){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Seleccione un evento </p></div>',
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
                        band2=false;
                    }
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{promo:"T",id_evento:id, id_platea:platea, id_funcion:funcion,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW, localidadA:localidadA, localidadT:localidadT, tipo:tipo, cantidad1:cantidad1, id_evento2:id_evento2, cantidad2:cantidad2, Cmaxima:Cmaxima, descuento:descuento},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                    
                }
            }else{
                $(this).prop("disabled",false);
            }
            
            
        });
        //EDITAR PROMOCION 
        $(document).on('click', '.editar_promocion_general', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var idPromocion=$(this).parents().find('#idPromocion')[0].value;
            var idPromocion2=$(this).parents().find('#idPromocion2')[0].value;
            var categoria=$(this).parents().find('#Ccategoria')[0].value;
            var nombre=$(this).parents().find('#Cnombre')[0].value;
            var Cmaxima=$(this).parents().find('#Cmaxima')[0].value;
            var descripcion=$(this).parents().find('#Cdescripcion')[0].value;
            var fechaI=$(this).parents().find('#CfechaI')[0].value;
            var fechaT=$(this).parents().find('#CfechaT')[0].value;
            var localidadG=$(this).parents().find('#Ctodos')[0].checked;
            var localidadW=$(this).parents().find('#Cweb')[0].checked;
            var localidadA=$(this).parents().find('#Capp')[0].checked;
            var localidadT=$(this).parents().find('#Ctaquilla')[0].checked;
            var tipo=$(this).parents().find('#Ctipo')[0].value;
            var estado=$(this).parents().find('#Cbox')[0];
            var amigos="";
            var band=true;
            if(estado.checked) {
                amigos="S";
            }else{
                amigos="N";
            } 
            if(localidadG | localidadW| localidadA | localidadT ) {
                band=true;
            }else{
                band=false;
                $(this).prop("disabled",false);
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Seleccione Localidad</p></div>',
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
            if(Cmaxima<0){
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese una cantidad válida </p></div>',
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
            if(nombre.length<5){
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un nombre correcto para la promoción</p></div>',
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
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese una descripción para la promoción</p></div>',
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
            if(fechaI==="" | fechaT==="" | fechaI>fechaT){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccióne fechas correctas</p></div>',
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
                if (  tipo=="none"){
                    $(this).prop("disabled",false);
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Seleccione Tipo de Promoción</p></div>',
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
                }else if ( tipo=="boletos"){
                    var desde=$(this).parents().find('#Cdesde')[0].value;
                    var hasta=$(this).parents().find('#Chasta')[0].value;
                    var descuento=$(this).parents().find('#CFCdescuento')[0].value;
                    var band2=true;
                    if(desde <= 0){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese desde que cantidad de asientos inicia la promoción</p></div>',
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
                        band2=false;
                    }
                    if(hasta <= 0 | hasta < desde){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese hasta que cantidad de asientos inicia la promoción</p></div>',
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
                        band2=false;
                    }
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{editar:"editar",id_evento:"1", id_platea:"1", id_funcion:"1",idPromocion:idPromocion,idPromocion2:idPromocion2,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW,localidadA:localidadA,localidadT:localidadT,tipo:tipo, desde:desde, hasta:hasta, descuento:descuento, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                }else if ( tipo=="Fpago"){
                    var compra=$(this).parents().find('#Ccompra')[0].value;
                    var pago=$(this).parents().find('#Cpago')[0].value;
                    var band2=true;
                    if(compra <= 0){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese cantidad de asientos de compra</p></div>',
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
                        band2=false;
                    }
                    if(pago <= 0 | pago > compra){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese cantidad de asientos de pago</p></div>',
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
                        band2=false;
                    }

                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{editar:"editar",id_evento:"1", id_platea:"1", id_funcion:"1",idPromocion:idPromocion,idPromocion2:idPromocion2,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW,localidadA:localidadA,localidadT:localidadT,tipo:tipo, compra:compra, pago:pago, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                }else if (  tipo=="FormaPago"){
                    var tarjeta=$(this).parents().find('#Ctarjeta')[0].value;
                    var banco=$(this).parents().find('#Cbanco')[0].value;
                    var descuento=$(this).parents().find('#CTBdescuento')[0].value;
                    var band2=true;
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{editar:"editar",id_evento:"1", id_platea:"1", id_funcion:"1",idPromocion:idPromocion,idPromocion2:idPromocion2,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW,localidadA:localidadA,localidadT:localidadT,tipo:tipo, tarjeta:tarjeta, banco:banco, descuento:descuento, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }

                }else if ( tipo=="Cpromocional"){
                    var codigo=$(this).parents().find('#Ccodigo')[0].value;
                    var descuento=$(this).parents().find('#CCPdescuento')[0].value;
                    var band2=true;
                    if(codigo.length<5){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese un código de promo correcto para la promoción</p></div>',
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
                        band2=false;
                    }
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{editar:"editar",id_evento:"1", id_platea:"1", id_funcion:"1",idPromocion:idPromocion,idPromocion2:idPromocion2,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW, localidadA:localidadA, localidadT:localidadT, tipo:tipo, codigo:codigo, descuento:descuento, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                    
                }
            }else{
                $(this).prop("disabled",false);
            }
            
            
        });
        $(document).on('click', '.editar_promocion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true);
            var id=$(this).parents().find('#Cid')[0].value;
            var platea=$(this).parents().find('#Cplatea')[0].value; 
            var funcion=$(this).parents().find('#Cfuncion')[0].value;
            var idPromocion=$(this).parents().find('#idPromocion')[0].value;
            var idPromocion2=$(this).parents().find('#idPromocion2')[0].value;
            var categoria=$(this).parents().find('#Ccategoria')[0].value;
            var nombre=$(this).parents().find('#Cnombre')[0].value;
            var descripcion=$(this).parents().find('#Cdescripcion')[0].value;
            var fechaI=$(this).parents().find('#CfechaI')[0].value;
            var fechaT=$(this).parents().find('#CfechaT')[0].value;
            var localidadG=$(this).parents().find('#Ctodos')[0].checked;
            var localidadW=$(this).parents().find('#Cweb')[0].checked;
            var localidadA=$(this).parents().find('#Capp')[0].checked;
            var localidadT=$(this).parents().find('#Ctaquilla')[0].checked;
            var tipo=$(this).parents().find('#Ctipo')[0].value;
            var Cmaxima=$(this).parents().find('#Cmaxima')[0].value;
            var estado=$(this).parents().find('#Amigosbox')[0];
            var amigos="";
            var band=true;
            if(estado.checked) {
                amigos="S";
            }else{
                amigos="N";
            } 
            if(localidadG | localidadW| localidadA | localidadT ) {
                band=true;
            }else{
                band=false;
                $(this).prop("disabled",false);
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Seleccione Localidad</p></div>',
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
            if(nombre.length<5){
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un nombre correcto para la promoción</p></div>',
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
                $(this).prop("disabled",true); 
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese una descripción para la promoción</p></div>',
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
            if(fechaI==="" | fechaT==="" | fechaI>fechaT){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccióne fechas correctas</p></div>',
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
                if (  tipo=="none"){
                    $(this).prop("disabled",false);
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Seleccione Tipo de Promoción</p></div>',
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
                }else if ( tipo=="boletos"){
                    var desde=$(this).parents().find('#Cdesde')[0].value;
                    var hasta=$(this).parents().find('#Chasta')[0].value;
                    var descuento=$(this).parents().find('#CFCdescuento')[0].value;
                    var band2=true;
                    if(desde <= 0){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese desde que cantidad de asientos inicia la promoción</p></div>',
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
                        band2=false;
                    }
                    if(hasta <= 0 | hasta < desde){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese hasta que cantidad de asientos inicia la promoción</p></div>',
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
                        band2=false;
                    }
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{editar:"editar",promo:"T",id_evento:id, id_platea:platea, id_funcion:funcion,idPromocion:idPromocion,idPromocion2:idPromocion2,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW,localidadA:localidadA,localidadT:localidadT,tipo:tipo, desde:desde, hasta:hasta, descuento:descuento, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                }else if ( tipo=="Fpago"){
                    var compra=$(this).parents().find('#Ccompra')[0].value;
                    var pago=$(this).parents().find('#Cpago')[0].value;
                    var band2=true;
                    if(compra <= 0){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese cantidad de asientos de compra</p></div>',
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
                        band2=false;
                    }
                    if(pago <= 0 | pago>compra){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese cantidad de asientos de pago</p></div>',
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
                        band2=false;
                    }

                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{editar:"editar",promo:"T",id_evento:id, id_platea:platea, id_funcion:funcion,idPromocion:idPromocion,idPromocion2:idPromocion2,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW,localidadA:localidadA,localidadT:localidadT,tipo:tipo, compra:compra, pago:pago, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                }else if (  tipo=="FormaPago"){
                    var tarjeta=$(this).parents().find('#Ctarjeta')[0].value;
                    var banco=$(this).parents().find('#Cbanco')[0].value;
                    var descuento=$(this).parents().find('#CTBdescuento')[0].value;
                    var band2=true;
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{editar:"editar",promo:"T",id_evento:id, id_platea:platea, id_funcion:funcion,idPromocion:idPromocion,idPromocion2:idPromocion2,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW,localidadA:localidadA,localidadT:localidadT,tipo:tipo, tarjeta:tarjeta, banco:banco, descuento:descuento, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }

                }else if ( tipo=="Cpromocional"){
                    var codigo=$(this).parents().find('#Ccodigo')[0].value;
                    var descuento=$(this).parents().find('#CCPdescuento')[0].value;
                    var band2=true;
                    if(codigo.length<5){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese un código de promo correcto para la promoción</p></div>',
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
                        band2=false;
                    }
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{editar:"editar",promo:"T",id_evento:id, id_platea:platea, id_funcion:funcion,idPromocion:idPromocion,idPromocion2:idPromocion2,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW, localidadA:localidadA, localidadT:localidadT, tipo:tipo, codigo:codigo, descuento:descuento, Cmaxima:Cmaxima},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                    
                }else if ( tipo=="cruzados"){
                    var cantidad1=$(this).parents().find('#cantidad1')[0].value;
                    var id_evento2=$(this).parents().find('#evento2')[0].value;
                    var cantidad2=$(this).parents().find('#cantidad2')[0].value;
                    var descuento=$(this).parents().find('#CRdescuento')[0].value;
                    var band2=true;
                    if(cantidad1 < 0 | cantidad2< 0 | cantidad1=="" | cantidad2==""){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese una cantidad de boletos correcta </p></div>',
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
                        band2=false;
                    }
                    if(cantidad1 == 0 && cantidad2!=0){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese una cantidad de boletos correcta </p></div>',
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
                        band2=false;
                    }
                    if(cantidad1 != 0 && cantidad2==0){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese una cantidad de boletos correcta </p></div>',
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
                        band2=false;
                    }
                    if(id_evento2 < 0){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Seleccione un evento </p></div>',
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
                        band2=false;
                    }
                    if(descuento <= 0 | descuento=="" | descuento > 100 ){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese porcentaje correcto de descuento de la promoción</p></div>',
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
                        band2=false;
                    }
                    if(band2){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php',{editar:"editar",promo:"T",id_evento:id, id_platea:platea, id_funcion:funcion,idPromocion:idPromocion,idPromocion2:idPromocion2,categoria:categoria, nombre:nombre, descripcion:descripcion, fechaI:fechaI,fechaT:fechaT,amigos:amigos,localidadG:localidadG,
                            localidadW:localidadW, localidadA:localidadA, localidadT:localidadT, tipo:tipo, cantidad1:cantidad1, id_evento2:id_evento2, cantidad2:cantidad2, Cmaxima:Cmaxima, descuento:descuento},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $(this).prop("disabled",false);
                    }
                    
                }
            }else{
                $(this).prop("disabled",false);
            }
            
            
        });

        //CODIGO PROMOCIONAL
        $(document).on('click', '.estadoCP', function (e) {
            $(this).prop("disabled",true); 
            var id2=$scope.message;
            var id_promo=$(this).parents('tr').find('#fila0CP')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionCP')[0].innerHTML;
            var tipo2="Cpromocional";
            var estado=$(this).parents('tr').find('#CPbox')[0];
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'I',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'A',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
        });
        $(document).on('click', '.deleteCP', function (e) {
            $(this).prop("disabled",true); 
            var id2=$scope.message;
            var id_promo=$(this).parents('tr').find('#fila0CP')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionCP')[0].innerHTML;
            var tipo2="Cpromocional";
            $(this).prop("disabled",true); 
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'B',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            } 
        });
        $(document).on('click', '.editarPromoCP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var id2=$scope.message;
            var nombre2=$scope.message2;
            var id_promo=$(this).parents('tr').find('#fila0CP')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionCP')[0].innerHTML;

            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var tipo2="Cpromocional";
            $('#Cpromocion').load('./tables/procesos/editar_promocion.php',{promo:"T",id:id2, nombre:nombre2,id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cpromocion').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
    
        });
        //
        //CODIGO COMPRA/PAGO
        $(document).on('click', '.estadoC', function (e) {
            $(this).prop("disabled",true); 
            var id2=$scope.message;
            var id_promo=$(this).parents('tr').find('#fila0C')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionC')[0].innerHTML;
            var tipo2="Fpago";
            var estado=$(this).parents('tr').find('#Cbox')[0];
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'I',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'A',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
        });
        $(document).on('click', '.deleteC', function (e) {
            $(this).prop("disabled",true); 
            var id2=$scope.message;
            var id_promo=$(this).parents('tr').find('#fila0C')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionC')[0].innerHTML;
            var tipo2="Fpago";
            $(this).prop("disabled",true); 
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'B',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            } 
        });
        $(document).on('click', '.editarPromoC', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var id2=$scope.message;
            var nombre2=$scope.message2;
            var id_promo=$(this).parents('tr').find('#fila0C')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionC')[0].innerHTML;
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var tipo2="Fpago";
            console.log(tipo2);
            $('#Cpromocion').load('./tables/procesos/editar_promocion.php',{id:id2, nombre:nombre2,id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cpromocion').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
    
        });
        //
        //CODIGO BOLETO
        $(document).on('click', '.estadoB', function (e) {
            $(this).prop("disabled",true); 
            var id2=$scope.message;
            var id_promo=$(this).parents('tr').find('#fila0B')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionB')[0].innerHTML;
            var tipo2="boletos";
            var estado=$(this).parents('tr').find('#Bbox')[0];
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'I',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'A',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
        });
        $(document).on('click', '.deleteB', function (e) {
            $(this).prop("disabled",true); 
            var id2=$scope.message;
            var id_promo=$(this).parents('tr').find('#fila0B')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionB')[0].innerHTML;
            var tipo2="boletos";
            $(this).prop("disabled",true); 
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'B',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            } 
        });
        $(document).on('click', '.editarPromoB', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var id2=$scope.message;
            var nombre2=$scope.message2;
            var id_promo=$(this).parents('tr').find('#fila0B')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionB')[0].innerHTML;

            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var tipo2="boletos";
            console.log(tipo2);
            $('#Cpromocion').load('./tables/procesos/editar_promocion.php',{id:id2, nombre:nombre2,id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cpromocion').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
    
        });
        //
        //CODIGO TARJETA/BANCO
        $(document).on('click', '.estadoT', function (e) {
            $(this).prop("disabled",true); 
            var id2=$scope.message;
            var id_promo=$(this).parents('tr').find('#fila0T')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionT')[0].innerHTML;
            var tipo2="FormaPago";
            var estado=$(this).parents('tr').find('#Tbox')[0];
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'I',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'A',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
        });
        $(document).on('click', '.deleteT', function (e) {
            $(this).prop("disabled",true); 
            var id2=$scope.message;
            var id_promo=$(this).parents('tr').find('#fila0T')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionT')[0].innerHTML;
            var tipo2="FormaPago";
            $(this).prop("disabled",true); 
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'B',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            } 
        });
        $(document).on('click', '.editarPromoT', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var id2=$scope.message;
            var nombre2=$scope.message2;
            var id_promo=$(this).parents('tr').find('#fila0T')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionT')[0].innerHTML;

            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var tipo2="FormaPago";
            $('#Cpromocion').load('./tables/procesos/editar_promocion.php',{id:id2, nombre:nombre2,id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cpromocion').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
    
        });
        //
        //CODIGO CRUZADOS
        $(document).on('click', '.estadoCR', function (e) {
            $(this).prop("disabled",true); 
            var id2=$scope.message;
            var id_promo=$(this).parents('tr').find('#fila0CR')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionCR')[0].innerHTML;
            var tipo2="cruzados";
            var estado=$(this).parents('tr').find('#CRbox')[0];
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'I',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'A',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
        });
        $(document).on('click', '.deleteCR', function (e) {
            $(this).prop("disabled",true); 
            var id2=$scope.message;
            var id_promo=$(this).parents('tr').find('#fila0CR')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionCR')[0].innerHTML;
            var tipo2="cruzados";
            $(this).prop("disabled",true); 
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/procesos/alerta.php', {promo:"T",id:id2, estado:'B',id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            } 
        });
        $(document).on('click', '.editarPromoCR', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var id2=$scope.message;
            var nombre2=$scope.message2;
            var id_promo=$(this).parents('tr').find('#fila0CR')[0].innerHTML;
            var id_tipoPromo=$(this).parents('tr').find('#fila0PromocionCR')[0].innerHTML;

            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var tipo2="cruzados";
            $('#Cpromocion').load('./tables/procesos/editar_promocion.php',{id:id2, nombre:nombre2,id_promo:id_promo,id_tipoPromo:id_tipoPromo,tipo:tipo2},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cpromocion').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
    
        });
        //
        $(document).on('click', '.cancelar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var table = $('#table-editable').DataTable();
            table.ajax.reload();
            $('.editarEvento').removeClass('hide');   
            $('.tabEventos').addClass('hide');
        });
        //METODOS GENERALES
        //BOTON ESCOGER TIPO DE PROMO
        $(document).on('change','.tipo' ,function(e) {
            $(this).parents().find('#boletos').hide();
            $(this).parents().find('#fpago').hide();
            $(this).parents().find('#formaPago').hide();
            $(this).parents().find('#Cpromocional').hide();
            $(this).parents().find('#cruzados').hide();
            if ( this.value=="none"){

            }else if ( this.value=="boletos"){
                $(this).parents().find('#boletos').show();
            }else if ( this.value=="Fpago"){
                $(this).parents().find('#fpago').show();
            }else if ( this.value=="FormaPago"){
                $(this).parents().find('#formaPago').show();
            }else if ( this.value=="Cpromocional"){
                $(this).parents().find('#Cpromocional').show();
            }else if ( this.value=="cruzados"){
                $(this).parents().find('#cruzados').show();
            }
           
        });
        $(document).on('change','.Ctipo' ,function(e) {
            $(this).parents().find('#boletos').hide();
            $(this).parents().find('#fpago').hide();
            $(this).parents().find('#formaPago').hide();
            $(this).parents().find('#Cpromocional').hide();
            $(this).parents().find('#cruzados').hide();
            if ( this.value=="none"){

            }else if ( this.value=="boletos"){
                $(this).parents().find('#boletos').show();
            }else if ( this.value=="Fpago"){
                $(this).parents().find('#fpago').show();
            }else if ( this.value=="FormaPago"){
                $(this).parents().find('#formaPago').show();
            }else if ( this.value=="Cpromocional"){
                $(this).parents().find('#Cpromocional').show();
            }else if ( this.value=="cruzados"){
                $(this).parents().find('#cruzados').show();
            }
           
        });
        //METODO PARA  CHECK EDITAR
        $(document).on('change','.todos' ,function(e) {
            if(this.checked) {
                $(this).parents().find('#web').prop("checked", false);
                $(this).parents().find('#app').prop("checked", false);
                $(this).parents().find('#taquilla').prop("checked", false);
            }
        });
        $(document).on('change','.web',function(e) {
            $(this).parents().find('#todos').prop("checked", false);
        });
        $(document).on('change','.app' ,function(e) {
            $(this).parents().find('#todos').prop("checked", false);
        });
        $(document).on('change','.taquilla' ,function(e) {
            $(this).parents().find('#todos').prop("checked", false);
        });
        //METODO PARA CHECK CREAR
        $(document).on('change','.Ctodos' ,function(e) {
            if(this.checked) {
                $(this).parents().find('#Cweb').prop("checked", false);
                $(this).parents().find('#Capp').prop("checked", false);
                $(this).parents().find('#Ctaquilla').prop("checked", false);
            }
        });
        $(document).on('change','.Cweb',function(e) {
            $(this).parents().find('#Ctodos').prop("checked", false);
        });
        $(document).on('change','.Capp' ,function(e) {
            $(this).parents().find('#Ctodos').prop("checked", false);
        });
        $(document).on('change','.Ctaquilla' ,function(e) {
            $(this).parents().find('#Ctodos').prop("checked", false);
        });

    });

      $scope.$on('$destroy', function () {
        $('#table-editable').DataTable().clear().destroy();
        var tables = $.fn.dataTable.fnTables(true);
        $(tables).each(function () {
            $(this).dataTable().fnDestroy();
        });
        $(document).off('click','.editar');
        $(document).off('click','.delete_general');
        $(document).off('click','.estado_general');
        $(document).off('click','.editar_promocion');
        $(document).off('click','.editar_general');
        $(document).off('click','.crear_promocion_general');
        $(document).off('click','.crear_promocion');
        $(document).off('click','.editar_promocion_general');
        $(document).off('click','.editar_promocion');
        $(document).off('click','.crear_promocion');
        $(document).off('click','.estadoCP');
        $(document).off('click','.deleteCP');
        $(document).off('click','.editarPromoCP');
        $(document).off('click','.estadoC');
        $(document).off('click','.deleteC');
        $(document).off('click','.editarPromoC');
        $(document).off('click','.estadoB');
        $(document).off('click','.deleteB');
        $(document).off('click','.editarPromoB');
        $(document).off('click','.estadoT');
        $(document).off('click','.deleteT');
        $(document).off('click','.editarPromoT');
        $(document).off('click','.estadoCR');
        $(document).off('click','.deleteCR');
        $(document).off('click','.editarPromoCR');
        $(document).off('click','.cancelar');
        $(document).off('change','.tipo');
        $(document).off('change','.Ctipo');
        $(document).off('change','.web');
        $(document).off('change','.app');
        $(document).off('change','.taquilla');
        $(document).off('change','.Ctodos');
        $(document).off('change','.Cweb');
        $(document).off('change','.Capp');
        $(document).off('change','.Ctaquilla');
      });
  }]);
