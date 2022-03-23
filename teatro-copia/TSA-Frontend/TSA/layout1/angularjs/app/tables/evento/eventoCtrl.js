'use strict';

angular.module('newApp')
  .controller('eventoCtrl', ['$scope','pluginsService', function ($scope ,pluginsService) {
    var oTable;
    var oTable1;
    $(document).ready(function () {
        $('.tabEventos').addClass('hide');
        $('table').each(function () {
            if ($.fn.dataTable.isDataTable($(this))) {
                oTable =$(this).dataTable();
            }
        });
      });  
    $scope.$on('$viewContentLoaded', function () {
        
    
    //CREAR    
        //boton principal
        $(document).on('click', '.crear', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var tipo=$(this).parents().find('#tipo')[0].value;
            console.log("crear");
            $('.page-spinner-loader').removeClass('hide');
            $('#Cevento').load('./tables/evento/crear_evento.php',{tipo:tipo},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cevento').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        //boton secundario
        $(document).on('click', '.crear_evento', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("sac1");
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#sala')[0].value;
            var mensaje=$(this).parents().find('#mensaje')[0];
            if(id !="none"){
                $('.page-spinner-loader').removeClass('hide').value;
                var nombreT=$(this).parents().find('#nombreT')[0].value;
                var tipo=$(this).parents().find('#tipo')[0].value;
                var nombre=$(this).parents().find('#nombre')[0].value;
                var duracion=$(this).parents().find('#duracion')[0].value;
                var fechaI=$(this).parents().find('#fechaI')[0].value;
                var fechaf=$(this).parents().find('#fechaF')[0].value;
                var tipoE=$(this).parents().find('#tipoE')[0].value;
                var productora=$(this).parents().find('#productora')[0].value;
                var categoria=$(this).parents().find('#categoria')[0].value;
                var clasificacion=$(this).parents().find('#clasificacion')[0].value;
                var espectaculo=$(this).parents().find('#espectaculo')[0].value;
                var procedencia=$(this).parents().find('#procedencia')[0].value;
                var salamapa=$(this).parents().find('#distribucion')[0].value;
                var aforo=$(this).parents().find('#aforo')[0].value;
                var band=true;
                if(tipo=="venta"){
                    if(salamapa =="none"){
                        $('#mensaje1').removeClass('esconder');
                        mensaje.value="Seleccione una distribución";
                        band=false;
                    }
                }else if(tipo=="gratuito"){

                }
                if(nombre.length<5){
                    $('#mensaje1').removeClass('esconder');
                    mensaje.value="Ingrese un nombre correcto para el evento";
                    band=false;
                }
                if(fechaI==="" | fechaf==="" | fechaI>fechaf){
                    $('#mensaje1').removeClass('esconder');
                    mensaje.value="Seleccióne fechas correctas";
                    band=false;
                }
                if(duracion < 0){
                    $('#mensaje1').removeClass('esconder');
                    mensaje.value="Ingrese una duración";
                    band=false;
                }
                if(aforo <= 0){
                    $('#mensaje1').removeClass('esconder');
                    mensaje.value="Ingrese un aforo";
                    band=false;
                }
                
                console.log("sac");
                if(band){
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:tipo,tipo2:"crear",nombreT:nombreT,nombre:nombre, duracion:duracion,fechaI:fechaI,fechaf:fechaf,tipoE:tipoE,productora:productora,categoria:categoria,clasificacion:clasificacion,espectaculo:espectaculo,procedencia:procedencia,salamapa:salamapa,aforo:aforo},function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $('#mensaje1').addClass('esconder');
                     });
                }else{
                    $('.page-spinner-loader').addClass('hide');
                    $(this).prop("disabled",false);
                }
                
            }else{
                $('#mensaje1').removeClass('esconder');
                mensaje.value="Seleccione una sala";
                $(this).prop("disabled",false);
            }
            
        });
        
        //crea distribucion al crear y selecccionar sala
        $(document).on('change','#sala' ,function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('#mensaje1').addClass('esconder');
            $('#distribucion_sala').addClass('hide'); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#sala')[0].value;
            var aforo=$(this).parents().find('#aforo')[0];
            var tipo=$(this).parents().find('#tipo')[0].value;
            if(id !="none"){
                if(id=="1"){
                  aforo.value="952";
                  $(aforo).prop("disabled",true); 
                }else{
                    aforo.value="";
                    $(aforo).prop("disabled",false); 
                }
                $('#distribucion_sala').load('./tables/evento/distribucion_sala.php',{id_sala:id, tipo:tipo},function() {    
                    $('.page-spinner-loader').addClass('hide');
                    $('#distribucion_sala').removeClass('hide'); 
                });
            }else{
                $('#distribucion_sala').addClass('hide'); 
                $('.page-spinner-loader').addClass('hide');
            }
           

        });
        //ver mapa de crear
        $(document).on('click', '.mapa', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#distribucion')[0].value;
            var idsala=$(this).parents().find('#idSala')[0].value;
            console.log(idsala);
            if(id !="none"){
                $('.page-spinner-loader').removeClass('hide');
                if(idsala ==="1"){
                    $('#verSala').load('./tables/evento/ver_sala.php', {var1:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $('#verSala').modal('show'); // abrir
                    });
                }else{
                    $('#verSala').load('./tables/evento/ver_imagen.php', {var1:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $('#verSala').modal('show'); // abrir
                    });
                }
            }
            $(this).prop("disabled",false);
        });
        

    //EDITAR INFORMACION
        //boton principal
        $(document).on('click', '.editar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('#fila0')[0];
            var tipo=$(this).parents().find('#tipo')[0].value;
            console.log(tipo);
            $('.page-spinner-loader').removeClass('hide');
            $('#informacion').load('./tables/evento/tab_informacion.php', {var1:estado.innerHTML,tipo:tipo},function() { 
                $('.editarEvento').addClass('hide');   
                $('.page-spinner-loader').addClass('hide');
                $('.tabEventos').removeClass('hide');
            });
            $('#descripcion').load('./tables/evento/tab_descripcion.php', {var1:estado.innerHTML,tipo:tipo},function() {    
                $( $('.summernote')).summernote({
                    height: 300,
                    airMode: $(this).data('airmode') ? $(this).data('airmode') : false,
                    shortcuts: false,
                    tabDisable: false,
                    codeviewFilter: false,
                    toolbar: [
                        
                      ],
                      popover: {
                        link: [
                            ['custom', ['HelloButton']],
                            ['link', ['HelloButton', 'linkDialogShow']]
                        ]
                      },
                });

                $('.page-spinner-loader').addClass('hide');
            });
            $('#funciones').load('./tables/evento/tab_funciones.php', {var1:estado.innerHTML,tipo:tipo},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
            $('#multimedia').load('./tables/evento/tab_multimedia.php', {var1:estado.innerHTML,tipo:tipo},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
            $('#precios').load('./tables/evento/tab_precio.php', {var1:estado.innerHTML,tipo:tipo},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
           
            $(this).prop("disabled",false);
        });
        //ver mapa de editar
        $(document).on('click', '.Emapa', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#Edistribucion')[0].value;
            var idsala=$(this).parents().find('#Esala')[0].value;
            console.log(idsala);
            if(id !="none"){
                $('.page-spinner-loader').removeClass('hide');
                if(idsala ==="1"){
                    $('#verSala').load('./tables/evento/ver_sala.php', {var1:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $('#verSala').modal('show'); // abrir
                    });
                }else{
                    $('#verSala').load('./tables/evento/ver_imagen.php', {var1:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $('#verSala').modal('show'); // abrir
                    });
                }
            }
            $(this).prop("disabled",false);
        });
        //boton secundario
        $(document).on('click', '.editar_venta', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#Esala')[0].value;
            var mensaje=$(this).parents().find('#Emensaje')[0];
            if(id !="none"){
                $('.page-spinner-loader').removeClass('hide').value;
                var nombreT=$(this).parents().find('#nombreT')[0].value;
                var tipo=$(this).parents().find('#Etipo')[0].value;
                var id_evento=$(this).parents().find('#Eid')[0].value;
                var nombre=$(this).parents().find('#Enombre')[0].value;
                var duracion=$(this).parents().find('#Eduracion')[0].value;
                var fechaI=$(this).parents().find('#EfechaI')[0].value;
                var fechaf=$(this).parents().find('#EfechaF')[0].value;
                var tipoE=$(this).parents().find('#EtipoE')[0].value;
                var productora=$(this).parents().find('#Eproductora')[0].value;
                var categoria=$(this).parents().find('#Ecategoria')[0].value;
                var clasificacion=$(this).parents().find('#Eclasificacion')[0].value;
                var espectaculo=$(this).parents().find('#Eespectaculo')[0].value;
                var procedencia=$(this).parents().find('#Eprocedencia')[0].value;
                var salamapa=$(this).parents().find('#Edistribucion')[0].value;
                var aforo=$(this).parents().find('#Eaforo')[0].value;
                var band=true;
                if(nombre.length<5){
                    $('#Emensaje1').removeClass('esconder');
                    mensaje.value="Ingrese un nombre correcto para el evento";
                    band=false;
                }
                if(fechaI==="" | fechaf==="" | fechaI>fechaf){
                    $('#mensaje1').removeClass('esconder');
                    mensaje.value="Seleccióne fechas correctas";
                    band=false;
                }
                if(duracion <= 0){
                    $('#Emensaje1').removeClass('esconder');
                    mensaje.value="Ingrese una duración";
                    band=false;
                }
                if(aforo <= 0){
                    $('#Emensaje1').removeClass('esconder');
                    mensaje.value="Ingrese un aforo";
                    band=false;
                }
                if(salamapa =="none"){
                    $('#Emensaje1').removeClass('esconder');
                    mensaje.value="Seleccione una distribución";
                    band=false;
                }
                if(band){
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:tipo,tipo2:"editar",id_evento:id_evento,nombreT:nombreT,nombre:nombre, duracion:duracion,fechaI:fechaI,fechaf:fechaf,tipoE:tipoE,productora:productora,categoria:categoria,clasificacion:clasificacion,espectaculo:espectaculo,procedencia:procedencia,salamapa:salamapa,aforo:aforo},function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $('#Emensaje1').addClass('esconder');
                        });
                }else{
                    $(this).prop("disabled",false);
                    $('.page-spinner-loader').addClass('hide');
                }
                
            }else{
                $('#Emensaje1').removeClass('esconder');
                mensaje.value="Seleccione una sala";
                $(this).prop("disabled",false);
            }
         
        });  

    //EDITAR SINOPSIS
        //boton principal
        $(document).on('click', '.editar_sinopsis', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_evento=$(this).parents().find('#Eid')[0].value;
            var sinopsis=$(this).parents().find('#sinopsis')[0].value;
            var tipo="ES"+$(this).parents().find('#tipo')[0].value;   
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            $('.page-spinner-loader').removeClass('hide');
            $('#alerta').load('./tables/evento/alerta.php', {tipo:"Esinopsis",tipo2:"editar",nombreT:nombreT, id_evento:id_evento, sinopsis:sinopsis},function() {    
                $('.page-spinner-loader').addClass('hide');
             });
            //$(this).prop("disabled",false);
        });    

    //ESTADO-ELIMINAR EVENTO PRINCIPAL  
        //boton cancela la estado
        $(document).on('click', '.estado', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
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
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:tipo,tipo2:"estado",nombreT:nombreT, estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:tipo,tipo2:"estado",nombreT:nombreT, estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
        });
        $(document).on('click', '.estadoBloqueados', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
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
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:tipo,tipo2:"estado",nombreT:nombreT, estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de desbloquear?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:tipo,tipo2:"estado",nombreT:nombreT, estado:"I", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
        });
        //boton eliminar
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log( this);
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
            var tipo="ES"+$(this).parents().find('#tipo')[0].value; 
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/evento/alerta.php', {tipo:tipo,tipo2:"estado",nombreT:nombreT, estado:"B", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
    //CANCELAR
        //boton principal
        $(document).on('click', '.cancelar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            location.reload();
        });
                
    //TABLA DE FICHA ARTISTICA
        //boton primario
        $(document).on('click', '.crearFicha', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_evento=$(this).parents().find('#Eid')[0].value;
            var tipo=$(this).parents().find('#Etipo')[0].value;
            console.log(tipo);
            $('.page-spinner-loader').removeClass('hide');
            $('#Cevento').load('./tables/evento/crear_ficha_artistica.php',{tipo:"admin", id_evento:id_evento},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cevento').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        
        $(document).on('click', '.editarFicha', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_ficha=$(this).parents('tr').find('#fila0ficha')[0].innerHTML;
            var tipo=$(this).parents().find('#Etipo')[0].value;
            $('.page-spinner-loader').removeClass('hide');
            $('#Cevento').load('./tables/evento/editar_ficha_artistica.php',{tipo:"venta", id_ficha:id_ficha},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cevento').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });

        $(document).on('click', '.deleteFicha', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0ficha')[0].innerHTML;
            var id_evento=$(this).parents().find('#Eid')[0].value;
            var nombreT=$(this).parents().find('#FnombreT')[0].value;
            console.log(id_evento);
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/evento/alerta.php', {tipo:"eliminarFicha",tipo2:"estado",nombreT:nombreT, estado:"B", id_evento:id_evento,id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
         //   $(this).prop("disabled",false);
        });

        //boton secundario
        $(document).on('click', '.crear_ficha_artistica', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_evento=$(this).parents().find('#id_evento')[0].value;
            var titulo=$(this).parents().find('#titulo')[0].value;
            var descripcion=$(this).parents().find('#descripcionFicha')[0].value;
            var nombreT=$(this).parents().find('#FnombreT')[0].value;
            $('.page-spinner-loader').removeClass('hide');
            $('#alerta').load('./tables/evento/alerta.php', {tipo:"crearFicha",tipo2:"crear",nombreT:nombreT,id_evento:id_evento, titulo:titulo,descripcion:descripcion},function() {    
                $('.page-spinner-loader').addClass('hide');
             });
           // $(this).prop("disabled",false);
        });

        $(document).on('click', '.editar_ficha_artistica', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_ficha=$(this).parents().find('#id_ficha_artistica')[0].value;
            var id_evento=$(this).parents().find('#id_evento')[0].value;
            var titulo=$(this).parents().find('#Etitulo')[0].value;
            var descripcion=$(this).parents().find('#EdescripcionFicha')[0].value;
            var nombreT=$(this).parents().find('#FnombreT')[0].value;
            $('.page-spinner-loader').removeClass('hide');
            $('#alerta').load('./tables/evento/alerta.php', {tipo:"editarFicha",tipo2:"editar",nombreT:nombreT,id_ficha:id_ficha,id_evento:id_evento, titulo:titulo,descripcion:descripcion},function() {    
                $('.page-spinner-loader').addClass('hide');
             });
            //$(this).prop("disabled",false);
        });
    //TABLA DE FUNCIONES
        //boton primario
        $(document).on('click', '.crearFuncion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_evento=$(this).parents().find('#Eid')[0].value;
            var tipo=$(this).parents().find('#Etipo')[0].value;
            console.log(tipo);
            $('.page-spinner-loader').removeClass('hide');
            $('#Cevento').load('./tables/evento/crear_funcion.php',{tipo:"admin", id_evento:id_evento},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cevento').modal('show'); // abrir
                $(".datepicker").datetimepicker({locale: 'es'});
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarFuncion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_funcion=$(this).parents('tr').find('#fila0funcion')[0].innerHTML;
            var tipo=$(this).parents().find('#Etipo')[0].value;
            $('.page-spinner-loader').removeClass('hide');
            $('#Cevento').load('./tables/evento/editar_funcion.php',{tipo:"venta", id_funcion:id_funcion},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cevento').modal('show'); // abrir
                $(".datepicker").datetimepicker({locale: 'es'});
            });
            $(this).prop("disabled",false);
        });
        //boton secundario
        function validar_fecha_espanol($fecha){
            var date_regex = /^([1-9]|([012][0-9])|(3[01]))\/([0]{0,1}[1-9]|1[012])\/([1-2][0-9][0-9][0-9]) [0-2][0-9]:[0-9][0-9]$/;
            if (date_regex.test($fecha)) {
                return true;
            }
            else{
                return false;
            }
        }
        $(document).on('click', '.crear_funcion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_evento=$(this).parents().find('#id_evento')[0].value;
            var fecha=$(this).parents().find('#fechaFuncion')[0].value;
            var nombreT=$(this).parents().find('#FCnombreT')[0].value;
            if (!validar_fecha_espanol(fecha)) {
                alert("Ingrese una fecha");
                $(this).prop("disabled",false);
            } else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/evento/alerta.php', {tipo:"crearFuncion",tipo2:"crear",nombreT:nombreT,id_evento:id_evento, fecha:fecha},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
            
            
        });
        $(document).on('click', '.editar_funcion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_funcion=$(this).parents().find('#id_funcion')[0].value;
            var id_evento=$(this).parents().find('#id_evento')[0].value;
            var fecha=$(this).parents().find('#fechaFuncion')[0].value;
            var nombreT=$(this).parents().find('#FCnombreT')[0].value;
            if (!validar_fecha_espanol(fecha)) {
                alert("Ingrese una fecha");
                $(this).prop("disabled",false);
            } else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/evento/alerta.php', {tipo:"editarFuncion",tipo2:"editar",nombreT:nombreT,id_funcion:id_funcion,id_evento:id_evento, fecha:fecha},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
            
        });
        $(document).on('click', '.deleteFuncion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0funcion')[0].innerHTML;
            var id_evento=$(this).parents().find('#FCid')[0].value;
            var nombreT=$(this).parents().find('#FCnombreT')[0].value;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/evento/alerta.php', {tipo:"eliminarFuncion",tipo2:"estado",nombreT:nombreT, estado:"B", id_evento:id_evento,id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
         //   $(this).prop("disabled",false);
        });
        $(document).on('click', '.estadoFuncion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0funcion')[0].innerHTML;
            var estado=$(this).parents('tr').find('#Fbox')[0];
            var id_evento=$(this).parents().find('#FCid')[0].value;
            var nombreT=$(this).parents().find('#FCnombreT')[0].value;
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:"estadoFuncion",tipo2:"estado",nombreT:nombreT, estado:"I", id_evento:id_evento,id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:"estadoFuncion",tipo2:"estado",nombreT:nombreT, estado:"A", id_evento:id_evento,id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
         //   $(this).prop("disabled",false);
        });
        $(document).on('click', '.estado', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
            var estado=$(this).parents('tr').find('#box')[0];    
            var tipo="ES"+$(this).parents().find('#tipo')[0].value;   
            var nombreT=$(this).parents().find('#nombreT')[0].value;
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:tipo,tipo2:"estado",nombreT:nombreT, estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:tipo,tipo2:"estado",nombreT:nombreT, estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
        });
         $(document).on('click', '.myBtn', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $("#modal-responsive3").modal();
        });
    //TABLA DE PRECIOS
        //boton primario
        $(document).on('click', '.crearPrecio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_evento=$(this).parents().find('#Pid')[0].value;
            console.log(tipo);
            $('.page-spinner-loader').removeClass('hide');
            $('#Cevento').load('./tables/evento/crear_precio.php',{tipo:"admin", id_evento:id_evento},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cevento').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarPrecio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_precio=$(this).parents('tr').find('#fila0Precio')[0].innerHTML;
            var tipo=$(this).parents().find('#Etipo')[0].value;
            var principal=$(this).parents().find('#principal')[0].value;
            $('.page-spinner-loader').removeClass('hide');
            $('#Cevento').load('./tables/evento/editar_precio.php',{tipo:"venta", id_precio:id_precio, principal:principal},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('#Cevento').modal('show'); // abrir
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.crear_precio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_evento=$(this).parents().find('#id_evento')[0].value;
            var nombre=$(this).parents().find('#Pnombre')[0].value;
            var precio=$(this).parents().find('#Pprecio')[0].value;
            var aforo=$(this).parents().find('#Paforo')[0].value;
            var aforoM=$(this).parents().find('#PaforoM')[0].value;
            var nombreT=$(this).parents().find('#PnombreT')[0].value;
            if(aforo <= 0  | aforo >aforoM){
                alert("Ingrese un Aforo correcto");
                $(this).prop("disabled",false);
            }else if(precio <= 0 ){
                alert("Ingrese un precio");
                $(this).prop("disabled",false);
            }else{
                if(nombre.length<5){
                    alert("Ingrese un nombre correcto para la platea");
                    $(this).prop("disabled",false);
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:"crearPrecio",tipo2:"crear",nombreT:nombreT,id_evento:id_evento, nombre:nombre, precio:precio ,aforo:aforo},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
            
        });
        $(document).on('click', '.editar_precio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_funcion=$(this).parents().find('#id_precio')[0].value;
            var id_evento=$(this).parents().find('#id_evento')[0].value;
            var nombre=$(this).parents().find('#Pnombre')[0].value;
            var precio=$(this).parents().find('#Pprecio')[0].value;
            var aforo=$(this).parents().find('#Paforo')[0].value;
            var nombreT=$(this).parents().find('#PnombreT')[0].value;
            if(aforo <= 0  | aforo >100){
                alert("Ingrese un porcentaje de aforo total válido");
                $(this).prop("disabled",false);
            }else if(precio <= 0 ){
                alert("Ingrese un precio");
                $(this).prop("disabled",false);
            }else{
                if(nombre.length<5){
                    alert("Ingrese un nombre correcto para la platea");
                    $(this).prop("disabled",false);
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:"editarPrecio",tipo2:"editar",nombreT:nombreT,id_funcion:id_funcion,id_evento:id_evento, nombre:nombre, precio:precio ,aforo:aforo},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
        });
        $(document).on('click', '.deletePrecio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0Precio')[0].innerHTML;
            var id_evento=$(this).parents().find('#Pid')[0].value;
            var nombreT=$(this).parents().find('#PnombreT')[0].value;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/evento/alerta.php', {tipo:"eliminarPrecio",tipo2:"estado",nombreT:nombreT, estado:"B", id_evento:id_evento,id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
         //   $(this).prop("disabled",false);
        });
        $(document).on('click', '.estadoPrecio', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0Precio')[0].innerHTML;
            var estado=$(this).parents('tr').find('#Pbox')[0];
            var id_evento=$(this).parents().find('#Pid')[0].value;
            var nombreT=$(this).parents().find('#PnombreT')[0].value;
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:"estadoPrecio",tipo2:"estado",nombreT:nombreT, estado:"I", id_evento:id_evento,id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:"estadoPrecio",tipo2:"estado",nombreT:nombreT, estado:"A", id_evento:id_evento,id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }
         //   $(this).prop("disabled",false);
        });

    //MULTIMEDIA
        $(document).on('click', '.editar_imagenH', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var imagenH=$(this).parents().find('.EimagenHA').children()[0];
            var id_evento=$(this).parents().find('#id_evento')[0].value;
            var nombreT=$(this).parents().find('#MnombreT')[0].value;
            console.log(imagenH)
            if (imagenH != null) {
                var imagen = imagenH.src;
                var image1 = new Image();
                image1.src = imagen;
                if (image1.width.toFixed(0) != 690 && image1.height.toFixed(0) != 306) {
                    alert('Las medidas deben ser: 690 x 306');
                    $(this).prop("disabled",false); 
                } else {
                    $('.page-spinner-loader').removeClass('hide'); 
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:"imagenH",tipo2:"editar",id_evento:id_evento,imagen:imagen,nombreT:nombreT},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            } else{
                $(this).prop("disabled",false); 
            } 
        });
        $(document).on('click', '.editar_imagenC', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var imagenC=$(this).parents().find('.EimagenCA').children()[0];
            var id_evento=$(this).parents().find('#id_evento')[0].value;
            var nombreT=$(this).parents().find('#MnombreT')[0].value;
            console.log(imagenH)
            if (imagenC != null) {
                var imagen = imagenC.src;
                var image1 = new Image();
                image1.src = imagen;
                if (image1.width.toFixed(0) != 760 && image1.height.toFixed(0) != 760) {
                    alert('Las medidas deben ser: 760 x 760');
                    $(this).prop("disabled",false); 
                } else {
                    $('.page-spinner-loader').removeClass('hide'); 
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:"imagenC",tipo2:"editar",id_evento:id_evento,imagen:imagen,nombreT:nombreT},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            } else{
                $(this).prop("disabled",false); 
            } 
            
        });
        $(document).on('click', '.editar_imagenV', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var imagenV=$(this).parents().find('.EimagenVA').children()[0];
            var id_evento=$(this).parents().find('#id_evento')[0].value;
            var nombreT=$(this).parents().find('#MnombreT')[0].value;
            console.log(imagenH)
            if (imagenV != null) {
                var imagen = imagenV.src;
                var image1 = new Image();
                image1.src = imagen;
                if (image1.width.toFixed(0) != 542 && image1.height.toFixed(0) != 722) {
                    alert('Las medidas deben ser: 542 x 722');
                    $(this).prop("disabled",false); 
                } else {
                    $('.page-spinner-loader').removeClass('hide'); 
                    $('#alerta').load('./tables/evento/alerta.php', {tipo:"imagenV",tipo2:"editar",id_evento:id_evento,imagen:imagen,nombreT:nombreT},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            } else{
                $(this).prop("disabled",false); 
            }
        });
        $(document).on('click', '.editarMultimedia', function (e) {
            e.preventDefault();
            $(this).prop("disabled",true); 
            var video=$(this).parents().find('#video')[0].value;
            var id_evento=$(this).parents().find('#id_evento')[0].value;
            var nombreT=$(this).parents().find('#MnombreT')[0].value;
            if(video.length<10){
                alert('Ingrese un video correcto');
                $(this).prop("disabled",false); 
            }else{
                $('.page-spinner-loader').removeClass('hide'); 
                $('#alerta').load('./tables/evento/alerta.php', {tipo:"editarMultimedia",tipo2:"editar",id_evento:id_evento,video:video,nombreT:nombreT},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
        });
          //editableTable();  
         // editableTable1();



    });
    $scope.isTabActive = true;    
      $scope.$on('$destroy', function () {
        $('table').each(function () {
            if ($.fn.dataTable.isDataTable($(this))) {
                $(this).dataTable({
                    "bDestroy": true
                }).fnDestroy();
            }
        });
        $(document).off('click','.crear');
        $(document).off('change','#sala');
        $(document).off('click','.mapa');
        $(document).off('click','crear_venta');
        $(document).off('click','.editar');
        $(document).off('click','.Emapa');
        $(document).off('click','.editar_venta');
        $(document).off('click','.editar_sinopsis');
        $(document).off('click','.estado');
        $(document).off('click','.delete');
        $(document).off('click','.cancelar');
        $(document).off('click','.crearFicha');
        $(document).off('click','.editarFicha');
        $(document).off('click','.deleteFicha');
        $(document).off('click','.crear_ficha_artistica');
        $(document).off('click','.editar_ficha_artisticar');
        
      });
  }]);
