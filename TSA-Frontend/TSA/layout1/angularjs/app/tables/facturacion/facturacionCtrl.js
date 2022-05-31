'use strict';

angular.module('newApp')
  .controller('facturacionCtrl', ['$scope', function ($scope) {
    $(document).ready(function () { 
            
    });
    $scope.$on('$viewContentLoaded', function () {
        
        $(document).on('click', '.editar', function (e) {
            e.preventDefault();
            var estado=$(this).parents('tr').find('.hide_column')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#alerta').load('./tables/facturacion/alerta.php', {var1:estado.innerHTML, tipo:"editar"},function() {    
                $('.page-spinner-loader').addClass('hide');
                $("#table-reservas").dataTable({ "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }, 
                    "bPaginate" : false,
                    "destroy":true,
                    "searching": false,
                    "select":false,
                    "paging": false,
                    "bFilter": false,
                    "bInfo": false, 
                    "ajax": "tables/facturacion/reserva-data.php",
                    "aoColumnDefs": [
                        {
                            "targets": [ 0,1],
                            "className": "hide_column"
                        },
                        { "sWidth": "12%", "className": "text-center", "aTargets": [ 2,3,4,5]},
                        { "sWidth": "5%","className": "text-center", "aTargets": [ 6,7,8,9]}
                ]}); 
                $("#table-pagos").dataTable({ "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    }, 
                    "bPaginate" : false,
                    "destroy":true,
                    "searching": false,
                    "select":false,
                    "paging": false,
                    "bFilter": false,
                    "bInfo": false, 
                    "ajax": "tables/facturacion/pago-data.php",
                    "aoColumnDefs": [
                        {
                            "targets": [ 0],
                            "className": "hide_column"
                        }
                ]}); 
            });
        });
        $(document).on('click', '.abrirCaja', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            if (confirm("Estas seguro de abrir?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/facturacion/alerta.php', { tipo:"abrirCaja"},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }   
        });
        $(document).on('click', '.estado', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            var estado=$(this).parents('tr').find('#box')[0];      
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/facturacion/alerta.php', {tipo:"estado", estado:"I", id:id},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                if (confirm("Estas seguro de activar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('#alerta').load('./tables/facturacion/alerta.php', {tipo:"estado", estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                    });
                    
                }
            }
            
        });
        $(document).on('click', '.facturacion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var estado=$(this).parents('tr').find('.hide_column')[0];
            $('#factura').load('./tables/facturacion/facturacion.php',{var1:estado.innerHTML,tipo:"admin"},function() {   
                $('.clientes').addClass('hide'); 
                $('.factura').removeClass('hide'); 
                $('.page-spinner-loader').addClass('hide');
               $("#table-editable1").dataTable({ "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }, 
                "ajax": "tables/facturacion/facturacion-data.php?var1="+estado.innerHTML,
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
        //seleccionar usuario
        $(document).on('click', '.seleccionarG', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var table = $('#table-editable').DataTable();
            table.ajax.reload();
            $('.clientes').removeClass('hide');   
            $('.factura').addClass('hide');
            $('.tablaCajas').addClass('hide');
            $('.CompraT').addClass('hide');
        });
        //selecionar promocion
        $(document).on('click', '.seleccionarF', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var table = $('#table-editable').DataTable();
            table.ajax.reload();
            $('.clientes').removeClass('hide');   
            $('.factura').addClass('hide');
            $('.tablaCajas').addClass('hide');
            $('.CompraT').addClass('hide');
        });
        $(document).on('change','#eventoG' ,function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var tipo=$(this).parents().find('#eventoG')[0].value;
            $('.page-spinner-loader').removeClass('hide');
            var texto=$(this).parents().find('#eventoG').find('option:selected').text();
            let arr = texto.split(':');
            var principal="true";
            var table = $('#table-reservas').DataTable();
            table.ajax.reload();  
            $('.tabEventos').addClass('hide');  
            if(arr[0] !="Sala Principal" ){
                principal="false";

            }
            if ( this.value=="none"){

            }else{
                var tipo=$(this).parents().find('#eventoG')[0].value;
                $('.page-spinner-loader').removeClass('hide');
                $('#funciones').load('./tables/facturacion/funciones.php',{var1:tipo, principal:principal},function() {    
                    $('.page-spinner-loader').addClass('hide');
                    $('.funciones  option:first').prop('selected', true);
                });
               
            }
        });
        $(document).on('change','.funciones' ,function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var texto=$(this).parents().find('#eventoG').find('option:selected').text();
            let arr = texto.split(':');
            var principal="true";
            var table = $('#table-reservas').DataTable();
            table.ajax.reload();  
            var tipo=$(this).parents().find('#eventoG')[0].value;
            if(arr[0] !="Sala Principal" ){
                principal="false";
            }
           console.log(this);
            if ( this.value=="none"){
                $('.promocionG').addClass('hide');   
                $('.plateasG').addClass('hide');   
            }else{
                var id_funcion=this.value;
                $('.plateasG').load('./tables/facturacion/plateas.php',{var1:tipo, principal:principal, id_funcion:id_funcion},function() {    
                    $('.page-spinner-loader').addClass('hide');
                    $('.plateasG').removeClass('hide');   
                    $('.promocionG').removeClass('hide');   
                });
                $(this).parents().find('#mapa').show();
            }
        });
        $(document).on('click', '.mapa', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#eventoG')[0].value;
            var funcion=$(this).parents().find('.funciones')[0].value;
            var texto=$(this).parents().find('#eventoG').find('option:selected').text();
            let arr = texto.split(':');
            if(id !="none"){
                $('.page-spinner-loader').removeClass('hide');
                if(arr[0] ==="Sala Principal"){
                    $(this).parents().find('#mensaje2').removeClass('hide'); 
                    $('.plateaA1').tagsinput('removeAll');
                    $('.plateaA2').tagsinput('removeAll');
                    $('.plateaA3').tagsinput('removeAll');
                    $('.plateaA4').tagsinput('removeAll');
                    $('.plateaA5').tagsinput('removeAll');
                    $('.plateaA6').tagsinput('removeAll');
                    $('#verSala').load('./tables/facturacion/ver_sala.php', {var1:funcion,var2:id, tipo:"bloqueo"},function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $('#verSala').modal('show'); // abrir
                    });
                    
                }else{
                    $(this).parents().find('#mensaje2').addClass('hide'); 
                    $('#verSala').load('./tables/evento/ver_imagen.php', {var1:id, tipo:"bloqueo"},function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $('#verSala').modal('show'); // abrir
                    });
                }
            }
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.seat-free img', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var src= $(this)[0].src.split('/');
            var filename = src[src.length- 1];
            if(filename == "area1.png" |filename == "area2.png" | filename == "area3.png" | filename == "area4.png" | filename == "area5.png" | filename == "area6.png") {
                $(this).attr("src","../../../assets/boleto/images/movie/seleccionado.png");
                if(filename == "area1.png") {
                    $(this).attr("src","../../../assets/boleto/images/movie/seleccionado.png");
                    $('.plateaA1').tagsinput('add',  $(this)[0].id);
                }
                if(filename == "area1.png") {
                    $(this).attr("src","../../../assets/boleto/images/movie/seleccionado.png");
                    $('.plateaA1').tagsinput('add',  $(this)[0].id);
                }
                if(filename == "area2.png") {
                    $(this).attr("src","../../../assets/boleto/images/movie/seleccionado.png");
                    $('.plateaA2').tagsinput('add',  $(this)[0].id);
                }
                if(filename == "area3.png") {
                    $(this).attr("src","../../../assets/boleto/images/movie/seleccionado.png");
                    $('.plateaA3').tagsinput('add',  $(this)[0].id);
                }
                if(filename == "area4.png") {
                    $(this).attr("src","../../../assets/boleto/images/movie/seleccionado.png");
                    $('.plateaA4').tagsinput('add',  $(this)[0].id);
                }
                if(filename == "area5.png") {
                    $(this).attr("src","../../../assets/boleto/images/movie/seleccionado.png");
                    $('.plateaA5').tagsinput('add',  $(this)[0].id);
                }
                if(filename == "area6.png") {
                    $(this).attr("src","../../../assets/boleto/images/movie/seleccionado.png");
                    $('.plateaA6').tagsinput('add',  $(this)[0].id);
                }
            }
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
        $(document).on('click', '.seleccionar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            console.log(id);
            if (confirm("Estas seguro de seleccionar esta facturación?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#UsuarioCaja').load('./tables/facturacion/caja-usuario.php',{var1:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                    $('.UsuarioCaja').removeClass('hide');
                    $('.tablaTaquilla').removeClass('hide');
                    $('.tablaReserva').removeClass('hide');
                    $('.clientes').addClass('hide');   
                    $('.factura').addClass('hide');
                    $('.tablaCajas').addClass('hide');
                    $('.CompraT').removeClass('hide');
                });
            }
           // $(this).prop("disabled",false);
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
        $(document).on('click', '.atras', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var table = $('#table-editable').DataTable();
            table.ajax.reload();
            $('.clientes').removeClass('hide');   
            $('.factura').addClass('hide');
        });
        $(document).on('click', '.cancelarP', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.tabEventos').addClass('hide');   
        });
        $(document).on('click', '.salir', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.clientes').addClass('hide');   
            $('.factura').addClass('hide');
            $('.CompraT').removeClass('hide');
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
        
        //PROMOCIONES
        $(document).on('click', '.promociones', function (e) {
            $(this).prop("disabled",true); 
            var id=$(this).parents().find('#eventoG')[0].value;
            var texto=$(this).parents().find('#eventoG').find('option:selected').text();
            let arr = texto.split(':');
            var nombre=arr[1];
            $('.page-spinner-loader').removeClass('hide');
            $('#compra').load('./tables/facturacion/tab_compra.php',function() {  
                $('.page-spinner-loader').addClass('hide');
                $('.tabEventos').removeClass('hide');  
            });
            $('#codigo').load('./tables/facturacion/tab_codigo.php',function() {    
            });
            $('#pago').load('./tables/facturacion/tab_pago.php',function() {    
            });
            $('#tarjeta').load('./tables/facturacion/tab_tarjeta.php',function() {    
            });
            $('#cruzados').load('./tables/facturacion/tab_cruzados.php',function() {    
            });
            $(this).prop("disabled",false);
        });

        //reserva
        $(document).on('click', '.reserva', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id_evento=$(this).parents().find('#eventoG')[0].value;
            var id_funcion=$(this).parents().find('.funciones')[0].value;
            var cantidad=$(this).parents().find('#catidadPlateas')[0].value;
            var asiento="";
            var texto=$(this).parents().find('#eventoG').find('option:selected').text();
            let arr = texto.split(':');
            var principal="P";
            var table = $('#table-reservas').DataTable();
            table.ajax.reload();  
            if(arr[0] !="Sala Principal" ){
                principal="C";
                for (var i = 1; i <= cantidad; i++) {
                    var valor=$(this).parents().find('.plateaA'+i)[0].value;
                    if(valor==""){
    
                    }else{
                        asiento=asiento+$('.plateaA'+i).attr('id')+":"+$(this).parents().find('.plateaA'+i)[0].value+";";
                    }
                    
                }
            }else{
                for (var i = 1; i <= cantidad; i++) {
                    var valor=$(this).parents().find('.plateaA'+i)[0].value;
                    if(valor==""){
    
                    }else{
                        asiento=asiento+$(this).parents().find('.plateaA'+i)[0].value+",";
                    }
                    
                }
            }
            var band=true;
            if (asiento=="") {
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccione Asientos</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
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
                $('#alerta').load('./tables/facturacion/alerta.php',{tipo:"reserva", id_evento:id_evento,id_funcion:id_funcion,principal:principal, cantidad:cantidad,asiento:asiento},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }  
            
            $(this).prop("disabled",false);
        });
        //ELIMINA RESERVA
        $(document).on('click', '.deleteReserva', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[1].innerHTML;
            console.log(id);
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/facturacion/alerta.php', {tipo:"deleteReserva", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
        });
        //AUMENTO EL TIEMPO DE RESERVA DE COMPRA
        $(document).on('click', '.aumentarT', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('#alerta').load('./tables/facturacion/alerta.php', {tipo:"aumentarT"},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
        });
        //AGREGAR PAGO
        $(document).on('change','#FpagoG' ,function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            if ( this.value=="tarjeta"){
                $('.Ttarjeta').removeClass('hide');
                $('.Tbanco').removeClass('hide');
                $('.lote').removeClass('hide');
            }else {
                $('.Ttarjeta').addClass('hide');
                $('.Tbanco').addClass('hide');
                $('.lote').addClass('hide');
            }
        });
        $(document).on('click', '.agregarPago', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var FpagoG=$(this).parents().find('#FpagoG')[0].value;
            var monto=$(this).parents().find('#monto')[0].value;
            var saldo=$(this).parents().find('#saldo')[0].value;
            var band=true;
            console.log(monto);
            console.log(saldo);
            if (monto <= "0") {
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un Monto de pago</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
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
                if ( FpagoG=="tarjeta"){
                    
                    var Ttarjeta=$(this).parents().find('#Ttarjeta')[0].value;
                    var Tbanco=$(this).parents().find('#Tbanco')[0].value;
                    var lote=$(this).parents().find('#lote')[0].value;
                    if (lote.length<2) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese Lote</p></div>',
                            layout      : 'topCenter', //or left, right, bottom-right...
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
                    var monto1=parseFloat(monto);
                    var saldo1=parseFloat(saldo); 
                    
                    if (monto1 > saldo1) {
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese un monto correcto</p></div>',
                            layout      : 'topCenter', //or left, right, bottom-right...
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
                        $('#alerta').load('./tables/facturacion/alerta.php', {tipo:"agregarPago",FpagoG:"T",Ttarjeta:Ttarjeta,Tbanco:Tbanco,lote:lote,monto:monto},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        $('.page-spinner-loader').addClass('hide');
                        $(this).prop("disabled",false);
                    }
                   
                }else {
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/facturacion/alerta.php', {tipo:"agregarPago",FpagoG:"E",Ttarjeta:"0",Tbanco:"0",lote:"",monto:monto},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                }
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }
            
        });
        $(document).on('click', '.deletePago', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            $('.page-spinner-loader').removeClass('hide');
            $('#alerta').load('./tables/facturacion/alerta.php', {tipo:"deletePago",id:id},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
            
        });
        $(document).on('click', '.donacion', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var idFacturacionG=$(this).parents().find('#idFacturacionG')[0].value;
            var band =true;
            
            if (idFacturacionG==""){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Seleccione un CLiente</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
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
                var idUsuario=$(this).parents().find('#idUsuario')[0].value;
                $('.page-spinner-loader').removeClass('hide');
                $('#Cusuarios').load('./tables/facturacion/donacion.php', {var1:idUsuario},function() {    
                    $('.page-spinner-loader').addClass('hide');
                    $('#Cusuarios').modal('show'); // abrir
                });
                $(this).prop("disabled",false);
            }else{
                $(this).prop("disabled",false);
            }
           
        });
        $(document).on('click', '.puntosAD', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var donacionT=$(this).parents().find('#donacionT')[0].value;
            var puntos_acumulados=$(this).parents().find('#puntos_acumulados')[0].value;
            var idUsuario=$(this).parents().find('#idUsuario')[0].value;
            var band =true;
            var donacionT1=parseFloat(donacionT);
            if (donacionT1 < 0){
                var n = noty({
                    text        : '<div class="alert alert-warning "><p><strong>Ingrese un valor correcto de donación v</p></div>',
                    layout      : 'topCenter', //or left, right, bottom-right...
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
                $('#alerta').load('./tables/facturacion/alerta.php', {tipo:"puntosAD",donacionT:donacionT,puntos_acumulados:puntos_acumulados,idUsuario:idUsuario},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }else{
                $(this).prop("disabled",false);
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
        $(document).off('click','.estado');
        $(document).off('click','.delete');
      });
  }]);
