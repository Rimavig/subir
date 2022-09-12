'use strict';

angular.module('newApp')
  .controller('permisosCtrl', ['$scope', function ($scope) {
    setTimeout(function(){
        handleiCheck();
    },200);

    $scope.reload = function()
    {
    location.reload(); 
    }
    $scope.$on('$viewContentLoaded', function () {
 
        function seleccionar(padre,tipo) {

            $(document).on('ifUnchecked','#exportar'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#crear'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#editar'+tipo ,function(e) {
                $(this).parents().find('#admin').iCheck('uncheck');
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#informacion'+tipo).iCheck('uncheck');
                $(this).parents().find('#descripcion'+tipo).iCheck('uncheck');
                $(this).parents().find('#multimedia'+tipo).iCheck('uncheck');
                $(this).parents().find('#funciones'+tipo).iCheck('uncheck');
                $(this).parents().find('#precios'+tipo).iCheck('uncheck');
                $(this).parents().find('.esconder'+tipo).addClass('hide');
            });
            $(document).on('ifChecked','#editar'+tipo ,function(e) {
                $(this).parents().find('#admin').iCheck('uncheck');
                $(this).parents().find('.esconder'+tipo).removeClass('hide');
            });
            $(document).on('ifUnchecked','#eliminar'+tipo ,function(e) {
                $(this).parents().find('#admin').iCheck('uncheck');
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#estado'+tipo ,function(e) {
                $(this).parents().find('#admin').iCheck('uncheck');
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#reset'+tipo ,function(e) {
                $(this).parents().find('#admin').iCheck('uncheck');
                $(this).parents().find(padre).iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#bloquear'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#cortesia'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#informacion'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#descripcion'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#multimedia'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#funciones'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#precios'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#moviles'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#B1'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#B2'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#recepcion'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#correo'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#ticket'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#actualizarF'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#eliminarC'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#devolucion'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#anularC'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#notaCredito'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#adminG'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#admin').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#puntos'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#puntos').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#cumpleanos'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#cumpleanos').iCheck('uncheck');
            });
            $(document).on('ifUnchecked','#regalo'+tipo ,function(e) {
                $(this).parents().find(padre).iCheck('uncheck');
                $(this).parents().find('#regalo').iCheck('uncheck');
            });
            $(document).on('ifChecked',padre ,function(e) {
                $(this).parents().find('#exportar'+tipo).iCheck('check');
                $(this).parents().find('#crear'+tipo).iCheck('check');
                $(this).parents().find('#editar'+tipo).iCheck('check');
                $(this).parents().find('#eliminar'+tipo).iCheck('check');
                $(this).parents().find('#estado'+tipo).iCheck('check');
                $(this).parents().find('#reset'+tipo).iCheck('check');
                $(this).parents().find('#bloquear'+tipo).iCheck('check');
                $(this).parents().find('#cortesia'+tipo).iCheck('check');
                $(this).parents().find('#informacion'+tipo).iCheck('check');
                $(this).parents().find('#descripcion'+tipo).iCheck('check');
                $(this).parents().find('#multimedia'+tipo).iCheck('check');
                $(this).parents().find('#funciones'+tipo).iCheck('check');
                $(this).parents().find('#precios'+tipo).iCheck('check');
                $(this).parents().find('#facturacion'+tipo).iCheck('check');
                $(this).parents().find('#moviles'+tipo).iCheck('check');
                $(this).parents().find('#B1'+tipo).iCheck('check');
                $(this).parents().find('#B2'+tipo).iCheck('check');
                $(this).parents().find('#recepcion'+tipo).iCheck('check');
                $(this).parents().find('#correo'+tipo).iCheck('check');
                $(this).parents().find('#ticket'+tipo).iCheck('check');
                $(this).parents().find('#actualizarF'+tipo).iCheck('check');
                $(this).parents().find('#eliminarC'+tipo).iCheck('check');
                $(this).parents().find('#devolucion'+tipo).iCheck('check');
                $(this).parents().find('#anularC'+tipo).iCheck('check');
                $(this).parents().find('#notaCredito'+tipo).iCheck('check');
                $(this).parents().find('#adminG'+tipo).iCheck('check');
                $(this).parents().find('#puntos'+tipo).iCheck('check');
                $(this).parents().find('#cumpleanos'+tipo).iCheck('check');
                $(this).parents().find('#regalo'+tipo).iCheck('check');

                $(this).parents().find('.esconder'+tipo).removeClass('hide');
            });
            
        }
        $(document).on('change','#admin' ,function(e) {
                
            if(this.checked) {
                $('.page-spinner-loader').removeClass('hide');
                $(this).parents().find('#Tperfiles').iCheck('check');
                $(this).parents().find('#usuariosUAD').iCheck('check');
                $(this).parents().find('#usuariosUCL').iCheck('check');
                $(this).parents().find('#usuariosUEV').iCheck('check');
                $(this).parents().find('#Tcategoria').iCheck('check');

                $(this).parents().find('#Tclasificacion').iCheck('check');
                $(this).parents().find('#Tespectaculo').iCheck('check');
                $(this).parents().find('#Tprocedencia').iCheck('check');
                $(this).parents().find('#TtipoEvento').iCheck('check');
                $(this).parents().find('#Tproductora').iCheck('check');
                $(this).parents().find('#Tpromocion').iCheck('check');
                $(this).parents().find('#TdistribucionP').iCheck('check');
                $(this).parents().find('#TdistribucionE').iCheck('check');
                $(this).parents().find('#Tsala').iCheck('check');

                $(this).parents().find('#TimagenSala').iCheck('check');
                $(this).parents().find('#TimagenDistribucion').iCheck('check');
                $(this).parents().find('#TimagenBanner').iCheck('check');
                $(this).parents().find('#Tlogo').iCheck('check');

                $(this).parents().find('#Tgratuito').iCheck('check');
                $(this).parents().find('#Tinformativo').iCheck('check');
                $(this).parents().find('#Tventa').iCheck('check');
                $(this).parents().find('#Tbloqueos').iCheck('check');
                $(this).parents().find('#TventaDestacado').iCheck('check');

                $(this).parents().find('#TditribucionSala').iCheck('check');
                $(this).parents().find('#TeliminarCortesia').iCheck('check');
                $(this).parents().find('#TprocesosPromocion').iCheck('check');
                $(this).parents().find('#TprocesosPromocionG').iCheck('check');
                $(this).parents().find('#TprocesosAmigosB').iCheck('check');
                $(this).parents().find('#TprocesosAmigosP').iCheck('check');
                $(this).parents().find('#TprocesosAmigosI').iCheck('check');
                $(this).parents().find('#TprocesosContactos').iCheck('check');
                $(this).parents().find('#TprocesosFundacion').iCheck('check');
                $(this).parents().find('#TprocesosPromocionF').iCheck('check');

                $(this).parents().find('#TwebImagen').iCheck('check');
                $(this).parents().find('#TwebOtrasImagen').iCheck('check');
                $(this).parents().find('#TwebOtrasBanner').iCheck('check');
                $(this).parents().find('#TwebTeatroQuienes').iCheck('check');
                $(this).parents().find('#TwebTeatroInstalaciones').iCheck('check');
                $(this).parents().find('#TwebTeatroNoticias').iCheck('check');
                $(this).parents().find('#TwebAlquilerEspacios').iCheck('check');
                $(this).parents().find('#TwebAlquilerEventos').iCheck('check');
                $(this).parents().find('#TwebFundacionQ').iCheck('check');
                $(this).parents().find('#TwebFundacionP').iCheck('check');
                $(this).parents().find('#TwebInformacion').iCheck('check');
                $(this).parents().find('#TwebPublicidad').iCheck('check');
                $(this).parents().find('#TwebBanner').iCheck('check');
                $(this).parents().find('#TwebOtrasP').iCheck('check');
                $(this).parents().find('#TwebOtrasR').iCheck('check');
                $(this).parents().find('#TwebOtrasA').iCheck('check');
                $(this).parents().find('#TwebOtrasC').iCheck('check');
                $(this).parents().find('#TwebContacto').iCheck('check');
                $(this).parents().find('#TwebAlquiler').iCheck('check');

                $(this).parents().find('#TfacturacionCaja').iCheck('check');
                $(this).parents().find('#TfacturacionReporte').iCheck('check');
                $(this).parents().find('#TVentasReporte').iCheck('check');
                
                $(this).parents().find('#REventoVentas').iCheck('check');
                $(this).parents().find('#REventoGratuito').iCheck('check');
                $(this).parents().find('#RAmigosTeatro').iCheck('check');

                $(this).parents().find('#CReinicioCorreo').iCheck('check');
                $(this).parents().find('#CBienvenido').iCheck('check');
                $(this).parents().find('#CCompraBoleto').iCheck('check');
                $(this).parents().find('#CDonacion').iCheck('check');
                $(this).parents().find('#CCumpleanos').iCheck('check');
                $(this).parents().find('#CRegalo').iCheck('check');
                $(this).parents().find('#CBoletoC').iCheck('check');
                $(this).parents().find('#CEliminarC').iCheck('check');
                $(this).parents().find('#CRegistroG').iCheck('check');
                $(this).parents().find('#CAdministracionD').iCheck('check');
                $(this).parents().find('#CAdministracionE').iCheck('check');

                $(this).iCheck('check');
                $('.page-spinner-loader').addClass('hide');
            }
        });
        // ELIMINA EL PRINCIPAL DE CADA MODULO 
        //MODULO PERMISOS 
        seleccionar('#Tperfiles','P');
        seleccionar('#usuariosUAD','UAD');
        seleccionar('#usuariosUCL','UCL');
        seleccionar('#usuariosUEV','UEV');
        //MODULO MANTENIMIENTO
        seleccionar('#Tcategoria','MC');
        seleccionar('#Tclasificacion','MCL');
        seleccionar('#Tespectaculo','ME');
        seleccionar('#Tprocedencia','MP');
        seleccionar('#TtipoEvento','MTE');
        seleccionar('#Tproductora','MPR');
        seleccionar('#Tpromocion','MPM');
        seleccionar('#TdistribucionP','MDP');
        seleccionar('#TdistribucionE','MDE');
        seleccionar('#Tsala','MSL');
        //MODULO IMAGENES
        seleccionar('#TimagenSala','IS');
        seleccionar('#TimagenDistribucion','ID');
        seleccionar('#TimagenBanner','IB');
        seleccionar('#Tlogo','IL');
        //MODULO EVENTOS
        seleccionar('#Tventa','EV');
        seleccionar('#Tgratuito','EG');
        seleccionar('#Tinformativo','EI');
        seleccionar('#Tbloqueos','EB');
        seleccionar('#TventaDestacado','EVD');
        //MODULO PROCESOS
        seleccionar('#TditribucionSala','PS');
        seleccionar('#TeliminarCortesia','CT');
        seleccionar('#TprocesosPromocion','PP');
        seleccionar('#TprocesosPromocionG','PPG');
        seleccionar('#TprocesosAmigosB','PAB');
        seleccionar('#TprocesosAmigosP','PAP');
        seleccionar('#TprocesosAmigosI','PAI');
        seleccionar('#TprocesosContactos','PC');
        seleccionar('#TprocesosFundacion','PF');
        seleccionar('#TprocesosPromocionF','PPF');
        //MODULO WEB
        seleccionar('#TwebImagen','WI');
        seleccionar('#TwebOtrasImagen','WOI');
        seleccionar('#TwebOtrasBanner','WOB');
        seleccionar('#TwebTeatroQuienes','WTQ');
        seleccionar('#TwebTeatroInstalaciones','WTI');
        seleccionar('#TwebTeatroNoticias','WTN');
        seleccionar('#TwebAlquilerEspacios','WAE');
        seleccionar('#TwebAlquilerEventos','WAEV');
        seleccionar('#TwebFundacionQ','WFQ');
        seleccionar('#TwebFundacionP','WFP');
        seleccionar('#TwebInformacion','WIF');
        seleccionar('#TwebPublicidad','WPB');
        seleccionar('#TwebBanner','WB');
        seleccionar('#TwebOtrasP','WOP');
        seleccionar('#TwebOtrasR','WOR');
        seleccionar('#TwebOtrasA','WOA');
        seleccionar('#TwebOtrasC','WOC');
        seleccionar('#TwebContacto','WCC');
        seleccionar('#TwebAlquiler','WCA');
        //MODULO FACTURACION
        seleccionar('#TfacturacionCaja','FC');
        seleccionar('#TfacturacionReporte','FR');
        seleccionar('#TVentasReporte','FVR');
        //MODULO CORREOS modulo8
        seleccionar('#CReinicioCorreo','CRC');
        seleccionar('#CBienvenido','CB');
        seleccionar('#CCompraBoleto','CCB');
        seleccionar('#CDonacion','CD');
        seleccionar('#CCumpleanos','CC');
        seleccionar('#CRegalo','CR');
        seleccionar('#CBoletoC','CBC');
        seleccionar('#CEliminarC','CEC');
        seleccionar('#CRegistroG','CRG');
        seleccionar('#CAdministracionD','CAD');
        seleccionar('#CAdministracionE','CDE');

        //MODULO REPORTES
        seleccionar('#REventoVentas','REV');
        seleccionar('#REventoGratuito','REG');
        seleccionar('#RAmigosTeatro','RAT');

        function verificar(padre,tipo) {
            var band1=true;
            var comando=padre+":";
            if  ($('#exportar'+tipo).prop("checked")){
                comando=comando +" 6,";
                band1=false;
            }
            if  ($('#crear'+tipo).prop("checked")){
                comando=comando +" 1,";
                band1=false;
            }
            if  ($('#editar'+tipo).prop("checked")){
                comando=comando +" 2,";
                band1=false;
            }
            if  ($('#eliminar'+tipo).prop("checked")){
                comando=comando +" 3,";
                band1=false;
            }
            if  ($('#estado'+tipo).prop("checked")){
                comando=comando +" 5,";
                band1=false;
            }
            if  ($('#reset'+tipo).prop("checked")){
                comando=comando +" 4,";
                band1=false;
            }
            if  ($('#bloquear'+tipo).prop("checked")){
                comando=comando +" 12,";
                band1=false;
            }
            if  ($('#cortesia'+tipo).prop("checked")){
                comando=comando +" 14,";
                band1=false;
            }
            if  ($('#informacion'+tipo).prop("checked")){
                comando=comando +" 7,";
                band1=false;
            }
            if  ($('#descripcion'+tipo).prop("checked")){
                comando=comando +" 8,";
                band1=false;
            }
            if  ($('#multimedia'+tipo).prop("checked")){
                comando=comando +" 9,";
                band1=false;
            }
            if  ($('#funciones'+tipo).prop("checked")){
                comando=comando +" 10,";
                band1=false;
            }
            if  ($('#precios'+tipo).prop("checked")){
                comando=comando +" 11,";
                band1=false;
            }
            if  ($('#facturacion'+tipo).prop("checked")){
                comando=comando +" 15,";
                band1=false;
            }
            if  ($('#moviles'+tipo).prop("checked")){
                comando=comando +" 16,";
                band1=false;
            }
            if  ($('#B1'+tipo).prop("checked")){
                comando=comando +" 17,";
                band1=false;
            }
            if  ($('#B2'+tipo).prop("checked")){
                comando=comando +" 18,";
                band1=false;
            }
            if  ($('#recepcion'+tipo).prop("checked")){
                comando=comando +" 19,";
                band1=false;
            }
            if  ($('#correo'+tipo).prop("checked")){
                comando=comando +" 20,";
                band1=false;
            }
            if  ($('#ticket'+tipo).prop("checked")){
                comando=comando +" 21,";
                band1=false;
            }
            if  ($('#actualizarF'+tipo).prop("checked")){
                comando=comando +" 22,";
                band1=false;
            }
            if  ($('#eliminarC'+tipo).prop("checked")){
                comando=comando +" 23,";
                band1=false;
            }
            if  ($('#devolucion'+tipo).prop("checked")){
                comando=comando +" 24,";
                band1=false;
            }
            if  ($('#anularC'+tipo).prop("checked")){
                comando=comando +" 25,";
                band1=false;
            }
            if  ($('#notaCredito'+tipo).prop("checked")){
                comando=comando +" 26,";
                band1=false;
            }
            if  ($('#adminG'+tipo).prop("checked")){
                comando=comando +" 27,";
                band1=false;
            }
            if  ($('#puntos'+tipo).prop("checked")){
                comando=comando +" 28,";
                band1=false;
            }
            if  ($('#cumpleanos'+tipo).prop("checked")){
                comando=comando +" 29,";
                band1=false;
            }
            if  ($('#regalo'+tipo).prop("checked")){
                comando=comando +" 30,";
                band1=false;
            }
            if(band1){
                comando="";
            }else{
                comando = comando.substring(0, comando.length - 1);
                comando = comando + ";;";
            }
            return comando;
        };
        $(document).on('click', '.crear_perfil', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var nombres=$(this).parents().find('#nombres')[0].value;
            var estado=$(this).parents().find('#admin')[0]; 
            var tipoA="";      
            if(estado.checked) {
                tipoA="A";
            }else{
                tipoA="U";
            }
            var permisos="";
            //MODULO PERMISOS 
            permisos=permisos +verificar('#Tperfiles','P');
            permisos=permisos +verificar('#usuariosUAD','UAD');
            permisos=permisos +verificar('#usuariosUCL','UCL');
            permisos=permisos +verificar('#usuariosUEV','UEV');
            //MODULO MANTENIMIENTO
            permisos=permisos +verificar('#Tcategoria','MC');
            permisos=permisos +verificar('#Tclasificacion','MCL');
            permisos=permisos +verificar('#Tespectaculo','ME');
            permisos=permisos +verificar('#Tprocedencia','MP');
            permisos=permisos +verificar('#TtipoEvento','MTE');
            permisos=permisos +verificar('#Tproductora','MPR');
            permisos=permisos +verificar('#Tpromocion','MPM');
            permisos=permisos +verificar('#TdistribucionP','MDP');
            permisos=permisos +verificar('#TdistribucionE','MDE');
            permisos=permisos +verificar('#Tsala','MSL');
            //MODULO IMAGENES
            permisos=permisos +verificar('#TimagenSala','IS');
            permisos=permisos +verificar('#TimagenDistribucion','ID');
            permisos=permisos +verificar('#TimagenBanner','IB');
            permisos=permisos +verificar('#Tlogo','IL');
            //MODULO EVENTOS
            permisos=permisos +verificar('#Tventa','EV');
            permisos=permisos +verificar('#Tgratuito','EG');
            permisos=permisos +verificar('#Tinformativo','EI');
            permisos=permisos +verificar('#Tbloqueos','EB');
            permisos=permisos +verificar('#TventaDestacado','EVD');
            //MODULO PROCESOS
            permisos=permisos +verificar('#TditribucionSala','PS');
            permisos=permisos +verificar('#TeliminarCortesia','CT');
            permisos=permisos +verificar('#TprocesosPromocion','PP');
            permisos=permisos +verificar('#TprocesosPromocionG','PPG');
            permisos=permisos +verificar('#TprocesosAmigosB','PAB');
            permisos=permisos +verificar('#TprocesosAmigosP','PAP');
            permisos=permisos +verificar('#TprocesosAmigosI','PAI');
            permisos=permisos +verificar('#TprocesosContactos','PC');
            permisos=permisos +verificar('#TprocesosFundacion','PF');
            permisos=permisos +verificar('#TprocesosPromocionF','PPF');
            //MODULO WEB
            permisos=permisos +verificar('#TwebImagen','WI');
            permisos=permisos +verificar('#TwebOtrasImagen','WOI');
            permisos=permisos +verificar('#TwebOtrasBanner','WOB');
            permisos=permisos +verificar('#TwebTeatroQuienes','WTQ');
            permisos=permisos +verificar('#TwebTeatroInstalaciones','WTI');
            permisos=permisos +verificar('#TwebTeatroNoticias','WTN');
            permisos=permisos +verificar('#TwebAlquilerEspacios','WAE');
            permisos=permisos +verificar('#TwebAlquilerEventos','WAEV');
            permisos=permisos +verificar('#TwebFundacionQ','WFQ');
            permisos=permisos +verificar('#TwebFundacionP','WFP');
            permisos=permisos +verificar('#TwebInformacion','WIF');
            permisos=permisos +verificar('#TwebPublicidad','WPB');
            permisos=permisos +verificar('#TwebBanner','WB');
            permisos=permisos +verificar('#TwebOtrasP','WOP');
            permisos=permisos +verificar('#TwebOtrasR','WOR');
            permisos=permisos +verificar('#TwebOtrasA','WOA');
            permisos=permisos +verificar('#TwebOtrasC','WOC');
            permisos=permisos +verificar('#TwebContacto','WCC');
            permisos=permisos +verificar('#TwebAlquiler','WCA');
            //MODULO FACTURACION
            permisos=permisos +verificar('#TfacturacionCaja','FC');
            permisos=permisos +verificar('#TfacturacionReporte','FR');
            permisos=permisos +verificar('#TVentasReporte','FVR');
            //MODULO CORREOS
            permisos=permisos +verificar('#CReinicioCorreo','CRC');
            permisos=permisos +verificar('#CBienvenido','CB');
            permisos=permisos +verificar('#CCompraBoleto','CCB');
            permisos=permisos +verificar('#CDonacion','CD');
            permisos=permisos +verificar('#CCumpleanos','CC');
            permisos=permisos +verificar('#CRegalo','CR');
            permisos=permisos +verificar('#CBoletoC','CBC');
            permisos=permisos +verificar('#CEliminarC','CEC');
            permisos=permisos +verificar('#CRegistroG','CRG');
            permisos=permisos +verificar('#CAdministracionD','CAD');
            permisos=permisos +verificar('#CAdministracionE','CDE');
            //MODULO REPORTES
            permisos=permisos +verificar('#REventoVentas','REV');
            permisos=permisos +verificar('#REventoGratuito','REG');
            permisos=permisos +verificar('#RAmigosTeatro','RAT');

            console.log(permisos);
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
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"permisos", perfil:nombres, permisos:permisos, tipoA:tipoA},function() {    
                    $('.page-spinner-loader').addClass('hide');
                }); 
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }  
            
        });
        $(document).on('click', '.crearPerfil', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            $('.perfiles').addClass('hide'); // abrir
            $('.crear_perfil').removeClass('hide');
            $('.editar_perfil').addClass('hide'); 
            $('.general').load('./tables/usuarios/modulo_general.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.perfilG').load('./tables/usuarios/modulo_perfiles.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
                $('#Cperfiles').removeClass('hide'); // abrir
            });
            $('.mantenimiento').load('./tables/usuarios/modulo_mantenimiento.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.correos').load('./tables/usuarios/modulo_correo.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.imagenes').load('./tables/usuarios/modulo_imagenes.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.eventos').load('./tables/usuarios/modulo_eventos.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.procesos').load('./tables/usuarios/modulo_procesos.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.web').load('./tables/usuarios/modulo_web.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.reportes').load('./tables/usuarios/modulo_reportes.php', function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.facturacion').load('./tables/usuarios/modulo_facturacion.php',function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
           
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editarPerfil', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var estado=$(this).parents('tr').find('.hide_column')[0];
            $('.page-spinner-loader').removeClass('hide');
            $('.perfiles').addClass('hide'); // abrir
            $('.crear_perfil').addClass('hide');
            $('.editar_perfil').removeClass('hide'); 
            $('.general').load('./tables/usuarios/modulo_general.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.perfilG').load('./tables/usuarios/modulo_perfiles.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
                $('#Cperfiles').removeClass('hide'); // abrir
            });
            $('.mantenimiento').load('./tables/usuarios/modulo_mantenimiento.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.imagenes').load('./tables/usuarios/modulo_imagenes.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.eventos').load('./tables/usuarios/modulo_eventos.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.correos').load('./tables/usuarios/modulo_correo.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.reportes').load('./tables/usuarios/modulo_reportes.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.procesos').load('./tables/usuarios/modulo_procesos.php', {var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.web').load('./tables/usuarios/modulo_web.php',{var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $('.facturacion').load('./tables/usuarios/modulo_facturacion.php',{var1:estado.innerHTML},function() {    
                $('.page-spinner-loader').addClass('hide');
                handleiCheck();
            });
            $(this).prop("disabled",false);
        });
        $(document).on('click', '.editar_perfil', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            $('.page-spinner-loader').removeClass('hide');
            var id=$(this).parents().find('#idPerfil')[0].value;
            var nombres=$(this).parents().find('#nombres')[0].value;
            var estado=$(this).parents().find('#admin')[0]; 
            var tipoA="";      
            if(estado.checked) {
                tipoA="A";
            }else{
                tipoA="U";
            }
            var permisos="";
            //MODULO PERMISOS 
            permisos=permisos +verificar('#Tperfiles','P');
            permisos=permisos +verificar('#usuariosUAD','UAD');
            permisos=permisos +verificar('#usuariosUCL','UCL');
            permisos=permisos +verificar('#usuariosUEV','UEV');
            //MODULO MANTENIMIENTO
            permisos=permisos +verificar('#Tcategoria','MC');
            permisos=permisos +verificar('#Tclasificacion','MCL');
            permisos=permisos +verificar('#Tespectaculo','ME');
            permisos=permisos +verificar('#Tprocedencia','MP');
            permisos=permisos +verificar('#TtipoEvento','MTE');
            permisos=permisos +verificar('#Tproductora','MPR');
            permisos=permisos +verificar('#Tpromocion','MPM');
            permisos=permisos +verificar('#TdistribucionP','MDP');
            permisos=permisos +verificar('#TdistribucionE','MDE');
            permisos=permisos +verificar('#Tsala','MSL');
            //MODULO IMAGENES
            permisos=permisos +verificar('#TimagenSala','IS');
            permisos=permisos +verificar('#TimagenDistribucion','ID');
            permisos=permisos +verificar('#TimagenBanner','IB');
            permisos=permisos +verificar('#Tlogo','IL');
            //MODULO EVENTOS
            permisos=permisos +verificar('#Tventa','EV');
            permisos=permisos +verificar('#Tgratuito','EG');
            permisos=permisos +verificar('#Tinformativo','EI');
            permisos=permisos +verificar('#Tbloqueos','EB');
            permisos=permisos +verificar('#TventaDestacado','EVD');
            //MODULO PROCESOS
            permisos=permisos +verificar('#TditribucionSala','PS');
            permisos=permisos +verificar('#TeliminarCortesia','CT');
            permisos=permisos +verificar('#TprocesosPromocion','PP');
            permisos=permisos +verificar('#TprocesosPromocionG','PPG');
            permisos=permisos +verificar('#TprocesosAmigosB','PAB');
            permisos=permisos +verificar('#TprocesosAmigosP','PAP');
            permisos=permisos +verificar('#TprocesosAmigosI','PAI');
            permisos=permisos +verificar('#TprocesosContactos','PC');
            permisos=permisos +verificar('#TprocesosFundacion','PF');
            permisos=permisos +verificar('#TprocesosPromocionF','PPF');
            //MODULO WEB
            permisos=permisos +verificar('#TwebImagen','WI');
            permisos=permisos +verificar('#TwebOtrasImagen','WOI');
            permisos=permisos +verificar('#TwebOtrasBanner','WOB');
            permisos=permisos +verificar('#TwebTeatroQuienes','WTQ');
            permisos=permisos +verificar('#TwebTeatroInstalaciones','WTI');
            permisos=permisos +verificar('#TwebTeatroNoticias','WTN');
            permisos=permisos +verificar('#TwebAlquilerEspacios','WAE');
            permisos=permisos +verificar('#TwebAlquilerEventos','WAEV');
            permisos=permisos +verificar('#TwebFundacionQ','WFQ');
            permisos=permisos +verificar('#TwebFundacionP','WFP');
            permisos=permisos +verificar('#TwebInformacion','WIF');
            permisos=permisos +verificar('#TwebPublicidad','WPB');
            permisos=permisos +verificar('#TwebBanner','WB');
            permisos=permisos +verificar('#TwebOtrasP','WOP');
            permisos=permisos +verificar('#TwebOtrasR','WOR');
            permisos=permisos +verificar('#TwebOtrasA','WOA');
            permisos=permisos +verificar('#TwebOtrasC','WOC');
            permisos=permisos +verificar('#TwebContacto','WCC');
            permisos=permisos +verificar('#TwebAlquiler','WCA');
            //MODULO FACTURACION
            permisos=permisos +verificar('#TfacturacionCaja','FC');
            permisos=permisos +verificar('#TfacturacionReporte','FR');
            permisos=permisos +verificar('#TVentasReporte','FVR');
            //MODULO CORREOS
            permisos=permisos +verificar('#CReinicioCorreo','CRC');
            permisos=permisos +verificar('#CBienvenido','CB');
            permisos=permisos +verificar('#CCompraBoleto','CCB');
            permisos=permisos +verificar('#CDonacion','CD');
            permisos=permisos +verificar('#CCumpleanos','CC');
            permisos=permisos +verificar('#CRegalo','CR');
            permisos=permisos +verificar('#CBoletoC','CBC');
            permisos=permisos +verificar('#CEliminarC','CEC');
            permisos=permisos +verificar('#CRegistroG','CRG');
            permisos=permisos +verificar('#CAdministracionD','CAD');
            permisos=permisos +verificar('#CAdministracionE','CDE');
            //MODULO REPORTES
            permisos=permisos +verificar('#REventoVentas','REV');
            permisos=permisos +verificar('#REventoGratuito','REG');
            permisos=permisos +verificar('#RAmigosTeatro','RAT');

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
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"permisosE", id:id, perfil:nombres, permisos:permisos, tipoA:tipoA},function() {    
                    $('.page-spinner-loader').addClass('hide');
                }); 
            }else{
                $('.page-spinner-loader').addClass('hide');
                $(this).prop("disabled",false);
            }  
            
        });
        //boton cancela la creación
        $(document).on('click', '.estadoPerfil', function (e) {
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
                    $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoP", estado:"I", id:id},function() {    
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
                    $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoP", estado:"A", id:id},function() {
                        $('.page-spinner-loader').addClass('hide');
                      //  estado.checked = true;
                      //  oTable.fnUpdate('<label class="switch switch-green"> <input type="checkbox" class="switch-input" id="box" checked disabled> <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> <span id="estado" class="esconder">On</span> </label>', nRow, 6, false);
                      //  oTable.fnDraw();    
                    });
                    
                }
            }
            
        });
        //boton eliminar
        $(document).on('click', '.deletePerfil', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).prop("disabled",true); 
            var id=$(this).parents('tr').find('.hide_column')[0].innerHTML;
            if (confirm("Estas seguro de eliminar?") == false) {
                $(this).prop("disabled",false);
                return;
            }else{
                $('.page-spinner-loader').removeClass('hide');
                $('#alerta').load('./tables/usuarios/alerta.php', {tipo:"estadoP", estado:"B", id:id},function() {    
                    $('.page-spinner-loader').addClass('hide');
                });
            }
        });
        $(document).on('click', '.cancelar', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var table = $('#table-editable').DataTable();
            table.ajax.reload();
            $('.perfiles').removeClass('hide');   
            $('.Cperfiles').addClass('hide');
        });
    });

      $scope.$on('$destroy', function () {
        $('#table-editable').DataTable().clear().destroy();
        var tables = $.fn.dataTable.fnTables(true);
        $(tables).each(function () {
            $(this).dataTable().fnDestroy();
        });
        $(document).off('change','#admin');
        $(document).off('click','.crear_perfil');
        $(document).off('click','.crearPerfil');
        $(document).off('click','.editarPerfil');
        $(document).off('click','.editar_perfil');
        $(document).off('click','.estadoPerfil');
        $(document).off('click','.deletePerfil');
        $(document).off('click','.cancelar');

      });
  }]);
