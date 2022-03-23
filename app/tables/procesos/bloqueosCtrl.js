'use strict';

angular.module('newApp')
  .controller('bloqueosCtrl', ['$scope','pluginsService', function ($scope ,pluginsService) {
        $(document).ready(function () { 
            $(document).on('change','.evento' ,function(e) {
                $(this).parents().find('#fila').hide();
                $(this).parents().find('#laterales').hide();
                $(this).parents().find('#individual').hide();
                $(this).parents().find('#mapa').hide();
                $(this).parents().find('#tipo').hide();
                $(this).parents().find('#tipoB').hide(); 
                $(this).parents().find('#funciones').hide();
                $(this).parents().find('#fila1').hide(); 
                $(this).parents().find('#individual1').hide(); 
                $(this).parents().find('#reserva').hide();
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide(); 
                $(this).parents().find('#cantidad').hide();   
                if ( this.value=="none"){

                }else{
                    $(this).parents().find('#funciones').show();
                }
               
            });
        });
        $(document).ready(function () { 
            $(document).on('change','.funciones' ,function(e) {
                $(this).parents().find('#fila').hide();
                $(this).parents().find('#laterales').hide();
                $(this).parents().find('#individual').hide();
                $(this).parents().find('#mapa').hide();
                $(this).parents().find('#tipo').hide();
                $(this).parents().find('#tipoB').hide();
                $(this).parents().find('#fila1').hide(); 
                $(this).parents().find('#individual1').hide(); 
                $(this).parents().find('#reserva').hide();  
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();  
                $(this).parents().find('#cantidad').hide(); 
                if ( this.value=="none"){

                }else{
                    $(this).parents().find('#mapa').show();
                    var s= document.getElementById('tipoP');
                    var selectedItem = $(".evento option:selected");
                    s.innerHTML=null;
                    if(selectedItem.val()!="Principal" ){
                        $(".tipo").append('<option value="individual" selected>Individual</option>');
                        $(this).parents().find('#cantidad').show();
                    }else{
                        $(".tipo").append('<option value="none">Seleccione Tipo</option>');
                        $(".tipo").append('<option value="fila">Fila</option>');
                        $(".tipo").append('<option value="individual">Individual</option>');
                        $(".tipo").append('<option value="laterales">Laterales</option>');
                    }
                    $(this).parents().find('#tipo').show();
                    $(this).parents().find('#tipoB').show();
                }
            });
        });
        $(document).ready(function () { 
            $(document).on('change','.tipo' ,function(e) {
                $(this).parents().find('#fila').hide();
                $(this).parents().find('#laterales').hide();
                $(this).parents().find('#individual').hide();
                $(this).parents().find('#fila1').hide(); 
                $(this).parents().find('#individual1').hide();  
                $(this).parents().find('#reserva').hide(); 
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide(); 
                
                if ( this.value=="none"){

                }else if ( this.value=="fila"){
                    $(this).parents().find('#fila').show();
                    $(this).parents().find('#laterales').hide();
                    $(this).parents().find('#individual').hide();
                    $(this).parents().find('#fila1').hide();   
                }else if ( this.value=="laterales"){
                    $(this).parents().find('#fila').hide();
                    $(this).parents().find('#laterales').show();
                    $(this).parents().find('#individual').hide();
                    $(this).parents().find('#fila1').hide();   
                }else{
                    
                    $(this).parents().find('#fila').hide();
                    $(this).parents().find('#laterales').hide();
                    $(this).parents().find('#individual').show();
                    $(this).parents().find('#fila1').hide();       
                }
            });
        });
        //laterales
        $(document).ready(function () { 
            $(document).on('change','.cantidad' ,function(e) {
                $(this).parents().find('#reserva').hide(); 
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();   
                if ( this.value=="none"){
                   
                }else{
                    $(this).parents().find('#reserva').show(); 
                }
            });
        });
        $(document).ready(function () { 
            $(document).on('change','.laterales' ,function(e) {
                $(this).parents().find('#reserva').hide(); 
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();   
                if ( this.value=="none"){
                   
                }else{
                    $(this).parents().find('#reserva').show(); 
                }
            });
        });
        //fila
        $(document).ready(function () { 
            $(document).on('change','.fila' ,function(e) {
                $(this).parents().find('#fila1').hide();
                $(this).parents().find('#reserva').hide(); 
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();    
                if ( this.value=="none"){
                     
                }else{
                    $(this).parents().find('#fila1').show(); 
                    $(this).parents().find('#reserva').show(); 
                }
            });
        });
        //individual
        $(document).ready(function () { 
            $(document).on('change','.filaI' ,function(e) {
                $(this).parents().find('#individual1').hide(); 
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();   
                $(this).parents().find('#reserva').hide();  
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
                        calculaAsiento(0,138);
                    }

                    $(this).parents().find('#individual1').show(); 
                }
            });
        });
        function calculaAsiento(valor1, valor2) {
            for (var i=valor1, iLen=0; i>iLen; i=i-2) {
                $(".asiento").append('<option value="'+i+'">'+i+'</option>');
                console.log('<option value="'+i+'">'+i+'</option>');
            }
            for (var i=valor2, iLen=100; i>iLen; i--) {
                $(".asiento").append('<option value="'+i+'">'+i+'</option>');
                console.log('<option value="'+i+'">'+i+'</option>');
            }
            for (var i=2, iLen=valor1+2; i<iLen; i=i+2) {
                $(".asiento").append('<option value="'+i+'">'+i+'</option>');
                console.log('<option value="'+i+'">'+i+'</option>');
            }
        };
        $(document).ready(function () { 
            $(document).on('change','.asiento' ,function(e) {
                $(this).parents().find('#reserva').hide();  
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();   
                if ( this.value=="none"){
                   
                }else {
                    $(this).parents().find('#reserva').show(); 
                }
            });
        });
        $(document).ready(function () { 
            $(document).on('change','.reserva' ,function(e) {
                $(this).parents().find('#botones').hide();
                $(this).parents().find('#usuario').hide();   
                if ( this.value=="none"){
                
                }else if ( this.value=="bloqueo"){
                    $(this).parents().find('#botones').show(); 
                    
                }else{
                    $(this).parents().find('#usuario').show(); 
                }
            });
        });
        $(document).ready(function () { 
            $(document).on('change','.usuario' ,function(e) {
                $(this).parents().find('#botones').hide(); 
                if ( this.value=="none"){

                }else{
                    $(this).parents().find('#botones').show(); 
                }
            });
        });
        $("#guardarD").click(function () {
            var selectedItem = $("#filaA  option");
            var valueA = $("#ValuesA  option");
        });
      $scope.$on('$viewContentLoaded', function () {
          
      });

      $scope.$on('$destroy', function () {
        $ ('table').each(function () {
            if ($.fn.dataTable.isDataTable($(this))) {
              $(this).dataTable({
                  "bDestroy": true
              }).fnDestroy();
              $(this).DataTable().destroy;
            }
        });
        
      });
  }]);
