'use strict';

angular.module('newApp')
  .controller('mantenimientoCtrl', ['$scope','pluginsService', function ($scope ,pluginsService) {
    var oTable;
    $(document).ready(function () {
        $(".datepicker").datetimepicker({
            locale: 'es'
        });
    });
    $scope.reload = function()
    {
    location.reload(); 
    }
    $scope.$on('$viewContentLoaded', function () {
        var yourGlobalVariable="/imagenes/";
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
            $('#categoria').load('./tables/mantenimiento/editar_mantenimiento.php', {var1:estado.innerHTML,tipo:tipo},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#categoria').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var tipo=$(this).parents().find('#tipo')[0].value;
            $('#categoria').load('./tables/mantenimiento/crear_mantenimiento.php',{tipo:tipo},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#categoria').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        //boton Secundario
        $(document).on('click', '.editar_categoria', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#Eid')[0].value;
            var tipo=$(this).parents().find('#Etipo')[0].value;
            console.log(tipo);
            var nombres=$(this).parents().find('#Enombres')[0].value;
            var nombreT=$(this).parents().find('#nombreT')[0].value;
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
            if(tipo=="Ecategoria"){
                var orden=$(this).parents().find('#Eorden')[0].value;
                if(isNaN(orden)) {
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
                }else{
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
                }
            }else{
                var orden="";
            }
            if(band){
                if (tipo=="Esala") {
                    var imagen=$(this).parents().find('#imagen_sala')[0].value;
                    console.log(imagen);
                    $('#alerta').load('./tables/mantenimiento/alerta.php', {tipo:tipo,tipo2:"editar",imagen:imagen, id:id,nombreT:nombreT, nombres:nombres, orden:orden},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }else{
                    $('#alerta').load('./tables/mantenimiento/alerta.php', {tipo:tipo,tipo2:"editar",id:id,nombreT:nombreT, nombres:nombres, orden:orden},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
            
        });
        $(document).on('click', '.crear_categoria', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var nombres=$(this).parents().find('#nombres')[0].value;
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            var tipo=$(this).parents().find('#tipo')[0].value;
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
            if(tipo=="categoria"){
                var orden=$(this).parents().find('#orden')[0].value;
                
                if(isNaN(orden)) {
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
                }else{
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
                }
            }else{
                var orden="";
            }
            if(band){
                $('#alerta').load('./tables/mantenimiento/alerta.php', {tipo:tipo,tipo2:"crear",nombreT:nombreT,nombres:nombres, orden:orden},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
           
           // $(this).prop("disabled",false);
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
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/mantenimiento/alerta.php', {tipo:tipo,tipo2:"estado",nombreT:nombreT, estado:"I", id:id},function() {    
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
                    $('#alerta').load('./tables/mantenimiento/alerta.php', {tipo:tipo,tipo2:"estado",nombreT:nombreT, estado:"A", id:id},function() {
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
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/mantenimiento/alerta.php', {tipo:tipo,tipo2:"estado",nombreT:nombreT, estado:"B", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                  // estado.checked = false;
                   //oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">Off</span> </label>', nRow, 6, false);
                  //  oTable.fnDraw();
                });
            }     
        });
       
    //MAPA
        //Boton crear Mapa Secundario
        $(document).on('click', '.editarMS', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            var id=$(this).parents('tr').find('.idMapa')[0].innerHTML;
            var tipo=$(this).parents().find('#tipo')[0].value;
            var nombre=$(this).parents('tr').find('.nombreSala')[0].innerHTML;
            console.log(tipo);
            $('.page-spinner-loader').removeClass('hide');
            $('#crearMapaS').load('./tables/mantenimiento/mapa_editar.php', {var1:estado,id:id, nombre:nombre, tipo:tipo},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#crearMapaS').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crearMS', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var tipo=$(this).parents().find('#tipo')[0].value;
            $('#crearMapaS').load('./tables/mantenimiento/mapa_crear.php',{tipo:tipo},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#crearMapaS').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        // BOTON SECUNDARIO
        $(document).on('click', '.editar_distribucionS', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#Eid')[0].value;
            var idMapa=$(this).parents().find('#Emapa')[0].value;
            var tipo=$(this).parents().find('#Etipo')[0].value;
            var nombres=$(this).parents().find('#Enombres')[0].value;
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            var imagen=$(this).parents().find('#imagen_distribucion')[0].value;
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
            if(band){
                $('#alerta').load('./tables/mantenimiento/alerta.php', {tipo:tipo,tipo2:"editar",id:id,idMapa:idMapa,imagen:imagen,nombreT:nombreT, nombres:nombres},function() {    
                    $('.page-spinner-loader').addClass('hide');
                }); 
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
               
        });
        $(document).on('click', '.crear_distribucionS', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true);
            $('.page-spinner-loader').removeClass('hide');
            var nombres=$(this).parents().find('#nombres')[0].value;
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            var idsala=$(this).parents().find('#sala')[0].value;
            var tipo=$(this).parents().find('#tipo')[0].value;
            var imagen=$(this).parents().find('#imagen_distribucion')[0].value;
            var band=true;
            if(imagen=="none"){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccióne una distribucion</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
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
            if(band){
                $('#alerta').load('./tables/mantenimiento/alerta.php', {tipo:tipo,tipo2:"crear",idsala:idsala, imagen:imagen, nombreT:nombreT,nombres:nombres},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
           
          //  $(this).prop("disabled",false);
        });
    //IMAGENES    
        $(document).on('change', '#sala', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var mapa = $(this).val();
            var image = document.getElementById('imagen');
            image.src = yourGlobalVariable+"sala/"+mapa+".png";
            $('#imagen_distribucion  option:first').prop('selected', true);

        });
        $(document).on('change', '#imagen_sala', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var mapa = $(this).val();
            var image = document.getElementById('imagen');
            image.src = yourGlobalVariable+"sala/"+mapa;
            
        });
        $(document).on('change', '#imagen_distribucion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var mapa = $(this).val();
            var image = document.getElementById('imagen');
            if(mapa=="none"){
                console.log(document.getElementById('sala'));
                var mapa1 = document.getElementById('sala').value;
               
                image.src = yourGlobalVariable+"sala/"+mapa1+".png";
            }else{
                image.src = yourGlobalVariable+"distribucion/"+mapa;
            }
            
        });
        $(document).on('click', '#Smapa', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var mapa = $(this).val();
            var image = document.getElementById('imagen1');
            image.src = yourGlobalVariable+"sala/"+mapa;
            $('#verMapa').modal('show'); // abrir
        });
        $(document).on('click', '#mapa', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var mapa = $(this).val();
            var image = document.getElementById('imagen1');
            image.src = yourGlobalVariable+"distribucion/"+mapa;
            $('#verMapa').modal('show'); // abrir
        });
        //boton de modal al cerrar
        $("#categoria").on('hidden.bs.modal', function () {
            $('#categoria').load('./tables/mantenimiento/vacio.php',function() {    
            });
        });
        $("#Ecategoria").on('hidden.bs.modal', function () {
            $('#Ecategoria').load('./tables/mantenimiento/vacio.php',function() {    
            });
        });    
          //Boton editar Mapa Pricipal
        $(document).on('click', '.editarMP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            var idMapa=$(this).parents('tr').find('.idMapa')[0].innerHTML;
            var tipo=$(this).parents().find('#tipo')[0].value;
            var nombre=$(this).parents('tr').find('.nombre')[0].innerHTML;
            var band=true;
            if(nombre.length<3){
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
            if(band){
                $('#editarMapa').load('./tables/mantenimiento/mapa_principal_editar.php', {var1:estado, idMapa:idMapa, tipo:tipo, nombre:nombre},function() {    
                    $('.page-spinner-loader').addClass('hide');
                    $('.principalG').addClass('hide');
                }); 
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }

        });
        $(document).on('click', '.crearMP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('#editarMapa').load('./tables/mantenimiento/mapa_principal_crear.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                $('.principalG').addClass('hide');
            }); 
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.add_mapa', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var nombres=$(this).parents().find('#nombres')[0].value;
            var tipo=$(this).parents().find('#tipo')[0].value;
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
            if(band){
                $('#alerta').load('./tables/mantenimiento/alerta.php', {tipo:tipo,tipo2:"crear",nombres:nombres},function() {    
                    $('.page-spinner-loader').addClass('hide');
                }); 
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
           
         //   $(this).prop("disabled",false);
        });
        $(document).on('click', '.mapaP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            var tipo=$(this).parents().find('#tipo')[0].value;
            var nombre=$(this).parents('tr')[0].childNodes[1].innerHTML;
            $('.page-spinner-loader').removeClass('hide');
            $('#verSala').load('./tables/mantenimiento/ver_sala.php', {var1:estado.innerHTML, tipo:tipo, nombre:nombre},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#verSala').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        //editar mapa principal 
            //botones de barra editar
        $(document).on('click', '#btnA', function (e) {
            var selectedItem = $("#filaA option:selected");
            var selectedItem1 = $("#filaB option:selected");
            var selectedItem2= $("#filaC option:selected");
            var selectedItem3 = $("#filaD option:selected");
            var selectedItem4 = $("#filaE option:selected");
            var selectedItem5 = $("#filaF option:selected");
            var selectedItem6 = $("#filaG option:selected");
            var selectedItem7 = $("#filaH option:selected");
            var selectedItem8 = $("#filaJ option:selected");
            var selectedItem9 = $("#filaK option:selected");
            var selectedItem10 = $("#filaL option:selected");
            var selectedItem11 = $("#filaM option:selected");
            var selectedItem12 = $("#filaN option:selected");
            var selectedItem13 = $("#filaO option:selected");
            var selectedItem14 = $("#filaP option:selected");
            var selectedItem15 = $("#filaQ option:selected");
            var selectedItem16 = $("#filaR option:selected");
            var selectedItem17 = $("#filaS option:selected");
            var selectedItem18 = $("#filaT option:selected");
            var selectedItem19 = $("#filaU option:selected");
            var selectedItem20 = $("#filaV option:selected");
            var selectedItem21 = $("#filaW option:selected");

            $("#ValuesA").append(selectedItem);
            $("#ValuesA").append(selectedItem1);
            $("#ValuesA").append(selectedItem2);
            $("#ValuesA").append(selectedItem3);
            $("#ValuesA").append(selectedItem4);
            $("#ValuesA").append(selectedItem5);
            $("#ValuesA").append(selectedItem6);
            $("#ValuesA").append(selectedItem7);
            $("#ValuesA").append(selectedItem8);
            $("#ValuesA").append(selectedItem9);
            $("#ValuesA").append(selectedItem10);
            $("#ValuesA").append(selectedItem11);
            $("#ValuesA").append(selectedItem12);
            $("#ValuesA").append(selectedItem13);
            $("#ValuesA").append(selectedItem14);
            $("#ValuesA").append(selectedItem15);
            $("#ValuesA").append(selectedItem16);
            $("#ValuesA").append(selectedItem17);
            $("#ValuesA").append(selectedItem18);
            $("#ValuesA").append(selectedItem19);
            $("#ValuesA").append(selectedItem20);
            $("#ValuesA").append(selectedItem21);
            $("#ValuesA option").prop("selected", false);
             var Values = $("#ValuesA option");
            calculaAsiento(Values, "A")
        });
        $(document).on('click', '#btnB', function (e) {
            var selectedItem = $("#filaA option:selected");
            var selectedItem1 = $("#filaB option:selected");
            var selectedItem2= $("#filaC option:selected");
            var selectedItem3 = $("#filaD option:selected");
            var selectedItem4 = $("#filaE option:selected");
            var selectedItem5 = $("#filaF option:selected");
            var selectedItem6 = $("#filaG option:selected");
            var selectedItem7 = $("#filaH option:selected");
            var selectedItem8 = $("#filaJ option:selected");
            var selectedItem9 = $("#filaK option:selected");
            var selectedItem10 = $("#filaL option:selected");
            var selectedItem11 = $("#filaM option:selected");
            var selectedItem12 = $("#filaN option:selected");
            var selectedItem13 = $("#filaO option:selected");
            var selectedItem14 = $("#filaP option:selected");
            var selectedItem15 = $("#filaQ option:selected");
            var selectedItem16 = $("#filaR option:selected");
            var selectedItem17 = $("#filaS option:selected");
            var selectedItem18 = $("#filaT option:selected");
            var selectedItem19 = $("#filaU option:selected");
            var selectedItem20 = $("#filaV option:selected");
            var selectedItem21 = $("#filaW option:selected");

            $("#ValuesB").append(selectedItem);
            $("#ValuesB").append(selectedItem1);
            $("#ValuesB").append(selectedItem2);
            $("#ValuesB").append(selectedItem3);
            $("#ValuesB").append(selectedItem4);
            $("#ValuesB").append(selectedItem5);
            $("#ValuesB").append(selectedItem6);
            $("#ValuesB").append(selectedItem7);
            $("#ValuesB").append(selectedItem8);
            $("#ValuesB").append(selectedItem9);
            $("#ValuesB").append(selectedItem10);
            $("#ValuesB").append(selectedItem11);
            $("#ValuesB").append(selectedItem12);
            $("#ValuesB").append(selectedItem13);
            $("#ValuesB").append(selectedItem14);
            $("#ValuesB").append(selectedItem15);
            $("#ValuesB").append(selectedItem16);
            $("#ValuesB").append(selectedItem17);
            $("#ValuesB").append(selectedItem18);
            $("#ValuesB").append(selectedItem19);
            $("#ValuesB").append(selectedItem20);
            $("#ValuesB").append(selectedItem21);
            $("#ValuesB option").prop("selected", false);
            var Values = $("#ValuesB option");
            calculaAsiento(Values, "B")
        });
        $(document).on('click', '#btnC', function (e) {
            var selectedItem = $("#filaA option:selected");
            var selectedItem1 = $("#filaB option:selected");
            var selectedItem2= $("#filaC option:selected");
            var selectedItem3 = $("#filaD option:selected");
            var selectedItem4 = $("#filaE option:selected");
            var selectedItem5 = $("#filaF option:selected");
            var selectedItem6 = $("#filaG option:selected");
            var selectedItem7 = $("#filaH option:selected");
            var selectedItem8 = $("#filaJ option:selected");
            var selectedItem9 = $("#filaK option:selected");
            var selectedItem10 = $("#filaL option:selected");
            var selectedItem11 = $("#filaM option:selected");
            var selectedItem12 = $("#filaN option:selected");
            var selectedItem13 = $("#filaO option:selected");
            var selectedItem14 = $("#filaP option:selected");
            var selectedItem15 = $("#filaQ option:selected");
            var selectedItem16 = $("#filaR option:selected");
            var selectedItem17 = $("#filaS option:selected");
            var selectedItem18 = $("#filaT option:selected");
            var selectedItem19 = $("#filaU option:selected");
            var selectedItem20 = $("#filaV option:selected");
            var selectedItem21 = $("#filaW option:selected");

            $("#ValuesC").append(selectedItem);
            $("#ValuesC").append(selectedItem1);
            $("#ValuesC").append(selectedItem2);
            $("#ValuesC").append(selectedItem3);
            $("#ValuesC").append(selectedItem4);
            $("#ValuesC").append(selectedItem5);
            $("#ValuesC").append(selectedItem6);
            $("#ValuesC").append(selectedItem7);
            $("#ValuesC").append(selectedItem8);
            $("#ValuesC").append(selectedItem9);
            $("#ValuesC").append(selectedItem10);
            $("#ValuesC").append(selectedItem11);
            $("#ValuesC").append(selectedItem12);
            $("#ValuesC").append(selectedItem13);
            $("#ValuesC").append(selectedItem14);
            $("#ValuesC").append(selectedItem15);
            $("#ValuesC").append(selectedItem16);
            $("#ValuesC").append(selectedItem17);
            $("#ValuesC").append(selectedItem18);
            $("#ValuesC").append(selectedItem19);
            $("#ValuesC").append(selectedItem20);
            $("#ValuesC").append(selectedItem21);
            $("#ValuesC option").prop("selected", false);
            var Values = $("#ValuesC option");
            calculaAsiento(Values, "C")
        });
        $(document).on('click', '#btnD', function (e) {
            var selectedItem = $("#filaA option:selected");
            var selectedItem1 = $("#filaB option:selected");
            var selectedItem2= $("#filaC option:selected");
            var selectedItem3 = $("#filaD option:selected");
            var selectedItem4 = $("#filaE option:selected");
            var selectedItem5 = $("#filaF option:selected");
            var selectedItem6 = $("#filaG option:selected");
            var selectedItem7 = $("#filaH option:selected");
            var selectedItem8 = $("#filaJ option:selected");
            var selectedItem9 = $("#filaK option:selected");
            var selectedItem10 = $("#filaL option:selected");
            var selectedItem11 = $("#filaM option:selected");
            var selectedItem12 = $("#filaN option:selected");
            var selectedItem13 = $("#filaO option:selected");
            var selectedItem14 = $("#filaP option:selected");
            var selectedItem15 = $("#filaQ option:selected");
            var selectedItem16 = $("#filaR option:selected");
            var selectedItem17 = $("#filaS option:selected");
            var selectedItem18 = $("#filaT option:selected");
            var selectedItem19 = $("#filaU option:selected");
            var selectedItem20 = $("#filaV option:selected");
            var selectedItem21 = $("#filaW option:selected");

            $("#ValuesD").append(selectedItem);
            $("#ValuesD").append(selectedItem1);
            $("#ValuesD").append(selectedItem2);
            $("#ValuesD").append(selectedItem3);
            $("#ValuesD").append(selectedItem4);
            $("#ValuesD").append(selectedItem5);
            $("#ValuesD").append(selectedItem6);
            $("#ValuesD").append(selectedItem7);
            $("#ValuesD").append(selectedItem8);
            $("#ValuesD").append(selectedItem9);
            $("#ValuesD").append(selectedItem10);
            $("#ValuesD").append(selectedItem11);
            $("#ValuesD").append(selectedItem12);
            $("#ValuesD").append(selectedItem13);
            $("#ValuesD").append(selectedItem14);
            $("#ValuesD").append(selectedItem15);
            $("#ValuesD").append(selectedItem16);
            $("#ValuesD").append(selectedItem17);
            $("#ValuesD").append(selectedItem18);
            $("#ValuesD").append(selectedItem19);
            $("#ValuesD").append(selectedItem20);
            $("#ValuesD").append(selectedItem21);
            $("#ValuesD option").prop("selected", false);
            var Values = $("#ValuesD option");
            calculaAsiento(Values, "D")
        });
        $(document).on('click', '#btnE', function (e) {
            var selectedItem = $("#filaA option:selected");
            var selectedItem1 = $("#filaB option:selected");
            var selectedItem2= $("#filaC option:selected");
            var selectedItem3 = $("#filaD option:selected");
            var selectedItem4 = $("#filaE option:selected");
            var selectedItem5 = $("#filaF option:selected");
            var selectedItem6 = $("#filaG option:selected");
            var selectedItem7 = $("#filaH option:selected");
            var selectedItem8 = $("#filaJ option:selected");
            var selectedItem9 = $("#filaK option:selected");
            var selectedItem10 = $("#filaL option:selected");
            var selectedItem11 = $("#filaM option:selected");
            var selectedItem12 = $("#filaN option:selected");
            var selectedItem13 = $("#filaO option:selected");
            var selectedItem14 = $("#filaP option:selected");
            var selectedItem15 = $("#filaQ option:selected");
            var selectedItem16 = $("#filaR option:selected");
            var selectedItem17 = $("#filaS option:selected");
            var selectedItem18 = $("#filaT option:selected");
            var selectedItem19 = $("#filaU option:selected");
            var selectedItem20 = $("#filaV option:selected");
            var selectedItem21 = $("#filaW option:selected");

            $("#ValuesE").append(selectedItem);
            $("#ValuesE").append(selectedItem1);
            $("#ValuesE").append(selectedItem2);
            $("#ValuesE").append(selectedItem3);
            $("#ValuesE").append(selectedItem4);
            $("#ValuesE").append(selectedItem5);
            $("#ValuesE").append(selectedItem6);
            $("#ValuesE").append(selectedItem7);
            $("#ValuesE").append(selectedItem8);
            $("#ValuesE").append(selectedItem9);
            $("#ValuesE").append(selectedItem10);
            $("#ValuesE").append(selectedItem11);
            $("#ValuesE").append(selectedItem12);
            $("#ValuesE").append(selectedItem13);
            $("#ValuesE").append(selectedItem14);
            $("#ValuesE").append(selectedItem15);
            $("#ValuesE").append(selectedItem16);
            $("#ValuesE").append(selectedItem17);
            $("#ValuesE").append(selectedItem18);
            $("#ValuesE").append(selectedItem19);
            $("#ValuesE").append(selectedItem20);
            $("#ValuesE").append(selectedItem21);
            $("#ValuesE option").prop("selected", false);
            var Values = $("#ValuesE option");
            calculaAsiento(Values, "E")
        });
        $(document).on('click', '#btnF', function (e) {
            var selectedItem = $("#filaA option:selected");
            var selectedItem1 = $("#filaB option:selected");
            var selectedItem2= $("#filaC option:selected");
            var selectedItem3 = $("#filaD option:selected");
            var selectedItem4 = $("#filaE option:selected");
            var selectedItem5 = $("#filaF option:selected");
            var selectedItem6 = $("#filaG option:selected");
            var selectedItem7 = $("#filaH option:selected");
            var selectedItem8 = $("#filaJ option:selected");
            var selectedItem9 = $("#filaK option:selected");
            var selectedItem10 = $("#filaL option:selected");
            var selectedItem11 = $("#filaM option:selected");
            var selectedItem12 = $("#filaN option:selected");
            var selectedItem13 = $("#filaO option:selected");
            var selectedItem14 = $("#filaP option:selected");
            var selectedItem15 = $("#filaQ option:selected");
            var selectedItem16 = $("#filaR option:selected");
            var selectedItem17 = $("#filaS option:selected");
            var selectedItem18 = $("#filaT option:selected");
            var selectedItem19 = $("#filaU option:selected");
            var selectedItem20 = $("#filaV option:selected");
            var selectedItem21 = $("#filaW option:selected");

            $("#ValuesF").append(selectedItem);
            $("#ValuesF").append(selectedItem1);
            $("#ValuesF").append(selectedItem2);
            $("#ValuesF").append(selectedItem3);
            $("#ValuesF").append(selectedItem4);
            $("#ValuesF").append(selectedItem5);
            $("#ValuesF").append(selectedItem6);
            $("#ValuesF").append(selectedItem7);
            $("#ValuesF").append(selectedItem8);
            $("#ValuesF").append(selectedItem9);
            $("#ValuesF").append(selectedItem10);
            $("#ValuesF").append(selectedItem11);
            $("#ValuesF").append(selectedItem12);
            $("#ValuesF").append(selectedItem13);
            $("#ValuesF").append(selectedItem14);
            $("#ValuesF").append(selectedItem15);
            $("#ValuesF").append(selectedItem16);
            $("#ValuesF").append(selectedItem17);
            $("#ValuesF").append(selectedItem18);
            $("#ValuesF").append(selectedItem19);
            $("#ValuesF").append(selectedItem20);
            $("#ValuesF").append(selectedItem21);
            $("#ValuesF option").prop("selected", false);
            var Values = $("#ValuesF option");
            calculaAsiento(Values, "F")
        }); 
        $(document).on('click', '#btnAll', function (e) {
            var selectedItem = $("#filaA  option");
            var selectedItem1 = $("#filaB  option");
            var selectedItem2= $("#filaC  option");
            var selectedItem3 = $("#filaD  option");
            var selectedItem4 = $("#filaE  option");
            var selectedItem5 = $("#filaF  option");
            var selectedItem6 = $("#filaG  option");
            var selectedItem7 = $("#filaH  option");
            var selectedItem8 = $("#filaJ  option");
            var selectedItem9 = $("#filaK  option");
            var selectedItem10 = $("#filaL  option");
            var selectedItem11 = $("#filaM  option");
            var selectedItem12 = $("#filaN  option");
            var selectedItem13 = $("#filaO  option");
            var selectedItem14 = $("#filaP  option");
            var selectedItem15 = $("#filaQ  option");
            var selectedItem16 = $("#filaR  option");
            var selectedItem17 = $("#filaS  option");
            var selectedItem18 = $("#filaT  option");
            var selectedItem19 = $("#filaU  option");
            var selectedItem20 = $("#filaV  option");
            var selectedItem21 = $("#filaW  option");

            $("#ValuesA").append(selectedItem);
            $("#ValuesA").append(selectedItem1);
            $("#ValuesA").append(selectedItem2);
            $("#ValuesA").append(selectedItem3);
            $("#ValuesA").append(selectedItem4);
            $("#ValuesA").append(selectedItem5);
            $("#ValuesA").append(selectedItem6);
            $("#ValuesA").append(selectedItem7);
            $("#ValuesA").append(selectedItem8);
            $("#ValuesA").append(selectedItem9);
            $("#ValuesA").append(selectedItem10);
            $("#ValuesA").append(selectedItem11);
            $("#ValuesA").append(selectedItem12);
            $("#ValuesA").append(selectedItem13);
            $("#ValuesA").append(selectedItem14);
            $("#ValuesA").append(selectedItem15);
            $("#ValuesA").append(selectedItem16);
            $("#ValuesA").append(selectedItem17);
            $("#ValuesA").append(selectedItem18);
            $("#ValuesA").append(selectedItem19);
            $("#ValuesA").append(selectedItem20);
            $("#ValuesA").append(selectedItem21);
            var Values = $("#ValuesA option");
            calculaAsiento(Values, "A")
        });    
        $(document).on('click', '#btnReturn', function (e) {
            var selectedItem = $("#ValuesA  option:selected");
            var selectedItem1 = $("#ValuesB  option:selected");
            var selectedItem2= $("#ValuesC  option:selected");
            var selectedItem3 = $("#ValuesD  option:selected");
            var selectedItem4 = $("#ValuesE  option:selected");
            var selectedItem5 = $("#ValuesF  option:selected");
        
            calculaFila(selectedItem.prop("selected", false));
            calculaFila(selectedItem1.prop("selected", false));
            calculaFila(selectedItem2.prop("selected", false));
            calculaFila(selectedItem3.prop("selected", false));
            calculaFila(selectedItem4.prop("selected", false));
            calculaFila(selectedItem5.prop("selected", false));
            
            calculaAsiento(selectedItem, "A");
            calculaAsiento(selectedItem1, "A");
            calculaAsiento(selectedItem2, "A");
            calculaAsiento(selectedItem3, "A");
            calculaAsiento(selectedItem4, "A");
            calculaAsiento(selectedItem5, "A");
        });
        $(document).on('click', '#btnReturnAll', function (e) {
            var selectedItem = $("#ValuesA  option");
            var selectedItem1 = $("#ValuesB  option");
            var selectedItem2= $("#ValuesC  option");
            var selectedItem3 = $("#ValuesD  option");
            var selectedItem4 = $("#ValuesE  option");
            var selectedItem5 = $("#ValuesF  option");
            calculaFila(selectedItem);
            calculaFila(selectedItem1);
            calculaFila(selectedItem2);
            calculaFila(selectedItem3);
            calculaFila(selectedItem4);
            calculaFila(selectedItem5);
            
            calculaAsiento(selectedItem, "A");
            calculaAsiento(selectedItem1, "A");
            calculaAsiento(selectedItem2, "A");
            calculaAsiento(selectedItem3, "A");
            calculaAsiento(selectedItem4, "A");
            calculaAsiento(selectedItem5, "A");
        });
            //botones de cambio
        $(document).on('click', '#guardarD', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var selectedItem = $("#filaA  option");
            var selectedItem1 = $("#filaB  option");
            var selectedItem2= $("#filaC  option");
            var selectedItem3 = $("#filaD  option");
            var selectedItem4 = $("#filaE  option");
            var selectedItem5 = $("#filaF  option");
            var selectedItem6 = $("#filaG  option");
            var selectedItem7 = $("#filaH  option");
            var selectedItem8 = $("#filaJ  option");
            var selectedItem9 = $("#filaK  option");
            var selectedItem10 = $("#filaL  option");
            var selectedItem11 = $("#filaM  option");
            var selectedItem12 = $("#filaN  option");
            var selectedItem13 = $("#filaO  option");
            var selectedItem14 = $("#filaP  option");
            var selectedItem15 = $("#filaQ  option");
            var selectedItem16 = $("#filaR  option");
            var selectedItem17 = $("#filaS  option");
            var selectedItem18 = $("#filaT  option");
            var selectedItem19 = $("#filaU  option");
            var selectedItem20 = $("#filaV  option");
            var selectedItem21 = $("#filaW  option");
            
            var valueA = $("#ValuesA  option");
            var valueB = $("#ValuesB  option");
            var valueC= $("#ValuesC  option");
            var valueD = $("#ValuesD  option");
            var valueE = $("#ValuesE  option");
            var valueF = $("#ValuesF  option");

            if(isVacio(selectedItem) && isVacio(selectedItem1) && isVacio(selectedItem2) && isVacio(selectedItem3)&& isVacio(selectedItem4) && isVacio(selectedItem5) && isVacio(selectedItem6) 
            && isVacio(selectedItem7) && isVacio(selectedItem8) && isVacio(selectedItem9)&& isVacio(selectedItem10) && isVacio(selectedItem11) && isVacio(selectedItem12) 
            && isVacio(selectedItem13) && isVacio(selectedItem14) && isVacio(selectedItem15)&& isVacio(selectedItem16) && isVacio(selectedItem17) && isVacio(selectedItem18)
            && isVacio(selectedItem19) && isVacio(selectedItem20) && isVacio(selectedItem21)  ){
                const valuesA = Array.from(valueA).map(el => el.value);
                const valuesB = Array.from(valueB).map(el => el.value);
                const valuesC = Array.from(valueC).map(el => el.value);
                const valuesD = Array.from(valueD).map(el => el.value);
                const valuesE = Array.from(valueE).map(el => el.value);
                const valuesF = Array.from(valueF).map(el => el.value);
                var asientos="A:"+valuesA+"; B:"+valuesB+";C:"+valuesC+"; D:"+valuesD+";E:"+valuesE+"; F:"+valuesF;
                $('.page-spinner-loader').removeClass('hide');
                var nombres=$(this).parents().find('#nombres')[0].value;
                var tipo=$(this).parents().find('#tipo')[0].value;
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
                if(band){
                    $('#alerta').load('./tables/mantenimiento/alerta.php', {tipo:tipo,tipo2:"crearBP",asientos:asientos,nombres:nombres},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }else{
                    $('.page-spinner-loader').addClass('hide');
                    $(this).prop("disabled",false); 
                }

            }else{
                alert('Seleccione Todos los Asientos de cada Area');
            }   
            $(this).prop("disabled",false);   
        });
        $(document).on('click', '#editarD', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var selectedItem = $("#filaA  option");
            var selectedItem1 = $("#filaB  option");
            var selectedItem2= $("#filaC  option");
            var selectedItem3 = $("#filaD  option");
            var selectedItem4 = $("#filaE  option");
            var selectedItem5 = $("#filaF  option");
            var selectedItem6 = $("#filaG  option");
            var selectedItem7 = $("#filaH  option");
            var selectedItem8 = $("#filaJ  option");
            var selectedItem9 = $("#filaK  option");
            var selectedItem10 = $("#filaL  option");
            var selectedItem11 = $("#filaM  option");
            var selectedItem12 = $("#filaN  option");
            var selectedItem13 = $("#filaO  option");
            var selectedItem14 = $("#filaP  option");
            var selectedItem15 = $("#filaQ  option");
            var selectedItem16 = $("#filaR  option");
            var selectedItem17 = $("#filaS  option");
            var selectedItem18 = $("#filaT  option");
            var selectedItem19 = $("#filaU  option");
            var selectedItem20 = $("#filaV  option");
            var selectedItem21 = $("#filaW  option");
            
            var valueA = $("#ValuesA  option");
            var valueB = $("#ValuesB  option");
            var valueC= $("#ValuesC  option");
            var valueD = $("#ValuesD  option");
            var valueE = $("#ValuesE  option");
            var valueF = $("#ValuesF  option");

            if(isVacio(selectedItem) && isVacio(selectedItem1) && isVacio(selectedItem2) && isVacio(selectedItem3)&& isVacio(selectedItem4) && isVacio(selectedItem5) && isVacio(selectedItem6) 
            && isVacio(selectedItem7) && isVacio(selectedItem8) && isVacio(selectedItem9)&& isVacio(selectedItem10) && isVacio(selectedItem11) && isVacio(selectedItem12) 
            && isVacio(selectedItem13) && isVacio(selectedItem14) && isVacio(selectedItem15)&& isVacio(selectedItem16) && isVacio(selectedItem17) && isVacio(selectedItem18)
            && isVacio(selectedItem19) && isVacio(selectedItem20) && isVacio(selectedItem21)  ){
                const valuesA = Array.from(valueA).map(el => el.value);
                const valuesB = Array.from(valueB).map(el => el.value);
                const valuesC = Array.from(valueC).map(el => el.value);
                const valuesD = Array.from(valueD).map(el => el.value);
                const valuesE = Array.from(valueE).map(el => el.value);
                const valuesF = Array.from(valueF).map(el => el.value);
                console.log(valuesA);
                console.log(valuesB);
                console.log(valuesC);
                console.log(valuesD);
                console.log(valuesE);
                console.log(valuesF);
                var asientos="A:"+valuesA+"; B:"+valuesB+";C:"+valuesC+"; D:"+valuesD+";E:"+valuesE+"; F:"+valuesF;
                $('.page-spinner-loader').removeClass('hide');
                var id=$(this).parents().find('#Eid')[0].value;
                var idMapa=$(this).parents().find('#Emapa')[0].value;
                var tipo=$(this).parents().find('#Etipo')[0].value;
                var nombres=$(this).parents().find('#Enombres')[0].value;
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
                if(band){
                    $('#alerta').load('./tables/mantenimiento/alerta.php', {id:id, idMapa:idMapa,tipo:tipo,tipo2:"editarBP",asientos:asientos,nombres:nombres},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }else{
                    $(this).prop("disabled",false);  
                    $('.page-spinner-loader').addClass('hide');   
                }
                
            }else{
                alert('Seleccione Todos los Asientos de cada Area');
            } 
            $(this).prop("disabled",false);     
        });
        $(document).on('click', '#editarNombre', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#Eid')[0].value;
            var idMapa=$(this).parents().find('#Emapa')[0].value;
            var tipo=$(this).parents().find('#Etipo')[0].value;
            var nombres=$(this).parents().find('#Enombres')[0].value;
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
            if(band){
                $('#alerta').load('./tables/mantenimiento/alerta.php', {id:id,idMapa:idMapa, tipo:tipo,tipo2:"editarBP",nombres:nombres},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
            
           // $(this).prop("disabled",false);   
        });
        $(document).on('click', '#cancelar', function (e) {
            $('.principalG').removeClass('hide');
            $('#editarMapa').load('./tables/mantenimiento/vacio.php',function() {    
            }); 
            var table = $('#table-editable').DataTable();
            table.ajax.reload();
        });
            //metodos calcular
        function calculaFila(selectedItem) {
            const values = Array.from(selectedItem).map(el => el.value);
            for (var i=0, iLen=values.length; i<iLen; i++) {
                var opt = values[i];
                if(opt.charAt(0)=="A"){
                    $("#filaA").append(selectedItem[i]);
                }else if(opt.charAt(0)=="B"){
                    $("#filaB").append(selectedItem[i]);
                }else if(opt.charAt(0)=="C"){
                    $("#filaC").append(selectedItem[i]);
                }else if(opt.charAt(0)=="D"){
                    $("#filaD").append(selectedItem[i]);
                }else if(opt.charAt(0)=="E"){
                    $("#filaE").append(selectedItem[i]);
                }else if(opt.charAt(0)=="F"){
                    $("#filaF").append(selectedItem[i]);
                }else if(opt.charAt(0)=="G"){
                    $("#filaG").append(selectedItem[i]);
                }else if(opt.charAt(0)=="H"){
                    $("#filaH").append(selectedItem[i]);
                }else if(opt.charAt(0)=="J"){
                    $("#filaJ").append(selectedItem[i]);
                }else if(opt.charAt(0)=="K"){
                    $("#filaK").append(selectedItem[i]);
                }else if(opt.charAt(0)=="L"){
                    $("#filaL").append(selectedItem[i]);
                }else if(opt.charAt(0)=="M"){
                    $("#filaM").append(selectedItem[i]);
                }else if(opt.charAt(0)=="N"){
                    $("#filaN").append(selectedItem[i]);
                }else if(opt.charAt(0)=="O"){
                    $("#filaO").append(selectedItem[i]);
                }else if(opt.charAt(0)=="P"){
                    $("#filaP").append(selectedItem[i]);
                }else if(opt.charAt(0)=="Q"){
                    $("#filaQ").append(selectedItem[i]);
                }else if(opt.charAt(0)=="R"){
                    $("#filaR").append(selectedItem[i]);
                }else if(opt.charAt(0)=="S"){
                    $("#filaS").append(selectedItem[i]);
                }else if(opt.charAt(0)=="T"){
                    $("#filaT").append(selectedItem[i]);
                }else if(opt.charAt(0)=="U"){
                    $("#filaU").append(selectedItem[i]);
                }else if(opt.charAt(0)=="V"){
                    $("#filaV").append(selectedItem[i]);
                }else if(opt.charAt(0)=="W"){
                    $("#filaW").append(selectedItem[i]);
                }
            }
        }; 
        function isVacio(selectedItem) {
            const values = Array.from(selectedItem).map(el => el.value);
            if (values.length>0){
                return false;
            }else{
                return true;
            }
        };
        function calculaAsiento(selectedItem, area) {
            var imagen="";
            if(area=="A"){
                imagen = "../../../assets/boleto/images/movie/area1.png";
            }else if(area=="B"){
                imagen = "../../../assets/boleto/images/movie/area2.png";
            }else if(area=="C"){
                imagen = "../../../assets/boleto/images/movie/area3.png";
            }else if(area=="D"){
                imagen = "../../../assets/boleto/images/movie/area4.png";
            }else if(area=="E"){
                imagen = "../../../assets/boleto/images/movie/area5.png";
            }else if(area=="F"){
                imagen = "../../../assets/boleto/images/movie/area6.png";
            }
            const values = Array.from(selectedItem).map(el => el.value);
            //console.log(values);
            for (var i=0, iLen=values.length; i<iLen; i++) {
                var opt = values[i];
                var valor=opt.substring(1,opt.length);
                var letra=opt.charAt(0);
                var image = document.getElementById(letra+valor);
                
                image.src=imagen;
            }
        };
    });

      $scope.$on('$destroy', function () {
        $('#table-editable').DataTable().clear().destroy();
        var tables = $.fn.dataTable.fnTables(true);
        $(tables).each(function () {
            $(this).dataTable().fnDestroy();
        });
        $(document).off('click','.editar');
        $(document).off('click','.crear');
        $(document).off('click','.editar_categoria');
        $(document).off('click','.crear_categoria');
        $(document).off('click','.estado');
        $(document).off('click','.delete');
        $(document).off('click','.editarMS');
        $(document).off('click','.crearMS');
        $(document).off('click','.editar_distribucionS');
        $(document).off('click','.crear_distribucionS');
        $(document).off('click','#mapa');
        $(document).off('click','#Smapa');
        $(document).off('change','#sala');
        $(document).off('change','#imagen_sala');
        $(document).off('change','#imagen_distribucion');
        $(document).off('click','.editarMP');
        $(document).off('click','.crearMP');
        $(document).off('click','.add_mapa');
        $(document).off('click','.mapaP');
        $(document).off('click','#btnA');
        $(document).off('click','#btnB');
        $(document).off('click','#btnC');
        $(document).off('click','#btnD');
        $(document).off('click','#btnE');
        $(document).off('click','#btnF');
        $(document).off('click','#btnAll');
        $(document).off('click','#btnReturn');
        $(document).off('click','#btnReturnAll');
        $(document).off('click','#guardarD');
        $(document).off('click','#editarD');
        $(document).off('click','#editarNombre');
        $(document).off('click','#cancelar');
      });
  }]);
