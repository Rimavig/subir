'use strict';

angular.module('newApp')
  .controller('bloqueosCtrl', ['$scope','pluginsService', function ($scope ,pluginsService) {
        $(document).ready(function () { 
            $(document).on('change','.evento' ,function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                $(this).parents().find('#fila').hide();
                $(this).parents().find('#laterales').hide();
                $(this).parents().find('#individual').hide();
                $(this).parents().find('#mapa').hide();
                $(this).parents().find('#tipo').hide();
                $(this).parents().find('#tipoB').hide(); 
                $(this).parents().find('#funciones').hide();
                $(this).parents().find('#filaF1').hide(); 
                $(this).parents().find('#filaF2').hide();
                $(this).parents().find('#individual1').hide(); 
                $(this).parents().find('#reserva').hide();
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide(); 
                $(this).parents().find('#cantidad').hide();
                $(this).parents().find('#nombreG').hide(); 
                $(this).parents().find('#correoG').hide();   
                $(this).parents().find('#datos').hide();
                $(this).parents().find('#mensaje2').hide();
                $(this).parents().find('#verSala1').hide();
                var texto=$(this).parents().find('.evento').find('option:selected').text();
                let arr = texto.split(':');
                var principal="true";
                if(arr[0] !="Sala Principal" ){
                    principal="false";
                }
                if ( this.value=="none"){

                }else{
                    var tipo=$(this).parents().find('.evento')[0].value;
                    $('.page-spinner-loader').removeClass('hide');
                    $('#funciones').load('./tables/procesos/funciones.php',{var1:tipo, principal:principal},function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $(this).parents().find('#funciones').show();
                        $('.funciones  option:first').prop('selected', true);
                        $('.plateas  option:first').prop('selected', true);
                    });
                   
                }
               
            });
            $(document).on('change','.funciones' ,function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                $(this).parents().find('#fila').hide();
                $(this).parents().find('#laterales').hide();
                $(this).parents().find('#individual').hide();
                $(this).parents().find('#mapa').hide();
                $(this).parents().find('#tipo').hide();
                $(this).parents().find('#tipoB').hide();
                $(this).parents().find('#filaF1').hide(); 
                $(this).parents().find('#filaF2').hide();
                $(this).parents().find('#individual1').hide(); 
                $(this).parents().find('#reserva').hide();  
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();  
                $(this).parents().find('#cantidad').hide(); 
                $(this).parents().find('#nombreG').hide(); 
                $(this).parents().find('#correoG').hide();
                $(this).parents().find('#datos').hide();
                $(this).parents().find('#mensaje2').hide();
                $(this).parents().find('#verSala1').hide();
                if ( this.value=="none"){

                }else{
                    $(this).parents().find('#mapa').show();
                    var s= document.getElementById('tipoP');
                    var texto=$(this).parents().find('.evento').find('option:selected').text();
                    let arr = texto.split(':');
                    s.innerHTML=null;
                    if(arr[0] !="Sala Principal" ){
                        $(".tipo").append('<option value="cantidad" selected>Individual</option>');
                        $(this).parents().find('#cantidad').show();
                        $('#reserva  option:first').prop('selected', true);
                        $(this).parents().find('#reserva').show(); 
                    }else{
                        $(".tipo").append('<option value="none">Seleccione Tipo</option>');
                        $(".tipo").append('<option value="fila">Fila</option>');
                        $(".tipo").append('<option value="laterales">Laterales</option>');
                        $(".tipo").append('<option value="asiento">Asiento</option>');
                    }
                    $('#tipo  option:first').prop('selected', true);
                    $(this).parents().find('#tipo').show();
                    $(this).parents().find('#tipoB').show();
                }
            });
            $(document).on('change','.plateas' ,function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                $(this).parents().find('#datos').hide();
                $(this).parents().find('#mensaje2').hide();
                $(this).parents().find('#verSala1').hide();
                if ( this.value=="none"){

                }else{
                    $(this).parents().find('#mapa').show();
                    var texto=$(this).parents().find('.evento').find('option:selected').text();
                    let arr = texto.split(':');
                    var funcion=$(this).parents().find('.funciones')[0].value;
                    if(funcion=="none"){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Seleccione una función</p></div>',
                            layout      : 'topCenter', //or left, right, bottom-right...
                            theme       : 'made',
                            type        : 'error',
                            maxVisible  : 5,
                            animation   : {
                                open  : 'animated bounceIn',
                                close : 'animated bounceOut'
                            },
                            timeout: 3000,
                        });
                        $('.plateas  option:first').prop('selected', true);
                    }else{
                        var platea=$(this).parents().find('.plateas')[0].value;
                        if(arr[0] !="Sala Principal" ){
                            $('.page-spinner-loader').removeClass('hide');
                            $('#datos').load('./tables/procesos/datos.php',{funcion:funcion, platea:platea},function() {    
                                $('.page-spinner-loader').addClass('hide');
                                $(this).parents().find('#datos').show();
                            });
                          
                        }else{
                            $(this).parents().find('#datos').hide();
                        }
                    }
                   
                }
            });
            $(document).on('click', '.mapa', function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                $(this).prop("disabled",true); 
                var id=$(this).parents().find('.evento')[0].value;
                var funcion=$(this).parents().find('.funciones')[0].value;
                var texto=$(this).parents().find('.evento').find('option:selected').text();
                let arr = texto.split(':');
                if(id !="none"){
                    $('.page-spinner-loader').removeClass('hide');
                    if(arr[0] ==="Sala Principal"){
                        $('#verSala1').load('./tables/procesos/ver_salaG.php', {var1:funcion, var2:id, tipo:"bloqueo"},function() {    
                            $('.page-spinner-loader').addClass('hide');
                            $(this).parents().find('#verSala1').show();
                            $('#reserva  option:first').prop('selected', true);
                            //$('#verSala').modal('show'); // abrir
                        });
                        
                    }else{
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
                var tipo=$(this).parents().find('.reserva')[0].value;
                if ( tipo=="C"){
                    if(filename == "area1.png" | filename == "bloqueo.png" |filename == "area2.png" | filename == "area3.png" | filename == "area4.png" | filename == "area5.png" | filename == "area6.png") {
                        $(this).attr("src","../../../assets/boleto/images/movie/cortesia.png");
                        $('#mensaje3').tagsinput('add',  $(this)[0].id);
                        if( filename == "bloqueo.png"){
                            $('#mensaje4').tagsinput('add',  $(this)[0].id);
                        }
                    }
                }else if ( tipo=="B" ){
                    if(filename == "area1.png" | filename == "area2.png" | filename == "area3.png" | filename == "area4.png" | filename == "area5.png" | filename == "area6.png") {
                        $(this).attr("src","../../../assets/boleto/images/movie/bloqueo.png");
                        $('#mensaje3').tagsinput('add',  $(this)[0].id);
                    }
                }else if ( tipo=="D" ){
                    if(filename == "bloqueo.png") {
                        $(this).attr("src","../../../assets/boleto/images/movie/area1.png");
                        $('#mensaje3').tagsinput('add',  $(this)[0].id);
                    }
                }
            });
            $(document).on('beforeItemRemove', '#mensaje3', function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                var texto=$('#mensaje4').val();
                var tag = e.item;
                var tipo=$(this).parents().find('.reserva')[0].value;
                if ( tipo=="C"){
                    if(texto.includes(tag)){
                        $("#"+tag).attr("src","../../../assets/boleto/images/movie/bloqueo.png");
                        $('#mensaje4').tagsinput('remove', tag);
                    }else{
                        $("#"+tag).attr("src","../../../assets/boleto/images/movie/area1.png");
                    }
                }else if ( tipo=="D" ){
                    $("#"+tag).attr("src","../../../assets/boleto/images/movie/bloqueo.png");
                }else if ( tipo=="B" ){
                    $("#"+tag).attr("src","../../../assets/boleto/images/movie/area1.png");
                }
               
            });                  
            $(document).on('change','.tipo' ,function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                $(this).parents().find('#fila').hide();
                $(this).parents().find('#laterales').hide();
                $(this).parents().find('#individual').hide();
                $(this).parents().find('#filaF1').hide(); 
                $(this).parents().find('#filaF2').hide();
                $(this).parents().find('#individual1').hide();  
                $(this).parents().find('#reserva').hide(); 
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide(); 
                $(this).parents().find('#nombreG').hide(); 
                $(this).parents().find('#correoG').hide();
                $(this).parents().find('#mensaje2').hide(); 
                $(this).parents().find('#verSala1').hide();
                var id=$(this).parents().find('.evento')[0].value;
                var funcion=$(this).parents().find('.funciones')[0].value;
                
                $('#reserva  option[value="C"]').remove();
                $('.reserva').append('<option value="C">Cortesía</option>');
                $('#reserva  option:first').prop('selected', true);
                if ( this.value=="none"){

                }else if ( this.value=="fila"){
                    $(this).parents().find('#fila').show();
                    $('#fila  option:first').prop('selected', true);
                    $(this).parents().find('#laterales').hide();
                    $(this).parents().find('#individual').hide();
                    $(this).parents().find('#filaF1').hide();   
                    $(this).parents().find('#filaF2').hide();
                    $('#verSala1').load('./tables/procesos/ver_salaG.php', {var1:funcion, var2:id, tipo:"bloqueo"},function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $(this).parents().find('#verSala1').show();
                        //$('#verSala').modal('show'); // abrir
                    });
                }else if ( this.value=="laterales"){
                    $(this).parents().find('#fila').hide();
                    $('#laterales  option:first').prop('selected', true);
                    $('#reserva  option[value="C"]').remove();
                    $(this).parents().find('#laterales').show();
                    $(this).parents().find('#individual').hide();
                    $(this).parents().find('#filaF1').hide();   
                    $(this).parents().find('#filaF2').hide();
                    $('#verSala1').load('./tables/procesos/ver_salaG.php', {var1:funcion, var2:id, tipo:"bloqueo"},function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $(this).parents().find('#verSala1').show();
                    });
                }else if ( this.value=="asiento"){
                    $(this).parents().find('#fila').hide();
                    $(this).parents().find('#laterales').hide();
                    $(this).parents().find('#filaF1').hide(); 
                    $(this).parents().find('#filaF2').hide();
                    $('#reserva  option:first').prop('selected', true);
                    $(this).parents().find('#reserva').show(); 
                }else{
                    
                    $(this).parents().find('#fila').hide();
                    $(this).parents().find('#laterales').hide();
                    $(this).parents().find('#individual').show();
                    $(this).parents().find('#filaF1').hide(); 
                    $(this).parents().find('#filaF2').hide();      
                }
            });
            $(document).on('change','.cantidad' ,function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                $(this).parents().find('#reserva').hide(); 
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();  
                $(this).parents().find('#nombreG').hide(); 
                $(this).parents().find('#correoG').hide(); 
                $(this).parents().find('#mensaje2').hide();
                if ( this.value=="none"){
                   
                }else{
                    $('#reserva  option:first').prop('selected', true);
                    $(this).parents().find('#reserva').show(); 
           
                }
            });
            $(document).on('change','.laterales' ,function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                $(this).parents().find('#reserva').hide(); 
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();  
                $(this).parents().find('#nombreG').hide(); 
                $(this).parents().find('#correoG').hide(); 
                $(this).parents().find('#mensaje2').hide();
               // $(this).parents().find('#verSala1').hide();
                if ( this.value=="none"){
                   
                }else{
                    $('#reserva  option:first').prop('selected', true);
                    $(this).parents().find('#reserva').show(); 
                   
                }
            });
             //fila
             $(document).on('change','.fila' ,function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                $(this).parents().find('#filaF1').hide();
                $(this).parents().find('#filaF2').hide();
                $(this).parents().find('#reserva').hide(); 
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();   
                $(this).parents().find('#nombreG').hide(); 
                $(this).parents().find('#correoG').hide(); 
                $(this).parents().find('#mensaje2').hide();
                //$(this).parents().find('#verSala1').hide();
                if ( this.value=="none"){
                     
                }else{
                    var s= document.getElementById('AsientoF1');
                    var selectedItem = $(".fila option:selected");
                    s.innerHTML=null;
                    if(selectedItem.val()=="A" ){
                        calculaAsiento1(10,116);
                    }else if(selectedItem.val()=="B"){
                         calculaAsiento1(10,117);
                    }else if(selectedItem.val()=="C"){
                         calculaAsiento1(20,118);
                    }else if(selectedItem.val()=="D"){
                         calculaAsiento1(20,119);
                    }else if(selectedItem.val()=="E"){
                         calculaAsiento1(20,120);
                    }else if(selectedItem.val()=="F"){
                         calculaAsiento1(20,121);
                    }else if(selectedItem.val()=="G"){
                         calculaAsiento1(20,122);
                    }else if(selectedItem.val()=="H"){
                         calculaAsiento1(18,123);
                    }else if(selectedItem.val()=="J"){
                         calculaAsiento1(18,124);
                    }else if(selectedItem.val()=="K"){
                         calculaAsiento1(18,125);
                    }else if(selectedItem.val()=="L"){
                         calculaAsiento1(18,126);
                    }else if(selectedItem.val()=="M"){
                         calculaAsiento1(18,128);
                    }else if(selectedItem.val()=="N"){
                         calculaAsiento1(18,129);
                    }else if(selectedItem.val()=="O"){
                         calculaAsiento1(18,130);
                    }else if(selectedItem.val()=="P"){
                         calculaAsiento1(18,131);
                    }else if(selectedItem.val()=="Q"){
                         calculaAsiento1(16,132);
                    }else if(selectedItem.val()=="R"){
                         calculaAsiento1(16,133);
                    }else if(selectedItem.val()=="S"){
                         calculaAsiento1(16,134);
                    }else if(selectedItem.val()=="T"){
                         calculaAsiento1(16,135);
                    }else if(selectedItem.val()=="U"){
                         calculaAsiento1(16,136);
                    }else if(selectedItem.val()=="V"){
                         calculaAsiento1(16,136);
                    }else if(selectedItem.val()=="W"){
                         calculaAsiento1(0,137);
                    }
                    $('#reserva  option:first').prop('selected', true);

                    $(this).parents().find('#filaF1').show(); 
                }
            });
            $(document).on('change','.asientoF1' ,function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                $(this).parents().find('#filaF2').hide();
                $(this).parents().find('#reserva').hide(); 
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();  
                $(this).parents().find('#nombreG').hide(); 
                $(this).parents().find('#correoG').hide();
                $(this).parents().find('#mensaje2').hide();
               // $(this).parents().find('#verSala1').hide();
                if ( this.value=="none"){
                     
                }else{
                    var s= document.getElementById('AsientoF2');
                    var selectedItem = $(".fila option:selected");
                    var selectedItem1 = $(".asientoF1 option:selected").val();
                    s.innerHTML=null;
                    if(selectedItem.val()=="A" ){
                        calculaAsiento2(selectedItem1,10,116);
                    }else if(selectedItem.val()=="B"){
                         calculaAsiento2(selectedItem1,10,117);
                    }else if(selectedItem.val()=="C"){
                         calculaAsiento2(selectedItem1,20,118);
                    }else if(selectedItem.val()=="D"){
                         calculaAsiento2(selectedItem1,20,119);
                    }else if(selectedItem.val()=="E"){
                         calculaAsiento2(selectedItem1,20,120);
                    }else if(selectedItem.val()=="F"){
                         calculaAsiento2(selectedItem1,20,121);
                    }else if(selectedItem.val()=="G"){
                         calculaAsiento2(selectedItem1,20,122);
                    }else if(selectedItem.val()=="H"){
                         calculaAsiento2(selectedItem1,18,123);
                    }else if(selectedItem.val()=="J"){
                         calculaAsiento2(selectedItem1,18,124);
                    }else if(selectedItem.val()=="K"){
                         calculaAsiento2(selectedItem1,18,125);
                    }else if(selectedItem.val()=="L"){
                         calculaAsiento2(selectedItem1,18,126);
                    }else if(selectedItem.val()=="M"){
                         calculaAsiento2(selectedItem1,18,128);
                    }else if(selectedItem.val()=="N"){
                         calculaAsiento2(selectedItem1,18,129);
                    }else if(selectedItem.val()=="O"){
                         calculaAsiento2(selectedItem1,18,130);
                    }else if(selectedItem.val()=="P"){
                         calculaAsiento2(selectedItem1,18,131);
                    }else if(selectedItem.val()=="Q"){
                         calculaAsiento2(selectedItem1,16,132);
                    }else if(selectedItem.val()=="R"){
                         calculaAsiento2(selectedItem1,16,133);
                    }else if(selectedItem.val()=="S"){
                         calculaAsiento2(selectedItem1,16,134);
                    }else if(selectedItem.val()=="T"){
                         calculaAsiento2(selectedItem1,16,135);
                    }else if(selectedItem.val()=="U"){
                         calculaAsiento2(selectedItem1,16,136);
                    }else if(selectedItem.val()=="V"){
                         calculaAsiento2(selectedItem1,16,136);
                    }else if(selectedItem.val()=="W"){
                         calculaAsiento2(selectedItem1,0,137);
                    }
                    $('#reserva  option:first').prop('selected', true);
                    $(this).parents().find('#filaF2').show(); 
                    $(this).parents().find('#reserva').show(); 
                  
                }
            });
            //individual
            $(document).on('change','.filaI' ,function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                $(this).parents().find('#individual1').hide(); 
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();   
                $(this).parents().find('#reserva').hide();  
                $(this).parents().find('#nombreG').hide(); 
                $(this).parents().find('#correoG').hide();
                $(this).parents().find('#mensaje2').hide();
                if ( this.value=="none"){
                    
                }else{
                    var s= document.getElementById('AsientoI');
                    var selectedItem = $(".filaI option:selected");
                    s.innerHTML=null;
                    if(selectedItem.val()=="A" ){
                       calculaAsiento(9,116);
                    }else if(selectedItem.val()=="B"){
                        calculaAsiento(9,117);
                    }else if(selectedItem.val()=="C"){
                        calculaAsiento(19,118);
                    }else if(selectedItem.val()=="D"){
                        calculaAsiento(19,119);
                    }else if(selectedItem.val()=="E"){
                        calculaAsiento(19,120);
                    }else if(selectedItem.val()=="F"){
                        calculaAsiento(19,121);
                    }else if(selectedItem.val()=="G"){
                        calculaAsiento(19,122);
                    }else if(selectedItem.val()=="H"){
                        calculaAsiento(17,123);
                    }else if(selectedItem.val()=="J"){
                        calculaAsiento(17,124);
                    }else if(selectedItem.val()=="K"){
                        calculaAsiento(17,125);
                    }else if(selectedItem.val()=="L"){
                        calculaAsiento(17,126);
                    }else if(selectedItem.val()=="M"){
                        calculaAsiento(17,128);
                    }else if(selectedItem.val()=="N"){
                        calculaAsiento(17,129);
                    }else if(selectedItem.val()=="O"){
                        calculaAsiento(17,130);
                    }else if(selectedItem.val()=="P"){
                        calculaAsiento(17,131);
                    }else if(selectedItem.val()=="Q"){
                        calculaAsiento(15,132);
                    }else if(selectedItem.val()=="R"){
                        calculaAsiento(15,133);
                    }else if(selectedItem.val()=="S"){
                        calculaAsiento(15,134);
                    }else if(selectedItem.val()=="T"){
                        calculaAsiento(15,135);
                    }else if(selectedItem.val()=="U"){
                        calculaAsiento(15,136);
                    }else if(selectedItem.val()=="V"){
                        calculaAsiento(15,136);
                    }else if(selectedItem.val()=="W"){
                        calculaAsiento(0,137);
                    }
                    $('#individual1  option:first').prop('selected', true);
                    $(this).parents().find('#individual1').show(); 
                }
            });
            $(document).on('change','.asiento' ,function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                $(this).parents().find('#reserva').hide();  
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();   
                $(this).parents().find('#nombreG').hide(); 
                $(this).parents().find('#correoG').hide();
                $(this).parents().find('#mensaje2').hide();
                $(this).parents().find('#verSala1').hide();
                if ( this.value=="none"){
                   
                }else {
                    $('#reserva  option:first').prop('selected', true);
                    $(this).parents().find('#reserva').show(); 
                }
            });
            $(document).on('change','.reserva' ,function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                $('#mensaje3').tagsinput('removeAll');
                $('#mensaje4').tagsinput('removeAll');
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();   
                $(this).parents().find('#nombreG').hide(); 
                $(this).parents().find('#correoG').hide();
                if ( this.value=="none"){
                
                }else if ( this.value=="B" | this.value=="D"  ){
                    $(this).parents().find('#botones').show(); 
                    
                }else{
                    $(this).parents().find('#botones').show(); 
                    $(this).parents().find('#nombreG').show(); 
                    $(this).parents().find('#correoG').show(); 
                }
                var id=$(this).parents().find('.evento')[0].value;
                var tipo=$(this).parents().find('.tipo')[0].value;
                var asiento=$(this).parents().find('#mensaje3')[0];
                if(tipo=="asiento"){
                    $('#mensaje2').removeClass('esconder');
                    $(this).parents().find('#mensaje2').show(); 
                    asiento.value="";
                    var funcion=$(this).parents().find('.funciones')[0].value;
                    $('#verSala1').load('./tables/procesos/ver_sala.php', {var1:funcion, var2:id, tipo:"bloqueo"},function() {    
                        $('.page-spinner-loader').addClass('hide');
                        $(this).parents().find('#verSala1').show(); 
                        $('#verSala1').removeClass('hide'); 
                    });
                }
               
            });
            $(document).on('change','.usuario' ,function(e) {
                $(this).parents().find('#botones').hide(); 
                if ( this.value=="none"){
                
                }else if ( this.value=="U"  ){
                    $(this).parents().find('#botones').show(); 
                    
                }else{
                    $(this).parents().find('#usuario').show(); 
                }

            });
        });
        $scope.reload = function()
        {
        location.reload(); 
        }
        function calculaAsiento(valor1, valor2) {
            for (var i=valor1, iLen=0; i>iLen; i=i-2) {
                $(".asiento").append('<option value="'+i+'">'+i+'</option>');
            }
            for (var i=valor2, iLen=100; i>iLen; i--) {
                $(".asiento").append('<option value="'+i+'">'+i+'</option>');
            }
            for (var i=2, iLen=valor1+2; i<iLen; i=i+2) {
                $(".asiento").append('<option value="'+i+'">'+i+'</option>');
            }
        };
        function calculaAsiento1(valor1, valor2) {
            for (var i=valor1, iLen=0; i>iLen; i=i-2) {
                $(".asientoF1").append('<option value="'+i+'">'+i+'</option>');
            }
            for (var i=101, iLen=valor2+1; i<iLen; i++) {
                $(".asientoF1").append('<option value="'+i+'">'+i+'</option>');
            }
            for (var i=1, iLen=valor1+1; i<iLen; i=i+2) {
                $(".asientoF1").append('<option value="'+i+'">'+i+'</option>');
            }
            
           
        };
        function calculaAsiento2(valor1, valor3, valor2) {
            if(valor1%2==0 && valor1<99){
                for (var i=valor1, iLen=0; i>iLen; i=i-2) {
                    $(".asientoF2").append('<option value="'+i+'">'+i+'</option>');
                }
                for (var i=101, iLen=valor2+1; i<iLen; i++) {
                    $(".asientoF2").append('<option value="'+i+'">'+i+'</option>');
                }
                for (var i=1, iLen=valor3+1; i<iLen; i=i+2) {
                    $(".asientoF2").append('<option value="'+i+'">'+i+'</option>');
                }
                
            }else{
                if(valor1%2!=0 && valor1<99){
                    for (var i=valor1, iLen=valor3+1; i<iLen; i++) {
                        $(".asientoF2").append('<option value="'+i+'">'+i+'</option>');
                        i++;
                    }
                }else{
                    for (var i=valor1, iLen=valor2+1; i<iLen; i++) {
                        $(".asientoF2").append('<option value="'+i+'">'+i+'</option>');
                    }
                    for (var i=1, iLen=valor3+1; i<iLen; i=i+2) {
                        $(".asientoF2").append('<option value="'+i+'">'+i+'</option>');
                    }
                }
            }
            
            
        };
      $scope.$on('$viewContentLoaded', function () {
        setTimeout(function(){
            inputSelect();
        },200);
        $(document).on('click', '.bloquear_asiento', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var funcion=$(this).parents().find('.funciones')[0].value;
            var platea=$(this).parents().find('.plateas')[0].value;
            var tipo=$(this).parents().find('.tipo')[0].value;
            var tipoR=$(this).parents().find('.reserva')[0].value;
            var idEvento=$(this).parents().find('.evento')[0].value;
            var band=true;
            var nombre="";
            var correo="";
            var descripcion="";
            if(platea=="none"){
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
                $(this).prop("disabled",false);
            }
            if(tipoR=="C"){
                nombre=$(this).parents().find('#nombre')[0].value;
                correo=$(this).parents().find('#correo')[0].value;
                if(nombre.length<5){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese un nombre</p></div>',
                        layout      : 'topCenter', //or left, right, bottom-right...
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
                        text        : '<div class="alert alert-warning "><p><strong>Ingrese un correo valido</p></div>',
                        layout      : 'topCenter', //or left, right, bottom-right...
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
                $(this).prop("disabled",false);
            }
            if(band){
                if ( tipo=="none"){
                    var n = noty({
                        text        : '<div class="alert alert-warning "><p><strong>Seleccione Tipo de bloqueo</p></div>',
                        layout      : 'topCenter', //or left, right, bottom-right...
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
                }else if ( tipo =="fila"){
                    var fila=$(this).parents().find('.fila')[0].value;
                    var desde=$(this).parents().find('.asientoF1')[0].value;
                    var hasta=$(this).parents().find('.asientoF2')[0].value;
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {idEvento:idEvento,funcion:funcion,platea:platea,tipo:tipo, fila:fila, desde:desde, hasta:hasta, tipoR:tipoR, nombre:nombre, correo:correo, descripcion:descripcion},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                    $(this).prop("disabled",false);
                }else if ( tipo=="laterales"){
                    var lateral=$(this).parents().find('.laterales')[0].value;
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {idEvento:idEvento,funcion:funcion,platea:platea,tipo:tipo, lateral:lateral, tipoR:tipoR, nombre:nombre, correo:correo, descripcion:descripcion},function() {    
                        $('.page-spinner-loader').addClass('hide');
                    });
                    $(this).prop("disabled",false);
                }else if ( tipo=="cantidad"){
                    var cantidad=$(this).parents().find('.cantidad')[0].value;
                    if(cantidad>0){
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php', {funcion:funcion,platea:platea,tipo:tipo,  cantidad:cantidad, tipoR:tipoR, nombre:nombre, correo:correo, descripcion:descripcion},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }else{
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Ingrese una cantidad valida</p></div>',
                            layout      : 'topCenter', //or left, right, bottom-right...
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
                    $(this).prop("disabled",false);
                }else if ( tipo=="asiento"){
                    
                    var asiento=$(this).parents().find('#mensaje3')[0].value;
                    if(asiento==""){
                        var n = noty({
                            text        : '<div class="alert alert-warning "><p><strong>Seleccione asientos</p></div>',
                            layout      : 'topCenter', //or left, right, bottom-right...
                            theme       : 'made',
                            type        : 'error',
                            maxVisible  : 5,
                            animation   : {
                                open  : 'animated bounceIn',
                                close : 'animated bounceOut'
                            },
                            timeout: 3000,
                        });
                    }else{
                        $('.page-spinner-loader').removeClass('hide');
                        $('#alerta').load('./tables/procesos/alerta.php', {idEvento:idEvento,funcion:funcion,platea:platea,tipo:tipo, asiento:asiento, tipoR:tipoR, nombre:nombre, correo:correo, descripcion:descripcion},function() {    
                            $('.page-spinner-loader').addClass('hide');
                        });
                    }
                    
                    $(this).prop("disabled",false);    
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
                $('#alerta').load('./tables/procesos/alerta.php', {id3:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
        $(document).on('click', '.editar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('#Ecortesia').load('./tables/procesos/Ecortesia.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                $('.Gcortesia').addClass('hide');
                $('.Ecortesia').removeClass('hide');
            });
            $(this).prop("disabled",false);
        });
        //boton eliminar
        $(document).on('click', '.deleteE', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
            var estado=$(this).parents().find('#Eid')[0].value;
            console.log(estado);
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/procesos/alerta.php', {id3:id,id2:estado, estadoE:"B"},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }     
        });
        $(document).on('click', '.estadoE', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('#fila0')[0].innerHTML;
            var estado=$(this).parents('tr').find('#Ebox')[0];     
            if(estado.checked) {
                if (confirm("Estas seguro de Inactivar?") == false) {
                    $(this).prop("disabled",false);
                    return;
                }else{
                    $('.page-spinner-loader').removeClass('hide');
                    $('#alerta').load('./tables/procesos/alerta.php', {estadoE:"I", id:id},function() {    
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
                    $('#alerta').load('./tables/procesos/alerta.php', { estadoE:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                      //  estado.checked = true;
                      //  oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" checked disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">On</span> </label>', nRow, 6, false);
                      //  oTable.fnDraw();    
                    });
                    
                }
            }
        });
        $(document).on('click', '.cancelarE', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.Gcortesia').removeClass('hide');   
            $('.Ecortesia').addClass('hide');
            var table = $('#table-editable').DataTable();
            table.ajax.reload();
        });
        $(document).on('click', '.correoR', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            $('.page-spinner-loader').removeClass('hide');
            $('#alerta').load('./tables/reportes/alerta.php', {tipo:"cortesia", id:id},function() {    
                $('.page-spinner-loader').addClass('hide');
            });
        });
      });

      $scope.$on('$destroy', function () {
        $('#table-editable').DataTable().clear().destroy();
        var tables = $.fn.dataTable.fnTables(true);
        $(tables).each(function () {
            $(this).dataTable().fnDestroy();
        });
        $(document).off('click','.correoR');
        $(document).off('change','.evento');
        $(document).off('change','.funciones');
        $(document).off('change','#mensaje3');
        $(document).off('beforeItemRemove','.plateas');
        $(document).off('click','.seat-free img');
        $(document).off('click','.delete');
        $(document).off('change','.tipo');
        $(document).off('change','.cantidad');
        $(document).off('change','.laterales');
        $(document).off('change','.fila');
        $(document).off('change','.asientoF1');
        $(document).off('change','.filaI');
        $(document).off('change','.asiento');
        $(document).off('change','.reserva');
        $(document).off('change','.usuario');
        $(document).off('click','.bloquear_asiento');
        $(document).off('click','.mapa');
        $(document).off('click','.editar');
        $(document).off('click','.deleteE');
        $(document).off('click','.estadoE');
        $(document).off('click','.cancelarE');
      });
  }]);
